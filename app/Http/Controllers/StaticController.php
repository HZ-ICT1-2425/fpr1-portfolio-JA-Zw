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
        $courses = Course::all();
        $ecsBehaald = 0;
        $ecsTotaal = 0;
        foreach ($courses as $course) {
            $ecsBehaald += $course->getECsObtained();
            $ecsTotaal += $course->credits;
        }
        return view("dashboard", [
            "courses" => $courses,
            "tests" => Test::all(),
            "ecsBehaald" => $ecsBehaald,
            "ecsTotaal" => $ecsTotaal
        ]);
    }
}
