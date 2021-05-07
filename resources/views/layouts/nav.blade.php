<div class="container">
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
                    <a class="dropdown-item" href="{{route('category.index')}}">Listed category</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Posts
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('post.create')}}">Add post</a>
                    <a class="dropdown-item" href="{{route('post.index')}}">Listed post</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark btn-outline-warning type="submit">Search</button>
        </form>
    </div>
</nav>
</div>

