<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate(["email" => "email|unique:subscribers"]);
        Subscriber::create($validated);
        return redirect()->route("home")->with("success","You are Subscribed to our Newsletter.");
    }
}
