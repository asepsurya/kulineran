@extends('front_page.layout.main')
@section('container')

<div class="osahan-profile">
    <div class="d-none">
        <div class="bg-primary border-bottom p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2 hc-nav-trigger hc-nav-1" href="#" role="button" aria-controls="hc-nav-1"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Profile</h4>
        </div>
    </div>
    <!-- profile -->
    <div class="container position-relative">
        <div class="py-5 osahan-profile row">
           @include('front_page.myAccount.menu')
            <div class="col-md-8 mb-3">
                <div class="rounded shadow-sm p-4 bg-white">
                    <h5 class="mb-4">My account</h5>
                    <div id="edit_profile">
                        <div>
                            <form action="my_account.html">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="exampleInputName1d" name="nama_lengkap" value="{{ auth()->user()->nama_lengkap }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputName1" name="email" value="{{ auth()->user()->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNumber1">Telepon</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1" name="telp" value="{{ auth()->user()->telp }}">
                                </div>
                            
              
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="additional">
                            <div class="change_password my-3">
                                <a href="forgot_password.html" class="p-3 border rounded bg-white btn d-flex align-items-center">Change Password 
                          <i class="feather-arrow-right ml-auto"></i></a>
                            </div>
                            <div class="deactivate_account">
                                <a href="forgot_password.html" class="p-3 border rounded bg-white btn d-flex align-items-center">Deactivate Account 
                          <i class="feather-arrow-right ml-auto"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front_page.partial.footermobile')
    @include('front_page.myAccount.ubahPhoto')

@endsection