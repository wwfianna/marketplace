<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L7</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Marketplace L7</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/orders*')) active @endif" aria-current="page"
                           href="{{route('admin.orders.index')}}">Meus Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/stores*')) active @endif" aria-current="page"
                           href="{{route('admin.stores.index')}}">Lojas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/products*')) active @endif"
                           href="{{route('admin.products.index')}}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/categories*')) active @endif"
                           href="{{route('admin.categories.index')}}">Categorias</a>
                    </li>
                </ul>
            </div>
            <span class="text-warning">{{auth()->user()->name}}</span>
            <div class="me-2">
                <a class="nav-link" href="#" onclick="document.querySelector('form.logout').submit()">Sair</a>
                <form action="{{route('logout')}}" class="logout" method="post" style="display: none">
                    @csrf
                </form>
            </div>

        @endauth
    </div>
</nav>
<div class="container">
    @include('flash::message')
    @yield('content')
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
