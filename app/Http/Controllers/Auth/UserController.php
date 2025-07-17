<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view("pages.auth.register");
    }

    public function store(RegisterRequest $request)
    {
       User::create($request->validated());
       return redirect()->route("user.login")->with("success","You are registered with success!");
    }

    public function login()
    {
        return view("pages.auth.login");
    }

}
