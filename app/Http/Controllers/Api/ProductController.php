<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        if (is_null($products->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No products found!',
            ], 200);
        }
        $response = [
            'status' => 'success',
            'message' => 'Products are showing successfully.',
            'data' => $products,
        ];

        return response()->json($response, 200);
    }

    public function show($id){
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Product is not found!',
            ], 200);
        }
        $response = [
            'status' => 'success',
            'message' => 'Product is called successfully.',
            'data' => $product,
        ];

        return response()->json($response, 200);
    }

    public function search($name)
    {
        $products = Product::where('name', 'like', '%'.$name.'%')->latest()->get();
        if (is_null($products->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No product found!',
            ], 200);
        }
        $response = [
            'status' => 'success',
            'message' => 'Products are retrieved successfully.',
            'data' => $products,
        ];
        return response()->json($response, 200);
    }

    public function filterCategory($id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No found category!',
            ], 200);
        }else{
        $products = $category->products;
        if (is_null($products->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No products found to this category!',
            ], 200);
        }}

        $response = [
            'status' => 'success',
            'message' => 'Products are retrieved successfully.',
            'data' => $products,
        ];
        return response()->json($response, 200);
    }
}
