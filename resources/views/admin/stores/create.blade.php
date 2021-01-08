@extends('layouts.app')

@section('content')
    <h1>Criar loja</h1>
    <form action="{{route('admin.stores.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Nome Loja</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" id="phone" name="phone" class="form-control">
        </div>

        <div class="form-group">
            <label for="mobile_phone">Celular</label>
            <input type="text" id="mobile_phone" name="mobile_phone" class="form-control">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" class="form-control">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar loja</button>
        </div>
    </form>
@endsection
