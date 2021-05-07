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
<<<<<<< HEAD
                'CategoryName' => 'required|unique:category|max:255',
                'CategorySlug' => 'required|unique:category|max:255',
                'CategoryDescription' => 'required|max:255',
                'CategoryEnable' => 'required',
            ],
            [
                'CategoryName.required' => 'Message: Need to fill the Name of Category',
                'CategorySlug.required' => 'Message: Need to fill the Slug of Category',
                'CategoryName.unique' => 'Message: Choose another Name of Category',
                'CategorySlug.unique' => 'Message: Choose another Slug of Category',
                'CategoryDescription.required' => 'Message: Need to fill the Description of Category',
            ]
        );
        $category = new Category();
        $category->CategoryName = $data['CategoryName'];
        $category->CategorySlug = $data['CategorySlug'];
        $category->CategoryDescription = $data['CategoryDescription'];
        $category->CategoryEnable = $data['CategoryEnable'];
=======
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
>>>>>>> efd7167480278a9c233a03121f60ab4c55336c67
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
        $cate = Category::find($id);
        return view('admincp.category.edit')->with(compact('cate'));
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
        $data = $request->validate(
            [
                'CategoryName' => 'required|max:255',
                'CategorySlug' => 'required|max:255',
                'CategoryDescription' => 'required|max:255',
                'CategoryEnable' => 'required',
            ],
            [
                'CategoryName.required' => 'Message: Need to fill the Name of Category',
                'CategorySlug.required' => 'Message: Need to fill the Slug of Category',
                'CategoryDescription.required' => 'Message: Need to fill the Description of Category',
            ]
        );
        $category = Category::find($id);
        $category->CategoryName = $data['CategoryName'];
        $category->CategorySlug = $data['CategorySlug'];
        $category->CategoryDescription = $data['CategoryDescription'];
        $category->CategoryEnable = $data['CategoryEnable'];

        $category->save();
        return redirect()->back()->with('status','Message: Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status','Message: Deleted success');
    }
}
