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
    public function create()
    {
        return view('posts.create');
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required",
            "body" => "required",
            "preview" => "required",
        ]);
        Post::create([
            "title" => $validated["title"],
            "body" => $this->purifier->purify($validated["body"]),
            "preview" => $validated["preview"],
            "slug" => Str::slug($validated["title"])
        ]);
        return redirect(route('posts.index'));
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
     * @param $slug
     * @return View
     */
    public function edit($slug)
    {
        $post = $this->find($slug);
        return view("posts.edit", [
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

        $validated = $request->validate([
            "title" => "required",
            "body" => "required",
            "preview" => "required",
        ]);
        $post->update([
            "title" => $validated["title"],
            "body" => $this->purifier->purify($validated["body"]),
            "preview" => $validated["preview"]
        ]);
        $post->save();
        return redirect(route("posts.show", $post->slug));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route("posts.index"));
    }
}
