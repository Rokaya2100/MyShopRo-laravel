<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::whereHas('products')->get();
        return view('website.home.index',compact('products','categories'));
    }
    public function show(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('website.home.show',compact('Product'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $categories = Category::all();
        $products = Product::where('name','LIKE','%'.$search.'%')->get();
        return view('website.home.index',compact('products','categories'));
    }
    public function searchCategory(Category $category)
    {
        $categories = Category::all();
        $products = $category->products;
        return view('website.home.index',compact('products','categories'));
    }


}
