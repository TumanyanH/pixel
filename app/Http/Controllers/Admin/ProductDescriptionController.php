<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

use App\ProductDescription;
use App\ProductDescriptionTranslation;

class ProductDescriptionController extends Controller
{
    function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        
    }

    public function show()
    {

    }

    public function create(Request $request)
    {
        return view('multiauth::product-description.create', [
            'product_id' => $request->product_id,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,svg|max:10000|required',
            'am.*' => 'required|string',
            'ru.*' => 'required|string',
            'en.*' => 'required|string',
        ]);
        $product = \App\Product::findOrFail($request->product_id);

        $langs = \App\Language::get();
        
        $newOne['product_id'] = $request->product_id;
        // upload image
        $imagename = time() . '-' . Str::random(8) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/descriptions'), $imagename);
        //end upload image
        $newOne['image'] = $imagename;
        $productDescription = ProductDescription::create($newOne);

        $a = 0;
        foreach($langs as $lang){
            $descriptions[$a]['name'] = $request->{$lang->prefix}['name'];
            $descriptions[$a]['description'] = $request->{$lang->prefix}['description'];
            $descriptions[$a]['language_id'] = $lang->id;
            $descriptions[$a]['product_description_id'] = $productDescription->id;
            $a++;
        }

        ProductDescriptionTranslation::insert($descriptions);
        
        $category = \App\Product::with('category')->findOrFail($product->id);
        $isCategory = \App\Product::get_product_category_type($category->category->id);
        if($isCategory == 1) {
            return redirect()->route('admin.product-other.show', ['product_other' => $product->id]);
        } else {
            return redirect()->route('admin.product.show', ['product' => $product->id]);
        }
    }

    public function edit($id)
    {
        $description = ProductDescription::findOrFail($id);
        return view('multiauth::product-description.edit', ['description' => $description]);        
    }

    public function update(Request $request)
    {
        $request->validate([
            'description_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,svg|max:10000',
            'am.*' => 'required|string',
            'ru.*' => 'required|string',
            'en.*' => 'required|string',
        ]);

        $description = ProductDescription::findOrFail($request->description_id);
                
        if($request->hasFile('image')) {
            @unlink(public_path('uploads/descriptions/'. $description->image));
            $imagename = time() . '-' . Str::random(8) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/descriptions'), $imagename);
            $description->update([
                'image' => $imagename
            ]);
        }


        $langs = \App\Language::get();
        $a = 0;
        foreach($langs as $lang){
            $descriptions[$a]['name'] = $request->{$lang->prefix}['name'];
            $descriptions[$a]['description'] = $request->{$lang->prefix}['description'];
            $descriptions[$a]['language_id'] = $lang->id;
            $descriptions[$a]['product_description_id'] = $description->id;
            $a++;
        }

        ProductDescriptionTranslation::where('product_description_id', $description->id)->delete();
        ProductDescriptionTranslation::insert($descriptions);
        
        $product = \App\Product::with('category')->findOrFail($description->product_id);
        $isCategory = \App\Product::get_product_category_type($product->category->id);
        if($isCategory == 1) {
            return redirect()->route('admin.product-other.show', ['product_other' => $description->product_id]);
        } else {
            dd('b');
            return redirect()->route('admin.product.show', ['product' => $description->parent_id]);
        }


    }

    public function destroy($id)
    {
        $desc = ProductDescription::findOrFail($id);
        @unlink(public_path('uploads/descriptions/'.$desc->image));
        $desc->delete();
        return back();
    }
}
