<html>
<head>
    <title>Order PDF</title>
</head>
<body>
<h1>Product Details</h1>
Customer Name: <h3> {{ $order->user->name }}</h3>
Customer email: <h3> {{ $order->user->email }}</h3>
Customer phone: <h3> {{ $order->user->phone }}</h3>
Customer address: <h3> {{ $order->user->address }}</h3>
Customer id: <h3> {{ $order->user->id }}</h3>
Product Name: <h3> {{ $order->product->title }}</h3>
Product price: <h3> {{ $order->price }}</h3>
Product Quantity: <h3> {{ $order->quantity }}</h3>
Product Status: <h3> {{ $order->payment_status }}</h3>
Product id: <h3> {{ $order->product_id }}</h3>
{{--<p>product/{{$order->product->image}}</p>--}}
<img height="250" width="450" src="{{ 'product/'.$order->product->image}}" alt="">
</body>
</html>
