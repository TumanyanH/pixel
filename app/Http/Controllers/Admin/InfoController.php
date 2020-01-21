<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function index()
    {
        $banks = \App\Info::where('prefix', 'like', 'bank%')->get();
        $hth = \App\Info::where('prefix', 'like', 'hth%')->get();
        return view('multiauth::info.index', [
            'hths' => $hth,
            'banks' => $banks
        ]);
    }

    public function update(Request $request)
    {
        dd($request->all());
    }
}
