<?php

namespace App\Helpers;

class getApiData {
    public $id;
    public $token;
    public $apiURL = 'https://apitest.harvest.wtf/';
    public $data;
    public $error;

    public function __construct() {
        if (isset($_COOKIE['uid'])) {
            $this->id = $_COOKIE['uid'];
            $this->token = $_COOKIE['auth'];
        }
    }

    // GET DATA
    public function getData($response) {
        if ($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $obj = json_decode($body);
            $this->data = $obj;
        }
        else {
            setcookie("uid", "", time() - 100);
            setcookie("auth", "", time() - 100);
            $this->error = $response->getStatusCode();
        }
    }

    //GET WALLET DATA
    public function getWallet() {
        $client   = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->apiURL.'profiles/me/wallet', [
            'headers' => [
                'Authorization' => $this->token
            ],
            'http_errors' => false
        ]);
        $this->getData($response);
    }

}
