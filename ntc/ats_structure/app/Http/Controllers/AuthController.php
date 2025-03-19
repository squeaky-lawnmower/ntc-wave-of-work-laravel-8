<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\UserAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function login() {
        if(Auth::check()) {
            return redirect(route('home'));
        }
        return view('login');
    }

    function registration() {
        if(Auth::check()) {
            return redirect(route('home'));
        }
        return view('registration.index');
    }

    function signup($accountType) {
        if(Auth::check()) {
            return redirect(route('home'));
        }
        $data = ['account_type' => $accountType];
        return view('registration.signup')->with($data);
    }

    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        $user = User::where('email', $request->email)->first();

        if(!is_null($user) && is_null($user->email_verified_at)) {
            return redirect(route('login'))->with('error', 'Please activate your account using the verification link sent to your email.');
        } else if (is_null($user)) {
            return redirect(route('login'))->with('error','Login details are not valid');
        }

        if(Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return redirect(route('login'))->with('error','Login details are not valid');
    }

    function registrationPost(Request $request, $accountType) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:ats_user',            
            'password' => 'required',
            'password_retype' => 'required',
            'account_type' => 'required',
        ]);

        if('employer' == $accountType) {
            $request->validate(['company' => 'required']);
        }

        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['account_type'] = $request->account_type;
        $data['email'] = $request->email;
        $data['company'] = $request->company;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        
        if (!$user) {
            return redirect(route('registration'))->with('error','Registration failed, try again.');
        }
        
        $data = [];
        $data['user_id'] = $user->id;
        $data['about'] = '';

        UserAbout::create($data);

        $mailer = App::call('\App\Http\Controllers\MailController@sendMail', [
            'email_type' => 'activation',
            'email' => $request->email
        ]);
        
        if ($mailer == 'success') {
            return redirect(route('login'))->with('success', 'Registration success, an activation link was sent to your email');
        } else {
            return redirect()->back()->with('error','Error sending account activation email.');
        }
        
    }    

    function activation($id) {
        $user = User::where('id', $id)->first();
        $now = new DateTime();
        $now->format('Y-m-d H:i:s');   
        
        if($user) {
            $user->email_verified_at = $now;
            $user->save();

            return redirect(route('login'))->with('success', 'Activation Successful, you may now login');
        } 

        return redirect(route('login'))->with('success', 'Error, unable to activate your account');
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    function forgotpass() {
        if(Auth::check()) {
            return redirect(route('home'));
        }
        return view('forgotpass');
    }

    function resetpass() {
        if(Auth::check()) {
            return redirect(route('home'));
        }
        return view('resetpass');
    }

    
    function resetpassPost(Request $request, $id = null) {
        
        $request->validate([
            'new_password' => 'required',
            'retype_password' => 'required',
        ]);

        if ($request->new_password != $request->retype_password) 
        {
            return redirect()->back()->with('error','Password mismatch');
        }

        $profile = User::where('id', $id)->first();
        $profile->password = Hash::make($request->new_password);        
        $profile->save();
        
        if (!$profile) {
            return redirect()->back()->with('error','Unable to reset password.');
        }
        
        return redirect(route('login'))->with('success', 'Password reset successful, login to access the app');
    }    

}

