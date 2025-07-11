<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        //
    }

    public function loginIndex()
    {
        return view('auth.login');
    }

    public function loginAuthenticate()
    {

    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function register()
    {

    }

    public function confirmationIndex()
    {

    }

    public function confirm()
    {
        
    }

    public function profileIndex()
    {

    }

    public function updateProfile()
    {

    }

    public function logout()
    {

    }
}
