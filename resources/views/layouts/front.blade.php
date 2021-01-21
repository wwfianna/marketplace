<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L7</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .front.row {
            margin-bottom: 40px;
        }
    </style>
    @yield('stylesheets')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">Marketplace L7</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link @if(request()->is('/')) active @endif" href="{{route('home')}}">Home</a>
            </li>

            @foreach($list_categories as $category)
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('category/'.$category->slug)) active @endif"
                       href="{{route('category.index', ['slug' => $category->slug])}}">{{$category->name}}</a>
                </li>
            @endforeach

        </ul>

        <div class="me-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                @auth()
                    <li class="nav-item">
                        <a href="{{route('user.orders')}}"
                           class="nav-link @if(request()->is('my-orders')) active @endif">Meus pedidos</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a href="{{route('cart.index')}}" class="nav-link">
                        @if(session()->has('cart'))
                            <span class="badge bg-danger">{{count(session()->get('cart'))}}</span>
                        @endif
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <span class="nav-link">{{auth()->user()->name}}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"
                           onclick="document.querySelector('form.logout').submit(); ">Sair</a>
                        <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>


    </div>
</nav>

<div class="container">
    @include('flash::message')
    @yield('content')
</div>
<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')
</body>
</html>
