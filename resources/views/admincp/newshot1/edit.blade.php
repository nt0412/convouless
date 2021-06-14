
@section('content')
@include('layouts.nav')
<header>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    {{-- search --}}
    <title>Ajax search</title>

    <style type="text/css">
        .box {
            width: 600 px;
            margin: 0 auto;
        }

        .button:hover {
            background-color: goldenrod;
            border-color: black;
        }

        .side-bar .icon{
            margin-top: 1rem;
        }
    </style>

</header>


<div class="container-fluid" style="margin: 50px">
    <div class="row">
        <div class="col-12">
            @php

                $news_curen = $list_news->where('news_id', $id)->first();
                // dd($id,$news_curen);
            @endphp
            <div class="row">
                <div class="col-9">
                    <div>
                        <p>ID: {{ $id }}</p>
                        <p>Category:
                            {{ $cate->where('category_id', $news_curen->category_id)->first()->category_name }}</p>
                        <p>Title: {{ $news_curen->news_title }}</p>
                        <th>
                            <p>{{ $author->where('author_id', $news_curen->author_id)->first()->author_display_name }}
                            </p>
                        </th>

                    </div>

                </div>
                <div class="col-3">
                    <div>
                        <img class="" height="172px" src="{{ asset('public/images') }}/{{ $news_curen->news_img }}"
                            alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- tìm kiếm bài viết --}}
        <div class="col-xl-6 col-md-12" style="position: relative">

            <div class="">
                <h3 align="center">Edit Hot News</h3><br />
                <div class="form-group" style="margin: 10px">
                    <form action="">
                        <input type="text" name="search_name" id="search_name" class="form-control input-lg"
                            placeholder="Enter Country Name" />
                    </form>
                    <div id="newsList" style="position: absolute"><br>
                    </div>
                </div>
                {{ csrf_field() }}
            </div>
            <div class="">
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
            </div>

            @php

                // dd($list_news);
            @endphp
            <table class="table" id="news-list" style="border-top: goldenrod solid 2px;">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 10%;">News's Title</th>
                        <th scope="col" style="width: 10%;">News's ID</th>
                        <th scope="col" style="width: 10%;">Category</th>
                        <th scope="col">Author</th>
                        <th scope="col" style="width: 5%;">Date Posted</th>
                        <th scope="col" style="width: 10%;">Date Updated</th>
                        <th scope="col" style="width: 10%;">Status</th>
                        <th scope="col" style="width: 10%;">Tools</th>
                    </tr>
                </thead>
                <tbody style="color: whitesmoke;">
                        @foreach ($list_news as $key => $item)
                            {{-- loại bọ id đang chỉnh sửa, hoặc các item bị ẩn --}}
                            @if ($item->news_id != $id && $item->news_enable == 1)
                                <tr>
                                    <form class="box" method="POST"
                                        action="{{ route('newshot.update', [$item->news_id]) }}" style="padding: 0 5%;"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <th scope="">
                                            <p class="text-dark">
                                                {{ $key + 1 }}
                                            </p>
                                        </th>
                                        <th>
                                            <p class="text-dark">{{ $item->news_id }}</p>
                                        </th>
                                        <td>
                                            <a href="{{ $item->news_slug }}">
                                                <p>{{ $item->news_title }}</p>
                                            </a>
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
                                            <p class="text-dark">
                                                {{ $item->date_posted }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-dark">
                                                {{ $item->date_updated }}
                                            </p>
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
                                    continue;
                                @endphp
                            @endif

                        @endforeach
                </tbody>
            </table>

        </div>

        {{-- preview bài viết --}}
        {{-- <div class="col-xl-6  col-md-2"></div> --}}
    </div>
</div>
{{-- <script>
    $(document).ready(function() {

        $('#news_name').keyup(function() { //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var query = $(this).val(); //lấy gía trị ng dùng gõ
            if (query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                $.ajax({
                    url: "{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                    method: "POST", // phương thức gửi dữ liệu.
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) { //dữ liệu nhận về
                        $('#newsList').fadeIn();
                        $('#newsList').html(
                            data
                            ); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là newsList

                    }
                });
            }
        });

        $(document).on('click', 'li', function() {
            $('#news_name').val($(this).text());
            // lấy giá trị của người dùng nhập vàp thông qua jquery và #news_name
            $('#output').val($(this).text());

            $('#newsList').fadeOut();
        });

    });

</script> --}}

<script type="text/javascript">
    $(document).ready(function() {
        var action = "search";
        $("#search_name").keyup(function() {
            var search_name = $("#search_name").val();
            if ($("#search_name").val() != '') {
                $.ajax({
                    url: "edit",
                    method: "POST",
                    data: {
                        action: action,
                        search_name: search_name
                    },
                    success: function(data) {
                        $("#output_search").html(data);
                    }
                });
                console.log(action);

            } else {
                $("#output_search").html("");

            }

        });
    });

</script>
{{-- @endsection --}}
