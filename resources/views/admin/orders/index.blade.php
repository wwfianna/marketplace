@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Pedidos recebidos</h2>
            <hr>
        </div>

        <div class="col-12">
            <div class="accordion" id="orderList">
                @forelse($orders as $key => $order)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$key}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{$key}}" aria-expanded="true"
                                    aria-controls="collapse{{$key}}">
                                Pedido no: {{$order->reference}}
                            </button>
                        </h2>
                        <div id="collapse{{$key}}" class="accordion-collapse collapse @if($key == 0) show @endif"
                             aria-labelledby="heading{{$key}}">
                            <div class="accordion-body">
                                <ul>
                                    @php $items = unserialize($order->items); @endphp

                                    @foreach(filterItensByStorId($items, auth()->user()->store->id) as $item)
                                        <li>({{$item['amount']}}) {{$item['name']}} | total:
                                            R$ {{number_format($item['price'] * $item['amount'], 2, ',', '.')}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="alert alert-warning">Nenhum pedido recebido!</div>
                @endforelse
            </div>
        </div>

        <div class="col-12" style="margin-top: 10px">{{$orders->links()}}</div>

    </div>
    </div>
@endsection
