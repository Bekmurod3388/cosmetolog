<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Наши <span>продукты</span>
            </h2>
            <br><br>
            <div>
                <form action="{{ route('product_search') }}" method="get">
                    @csrf
                    <input style="width: 500px;" type="text" name="search" placeholder="Искать что-то">
                    <input type="submit" value="поиск">
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product_details', $product->id) }}" class="option1">
                                    Информация о продукте
                                </a>
{{--                                <a href="" class="option1">--}}
{{--                                    Add To Cart--}}
{{--                                </a>--}}
                                <form action="{{ route('add_cart', $product->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1" style="width: 100%">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" value="Добавить в корзину" style="padding-left: 5px; padding-right: 5px;">
                                        </div>
                                    </div>
                                </form>
{{--                                <a href="" class="option2">--}}
{{--                                    Buy Now--}}
{{--                                </a>--}}
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset("product/".$product->image) }}" alt="">
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
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <span style="padding-top: 20px">
            {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}
        </span>
        {{--        <div class="btn-box">--}}
        {{--            <a href="">--}}
        {{--                View All products--}}
        {{--            </a>--}}
        {{--        </div>--}}
    </div>
</section>
