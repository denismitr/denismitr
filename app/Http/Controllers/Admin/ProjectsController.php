<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(15);

        return view('admin.projects.index', ['projects' => $projects]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(CreateProjectRequest $request)
    {
        $filename = $request->file('picture')->store('projects', 'public');

        Project::create([
            "name" => "mysql",
            "description_ru" => "adsad",
            "description_en" => "asdsad",
            "url" => "http://google.com",
            "color" => "#000000",
            'picture' => $filename,
            "priority" => "23",
        ]);

        session()->flash('project.success', "Project {$request->name} created.");

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }
}
