<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //index function to display login page
    public function index(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(\Auth::attempt($request->only('email','password'))){
            return redirect('templates');
        }

        return redirect('login')->withError('Invalid Login Details');
    }

    public function register_user(Request $request){
       
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users|email',
            'password'=>'required'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>\Hash::make($request->password),
        ]);

        if(\Auth::attempt($request->only('email','password'))){
            return redirect('templates');
        }

        return redirect('register')->withError('Error');
    }

    public function home(){
        return view('home');
    }

    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('');
        
    }
}
