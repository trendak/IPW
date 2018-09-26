<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProfileRequest;
use Auth;
use App\User;
use Session;

class UserController extends Controller
{
         public function index(){
        $loggeduser = Auth::user()->id;
        $user = User::findOrFail($loggeduser);
        return view('auth.editprofile', compact('$user'));
    }
    public function store(CreateProfileRequest $request){
    	$loggeduser = Auth::user()->id;
        $user = User::findOrFail($loggeduser);
       
        $user->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
        		'city'=>$request->city,
        		'streat'=>$request->streat,
        		'postcode'=>$request->postcode,
        		'number'=>$request->number
        		

        ]);
        Session::flash('item_created','Twoje dane zostały zaktualizowane');
     
        return redirect('items');
    }
}
