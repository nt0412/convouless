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
                'category_name' => 'required|unique:category|max:255',
                'category_slug' => 'required|unique:category|max:255',
=======
                'CategoryName' => 'required|unique:category|max:255',
                'Category_Slug' => 'required|unique:category|max:255',
>>>>>>> de569ab64b2100d53529468b4659dd8ddf9cb819
                'category_description' => 'required|max:255',
                'category_enable' => 'required',
            ],
            [
<<<<<<< HEAD
                'category_name.required' => 'Message: Need to fill the Name of Category',
                'category_slug.required' => 'Message: Need to fill the Slug of Category',
                'category_name.unique' => 'Message: Choose another Name of Category',
                'category_slug.unique' => 'Message: Choose another Slug of Category',
=======
                'CategoryName.required' => 'Message: Need to fill the Name of Category',
                'Category_Slug.required' => 'Message: Need to fill the Slug of Category',
                'CategoryName.unique' => 'Message: Choose another Name of Category',
                'Category_Slug.unique' => 'Message: Choose another Slug of Category',
>>>>>>> de569ab64b2100d53529468b4659dd8ddf9cb819
                'category_description.required' => 'Message: Need to fill the Description of Category',
            ]
        );
        $category = new Category();
<<<<<<< HEAD
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
=======
        $category->CategoryName = $data['CategoryName'];
        $category->Category_Slug = $data['Category_Slug'];
>>>>>>> de569ab64b2100d53529468b4659dd8ddf9cb819
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
<<<<<<< HEAD
                'category_name' => 'required|max:255',
                'category_slug' => 'required|max:255',
=======
                'CategoryName' => 'required|max:255',
                'Category_Slug' => 'required|max:255',
>>>>>>> de569ab64b2100d53529468b4659dd8ddf9cb819
                'category_description' => 'required|max:255',
                'category_enable' => 'required',
            ],
            [
<<<<<<< HEAD
                'category_name.required' => 'Message: Need to fill the Name of Category',
                'category_slug.required' => 'Message: Need to fill the Slug of Category',
=======
                'CategoryName.required' => 'Message: Need to fill the Name of Category',
                'Category_Slug.required' => 'Message: Need to fill the Slug of Category',
>>>>>>> de569ab64b2100d53529468b4659dd8ddf9cb819
                'category_description.required' => 'Message: Need to fill the Description of Category',
            ]
        );
        $category = Category::find($id);
<<<<<<< HEAD
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
=======
        $category->CategoryName = $data['CategoryName'];
        $category->Category_Slug = $data['Category_Slug'];
>>>>>>> de569ab64b2100d53529468b4659dd8ddf9cb819
        $category->category_description = $data['category_description'];
        $category->category_enable = $data['category_enable'];

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
