<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateOpinionRequest;

use App\Item;
use App\Opinion;
use App\User;
use App\Violation_item;
use App\Violation_exchange;
use App\Shipping_method;
use App\Category;
use App\Conversation;
use App\Exchange;
use Auth;
use Session;

class OpinionsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['only'=>'create']);
    }
    public function index(){
    	return 0;
    }
     public function show($id){
     	$logeduser = Auth::user()->id;
     	$items = Item::where('user_id',$logeduser)->get();
     	$opinions = Opinion::where('id_to_user',$id)->get();
    	return view('auth.profile', compact('items', 'opinions'));
    }
    public function create($id){
    	return view('auth.create_opinion', compact('id'));
    }
     public function store(CreateOpinionRequest $request)
      {
      	$opinion = new Opinion();

      $opinion->id_exchange = $request->id_exchange;
      $exchange = Exchange::findOrFail($opinion->id_exchange);
      $logeduser = Auth::user()->id;
      $opinion->satisfaction = $request->satisfaction;
      $opinion->description = $request->description;
      $opinion->id_from_user = $logeduser;
      if ($logeduser == $exchange->item->user_id) {
      	$opinion->id_to_user = $exchange->prop_item->user_id;
      }
      else{
      	$opinion->id_to_user = $exchange->item->user_id;
      }

      	
      	$opinion->save();
      	return redirect('items');
      }
}
