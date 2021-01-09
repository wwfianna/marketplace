@extends('layouts.app')

@section('content')
    <a href="{{route('admin.categories.create')}}" class="btn btn-lg btn-success" style="margin-bottom: 10px">Criar
        Categoria</a>
    <table class=" table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.categories.edit', ['category'=>$c->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                        <form action="{{route('admin.categories.destroy', ['category'=>$c->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$categories->links()}}
@endsection
