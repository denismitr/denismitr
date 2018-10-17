<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    public function index()
    {
        $topics = Topic::query()->orderBy('name')->paginate(15);

        return view('admin.topics.index', ['topics' => $topics]);
    }

    /**
     * @param CreateTopicRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateTopicRequest $request)
    {
        Topic::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
        ]);

        session()->flash('topic.success', "Topic {$request->name} created!");

        return back();
    }

    /**
     * @param UpdateTopicRequest $request
     * @param Topic $topic
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $topic->update(['name' => $request->name]);

        session()->flash('topic.success', "Topic {$request->name} updated!");

        return redirect()->route('admin.topics.index');
    }

    /**
     * @param Topic $topic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirm(Topic $topic)
    {
        return view('admin.topics.confirm', ['topic' => $topic]);
    }

    /**
     * @param Topic $topic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Topic $topic)
    {
        return view('admin.topics.edit', ['topic' => $topic]);
    }

    /**
     * @param Topic $topic
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        session()->flash('topic.success', "Topic {$topic->name} deleted!");

        return redirect()->route('admin.topics.index');
    }
}
