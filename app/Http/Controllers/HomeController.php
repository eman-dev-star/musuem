<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function index(){
        return view('layouts.admin');
    }
}
