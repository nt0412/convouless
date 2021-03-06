<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\MainCategory;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // func kiểm tra đã đăng nhập chưa
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('category_name', 'ASC')->get();
        return view('admincp.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_cate = MainCategory::orderBy('main_cate_name', 'ASC')->get();

        // return view('admincp.news.create')->with(compact('cate'));
        return view('admincp.category.create')->with(compact('main_cate'));
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
                'category_name' => 'required|unique:tblcategory|max:255',
                'category_slug' => 'required|unique:tblcategory|max:255',
                'category_description' => 'required|max:255',
                'category_enable' => 'required',
                'main_cate_id' => 'required',
            ],
            [
                'category_name.required' => 'Message: Need to fill the Name of Category',
                'category_slug.required' => 'Message: Need to fill the Slug of Category',
                'category_name.unique' => 'Message: Choose another Name of Category',
                'category_slug.unique' => 'Message: Choose another Slug of Category',
                'category_description.required' => 'Message: Need to fill the Description of Category',
            ]
        );
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        $category->category_description = $data['category_description'];
        $category->category_enable = $data['category_enable'];
        $category->main_cate_id = $data['main_cate_id'];
        $category->save();
        return redirect()->back()->with('status', 'Message: Add success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cate_name)
    {
         //fist take value first
         $cate = Category::where('category_name', $cate_name)->first()->category_id;
         $list_news = News::where('category_id', $cate)->paginate(25);
         $authors =Author::get();
         return view('enduser.page_by_cate')->with(compact('list_news', 'authors','cate_name'));
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
        $main_cate = MainCategory::orderBy('main_cate_name', 'ASC')->get();
        return view('admincp.category.edit')->with(compact('cate', 'main_cate'));
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
                'category_name' => 'required|max:255',
                'category_slug' => 'required|max:255',
                'category_description' => 'required|max:255',
                'category_enable' => 'required',
                'main_cate_id' => 'required',
            ],
            [
                'category_name.required' => 'Message: Need to fill the Name of Category',
                'category_slug.required' => 'Message: Need to fill the Slug of Category',
                'category_description.required' => 'Message: Need to fill the Description of Category',
            ]
        );
        $category = Category::find($id);
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        $category->category_description = $data['category_description'];
        $category->category_enable = $data['category_enable'];
        $category->main_cate_id = $data['main_cate_id'];
        $category->save();
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
        Category::find($id)->delete();

        return redirect()->back()->with('status', 'Message: Deleted success');
    }

    public function page($cate_name)
    {

    }
}
