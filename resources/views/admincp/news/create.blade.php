@extends('layouts.app')
@section('content')
@include('layouts.nav')
<style>
    .box {
        color: white;
        font-family: Sans-serif;
    }

    .box input[type="text"] {
        border: 0;
        background: none;
        display: block;
        border: 2px solid goldenrod;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.3s;
    }

    .box input[type="text"]:focus {
        border-color: #cc165c;
    }

    .box button {
        border: 0;
        background: none;
        display: block;
        margin: 5px auto;
        text-align: center;
        border: 2px solid goldenrod;
        padding: 10px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.3s;
    }

    .box button:hover {
        background-color: goldenrod;
        border-color: black;
    }

    .custom-select {
        border: 2px solid goldenrod;
        border-radius: 24px;
    }
</style>

<body style="background-color: black;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #343a40; color: whitesmoke;">
                    <div class="card-header" style="color: gold; text-align: center;">
                        <h2>Add Post</h2>
                    </div>

    <body style="background-color: black;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="background-color: #343a40; color: whitesmoke;">
                        <div class="card-header" style="color: gold;">Add Category</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="box" method="POST" action="{{route('news.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post's name</label>
                                <input type="text" class="form-control" value="{{old('news_title')}}" onkeyup="ChangeToSlug();" id="slug" name="news_title" placeholder="Posts's name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post's Slug</label>
                                <input type="text" class="form-control" value="{{old('news_slug')}}" id="convert_slug" name="news_slug" placeholder="Posts's slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post's news_metatile</label>
                                <input type="text" class="form-control" value="{{old('news_metatile')}}" name="news_metatile" placeholder="Posts's name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post's news_summary</label>
                                <input type="text" class="form-control" value="{{old('news_summary')}}" name="news_summary" placeholder="Posts's name">
                            </div>
                        {{-- @endif --}}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Post Content</label>
                                <!-- <input type="text" class="form-control" value="{{old('news_content')}}" id="exampleInputEmail1" name="news_content" placeholder="Content"> -->
                                <textarea class=" ckeditor form-control" name="news_content" placeholder="Content" cols="30" rows="10">{{old('news_content')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Post</label>
                                <select class="custom-select" name="">
                                    @foreach($cate as $key => $muc)
                                    <option value="{{$muc->category_id}}">{{$muc->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Choose image</label>
                                <input type="file" accept="image/*" class="form-control-file" name="news_img" id=" ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Enable</label>
                                <select class="custom-select" name="news_enable">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Post</label>
                                    <select class="custom-select" name="category_id">
                                        @foreach ($cate as $key => $muc)
                                            <option value="{{ $muc->category_id }}">{{ $muc->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">image</label>
                                    <input type="file" accept="image/*" class="form-control-file" name="news_img"
                                        id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Enable</label>
                                    <select class="custom-select" name="news_enable">
                                        <option value="1">Enable</option>
                                        <option value="0">Disable</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-dark btn-outline-warning" name="btn-add">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    CKEDITOR.replace('news_content', {
            language: 'vi',
            filebrowserBrowseUrl: '{{ asset('/public/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('/public/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('/public/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flas') }}h'

        });

    function ChangeToSlug() {
        var slug;

        //Lấy text từ thẻ input title
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('convert_slug').value = slug;
    }
</script>

@endsection
