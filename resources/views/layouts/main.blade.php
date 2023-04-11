<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test task</title>
</head>
<body>
<a href="">Главная</a>
<ol>
    <li><a href="{{ route('grpToMs') }}">Внесение групп товаров в базу МС</a></li>
    <li><a href="{{ route('cliToMs') }}">Внесение клиентов в базу МС</a></li>
    <li><a href="{{ route('proToMs') }}">Внесение товаров в базу МС</a></li>
    <li><a href="{{ route('srvToMs') }}">Внесение услуг в базу МС</a></li>
    <li><a href="{{ route('wrhToMs') }}">Внесение складов в базу МС</a></li>
</ol>
<ol>
    <li><a href="{{ route('ordToMs') }}">Заказ покупателя</a></li>
    <li><a href="{{ route('dmdToMs') }}">Отгрузка</a></li>
    <li><a href="{{ route('slsRtToMs') }}">Возврат покупателя</a></li>
    <li><a href="{{ route('payInToMs') }}">Входящий платеж</a></li>
    <li><a href="{{ route('cshInToMs') }}">Приходный ордер</a></li>
</ol>

@yield('content')
</body>
</html>
