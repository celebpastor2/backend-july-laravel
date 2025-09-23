<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
       $user = User::where('email', $username)->first();//null

       if( ! $user ){
        return back()->withErrors([
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

       $name = $request->post('name');
       $username = $request->post('username');
       $email = $request->post('email');
       $password = $request->post('password');
       #CRUD
       $user = User::create([
             'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),//password_hash($password, PASSWORD_HASH)
            'username' => $username
       ]);

       auth()->login($user);

    }

    public function loadShop(Request $request){
          $user = $request->user();

          if( ! $user ){
               return redirect("https://google.com");
          }
          $user = auth()->user();
          $shop = $user->shop();
          $products = $shop->products();
          $orders = array_map();

          return view("shop", [
               "shop"    => $shop,
               "products"     => $products
          ]);
    }
}
