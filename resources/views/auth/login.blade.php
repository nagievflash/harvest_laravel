<!DOCTYPE html>
<html lang="en">
<head>
    <title>Moderna - Bootstrap 3 flat corporate template</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>

    <div id="wrapper">
        <form id="" method="POST" action="/login">
            @csrf
            <input class="login" name="login" type="text" />
            <input class="password" name="password" type="password" />
            <input class="submit" name="submit" type="submit" />

        </form>
        {{ $error }}
    </div>


</body>
</html>
