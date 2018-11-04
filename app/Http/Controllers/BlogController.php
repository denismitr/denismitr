<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $topics = Topic::orderBy('name')->get();
        $posts = Post::topLevel()->recentlyPublished()->get();

        return view('front.blog', [
            'posts' => $posts,
            'topics' => $topics,
        ]);
    }
}
