<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{url('/image/logo.ico')}}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Convouless</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script> --}}

    <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    <script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('public/ckfinder/ckfinder.js')}}"></script>

    <style>
        body{
            overflow-x: hidden;
        }
        .attention {
            color: #cc165c;
            font-size: 1.5rem;
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

        .search-box {
            float: left;
            height: 40px;
            background-color: goldenrod;
            border-radius: 40px;
            margin-left: 0.6rem;
            margin-top: 0.6rem;
        }

        .search-box:hover>.search-txt {
            width: 150px;
            padding: 0 6px;
        }

        .search-box:hover>.search-btn {
            background-color: #343a40;
            color: gold;
        }

        .search-btn {
            float: right;
            border-radius: 50%;
            background-color: goldenrod;
            align-items: center;
            transition: 0.5s;
            color: #343a40;
            cursor: pointer;
            width: 40px;
            height: 40px;
        }

        #navbarNav>div>a {
            position: relative;
        }

        #navbarNav>div>a>i {
            position: absolute;
            left: 7px;
        }

        .search-btn>i {
            font-size: 25px;
        }

        .search-txt {
            border: none;
            background: none;
            outline: none;
            float: left;
            padding: 0;
            color: black;
            transition: 0.5s;
            width: 0px;
            line-height: 40px;
        }

        #search_box_nav .search-txt {
            width: 300px;
        }
    </style>
</head>

<body style="background-color: black;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: black;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: gold;">
                    Convouless
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <div class="search-box" id="search_box_nav">
                            <input class="search-txt" type="text" placeholder="Type to search" aria-label="Search">
                            <a class="search-btn" type=" submit"><i class="fas fa-search" style="padding: 6px;"></i></a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript">
        function ChangeToSlug() {
            var slug;
            //L???y text t??? th??? input title
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //?????i k?? t??? c?? d???u th??nh kh??ng d???u
            slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
            slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
            slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
            slug = slug.replace(/??|???|???|???|???/gi, 'y');
            slug = slug.replace(/??/gi, 'd');
            //X??a c??c k?? t??? ?????t bi???t
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
            slug = slug.replace(/ /gi, "-");
            //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
            //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox c?? id ???slug???
            document.getElementById('convert_slug').value = slug;
        }

    </script>

</body>

</html>
