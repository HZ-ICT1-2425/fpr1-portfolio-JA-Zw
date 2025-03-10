<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    protected HTMLPurifier $purifier;

    /**
     * Constructor
     */
    public function __construct()
    {
        $config = HTMLPurifier_Config::createDefault();
        $this->purifier = new HTMLPurifier($config);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view("faq.index", ["faqs" => FAQ::all()]);
    }

    /**
     *
     * @return View
     */
    public function create()
    {
        return view("faq.create");
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "question" => "required",
            "answer" => "required"
        ]);
        FAQ::create([
            "question" => $validated["question"],
            "answer" => $this->purifier->purify($validated["answer"])
        ]);
        return redirect(route("faq.index"));
    }


    /**
     *
     * @param FAQ $faq
     * @return View
     */
    public function edit(FAQ $faq)
    {
        return view("faq.edit", [
            "faq" => $faq
        ]);
    }

    /**
     * @param Request $request
     * @param FAQ $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, FAQ $faq)
    {
        $validated = $request->validate([
            "question" => "required",
            "answer" => "required"
        ]);
        $faq->update([
            "question" => $validated["question"],
            "answer" => $this->purifier->purify($validated["answer"])
        ]);
        $faq->save();
        return redirect(route("faq.index"));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect(route("faq.index"));
    }
}
