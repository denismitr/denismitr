<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use App\Services\ContactHash;
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

    /**
     * @param Request $request
     * @param ContactHash $contactHash
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact(Request $request, ContactHash $contactHash)
    {
        $sent = !!Contact::where('hash', $contactHash->fromRequest($request))->first();

        return view('front.contact', ['sent' => $sent]);
    }

    public function projects()
    {
        $projects = Project::published()
            ->important()
            ->paginate(5);

        return view('front.projects', compact('projects'));
    }
}
