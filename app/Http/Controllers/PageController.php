<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        // consulta en base de datos
        //$posts = Post::get(); traigo todos los registros

        //$post = Post::first(); traigo el primer registro
        //$post = Post::find(25); traigo el registro 25
        //dd($post); muestro en web lo que esta en la variable

        $search = $request->search;

        $posts = Post::where('title', 'LIKE', "%{$search}%")
            ->with('user')
            ->latest()
            ->paginate();

        return view('home', ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        // consulta en base de datos con el slug
        return view('post', ['post' => $post]);
    }
}
