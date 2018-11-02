<!DOCTYPE html>
<html lang="en">
<head>
    <title>Harvest Wallet – Вход в личный кабинет</title>
    <meta http-equiv="Content-type" contnent="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <link rel="stylesheet" href="/css/custom.css" type="text/css">


</head>
<body class="login-page">

    <div id="wrapper">
        <div class="container">
            <div class="row justify-content-md-center align-items-center full-height">
                <div class="col-6">
                    <form id="loginform" method="POST" action="/login" class="form">
                        @csrf
                        <div class="form-title">
                            <h2>С Возвращением!</h2>
                            <p>Введите свои данные для входа в кошелек</p>
                        </div>
                        <label for="login">Логин-идентификатор</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">@</div>
                            </div>
                            <input name="login" type="text" class="form-control" placeholder="Введите логин-идентификатор вашего кошелька" />
                        </div>

                        <label for="password">Пароль</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">#</div>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Введите пароль" />
                        </div>
                        <div class="">
                            <p class="text-danger error">{{ $error }}</p>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" name="submit" type="submit" value="Вход" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
