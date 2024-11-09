<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index',[
            'route'=>'products',
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',['route'=>'products','categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try{
            $image = $request->file('image')->store('public/assets/uploads/products');

            // $file = $request->file('image');
            // $ext = $file->getClientOriginalExtension();
            // $filename = time().'.'.$ext;
            // $file->move('public/assets/uploads/products',$filename);

            $product = new Product();
            $product->name        = $request->name;
            $product->description = $request->description;
            $product->price        = $request->price;
            $product->stock        = $request->stock;
            $product->image        = $image;
            $product->save();

            $product->categories()->sync($request->categories_ids);
            return redirect()->route('products.index')
                             ->withSuccess('New product is added successfully.');
            }catch(Exception $exception){
            return redirect()->back()
                             ->withErrors('error',$exception->getMessage());
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show',['product'=>$product,'route'=>'products']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $selected = $product->categories->pluck('id')->toArray();
        return view('admin.products.edit',data: [
            'route'     =>'products',
            'product'   =>$product,
            'categories'=>$categories,
            'selected'  =>$selected
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try{
            $image = $product->image;
            if($request->hasFile('image')){
                Storage::delete($request->image);
                $image = $request->file('image')->store('public/assets/uploads/products');
            }
            $product->update([
            'name'       => $request->name,
            'description'=> $request->description,
            'price'     => $request->price,
            'stock'     => $request->stock,
            'image'      => $image,
            ]);

            $product->categories()->sync($request->categories_ids);
            return redirect()->route('products.index')
                             ->withSuccess('The product is updated successfully.');
        }catch(Exception $exception){
            return redirect()->back()
                             ->withErrors('error',$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                ->withSuccess('Product is archived successfully.');
    }

    public function archive()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.products.archive',[
            'route'     =>'products',
            'products' => $products,
        ]);
    }
    public function restore($id)
    {
        product::withTrashed()->where('id',$id)->restore();
        return redirect()->route('products.archive')
                ->withSuccess('The product has been restored successfully.');
    }
    public function forceDelete(Product $product)
    {
        if($product->orders->count()>0){
            return redirect()->route('products.index')
                            ->withSuccess('Sorry, The product is not deleted successfully because there are orders it relation.');
        }else{
        if($product->categories->count()==1){
            foreach($product->categories as $category)
            $category->delete();
        }
        if($product->image){
            $path = 'public/assets/uploads/products'.$product->image;
            Storage::delete($product->image);
        }
            product::withTrashed()->where('id',$product->id)->forceDelete();
            return redirect()->route('products.index')
                        ->withSuccess('The product is deleted successfully.');
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name','LIKE','%'.$search.'%')->get();
        return view('admin.products.index',['products'=>$products,'route'=>'products',]);
    }
}
