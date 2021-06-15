@include('header')
@php
// dd($news_by_author,$author);
use App\Models\News;
$count = News::where('author_id',$author->author_id)->count();
// dd(News::where('author_id',$author->author_id)->count());
@endphp
<style>
    body {
        overflow-x: hidden;
    }

    .news-item {
        border-top: 0px;
    }
</style>
<main class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card mb-3 " style="position: fixed; width: 24%;">
                    <div class=" card-header">
                    <h5 style="text-align: center;" class="card-title mb-0">Profile</h5>
                </div>
                <div class="card-body text-center">
                    <img src="" alt="Author's avatar" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                    {{-- <img src="{{asset('public/images/')}}/{{$item->news_img}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" /> --}}
                    <h5 class="card-title mb-0">{{$author->author_display_name}}</h5>
                    <div class="text-muted mb-2">Author</div>

                    <!-- <div>
                        <a class="btn btn-primary btn-sm" href="#">Follow</a>
                        <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
                    </div> -->
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="h6 card-title">Specific description:</h5>
                        </div>

                        <div class="col-sm-8">
                            <li class="mb-1">
                                <span data-feather="home" class="feather-sm me-1">
                                </span> Number of post: {{$count}}
                            </li>
                            <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span>
                                Email <a style="color: #cc165c; text-decoration: none;" href="#">{{$author->author_email}}</a>
                            </li>
                        </div>
                    </div>
                </div>
                <!-- <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">Profile</h5>
                    {{$author->author_profile}}
                </div> -->
            </div>
        </div>

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="text-align: center;" class="card-title mb-0">Author's posts</h3>
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
                    <div style="margin-top: 1.5rem;" class="mx-auto d-flex justify-content-center">
                        {{ $news_by_author->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
