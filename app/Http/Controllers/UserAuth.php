<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class UserAuth extends Controller
{
    function userLogin(request $req){
         $info =  $req->input();
         $authChecker = Auth::attempt(['email' => $info['email'] , 'password' => $info['password']]);
         if($authChecker)
         {
             $req->session()->put('email' , $info['email']);
             $req->session()->put('password' , $info['password']);
             return redirect(RouteServiceProvider::HOME);
         }
        return Redirect::back()->withErrors([
            'data' => 'Incorrect Email or Password',
        ]);




    }

    function userLogOut(request $req){
        if($req->session()->has('email')){
         $req->session()->forget('email');
         $req->session()->forget('password');
            return redirect('/login');
        }

    }
}
