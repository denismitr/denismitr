<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function russian()
    {
        session()->put('locale', 'ru');
        session()->save();

        return back();
    }

    public function english()
    {
        session()->put('locale', 'en');
        session()->save();

        return back();
    }
}
