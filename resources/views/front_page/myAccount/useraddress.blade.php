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
                <div class="rounded shadow-sm p-0 bg-white">
                    <h5 class="p-4">Alamat Saya</h5>
                    <div class="p-3 border-bottom gold-members">
                        <span class="float-right"></span>
                        <div class="media">
                            <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                            <div class="media-body">
                                <h6 class="mb-1">Asep Surya S <span class="badge badge-danger">08982736621</span></h6>
                                <p class="text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Distinctio labore tempore architecto eligendi amet laboriosam quisquam quas veniam
                                    quod id.</p>
                            </div>
                        </div>
                    </div>
                    <a data-toggle="modal" data-target="#addAddress" class="text-dark">
                        <h6 class="p-3 m-0 bg-light w-100">+ Tambah Alamat</h6>
                    </a>
                </div>

            </div>
        </div>
    </div>

    @include('front_page.partial.footermobile')
    @include('front_page.myAccount.ubahPhoto')
    <!-- Modal -->
    <div class="modal fade" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered rounded" role="document">
            <div class="modal-content ">
                {{-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}
                <div class="modal-body p-0 m-0">
                    <form action="" method="post">
                        <button type="button" class="close mr-3 mt-3" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6 class="p-3 m-0 bg-light w-100">Kontak</h6>
                        <div class="p-3">
                            <div class="mb-3">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" id="" class="form-control" value="{{ auth()->user()->nama_lengkap }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Nomor Telepon</label>
                                <input type="text" name="telp" id="" class="form-control" value="{{ auth()->user()->telp }}">
                            </div>
                        </div>
                        <h6 class="p-3 m-0 bg-light w-100">Alamat</h6>
                        <div class="p-3">
                            <div class="mb-3">
                                <input type="text" name="nama" id="" class="form-control" placeholder="Nama Jalan, Gedung, No.Rumah">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="">Provinsi</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="">Kota/Kabupaten</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="">Kecamatan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="">Kelurahan/Desa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="other" id="other" class="form-control" placeholder="Detail Lainnya (contoh : blok / No., Patokan )">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    @endsection