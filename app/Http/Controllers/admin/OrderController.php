<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index',[
            'route'=>'orders',
            'orders' => Order::all()
        ]);
    }
    public function show(string $id)
    {
        //
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit',data: ['order'=>$order,'route'=>'orders']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        try{
            $order->update($request->all());
            return redirect()->route('orders.index')
                             ->withSuccess('The status of order is updated successfully.');
            }catch(Exception $exception){
            return redirect()->back()
                             ->withErrors('error',$exception->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //$order = Order::findOrFail('id',$id);
        $order->delete();
        $product =$order->product;
        if($product){
            $product->update([
                $product->stock++,
            ]);
        }
        return redirect()->route('orders.index')
                         ->withSuccess('The order is deleted successfully.');
    }
    // public function search(Request $request)
    // {
    //     $search = $request->search;
    //     $orders = Order::where('name','LIKE','%'.$search.'%')->get();
    //     return view('admin.orders.index',['orders'=>$orders,'route'=>'orders',]);
    // }
}
