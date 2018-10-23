<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $login;
    protected $password;

    public function index()
    {
        if (isset($_COOKIE['uid'])&&isset($_COOKIE['auth'])) {
            return redirect()->route('dashboard');
        }
        else {
            $error = '';
            return view('auth\login')->with('error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $login = $request->login;
        $password = $request->password;

        $client = new \GuzzleHttp\Client();

        $response = $client->post('https://apitest.harvest.wtf/auth', [
            \GuzzleHttp\RequestOptions::JSON => ['username' => $login, 'password' => $password
        ], 'http_errors' => false
        ]);

        if ($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $obj = json_decode($body);
            setcookie('uid', $obj->uid, time()+60*60);
            setcookie('auth', $obj->auth, time()+60*60);
            return redirect()->route('dashboard');
        }
        else {
            $error = "Неверный логин и пароль";
            return view('auth\login')->with('error', $error);
        }

    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
