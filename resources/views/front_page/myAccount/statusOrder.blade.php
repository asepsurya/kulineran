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
                <div >
                    <section class="osahan-main-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <ul class="nav nav-tabsa custom-tabsa border-0 flex-column bg-white rounded overflow-hidden shadow-sm p-2 c-t-order" id="myTab" role="tablist">
                                        <li class="nav-item border-top" role="presentation">
                                            <a class="nav-link border-0 text-dark py-3 active" id="disiapkan-tab" data-toggle="tab" href="#disiapkan" role="tab" aria-controls="disiapkan" aria-selected="false">
                                                <i class="feather-menu mr-2 text-warning mb-0"></i>Disiapkan</a>
                                        </li>
                                        <li class="nav-item border-top" role="presentation">
                                            <a class="nav-link border-0 text-dark py-3 " id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="false">
                                                <i class="feather-clock mr-2 text-primary mb-0"></i>Diproses</a>
                                        </li>
                                        <li class="nav-item border-top" role="presentation">
                                            <a class="nav-link border-0 text-dark py-3 " id="dikirim-tab" data-toggle="tab" href="#dikirim" role="tab" aria-controls="dikirim" aria-selected="false">
                                                <i class="feather-truck mr-2 text-warning mb-0"></i>Dikirim</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link border-0 text-dark py-3 " id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="true">
                                                <i class="feather-check mr-2 text-success mb-0"></i> Selesai</a>
                                        </li>
                                        
                                        <li class="nav-item border-top" role="presentation">
                                            <a class="nav-link border-0 text-dark py-3" id="canceled-tab" data-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">
                                                <i class="feather-x-circle mr-2 text-danger mb-0"></i> Dibatalkan</a>
                                        </li>
                                    </ul>
                                </div>
                          
                                    <div class="tab-content col-md-9" id="myTabContent">

                                    <div class="tab-pane fade " id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                        
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
                                                    <div class="p-3 rounded shadow-sm bg-white">
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

                                    <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
                                       
                                        <div class="order-body">
                                            @foreach ($myorder as $item)
                                            {{-- deklarasi noPesanan untuk table Pesanaan --}}
                                            @php $noPesanan = $item->noPesanan @endphp

                                                @if ($item->statusorder == "2")

                                                    @foreach ($pesanan as $p )
                                                         @if ($p->noPesanan == $noPesanan)
                            
                                                            @php
                                                                $nama = $p->produk->namaProduk;
                                                                $gambar = $p->produk->gambar;
                                                            @endphp

                                                         @endif

                                                    @endforeach
                                                <div class="pb-3">
                                                    <div class="p-3 rounded shadow-sm bg-white">
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
                                                                <p class="bg-warning text-white py-1 px-2 rounded small mb-1">Diproses</p>
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
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                           
                                            @endforeach
                                        </div>

                                    </div>

                                    <div class="tab-pane fade " id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab">
                                       
                                        <div class="order-body">
                                            @foreach ($myorder as $item)
                                            {{-- deklarasi noPesanan untuk table Pesanaan --}}
                                            @php $noPesanan = $item->noPesanan @endphp
                                                @if ($item->statusorder == "3")
                                                    @foreach ($pesanan as $p )
                                                         @if ($p->noPesanan == $noPesanan)
                            
                                                            @php
                                                                $nama = $p->produk->namaProduk;
                                                                $gambar = $p->produk->gambar;
                                                            @endphp

                                                         @endif
                                                    @endforeach
                                                <div class="pb-3">
                                                    <div class="p-3 rounded shadow-sm bg-white">
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
                                                                <p class="bg-warning text-white py-1 px-2 rounded small mb-1">Dikirim</p>
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
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                           
                                            @endforeach
                                        </div>

                                    </div>

                                    <div class="tab-pane fade active show" id="disiapkan" role="tabpanel" aria-labelledby="disiapkan-tab">
                                    
                                        <div class="order-body">
                                            @foreach ($myorder as $item)
                                            {{-- deklarasi noPesanan untuk table Pesanaan --}}
                                            @php $noPesanan = $item->noPesanan @endphp
                                                @if ($item->statusorder == "1")
                                                    @foreach ($pesanan as $p )
                                                         @if ($p->noPesanan == $noPesanan)
                            
                                                            @php
                                                                $nama = $p->produk->namaProduk;
                                                                $gambar = $p->produk->gambar;
                                                            @endphp

                                                         @endif

                                                    @endforeach
                                                <div class="pb-3">
                                                    <div class="p-3 rounded shadow-sm bg-white">
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
                                                                <p class="bg-warning text-white py-1 px-2 rounded small mb-1">Sedang disiapkan</p>
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
                                                                <a class="btn btn-outline-primary px-3"  data-toggle="modal" data-target="#cancleOrder-{{ $item->noPesanan }}">Batalkan Pesanan</a>
                                                            </div>
                                                        </div>
                                                       @foreach ($pembatalan as $item)
                                                    @if ($item->noPesanan == $noPesanan )
                                                    @if ($pembatalan->count())
                                                    <div class="card-footer text-center text-muted">Status Pembatalan : <span class="badge badge-primary">{{ $item->status
                                                            }}</span> </div>
                                                    @endif
                                                    @endif
                                                    
                                                    
                                                    @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                
                                            @endforeach
                                            
                                        </div>

                                    </div>
                      
                                    <div class="tab-pane fade" id="canceled" role="tabpanel" aria-labelledby="canceled-tab">

                                        <div class="order-body">
                                            @foreach ($myorder as $item)
                                            {{-- deklarasi noPesanan untuk table Pesanaan --}}
                                            @php $noPesanan = $item->noPesanan @endphp
                                                @if ($item->statusorder == "5")
                                                    @foreach ($pesanan as $p )
                                                         @if ($p->noPesanan == $noPesanan)
                            
                                                            @php
                                                                $nama = $p->produk->namaProduk;
                                                                $gambar = $p->produk->gambar;
                                                            @endphp

                                                         @endif

                                                    @endforeach
                                                <div class="pb-3">
                                                    <div class="p-3 rounded shadow-sm bg-white">
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
                                                                <p class="bg-warning text-white py-1 px-2 rounded small mb-1">On Process</p>
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
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal Pembatalan --}}
@foreach ($myorder as $myorder)

<div class="modal fade" id="cancleOrder-{{ $myorder->noPesanan }}" tabindex="-1" role="dialog" aria-labelledby="cancleOrderLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="cancleOrderLabel">Alasan Pembatalan?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/orderstatus/canceled" method="post">
            @csrf
            <input type="text" name="noPesanan" value="{{ $myorder->noPesanan  }}" hidden>
            <div class="mb-3">
                <select name="alasan" id="alasan" class="form-control">
                    <option value=" ">Pilih alasan pembatalan</option>
                    <option value="Penjual membutuhkan waktu lama untuk pengiriman pesanan">Penjual membutuhkan waktu lama untuk pengiriman pesanan</option>
                    <option value="Ingin merubah rincian & membuat mesanan baru">Ingin merubah rincian & membuat mesanan baru</option>
                    <option value="Permintaan penjual">Permintaan penjual</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="other">Alasan Lainnya :</label>
                <textarea name="other" id="other" class="form-control"></textarea>
            </div>
         
        </div>
        <div class="modal-footer">
         
          <button  type="submit" class="btn btn-primary">Ajukan Pembatalan Pesanan </button>
        </form>
        </div>
      </div>
    </div>
  </div>
      
@endforeach
@endsection