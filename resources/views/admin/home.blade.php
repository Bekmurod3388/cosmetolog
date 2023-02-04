@extends('admin.app')
@section('content')
    <div class="row row-cols-4">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3>{{ $total_product }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="fa fa-arrow-circle-up"></span>
                            </div>
                        </div>
                    </div>
                    <h6>Total Products</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3>{{ $total_order }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="fa fa-arrow-circle-up"></span>
                            </div>
                        </div>
                    </div>
                    <h6>Total Orders</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3>{{ $total_user }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="fa fa-arrow-circle-up"></span>
                            </div>
                        </div>
                    </div>
                    <h6>Total Customers</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3>${{ $total_revenue }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="fa fa-arrow-circle-up"></span>
                            </div>
                        </div>
                    </div>
                    <h6>Total Revenue</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3>{{ $total_delivered }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="fa fa-arrow-circle-up"></span>
                            </div>
                        </div>
                    </div>
                    <h6>Order Delivered</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3>{{ $total_processing }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="fa fa-arrow-circle-up"></span>
                            </div>
                        </div>
                    </div>
                    <h6>Order Processing</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
