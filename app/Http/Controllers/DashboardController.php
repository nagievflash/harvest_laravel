<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\GetApiData;

class DashboardController extends Controller
{
    private $data = [];

    /**
    *  Переменная экземпляр класса  App\Helpers\GetApiData;
    *
    *  @public id, token, error
    *
    *  @methods $instance->getWallet();
    *
    */

    private $instance;

    public function __construct()
    {
        //Выводим информацию по кошельку
        $this->instance = new GetApiData();
    }

    public function index($btc = '', $eth = '') {

        $this->instance->getWallet();

        //exeption(404)
        if ($this->instance->error == '404') {

        }
        //Заносим в массив data значения из кошелька
        print_r($this->instance->data);
        $this->data['balances'] = $this->instance->data->balance;
        $this->data['address'] = $this->instance->data->address;

        //Курсы валют
        $this->data['btc'] = getBitcoin();
        $this->data['eth'] = getETH();
        //$usd = getCurrency('USD');


        return view('dashboard\wallet')->with('data', $this->data);
    }


    public function privacy() {
        return view('dashboard\privacy');
    }
    public function exchange() {
        $this->data['btc'] = getBitcoin();
        $this->data['eth'] = getETH();
        return view('dashboard\exchange')->with('data', $this->data);
    }
}
