<?php

namespace App\Http\Controllers;

use App\Models\Post;
use HTMLPurifier;
use HTMLPurifier_Config;
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
     * Constructor
     */
    public function __construct()
    {
        $config = HTMLPurifier_Config::createDefault();
        $this->purifier = new HTMLPurifier($config);
    }

    protected HTMLPurifier $purifier;
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
    public function store(Request $request)
    {
        if (empty($request->post("title")) || empty($request->post("body")) || empty($request->post("preview"))) {
            return redirect("/posts/create?title=" . urlencode($request->post("title"))
                . "&body=" . urlencode($request->post("body"))
                . "&preview=" . urlencode($this->purifier->purify($request->post("preview"))));
        } else {
            Post::create([
                "title" => $request->post("title"),
                "body" => $this->purifier->purify($request->post("body")),
                "preview" => $request->post("preview"),
                "slug" => Str::slug($request->post("title"))
            ]);
            return redirect(route('posts.index'));
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
    public function show($slug)
    {
        return view('posts.show', ['post' => $this->find($slug)]);
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
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        if (empty($request->post("title")) || empty($request->post("body")) || empty($request->post("preview"))) {
            return redirect("/posts/edit/". $post->slug . "?title=" . urlencode($request->post("title"))
                . "&body=" . urlencode($request->post("body"))
                . "&preview=" . urlencode($request->post("preview")));
        } else {
            $post->update(["title" => $request->post("title"),
                "body" => $this->purifier->purify($request->post("body")),
                "preview" => $request->post("preview")
            ]);
            $post->save();
            return redirect(route("posts.show", $post->slug));
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id): void
    {
        Post::destroy($id);
    }
}
