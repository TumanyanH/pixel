<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\BrandCategory;
use App\Product;
use App\ProductStorageDetail;
use App\ProductColorDetail;


class ProductController extends Controller
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
        return view('multiauth::product.index', [
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
        return view('multiauth::product.showProducts', [
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
        $product = Product::with('colors', 'storages')->findOrFail($id);
        return view('multiauth::product.show', [
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
        return view('multiauth::product.create', [
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
            'sale_price' => 'required|integer',
            'storages.*' => 'required|integer',
            'colors.*' => 'required|string|max:255',
            'color_names.*' => 'required|string|max:255',
            'color_images.*' => 'image|mimes:jpeg,jpg,svg,png|max:10000|required',
        ]);

        if(count($request->colors) == count($request->color_names) && count($request->colors) == count($request->color_images)) {
            $newOne['brand_category_id'] = $request->brand_category_id;
            $newOne['name'] = $request->name;
            $newOne['price'] = $request->price;
            $newOne['sale_price'] = $request->sale_price;
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
            
            $storages = [];
            $a = 0;
            foreach($request->storages as $storage) {
                $storages[$a]['product_id'] = $product->id;
                $storages[$a]['storage'] = $storage;
                $a++;
            }
            ProductStorageDetail::insert($storages);

            return redirect()->route('admin.product.showAllProducts', ['id' => $request->brand_category_id]);
        }

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
        return view('admin.product.edit', [
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
    public function update(Request $request)
    {
        dd($request->all());
    }
}
