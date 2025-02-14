<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class FAQController extends Controller
{
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
     * @return View
     */
    public function submit(Request $request)
    {
        if (empty($request->post("question")) || empty($request->post("answer"))) {
            return redirect("/faq/create?question=".urlencode($request->post()["question"]) . "&answer=" .urlencode($request->post("answer")));
        } else {
            FAQ::create(["question" => htmlentities($request->post("question")), "answer" => htmlentities($request->post("answer"))]);
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
        if (empty($request->post("question")) || empty($request->post("answer"))) {
            return redirect("/faq/edit/" .$faq->id
                . "?question=".urlencode($request->post("question"))
                . "&answer=" .urlencode($request->post("answer"))
            );
        } else {
            $faq->update([
                "question" => htmlentities($request->post("question")),
                "answer" => htmlentities($request->post("answer"))
            ]);
            $faq->save();
            return redirect("/faq");
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        FAQ::destroy($id);
    }
}
