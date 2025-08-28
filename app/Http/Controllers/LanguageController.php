<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switch(  $lang, Request $request)
    {
        $availableLangs = ['kk', 'ru', 'en'];
        if (! in_array($lang, $availableLangs)) {
            $lang = 'en'; // язык по умолчанию
        }
        $request->session()->put('locale', $lang);
        return redirect()->back();
    }
}
