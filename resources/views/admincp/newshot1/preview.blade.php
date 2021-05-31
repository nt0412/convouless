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
$newshot1_10 = $news->where('news_id', $newshot1s[9]->news_id)->first();
// dd($newshot1_2->news_id);
@endphp
<div class="container" id="grad">
    <div id="newshot1">

        <div class="row">
            <div class="col-md-8 " style="padding: 1px;">
                <img src="{{ asset('public/images') }}/{{ $newshot1_1->news_img }}" class="img-fluid">
                <div class="title" style="padding: 10px; background-color: black;">
                    <a href="#" style="color: white">
                        <h4 style="font-weight: bold;">{{ $newshot1_1->news_title }}
                        </h4>
                    </a>
                </div>
            </div>
            <div class="col-sm-4" id="newshot1_2" style="padding: 1px;">
                <img src="{{ asset('public/images') }}/{{ $newshot1_2->news_img }}" class="img-fluid">
                <div class="title" style="padding: 10px; background-color: black;">
                    <a href="#" style="color: white">
                        <h4 style="font-weight: bold;">{{ $newshot1_2->news_title }}
                        </h4>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4" style="padding: 1px;">
                <img src="{{ asset('public/images') }}/{{ $newshot1_3->news_img }}" class="img-fluid">
                <div class="title" style="padding: 10px; background-color: black;">
                    <a href="#" style="color: white">
                        <h4 style="font-weight: bold;">{{ $newshot1_3->news_title }}
                    </a>
                </div>
            </div>

            <div class="col-sm-8" style="padding: 1px;">
                <img src="{{ asset('public/images') }}/{{ $newshot1_4->news_img }}" class="img-fluid">
                <div class="title" style="padding: 10px; background-color: black;">
                    <a href="#" style="color: white">
                        <h4 style="font-weight: bold;">{{ $newshot1_4->news_title }}

                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4" style="padding: 1px;">
                <img src="{{ asset('public/images') }}/{{ $newshot1_5->news_img }}" class="img-fluid">
                <div class="title" style="padding: 10px; background-color: black;">
                    <a href="#" style="color: white">
                        <h4 style="font-weight: bold;">{{ $newshot1_5->news_title }}
                    </a>
                </div>
            </div>

            <div class="col-sm-4" style="padding: 1px;">
                <img src="{{ asset('public/images') }}/{{ $newshot1_6->news_img }}" class="img-fluid">
                <div class="title" style="padding: 10px; background-color: black;">
                    <a href="#" style="color: white">
                        <h4 style="font-weight: bold;">{{ $newshot1_6->news_title }}
                    </a>
                </div>
            </div>

            <div class="col-sm-4" style="padding: 1px;">
                <img src="{{ asset('public/images') }}/{{ $newshot1_7->news_img }}" class="img-fluid">
                <div class="title" style="padding: 10px; background-color: black;">
                    <a href="#" style="color: white">
                        <h4 style="font-weight: bold;">{{ $newshot1_7->news_title }}
                    </a>
                </div>
            </div>
        </div>
        <div class="noibat my-3">
            <div class="row">
                <div class="col-sm-6 p-0">
                    <div class="card bg-dark text-white">
                        <img src="{{ asset('public/images') }}/{{ $newshot1_8->news_img }}" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"
                                style="font-family: nunito;font-weight: bold;text-transform: uppercase;">
                                {{ $newshot1_8->news_title }}
                            </h5>
                            <p class="card-text"> by <span style="color: red;">Jonas Bill</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 p-0">
                    <div class="card bg-dark text-white">
                        <img src="{{ asset('public/images') }}/{{ $newshot1_9->news_img }}" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"
                                style="font-family: nunito;font-weight: bold;text-transform: uppercase;">
                                {{ $newshot1_9->news_title }}
                            </h5>
                            <p class="card-text"> by <span style="color: red;">Bobb Bruce</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
