<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function admindex()
    {
        return view('admin.dashboard');
    }
    public function userindex()
    {
        return view('dashboard');
    }
}
