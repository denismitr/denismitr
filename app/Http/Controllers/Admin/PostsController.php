<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('topics')
            ->orderBy('updated_at', 'DESC')
            ->paginate(20);
        
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $topics = Topic::orderBy('name')->get();
        $posts = Post::with('topics')->orderBy('name')->get();

        return view('admin.posts.create', [
            'topics' => $topics,
            'posts' => $posts,
        ]);
    }

    public function edit(Post $post)
    {
        $topics = Topic::orderBy('name')->get();
        $posts = Post::with('topics')->orderBy('name')->get();

        return view('admin.posts.edit', [
            'post' => $post,
            'topics' => $topics,
            'posts' => $posts,
        ]);
    }

    public function store(CreatePostRequest $request)
    {
        $post = Post::create($this->getData($request));

        if (!!$request->publish) {
            $post->publish();
        }

        if (!empty($request->topics)) {
            $post->topics()->attach($request->topics);
        }

        return redirect()->route('admin.posts.index');
    }

    protected function getData(Request $request)
    {
        return [
            'name' => $request->name,
            'slug' => $request->slug,
            'body' => $request->body,
            'published_at' => $request->published_at ? now() : null,
            'lang' => $request->lang,
            'part' => $request->part,
            'parent_id' => $request->parent_id,
        ];
    }
}
