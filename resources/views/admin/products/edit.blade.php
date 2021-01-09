@extends('layouts.app')

@section('content')
    <h1>Atualizar produto</h1>
    <form action="{{route('admin.products.update', ['product'=>$product->id])}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome Produto</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{$product->name}}">
            @error('name')
            <div id=" validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                   value="{{$product->description}}">
            @error('description')
            <div id=" validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Conteúdo</label>
            <textarea id="body" name="body" cols="30" rows="10"
                      class="form-control @error('body') is-invalid @enderror">{{$product->body}}</textarea>
            @error('body')
            <div id=" validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror"
                   value="{{$product->price}}">
            @error('price')
            <div id=" validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" class="form-control" value="{{$product->slug}}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar produto</button>
        </div>
    </form>
@endsection
