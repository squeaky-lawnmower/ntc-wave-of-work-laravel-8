<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SupportController extends Controller
{
    function show($id = null) {
        return view("support", ['id', $id]);
    }

    function supportPost(Request $request) {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data['full_name'] = $request->full_name;
        $data['email'] = $request->email;
        $data['message'] = $request->message;

        $supportEmail = Support::create($data);

        if (!$supportEmail) {
            return redirect(route('support'))->with('error','Unable to submit your concerns.');
        }



        $mailer = App::call('\App\Http\Controllers\MailController@sendMail', [
            'email_type' => 'support',
            'email' => $request->email,
            'contents' => [
                'full_name' => $request->full_name,
                'email_body' => $request->message
            ]
        ]);

        if ($mailer == 'success') {
            return redirect()->back()->with('success', 'Your concerns has been sent to support team.');
        } else {
            return redirect()->back()->with('error','Error sending support email response.');
        }

        return redirect()->back()->with('success','Your concerns has been sent to support team.');   

    } 
}
