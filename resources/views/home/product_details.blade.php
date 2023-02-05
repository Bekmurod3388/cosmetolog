@extends('home.app')
@section('content')
    <div class="hero_area">
        <!-- header section strats -->
        @include("home.header")
        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">
            <div class="box">
                <div class="img-box">
                    <img style="width: 100%" src="{{ asset("product/".$product->image) }}" alt="">
                </div>
                <div class="detail-box">
                    <h5>
                        {{ $product->title }}
                    </h5>
                    @if($product->discount_price != null)
                        <h6 style="color: red">
                            Цена со скидкой<br>
                            {{ $product->discount_price }}$
                        </h6>
                        <h6 style="text-decoration: line-through; color: blue">
                            Цена <br>
                            {{ $product->price }}$
                        </h6>
                    @else
                        <h6 style="color: blue">
                            Цена <br>
                            {{ $product->price }}$
                        </h6>
                    @endif
                    <h6>Категория продукта : {{ $product->category }}</h6>
                    <h6>Информация о продукте : {{ $product->description }}</h6>
                    <h6>Доступное количество : {{ $product->quantity }}</h6>

                    <form action="{{ route('add_cart', $product->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="number" name="quantity" value="1" min="1" style="width: 100%">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Добавить в корзину">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
