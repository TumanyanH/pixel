<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Brand;
use App\BrandCategory;
use App\BrandCategoryTranslation;

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
        $brands = Brand::with('categories')->get();
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string'
        ]);

        Brand::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.brand.index');
    }

    /** 
     * change sort
     */
    public function changeSort(Request $request)
    {
        $a = 1;
        foreach($request->brand_ids as $id){
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

    /** 
     * store subcategory 
     * 
     * @param Request $request
     * 
     * @return redirect
     */
    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,svg|max:10000|required',
            'am.*' => 'required|string|max:255',
            'ru.*' => 'required|string|max:255',
            'en.*' => 'required|string|max:255',
        ]);

        $langs = \App\Language::get();

        /** upload image */
        $imagename = time() . '-' . Str::random(8) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/brand-categories'), $imagename);
        /** end upload image */

        $default['brand_id'] = $request->brand_id;
        $default['image'] = $imagename;
     
        
        $brandCategory = BrandCategory::create($default);
     
        $a = 0;
        foreach($langs as $lang){
            $subcategories[$a]['name'] = $request->{$lang->prefix}['name'];
            $subcategories[$a]['language_id'] = $lang->id;
            $subcategories[$a]['brand_category_id'] = $brandCategory->id;
            $a++;
        }

        BrandCategoryTranslation::insert($subcategories);

        return redirect()->route('admin.brand.index');
    }

    /** 
     * update category sort
     * 
     * @param array $ids
     * 
     * @return redirect 
     */
    public function changeCategorySort(Request $request)
    {
        $a = 1;
        foreach($request->category_ids as $id){
            BrandCategory::where('id', $id)->update(['sort' => $a]);
            $a++;
        }
        $a = 1;
        return json_encode('success');
    }

    /** 
     * destroy subcategory
     * 
     * @param int $id
     * 
     * @return redirect
     */
    public function destroySubcategory(Request $request, $id)
    {   
        $brandCategory = BrandCategory::findOrFail($id);
        @unlink(public_path('/uploads/brand-categories/'.$brandCategory->image));
        $brandCategory->delete();
        return redirect()->route('admin.brand.index');
    }

    /** 
     * get category details
     * 
     * @param Request $request
     * 
     * @return response json_encode
     */
    public function getCategoryDetails(Request $request)
    {
        $details = BrandCategory::with('translations')->findOrFail($request->id);
        return json_encode($details);
    }

    /**
     * update subcategories
     * 
     * @param Request $request
     * 
     * @return redirect
     */
    public function updateSubcategory(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,svg|max:10000',
            'am.*' => 'required|string|max:255',
            'ru.*' => 'required|string|max:255',
            'en.*' => 'required|string|max:255',
        ]);

        $brandCategory = BrandCategory::findOrFail($request->brand_id);

        if($request->hasFile('image')){
            @unlink(public_path('/uploads/brand-categories/' . $request->image));
            $imagename = time() . '-' . Str::random(8) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/brand-categories'), $imagename);
            BrandCategory::where('id', $request->id)->update([
                'image' => $imagename
            ]);
        }

        $langs = \App\Language::get();

        $a = 0;
        foreach($langs as $lang){
            $subcategories[$a]['name'] = $request->{$lang->prefix}['name'];
            $subcategories[$a]['language_id'] = $lang->id;
            $subcategories[$a]['brand_category_id'] = $brandCategory->id;
            $a++;
        }

        BrandCategoryTranslation::where('brand_category_id', $brandCategory->id)->delete();
        BrandCategoryTranslation::insert($subcategories);

        return redirect()->route('admin.brand.index');
    }
}
