<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="">
    <title>Магазин косметики и парфюмерии в Ургенче</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}"/>
    <!-- font awesome style -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/css/my.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
{{--<div class="hero_area">--}}
<!-- header section strats -->
@include('sweetalert::alert')
<!-- end slider section -->
{{--</div>--}}
<!-- end header section -->
@yield('content')
<!-- footer start -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="full">
                    <div class="logo_footer">
                        <a class="nav-link" href="{{ url("/") }}" style="color: black; font-size: 30px; font-weight: bold">
                            Cosmetic Shop
                            {{--                <img width="250" src="{{ asset('assets/images/logo.png') }}" alt="#" />--}}
                        </a>
                    </div>
                    <div class="information_f">
                        <p><strong>АДРЕС: </strong> Хорезмская область, г. Ургенч, ул. аль-Хоразми 45</p>
                        <p><strong>ТЕЛЕФОН: </strong> +998 97 777 88 99</p>
                        <p><strong>ЭЛЕКТРОННАЯ ПОЧТА: </strong>urgench_cosmetolog@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Меню</h3>
                                    <ul>
                                        <li><a href="{{ route('welcome') }}">Главная</a></li>
                                        <li><a href="{{ route('product') }}">Продукты</a></li>
                                        <li><a href="{{ route('show_cart') }}">Корзина</a></li>
                                        <li><a href="{{ route('show_order') }}">Заказ</a></li>
{{--                                        <li><a href="#">Blog</a></li>--}}
{{--                                        <li><a href="#">Contact</a></li>--}}
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Профиль</h3>
                                    <ul>
                                        <li><a href="{{ route('redirect') }}">Профиль</a></li>
                                        <li><a href="{{ route('login') }}">Войти</a></li>
                                        <li><a href="{{ route('register') }}">Регистрация</a></li>
                                        <li><a href="{{ route('product') }}">Покупка</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-md-5">--}}
{{--                        <div class="widget_menu">--}}
{{--                            <h3>Newsletter</h3>--}}
{{--                            <div class="information_f">--}}
{{--                                <p>Subscribe by our newsletter and get update protidin.</p>--}}
{{--                            </div>--}}
{{--                            <div class="form_sub">--}}
{{--                                <form>--}}
{{--                                    <fieldset>--}}
{{--                                        <div class="field">--}}
{{--                                            <input type="email" placeholder="Enter Your Mail" name="email"/>--}}
{{--                                            <input type="submit" value="Subscribe"/>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2023 Все права защищены</p>
</div>


<script>
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Вы уверены, что хотите удалить эту запись?`,
            text: "Если вы удалите это, оно исчезнет навсегда.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ['Нет', 'Да']
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>


<!-- jQery -->
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<!-- popper js -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
