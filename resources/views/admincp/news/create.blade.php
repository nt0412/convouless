@extends('layouts.app')
@section('content')
    @include('layouts.nav')


    <body style="background-color: black;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="background-color: #343a40; color: whitesmoke;">
                        <div class="card-header" style="color: gold;">Add Category</div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $errors)
                                        <li>{{ $errors }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('news.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Post's name</label>
                                    <input type="text" class="form-control" value="{{ old('news_title') }}"
                                        onkeyup="ChangeToSlug();" id="slug" name="news_title" placeholder="Posts's name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Post's Slug</label>
                                    <input type="text" class="form-control" value="{{ old('news_slug') }}"
                                        id="convert_slug" name="news_slug" placeholder="Posts's slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Post's news_metatile</label>
                                    <input type="text" class="form-control" value="{{ old('news_metatile') }}"
                                        name="news_metatile" placeholder="Posts's name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Post's news_summary</label>
                                    <input type="text" class="form-control" value="{{ old('news_summary') }}"
                                        name="news_summary" placeholder="Posts's name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Post Content</label>
                                    <!-- <input type="text" class="form-control" value="{{ old('news_content') }}" id="exampleInputEmail1" name="news_content" placeholder="Content"> -->
                                    {{-- <textarea class="form-control"  name="news_content" placeholder="Content" cols="30" rows="10">{{old('news_content')}}</textarea> --}}
                                    <textarea cols="80" id="editor1" name="news_content" rows="10"
                                        data-sample-short>{{ old('news_content') }}</textarea>
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
    </body>
    <script>
        // $(document).ready(function() {

        CKEDITOR.replace('editor1', {
            height: 400,
            filebrowserUploadUrl: "{{ asset('/news/upload_ckeditor') }}",
            filebrowserBrowseUrl: "{{ asset('/news/file_brower') }}",

            // config.removeDialogTabs = 'image:Upload';
        });
        CKEDITOR.editorConfig = function(config) {
            removeDialogTabs = 'image:Upload';
        }
        // });

    </script>

@endsection
