<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home() 
    {
        $brands = \App\Brand::where('isCategory', 0)->get();
        return view('index', compact('brands'));
    }
}
