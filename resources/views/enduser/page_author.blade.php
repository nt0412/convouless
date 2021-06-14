@include('header')
@php
    // dd($news_by_author,$author);
use App\Models\News;
$count = News::where('author_id',$author->author_id)->count();
// dd(News::where('author_id',$author->author_id)->count());
@endphp
<style>
    body{
        overflow-x: hidden;
    }
    .page-link{
        background-color: red;
    }
</style>
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
                                </span> Number of post: {{$count}}
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

                    @foreach ($news_by_author as $key => $item)
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
