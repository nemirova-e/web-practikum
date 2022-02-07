<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zastrahui Bratuhu</title>
</head>
<body>
<h1>Застрахуй братуху! </h1>
<h2>Маркетплейс страховых компаний для каждого</h2>
@guest
    @if(Route::has('login'))
        <a href="{{ route('login') }}">Войти в личный кабинет</a>
    @endif
    <br>
    @if(Route::has('register'))
        <a href="{{ route('register') }}">Зарегистрироваться</a>
    @endif
@endguest
@auth
    @if(Route::has('lk'))
        <a href="{{ route('lk') }}">Личный кабинет</a>
    @endif
@endauth
</body>
</html>
