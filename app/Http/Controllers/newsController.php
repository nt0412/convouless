<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class newsController extends Controller
{
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
        $list_news = news::with('category')->orderBy('news_id', 'DESC')->get();
        return view('admincp.news.index')->with(compact('list_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Auth::id();

        $cate = Category::orderBy('category_name', 'ASC')->get();
        // dd();
        return view('admincp.news.create')->with(compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('news_img')->getClientOriginalName());
        // return {{asset('images')}};

        $data = $request->validate(
            [
                'news_title' => 'required|unique:tblnews|max:255',
                'news_slug' => 'required|unique:tblnews|max:255',
                'news_metatile' => 'required',
                'news_summary' => 'required',
                'news_content' => 'required',
                'news_enable' => 'required',
            ],
            [
                'news_title.required' => 'Message: Need to fill the Name of post',
                'news_slug.required' => 'Message: Need to fill the Slug of post',
                'news_content.required' => 'Message: Need to fill the Content of post',
                'news_metatile.required' => 'Message: Need to fill the Metatile of post',
                'news_summary.required' => 'Message: Need to fill the Summary of post',
                // 'news_img.required' => 'Message: Need to fill the Description of posts',
                // 'news_enable.required' => 'Message: Need to fill the Description of posts',

                'news_title.unique' => 'Message: Choose another Name of post',
                'news_slug.unique' => 'Message: Choose another Slug of post',
            ]
        );
        // return $data;


        $news = new News();

        $news->news_title = $data['news_title'];
        $news->news_slug = $data['news_slug'];
        $news->news_content = $data['news_content'];
        $news->news_enable = $data['news_enable'];
        $news->category_id = $request->category_id;
        $news->news_metatile = $data['news_metatile'];
        $news->news_summary = $data['news_summary'];
        $news->date_updated = date(now());


        $news->author_id = Auth::id();
        $getnews_img = '';
        if ($request->hasFile('news_img')) {

            //Lưu file vào thư mục public/upload/news_img
            $news_img = $request->file('news_img');
            $getnews_img = time() . '_' . $news_img->getClientOriginalName();
            $destinationPath = public_path('images');
            $news_img->move($destinationPath, $getnews_img);
        }
        $news->news_img = $getnews_img;
        $news->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //fist take value first
        $news = News::where('news_slug', $slug)->first();
        $authors = Author::where('author_id', $news->author_id)->first();
        // list các bài biết liên quan theo loại
        $list_news_by_cate = News::where('category_id', $news->category_id)->get();
        $list_news_by_author = News::where('author_id', $authors->author_id)->orderBy('date_posted', 'DESC')->get();
        return view('enduser.page_slug')->with(compact('list_news_by_cate', 'list_news_by_author', 'news', 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        // $list_cate = news::with('category')->get();
        $cate = Category::orderBy('category_name', 'ASC')->get();

        // print_r ($list_news);
        return view('admincp.news.edit')->with(compact('news', 'cate'));
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
        // dd($request);
        // kiểm tra trong reqest có up file không
        $news = News::find($id);

        if ($request->hasFile('news_img')) {
            $news->news_img = $request->news_img;
        } else {
            $news->news_img =  $news->news_img;
        }
        $data = $request->validate(
            [
                'news_title' => 'required',
                'news_slug' => 'required',
                'news_content' => 'required',
                'news_enable' => 'required',
                'category_id' => 'required',
                'news_metatile' => 'required',
                'news_summary' => 'required',
                // 'news_img' => 'required',
            ],
            [
                'news_title.required' => 'Message: Need to fill the Name of post',
                'news_slug.required' => 'Message: Need to fill the Slug of post',
                'news_content.required' => 'Message: Need to fill the Content of post',
                'news_enable.required' => 'Message: Need to fill the Enable of post',
                'category_id.required' => 'Message: Need to fill the Category of post',
                'news_metatile.required' => 'Message: Need to fill the Metatile of post',
                'news_summary.required' => 'Message: Need to fill the Summary of post',
                'news_img.required' => 'Message: Need to fill the IMG of post',
            ]
        );


        $news->news_title = $data['news_title'];
        $news->news_slug = $data['news_slug'];
        $news->news_content = $data['news_content'];
        $news->news_enable = $data['news_enable'];
        $news->category_id = $request->category_id;
        $news->news_metatile = $data['news_metatile'];
        $news->news_summary = $data['news_summary'];
        $getnews_img = '';

        //nếu có file thì thực hiện đổi tên và di chuyển
        if ($request->hasFile('news_img')) {
            //Lưu file vào thư mục public/upload/news_img
            $destinationPath = public_path('images');
            $news_img = $request->file('news_img');
            $getnews_img = time() . '_' . $news_img->getClientOriginalName();
            $news_img->move($destinationPath, $getnews_img);
            $news->news_img = $getnews_img;
        } else {
            // nếu không thì lấy lai file cũ
            $news->news_img =  $news->news_img;
        }
        $news->date_updated = date(now());
        $news->author_id = Auth::id();
        $news->update();

        return $this->index()->with('status', 'Message: Updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->back()->with('status', 'Message: Deleted success');
    }
    //up load file of edit
    public function upload_ckeditor(Request $request)
    {
        $request->upload->move(public_path('uploads/news'), $request->file('upload')->getClientOriginalName());
        // echo $request;
        echo json_encode(array('file_name' => $request->file('upload')->getClientOriginalName()));
    }

    public function file_brower()
    {
        $paths = glob(public_path('uploads/news/*'));
        $fileNames = array();
        foreach ($paths as $path) {
            array_push($fileNames, basename($path));
        }
        $data = array(
            'fileNames' => $fileNames
        );
        return view('admincp.news.file_brower')->with($data);
    }
}
