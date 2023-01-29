@extends('front_page.layout.main')
@section('container')

<div class="osahan-profile">
    <div class="d-none">
        <div class="bg-primary border-bottom p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2 hc-nav-trigger hc-nav-1" href="#" role="button"
                aria-controls="hc-nav-1"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Profile</h4>
        </div>
    </div>

    <div class="container position-relative">
        <div class="py-5 osahan-profile row">
            @include('front_page.myAccount.menu')
            <div class="col-md-8 mb-3">
                <div class="rounded shadow-sm p-0 bg-white">
                    <div class="osahan-status">
                        <!-- status complete -->
                        <div class="p-3 status-order bg-white border-bottom d-flex align-items-center">
                            <p class="m-0"><i class="feather-calendar text-primary"></i> 16 June, 11:30AM</p>
                            <a href="review.html" class="text-primary ml-auto text-decoration-none">Review</a>
                        </div>
                        <div class="p-3 border-bottom">
                            <h6 class="font-weight-bold">Order Status</h6>
                            <div class="tracking-wrap">
                                <div class="my-1 step active">
                                    <span class="icon text-success"><i class="feather-check"></i></span>
                                    <span class="text small">Preparing order</span>
                                </div>
                                <!-- step.// -->
                                <div class="my-1 step active">
                                    <span class="icon text-success"><i class="feather-check"></i></span>
                                    <span class="text small"> Ready to collect</span>
                                </div>
                                <!-- step.// -->
                                <div class="my-1 step">
                                    <span class="icon text-success"><i class="feather-check"></i></span>
                                    <span class="text small"> On the way </span>
                                </div>
                                <!-- step.// -->
                                <div class="my-1 step">
                                    <span class="icon text-success"><i class="feather-check"></i></span>
                                    <span class="text small">Delivered Order</span>
                                </div>
                                <!-- step.// -->
                            </div>
                        </div>
                        <!-- Destination -->
                        <div class="p-3 border-bottom bg-white">
                            <h6 class="font-weight-bold">Destination</h6>
                            <p class="m-0 small">554 West 142nd Street, New York, NY 10031</p>
                        </div>
                        <div class="p-3 border-bottom">
                            <p class="font-weight-bold small mb-1">Courier</p>
                            <img alt="#" src="img/logo_web.png" class="img-fluid sc-osahan-logo mr-2"> <span class="small text-primary font-weight-bold">Grocery Courier
                    </span>
                        </div>
                        <!-- total price -->
                        <!-- Destination -->
                        <div class="p-3 bg-white">
                            <div class="d-flex align-items-center mb-2">
                                <h6 class="font-weight-bold mb-1">Total Cost</h6>
                                <h6 class="font-weight-bold ml-auto mb-1">$8.52</h6>
                            </div>
                            <p class="m-0 small text-muted">You can check your order detail here,<br>Thank you for order.</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection