<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Test;

class StaticController extends Controller
{
    /**
     * @return View
     */
    public function home()
    {
        return view("home");
    }

    /**
     * @return View
     */
    public function profile()
    {
        return view("profile");
    }

    /**
     * @return View
     */
    public function dashboard()
    {
        return view("dashboard", ["courses" => Course::all(), "tests" => Test::all()]);
    }
}
