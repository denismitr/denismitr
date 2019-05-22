<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function russian()
    {
        session()->put('locale', 'ru');

        return response()->json([], 204);
    }

    public function english()
    {
        session()->put('locale', 'en');

        return response()->json([], 204);
    }
}
