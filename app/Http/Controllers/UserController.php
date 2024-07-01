<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    //
    function signup(){
        return view('Auth.signup');
    }
    function register(Request $req){
        $validation = [
            'email'=> 'required|email|unique',
            'password'=>'required|min:8|confirmed'
        ];

        $email = User::where('email', $req->email)->exists();
        if($email){
        Session::flash('error', 'Email already exist! Try another one.');
        }

        $signup = new User();
        $signup->name = $req->name;
        $signup->email = $req->email;
        $signup->password = $req->password;
        $signup->save();
        Session::flash('success', 'Registration Successfull!');
        return back();
    }

    function login(){
        return view('Auth.login');
    }

    function userLogin(Request $req){
        $user = User::where('email', $req->input('email'))
        ->where('password', $req->input('password'))->first();
        if($user){
            session()->put('id', $user->id);
            session()->put('role', $user->role);
            session()->put('role', $user->email);
            if($user->role == 'user'){
                return redirect('/');
            }
            else if($user->role == 'admin'){
                return redirect('admin');
            }
        }
        else{
            Session::flash('error', 'Invalid Email and Password!');
            return back();
        }
    }

    function logout(){
        session()->forget('id');
        session()->forget('role');
        return redirect('login');
    }
}