<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    //
    /**
     * @return Factory|View|Application
     */
    public function home()
    {
        return view("home");
    }

    /**
     * @return Factory|View|Application
     */
    public function profile()
    {
        return view("profile");
    }

    /**
     * @return Factory|View|Application
     */
    public function faq()
    {
        return view("faq");
    }

    /**
     * @return Factory|View|Application
     */
    public function dashboard()
    {
        return view("dashboard");
    }
}
