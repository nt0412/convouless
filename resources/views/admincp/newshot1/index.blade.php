@extends('layouts.app')
@section('content')
@include('layouts.nav')
@php
use App\Models\News;

$news = News::paginate(25);
// dd($newshot1s);
// dd($newshot->news_slug);
@endphp

<style>
    @media (max-width: 1000px) {
        .side-bar {
            left: -60px;
        }

        .side-bar.active {
            left: 0px;
            width: 100%;
        }
    }

    .container-fluid {
        padding-left: 60px !important;
    }

    @media (max-width: 768px) {
        .container-fluid {
            padding-left: 0px !important;
            padding-right: 0px;
        }

        #preview {
            padding-right: 0px;
        }

        #table-manage {
            padding-right: 0px;
        }
    }

    #navbarNav>ul.navbar-nav.ml-auto {
        display: none;
    }

    #grad>div.container {
        display: none;
    }

    #btn-preview {
        border: linear-gradient(90deg, #f7c626 15%, #f68c2f 40%, #e5127d 85%);
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    #btn-preview:hover {
        background: linear-gradient(90deg, #f7c626 15%, #f68c2f 40%, #e5127d 85%);
    }

    table tbody tr td p {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        display: -webkit-box;
    }
</style>
<div class="container-fluid">
    <div class="card-header" style="color: gold; text-align: center;">
        <h2>Hot news list</h2>
        <hr>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-sm-5" id="table-manage">
            <table class="table" style="border-top: goldenrod solid 2px;">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="width: 10%;">#</th>
                        <th scope="col" style="width: 30%;">News's Title</th>
                        <th scope="col" style="width: 30%;">Image</th>
                        <th scope="col" style="width: 10%;">Tools</th>
                    </tr>
                </thead>
                <tbody style="color: whitesmoke;">
                    @foreach($newshot1s as $key => $item)
                    <tr>
                        <th scope="row">{{(integer)$key+1}}</th>
                        <td>
                            <a href="{{$item->news_slug}}">
                                <p>{{$item->news_title}}</p>
                            </a>
                        </td>
                        <td>
                            <img src="{{asset('public/images/')}}/{{$item->news_img}}" alt="Post's image" width="150px" height="150px">
                        </td>
                        <td>
                            <a style="color: blue;" class="btn btn-primary" href="{{route('newshot.edit',[$item->news_id])}}"><img src="{{url('image\edit_icon.png')}}" alt=""></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-7" id="preview">
            <h3 style="text-align: center;">
                <input id="btn-preview" class="btn btn-dark btn-outline-warning" type="button" value="Preview" onclick="window.open('{{asset('/admin/manager/newshot/preview/')}}','preview','fullscreen=yes');">
            </h3>
            <div id="preview">
                @include('admincp.newshot1.preview')
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function toggleMenu() {
        let sidebar = document.querySelector('.side-bar');
        let toggle = document.querySelector('.toggle');
        sidebar.classList.toggle('active');
        toggle.classList.toggle('active');
    }
</script>
@endsection
