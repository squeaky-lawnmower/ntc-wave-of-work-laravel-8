<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\MessagesExchange;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    function show($id = null) {
        return view('messages.index', ['id' => $id]);
    }

    function list($id = null) {
        if($id == null || $id != auth()->user()->id) {
            $id = auth()->user()->id;
            return redirect(route("home"))->with('error','Access Denied.');
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }
        
        $list = Messages::with('sender')->with('receiver')
            ->orWhere('original_sender_id', $id)
            ->orWhere('original_receiver_id', $id)
            ->orderByDesc('updated_at')
            ->get();

        $data = [
            'list' => $list
        ];

        return view("messages.list")->with($data);
    }

    function exchange($id) {
        
        if(!Auth::check()) {
            return redirect(route('login'));
        }
        
        $exchanges = MessagesExchange::with('sender')->where('message_id', $id)->get();

        $data = [
            'exchanges' => $exchanges
        ];

        return view("messages.exchange")->with($data);
    }
    
    function send(Request $request, $id) {
        $messageId = $request->message_id;

        $messages = Messages::where('id', $messageId)->first();

        if ($messages != null) {
            $message = "Added";
            $data['message_id'] = $messageId;
            $data['sender_id'] = auth()->user()->id;
            $data['message'] = $request->message;

            $exchange = MessagesExchange::create($data);
            
            if (!$exchange) {
                return redirect()->back()->with('error','Unable to send message');
            }

            // simply this:
            Messages::where('id', $messageId)->first()->touch();
            
        }

        $exchanges = MessagesExchange::with('sender')->where('message_id', $messageId)->get();

        $data = [
            'exchanges' => $exchanges
        ];

        return view("messages.index")->with($data);
    }

    function start($jobseekerId) {
        
        if ($jobseekerId != null) {
            $message = "Added";
            $data['original_sender_id'] = auth()->user()->id;
            $data['original_receiver_id'] = $jobseekerId;

            $message = Messages::create($data);
            
            if (!$message) {
                return redirect()->back()->with('error','Unable to send message');
            }
        }

        return view("messages.index");
    }

        
}
