<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Marketplace L6</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>
</html>
