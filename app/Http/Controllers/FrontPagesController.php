<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class FrontPagesController extends Controller
{
    public function home()
    {
        $projects = Project::published()
            ->important()
            ->take(2)
            ->get();

        return view('front.home', compact('projects'));
    }

    public function blog()
    {
        return view('front.blog');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function projects()
    {
        $projects = Project::published()
            ->important()
            ->paginate(5);

        return view('front.projects', compact('projects'));
    }

    public function tech()
    {
        return view('front.tech');
    }
}
