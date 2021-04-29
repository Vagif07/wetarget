<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return redirect('/home');
    }


    public function demo()
    {
        return view('demo');
    }
}
