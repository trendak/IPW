<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateItemRequest;
use Illuminate\Support\Facades\DB;

use App\Item;
use App\User;
use App\Violation_item;
use App\Violation_exchange;
use App\Shipping_method;
use App\Category;
use App\Conversation;
use App\Exchange;
use Auth;
use Session;

class ItemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only'=>'create']);
    }
    // Pobieramy listę przedmiotów
    public function index()
    {
     
    	$items = Item::where('status', 1)->paginate(5);
         $categories = Category::latest()->get();
      
    	return view('items.index', compact('items', 'categories'));
    }
  
    //metoda która pokazuje jakie są rzeczy w danej kategori
     public function showcategory($id)
    {
        $category = Category::findOrFail($id);
     
        $items = DB::table('items')->join('users', 'items.user_id', '=', 'users.id' )->join('category_item', 'items.id', '=', 'category_item.item_id')->whereIn('category_id', [$id])->get();
   $categories = Category::latest()->get();

        return view('items.categories', compact('items', 'category', 'categories'));      

    }
    //metoda która wyciąga jeden przedmiot
    public function show($id)
    {
    	$item = Item::findOrFail($id);
    	return view('items.show')->with('item', $item);
    }

    //dodawanie przedmiotów
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $shipping_method = Shipping_method::pluck('name', 'id');
    	return view('items.create', compact('categories', 'shipping_method'));
    }
    // zapisuje przedmiot do bazy
     public function store(CreateItemRequest $request)
    {
            if($item = $request->hasFile('image_url'))
        {

            $filename = $request->image_url->getClientOriginalName();
            $request->image_url->storeAS('public/userdata', $filename);
            
        }
    	$item = new Item($request->all());
        $item->image_url = $filename;
     
        Auth::user()->items()->save($item);
        $categoryIds = $request->input('CategoryList');
        $item->categories()->attach($categoryIds);

        Session::flash('item_created','Twój przedmiot został dodany');
     
    	return redirect('items');
     
    }
    //Edycja przedmiotu
        public function edit($id)
		{
            $categories = Category::pluck('name', 'id');
			$item = Item::findOrFail($id);
            $shipping_method = Shipping_method::pluck('name', 'id');
			return view('items.edit', compact('item', 'categories', 'shipping_method'));
		}
		//aktualizacja przedmiotu
		public function update($id, Request $request)

		{

            $item = Item::findOrFail($id);
             if($request->hasFile('image_url'))
        {
          
            $filename = $request->image_url->getClientOriginalName();
            $request->image_url->storeAS('public/userdata', $filename);
             $item->update(  //aktualizacja bazy
                [
                    'image_url' => $filename,
                    'title' => $request->title,
                    'description' => $request->description,

                ]);
        }
        else{
             $item->update(  //aktualizacja bazy
                [
                 
                    'title' => $request->title,
                    'description' => $request->description,

                ]);
        }
            $item->categories()->sync($request->input('CategoryList'));
			return redirect()->to('items/'.$id);

		}
        public function violation($id)
        {
            $item = Item::findOrFail($id);
            return view('items.violation')->with('item', $item);
        }
        public function violationsave(Request $request){
            $loggeduser = Auth::user()->id;
            $violation = new Violation_item();

            $violation->user_id = $loggeduser;
            $violation->description = $request->description;
            $violation->item_id = $request->item_id;
            $violation->save();
            Session::flash('item_created','Twoje zgłoszenie zostało wysłane');
     
        return redirect('items');
        }
         public function violation_exchange($id)
        {
            $exchange = Exchange::findOrFail($id);
            return view('items.violation_exchange')->with('exchange', $exchange);
        }
        public function violationsave_exchange(Request $request){
            $loggeduser = Auth::user()->id;
            $violation = new Violation_exchange();

            $violation->user_id = $loggeduser;
            $violation->description = $request->description;
            $violation->id_exchange = $request->exchange_id;
            $violation->save();
            Session::flash('offer_exchange','Twoje zgłoszenie zostało wysłane');
     
        return redirect('offer_exchange');
        }
        public function exchange($id)
        {
            $item = Item::findOrFail($id);
           
            $loggeduser = Auth::user()->id;
            $loggeditems = DB::table('items')->whereIn('user_id', [$loggeduser])->get();
            return view('items.exchange', compact('item', 'loggeditems')); 

           
        }
        public function exchange_save($id, $pid)
        {
            $item = Item::findOrFail($pid);
            $item2 = Item::findOrFail($id);
            $item->user_id;
            if($item->user_id != Auth::user()->id){
                Session::flash('item_created','Nie możesz zaproponować do wymiany przedmiotu innego użytkownika');
     
        return redirect('items');
            }
            else{          
            if ($id == $pid) {
                 Session::flash('item_created','Nie można zaproponować sam sobie przedmiotu');
     
            return redirect('items');
            }
            $search= DB::table('exchange')->where('item_id', $id)->where('prop_item_id', $pid)->get();
            $exchange = new Exchange();
            $exchange->item_id= $id;
            $exchange->prop_item_id= $pid;
            //potem te dwe linjiki poniżej do wykasowania, nie chciało mi się na nowo robić migracji
            $exchange->item_status= 1;
            $exchange->prop_item_status= 1;
            $conversation = new Conversation();
            $exchange->save();
                $conversation->id = $exchange->id;
            $conversation->id_user_from = $item->user_id;
            $conversation->id_user_to_send = $item2->user_id;
            $conversation->title= substr($item->title, 0, 15) . ' za przedmiot '. substr($item2->title, 0, 15);
           
            $conversation->save();
             Session::flash('item_created','Wysłano propozycje wymiany przedmiotu');
     
        return redirect('items');
         
           
        }
        }
        public function offerexchange(){
        $loggeduser = Auth::user()->id;
      //   $youritem= Exchange::latest()->item()->get();
      // return $youritem;
        //przedmiot który chce użytkownik
        $items= Item::select('*', 'exchange.id as exchangeid')->join('exchange', 'items.id', '=', 'exchange.item_id'  )->get();
        //proponowany przedmiot
        $items2= Item::join('exchange', 'items.id', '=', 'exchange.prop_item_id')->get();

   
               return view('items.offerexchange', compact('items', 'items2')); 
        }
        public function assent_offerexchange($id)
        {
            $exchange= Exchange::findOrFail($id);
            $exchange->status= 1;
            $item = Item::findOrFail($exchange->item_id);
             $item->status= 2;
            $item->update();
            $item2 = Item::findOrFail($exchange->prop_item_id);
             $item2->status= 2;
            $item2->update();
            $exchange->update();
            return redirect('offer_exchange');
        }

        public function statusexchange($id)
        {
             $exchange = Exchange::findOrFail($id);
             $loggeduser = Auth::user()->id;
             if ($loggeduser != $exchange->item->user_id) 
                 $user = User::findOrFail($exchange->prop_item->user_id);
             else
             $user = User::findOrFail($exchange->item->user_id);
             
             return view('items.status_exchange', compact('exchange', 'user'));
        }
        public function itemsend($id){
            $exchange = Exchange::findOrFail($id);
            $loggeduser = Auth::user()->id;
            $item = Item::findOrFail($exchange->item_id);
            $item2 = Item::findOrFail($exchange->prop_item_id);
            if ($item->user_id == $loggeduser) {
            $exchange->item_status = 2;

            }
            else{
               $exchange->prop_item_status = 2; 
            }

            $exchange->update();
            return redirect()->to('offer_exchange/status/'.$id);
        }
             public function item_received($id){
            $exchange = Exchange::findOrFail($id);
            $loggeduser = Auth::user()->id;
            $item = Item::findOrFail($exchange->item_id);
            $item2 = Item::findOrFail($exchange->prop_item_id);
            if ($item->user_id != $loggeduser) {
            $exchange->item_status = 3;

            }
            else{
               $exchange->prop_item_status = 3; 
            }

            $exchange->update();
            return redirect()->to('offer_exchange/status/'.$id);
        }

}