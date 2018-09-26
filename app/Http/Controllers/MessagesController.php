<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateMessageRequest;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\User;
use App\Conversation;
use App\Message;
use App\Category;
use App\Exchange;
use Auth;
use Session;

class MessagesController extends Controller
{

    public function create($id){
        $user = User::findOrFail($id);
    	return view('messages.createmessages', compact('user'));
    }
      public function store(CreateMessageRequest $request)
    {
        $conversations = new Conversation();
        $conversations->id_user_from = Auth::user()->id;
        $conversations->title = $request->title;
        $conversations->id_user_to_send = $request->id_user_to_send;
        $messages = new Message();
        $messages->text = $request->text;
        $conversations->save();
        $messages->id_conversation = $conversations->id;
        $messages->who_send = Auth::user()->id;
      
        $messages->save();
    	return redirect('my_messages');
    }

        public function mymessages()
    {
        $user= Auth::user()->id;
        $conversations = Conversation::latest()->where('id_user_to_send',$user)->orWhere('id_user_from',$user)->get();
        return view('messages.inbox', compact('conversations'));
    }
    public function show($id){
        $conversation = Conversation::findOrFail($id);
        $messages = Message::where('id_conversation', $id)->get();
        return view('messages.conversation', compact('messages', 'conversation'));
    }
    public function savemessage(CreateMessageRequest $request)
    {
        $message = new Message($request->all());
        $message->who_send = Auth::user()->id;
        $message->save();
        return redirect('my_messages/'.$message->id_conversation);
    }
}
