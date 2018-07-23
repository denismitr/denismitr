<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPagesController extends Controller
{
    public function home()
    {
        return view('front.home');
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
        return view('front.projects');
    }

    public function tech()
    {
        return view('front.tech');
    }
}
