<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class PostController extends Controller
{

    /**
     * @param Request $request
     * @return View
     */
    public function create(Request $request)
    {
        return view('posts.create', [
            "request" => $request
        ]);
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function submit(Request $request)
    {
        if (empty($request->post("title")) || empty($request->post("body")) || empty($request->post("preview"))) {
            return redirect("/posts/create?title=" . urlencode($request->post("title"))
                . "&body=" . urlencode($request->post("body"))
                . "&preview=" . urlencode($request->post("preview"))
            );
        } else {
            Post::create([
                "title" => htmlentities($request->post("title")),
                "body" => htmlentities($request->post("body")),
                "preview" => htmlentities($request->post("preview")),
                "slug" => Str::slug($request->post("title"))
            ]);
            return redirect("/posts");
        }
    }

    /**
     * Omdat onze primary key per sé id moet zijn volgens de opdracht, kunnen we vgm geen route-model binding gebruiken
     * @param $id
     * @return Post
     */
    private function find($id)
    {
        $post = Post::where("slug", $id)->first();
        if (is_null($post)) {
            abort(404);
        }
        return $post;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('posts.posts', ['posts' => Post::all()]);
    }

    /**
     * @param $slug
     * @return View
     */
    public function view($slug)
    {
        return view('posts.view', ['post' => $this->find($slug)]);
    }

    /**
     * @param Request $request
     * @param $slug
     * @return View
     */
    public function edit(Request $request, $slug)
    {
        $post = $this->find($slug);
        return view("posts.edit", [
            "request" => $request,
            "post" => $post
        ]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        if (empty($request->post("title")) || empty($request->post("body")) || empty($request->post("preview"))) {
            return redirect("/posts/edit/". $post->slug . "?title=" . urlencode($request->post("title"))
                . "&body=" . urlencode($request->post("body"))
                . "&preview=" . urlencode($request->post("preview"))
            );
        } else {
            $post->update(["title" => htmlentities($request->post("title")),
                "body" => htmlentities($request->post("body")),
                "preview" => htmlentities($request->post("preview"))
            ]);
            $post->save();
            return redirect(route("post", $post->slug));
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {

        Post::destroy($id);
    }

}
