<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    //
    function home(){
        return view("home");
    }

    function profile(){
        return view("profile");
    }

    function faq(){
        return view("faq");
    }

    function dashboard(){
        return view("dashboard");
    }
}
