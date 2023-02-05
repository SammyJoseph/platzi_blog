<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function home(Request $request)
    {   
        // dd($_REQUEST); // $_REQUEST es PHP nativo
        // dd($request->all()); // $request->all() es lo mismo que $_REQUEST
        // dd($request->search); // $request->search es lo mismo que $_REQUEST['search']
        
        $search = $request->search; // get the search query from the request

        $posts = Post::where('title', 'like', "%{$search}%")
            ->with('user') // Get the user that created the post
            ->latest()->paginate();

        return view('home', compact('posts'));
    }

    /* public function blog() // ahora se realiza desde el home
    {
        // $posts = Post::get(); // Get all posts from the database
        
        // $post = Post::first(); // Get the first post from the database
        // $post = Post::find(25); // Get the post with id 25 from the database
        // dd($post); // dd() is a function that is used to dump and die, it is used to see the content of a variable and stop the execution of the code

        $posts = Post::latest()->paginate(); // Get all posts from the database ordered by the latest and paginate them
        // dd($posts);
    
        return view('blog', compact('posts'));
    } */

    public function post(Post $post) // Get the post from the database
    {
        return view('post', compact('post'));
    }
}
