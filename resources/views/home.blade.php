@include('banner')
@include('header')
@php
use App\Models\News;
use App\Models\Author;
// use Illuminate\Support\Facades\Auth;

$news = News::get();
$auth = Author::where('author_id', 1)->first()->author_display_name;
// dd($auth);

$newshot1_1 = $news->where('news_id', $newshot1s[0]->news_id)->first();
$newshot1_2 = $news->where('news_id', $newshot1s[1]->news_id)->first();
$newshot1_3 = $news->where('news_id', $newshot1s[2]->news_id)->first();
$newshot1_4 = $news->where('news_id', $newshot1s[3]->news_id)->first();
$newshot1_5 = $news->where('news_id', $newshot1s[4]->news_id)->first();
$newshot1_6 = $news->where('news_id', $newshot1s[5]->news_id)->first();
$newshot1_7 = $news->where('news_id', $newshot1s[6]->news_id)->first();
$newshot1_8 = $news->where('news_id', $newshot1s[7]->news_id)->first();
$newshot1_9 = $news->where('news_id', $newshot1s[8]->news_id)->first();

// dd($newshot1_2->news_id);
@endphp
<div class="container" id="grad">
    <div id="newshot1">
        <div class="row">
            <div class="col-md-8 " style="padding: 1px;">
                <div class="card bg-dark">
                    <img src="{{ asset('public/images') }}/{{ $newshot1_1->news_img }}" class="img-fluid">
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_1->news_slug])}}">
                            <h4 style="font-weight: bold;">{{ $newshot1_1->news_title }}</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4" style="padding: 1px;">
                <div class="card bg-dark">
                    <img src="{{ asset('public/images') }}/{{ $newshot1_2->news_img }}" class="img-fluid">
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_2->news_slug])}}">
                            <h4 style="font-weight: bold;">{{ $newshot1_2->news_title }}</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4" style="padding: 1px;">
                <div class="card bg-dark">
                    <img src="{{ asset('public/images') }}/{{ $newshot1_3->news_img }}" class="img-fluid">
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_3->news_slug])}}">
                            <h4 style="font-weight: bold;">{{ $newshot1_3->news_title }}</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-8" style="padding: 1px;">
                <div class="card bg-dark">
                    <img src="{{ asset('public/images') }}/{{ $newshot1_4->news_img }}" class="img-fluid">
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_4->news_slug])}}">
                            <h4 style="font-weight: bold;">{{ $newshot1_4->news_title }}</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" style="padding: 1px;">
                <div class="card bg-dark">
                    <img src="{{ asset('public/images') }}/{{ $newshot1_5->news_img }}" class="img-fluid">
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_5->news_slug])}}">
                            <h4 style="font-weight: bold;">{{ $newshot1_5->news_title }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4" style="padding: 1px;">
                <div class="card bg-dark">
                    <img src="{{ asset('public/images') }}/{{ $newshot1_6->news_img }}" class="img-fluid">
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_6->news_slug])}}">
                            <h4 style="font-weight: bold;">{{ $newshot1_6->news_title }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4" style="padding: 1px;">
                <div class="card bg-dark">
                    <img src="{{ asset('public/images') }}/{{ $newshot1_7->news_img }}" class="img-fluid">
                    <div class="hot-title">
                        <a href="{{route('news.show',[$newshot1_7->news_slug])}}">
                            <h4 style="font-weight: bold;">{{ $newshot1_7->news_title }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="noibat">
            <div class="row">
                <div class="col-sm-6 p-0">
                    <div class="card bg-dark">
                        <img src="{{ asset('public/images') }}/{{ $newshot1_8->news_img }}" class="img-fluid">
                        <div class="hot-title">
                            <a href="{{route('news.show',[$newshot1_8->news_slug])}}">
                                <h4 style="font-weight: bold;">
                                    {{ $newshot1_8->news_title }}
                                </h4>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 p-0">
                    <div class="card bg-dark">
                        <img src="{{ asset('public/images') }}/{{ $newshot1_9->news_img }}" class="img-fluid">
                        <div class="hot-title">
                            <a href="{{route('news.show',[$newshot1_9->news_slug])}}">
                                <h4 style="font-weight: bold;">
                                    {{ $newshot1_9->news_title }}
                                </h4>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tinthuong">
        <div class="mota" style="text-align: center;">
            <h3 class="fs-1 text-uppercase " style="font-weight: bold;">tech</h3>
            <p class="fs-4">The latest tech news about the world's best
                (and sometimes worst) hardware, apps, and much more. From
                top companies like Google and Apple to tiny startups vying
                for your attention, Verge Tech has the latest in what matters in technology daily.</p>
        </div>


        <div class="content">
            <div class="row" style="background-color: white;">
                <div class="col-sm-8">
                    <br>
                    {{-- foreach loop random item multi style --}}

                    @php
                        // tạo một mảng với các vị trí đánh số dạng trình bày
                        $index_news;
                        foreach ($news as $key => $value) {
                            // $key = $key_i + 1;
                            // $index_news[$key] = rand(1,4);
                            if (($key + 1) % (5 + rand(0, 2)) == 0 && $index_news[$key - 1] != 3) {
                                $index_news[$key] = 3;
                            } else {
                                if (($key + 1) % (3 + rand(0, 2)) == 0 && $index_news[$key - 1] != 2) {
                                    $index_news[$key] = 2;
                                } else {
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
                                <div class="type_3" style="background: black;">
                                    <div class="type_3_title">
                                        <a href="{{ route('news.show', [$item->news_slug]) }}">
                                            <h4>{{ $item->news_title }}</h4>
                                        </a>
                                        <p class="type_3_summary">{{ $item->news_summary }}</p>
                                        <p class="type_3_info">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">
                                            {{ Author::where('author_id', $item->author_id)->first()->author_display_name }}</a> |
                                            {{ $item->date_updated }}
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
                                                <h4>{{ $item->news_summary }}</h4>
                                                <div class="author">
                                                    <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">
                                                        <h5>{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}</h5>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 author">
                                                <a href="{{ route('news.show', [$item->news_slug]) }}">
                                                    <h4 style="font-weight: bold;">{{ $item->news_title }}</h4>
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
                                                    <a href="{{route('news.show',[$item->news_img])}}">
                                                        <img src="{{ asset('public/images') }}/{{ $item->news_img }}"
                                                            class="img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <br>
                                                <div class="title">
                                                    <a href="{{ route('news.show', [$item->news_slug]) }}">
                                                        <h4 style="font-weight: bold;">
                                                            {{ $item->news_title }}
                                                        </h4>
                                                    </a>
                                                </div>

                                                <div class=" news_static d-flex justify-content-start">
                                                    <div class="author">
                                                        by <a href="#">{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}</a>
                                                    </div>

                                                    <div style="border-left: 1px solid; margin: 5px;"></div>
                                                    <div class="time">
                                                        {{ $item->date_updated }}
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

                <div class="col-sm-4">
                    <div class="video">
                        <h4 class="text-center fs-1"
                            style="border-bottom: 2px solid #b973ff; font-family: sans-serif; margin-top: 2%;">News
                            video
                        </h4>
                        <div class="video_items">
                            <ul style="padding-left: 0px;">
                                <li style="position: relative;">
                                    <div style="overflow: hidden;">
                                        <img class="img-fluid"
                                            src="{{ url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg') }}" alt="">
                                    </div>
                                    <i class="fas fa-play"
                                        style="color:whitesmoke; position: absolute;top: 35%;font-size: 80px;right: 39%;"></i>
                                </li>
                                <li class="title">
                                    <a href="">
                                        <h5 style="font-weight: bold;">Hardware, apps, and much more and much more. From
                                            top companies like Google and Apple to tiny startups</h5>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('footer')
