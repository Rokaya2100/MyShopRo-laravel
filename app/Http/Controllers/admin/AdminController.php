<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $orders = Order::all();
        $users = User::all();
        return view('admin.dashboard',[
            'route'     => 'dashboard',
            'categories'=>$categories,
            'products'  =>$products,
            'orders'    =>$orders,
            'users'     =>$users
        ]);
    }
}
