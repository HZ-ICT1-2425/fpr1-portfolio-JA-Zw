<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    //

    /**
     * @return Factory|View|Application
     */
    public function index()
    {
        return view("faq", ["faqs" => FAQ::all()]);
    }

    public function create(Request $request){
        return view("faq.create", ["request" => $request]);
    }

    public function submit(Request $request){
        if (empty($request->post("question")) || empty($request->post("answer"))) {
            return redirect("/faq/create?question=".urlencode($request->post()["question"]) . "&answer=" .urlencode($request->post("answer")));
        } else {
            FAQ::create(["question" => htmlentities($request->post("question")), "answer" => htmlentities($request->post("answer"))]);
            return redirect("/faq");
        }
    }

    public function edit(Request $request, $id){
        $faq = FAQ::find($id);
        return view("faq.edit", [
            "id" => $id,
            "request" => $request,
            "faq" => $faq
        ]);
    }

    public function update(Request $request, $id){
        //$faq = FAQ::find($id);
        if (empty($request->post("question")) || empty($request->post("answer"))) {
            return redirect("/faq/edit/$id?question=".urlencode($request->post()["question"]) . "&answer=" .urlencode($request->post("answer")));
        } else {
            FAQ::where("id", $id)->update(["question" => htmlentities($request->post("question")), "answer" => htmlentities($request->post("answer"))]);
            return redirect("/faq");
        }
    }

    public function delete($id) {
        FAQ::destroy($id);
    }
}
