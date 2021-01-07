@extends('layouts.app')

@section('content')
    <h1>Criar produto</h1>
    <form action="{{route('admin.products.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Nome Produto</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label for="body">Conteúdo</label>
            <textarea id="body" name="body" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="text" id="price" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" class="form-control">
        </div>

        <div class="form-group">
            <label for="store">Loja</label>
            <select id="store" name="store" class="form-control">
                @foreach($stores as $s)
                    <option value="{{$s->id}}">{{$s->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar produto</button>
        </div>
    </form>
@endsection
