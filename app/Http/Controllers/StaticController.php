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
    public function home(): View
    {
        return view("home");
    }

    /**
     * @return View
     */
    public function profile(): View
    {
        return view("profile");
    }

    /**
     * @return View
     */
    public function dashboard(): View
    {
        $courses = Course::all();
        $ecsObtained = 0;
        $ecsTotal = 0;
        foreach ($courses as $course) {
            $ecsObtained += $course->getECsObtained();
            $ecsTotal += $course->credits;
        }
        return view("dashboard", [
            "courses" => $courses,
            "tests" => Test::all(),
            "ecsObtained" => $ecsObtained,
            "ecsTotal" => $ecsTotal
        ]);
    }
}
