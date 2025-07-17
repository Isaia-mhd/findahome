<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthRequest $request)
    {

        $request->validated();

        $user = User::where("email", $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password))
        {
            return redirect()->back()->with("error", "Credentials does not match.");
        }
        Auth::login($user);
        return redirect()->intended(route("home"))->with("success","Logged In.");

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended(route("home"))->with("success","Logged Out.");
    }
}
