<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function login(Request $request){
       $method =  $request->method();
       $username = $request->all("email");
       $password = $request->all("password"); 
       
       if(strtolower( $method ) == "get" ){
            return view("login");
       }

       //process the login request with the remain code
       $user = User::where('email', $username)->first();

       if( ! $user ){
        return json_encode([
            "message"   => "User not exist",
            "success"   => false
        ]);
       }

       if(auth()->attempt($username, $password)){
            auth()->login($user);
            redirect("dashboard");
       }
    }

    public function register(Request $request){
        $method =  $request->method(); 
       
       if(strtolower( $method ) == "get" ){
            return view("register");
       }

       $name = $request->all('name');
       $username = $request->all('username');
       $email = $request->all('email');
       $password = $request->all('password');

       #CRUD
       $user = User::create([
             'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'username' => $username
       ]);

       auth()->login($user);
    }
}
