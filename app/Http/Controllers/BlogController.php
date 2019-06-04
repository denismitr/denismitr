<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Services\FullTextSearch;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $topics = Topic::orderBy('name')->get();
        $posts = Post::with('topics', 'parts')->topLevel()->recentlyPublished()->get();

        return view('front.blog.index', [
            'posts' => $posts,
            'topics' => $topics,
        ]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(Post $post)
    {
        $post->load('topics', 'parts');

        return view('front.blog.post', compact('post'));
    }

    /**
     * @param Topic $topic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function topic(Topic $topic)
    {
        $posts = $topic->posts;

        return view('front.blog.topic', [
            'posts' => $posts,
            'topic' => $topic,
        ]);
    }

    /**
     * @param Request $request
     * @param FullTextSearch $fullTextSearch
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, FullTextSearch $fullTextSearch)
    {
        return view('front.blog.search', [
            'posts' => $fullTextSearch->search($request->q)
        ]);
    }
}
