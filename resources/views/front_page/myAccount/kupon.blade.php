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
                    <h5 class="p-4">Available Coupons</h5>
                    <div class="p-3 border-bottom gold-members">
                        <span class="float-right"></span>
                        <div class="media">

                            <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                            <div class="media-body">
                                <a href="/address/update/">
                                 <h6 class="mb-1">Get 15% discount using HDFC PayZapp Card</a> 
                                   
                                        <span class="badge badge-success">belaku Sampai : 20 agst 2023</span>
                                  
                                 </h6>
                                 Use code PAYZAPP100 & get 15% discount up to Rs.100 on orders above Rs.250
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection