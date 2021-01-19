@extends('layouts.front')

@section('content')
    <h2 class="alert alert-success">
        Obrigado pela compra!
    </h2>
    <h3>
        Seu pedido foi enviado com sucesso! Codigo: {{request()->get('order')}}
    </h3>
@endsection
