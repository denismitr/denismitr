<?php

namespace App\Http\Controllers\Admin;

use App\Events\CriticalErrorOccurred;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
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

    /**
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        try {
            /** @var Post $post */
            $post = Post::create($this->getData($request));

            if (!empty($request->topics)) {
                $post->topics()->attach($request->topics);
            }
        } catch (\Throwable $t) {
            CriticalErrorOccurred::dispatch($t);
            session()->flash('error', $t->getMessage());
            return back()->withInput();
        }

        if (!!$request->publish) {
            $post->publish();
        }

        session()->flash('success', 'Post created!');

        return redirect()->route('admin.posts.index');
    }

    /**
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $post->update($this->getData($request));

            if (!empty($request->topics)) {
                $post->topics()->sync($request->topics);
            }
        } catch (\Throwable $t) {
            CriticalErrorOccurred::dispatch($t);
            session()->flash('error', $t->getMessage());
            return back()->withInput();
        }

        if (!!$request->publish) {
            $post->publish();
        } else {
            $post->unpublish();
        }

        session()->flash('success', 'Post updated!');

        return redirect()->route('admin.posts.index');
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function getData(Request $request): array
    {
        return [
            'name' => $request->name,
            'slug' => $request->slug,
            'body' => $request->body,
            'lang' => $request->lang,
            'part' => $request->part,
            'parent_id' => $request->parent_id,
        ];
    }
}
