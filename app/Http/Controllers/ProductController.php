<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => $request-> user_id
        ]);
    }

    public function index(Request $request)
    {
        $products = Product::where('user_id', $request->user_id)->get();
        return response()->json([
            'data' => $products
        ]);
    }

    public function destroy(Request $request)
    {
        Product::where('id', $request->id)->where('user_id', $request->user_id)->delete();
    }
    
    public function update(Request $request)
    {
        $update = [
            'name' => $request->name,
            'email' => $request->price,
        ];
        Product::where('id', $request->id)->where('user_id', $request->user_id)->update($update);

    }
    public function other(Request $request)
    {
        $products = Product::where('user_id', $request->user_id)->get();
        return response()->json([
            'others' => $products
        ]);
    }
}
