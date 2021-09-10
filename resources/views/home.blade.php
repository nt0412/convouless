@include('banner')
@include('header')
@php
use App\Models\News;
$news = News::where('news_enable',1)->with('category')->orderBy('news_id', 'DESC')->paginate(25);
@endphp
<style>
    .lamgon {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        display: -webkit-box;
    }

    .w-5 {
        display: none;
    }
</style>
@php
use App\Models\Author;


$newshot1_1 = $news[0]->where('news_id', $newshot1s[0]->news_id)->first();
$newshot1_2 = $news[1]->where('news_id', $newshot1s[1]->news_id)->first();
$newshot1_3 = $news[2]->where('news_id', $newshot1s[2]->news_id)->first();
$newshot1_4 = $news[3]->where('news_id', $newshot1s[3]->news_id)->first();
$newshot1_5 = $news[4]->where('news_id', $newshot1s[4]->news_id)->first();
$newshot1_6 = $news[5]->where('news_id', $newshot1s[5]->news_id)->first();
$newshot1_7 = $news[6]->where('news_id', $newshot1s[6]->news_id)->first();
// dd($newshot1_2->news_id);
@endphp
<!-- API COVID 19 -->
@include('enduser.page_covid19')
<div class="container" id="grad" style="border-radius: 10px;">
    <div id="newshot1">
        <div class="row">
            <div class="col-sm-8" style="padding: 1px;">
                <div class="card">
                    <div class="row" style="margin-right: 0;">
                        <div class="col-sm-6" style="padding-right: 0;">
                            <img style="border-radius: 10px 0px 0px 10px;" src="{{ asset('public/images') }}/{{ $newshot1_1->news_img }}">
                        </div>
                        <div class="col-sm-6" style="background: black; border-radius: 0px 10px 10px 0px;">
                            <div class="title-main">
                                <a href="{{route('news.show',[$newshot1_1->news_slug])}}">
                                    <h2 class="title-big">{{ $newshot1_1->news_title }} </h2>
                                </a>
                                <h5 class="hot-news-author">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $newshot1_1->author_id)->first()->author_display_name }}">
                                        {{ Author::where('author_id', $newshot1_1->author_id)->first()->author_display_name }}
                                    </a></h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-4" style="padding: 1px;">
                <div class="card">
                    <img style="border-radius: 10px" src="{{ asset('public/images') }}/{{ $newshot1_2->news_img }}" class="img-fluid">
                    <div class="hot-title" style="border-radius: 0px 0px 10px 10px;">
                        <a href="{{route('news.show',[$newshot1_2->news_slug])}}">
                            <h4 class="title-mini lamgon lamgon">{{ $newshot1_2->news_title }}</h4>
                        </a>
                        <h5 class="hot-news-author-mini">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $newshot1_2->author_id)->first()->author_display_name }}">{{ Author::where('author_id', $newshot1_2->author_id)->first()->author_display_name }}</a></h5>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-4" style="padding: 1px;">
                <div class="card">
                    <img style="border-radius: 10px" src="{{ asset('public/images') }}/{{ $newshot1_3->news_img }}" class="img-fluid">
                    <div class="hot-title" style="border-radius: 0px 0px 10px 10px;">
                        <a href="{{route('news.show',[$newshot1_3->news_slug])}}">
                            <h4 class="title-mini lamgon">{{ $newshot1_3->news_title }}</h4>
                        </a>
                        <h5 class="hot-news-author-mini">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $newshot1_3->author_id)->first()->author_display_name }}">{{ Author::where('author_id', $newshot1_3->author_id)->first()->author_display_name }}</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-8" style="padding: 1px;">
                <div class="card">
                    <div class="row" style="margin-right: 0; margin-left: 0;">
                        <div class="col-sm-6" style="background: black; border-radius: 10px 0px 0px 10px;">
                            <div class="title-main">
                                <a href="{{route('news.show',[$newshot1_4->news_slug])}}">
                                    <h2 class="title-big lamgon">{{ $newshot1_4->news_title }} </h2>
                                </a>
                                <h5 class="hot-news-author">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $newshot1_4->author_id)->first()->author_display_name }}">{{ Author::where('author_id', $newshot1_4->author_id)->first()->author_display_name }}</a></h5>
                            </div>
                        </div>
                        <div class="col-sm-6 p-0">
                            <img style="border-radius: 0px 10px 10px 0px;" src="{{ asset('public/images') }}/{{ $newshot1_4->news_img }}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" style="padding: 1px;">
                <div class="card">
                    <a href="{{route('news.show',[$newshot1_5->news_slug])}}">
                        <img style="border-radius: 10px;" src="{{ asset('public/images') }}/{{ $newshot1_5->news_img }}" class="img-fluid">
                    </a>
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_5->news_slug])}}">
                            <h4 class="title-mini lamgon">{{ $newshot1_5->news_title }}</h4>
                        </a>
                        <h5 class="hot-news-author-mini">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $newshot1_5->author_id)->first()->author_display_name }}">{{ Author::where('author_id', $newshot1_5->author_id)->first()->author_display_name }}</a></h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-4" style="padding: 1px;">
                <div class="card">
                    <a href="{{route('news.show',[$newshot1_6->news_slug])}}">
                        <img style="border-radius: 10px;" src="{{ asset('public/images') }}/{{ $newshot1_6->news_img }}" class="img-fluid">
                    </a>
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_6->news_slug])}}">
                            <h4 class="title-mini lamgon">{{ $newshot1_6->news_title }}</h4>
                        </a>
                        <h5 class="hot-news-author-mini">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $newshot1_6->author_id)->first()->author_display_name }}">{{ Author::where('author_id', $newshot1_6->author_id)->first()->author_display_name }}</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-4" style="padding: 1px;">
                <div class="card">
                    <a href="{{route('news.show',[$newshot1_7->news_slug])}}">
                        <img style="border-radius: 10px;" src="{{ asset('public/images') }}/{{ $newshot1_7->news_img }}" class="img-fluid">
                    </a>
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_7->news_slug])}}">
                            <h4 class="title-mini lamgon">{{ $newshot1_7->news_title }}</h4>
                        </a>
                        <h5 class="hot-news-author-mini">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $newshot1_7->author_id)->first()->author_display_name }}">{{ Author::where('author_id', $newshot1_6->author_id)->first()->author_display_name }}</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tinthuong">
        <div class="content">
            <div class="row" style="background-color: white;">
                <div class="col-sm-8">
                    <br>
                    {{-- foreach loop random item multi style --}}
                    @php
                    // tạo một mảng với các vị trí đánh số dạng trình bày
                    $index_news;
                    foreach ($news as $key => $value)
                    {
                        // $key = $key_i + 1;
                        // $index_news[$key] = rand(1,4);
                        if (($key + 1) % (5 + rand(0, 2)) == 0 && $index_news[$key - 1] != 3)
                        {
                            $index_news[$key] = 3;
                        }
                        else
                        {
                            if (($key + 1) % (3 + rand(0, 2)) == 0 && $index_news[$key - 1] != 2)
                            {
                                $index_news[$key] = 2;
                            }
                            else
                            {
                                $index_news[$key] = 1;
                            }
                        }
                    }
                    @endphp

                    @foreach ($news as $key => $item)
                    @if ($key >= 25)
                    @php
                    break;
                    @endphp
                    @else
                    @if ($index_news[$key] == 3)
                    <div class="type_3" style="background: black; border-radius: 10px;">
                        <div class="type_3_title">
                            <a href="{{ route('news.show', [$item->news_slug]) }}">
                                <h2 class="lamgon">{{ $item->news_title }}</h2>
                            </a>
                            <p class="type_3_summary lamgon">{{ $item->news_summary }}</p>
                            <p class="type_3_info">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">
                                    {{ Author::where('author_id', $item->author_id)->first()->author_display_name }}</a> | {{ $item->date_updated }}
                            </p>
                        </div>
                        <br>
                        <div class="news_image_type_3">
                            <a href="{{ route('news.show', [$item->news_slug]) }}">
                                <img src="{{ asset('public/images') }}/{{ $item->news_img }}">
                            </a>
                        </div>
                    </div>
                    @else
                    @if ($index_news[$key] == 2)
                    <div class="news_items_noibat">
                        <div class="row" style="margin: 16px 0; ">
                            <div class="col-sm-7" style="text-align: right;">
                                <h4 class="lamgon">{{ $item->news_summary }}</h4>
                                <div class="author">
                                    <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">
                                        <h5>{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-5 type_2_title">
                                <a href="{{ route('news.show', [$item->news_slug]) }}">
                                    <h2 class="lamgon" style="font-weight: bold;">{{ $item->news_title }}</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="news_items">
                        <div class="row">
                            <div class="col-sm-4">
                                <br>
                                <div class="news_image">
                                    <a href="{{ route('news.show', [$item->news_slug]) }}">
                                        <img src="{{ asset('public/images') }}/{{ $item->news_img }}" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <br>
                                <div class="title">
                                    <a href="{{ route('news.show', [$item->news_slug]) }}">
                                        <h4 class="lamgon" style="font-weight: bold;">
                                            {{ $item->news_title }}
                                        </h4>
                                    </a>
                                </div>

                                <div class=" news_static d-flex justify-content-start">
                                    <div class="author">
                                        by <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}</a>
                                    </div>

                                    <div style="border-left: 1px solid; margin: 5px;"></div>
                                    <div class="time">
                                        {{Carbon\Carbon::parse($item->date_updated)->format('l jS \of F Y')}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @endif
                    @endif

                    @endforeach
                </div>
                <br>
                <br>
                <div class="col-sm-4">
                    <div class="stick">
                        <h1 style="text-align: center; font-family: 'Anton'; color: #cc165c;">HOT NEWS</h1>
                        <div class="side-news-1">
                            <img src="{{ asset('public/images') }}/{{ $newshot1_1->news_img }}" class="img-fluid">
                            <div class="side-news">
                                <div class="side-title">
                                    <a href="{{route('news.show',[$newshot1_1->news_slug])}}">
                                        <h2>{{ $newshot1_1->news_title }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div style="margin-top: 1.5rem;" class="mx-auto d-flex justify-content-center">
                    {{ $news->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
