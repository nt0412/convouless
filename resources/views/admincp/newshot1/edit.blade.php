{{-- @section('content') --}}
<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convouless</title>
    <link rel="shortcut icon" href="{{ url('/image/logo.ico') }}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- search --}}
    <title>Ajax search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
        }

    </style>

</header>

@php

// dd();
@endphp
<div class="row">


    {{-- tìm kiếm bài viết --}}
    <div class="col-xl-12 col-md-6" style="position: relative">

        <div class="">
            <h3 align="center">Gợi ý tìm kiếm với ajax</h3><br />
            <div class="form-group" style="margin: 10px">
                <form action="">
                    <input type="text" name="search_name" id="search_name" class="form-control input-lg" placeholder="Enter Country Name" />
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


        {{-- table resul --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">author</th>
                    <th scope="col">date Create</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>

            </tbody>
        </table>

    </div>

    {{-- preview bài viết --}}
    <div class="col-xl-12 col-md-6">



    </div>
</div>
{{--
<script>
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

</script>
 --}}

<script type="text/javascript">
	$(document).ready(function(){
		var action = "search";
		$("#search_name").keyup(function(){
			var search_name = $("#search_name").val();
			if ($("#search_name").val() != '') {
			$.ajax({
				url:"edit",
				method:"POST",
				data:{action:action,search_name:search_name},
				success:function(data){
					$("#output_search").html(data);
				}
			});
            console.log(action);

			}
			else{
					$("#output_search").html("");

			}

		});
	});
</script>
{{-- @endsection --}}
