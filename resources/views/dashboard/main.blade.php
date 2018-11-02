<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-type" contnent="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css" type="text/css">
        <link rel="stylesheet" href="/css/custom.css" type="text/css">
        <script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>

    </head>
    <body>
        <div id="container">
            <div class="row">
                @include('dashboard.layouts.header')
                <div id="content">
                    @include('dashboard.layouts.sidebar')
                    <section id="main-content">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </section>
                </div>
            </div>
        </div>
        @include('dashboard.layouts.footer')
        @yield('script')
    </body>
</html>
