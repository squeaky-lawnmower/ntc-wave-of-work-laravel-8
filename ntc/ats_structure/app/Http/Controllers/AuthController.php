<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAbout;
use Illuminate\Http\Request;
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
        return view('registration');
    }

    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return redirect(route('login'))->with('error','Login details are not valid');
    }

    function registrationPost(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:ats_user',            
            'password' => 'required',
            'password_retype' => 'required',
            'account_type' => 'required',
        ]);

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

        return redirect(route('login'))->with('success', 'Registration success, login to access the app');
    }    

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}

