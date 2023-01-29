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
    <!-- profile -->
    <div class="container position-relative">
        <div class="py-5 osahan-profile row">
            @include('front_page.myAccount.menu')
            <div class="col-md-8 mb-3">
                <div class="rounded shadow-sm p-4 bg-white">
                    <h5 class="mb-4">Akun Saya</h5>
                    <div id="edit_profile">
                        <div>
                            <form action="/profile/update" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama_lengkap"
                                        value="{{ auth()->user()->nama_lengkap }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ auth()->user()->email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNumber1">Telepon</label>
                                    <input type="number" class="form-control" id="telp" name="telp"
                                        value="{{ auth()->user()->telp }}" disabled>
                                </div>

                                <div class="text-center">
                                    <button type="button" class="btn btn-primary btn-block" id="enable">Ubah</button>
                                    <button type="submit" class="btn btn-primary btn-block" id="simpan">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div class="additional">
                            <div class="change_password my-3">
                                <a class="p-3 border rounded bg-white btn d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#ubahPassword">Ubah Password
                                    <i class="feather-arrow-right ml-auto"></i></a>
                            </div>
                        </div>
                        <div class="order-body pt-3">
                            <h6 class="p-3 m-0 bg-light w-100">Riwayat Pesanan Saya</h6>
                            <div class="pb-3 pt-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" src="img/popular5.png" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="restaurant.html"
                                                    class="text-dark">Conrad Chicago Restaurant</a></p>
                                            <p class="mb-0">Punjab, India</p>
                                            <p>ORDER #321DERS</p>
                                            <p class="mb-0 small"><a href="status_complete.html">View Details</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">Delivered</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i>
                                                06/04/2020</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p class="text- font-weight-bold mb-0">Kesar Sweet x 1</p>
                                            <p class="text- font-weight-bold mb-0">Gulab Jamun x 4</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                            <span class="text-dark font-weight-bold">$12.74</span>
                                        </div>
                                        <div class="text-right">
                                            <a href="checkout.html" class="btn btn-primary px-3">Reorder</a>
                                            <a href="contact-us.html" class="btn btn-outline-primary px-3">Help</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3 ">

                                <div class="p-3 rounded  bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" src="img/popular4.png" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="restaurant.html"
                                                    class="text-dark">Conrad Chicago Restaurant</a></p>
                                            <p class="mb-0">Punjab, India</p>
                                            <p>ORDER #321DERS</p>
                                            <p class="mb-0 small"><a href="status_complete.html">View Details</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">Delivered</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i>
                                                06/04/2020</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p class="text- font-weight-bold mb-0">Kesar Sweet x 1</p>
                                            <p class="text- font-weight-bold mb-0">Gulab Jamun x 4</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                            <span class="text-dark font-weight-bold">$12.74</span>
                                        </div>
                                        <div class="text-right">
                                            <a href="checkout.html" class="btn btn-primary px-3">Reorder</a>
                                            <a href="contact-us.html" class="btn btn-outline-primary px-3">Help</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front_page.partial.footermobile')
    @include('front_page.myAccount.ubahPhoto')

    <div class="modal fade" id="ubahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
              <form action="/profile/ubahPassword" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Password Baru</label>
                    <input type="password" name="password" id="oldPassword" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Konfirmasi Password Baru</label>
                    <input type="password" name="confirmPassword" id="oldPassword" class="form-control @error('confirmPassword') is-invalid @enderror">
                    @error('confirmPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer p-0 m-0">
              <button type="submit" class="btn btn-primary btn-block">Save changes</button>
            </form>
            </div>
          </div>
        </div>
      </div>


    <script>

        $(document).ready(function(){
        $('#simpan').hide();
        $('#enable').click(function(){
            $('#enable').hide();
            $('#simpan').show();
            $('#nama').prop("disabled",false);
            $('#email').prop("disabled",false);
            $('#telp').prop("disabled",false);
       
        });
    });
    
    </script>
    @endsection