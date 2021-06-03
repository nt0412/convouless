<style>
    @import url("https://use.fontawesome.com/releases/v5.14.0/css/all.css");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .dropdown-menu {
        border-radius: 0;
        width: 100%;
        font-size: medium;
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

    a:hover {
        color: gold;
    }

    .side-bar {
        position: fixed;
        width: 60px;
        height: 100%;
        background: #454e5c;
        transition: 0.4s;
        overflow: hidden;
        z-index: 10;
    }

    .side-bar:hover,
    .side-bar.active {
        width: 200px;
    }

    .side-bar ul {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .side-bar ul li {
        position: relative;
        width: 100%;
        list-style: none;
    }

    .side-bar ul li:hover {
        background: goldenrod;
    }

    .side-bar ul li a {
        position: relative;
        display: block;
        width: 100%;
        display: flex;
        text-decoration: none;
        color: white;
    }

    .side-bar ul li i {
        font-size: 1.4rem;
    }

    .side-bar ul li a .icon {
        position: relative;
        display: block;
        min-width: 60px;
        height: 60px;
        line-height: 60px;
        text-align: center;
    }

    .side-bar ul li a .icon .fa {
        font-size: 24px;
    }

    .side-bar ul li a .title {
        position: relative;
        display: block;
        padding: 0 10px;
        height: 60px;
        line-height: 60px;
        text-align: start;
        white-space: nowrap;
        cursor: pointer;
    }

    .toggle {
        position: fixed;
        top: 0;
        right: 0;
        width: 60px;
        height: 60px;
        background: #454e5c;
        cursor: pointer;
        z-index: 10;
    }

    .toggle.active {
        background: goldenrod;
    }

    .toggle::before {
        content: '\f0fe';
        font-family: "Font Awesome 5 Free";
        position: absolute;
        width: 100%;
        height: 100%;
        line-height: 60px;
        text-align: center;
        font-size: 24px;
        color: white;
    }

    .toggle.active:before {
        content: '\f057';
    }

    @media (max-width: 768px) {
        .side-bar {
            left: -60px;
        }

        .side-bar.active {
            left: 0px;
            width: 100%;
        }
    }

    #search_box_nav:hover>.search-txt {
        width: 300px;
    }

    @media (max-width: 1050px) {
        #search_box_nav {
            display: none;
        }
    }

    @media (min-width: 1051px) {
        #search_box_sidebar {
            display: none;
        }
    }
</style>
<div class="side-bar">
    <ul>
        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" onclick="showDropdownMenu()" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fas fa-user-tie"></i></span>
                <span class="title">{{ Auth::user()->name }} <i class="fas fa-caret-down" style="padding-left: 10px;"></i></span>
            </a>
            <div class="dropdown-menu" id="DropDownMenu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a style="font-weight: bold; color: goldenrod;" class="dropdown-item" href="{{route('main-category.create')}}">Info</a>
            </div>
        </li>
        <li>
            <a href="{{ url('/admin') }}">
                <span class="icon"><i class="fas fa-clipboard"></i></span>
                <span class="title">Manager menu</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fas fa-layer-group"></i></span>
                <span class="title">Category <i class="fas fa-caret-down" style="padding-left: 10px;"></i></span>
            </a>
            <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a style="font-weight: bold; color: goldenrod;" class="dropdown-item" href="{{route('main-category.create')}}">Add main category</a>
                <a style="font-weight: bold; color: goldenrod;" class="dropdown-item" href="{{route('main-category.index')}}">Main Category list</a>
                <a class="dropdown-item" href="{{route('category.create')}}">Add category</a>
                <a class="dropdown-item" href="{{route('category.index')}}">Category list</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span class="title">Posts <i class="fas fa-caret-down" style="padding-left: 10px;"></i></span>
            </a>
            <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('news.create')}}">Add post</a>
                <a class="dropdown-item" href="{{route('news.index')}}">Post list</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="far fa-file-word"></i></span>
                <span class="title">Page's <i class="fas fa-caret-down" style="padding-left: 10px;"></i></span>
            </a>
            <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Home Page</a>
                <a class="dropdown-item" href="#">Post Page</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fas fa-chart-bar"></i></span>
                <span class="title">statistics's <i class="fas fa-caret-down" style="padding-left: 10px;"></i></span>
            </a>
            <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Home</a>
                <a class="dropdown-item" href="#">Page</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fas fa-solar-panel"></i></span>
                <span class="title">Footer's</span>
            </a>
            {{-- <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Home</a>
                <a class="dropdown-item" href="#">Page</a>
            </div> --}}
        </li>

        <div class="search-box" id="search_box_sidebar">
            <input class="search-txt" type="text" placeholder="Type to search" aria-label="Search">
            <a class="search-btn" type=" submit"><i class="fas fa-search" style="padding: 6px;"></i></a>
        </div>
    </ul>
</div>
<div class="toggle" onclick="toggleMenu()"></div>
<script type="text/javascript">
    function toggleMenu() {
        let sidebar = document.querySelector('.side-bar');
        let toggle = document.querySelector('.toggle');
        sidebar.classList.toggle('active');
        toggle.classList.toggle('active');
    }

    function showDropdownMenu() {
        var x = document.getElementById("DropDownMenu");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
