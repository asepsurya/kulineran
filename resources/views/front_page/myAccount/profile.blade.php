@extends('front_page.layout.main')
@section('container')

<div class="osahan-profile">
    
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
                            <div class="order-body">
                            @foreach ($myorder as $item)
                            {{-- deklarasi noPesanan untuk table Pesanaan --}}
                            @php $noPesanan = $item->noPesanan; @endphp
                                @if ($item->statusorder == "4")
                                    @foreach ($pesanan as $p )
                                         @if ($p->noPesanan == $noPesanan)
                                            @php
                                                $idProduk = $p->idProduk;
                                                $nama = $p->produk->namaProduk;
                                                $gambar = $p->produk->gambar;
                                            @endphp
                                         @endif
                                    @endforeach
                                <div class="pb-3">
                                    <div class="p-3 rounded  bg-white">
                                        <div class="d-flex border-bottom pb-3">
                                            <div class="text-muted mr-3">
                                                <img alt="#" src="/storage/{{ $gambar }}" class="img-fluid order_img rounded">
                                            </div>
                                            <div>
                                                <p class="mb-0 font-weight-bold"><a href="" class="text-dark">#INVOICE <span class="text-primary">{{ $item->noPesanan }}</span></a></p>
                                                <p class="mb-0"><strong>Jumlah Pesanan : </strong>{{ $item->qty }} Menu</p>
                                                <p class="mb-0">
                                                
                                                <p class="mb-0 small mt-3"><a href="/orderdetile/{{ $item->noPesanan }}">Order Detail</a></p>
                                            </div>
                                            <div class="ml-auto">
                                                <p class="bg-success text-white py-1 px-2 rounded small mb-1">Selesai</p>
                                                <p class="small font-weight-bold text-right"><i class="feather-clock"></i>{{ $item->created_at }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <p>Metode Pengiriman : <br> {{ $item->pengiriman }}</p>
                                            <div class="text-muted m-0 ml-auto mr-3 small">Total Pesanan<br>
                                                <span class="text-dark font-weight-bold">Rp.{{number_format($item->Totalbayar  ,0,".",".")  }}</span>
                                            </div>
                                            <div class="text-right">
                                                <a href="/orderdetile/{{ $item->noPesanan }}" class="btn btn-primary px-3">Detail Menu</a>
                                                <a href="/addCart/item/{{ $idProduk }}" class="btn btn-outline-primary px-3">Reorder</a>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                           
                            @endforeach
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