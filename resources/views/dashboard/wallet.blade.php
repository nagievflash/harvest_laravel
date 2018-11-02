@extends('dashboard.main')
@section('content')
{{ $data['address'] }}
<div class="charts col-12">
    <div class="page-title col-12">
        <h1 class="title">Мой кошелек</h1>
        <p class="description">Часто используемые функции и инструменты</p>
    </div>
    <div class="row">
        <div class="balance-chart col-md-6 col-sm-12">
            <div>
                <div class="block-title col-12">
                    <div class="row">
                        <h2>Мой баланс</h2>
                    </div>
                </div>
                <div class="balance-chart-wrapper">
                    <canvas id="balance-chart" width="200" height="200"></canvas>
                    <div class="balance-chart-description">
                        <div class="balance-chart-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.37 23.37"><defs><style>.dollar-black-1{fill:#12165c;}</style></defs><title>Транзакции USD</title><g id="Слой_2" data-name="Слой 2"><g id="Слой_1-2" data-name="Слой 1"><path class="dollar-black-1" d="M13.41,13.41a3,3,0,0,0-.58-.3l-.63-.23v3.44a3,3,0,0,0,.7-.22,2.31,2.31,0,0,0,.57-.37,1.71,1.71,0,0,0,.4-.53,1.58,1.58,0,0,0,.15-.7,1.21,1.21,0,0,0-.17-.65A1.47,1.47,0,0,0,13.41,13.41Z"/><path class="dollar-black-1" d="M9.66,8.86a1.38,1.38,0,0,0,.13.65,1.43,1.43,0,0,0,.34.42,1.8,1.8,0,0,0,.5.29l.61.26V7.26a2.24,2.24,0,0,0-1.1.52A1.36,1.36,0,0,0,9.66,8.86Z"/><path class="dollar-black-1" d="M11.68,0A11.68,11.68,0,1,0,23.37,11.68,11.68,11.68,0,0,0,11.68,0Zm4.23,15.9A3.55,3.55,0,0,1,15,17.06a4.16,4.16,0,0,1-1.28.77,6.13,6.13,0,0,1-1.58.37v1.27h-1V18.22A6.41,6.41,0,0,1,9,17.86a4.71,4.71,0,0,1-1.88-1.22L8.74,15a2.76,2.76,0,0,0,1.09.92,4.18,4.18,0,0,0,1.41.39V12.6l-.09,0q-.74-.21-1.41-.47a4.45,4.45,0,0,1-1.19-.67,3,3,0,0,1-.82-1A3.22,3.22,0,0,1,7.44,9a3.16,3.16,0,0,1,.32-1.43,3.59,3.59,0,0,1,.85-1.1,4.26,4.26,0,0,1,1.22-.75,5,5,0,0,1,1.43-.35V4.16h1V5.32h.16a5.87,5.87,0,0,1,1.84.31,4.46,4.46,0,0,1,1.61.91L14.34,8.17a3,3,0,0,0-1-.7,2.82,2.82,0,0,0-1.18-.26v3.52l.07,0q.74.19,1.45.44a5,5,0,0,1,1.27.64,3.12,3.12,0,0,1,.9,1,3,3,0,0,1,.34,1.5A3.64,3.64,0,0,1,15.91,15.9Z"/></g></g></svg>
                        </div>
                        <h3>12976$</h3>
                        <p class="stream">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.171 512.171" style="enable-background:new 0 0 512.171 512.171;" xml:space="preserve" width="512px" height="512px"><g><g><path d="M479.046,283.925c-1.664-3.989-5.547-6.592-9.856-6.592H352.305V10.667C352.305,4.779,347.526,0,341.638,0H170.971    c-5.888,0-10.667,4.779-10.667,10.667v266.667H42.971c-4.309,0-8.192,2.603-9.856,6.571c-1.643,3.989-0.747,8.576,2.304,11.627    l212.8,213.504c2.005,2.005,4.715,3.136,7.552,3.136s5.547-1.131,7.552-3.115l213.419-213.504    C479.793,292.501,480.71,287.915,479.046,283.925z" fill="#0ed198"/></g></g></svg>
                            <span>$126</span>
                        </p>
                    </div>
                    <div id='balance-chart-legend' class='balance-chart-legend'></div>
                </div>
            </div>
        </div>
        <div class="price-chart col-md-6 col-sm-12">
            <div>
                <div class="block-title col-12">
                    <div class="row">
                        <h2 style="margin-bottom:35px;">Изменения курса валют</h2>
                    </div>
                </div>
                <div class="currency-chart-wrapper" style="position: relative; height:400px;">
                    <canvas id="currency-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="cards col-md-6 col-sm-12">
            <div>
                <div class="block-title col-12">
                    <div class="row">
                        <h2>Актуальные курсы</h2>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table class="info-table table">
                        <thead>
                            <tr>
                                <th colspan="2">Currency</th>
                                <th>Current Price</th>
                                <th>Change</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>Bitcoin <span class="grey">(BTC)</span></td>
                                <td>${{ $data['btc']['price'] }}</td>
                                <td>
                                    <p class="stream {{ $data['btc']['class'] }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.171 512.171" style="enable-background:new 0 0 512.171 512.171;" xml:space="preserve" width="512px" height="512px"><g><g><path d="M479.046,283.925c-1.664-3.989-5.547-6.592-9.856-6.592H352.305V10.667C352.305,4.779,347.526,0,341.638,0H170.971    c-5.888,0-10.667,4.779-10.667,10.667v266.667H42.971c-4.309,0-8.192,2.603-9.856,6.571c-1.643,3.989-0.747,8.576,2.304,11.627    l212.8,213.504c2.005,2.005,4.715,3.136,7.552,3.136s5.547-1.131,7.552-3.115l213.419-213.504    C479.793,292.501,480.71,287.915,479.046,283.925z" fill="#0ed198"></path></g></g></svg>
                                        <span>{{ $data['btc']['change'] }} %</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Ethereum <span class="grey">(ETH)</span></td>
                                <td>${{ $data['eth']['price'] }}</td>
                                <td>
                                    <p class="stream {{ $data['eth']['class'] }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.171 512.171" style="enable-background:new 0 0 512.171 512.171;" xml:space="preserve" width="512px" height="512px"><g><g><path d="M479.046,283.925c-1.664-3.989-5.547-6.592-9.856-6.592H352.305V10.667C352.305,4.779,347.526,0,341.638,0H170.971    c-5.888,0-10.667,4.779-10.667,10.667v266.667H42.971c-4.309,0-8.192,2.603-9.856,6.571c-1.643,3.989-0.747,8.576,2.304,11.627    l212.8,213.504c2.005,2.005,4.715,3.136,7.552,3.136s5.547-1.131,7.552-3.115l213.419-213.504    C479.793,292.501,480.71,287.915,479.046,283.925z" fill="#0ed198"></path></g></g></svg>
                                        <span>{{ $data['eth']['change'] }} %</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Harvest <span class="grey">(HFT)</span></td>
                                <td>$12 000</td>
                                <td>
                                    <p class="stream">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.171 512.171" style="enable-background:new 0 0 512.171 512.171;" xml:space="preserve" width="512px" height="512px"><g><g><path d="M479.046,283.925c-1.664-3.989-5.547-6.592-9.856-6.592H352.305V10.667C352.305,4.779,347.526,0,341.638,0H170.971    c-5.888,0-10.667,4.779-10.667,10.667v266.667H42.971c-4.309,0-8.192,2.603-9.856,6.571c-1.643,3.989-0.747,8.576,2.304,11.627    l212.8,213.504c2.005,2.005,4.715,3.136,7.552,3.136s5.547-1.131,7.552-3.115l213.419-213.504    C479.793,292.501,480.71,287.915,479.046,283.925z" fill="#0ed198"></path></g></g></svg>
                                        <span>4.5 %</span>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="cards col-md-6 col-sm-12">
            <div>
                <div class="block-title col-12">
                    <div class="row">
                        <h2>Последние действия</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="/js/blockchain.js"></script>
@stop
