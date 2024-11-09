<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function userOrders(Request $request)
    {
        $user = $request->user();
        $orders = Order::where('user_id',$user->id)->get();

        if ($orders->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Not found orders!',
            ], 404);
        }
        else{
        $response = [
            'status' => 'success',
            'message'=> 'Orders are retrieved successfully.',
            'data'   => $orders,
        ];
        return response()->json($response, 200);
    }
    }

    public function addOrder(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
        ]);

        $productId = $request->product_id;
        $product = Product::find($productId);

        if( !$product || $product->stock == 0){
            return response()->json([
                'status' => 'failed',
                'message' => 'product not found!'
            ], 404);
        }else{
        $order = Order::create([
            'user_id'   => Auth::user()->id,
            'product_id'=> $request->product_id,
            ]);
            $response = [
                'status' => 'success',
                'message'=> 'product is added to list orders successfully.',
                'data'   => $order,
            ];
        $product->update([
            $product->stock = $product->stock -1,
        ]);
    }
        return response()->json($response, 201);
    }

    public function canncelOrder(Request $request,$id)
    {
        $order = Order::find($id);
        if(!$order){
            return response()->json([
                'status' => 'failed',
                'message' => 'Order not found!'
            ], 404);
        }else{
            $order->delete();
            $product =$order->product;
            $product->update([
                $product->stock++,
            ]);
            $response = [
                'status' => 'success',
                'message'=> 'Order is canceled from list orders successfully.',
            ];
        }
        return response()->json($response, 201);
    }

    public function allOrders(Request $request)
    {
        $orders = Order::all();
        if ($orders->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Not found orders!',
            ], 404);
        }
        else{
        $response = [
            'status' => 'success',
            'message'=> 'Orders are retrieved successfully.',
            'data'   => $orders,
        ];
        return response()->json($response, 200);
    }
    }

}
