<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /** 
     * index for brands
     * 
     * @return view
     */
    public function index()
    {
        $brands = Brand::get();
        return view('multiauth::brand.index', [
            'brands' => $brands->sortBy('sort'),
        ]);
    }

    /** 
     * store one more brand
     * 
     * @param Request $request
     * 
     * @return redirect
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('admin.brand.index');
    }

    /** 
     * change sort
     */
    public function changeSort(Request $request)
    {
        $a = 1;
        foreach($request->ids as $id){
            Brand::where('id', $id)->update(['sort' => $a]);
            $a++;
        }
        $a = 1;
        return json_encode('success');
    }

    /** 
     * destroy one brand
     * 
     * @param int $id
     * 
     * @return redirect
     */
    public function destroy(Request $requets, $id)
    {
        Brand::where('id', $id)->delete();
        return redirect()->route('admin.brand.index');
    }
}
