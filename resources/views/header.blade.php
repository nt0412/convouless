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

        .comment a {
            color: #cc165c;
            text-decoration: none;
        }

        .comment a:hover {
            color: darkred;
            text-decoration: none;
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
        }

        .title a:hover {
            color: #cc165c;
            text-decoration: none;
        }

        .title a h4:hover {
            color: #cc165c;
            text-decoration: none;
        }

        .dropdown:hover>.dropdown-menu{
            display: block;
        }

        @media (max-width: 767px) {
            ul{
                text-align: center;
            }
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
                    <img src="{{url('image/view_headline_white_24dp.svg')}}" alt="">
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
                                <a class='nav-link' href='#'>
                                    {{$item->category_name}}
                                </a>
                                @endforeach
                            </div>
                        </li>
                        @endforeach


                        <!-- {{-- <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                                Tech
                            </a>
                            <div class='dropdown-menu' style='text-align: center; transition: all 1s ease-in;'>
                                <a class='nav-link' href='#'>
                                    @php
                                        use App\Models\Category;
                                        $list_cate = Category::orderBy('category_name','ASC')->get();
                                        // print_r($list_cate);
                                    @endphp
                                    @foreach ($list_cate as $item)
                                    <a class='nav-link' href='#'>
                                        {{$item->category_name}}
                                    </a>
                                    @endforeach
                                </a>
                            </div>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                                Reviews
                            </a>
                            <div class='dropdown-menu' style='text-align: center;'>
                                @php
                                    use App\Models\Category;
                                    $list_cate = Category::orderBy('category_name','ASC')->get();
                                    // print_r($list_cate);
                                @endphp
                                @foreach ($list_cate as $item)
                                <a class='nav-link' href='#'>
                                    {{$item->category_name}}
                                </a>
                                @endforeach
                            </div>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                                Entertainment
                            </a>
                            <div class='dropdown-menu' style='text-align: center;'>
                                <a class='nav-link' href='#'>
                                    Film
                                </a>
                                <a class='nav-link' href='#'>
                                    TV
                                </a>
                                <a class='nav-link' href='#'>
                                    Games
                                </a>
                                <a class='nav-link' href='#'>
                                    Comics
                                </a>
                                <a class='nav-link' href='#'>
                                    Books
                                </a>
                            </div>
                        </li> --}} -->

                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                                About us
                            </a>
                            <div class='dropdown-menu' style='text-align: center;'>
                                <a class='nav-link' href='#'>
                                    <img src="../../Convouless/image/social_media_icon/facebook.png" class='img-fluid'> Facebook
                                </a>
                                <a class='nav-link' href='#'>
                                    <img src="../../Convouless/image/social_media_icon/instagram.png" class='img-fluid'> Instagram
                                </a>
                                <a class='nav-link' href='#'>
                                    <img src="../../Convouless/image/social_media_icon/twitter.png" class='img-fluid'> Twitter
                                </a>
                                <a class='nav-link' href='#'>
                                    <img src="../../Convouless/image/social_media_icon/youtube.png" class='img-fluid'> Youtube
                                </a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
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
