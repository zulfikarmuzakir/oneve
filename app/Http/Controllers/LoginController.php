<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.choose-login');
    }

    public function loginSeller()
    {
        return view('auth.login-seller');
    }

    public function loginBuyer()
    {
        return view('auth.login-buyer');
    }

    public function registerSeller()
    {
        return view('auth.register-seller');
    }

    public function registerBuyer()
    {
        return view('auth.register-buyer');
    }
}
