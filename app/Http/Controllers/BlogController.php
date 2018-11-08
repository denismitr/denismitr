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
        $posts = Post::with('topics')->topLevel()->recentlyPublished()->get();

        return view('front.blog.index', [
            'posts' => $posts,
            'topics' => $topics,
        ]);
    }

    public function post(Post $post)
    {
        $post->load('topics', 'parts');

        return view('front.blog.post', compact('post'));
    }

    public function topic(Topic $topic)
    {
        $posts = $topic->posts;

        return view('front.blog.topic', [
            'posts' => $posts,
            'topic' => $topic,
        ]);
    }
}
