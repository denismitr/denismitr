<?php

namespace App\Http\Controllers\Admin;

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
}
