<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
}
