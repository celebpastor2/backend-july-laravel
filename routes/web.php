<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');#You are giving blade engine of Laravel the power to parse the response to the client
});


Route::get('/front', function(){
    return view("front");
});

Route::post("/submit-login", [UserController::class, "login"]);
Route::post("/submit-register", [UserController::class, "register"]);
Route::get("/login", [UserController::class, "login"]);
Route::get("/register", [UserController::class, "register"]);
Route::get("/dashboard", [UserController::class, "dashboard"])->name("dashboard");

#A Model is class used to control a particular data structure
#a Model has direct relationship with data from your database
#Model View Controller kid of Framework (MVC)
#VIEW is that part of laravel that controls what we see
#Blade is Default View Engine for laravel
#CONTROLLER The controller is the part of laravel that controls the request and the responses
