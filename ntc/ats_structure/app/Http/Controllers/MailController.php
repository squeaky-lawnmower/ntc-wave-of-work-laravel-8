<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ForgotPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request) {

        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return redirect()->back()->with('error', 'Invalid email address.');
        }

        $routeName = "";
        $message = "";
        switch($request->email_type) {
            case 'forgot_password' : 
                $details = ['url' => route('resetpass')."?id={$user->id}"];
                $routeName = 'login';
                $message = 'Password reset link sent to your email.';        
                Mail::to($request->email)->send(new ForgotPass( $details ));
                break;
            default: break;      
        }

        return redirect(route($routeName))->with('success', $message);
    }
}
