@extends('layouts.app')

@section('content')
    <h1>Criar loja</h1>
    <form action="{{route('admin.stores.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Nome Loja</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{old('name')}}">
            @error('name')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description"
                   class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">
            @error('description')
            <div id=" validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                   value="{{old('phone')}}">
            @error('phone')
            <div id=" validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="mobile_phone">Celular</label>
            <input type="text" id="mobile_phone" name="mobile_phone"
                   class="form-control @error('mobile_phone') is-invalid @enderror" value="{{old('mobile_phone')}}">
            @error('mobile_phone')
            <div id=" validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" class="form-control" value="{{old('slug')}}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar loja</button>
        </div>
    </form>
@endsection
