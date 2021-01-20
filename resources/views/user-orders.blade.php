@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Meus Pedidos</h2>
            <hr>
        </div>

        <div class="col-12">
            <div class="accordion" id="orderList">
                @forelse($userOrders as $key => $order)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$key}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                Pedido no: {{$order->reference}}
                            </button>
                        </h2>
                        <div id="collapse{{$key}}" class="accordion-collapse collapse @if($key == 0) show @endif"
                             aria-labelledby="heading{{$key}}">
                            <div class="accordion-body">
                                <ul>
                                    @foreach(unserialize($order->items) as $item)
                                        <li>{{$item['name']}} | qtde: {{$item['amount']}}<br>
                                            Total: R$ {{number_format($item['price'] * $item['amount'], 2, ',', '.')}}</li>
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

        <div class="col-12" style="margin-top: 10px">{{$userOrders->links()}}</div>

    </div>
@endsection
