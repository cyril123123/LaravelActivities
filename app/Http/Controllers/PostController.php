<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::get();
        return view('posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
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
            'title' => 'required|max:100',
            'description' => 'required'
        ]);

        if($request->hasFile('img')){

            $filenameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('img')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('img')->storeAs('public/img', $filenameToStore);
        } else{
               
            $filenameToStore = '';
        }

        $post = new Post();
        $post->fill($request->all());
        $post->img = $filenameToStore;


        if ($post->save()){
            return redirect('/posts')->with('status','Sucessfully save');
        }

        return redirect('/posts');
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
        $post = Post::find($post);
        return view('posts.show', compact('post'));
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
        $post = Post::find($post);
        return view('posts.edit', compact('post'));
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
            'title' => 'required|max:100',
            'description' => 'required'
        ]);

        if($request->hasFile('img')){

            $filenameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('img')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('img')->storeAs('public/img', $filenameToStore);
        } else{
               
            $filenameToStore = '';
        }
     
        $post = Post::find($id);
        $post->fill($request->all());
        $post->img = $filenameToStore;
        $post->save();

        return redirect('/posts');
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
        $post = Post::find($post)->first;
        $post->delete();

        return redirect('/posts');
    }
}
