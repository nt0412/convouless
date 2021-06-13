@php
use App\Models\Category;
use App\Models\MainCategory;
$list_main_cate = MainCategory::orderBy('main_cate_name','DESC')->get();

@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convouless</title>
    <link rel="shortcut icon" href="{{url('/image/logo.ico')}}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            color: whitesmoke;
            background-color: black;
        }

        #navbarNav {
            transition: 0.5s;
            color: transparent;
        }

        #navbarNav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: larger;
        }

        #navbarNav a:hover {
            color: #cc165c;
            text-decoration: #cc165c;
        }

        .dropdown-menu {
            background-color: #cc165c;
            border-radius: 0px;
        }

        .dropdown-menu a:hover {
            background-color: black;
            color: #cc165c;
        }

        .contact {
            color: whitesmoke;
        }

        .contact :hover {
            color: #cc165c;
        }

        .contact a {
            color: white;
            font-size: 15px;
            text-decoration: none;
        }

        .contact a:hover {
            color: rgb(217, 147, 173);
            text-decoration: none;
        }

        #grad {
            background: linear-gradient(90deg, #f7c626 15%, #f68c2f 40%, #e5127d 85%);
        }

        .content {
            color: black;
        }

        ul li {
            list-style: none;
        }

        .noibat .row {
            background: linear-gradient(90deg, #f7c626 15%, #f68c2f 40%, #e5127d 85%);
        }

        .noibat .card {
            margin: 3px;
        }

        .material-icons :hover {
            border-color: #cc165c;
        }

        .news_items {
            margin: 16px;
            border-top: 2px solid #e0e0e0;
        }

        .news_items_noibat {
            border-top: 2px solid #e0e0e0;
        }

        .news_items_noibat .title {
            font-family: 'Krona One', sans-serif;
            font-size: 30px;
            color: red;
            text-transform: uppercase;
            font-style: italic;
        }

        .news_items_noibat2 image {
            height: 500px;
            overflow: hidden;
        }

        .author a {
            color: #cc165c;
            text-decoration: none;
        }

        .author a:hover {
            color: darkred;
            text-decoration: none;
        }

        .title a {
            color: black;
            text-decoration: none;
            text-transform: uppercase;
        }

        .title a:hover {
            color: #cc165c;
            text-decoration: none;
        }

        .title a h4:hover {
            color: #cc165c;
            text-decoration: none;
        }

        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        @media (max-width: 767px) {
            ul {
                text-align: center;
            }
        }

        #newshot1 img {
            height: 400px;
            width: 100%;
        }

        .hot-title {
            position: absolute;
            bottom: 0px;
            background: rgba(0, 0, 0);
            width: 100%;
            text-align: left;
            padding-left: 16px;
            padding-top: 16px;
            margin-right: 1px;
            text-transform: uppercase;
        }

        .title-big {
            padding: 32px;
            font-family: 'Anton', sans-serif;
            padding-bottom: 0;
            text-transform: uppercase;

        }

        .title-main a {
            color: white;
            text-decoration: none;
            text-transform: uppercase;
        }

        .title-main a:hover {
            color: #cc165c;
        }

        .title-mini:hover {
            color: #cc165c;
        }

        .title-mini{
            font-family: 'Barlow Condensed', sans-serif;
        }

        .hot-news-author {
            padding: 32px;
            font-family: 'Anton', sans-serif;
            padding-top: 0;
        }

        .hot-news-author a {
            color: #cc165c;
        }

        .hot-news-author a:hover {
            color: darkred;
        }

        .hot-news-author-mini {
            font-family: 'Anton', sans-serif;
            padding-top: 0;
        }

        .hot-title a {
            color: white;
            text-decoration: none;
            font-size: 1.25rem;
        }

        .hot-news-author-mini a {
            color: #cc165c;
        }

        .hot-news-author-mini a:hover {
            color: darkred;
        }

        .hot-title:hover {
            background: rgb(0, 0, 0);
        }

        #newshot1 .card {
            border-radius: 0px;
            background: transparent;
        }

        .news_image_type_3 img {
            width: 100%;
            height: 30rem;
        }

        .type_3_title a {
            color: whitesmoke;
            text-decoration: none;
            font-family: 'Anton', sans-serif;
            margin-top: 2rem;
            text-transform: uppercase;
        }

        .type_3_title a:hover {
            color: #cc165c;
        }

        .type_3_summary {
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 0;
        }

        .type_3_info {
            color: white;
            font-weight: bold;
            margin-bottom: 0;
        }

        .type_3_info a {
            font-family: 'Poppins', sans-serif;
            margin-bottom: 0;
            color: #cc165c;
        }

        .type_3_info a:hover {
            color: darkred;
        }

        .type_3_title {
            padding-left: 1rem;
            padding-top: 1rem;
            text-transform: uppercase;
        }
        .type_2_title {
            text-transform: uppercase;
        }
        .type_2_title a {
            text-transform: uppercase;
            color: #cc165c;
            text-decoration: none;
            font-family: 'Anton', sans-serif;
            letter-spacing: 0.15rem;
            font-style: italic;
        }

        .type_2_title a:hover {
            color: darkred;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-md navbar-dark" style="background-color: black !important;">
                <a class="navbar-brand" href="../../../Convouless/">
                    <img src="{{url('image/logo.png')}}" class="img-fluid">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <img src="{{url('image/view_headline_white_24dp.svg')}}">
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        @foreach ($list_main_cate as $main)
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                                {{$main->main_cate_name}}
                            </a>
                            <div class='dropdown-menu' style='text-align: center; transition: all 1s ease-in;'>
                                @php
                                $list_cate = Category::where('main_cate_id', $main->main_cate_id)->orderBy('category_name','ASC')->get();
                                @endphp
                                @foreach ($list_cate as $item)
                                <a class='nav-link' href='{{route('category.show',[$item->category_slug])}}'>
                                    {{$item->category_name}}
                                </a>
                                @endforeach
                            </div>
                        </li>
                        @endforeach

                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                                About us
                            </a>
                            <div class='dropdown-menu' style='text-align: center;'>
                                <a class='nav-link' href='#'>
                                    <img src="{{url('image/social_media_icon/facebook.png')}}" class='img-fluid'> Facebook
                                </a>
                                <a class='nav-link' href='#'>
                                    <img src="{{url('image/social_media_icon/instagram.png')}}" class='img-fluid'> Instagram
                                </a>
                                <a class='nav-link' href='#'>
                                    <img src="{{url('image/social_media_icon/twitter.png')}}" class='img-fluid'> Twitter
                                </a>
                                <a class='nav-link' href='#'>
                                    <img src="{{url('image/social_media_icon/youtube.png')}}" class='img-fluid'> Youtube
                                </a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <div class="d-flex align-items-center">
                            <form method="get" action="{{url('/search')}}">
                                <input name="query" class="" type="text" placeholder="Type to search" aria-label="Search" style="width:300px; height: 41px;">
                                <button type="submit" class="btn btn-success" >Search</button>
                            </form>
                        </div>


                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item dropdown">
                            <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                                <img src="{{url('/image/navbar_icon/User.svg')}}" class='img-fluid'>
                            </a>
                            <div class="dropdown-menu" style="text-align: center;">
                                <a class="nav-link" href="{{ route('login') }}"><img src="{{url('/image/login.svg')}}" class='img-fluid'>{{ __('Login') }}</a>
                                <a class="nav-link" href="{{ route('register') }}"><img src="{{url('/image/register.svg')}}" class='img-fluid'>{{ __('Register') }}</a>
                            </div>
                        </li>
                        @endif

                        @else
                        <li class="nav-item dropdown">
                            <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                                <img src="{{url('/image/navbar_icon/login_success.svg')}}" class='img-fluid'>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="text-align: center;">
                                <p style="color: white;">Hello! <a href='#' style="color: #e0e0e0;">{{ Auth::user()->name }}</a></p>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <img src="{{url('/image/logout.svg')}}" class='img-fluid'> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
<hr style="width: 100%; height: 2px;" id="grad">
