@include('header')
@php
use App\Models\News;
use App\Models\Author;
$news = News::get();
$auth = Author::where('author_id', 1)->first()->author_display_name;
@endphp
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@600&display=swap');

    img{
        border-radius: 10px;
    }

    body {
        overflow-x: hidden;
    }

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

    .card {
        background: transparent;
    }
</style>

<div class="container">
    <p style="text-align: center; font-family: Mukta Vaani; text-transform: uppercase; font-size: 4.5rem; margin-bottom: 0px;">{{ $cate_name }}</p>
    <!-- Những bài viết mới nhất data posts-->
    <div class="row" id="grad" style="border-radius: 10px;">
        @foreach ($list_news as $key => $item)
        @if ($key < 2)
        <div class="col-sm-6" style="padding: 1px;">
            <div class="card">
                <a href="{{ route('news.show', [$item->news_slug]) }}">
                    <img style="width: 100%; height: 30rem;" src="{{ asset('public/images') }}/{{ $item->news_img }}">
                </a>
                <div class="hot-title">
                    <a href="{{ route('news.show', [$item->news_slug]) }}" style="color: white">
                        <h4 class="lamgon" style="font-weight: bold;">{{ $item->news_title }}</h4>
                    </a>
                    <h5 class="hot-news-author-mini">By <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}</a></h5>
                </div>
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
                        foreach ($list_news as $key => $value)
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
                        @foreach ($list_news as $key => $item)
                        @if ($key >= 25)
                        @php
                        break;
                        @endphp
                        @else
                        @if ($key >= 2)
                        @if ($index_news[$key] == 3)
                        <div class="type_3" style="background: black; border-radius: 10px;">
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
                            <div class="news_image_type_3" style="border-radius: 10px;">
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
                                            <h5>{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-5 author">
                                    <a href="{{ route('news.show', [$item->news_slug]) }}">
                                        <h4 class="lamgon" style="font-weight: bold;">
                                            {{ $item->news_title }}
                                        </h4>
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
                                            by <a href="{{ asset('/author') }}/{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}">
                                                {{ Author::where('author_id', $item->author_id)->first()->author_display_name }}
                                            </a>
                                        </div>

                                        <div style="border-left: 1px solid; margin: 5px;"></div>
                                        <div class="time">
                                            {{ Carbon\Carbon::parse($item->date_updated)->format('l jS \of F Y') }}
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

            <div style="margin-top: 1.5rem;" class="mx-auto d-flex justify-content-center">
                {{ $list_news->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@include('footer')
