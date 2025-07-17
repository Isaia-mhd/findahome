<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get("login", [UserController::class, "login"])->name("user.login");
Route::get("register", [UserController::class, "create"])->name("user.register");
Route::post("register", [UserController::class, "store"])->name("user.store");
Route::post("login", [AuthController::class, "authenticate"])->name("user.authenticate");
Route::post("logout", [AuthController::class,"logout"])->name("user.logout");

Route::post("subscribe", [SubscriberController::class, "subscribe"])->name("subscribe");
