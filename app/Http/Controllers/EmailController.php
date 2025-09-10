<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function welcomeEmail()
    {
        $guard = Auth::guard('web')->check() ? "web" : "admin";
        $email = Auth::guard($guard)->user()->email;
        Mail::to($email)->send(new WelcomeMail());

        return redirect()->route('index');
    }
}
