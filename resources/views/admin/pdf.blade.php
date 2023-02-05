<html>
<head>
    <title>Заказать PDF</title>
    <style>
        *{
            font-family: "DejaVu Sans", sans-serif;
        }
    </style>
</head>
<body>
<h1>Информация о продукте</h1>
Имя клиента: <h3> {{ $order->user->name }}</h3>
Электронная почта клиента: <h3> {{ $order->user->email }}</h3>
Телефон клиента: <h3> {{ $order->user->phone }}</h3>
Адрес клиента: <h3> {{ $order->user->address }}</h3>
Пользовательский ИД: <h3> {{ $order->user->id }}</h3>
Наименование товара: <h3> {{ $order->product->title }}</h3>
Цена продукта: <h3> ${{ $order->price * $order->quantity}}$</h3>
Количество продукта: <h3> {{ $order->quantity }}</h3>
Статус продукта: <h3> {{ $order->payment_status }}</h3>
Код товара: <h3> {{ $order->product_id }}</h3>
{{--<p>product/{{$order->product->image}}</p>--}}
<img height="200" width="400" src="{{ 'product/'.$order->product->image}}" alt="">
</body>
</html>
