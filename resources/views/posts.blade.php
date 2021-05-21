@php
// echo $slug;

use App\Models\Category;
use App\Models\News;
use App\Models\Author;

//fist take value first
$news = News::where('news_slug', $slug)->first();
$news_cate = Category::select('category_name')->where('category_id', $news->category_id)->first()->category_name;
$news_author = Author::select('author_display_name')->where('author_id', $news->author_id)->first()->author_display_name;

// list các bài biết liên quan theo loại 
$list_news_by_cate = News::where('category_id', $news->category_id )->get();
// dd($list_news_by_cate);
// dd($author);
// $authu = Author::where()



@endphp
@include('header')
<style>
    .relate_news .col-sm-4 {
        padding: 1px;
    }

    h4:hover {
        color: #cc165c;
    }

</style>
</style>
<div class="container-fluid">
    <div class="news-main-image">
        <!-- ĐỂ XUẤT RA MAIN IMAGE CỦA BÀI VIẾT -->
        <img src="@php echo $news->news_img; @endphp" class="img-fluid">
    </div>
    <div class="container" style="background-color: white !important; color: black;">
        <div class="title">
            <!-- TIÊU ĐỀ CỦA BÀI VIẾT -->
            <h1>{{$news->news_title}}</h1>
            <div class="author">
                <!-- TÁC GIÀ, KÈM NGÀY THÁNG NĂM NẾU CÓ -->
                <p>by <a href="#" style="color: #cc165c;">{{$news_author}}</a></p>
            </div>
        </div>
        <div class="content">
            <!-- NỘI DUNG BÀI VIẾT -->
            <p>
               @php
                   echo $news->news_content;
               @endphp
            </p>
            <!-- Đây là chữ kết thúc để kết thúc bài viết đừng sửa nhé -->
            <p style="text-align: center; font-family: sans-serif;">
                END.
            </p>
        </div>
    </div>
    <!-- CÁC TIN TỨC LIÊN QUAN -->
    <h1 style="font-family: sans-serif; font-weight: bold; text-align: center;">Relate news</h1>
    <div class="relate_news row" id="grad">
        @foreach ($list_news_by_cate as $item)
        <div class="col-sm-4">
            <img src="{{$item->news_img}}" class="img-fluid">
            <div class="title" style="padding: 10px; background-color: black;">
                <a href="#" style="color: white">
                    <h4 style="font-weight: bold;">
                        {{$item->news_title}}
                    </h4>
                </a>
            </div>
        </div>
        @endforeach

    </div>


</div>
@include('footer')
