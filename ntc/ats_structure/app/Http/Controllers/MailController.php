<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Support;
use App\Mail\Activation;
use App\Mail\ForgotPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request, $email_type = null, $email = null, $contents = null) {
        
        if ( !is_null($request->email_type) ) {
            $request->validate([
                'email' => 'required|email'
            ]);
            $email = $request->email;
            $email_type = $request->email_type;
        }

        $user = User::where('email', $email)->first();
        
        if(!$user) {
            return redirect()->back()->with('error', 'Invalid email address.');
        }

        $routeName = "";
        $message = "";

        switch($email_type) {
            case 'forgot_password' : 
                $details = ['url' => route('resetpass')."?id={$user->id}"];
                $routeName = 'login';
                $message = 'Password reset link sent to your email.';        
                Mail::to($email)->send(new ForgotPass( $details ));
                return redirect(route($routeName))->with('success', $message);
                break;
            case 'activation' :
                $details = ['url' => route('activation',['id' => $user->id])];
                $message = 'An activation link was sent to your email.';        
                Mail::to($email)->send(new Activation( $details ));
                break;
            case 'support' :
                $details = ['contents' => $contents];
                $message = 'Your concerns has been sent to the support team.';        
                Mail::to($email)->cc(env('MAIL_FROM_ADDRESS'))->send(new Support( $details ));
                break;
            default: 
                return 'error'; 
                break;      
        }

        return 'success';
    }
}
