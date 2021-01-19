@extends('layouts.front')

@section('stylesheets')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
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
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="card_number" id="card_number"
                                   aria-label="card_number" aria-describedby="basic-addon2">
                            <span class="input-group-text brand" id="basic-addon2"></span>
                            <input type="hidden" name="card_brand" value="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="card_name">Titular do cartão</label>
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="card_name" id="card_name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="card_cpf">CPF do titular</label>
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="card_cpf" id="card_cpf">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label for="card_expirationMonth">Expira em</label>
                    <div class="col-3">
                        <div class="input-group col-md-2">
                            <span class="input-group-text" id="basic-addon1">Mês</span>
                            <input type="text" class="form-control" name="card_expirationMonth"
                                   id="card_expirationMonth"
                                   aria-label="card_expirationMonth" aria-describedby="basic-addon1" maxlength="2">
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="input-group col-md-2">
                            <span class="input-group-text" id="basic-addon2">Ano</span>
                            <input type="text" class="form-control" name="card_expirationYear" id="card_expirationYear"
                                   aria-label="card_expirationYear" aria-describedby="basic-addon2" maxlength="4">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="card_cvv">Código de segurança</label>
                        <input type="text" class="form-control" name="card_cvv" id="card_cvv">
                    </div>

                    <div class="col-md-12 installments form-group">

                    </div>
                </div>

                <button class="btn btn-success btn-lg proccessCheckout" style="margin-top: 20px">Efetuar pagamento
                </button>

            </form>

        </div>

    </div>

@endsection

@section('scripts')
    <script
        src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        const sessionId = '{{session()->get('pagseguro_session_code')}}';

        PagSeguroDirectPayment.setSessionId(sessionId);

        let amountTransaction = '{{$cartItems}}';
        let cardNumber = document.querySelector('input[name=card_number]');
        let spanBrand = document.querySelector('span.brand');
        cardNumber.addEventListener('keyup', function () {

            if (cardNumber.value.length >= 6) {
                PagSeguroDirectPayment.getBrand({
                    cardBin: cardNumber.value.substr(0, 6),
                    success: function (res) {
                        brand = res.brand.name;
                        let imgFlag = `<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${brand}.png" alt="">`;
                        spanBrand.innerHTML = imgFlag;
                        document.querySelector('input[name=card_brand]').value = brand;
                        getInstallments(amountTransaction, brand);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            }
        })

        let submitButton = document.querySelector('button.proccessCheckout');

        submitButton.addEventListener('click', function (event) {
            event.preventDefault();

            PagSeguroDirectPayment.createCardToken({
                cardNumber: document.querySelector('input[name=card_number]').value,
                brand: document.querySelector('input[name=card_brand]').value,
                cvv: document.querySelector('input[name=card_cvv]').value,
                expirationMonth: document.querySelector('input[name=card_expirationMonth]').value,
                expirationYear: document.querySelector('input[name=card_expirationYear]').value,
                success: function (res) {
                    processPayment(res.card.token);
                },
                error: function (err) {
                    console.log(err);
                }
            })
        });

        function processPayment(token) {
            let data = {
                card_token: token,
                hash: PagSeguroDirectPayment.getSenderHash(),
                installment: document.querySelector('.select_installments').value,
                card_name: document.querySelector('input[name=card_name]').value,
                card_cpf: document.querySelector('input[name=card_cpf]').value,
                _token: '{{csrf_token()}}'
            };

            $.ajax({
                type: 'POST',
                url: '{{route("checkout.proccess")}}',
                data: data,
                dataType: 'json',
                success: function (res) {
                    console.log('success');
                    toastr.success(res.data.message, 'Pedido enviado!');
                    window.location.href = '{{route('checkout.thanks')}}?order=' + res.data.order;
                },
                error: function (err) {
                    // console.log(err);
                }
            });
        }


        function getInstallments(amount, brand) {
            PagSeguroDirectPayment.getInstallments({
                amount: amount,
                brand: brand,
                maxInstallmentNoInterest: 0,
                success: function (res) {
                    let selectInstallments = drawSelectInstallments(res.installments[brand]);
                    document.querySelector('div.installments').innerHTML = selectInstallments;
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

        function drawSelectInstallments(installments) {
            let select = '<label>Opções de Parcelamento:</label>';

            select += '<select class="form-control select_installments">';

            for (let l of installments) {
                select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total ${l.totalAmount}</option>`;
            }


            select += '</select>';

            return select;
        }
    </script>
@endsection

