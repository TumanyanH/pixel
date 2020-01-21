<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ProductConfiguration;

class ProductConfigurationController extends Controller
{
    
    public function show($id) 
    {
        $configs = ProductConfiguration::with('product', 'color', 'storage')->where('product_id', $id)->get();
        return view('multiauth::product-configuration.show', ['configs' => $configs]);
    }

    public function create() 
    {

    }
    
    public function store() 
    {
        
    }

    public function edit() 
    {
        
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'price' => 'required|integer',
            'sale_price' => 'nullable|integer',
            'in_stock' => 'nullable|integer',
        ]);
        
        $config = ProductConfiguration::findOrFail($id);
        
        $newOne['price'] = $request->price;
        $newOne['sale_price'] = $request->sale_price;
        if($request->price && $request->sale_price) {
            $newOne['sale_discount'] = round(($newOne['price'] - $newOne['sale_price']) / $newOne['price'] * 100);
        }
        if($request->in_stock) {
            $newOne['in_stock'] = $request->in_stock;
        }
        $config->update($newOne);
        return 'success';
    }

    public function destroy() 
    {
        
    }
}
