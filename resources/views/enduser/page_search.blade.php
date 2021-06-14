@include('header')
@php
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
    <!-- Những bài viết mới nhất data posts-->
    <div class="content">
        <div class="row" style="background-color: white;">
            <div class="col-sm-8">
                {{-- list author --}}
                <div id="cate">

                    @foreach ($list_author as $item)
                    <div class="news_items">
                        <h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">author</th>
                                    <th scope="col">
                                        <a href="{{ asset('/author') }}/{{$item->author_display_name}}">
                                            {{$item->author_display_name}}
                                        </a>
                                    </th>
                                    </tr>
                                </thead>
                            </table>
                        </h4>
                    </div>
                    @endforeach
                </div>
                {{-- list categoryry --}}
                <div id="cate">

                    @foreach ($list_cate as $item)
                    <div class="news_items">
                        <div class="row">
                            <div class="col-sm-4">
                                <br>
                                <div class="news_image">
                                    <a class='nav-link' href='{{route('category.show',[$item->category_slug])}}'>
                                        <h1>
                                            {{$item->category_name}}
                                        </h1>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <br>
                                <div class="title">
                                    <a href="#">
                                        <h4 class="lamgon" style="font-weight: bold;">
                                            {{ $item->category_description }}
                                        </h4>
                                    </a>
                                </div>

                                <div class=" news_static d-flex justify-content-start">
                                    <div>
                                        @php
                                            $news_ = $news->where('category_id',$item->category_id);
                                            $key_ = 0;
                                            foreach ($news_ as $key => $value) {
                                                $key_ += 1;
                                            }
                                            @endphp
                                            <p>Number of posts {{$key_}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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
                                                                <p class="type_3_info">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">
                                                                    {{ Author::where('author_id', $item->author_id)->first()->author_display_name }}</a>
                                                                </p>
                                                            </div>

                                                            <div style="border-left: 1px solid; margin: 5px;"></div>
                                                            <div class="time">
                                                                {{ Carbon\Carbon::parse($item->date_updated)->format('l jS \of F Y') }}
                                                            </div>
                                                            <div style="border-left: 1px solid; margin: 5px;"></div>

                                                            <div class="comment">

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
                        <div class="row">
                            <div class="col-sm-4">
                                <br>
                                <div class="news_image">
                                    <img src="{{ url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg') }}"
                                        class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <br>
                                <div class="title">
                                    <a href="#">
                                        <h4 style="font-weight: bold;">Hardware, apps, and much more and much more. From
                                            top companies like Google and Apple to tiny startups
                                        </h4>
                                    </a>
                                </div>
                                <div class=" news_static d-flex justify-content-start">
                                    <div class="author">
                                        by <a href="#">John Thomas</a>
                                    </div>

                                    <div style="border-left: 1px solid; margin: 5px;"></div>
                                    <div class="time">
                                        {{-- Today at 11:12am --}}

                                    </div>
                                    <div style="border-left: 1px solid; margin: 5px;"></div>

                                    <div class="comment">

                                    </div>
                                </div>
                            </div>
                        </div>
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
