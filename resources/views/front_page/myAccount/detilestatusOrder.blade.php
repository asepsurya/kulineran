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
@foreach ($myorder as $myorder)

    <div class="container position-relative">
        <div class="py-5 osahan-profile row">
            @include('front_page.myAccount.menu')
            <div class="col-md-8 mb-3">
                <div class="rounded shadow-sm p-0 bg-white">
                    <div class="osahan-status">
                        <!-- status complete -->
                        <div class="p-3 status-order bg-white border-bottom d-flex align-items-center">
                            <p class="m-0"><i class="feather-calendar text-primary"></i> {{ $myorder->created_at }}</p>
                            <a href="review.html" class="text-primary ml-auto text-decoration-none">Review</a>
                        </div>
                        <div class="p-3 border-bottom">
                            <h6 class="font-weight-bold">Order Status</h6>
                            <div class="tracking-wrap">
                                <div class="my-1 step active">
                                    @if ($myorder->statusorder == "1")
                                        <span class="icon text-success"><i class="feather-check"></i></span>
                                    @else
                                        <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                                    @endif
                                    <span class="text small">Preparing order</span>
                                </div>
                                <!-- step.// -->
                                <div class="my-1 step active">
                                @if ($myorder->statusorder == "2" )
                                    <span class="icon text-success"><i class="feather-check"></i></span>
                                @else
                                    <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                                @endif
                                    <span class="text small"> Ready to collect</span>
                                </div>
                                <!-- step.// -->
                                <div class="my-1 step">
                                    @if ($myorder->statusorder == "3")
                                    <span class="icon text-success"><i class="feather-check"></i></span>
                                @else
                                    <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                                @endif
                                    <span class="text small"> On the way </span>
                                </div>
                                <!-- step.// -->
                                <div class="my-1 step">
                                @if ($myorder->statusorder == "4")
                                    <span class="icon text-success"><i class="feather-check"></i></span>
                                @else
                                    <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                                @endif
                                    <span class="text small">Delivered Order</span>
                                </div>
                                <!-- step.// -->
                            </div>
                        </div>
                            
@endforeach
                        <!-- Destination -->
                        <div class="p-3 border-bottom bg-white">
                            <h6 class="font-weight-bold">Destination</h6>
                            <p class="m-0 small">

                                @foreach ($Alamat as $item )
                                {{ $item->alamat }}({{ $item->other }}), {{ $item->district->name }}, {{ $item->regency->name }}, {{ $item->province->name }}, <p>Telepon {{ $item->telp }}
                                @endforeach
                            </p>
                        </div>
                        <div class="p-3 border-bottom">
                            <p class="font-weight-bold small mb-1">Orderan Saya</p>
                            @php
                                $SubTotal = 0;
                            @endphp
                            @foreach ($pesanan as $pesanan )
                            @php $ongkir = $pesanan->ongkir @endphp
                            @php $SubTotal += $pesanan->produk->harga * $pesanan->qty ;
                                $totalBayar = $SubTotal + $ongkir;
                            @endphp
                          
                            <div class="pb-3">
                                <div class="p-3 rounde bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" src="/storage/{{ $pesanan->produk->gambar }}" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="" class="text-dark text-15">{{ $pesanan->produk->namaProduk }}</a></p>
                                            <p class="mb-0"><strong>Varian  : </strong>{{ $pesanan->varian }}</p>
                                            <p class="mb-0">#INVOICE {{ $pesanan->noPesanan }}</p>
                                            <p class="mb-0">Qty : {{ $pesanan->qty }}</p>
                                    
                                        </div>
                                        <div class="ml-auto">
                                            {{-- <p class="bg-warning text-white py-1 px-2 rounded small mb-1">On Process</p>
                                            <p class="small font-weight-bold text-right"><i class="feather-clock"></i>2023-01-31 09:05:02</p> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex pt-3">
                                        <p>Metode Pengiriman : <br> Delivery Order</p>
                                        <div class="text-muted m-0 ml-auto mr-3 small">Total Pesanan<br>
                                            <span class="text-dark font-weight-bold">Rp.69.000</span>
                                        </div>
                                        <div class="text-right">
                                            <a href="/orderdetile" class="btn btn-primary px-3">Detail Menu</a>
                                           
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach
                    </span>
                        </div>
                        <!-- total price -->
                        <!-- Destination -->
                        <div class="p-0 bg-white m-0 ">
                          <div class="d-flex align-items-center mb-2 ">
                                <table class="table">
                                    <tr>
                                        <td width="600"><strong>SubTotal</strong> </td>
                                        <td>Rp.{{ number_format($SubTotal,0,".",".")}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ongkir</strong> </td>
                                        <td>Rp.{{ number_format($ongkir,0,".",".")}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diskon</strong></td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Bayar</strong></td>
                                        <td>Rp.{{ number_format($totalBayar,0,".",".")}}</td>
                                    </tr>
                                </table>
                             
                            </div>
                           @if ($myorder->status == "unpaid")
                            <div class="px-3">
                                <button id="pay-button" class="btn btn-primary btn-block">Bayar</button>
                            </div>
                            
                            @endif
                            <p class="m-0 small text-muted p-3">You can check your order detail here, Thank you for order.</p>
                          
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($getToken as $item)
     @php
         $tokensaya = $item->token;
     @endphp
@endforeach
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $tokensaya }}');
      // customer will be redirected after completing payment pop-up
    });
  </script>
@endsection