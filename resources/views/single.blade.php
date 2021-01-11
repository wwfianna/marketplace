@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-6">
            @if($product->images->count())
                <img src="{{asset('storage/'.$product->images->first()->image)}}" alt="" class="card-img-top">
                <div class="row" style="margin-top: 10px">
                    @foreach($product->images as $img)
                        <div class="col-4">
                            <img src="{{asset('storage/'.$img->image)}}" alt="" class="img-fluid">
                        </div>
                    @endforeach
                </div>
            @else
                <img src="{{asset('assets/img/no-photo.jpg')}}" alt="" class="card-img-top">
            @endif
        </div>
        <div class="col-6">
            <h2>{{$product->name}}</h2>
            <p>{{$product->description}}</p>
            <h3>R$ {{number_format($product->price, '2', ',', '.')}}</h3>
            <span>Loja: {{$product->store->name}}</span>
            <div class="product-add col-md-12">
                <hr>
                <form action="{{route('cart.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="product[name]" value="{{$product->name}}">
                    <input type="hidden" name="product[price]" value="{{$product->price}}">
                    <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                    <div class="form-group">
                        <label for="product[amount]">Quantidade:</label>
                        <input type="number" id="product[amount]" name="product[amount]" class="form-control col-md-2" value="1">
                    </div>
                    <button class="btn btn-lg btn-danger">Comprar</button>

                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <hr>
            {{$product->body}}
        </div>

    </div>
@endsection
