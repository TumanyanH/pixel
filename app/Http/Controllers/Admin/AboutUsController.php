<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUsTranslation;

class AboutUsController extends Controller
{
    public function askLanguages() {
        $languages = \App\Language::get();
        return view('multiauth::about-us.languages', compact('languages'));
    }

    public function edit($lang) {
        $language = \App\Language::select('id')->where('prefix', $lang)->firstOrFail();
        $about = AboutTranslation::where('language_id', $language->id)->first();
        return view('multiauth::about-us.edit', compact('about'));
    }
}
