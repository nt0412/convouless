@include('header')
@php
    // dd($news_by_author,$author);
use App\Models\News;
$count = News::where('author_id',$author->author_id)->count();
// dd(News::where('author_id',$author->author_id)->count());
@endphp
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3 " style="position: fixed;top: 87px;width: 24%;"">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Details</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="http://localhost/Convouless/public/images/1622450532_image (4).jpg" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        {{-- <img src="{{asset('public/images/')}}/{{$item->news_img}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" /> --}}
                        <h5 class="card-title mb-0">{{$author->author_display_name}}</h5>
                        <div class="text-muted mb-2">Author</div>

                        <div>
                            <a class="btn btn-primary btn-sm" href="#">Follow</a>
                            <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">About</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">
                                <span data-feather="home" class="feather-sm me-1">
                                </span>  {{$count}}
                            </li>
                            <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span>
                                Email <a href="#">{{$author->author_email}}</a>
                            </li>
                        </ul>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Profile</h5>
                        {{$author->author_profile}}
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Activities</h5>
                    </div>
                    <div class="card-body h-100">
                        @php
                    // tạo một mảng với các vị trí đánh số dạng trình bày
                    $index_news;
                    foreach ($news_by_author as $key => $value){
                    // $key = $key_i + 1;
                    // $index_news[$key] = rand(1,4);
                    if (($key + 1) % (5 + rand(0, 2)) == 0 && $index_news[$key - 1] != 3){
                    $index_news[$key] = 3;
                    }
                    else{
                    if (($key + 1) % (3 + rand(0, 2)) == 0 && $index_news[$key - 1] != 2){
                    $index_news[$key] = 2;
                    }
                    else{
                    $index_news[$key] = 1;
                    }
                    }
                    }
                    @endphp

                    @foreach ($news_by_author as $key => $item)
                    @if ($key >= 25)
                        @php
                            break;
                        @endphp
                    @else
                    @if ($index_news[$key] == 3)
                    <div class="type_3" style="background: black;">
                        <div class="type_3_title">
                            <a href="{{ route('news.show', [$item->news_slug]) }}">
                                <h2 class="lamgon">{{ $item->news_title }}</h2>
                            </a>
                            <p class="type_3_summary lamgon">{{ $item->news_summary }}</p>
                            <p class="type_3_info">By <a href="#">
                                {{ $author->author_display_name}}
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
                                    <a href="#">
                                        <h5>{{ $author->author_display_name}}</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-5 type_2_title">
                                <a href="{{ route('news.show', [$item->news_slug]) }}">
                                    <h4 class="lamgon" style="font-weight: bold;">{{ $item->news_title }}</h4>
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
                                        by <a href="#">{{ $author->author_display_name}}</a>
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
                    <div class="mx-auto" style="width: 400px;">
                        {{ $news_by_author->links('pagination::bootstrap-4') }}
                    </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</main>
