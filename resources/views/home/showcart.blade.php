@extends('home.app')
@section('content')
    <div class="hero_area">
        <!-- header section strats -->
        @include("home.header")

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container mt-5">
            <table class="table table-bordered table-hover text-center">
                <tr>
                    <th>Название продукта</th>
                    <th>Количество продукта</th>
                    <th>Цена</th>
                    <th>Изображение</th>
                    <th>Действие</th>
                </tr>
                <?php $total_price = 0; ?>
                @foreach($carts as $item)
                    <tr>
                        <td>{{ $item->product->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            @if($item->product->discount_price != null)
                                {{ $item->product->discount_price }}$ /
                                {{ $item->product->discount_price * $item->quantity }}$
                                <?php $total_price += $item->quantity * $item->product->discount_price ?>
                            @else
                                {{ $item->product->price }}$ /
                                {{ $item->product->price * $item->quantity }}$
                                <?php $total_price += $item->quantity * $item->product->price ?>
                            @endif
                        </td>
                        <td>
                            <img style="height: 100px" src="{{ asset('product/'.$item->product->image) }}" alt="">
                        </td>
                        <td>
                            <form action="{{ route('remove_cart', $item->id) }}">
                                <button class="show_confirm btn btn-danger">Удалить корзину</button>
                            </form>
{{--                            <a href="{{ route('remove_cart', $item->id) }}" class="show_confirm btn btn-danger">Remove Cart</a>--}}
                        </td>
                    </tr>
                @endforeach
            </table>
            <p class="text-center">Итоговая цена: {{ $total_price }}$</p>
            <div class="text-center mt-5">
                <p>Перейти к заказу</p>
                <a href="{{ route('cash_order') }}" class="btn btn-danger">Оплата при доставке</a>
                <a href="{{ route('stripe', $total_price) }}" class="btn btn-danger">Оплатить картой</a>
            </div>
        </div>
    </div>
@endsection
