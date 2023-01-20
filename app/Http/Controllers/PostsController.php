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
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // OOP Way
        // $post = new Post();
        // $post->title = $request->title;
        // $post->excerpt = $request->excerpt;
        // $post->body = $request->body;
        // $post->image_path = 'temporary';
        // $post->min_to_read = $request->min_to_read;
        // $post->is_published = $request->is_published === 'on';
        // $post->save();

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => ['required', 'mimes:jpg,jpeg,png', 'max:5048'],
            'min_to_read' => 'required|min:0|max:60',
        ]);

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'min_to_read' => $request->min_to_read,
            'is_published' => $request->is_published === 'on'
        ]);


        return redirect(route('blog.index'));
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
        return view('blog.edit', [
            'post' => Post::where('id', $id)->first()
        ]);
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
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $id,
            'excerpt' => 'required',
            'body' => 'required',
            'image' => ['mimes:jpg,jpeg,png', 'max:5048'],
            'min_to_read' => 'required|min:0|max:60',
        ]);

        Post::where('id', $id)->update(
            $request->is_published == 'on'
                ? array_replace($request->except('_token', '_method'), ['is_published' => 1])
                : array_replace($request->except('_token', '_method'), ['is_published' => 0])
        );

        return redirect(route('blog.index'));
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

    private function storeImage($request)
    {
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        return $request->image->move(public_path('images'), $newImageName);
    }
}
