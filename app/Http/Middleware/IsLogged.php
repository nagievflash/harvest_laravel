<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Cookie;

class IsLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (isset($_COOKIE['uid'])&&isset($_COOKIE['auth']))
        {
            $uid = $_COOKIE['uid'];
            $auth = $_COOKIE['auth'];

            $client   = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://apitest.harvest.wtf/profiles/me', [
                'headers' => [
                    'Authorization' => $auth
                ],
                'http_errors' => false
            ]);

            if ($response->getStatusCode() == 200) {
                $body = $response->getBody();
                $obj = json_decode($body);
                setcookie('uid', $obj->id, time()+60*60);
                setcookie('auth', $auth, time()+60*60);
            }
            else {
                setcookie("uid", "", time() - 100);
                setcookie("auth", "", time() - 100);
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
