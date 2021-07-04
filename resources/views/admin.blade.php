@can('isAdmin')
@extends('layouts.app')
@section('content')
@include('layouts.nav')
<style>
    .lamgon {
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        display: -webkit-box;
    }

    .card {
        background: transparent;
        border-radius: 10px;
    }

    .card-body {
        background-color: #343a40;
        border: 2px solid goldenrod;
        border-radius: 10px;
    }
</style>
@php

// dd($count_main_cate );
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header" style="background-color: #343a40; color: gold; text-align: center; font-family: sans-serif; border-radius: 10px;">
                <div class="row">
                    <div class="col-xl-6 col-xxl-5 d-flex">
                        <div class="w-100">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">News</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="stat text-warning">
                                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="36px" viewBox="0 0 24 24" width="36px" fill="#FFC107">
                                                            <g>
                                                                <rect fill="none" height="24" width="24" />
                                                                <g>
                                                                    <path d="M19,5v14H5V5H19 M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3L19,3z" />
                                                                </g>
                                                                <path d="M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{$count_news}}</h1>
                                            <div class="mb-0">
                                                {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span> --}}
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Category</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 0 24 24" width="36px" fill="#FFC107">
                                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                                        <path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{$count_cate}}</h1>
                                            <div class="mb-0">
                                                {{-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span> --}}
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Online</h5>
                                                </div>
                                                <div class="col-auto" style="font-size: 25px;">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{$count_author}}</h1>
                                            <div class="mb-0">
                                                {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span> --}}
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Main Cate</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="stat text-warning" style="font-size: 27px;">
                                                        <span class="icon"><i class="fas fa-layer-group"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{$count_main_cate}}</h1>
                                            <div class="mb-0">
                                                {{-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span> --}}
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Author</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat text-warning" style="font-size: 25px;">
                                                        <i class="fas fa-user-edit"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{$count_author}}</h1>
                                            <div class="mb-0">
                                                {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span> --}}
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">User</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat text-warning" style="font-size: 25px;">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{$count_user}}</h1>
                                            <div class="mb-0">
                                                {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span> --}}
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-xxl-7">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Access Online <i style="font-size: 25px;" class="fas fa-chart-line"></i></h5>
                            </div>
                            <div class="card-body py-3">
                                <div class="chart chart-sm">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="chartjs-dashboard-line" style="display: block; width: 445px; height: 252px;" width="445" height="252" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Hot News <i style="font-size: 25px;" class="far fa-newspaper"></i></h5>
                                                </div>
                                            </div>
                                            <div class="row">


                                                <div class="col-auto">
                                                    <div class="stat text-warning">
                                                        <h4 class="mt-1 mb-3">321</h4>
                                                    </div>
                                                </div>
                                                <div class="col mt-0 lamgon">
                                                    <a href="{{ route('news.show', [$hot_news->news_slug]) }}">
                                                        <span class="text-muted">{{$hot_news->news_title}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Hot Auhor <i style="font-size: 25px;" class="fas fa-user-tie"></i></h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="stat text-warning">
                                                        <h4 class="" style="font-size: 30px">{{$hot_author->author_id}}</h4>
                                                    </div>
                                                </div>
                                                <div class="col mt-0">
                                                    <a href="{{ asset('/author') }}/">
                                                        <span class="text-muted">{{$hot_author->author_name}}</span>
                                                    </a>

                                                    <a href="{{ asset('/author') }}/">
                                                        <span class="text-muted">{{$hot_author->author_email}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endcan
@can('isClient')
@include('enduser.error')
<style>
    #app {
        display: none;
    }
</style>
@endcan