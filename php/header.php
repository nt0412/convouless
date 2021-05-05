<?php include_once("../Convouless/php/banner.php") ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convouless</title>
    <link rel="shortcut icon" href="../../Convouless/image/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            color: whitesmoke;
            background-color: black;
        }

        #navbarNav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: larger;
        }

        #navbarNav a:hover {
            color: #b973ff;
            text-decoration: #b973ff;
        }

        .dropdown-menu {
            background-color: #b973ff;
            border-radius: 0px;
        }

        .dropdown-menu a:hover {
            background-color: black;
            color: #b973ff;
        }

        .contact :hover {
            color: #b973ff;
        }

        .contact a {
            color: #C71C7D;
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
    </style>
</head>

<body class="container-fluid">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand" href="../../../Convouless/index.php">
                <img src="../../../Convouless/image/navbar_icon/outline_home_white_24dp.png" class="img-fluid">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <img src="../../Convouless/image/view_headline_white_24dp.svg" alt="">
            </button>

            <div class="collapse navbar-collapse" id="navbarNav" style="transition: 0.5s; color: transparent;">
                <ul class="navbar-nav mr-auto">
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                            Tech
                        </a>
                        <div class='dropdown-menu' style='text-align: center; transition: all 1s ease-in;'>
                            <a class='nav-link' href='#'>
                                Apple
                            </a>
                            <a class='nav-link' href='#'>
                                Samsung
                            </a>
                            <a class='nav-link' href='#'>
                                Xiaomi
                            </a>
                            <a class='nav-link' href='#'>
                                Sony
                            </a>
                            <a class='nav-link' href='#'>
                                Asus
                            </a>
                            <a class='nav-link' href='#'>
                                Nintendo
                            </a>
                        </div>
                    </li>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                            Reviews
                        </a>
                        <div class='dropdown-menu' style='text-align: center;'>
                            <a class='nav-link' href='#'>
                                Phone
                            </a>
                            <a class='nav-link' href='#'>
                                Tablet
                            </a>
                            <a class='nav-link' href='#'>
                                Laptop
                            </a>
                            <a class='nav-link' href='#'>
                                Watch
                            </a>
                            <a class='nav-link' href='#'>
                                PC
                            </a>
                            <a class='nav-link' href='#'>
                                Playstation
                            </a>
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
                    </li>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                            About us
                        </a>
                        <div class='dropdown-menu' style='text-align: center;'>
                            <a class='nav-link' href='#'>
                                <img src="../../Convouless/image/social_media_icon/facebook.png">Facebook
                            </a>
                            <a class='nav-link' href='#'>
                                <img src="../../Convouless/image/social_media_icon/instagram.png"> Instagram
                            </a>
                            <a class='nav-link' href='#'>
                                <img src="../../Convouless/image/social_media_icon/twitter.png"> Twitter
                            </a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                            <img src='../../../Convouless/image/navbar_icon/outline_account_circle_white_24dp.png'>
                        </a>
                        <div class='dropdown-menu' style='text-align: center;'>
                            <a class='nav-link' href='http://localhost:8080/Convouless/login'>
                                <img src='../../Convouless/image/login.svg' class='img-fluid'>Login
                            </a>
                            <a class='nav-link' href='#'>
                                <img src='../../Convouless/image/register.svg' class='img-fluid'>Register
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <hr style="width: 100%; color: purple; background-color: #b973ff;">
