@extends('front_page.layout.main')
@section('container')
<div class="container position-relative">
    <div class="py-5 row">
        <div class="col-md-8 mb-3">
            <div>
                <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
                    <div class="osahan-cart-item-profile bg-white p-3">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 font-weight-bold">Alamat Pengiriman</h6>
                            <div class="row">
                                <div
                                    class="custom-control col custom-radio mb-3 position-relative border-custom-radio">
                                    <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                        class="custom-control-input" checked="">
                                    <label class="custom-control-label w-100" for="customRadioInline1">
                                        <div>
                                            <div class="p-3 bg-white rounded shadow-sm w-100">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0">Home</h6>
                                                    <p class="mb-0 badge badge-success ml-auto"><i
                                                            class="icofont-check-circled"></i> Default</p>
                                                </div>
                                                <p class="small text-muted m-0">1001 Veterans Blvd</p>
                                                <p class="small text-muted m-0">Redwood City, CA 94063</p>
                                            </div>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                                class="btn btn-block btn-light border-top">Edit</a>
                                        </div>
                                    </label>
                                </div>
                                
                            </div>
                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal"> ADD NEW
                                ADDRESS </a>
                        </div>
                    </div>
                </div>
                <div class="rounded shadow-sm bg-white overflow-hidden">
                    <h6 class="p-3 m-0 bg-light w-100">Keranjang Belanja</h6>
                    <div class="m-3">

                        <div class="p-3 border-bottom gold-members">
                            <span class="float-right col-2">
                                <input type="number" class="form-control " id="" name="qty" value="1" >
                                <i class="fas fa-sync-alt"></i>
                              </span>
                            <span class="float-right col-2">
                                <h6 class="mb-1">Total</h6>
                              <p class="text-muted mb-0">Rp.30.000</p>
                              </span>
                              <span class="float-right col-3">
                                <h6 class="mb-1">Varian</h6>
                              <p class="text-muted mb-0"> Pedas</p>
                              </span>
                            <div class="media">
                                <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                                <div class="media-body">
                                    <h6 class="mb-1">Chicken Tikka Sub </h6>
                                    <p class="text-muted mb-0">Rp.30.0000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 m-0 bg-light w-100">
                        <a href="/search" class="btn btn-primary">Lanjut Belanja</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
                <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
                    <img alt="osahan" src="{{ asset('img/logo_web.png') }}" class="mr-3 rounded-circle img-fluid">
                    <div class="d-flex flex-column mt-2">
                        <h6 class="mb-1  font-weight-bold">eFoody Store</h6>
                        <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> Jl. Mangkoko No.41 Kec.Indihiang </p>
                    </div>
                </div>

                {{-- <div class="bg-white border-bottom py-2">
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-danger">·</div>
                            <div class="media-body">
                                <p class="m-0">Chicken Tikka Sub</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button"
                                    class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                                </button><input class="count-number-input" type="text" readonly="" value="2"><button
                                    type="button" class="btn-sm right inc btn btn-outline-secondary"> <i
                                        class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-danger">·</div>
                            <div class="media-body">
                                <p class="m-0">Methi Chicken Dry
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button"
                                    class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                                </button><input class="count-number-input" type="text" readonly="" value="2"><button
                                    type="button" class="btn-sm right inc btn btn-outline-secondary"> <i
                                        class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-danger">·</div>
                            <div class="media-body">
                                <p class="m-0">Reshmi Kebab
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button"
                                    class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                                </button><input class="count-number-input" type="text" readonly="" value="2"><button
                                    type="button" class="btn-sm right inc btn btn-outline-secondary"> <i
                                        class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-success">·</div>
                            <div class="media-body">
                                <p class="m-0">Lemon Cheese Dry
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button"
                                    class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                                </button><input class="count-number-input" type="text" readonly="" value="2"><button
                                    type="button" class="btn-sm right inc btn btn-outline-secondary"> <i
                                        class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2">
                        <div class="media align-items-center">
                            <div class="mr-2 text-success">·</div>
                            <div class="media-body">
                                <p class="m-0">Rara Paneer</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button"
                                    class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                                </button><input class="count-number-input" type="text" readonly="" value="2"><button
                                    type="button" class="btn-sm right inc btn btn-outline-secondary"> <i
                                        class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                </div> --}}
                <h6 class="p-3 m-0 bg-light w-100">Metode Pengiriman</h6>
                <div class="bg-white p-3 py-3 border-bottom clearfix">


                    <div class="btn-group btn-group-toggle w-100 mb-3" data-toggle="buttons">
                        <label class="btn btn-outline-secondary active">
                            <input type="radio" name="options" id="option1" checked="">  Pemesanan Langsung
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="options" id="option2"> Delivery Order
                        </label>
                    </div>


                    {{-- <div class="input-group-sm mb-2 input-group">
                        <input placeholder="Enter promo code" type="text" class="form-control">
                        <div class="input-group-append"><button type="button" class="btn btn-primary"><i
                                    class="feather-percent"></i> APPLY</button></div>
                    </div> --}}
                    <div class="mb-0 input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i
                                    class="feather-message-square"></i></span></div>
                        <textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="bg-white p-3 clearfix border-bottom">
                    <p class="mb-1">Item Total <span class="float-right text-dark">$3140</span></p>
                    <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span></p>
                    <p class="mb-1">Delivery Fee<span class="text-info ml-1"><i class="feather-info"></i></span><span
                            class="float-right text-dark">$10</span></p>
                    <p class="mb-1 text-success">Total Discount<span class="float-right text-success">$1884</span></p>
                    <hr>
                    <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">$1329</span></h6>
                </div>
                <div class="p-3">
                    <a class="btn btn-success btn-block btn-lg" href="successful.html">Bayar $1329<i
                            class="feather-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection