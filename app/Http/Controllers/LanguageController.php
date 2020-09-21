<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        if (!in_array($locale, ['en', 'th'])) {
            abort(404);
        }

        \Session::put('locale',$locale);

        return redirect()->back();
    }
}
