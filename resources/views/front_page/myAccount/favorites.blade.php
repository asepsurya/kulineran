@extends('front_page.layout.main')
@section('container')
<div class="osahan-map">
    <div class="bg-primary">
        <div class="container">
            <div class="osahan-slider-map py-2">
                @foreach ($kategori as $a)
                <div class="osahan-slider-item">
                    <div class="text-white">
                        <a class="text-white" href="/search?idKategori={{ $a->id }}">
                            <div class="member-plan">{{ $a->jenisKategori }}</div>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="search py-5">
        <div class="input-group mb-4">
            <input type="text" class="form-control form-control-lg input_search border-right-0" id="inlineFormInputGroup" placeholder="Cari Produk...">
            <div class="input-group-prepend">
                <div class="btn input-group-text bg-white border_search border-left-0 text-primary"><i class="feather-search"></i></div>
            </div>
        </div>
        <div class="row">
            <div class="col md-6">
                <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active border-0 bg-light text-dark rounded" id="home-tab" data-toggle="tab"
                            href="#home" role="tab" aria-controls="home" aria-selected="true"><i
                                class="feather-heart mr-2"></i>My Favorite ({{ $Favorite->count() }})</a>
                    </li>
                    
                </ul>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end mt-0 ">
                    {{-- paginator --}}
                    {{ $Favorite->links() }}
                </div>
            </div>
        </div>
       
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Content Row -->
                <div class="container mt-4 mb-4 p-0">
                    <!-- restaurants nearby -->
                    <div class="row">
                        @if ($Favorite->count())
                        @foreach ($Favorite as $item)
                        <div class="col-md-3 pb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">
                                    <div class="star position-absolute"><span class="badge badge-success">• {{
                                            $item->kategori->jenisKategori }}</span></div>
                                    <div class="favourite-heart text-danger position-absolute"><a href="#"><i
                                                class="feather-trash-2"></i></a></div>
                                    {{-- <div class="member-plan position-absolute"><span
                                            class="badge badge-dark">Promoted</span></div> --}}
                                  
                                        <img alt="#" src="/storage/{{ $item->produk->gambar }}"
                                            class="img-fluid item-img w-100">
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6><a  class="text-black">{{ $item->produk->namaProduk }}</a>
                                        </h6>
                                        <p>{{ $item->produk->deskripsi }}</p>
                                    </div>
                                    <div class="text-muted mb-3">
                                        <strong>Rp. {{ $item->produk->harga }}</strong>
                                    </div>
                                    @if ($item->produk->varian == "")
                                    <a href="/addCart/item/{{ $item->produk->id }}">
                                        <button class="btn btn-primary btn-block"><span class="feather-shopping-cart "></span> Pesan</button>
                                    </a>
                                    @else
                                        <button data-bs-toggle="modal" data-bs-target="#detileProduk-{{ $item->produk->id }}"  class="btn-block btn btn-primary "><span class="feather-shopping-cart"></span> Pesan</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="container mt-4 mb-4 p-0">
                    <div class="row d-flex align-items-center justify-content-center ">
                        <div class="col-md-7 py-5">
                            <div class="text-center py-5">

                                <p class="h4 mb-4"><i class="feather-search bg-primary text-white rounded p-2"></i>
                                </p>
                                <p class="font-weight-bold text-dark h5">Produk Tidak ditemukan</p>
                                <p>Kami tidak dapat mencari produk yang cocok sesuai pencaharian anda, Tolong ulangi
                                    Kembali </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
       
    </div>
   
    @include('front_page.partial.sales')
</div>

</div>
<!-- Modal -->
@foreach ($Favorite as $item)
<div class="modal fade" id="detileProduk-{{ $item->produk->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="detileProdukLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm ">
        <div class="modal-content">
            {{-- <div class="modal-header">


            </div> --}}
            <div class="modal-body m-0 p-0">
                <div class="favourite-heart text-danger position-absolute p-3">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div style="
                background-image: url('/storage/{{ $item->produk->gambar }}');
                max-height:200px;
                overflow:hidden;
                height:200px; 
                background-repeat: no-repeat;
                background-size: cover; ">
                </div>
                <form action="/addCartVarian" method="post">
                    @csrf
                <div class="row m-0">
                    <h6 class="p-3 m-0 bg-light w-100">{{ $item->produk->namaProduk }} <small class="text-black-50">{{ $item->kategori->jenisKategori }}</small></h6>
                    <div class="col-md-12 px-0 border-top">
                    
                    
                    @php
                    //Contoh Penggunaan Fungsi explode ()
                    $string = $item->produk->varian;
                    $PecahStr = explode(",", $string);
                    @endphp
                   <div class="m-2">
                        <label for="">Pilih Varian / Toping</label>
                        <select name="varian" id="varian" class="form-control">
                            @php
                            for ( $i = 0; $i < count( $PecahStr ); $i++ ) { echo' <option value="'.$PecahStr[$i].'">'.$PecahStr[$i].'</option>';
                                }
                                @endphp
                    
                        </select>
                    </div>
                    
                </div>
            </div>
                
            </div>
            <div class="modal-footer p-0 m-0">
                <input type="text" name="idProduk" id="idProduk" value="{{ $item->produk->id }}" hidden>
                <button  type="submit" class="btn btn-primary btn-block">Pesan</button></a>
            </form>

            </div>
        </div>
    </div>
</div> 
@endforeach

@endsection