<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

class AdminController extends Controller
{
    public function users(){

    	if (Auth::user()->name == 'Admin') {
    		$users = User::paginate(10);
    		return view('admin.users', compact('users'));
    	}
    }
    public function items(){

    	if (Auth::user()->name == 'Admin') {
    		$items = Item::paginate(10);
    		return view('admin.items', compact('items'));
    	}
    }
       public function violations(){

    	if (Auth::user()->name == 'Admin') {
    		$violations_exchange = Violation_exchange::latest()->get();
    		$violations_items = Violation_item::latest()->get();
    		return view('admin.violations', compact('$violations_exchange', 'violations_items'));
    	}
    }
}
