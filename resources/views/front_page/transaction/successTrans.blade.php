@extends('front_page.layout.main')
@section('container')
<div class="py-5 osahan-coming-soon d-flex justify-content-center align-items-center">
    <div class="col-md-6">
        <div class="text-center pb-3">
            <h1 class="font-weight-bold">Hoore, Pesananmu sudah kami Terima</h1>
            <p>Cek status pesananmu di <a href="my_order.html" class="font-weight-bold text-decoration-none text-primary">My Orders</a> untuk mengetahui informasi lebih lanjut</p>
        </div>
        <!-- continue -->
        <div class="bg-white rounded text-center p-4 shadow-sm">
            <h1 class="display-1 mb-4">🎉</h1>
            <h6 class="font-weight-bold mb-2">Mohon Lakukan pembayaran sebelum kami Proses</h6>
            <p class="small text-muted">Terimakasih</p>

            <div class="card mb-4">
                <div class="card-body">
                  <div class="container mb-5 mt-3">
                    <div class="row d-flex align-items-baseline">
                      <div class="col-xl-9 text-left">
                        @php
                            $SubTotal = 0
                        @endphp
                        @foreach ($pesanan as $item )
                         @foreach ($order as $a)
                           @php $totBayar = $a->Totalbayar @endphp
                           @php $pengiriman = $a->pengiriman @endphp
                         @endforeach
                            @php $id_pesan = $item->noPesanan @endphp
                            @php $tanggal_buat = $item->created_at @endphp
                            @php $ongkir = $item->ongkir @endphp
                            @php $SubTotal += $item->produk->harga * $item->qty @endphp
                        @endforeach
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #{{ $id_pesan }}</strong></p>
                    </div>
                      
                      <hr>
                    </div>
              
                    <div class="container">
                      <div class="col-md-12">
                        <div class="text-center">
                          <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                        </div>
              
                      </div>
              
              
                      <div class="row">
                        <div class="col-xl-8">
                          <ul class="list-unstyled text-left">
                            <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{ auth()->user()->nama_lengkap }}</span></li>
                            @foreach ($alamat as $item)
                            <li class="text-muted">{{ $item->alamat }}</li>
                            <li class="text-muted"><p class="text-muted mb-0">{{ $item->district->name }}, {{ $item->regency->name }}, {{ $item->province->name }}</li>
                            <li class="text-muted">Telepon {{ $item->telp }}</li>   
                            @endforeach
        
                          </ul>
                        </div>
                        <div class="col-xl-4">
                          <h3 class="text-muted text-right">INVOICE</h3>
                          <ul class="list-unstyled text-right">
                            <li class="text-muted"><i class="fas fa-circle" style="color:#ca8495 ;"></i> <span
                                class="fw-bold">ID:</span>#0123-0{{ $id_pesan }}</li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Creation Date: </span>{{ $tanggal_buat }}</li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                                Unpaid</span></li>
                          </ul>
                        </div>
                      </div>
                     
                      <div class="row my-2 mx-1 ">
                        <table class="table table-striped table-borderless">
                          <thead style="background-color:#84B0CA ;" class="text-white">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Description</th>
                              <th scope="col">Qty</th>
                              <th scope="col">Unit Price</th>
                              <th scope="col">Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                @php $no=1 @endphp
                            @foreach ($pesanan as $a)
                          
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $a->produk->namaProduk }} / <small>{{ $a->varian }}</small> </td>
                              <td>{{ $a->qty }}</td>
                              <td>{{ number_format($a->produk->harga * $a->qty ,0,".",".")}}</td>
                              <td>{{ number_format($a->produk->harga * $a->qty ,0,".",".")}}</td>
                            </tr>
                            
                            @endforeach
                          </tbody>
              
                        </table>
                      </div>
                      <div class="row">
                        <div class="col-xl-8">
                          <p class="text-left">Add additional notes and payment information</p>
                            <p class="text-left"><strong>Delivery Method :</strong>{{ $pengiriman }}</p>
                           
                        </div>
                        <div class="col-xl-4">
                            <table class="table">
                                <tr>
                                    <td><strong>SubTotal</strong> </td>
                                    <td>{{ number_format($SubTotal,0,".",".")}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Ongkir</strong> </td>
                                    <td>{{ number_format($ongkir,0,".",".")}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Diskon</strong></td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><strong>Total Bayar</strong></td>
                                    <td>{{ number_format($totBayar,0,".",".")}}</td>
                                </tr>
                            </table>
                         
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="text-muted text-center">
                          <p>Thank you for your purchase</p>
                        </div>
                       
                      </div>
              
                    </div>
                  </div>
                </div>
              </div>
            <a id="pay-button" class="btn rounded btn-primary btn-lg btn-block text-white">Bayar</a>
        </div>
    </div>
</div>
<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $token }}');
    // customer will be redirected after completing payment pop-up
  });
</script>
@endsection