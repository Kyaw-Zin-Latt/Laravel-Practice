<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title",\App\Base::$name)</title>
    <link rel="icon" href="{{ \App\Base::$logo }}">
    <link href="{{ asset("css/theme.css") }}" rel="stylesheet">
    @yield("head")


</head>
<body>
<div class="py-3 mb-5" id="themeHeaderSpacer"></div>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom position-fixed top-0 w-100">
    <div class="container">
        <a class="navbar-brand" href="{{ route("/") }}">
            <img src="{{ asset("images/logos/mylogo.png") }}" style="height: 40px" class="me-1" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="feather-align-right"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="menu-top-right-menu" class="navbar-nav ms-auto mb-2 mb-md-0">
                <li id="menu-item-12"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-12">
                    <a href="{{ route("/") }}" class="nav-link {{ request()->url() == route("/") ? "active border border-dark rounded-pill" : "" }}">Home</a>
                </li>
                <li id="menu-item-16"
                    class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-16"><a
                        href="{{ route("about") }}" class="nav-link {{ request()->url() == route("about") ? "active border border-dark rounded-pill" : "" }}">About</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li>
                        <a href="{{ route("home") }}" class="btn btn-outline-primary">Dashboard</a>
                    </li>
                @else
                    <li class="me-2 ms-4">
                        <a href="{{ route("login") }}" class="btn btn-outline-primary">Login</a>
                    </li>
                    <li>
                        <a href="{{ route("register") }}" class="btn btn-outline-primary">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center g-5">
        <div class="col-12 col-lg-6">


        @yield("content")




        </div>
        <div class="col-12 col-lg-4 border-start" id="sidebarColumn">
            <div class="position-sticky" style="top: 100px">
                <div class="mb-5 sidebar">


                    <div id="search" class="mb-5">
                        <form action="" method="get">
                            <div class="d-flex search-box">
                                <input type="text" class="form-control flex-shrink-1 me-2 search-input" name="search" value="{{ request()->search }}" placeholder="Search Anything">
                                <button class="btn btn-primary search-btn">
                                    <i class="feather-search d-block d-xl-none"></i>
                                    <span class="d-none d-xl-block">Search</span>
                                </button>
                            </div>

                        </form>

                    </div>

                    <div id="category">
                        <h4 class="fw-bolder">Category Lists</h4>
                        <ul class="list-group">
                            @foreach($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route("baseOnCategory",$category->id) }}" class="{{ request()->url() == route("baseOnCategory",$category->id) ? "active" : "" }}">{{ $category->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="d-none d-lg-block">
                    @yield("pagination-place")
                </div>
            </div>
        </div>

        <div class="col-12 border-bottom mb-0 mt-3">
        </div>
        <div class="col-12">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <div class="text-center">
                        Copyright © {{ date('Y') }} {{ \App\Base::$name }}
                    </div>
                    <a href="#themeHeaderSpacer" class="btn btn-primary">
                        <i class="feather-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset("js/theme.js") }}"></script>
@yield("foot")

</body>
</html>
