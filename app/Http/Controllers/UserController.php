<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $post = Post::get();
        return view('user.index', compact('post'));
    }
}
