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
    public function index(): View
    {
        return view("faq.index", ["faqs" => FAQ::all()]);
    }

    /**
     *
     * @return View
     */
    public function create(): View
    {
        return view("faq.create");
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
    public function edit(FAQ $faq): View
    {
        return view("faq.edit", [
            "faq" => $faq
        ]);
    }

    /**
     * @param Request $request
     * @param FAQ $faq
     * @return RedirectResponse
     */
    public function update(Request $request, FAQ $faq): RedirectResponse
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
     * @param FAQ $faq
     * @return RedirectResponse
     */
    public function destroy(FAQ $faq): RedirectResponse
    {
        $faq->delete();
        return redirect(route("faq.index"));
    }
}
