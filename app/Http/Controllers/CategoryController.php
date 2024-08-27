<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categoryies = Category::all();
        return view ('admin.category.index',compact('categoryies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request -> validate([

            'category_name' => 'required|unique:categories,name'
        ]);
        
        $category = new Category();

        $category->name = $request->category_name;

        if($category->save()){
            $this->alert('Success','Category Saved successfully','success');
            return redirect()->route('category.index');
        }
        $this->alert('error','Something went wrong','danger');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view ('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request -> validate([
            'category_name' => 'required'
        ]);

        $category->name = $request->category_name;
        if($category->save()){
            $this->alert('Success', 'Category Updated Successfully', 'success');
            return redirect()->route('category.index');
        }
        $this->alert('error', 'Something Went Wrong', 'error');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            $this->alert('Success','Category Removed successfully','success');
            return redirect()->route('category.index');

        }
        $this->alert('error','Something went wrong','danger');
        return redirect()->back();
    }
}
