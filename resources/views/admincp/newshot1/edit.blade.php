@extends('layouts.app')
@section('content')
@include('layouts.nav')
<header>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    {{-- search --}}
    <title>Ajax search</title>

    <style type="text/css">
        body {
            background-color: black;
            overflow-x: hidden;
        }

        body::-webkit-scrollbar {
            width: 0.25rem;
        }

        body::-webkit-scrollbar-track {
            background: goldenrod;
        }

        body::-webkit-scrollbar-thumb {
            background: black;
        }

        table tbody tr td p {
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            display: -webkit-box;
        }

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
            padding-left: 70px !important;
        }

        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 0px !important;
                padding-right: 0px;
            }

            #post-profile {
                padding-right: 0px;
            }

            #table-manage {
                padding-right: 0px;
            }
        }

        .box {
            width: 600 px;
            margin: 0 auto;
        }

        .button:hover {
            background-color: goldenrod;
            border-color: black;
        }

        .side-bar .icon {
            margin-top: 1rem;
        }

        #post-profile .post-detail {
            color: goldenrod;
        }

        #post-profile .post-image {
            width: 100%;
            height: 15rem;
        }
    </style>
</header>


<div class="container-fluid">
    <div class="row">
        {{-- tìm kiếm bài viết --}}
        <div class="col-sm-12">
            <h3 style="color: goldenrod; text-align: center;">Edit Hot News</h3><br />
            <!-- <div class="form-group" style="margin: 10px">
                    <form action="">
                        <input type="text" name="search_name" id="search_name" class="form-control input-lg"
                            placeholder="Enter Country Name" />
                    </form>
                    <div id="newsList" style="position: absolute"><br>
                    </div>
                </div> -->
            {{ csrf_field() }}
            <!-- <div class="">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected>Choose.</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </li>
                    <li class="nav-item">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose.</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </li>
                    <li class="nav-item">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose.</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </li>
                    <li class="nav-item">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose.</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </li>
                </ul>
            </div> -->

            {{-- @php
            dd($list_news);
            @endphp --}}
            <div class="row">
                <div class="col-sm-4" id="post-profile" style="position: fixed; top: 137px">
                    <div class="col-sm-8">
                        <img class="post-image" src="{{ asset('public/images') }}/{{ $news_curen->news_img }}" alt="Post's image">
                    </div>
                    <div class="co-sm-4">
                        <div class="post-detail">
                            <p>Post's ID: {{ $id }}</p>
                            <p>Category: {{ $cate->where('category_id', $news_curen->category_id)->first()->category_name }}</p>
                            <p style="font-weight: bold; font-size: large;">Title: {{ $news_curen->news_title }}</p>
                            <p>Author: {{ $author->where('author_id', $news_curen->author_id)->first()->author_display_name }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8" id="table-manage" style="position: absolute; right: 23">
                    <table class="table" id="news-list" style="border-top: goldenrod solid 2px;">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 10%;">News's ID</th>
                                <th scope="col" style="width: 10%;">Title</th>
                                <th scope="col" style="width: 10%;">Image</th>
                                <th scope="col" style="width: 10%;">Category</th>
                                <th scope="col" style="width: 10%;">Author</th>
                                <th scope="col" style="width: 10%;">Date Posted</th>
                                <th scope="col" style="width: 10%;">Status</th>
                                <th scope="col" style="width: 10%;">Tools</th>
                            </tr>
                        </thead>
                        <tbody style="color: whitesmoke;">
                            @foreach ($list_news as $key => $item)
                            {{-- loại bọ id đang chỉnh sửa, hoặc các item bị ẩn --}}
                                @if ($item->news_id != $id && $item->news_enable == 1)
                                    <tr>
                                        {{-- {{dd($list_news)}} --}}
                                        <form class="box" method="POST" action="{{ route('newshot.update', [$item->news_id]) }}" style="padding: 0 5%;" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <th>
                                                <p class="text-in-table">{{ $key + 1 }}</p>
                                            </th>
                                            <td>
                                                <p class="text-in-table">{{ $item->news_id }}</p>
                                            </td>
                                            <td>
                                                <a href="{{ route('news.show', [$item->news_slug]) }}">
                                                    <p>{{ $item->news_title }}</p>
                                                </a>
                                            </td>
                                            <td>
                                                <img src="{{asset('public/images/')}}/{{$item->news_img}}" alt="Post's image" width="100px" height="100px">
                                            </td>
                                            <td>
                                                <a href="#">
                                                    {{ $cate->where('category_id', $item->category_id)->first()->category_name }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    {{ $author->where('author_id', $item->author_id)->first()->author_display_name }}
                                                </a>
                                            </td>
                                            <td>
                                                <p class="text-in-table">{{ $item->date_posted }}</p>
                                            </td>
                                            <td>
                                                @if ($item->news_enable == 1)
                                                <span class="text text-success">Enable</span>
                                                @elseif($item->news_enable == 0)
                                                <span class="text text-danger">Disenable</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input style="display: none" type="text" name="news_select" value="{{$item->news_id}}">
                                                <input style="display: none" type="text" name="id_curen" value="{{$id}}">
                                                <button type="submit" class="btn btn-dark btn-outline-warning" name="btn-add" value="{{$item->news_id}}">Update</button>
                                            </td>
                                        </form>
                                    </tr>
                                @else
                                    @php
                                        // dd($list_news);
                                        continue;
                                    @endphp
                                @endif

                            @endforeach
                        </tbody>
                    </table>
                    <div id="pagination-bar" class="mx-auto" style="width: 400px;">
                        {{ $list_news->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @endsection --}}
