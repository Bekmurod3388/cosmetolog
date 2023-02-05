<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Онлайн магазин</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset("admin/img/favicon.ico") }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset("admin/lib/owlcarousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
    <link href="{{ asset("admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css") }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset("admin/css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset("admin/css/style.css") }}" rel="stylesheet">
</head>

<body>
{{--<div class="container-xxl position-relative bg-white d-flex p-0">--}}
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="{{ route('redirect') }}" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Админ</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="{{ asset("admin/img/user.jpg") }}" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h6>
                    <span>Админ</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="{{url('redirect')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Статистика</a>
                <a href="{{url('view_category')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Категория</a>
                <a href="{{url('view_product')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Продукти</a>
                <a href="{{url('order')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Заказ</a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->
    <div class="content">
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input id="search" onkeyup="myFunction()" class="form-control border-0" type="text" placeholder="Поиск">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="{{ asset("admin/img/user.jpg") }}" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        @auth

                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <input type="submit" class="dropdown-item" value="Выйти">

                                </form>

                        @endauth
                    </div>
                </div>
            </div>
        </nav>
        <br>
    @yield('content')

    <!-- Footer Start -->

    <!-- Footer End -->
</div>
<!-- Content End -->


<!-- Back to Top -->
{{--<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>--}}
{{--</div>--}}

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset("admin/lib/chart/chart.min.js") }}"></script>
<script src="{{ asset("admin/lib/easing/easing.min.js") }}"></script>
<script src="{{ asset("admin/lib/waypoints/waypoints.min.js") }}"></script>
<script src="{{ asset("admin/lib/owlcarousel/owl.carousel.min.js") }}"></script>
<script src="{{ asset("admin/lib/tempusdominus/js/moment.min.js") }}"></script>
<script src="{{ asset("admin/lib/tempusdominus/js/moment-timezone.min.js") }}"></script>
<script src="{{ asset("admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js") }}"></script>
<script src="{{ asset("https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js") }}" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!-- Template Javascript -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset("admin/js/main.js") }}"></script>
@yield('script')
</body>

</html>
