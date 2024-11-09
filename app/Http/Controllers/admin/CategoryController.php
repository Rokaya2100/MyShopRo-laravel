<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', [
            'route'=>'categories',
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create',['route'=>'categories']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try{
        $category = new Category();
        $category->name        = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index')
                         ->withSuccess('New Category is added successfully.');
        }catch(Exception $exception){
        return redirect()->back()
                         ->withErrors('error',$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',['category'=>$category,'route'=>'categories']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',data: ['category'=>$category,'route'=>'categories']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try{
        $category->update($request->all());
        return redirect()->route('categories.index')
                         ->withSuccess('The category is updated successfully.');
        }catch(Exception $exception){
        return redirect()->back()
                         ->withErrors('error',$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
                         ->withSuccess('The Category is deleted successfully.');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $categories = Category::where('name','LIKE','%'.$search.'%')->get();
        return view('admin.categories.index',['categories'=>$categories,'route'=>'categories',]);
    }
}
