<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->paginate(15);
        return view('multiauth::order.index', ['orders' => $orders]);
    }

    public function getDetails($id) {
        $order = Order::with('products')->findOrFail($id);
        $details = [];
        $a = 0;
        foreach($order->products as $product) {
            $details[$a]['product_name'] = $product->product->name;

            $isCategory = \App\Product::get_product_category_type($product->category_id);
            if($isCategory == 1) {
                $details[$a]['configutaion'] = \App\ProductOtherConfiguration::find($product->product_configuration_id);
            } else {
                $details[$a]['configutaion'] = \App\ProductConfiguration::find($product->product_configuration_id);
            }
            $a++;
        }

        return json_encode($details);
        
    }

    public function show()
    {
        
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

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
