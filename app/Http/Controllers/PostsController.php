<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = DB::table('posts')->get(); using query builder to fetch posts from DB

        // Eloquent
        // $posts = Post::all(); retrieve all posts
        // $posts = Post::get(); retrieve all posts (you can add method chaining)
        // $posts = Post::orderBy('id', 'desc')->take(5)->get(); order by clause
        // $posts = Post::where('min_to_read', '!=', 2)->get(); where clause

        // Chunk function
        // Post::chunk(25, function ($posts) {
        //     foreach ($posts as $post) {
        //         echo $post->title . '<br>';
        //     }
        // });

        // $posts = Post::sum('min_to_read'); sum
        // $posts = Post::avg('min_to_read'); average

        return view('blog.index', [
            'posts' => Post::orderBy('updated_at', 'desc')->get()
        ]);


        // Ways on how to pass data to blade template
        // return view('blog.index')->with('posts', $posts);
        // return view('blog.index', compact('posts'));
        // return view('blog.index', [
        //     'posts' => $posts
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('blog.show', [
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
