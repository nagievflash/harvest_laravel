<?php


use GuzzleHttp\Client;

function getCurrency($currency) {
    $url = "http://www.cbr.ru/scripts/XML_daily.asp";
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    $contents = curl_exec($ch);
    if (curl_errno($ch)) {
      echo curl_error($ch);
      echo "\n<br />";
      $contents = '';
    } else {
      curl_close($ch);
    }

    if (!is_string($contents) || !strlen($contents)) {
    echo "Failed to get contents.";
    $contents = '';
    }



    $file = simplexml_load_string($contents);
    foreach ($file->Valute as $value) {
        if ($value->CharCode == $currency) {
            return $value->Value;
        }
    }
}
function getBitcoin() {
    $url = "https://api.coinmarketcap.com/v2/ticker/1/?convert=USD";

    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    $contents = curl_exec($ch);
    if (curl_errno($ch)) {
      echo curl_error($ch);
      echo "\n<br />";
      $contents = '';
    } else {
      curl_close($ch);
    }

    if (!is_string($contents) || !strlen($contents)) {
    echo "Failed to get contents.";
    $contents = '';
    }



    $file = json_decode($contents);
    $data = array();
    $data['price'] = round($file->data->quotes->USD->price, 2);
    $data['change'] = $file->data->quotes->USD->percent_change_24h;
    if ($file->data->quotes->USD->percent_change_24h<0) {
        $data['class'] = 'down';
    }
    else {
        $data['class'] = 'up';
    }
    return $data;
}

function getETH() {
    $url = "https://api.coinmarketcap.com/v2/ticker/1027/?convert=USD";

    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    $contents = curl_exec($ch);
    if (curl_errno($ch)) {
      echo curl_error($ch);
      echo "\n<br />";
      $contents = '';
    } else {
      curl_close($ch);
    }

    if (!is_string($contents) || !strlen($contents)) {
    echo "Failed to get contents.";
    $contents = '';
    }



    $file = json_decode($contents);
    $data['price'] = round($file->data->quotes->USD->price, 2);
    $data['change'] = $file->data->quotes->USD->percent_change_24h;
    if ($file->data->quotes->USD->percent_change_24h<0) {
        $data['class'] = 'down';
    }
    else {
        $data['class'] = 'up';
    }
    return $data;
}
