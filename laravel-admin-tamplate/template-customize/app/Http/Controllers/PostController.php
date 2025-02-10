<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index () {
        $comments = Post::with('comments')->get();//one to many
        // dd($comments);
        return view('pages.one-to-many.comment', compact('comments'));
    }
}
