<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

use App\BrandCategory;
use App\Product;
use App\ProductColorDetail;
use App\ProductOtherConfiguration;

class ProductOtherController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /** 
     * show products index view
     * 
     * @return view
     */
    public function index()
    {
        $brands = \App\Brand::with('categories')->get();
        return view('multiauth::product-other.index', [
            'brands' => $brands
        ]);
    }

    /** 
     * show all producst for each category
     * 
     * @param int $id
     * 
     * @return view
     */
    public function showAllProducts(Request $request, $id)
    {
        $category = BrandCategory::with('translations', 'products')->findOrFail($id);
        return view('multiauth::product-other.showProducts', [
            'category' => $category
        ]);
    }

    /** 
     * show product details
     * 
     * @param int $id
     * 
     * @return redirect
     */
    public function show($id)
    {
        $product = Product::with('colors', 'storages', 'descriptions')->findOrFail($id);
        return view('multiauth::product-other.show', [
            'product' => $product
        ]);
    }

    /** 
     * create product view 
     * 
     * @return redirect view
     */
    public function create(Request $request)
    {        
        return view('multiauth::product-other.create', [
            'category_id' => $request->category_id,
        ]);   
    }

    /** 
     * store products 
     * 
     * @param Request $request
     * 
     * @return redirect 
     */
    public function store(Request $request) 
    {
        $request->validate([
            'brand_category_id' => 'required',
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            // 'sale_price' => 'integer',
            'colors.*' => 'required|string|max:255',
            'color_names.*' => 'required|string|max:255',
            'color_images.*' => 'image|mimes:jpeg,jpg,svg,png|max:10000|required',
        ]);

        if(count($request->colors) == count($request->color_names) && count($request->colors) == count($request->color_images)) {
            $newOne['brand_category_id'] = $request->brand_category_id;
            $newOne['name'] = $request->name;
            $newOne['price'] = $request->price;
            $newOne['sale_price'] = $request->sale_price ?? $request->price;
            $newOne['slug'] = $this->parseSlug($request->name);
            $newOne['sale_discount'] = round(($newOne['price'] - $newOne['sale_price']) / $newOne['price'] * 100);
            $product = Product::create($newOne);

            $colors = [];
            for($i = 0; $i < count($request->colors); $i++){
                $colors[$i]['product_id'] = $product->id;
                $colors[$i]['color'] = $request->colors[$i];
                $colors[$i]['color_name'] = $request->color_names[$i];
                $imagename = time(). '-' . Str::random(8) . '.' . $request->color_images[$i]->getClientOriginalExtension();
                $request->color_images[$i]->move(public_path('uploads/products'), $imagename);
                $colors[$i]['color_image'] = $imagename;
            }
            ProductColorDetail::insert($colors);
            
            $colorDetails = ProductColorDetail::where('product_id', $product->id)->get();

            $configurations = [];
            $b = 0;
            foreach($colorDetails as $color) {
                $configurations[$b]['product_id'] = $product->id;                    
                $configurations[$b]['color_id'] = $color->id;
                $b++;
            }
            
            ProductOtherConfiguration::insert($configurations);
            return redirect()->route('admin.product-other.showAllProducts', ['id' => $request->brand_category_id]);
        }

        return redirect()->route('admin.product-other.showAllProducts', ['id' => $request->brand_category_id]);

    }

    /** 
     * show edit view
     * 
     * @param $id
     * 
     * @return view
     */
    public function edit($id) 
    {
        $product = Product::with('colors', 'storages')->findOrFail($id);
        return view('multiauth::product-other.edit', [
            'product' => $product,
        ]);
    }

    /** 
     * update product
     * 
     * @param Request $request
     * 
     * @return redirect
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'colors.*' => 'required|string|max:255',
            'color_names.*' => 'required|string|max:255',
            'color_images.*' => 'image|mimes:jpeg,jpg,svg,png|max:10000|nullable',
        ]);
        $product = Product::findOrFail($id);
            // dd($request->all());
            $newOne['name'] = $request->name;
            $newOne['price'] = $request->price;
            $newOne['sale_price'] = $request->sale_price;
            $newOne['sale_discount'] = round(($newOne['price'] - $newOne['sale_price']) / $newOne['price'] * 100);
            $newOne['slug'] = $this->parseSlug($request->name);
            $newOne['name'] = $request->name;
            Product::where('id', $product->id)->update($newOne);
            
            $product_colors = ProductColorDetail::where('product_id', $product->id)->get();
            $colors = [];
            for($i = 0; $i < count($request->colors); $i++){
                if(isset($product_colors[$i])) {
                    $colors[$i]['product_id'] = $product->id;
                    $colors[$i]['color'] = $product_colors[$i]->color;
                    $colors[$i]['color_name'] = $product_colors[$i]->color_name;
                    $colors[$i]['color_image'] = $product_colors[$i]->color_image;
                } else {
                    $colors[$i]['product_id'] = $product->id;
                    $colors[$i]['color'] = $request->colors[$i];
                    $colors[$i]['color_name'] = $request->color_names[$i];
                    $imagename = time(). '-' . Str::random(8) . '.' . $request->color_images[$i]->getClientOriginalExtension();
                    $request->color_images[$i]->move(public_path('uploads/products'), $imagename);
                    $colors[$i]['color_image'] = $imagename;
                }
            }

            ProductColorDetail::where('product_id', $product->id)->delete();
            ProductColorDetail::insert($colors);

            $colorDetails = ProductColorDetail::where('product_id', $product->id)->get();

            $configurations = [];
            $b = 0;
            foreach($colorDetails as $color) {
                $configurations[$b]['product_id'] = $product->id;                    
                $configurations[$b]['color_id'] = $color->id;
                $b++;
            }

            ProductOtherConfiguration::where('product_id', $product->id)->delete();
            ProductOtherConfiguration::insert($configurations);

            return redirect()->route('admin.product-other.show', ['product_other' => $product->id]);
    }

    public function destroy($id) 
    {
        $product = Product::with('colors')->findOrFail($id);
        foreach($product->colors as $color) {
            @unlink(public_path('uploads/products/' . $color->color_image));
        }
        $product->delete();
        return redirect()->route('admin.product-other.showAllProducts', ['id' => $product->brand_category_id]);
    }
}
