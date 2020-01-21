<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\PolicyTranslation;

class PolicyController extends Controller
{
    public function index()
    {

    }   

    public function askLanguages()
    {
        $languages = \App\Language::get();
        return view('multiauth::policy.languages', compact('languages'));
    }

    public function show($lang) 
    {
    }

    // public function create() 
    // {
        
    // }

    // public function store() 
    // {
        
    // }
    
    public function edit($lang) 
    {
        $language = \App\Language::select('id')->where('prefix', $lang)->first();
        $privacy = PolicyTranslation::where('language_id', $language->id)->first();
        return view('multiauth::policy.edit', compact('privacy'));
    }

    public function update(Request $request, $id) 
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:256',
            'content' => 'required|string',
        ]);

        $newOne['title'] = $request->title;
        $newOne['content'] = $request->content;

        $privacy = PolicyTranslation::where('id', $id)->update($newOne);
        $lang = PolicyTranslation::with('language')->findOrFail($id);
        return redirect()->route('admin.privacy-policy.edit', ['privacy_policy' => $lang->language->prefix]);
    }

    // public function destroy() 
    // {
        
    // }
}
