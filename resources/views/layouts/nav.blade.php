<style>
    .search-box {
        float: left;
        height: 40px;
        background-color: white;
        border-radius: 40px;
    }

    .search-box:hover>.search-txt {
        width: 218px;
        padding: 0 6px;
    }

    .search-box:hover>.search-btn {
        background-color: gold;
        color: #343a40;
    }

    .search-btn {
        float: right;
        border-radius: 50%;
        background-color: #343a40;
        outline: red;
        align-items: center;
        transition: 0.5s;
        color: gold;
        cursor: pointer;
        width: 40px;
        height: 40px;
    }
    #navbarNav>div>a{
        position: relative;
    }
    #navbarNav > div > a > i{
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

    a:hover {
        color: gold;
    }
</style>
<div class="container">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <img src="../../Convouless/image/view_headline_white_24dp.svg" alt="">
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" style="transition: 0.5s; color: transparent;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost:8080/Convouless/home">Manager menu</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('category.create')}}">Add category</a>
                        <a class="dropdown-item" href="{{route('category.index')}}">Category list</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Posts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('news.create')}}">Add post</a>
                        <a class="dropdown-item" href="{{route('news.index')}}">Post list</a>
                    </div>
                </li>
            </ul>
            <div class="search-box">
                <input class="search-txt" type="text" placeholder="Type to search" aria-label="Search">
                <a class="search-btn" type=" submit"><i class="bi bi-search"></i></a>
            </div>

        </div>
    </nav>
</div>
