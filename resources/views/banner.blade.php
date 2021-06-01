<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Home</title>
    <link rel="shortcut icon" href="../../Convouless/image/logo.ico" type="image/x-icon">
    <style>
        @media only screen and (max-width: 767px) {
            .banner1 {
                display: none;
            }
        }

        @media only screen and (min-width: 768px) {
            .banner2 {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="banner1">
                <img src="{{url('image/banner_1.png')}}" class="img-fluid" width="100%">
            </div>
            <div class="banner2">
                <img src="{{url('image/banner_2.png')}}" class="img-fluid">
            </div>
        </div>
    </div>
</body>
</html>
