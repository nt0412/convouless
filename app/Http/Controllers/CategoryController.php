<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('category_name','ASC')->get();
        return view('admincp.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'category_name' => 'required|unique:category|max:255',
                'category_description' => 'required|max:255',
                'category_enable' => 'required',
            ],
            [
                'category_name.required' => 'Message: Need to fill the Name of Category',
                'category_description.required' => 'Message: Need to fill the Description of Category',
            ]
        );
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->category_description = $data['category_description'];
        $category->category_enable = $data['category_enable'];
        $category->save();
        return redirect()->back()->with('status','Message: Add success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Category_ID)
    {
        Category::find($Category_ID)->delete();
        return redirect()->back()->with('status','Message: Deleted success');
    }
}
