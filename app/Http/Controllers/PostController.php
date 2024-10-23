<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(),
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create', ['post' => $post]); //porque espera el parametro, ya que utilizo eso dentro del form
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'body' => 'required',
        ]);

        $post = $request
            ->user()
            ->posts()
            ->create([
                'title' => $request->title,
                'slug' => $request->slug,
                'body' => $request->body,
            ]);

        return redirect()->route('posts.edit', $post); //porque espera el parametro, ya que utilizo eso dentro del form
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'body' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.edit', $post); //porque espera el parametro, ya que utilizo eso dentro del form
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}
