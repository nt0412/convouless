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
    <ul style="padding: 0;">
        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fas fa-user-tie"></i></span>
                <span class="title">{{ Auth::user()->name }} <i class="fas fa-caret-down" style="padding-left: 10px;"></i></span>
            </a>
            <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <!-- <a style="font-weight: bold; color: goldenrod;" class="dropdown-item" href="{{ route('main-category.create') }}">Info</a> -->
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
                <a style="font-weight: bold; color: goldenrod;" class="dropdown-item" href="{{ route('main-category.create') }}">Add main category</a>
                <a style="font-weight: bold; color: goldenrod;" class="dropdown-item" href="{{ route('main-category.index') }}">Main Category list</a>
                <a class="dropdown-item" href="{{ route('category.create') }}">Add category</a>
                <a class="dropdown-item" href="{{ route('category.index') }}">Category list</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span class="title">Posts <i class="fas fa-caret-down" style="padding-left: 10px;"></i></span>
            </a>
            <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('news.create') }}">Add post</a>
                <a class="dropdown-item" href="{{ route('news.index') }}">Post list</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="far fa-file-word"></i></span>
                <span class="title">Pages <i class="fas fa-caret-down" style="padding-left: 10px;"></i></span>
            </a>
            <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('newshot.index')}}">Hot News</a>
                <!-- <a class="dropdown-item" href="#">Post Page</a> -->
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fas fa-chart-bar"></i></span>
                <span class="title">Statistics <i class="fas fa-caret-down" style="padding-left: 10px;"></i></span>
            </a>
            <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Home</a>
                <a class="dropdown-item" href="#">Page</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fab fa-autoprefixer"></i></span>
                <span class="title">Authors's</span>
            </a>
            {{-- <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Home</a>
                <a class="dropdown-item" href="#">Page</a>
            </div> --}}
        </li>

        <li class="nav-item dropdown">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="fas fa-users"></i></span>
                <span class="title">User's</span>
            </a>
            {{-- <div class="dropdown-menu" style="background: black;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Home</a>
                <a class="dropdown-item" href="#">Page</a>
            </div> --}}
        </li>

        <li class="nav-item ">
            <a href="{{route('footer.index')}}" >
                <span class="icon"><i class="fas fa-solar-panel"></i></span>
                <span class="title">Footer </span>
            </a>

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
</script>
