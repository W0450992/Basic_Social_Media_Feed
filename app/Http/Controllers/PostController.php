<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $posts = Post::OrderBy('created_at','DESC')->get();
        $users = User::OrderBy('id')->get();
        $auth = Auth::user();
        //dd($posts);

        return view('home', compact(['posts','users', 'auth']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $posts = Post::OrderBy('created_at', 'DESC')->get();
        return view('posts.create', compact(['users', 'posts']));
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
        $request->validate([
            'title' => ['required'],
            'contents' => ['required'],

        ]);
        $id = Auth::user()->id;
        //puts new record in database
        //save the data as a new country
        Post::create([
            'title' => $request->title,
            'contents' => $request->contents,
            'created_by' => $id,

        ]);//->users()->sync($request->created_by);
        // ask controller to redirect back to index route
        // gets updated list
        return redirect(route('posts.index'))->with('status', 'Post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'title' => ['required'],
            'contents' => ['required'],
//            'password' => ['required', 'max:255']
            // 'role'
        ]);
        //save changes
        $post->title = $request->title;
        $post->contents = $request->contents;
        $post->save(); // perform a sql UPDATE

        return redirect(route('posts.index'))->with('status', 'Post has been changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect(route('posts.index'))->with('status', 'Post has been deleted!');
    }
}
