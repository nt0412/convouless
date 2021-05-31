<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\MainCategory;

class MainCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_category = MainCategory::orderBy('main_cate_name', 'ASC')->get();
        return view('admincp.main_category.index')->with(compact('main_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.main_category.create');
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
                'main_cate_name' => 'required|unique:tblmain_category|max:255',
                'main_cate_slug' => 'required|unique:tblmain_category|max:255',
                'main_cate_description' => 'required|max:255',
                'main_cate_status' => 'required',
            ],
            [
                'main_cate_name.required' => 'Message: Need to fill the Name of Category',
                'main_cate_slug.required' => 'Message: Need to fill the Slug of Category',
                'main_cate_name.unique' => 'Message: Choose another Name of Category',
                'main_cate_slug.unique' => 'Message: Choose another Slug of Category',
                'main_cate_description.required' => 'Message: Need to fill the Description of Category',
            ]
        );
        $main_category = new MainCategory();
        $main_category->main_cate_name = $data['main_cate_name'];
        $main_category->main_cate_slug = $data['main_cate_slug'];
        $main_category->main_cate_description = $data['main_cate_description'];
        $main_category->main_cate_status = $data['main_cate_status'];
        $main_category->save();
        return redirect()->back()->with('status', 'Message: Add success');
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
        $main_cate = MainCategory::find($id);
        return view('admincp.main_category.edit')->with(compact('main_cate'));
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
                'main_cate_name' => 'required|max:255',
                'main_cate_slug' => 'required|max:255',
                'main_cate_description' => 'required|max:255',
                'main_cate_status' => 'required',
            ],
            [
                'main_cate_name.required' => 'Message: Need to fill the Name of Category',
                'main_cate_slug.required' => 'Message: Need to fill the Slug of Category',
                'main_cate_description.required' => 'Message: Need to fill the Description of Category',
            ]
        );
        $main_category = MainCategory::find($id);
        $main_category->main_cate_name = $data['main_cate_name'];
        $main_category->main_cate_slug = $data['main_cate_slug'];
        $main_category->main_cate_description = $data['main_cate_description'];
        $main_category->main_cate_status = $data['main_cate_status'];
        $main_category->save();
        return redirect()->back()->with('status', 'Message: Updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::where('category_id', $id)->update(array('category_id' => '0'));
        MainCategory::find($id)->delete();

        return redirect()->back()->with('status', 'Message: Deleted success');
    }
}
