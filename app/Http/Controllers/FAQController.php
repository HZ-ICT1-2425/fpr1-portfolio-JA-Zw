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
     * @param Request $request
     * @return View
     */
    public function create(Request $request)
    {
        return view("faq.create", ["request" => $request]);
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->flash();
        if (empty($request->post("question")) || empty($request->post("answer"))) {
            return redirect(route("faq.create"))->with("fout", true);
        } else {
            FAQ::create([
                "question" => $request->post("question"),
                "answer" => $this->purifier->purify($request->post("answer"))
            ]);
            return redirect("/faq");
        }
    }


    /**
     *
     * @param Request $request
     * @param FAQ $faq
     * @return View
     */
    public function edit(Request $request, FAQ $faq)
    {
        return view("faq.edit", [
            "request" => $request,
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
        $request->flash();
        if (empty($request->post("question")) || empty($request->post("answer"))) {
            return redirect(route("faq.edit", $faq))->with("fout", true);
        } else {
            $faq->update([
                "question" => $request->post("question"),
                "answer" => $this->purifier->purify($request->post("answer"))
            ]);
            $faq->save();
            return redirect("/faq");
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        FAQ::destroy($id);
    }
}
