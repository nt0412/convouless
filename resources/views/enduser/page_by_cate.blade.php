@include('header')
@php
// echo number_format("160469213");
use App\Models\News;
use App\Models\Author;
$news = News::get();
$auth = Author::where('author_id', 1)->first()->author_display_name;
@endphp
<style>
    body::-webkit-scrollbar {
        width: 0.25rem;
    }

    body::-webkit-scrollbar-track {
        background: black;
    }

    body::-webkit-scrollbar-thumb {
        background: goldenrod;
    }

    h4:hover {
        color: #cc165c;
    }

    .lamgon {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        display: -webkit-box;
    }

</style>

<div class="container">
    <h1 style="text-align: center; font-family: sans-serif; text-transform: capitalize">NEWS {{ $cate_name }}</h1>
    <!-- Những bài viết mới nhất data posts-->
    <div class="row" id="grad">
        @foreach ($list_news as $key => $item)
            @if ($key < 2)
                <div class="col-sm-6" style="padding: 1px;">
                    <a href="{{ route('news.show', [$item->news_slug]) }}">
                        <img class="img-fluid" src="{{ asset('public/images') }}/{{ $item->news_img }}">
                    </a>
                    <div class="title" style="padding: 10px; background-color: black;">
                        <a href="{{ route('news.show', [$item->news_slug]) }}" style="color: white">
                            <h4 class="lamgon" style="font-weight: bold;">{{ $item->news_title }}</h4>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
    <div class="content">
        <div class="row" style="background-color: white;">
            <div class="col-sm-8">
                <div class="news">
                    <div class="news_items">
                        <br>
                        {{-- foreach loop random item multi style --}}
                        @php
                            // tạo một mảng với các vị trí đánh số dạng trình bày
                            $index_news;
                            foreach ($list_news as $key => $value) {
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

                        @foreach ($list_news as $key => $item)
                            @if ($key >= 25)
                                @php
                                    break;
                                @endphp
                            @else
                                @if ($key >= 2)
                                    @if ($index_news[$key] == 3)
                                        <div class="type_3" style="background: black;">
                                            <div class="type_3_title">
                                                <a href="{{ route('news.show', [$item->news_slug]) }}">
                                                    <h4 class="lamgon">{{ $item->news_title }}</h4>
                                                </a>
                                                <p class=" lamgon type_3_summary">{{ $item->news_summary }}</p>
                                                <p class="type_3_info">By
                                                    <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">
                                                    {{ Author::where('author_id', $item->author_id)->first()->author_display_name }}
                                                    </a> | {{ $item->date_updated }}
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
                                                            <a
                                                                href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">
                                                                <h5>{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}
                                                                </h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 author">
                                                        <a href="{{ route('news.show', [$item->news_slug]) }}">
                                                            <h4 class="lamgon" style="font-weight: bold;">
                                                                {{ $item->news_title }}</h4>
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
                                                            <a href="{{ route('news.show', [$item->news_img]) }}">
                                                                <img src="{{ asset('public/images') }}/{{ $item->news_img }}"
                                                                    class="img-fluid">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <br>
                                                        <div class="title">
                                                            <a href="#">
                                                                <h4 class="lamgon" style="font-weight: bold;">
                                                                    {{ $item->news_title }}
                                                                </h4>
                                                            </a>
                                                        </div>

                                                        <div class=" news_static d-flex justify-content-start">
                                                            <div class="author">
                                                                by <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">
                                                    {{ Author::where('author_id', $item->author_id)->first()->author_display_name }}

                                                            </a>
                                                            </div>

                                                            <div style="border-left: 1px solid; margin: 5px;"></div>
                                                            <div class="time">
                                                                {{ Carbon\Carbon::parse($item->date_updated)->format('l jS \of F Y') }}
                                                            </div>
                                                            <div style="border-left: 1px solid; margin: 5px;"></div>

                                                            <div class="comment">
                                                                <a href="#">
                                                                    123 comments
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    @endif
                                @endif

                            @endif

                        @endforeach
                      
                    </div>
                </div>
            </div>
            <!-- Tin có video -->
            <div class="col-sm-4">
                <div class="video">
                    <h4 class="text-center fs-1"
                        style="border-bottom: 2px solid #b973ff; font-family: sans-serif; margin-top: 2%;">News video
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

            <div class="mx-auto" style="width:400px;">
                {{ $list_news->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</div>
@include('footer')
