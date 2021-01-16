@extends('layouts.front')

@section('content')

    <div class="container">

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dados para pagamento</h2>
                    <hr>
                </div>
            </div>
            <form action="" method="post">

                <div class="row">
                    <div class="col-md-12">
                        <label for="card_number">Número do cartão</label>
                        <input type="text" class="form-control" name="card_number" id="card_number">
                    </div>
                </div>
                <div class="row">
                    <label for="exp_dt_month">Expira em</label>
                    <div class="col">
                        <div class="input-group col-md-2">
                            <span class="input-group-text" id="basic-addon1">Mês</span>
                            <input type="text" class="form-control" name="card_exp_month" id="card_exp_month"
                                   aria-label="card_exp_month" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group col-md-2">
                            <span class="input-group-text" id="basic-addon2">Ano</span>
                            <input type="text" class="form-control" name="card_exp_year" id="card_exp_year"
                                   aria-label="card_exp_month" aria-describedby="basic-addon2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="sec_code">Código de segurança</label>
                        <input type="text" class="form-control" name="card_cvv" id="card_cvv">
                    </div>
                </div>

                <button class="btn btn-success btn-lg" style="margin-top: 20px">Efetuar pagamento</button>

            </form>

        </div>

    </div>

@endsection
