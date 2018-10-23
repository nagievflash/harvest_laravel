<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logout extends Controller
{
    public function index() {
        setcookie("uid", "", time() - 100);
        setcookie("auth", "", time() - 100);
        return redirect()->route('home');
    }
}
