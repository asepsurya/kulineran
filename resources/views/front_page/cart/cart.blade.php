@extends('front_page.layout.main')
@section('container')

<div class="container position-relative">
    <div class="py-5 row">
        <div class="col-md-8 mb-3">
            <div>
                <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
                    <div class="osahan-cart-item-profile bg-white p-3">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 font-weight-bold">Alamat Pengiriman <span class="feather-info text-primary"
                                    role="button" data-toggle="popover" title="Informasi"
                                    data-content="(Alamat Pengiriman) Kami akan mengirim pesananmu ke alamat ini"></span>
                            </h6>
                            <div class="row">
                                @if($alamat->count())
                                <div class="custom-control col custom-radio mb-3 position-relative border-custom-radio">
                                    <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                        class="custom-control-input" checked="">
                                    <label class="custom-control-label w-100" for="customRadioInline1">
                                        @foreach ($alamat as $item)
                                        <div>
                                            <div class="p-3 bg-white rounded shadow-sm w-100">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0">{{ $item->nama_lengkap }}</h6>
                                                    <p class="mb-0 badge badge-success ml-auto"><i
                                                            class="icofont-check-circled"></i> Default</p>
                                                </div>
                                                <p class="small text-muted m-0">{{ $item->alamat }}({{ $item->other }})
                                                </p>
                                                <p class="small text-muted m-0">{{ $item->district->name }}, {{
                                                    $item->regency->name }}, {{ $item->province->name }}</p>
                                            </div>
                                            <a href="/address/update/{{ $item->id }}"
                                                class="btn btn-block btn-light border-top">Edit</a>
                                        </div>

                                        @endforeach
                                    </label>
                                </div>
                                @else
                                <div class="container-fluid p-5" align="center">
                                    <p>Alamat Pengiriman Belum disetel atau tidak dalam keadaan default, Jika belum ditambahkan, Tambahkan Sekarang..? </p>
                                    <a href="/address" class="btn btn-primary">+ Tambah</a>
                                </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded shadow-sm bg-white overflow-hidden">
                    <h6 class="p-3 m-0 bg-primary text-white w-100"><span class="feather-shopping-cart"></span> Keranjang Belanja
                        <span class="feather-info " role="button" data-toggle="popover" title="Informasi"
                            data-content="(Keranjang Belanja) Semua Pesananmu disimpan Disini"></span>
                    </h6>
                    <div class="m-3">
                        @php
                        $SubTotal = 0;
                        @endphp
                        @foreach ($cart as $cart)

                        <div class="p-3 border-bottom gold-members">
                            <span class="float-right col-2">
                                <form method="post" id="autoqty" action="/cart/qtyUpdate/{{ $cart->id }}">
                                    @csrf
                                    <div class="d-flex align-items-center">
                                        <div class="input-group rounded">
                                            <input type="number" class="form-control " id="qty" name="qty"
                                                value="{{ $cart->qty }}">
                                            <div class="input-group-prepend">
                                                <button type="submit" data-toggle="tooltip" data-placement="top"
                                                    title="Update Qty"
                                                    class="border-0 btn btn-primary text-white bg-white btn-block"><i
                                                        class="feather-refresh-cw"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </span>
                            <span class="float-right col-2">
                                <h6 class="mb-1">Total</h6>
                                <p class="text-muted mb-0">
                                    @php
                                    $totharga = $cart->qty * $cart->produk->harga
                                    @endphp
                                    @php $SubTotal += $totharga @endphp

                                    Rp. {{ number_format($totharga,0,".",".")  }}
                                </p>
                            </span>
                            @if ($cart->varian != NULL)
                            <span class="float-right col-3">
                                <h6 class="mb-1">Varian</h6>
                                <p class="text-muted mb-0"> {{ $cart->varian }}</p>
                            </span>
                            @endif

                            <div class="media">
                                <a href="/hapusItem/{{ $cart->id }}">
                                    <button class="btn btn-sm text-danger mr-1" data-toggle="tooltip"
                                        data-placement="top" title="Batalkan Pesanan">x</button></a>
                                <div class="media-body">

                                    <h6 class="mb-1">{{ $cart->produk->namaProduk }}</h6>
                                    <p class="text-muted mb-0">Rp. {{ number_format($cart->produk->harga,0,".",".")  }} x{{ $cart->qty }}</p>

                                </div>
                            </div>
                        </div>


                        @endforeach

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
                        <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> Jl. Mangkoko No.41
                            Kec.Indihiang </p>
                    </div>
                </div>


                <h6 class="p-3 m-0 bg-light w-100">Metode Pengiriman <span class="feather-info text-primary"
                        role="button" data-toggle="popover" title="Informasi"
                        data-content="(Pemesanan Langsung) kamu akan mendapatkan Nomor Antrian, (Delivery Order) Kami akan mengantar pesananmu ke rumah kamu. "></span>
                </h6>
                <div class="bg-white p-3 py-3 border-bottom clearfix">
                    {{-- form start --}}
                  
                    <div class="btn-group btn-group-toggle w-100 mb-3" data-toggle="buttons">
                        <label class="btn btn-outline-secondary active">
                            <input type="hidden" name="pengiriman" value="1">
                            <input type="radio" name="pengiriman" id="option" checked="" value="1"> Pemesanan Langsung
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="hidden" name="pengiriman" value="2">
                            <input type="radio" name="pengiriman" id="option2" value="2"> Delivery Order
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
                        <textarea placeholder="Catatan.." aria-label="With textarea"
                            class="form-control" id="selectbox"></textarea>
                    </div>
                </div>

                <div id="1" class="desc a">

                    <div class="bg-white p-3 clearfix border-bottom">
                        <input type="hidden" name="noPesanan" id="" value="{{ rand() }}">
                        <p class="mb-1">Total Pesanan <span class="float-right text-dark"></span>
                            <span class="float-right text-dark"> Rp. {{ number_format($SubTotal,0,".",".")  }} </span>
                        </p>
                        <p class="mb-1 text-success">Total Discount<span class="float-right text-success">0</span></p>
                        <hr>
                        <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">Rp.{{ number_format($SubTotal,0,".",".")}}</span>
                        </h6>
                    </div>
                    <div class="p-3">
                        <form action="/checkout" method="post">
                            @csrf
                            <input type="text" name="pengiriman" value="Pemesanan Langsung" hidden>
                            <input type="text" name="noPesanan" value="{{ $noPesanan }}" hidden>
                            <input type="text" name="Totalbayar" value="{{ $SubTotal }}" hidden>
                            <input type="text" name="ongkir" value="0" hidden>
                            <input type="text" name="diskon" value="0" hidden>
                            <input id="catatan" type="text" name="notes" hidden>
                            <input id="qty" type="text" name="qty" value="{{ $cart->count() }}" hidden>
                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                <span class="feather-shopping-cart"></span> Bayar Rp.{{ number_format($SubTotal,0,".",".")}}<i class="feather-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                   
                </div>
                 {{-- end desc --}}
                <div id="2" class="desc">
                         {{-- cek ongkir terbaru --}}
                        @foreach ($ongkir as $item)
                            @php $myongkir = $item->ongkir @endphp
                        @endforeach
                    <div class="bg-white p-3 clearfix border-bottom">
                        <input type="hidden" name="noPesanan" id="" value="{{ rand() }}">
                        <p class="mb-1">Total Pesanan <span class="float-right text-dark"></span>
                            <span class="float-right text-dark"> Rp. {{ number_format($SubTotal,0,".",".")}} </span>
                        </p>

                        <p class="mb-1">Delivery Fee<span class="text-info ml-1"><i
                                    class="feather-info"></i></span><span class="float-right text-dark">Rp.{{ number_format($myongkir,0,".",".")}}</span>
                        </p>
                        <p class="mb-1 text-success">Total Discount<span class="float-right text-success">0</span></p>
                        <hr>
                        <h6 class="font-weight-bold mb-0"> TO PAY <span class="float-right">Rp. {{ number_format($SubTotal+$myongkir,0,".",".")}}</span>
                        </h6>
                    </div>
                    <div class="p-3">
                       
                        <form action="/checkout" method="post">
                            @csrf
                            <input type="text" name="pengiriman" value="Delivery Order" hidden>
                            <input type="text" name="noPesanan" value="{{ $noPesanan }}" hidden>
                            <input type="text" name="Totalbayar" value="{{ $SubTotal+12000 }}" hidden>
                            <input type="text" name="ongkir" value="{{ $myongkir }}" hidden>
                            <input type="text" name="diskon" value="0" hidden>
                            <input id="catatan2" type="text" name="notes" hidden>
                            <input id="qty" type="text" name="qty" value="{{ $cart->count() }}" hidden>
                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                <span class="feather-shopping-cart"></span> Bayar Rp.{{ number_format($SubTotal,0,".",".")}}<i class="feather-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
                {{-- end desc --}}

            </div>

        </div>
    </div>
</div>
<script>
    $("#selectbox, :text:not([readonly])").on("input change", function(e) {
  $("#catatan").val(this.value)
  $("#catatan2").val(this.value)
})
</script>
<script>
    $("div.desc").hide();
     $("div.a").show();
    $("input[name$='pengiriman']").click(function() {
            $("div.a").show();
            var test = $(this).val();
            
            $("div.desc").hide();
            $("#" + test).show();
        });

</script>
<script>
    $(function () {
    $('[data-toggle="popover"]').popover()
})
</script>
@endsection