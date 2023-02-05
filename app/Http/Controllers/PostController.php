<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate();

        return view('posts.index', compact('posts'));
    }

    public function create(Post $post){
        // compact('post') no se utiliza aquí, pero al utilizar un solo _form.blade.php para crear y editar, es necesario para evitar el error de variable indefinida
        return view('posts.create', compact('post'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'body'  => 'required',
        ]);

        // posts() es el nombre de la relación en el modelo User
        $post = $request->user()->posts()->create([
            /* 'title' => $title= $request->title,
            'slug'  => Str::slug($title),
            'body'  => $request->body, */

            // para poder validar el slug (unique)
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,
        ]);

        return redirect()->route('posts.edit', $post)->with('status', 'Creado con éxito');
    }

    public function edit(Post $post){ 
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id, // ignora la validación del slug actual
            'body'  => 'required',
        ]);

        $post->update([
            /* 'title' => $title= $request->title,
            'slug'  => Str::slug($title),
            'body'  => $request->body, */

            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,
        ]);

        return redirect()->route('posts.edit', $post)->with('status', 'Actualizado con éxito');
    }

    public function destroy(Post $post){
        $post->delete();

        return back();
    }
}
