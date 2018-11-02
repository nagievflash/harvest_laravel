@extends('dashboard.main')

@section('content')

<div class="page-title col-12">
    <h1 class="title">Обмен</h1>
    <p class="description">Здесь вы можете продать и купить валюты</p>
</div>
<div class="row">
    <div class="col-12">
        <div class="exchange-wrapper">
            <form action="/dashboard/exchange" method="POST" id="exchange">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exchange-from">Обменять</label>
                        <select id="exchange-from" class="form-control">
                            <option name="hft">HFT</option>
                            <option name="btc" data-course="{{ $data['btc']['price'] }}">BITCOIN</option>
                            <option name="eth" data-course="{{ $data['eth']['price'] }}">ETHEREUM</option>
                            <option name="usd">USD</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exchange-to">Получить</label>
                        <select id="exchange-to" class="form-control">
                            <option name="btc" data-course="{{ $data['btc']['price'] }}">BITCOIN</option>
                            <option name="hft">HFT</option>
                            <option name="eth" data-course="{{ $data['eth']['price'] }}">ETHEREUM</option>
                            <option name="usd">USD</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 exchange-price exchange-price-from">
                        <label for="price-from">Введите сумму</label>
                        <input type="text" id="price-from" class="form-control" />
                        <input type="text" class="price-course form-control" disabled="disabled" />
                    </div>
                    <div class="form-group col-md-6 exchange-price exchange-price-to">
                        <label for="price-to">Получить</label>
                        <input type="text" id="price-to" class="form-control" />
                        <input type="text" class="price-course form-control" disabled="disabled"  />
                    </div>
                    <div class="form-group col-md-12">
                        <p class="notification text-danger">Комиссия операции 0,00000000345 BTC</p>
                    </div>
                    <div class="form-group col-12">
                        <input type="submit" class="btn btn-default btn-block" value="Продолжить" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

@section('script')
<script>
    $('#exchange select').change(function() {
        var self = $(this);
        var option = self.find('option:selected').attr('name');
        var selectId = self.attr('id');
        var otherSelect = $('#exchange select').not(self);
        var otherOption = otherSelect.find('option:selected').attr('name');
        if (option == otherOption) {
            otherSelect.find('option:selected').prop('selected', false).next().prop('selected', true);;
        }
    })
</script>
@stop
