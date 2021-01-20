@extends('layouts.front')

@section('content')
    <div class="row front">
        <div class="col-12">
            <h2>{{$category->name}}</h2>
            <hr>
        </div>
        @forelse($category->products as $key => $product)
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    @if($product->images->count())
                        <img src="{{asset('storage/'.$product->images->first()->image)}}" alt=""
                             class="card-img-top">
                    @else
                        <img src="{{asset('assets/img/no-photo.jpg')}}" alt="" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{$product->name}}</h2>
                        <p class="card-text">
                        {{$product->description}}
                        <h3>R$ {{number_format($product->price, '2', ',', '.')}}</h3>
                        </p>
                        <a href="{{route('product.single', ['slug' =>$product->slug])}}" class="btn btn-success">
                            Ver produto
                        </a>
                    </div>
                </div>
            </div>
            @if(($key +1) % 3 == 0)</div><div class="row front">@endif
        @empty
            <div class="col-12">
                <h4 class="alert alert-warning">Não foram encontrados produtos para esta categoria</h4>
            </div>
        @endforelse

    </div>

@endsection
