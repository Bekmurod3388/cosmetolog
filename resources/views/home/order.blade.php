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
                    <th>Статус платежа</th>
                    <th>О состоянии доставки</th>
                    <th>Изображение</th>
                    <th>Отменить заказ</th>
                </tr>
                @foreach($orders as $item)
                    <tr>
                        <td>{{ $item->product->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            @if($item->product->discount_price != null)
                                {{ $item->product->discount_price * $item->quantity }}$
                            @else
                                {{ $item->product->price * $item->quantity }}$
                            @endif
                        </td>
                        <td>{{ $item->payment_status }}</td>
                        <td>{{ $item->delivery_status }}</td>
                        <td>
                            <img style="height: 100px" src="{{ asset('product/'.$item->product->image) }}" alt="">
                        </td>
                        <td>
                            @if($item->delivery_status == "обработка")
                                <form action="{{ route('cancel_order', $item->id) }}">
                                    @csrf
                                    <button class="show_confirm btn btn-danger">Отменить заказ</button>
                                </form>
{{--                                <a onclick="return confirm('Are you Sure to Cancel this order!!!')"--}}
{{--                               href="{{ route('cancel_order', $item->id) }}" class="btn btn-danger">Cancel Order</a>--}}
                            @else
                                <p style="color: blue">Не допускается</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
