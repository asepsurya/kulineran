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
        <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active border-0 bg-light text-dark rounded" id="home-tab" data-toggle="tab"
                    href="#home" role="tab" aria-controls="home" aria-selected="true"><i
                        class="feather-home mr-2"></i>({{ $data->count() }}) Menu</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Content Row -->
                <div class="container mt-4 mb-4 p-0">
                    <!-- restaurants nearby -->
                    <div class="row">
                        @if ($data->count())
                        @foreach ($data as $item)
                        <div class="col-md-3 pb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">
                                    <div class="star position-absolute"><span class="badge badge-success">• {{
                                            $item->kategori->jenisKategori }}</span></div>
                                    <div class="favourite-heart text-danger position-absolute"><a href="#"><i
                                                class="feather-heart"></i></a></div>
                                    {{-- <div class="member-plan position-absolute"><span
                                            class="badge badge-dark">Promoted</span></div> --}}
                                    <a href="restaurant.html">
                                        <img alt="#" src="/storage/{{ $item->gambar }}"
                                            class="img-fluid item-img w-100">
                                    </a>
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6><a href="restaurant.html" class="text-black">{{ $item->namaProduk }}</a>
                                        </h6>

                                        {{-- <ul class="rating-stars list-unstyled">
                                            <li>
                                                <i class="feather-star star_active"></i>
                                                <i class="feather-star star_active"></i>
                                                <i class="feather-star star_active"></i>
                                                <i class="feather-star star_active"></i>
                                                <i class="feather-star"></i>
                                            </li>
                                        </ul> --}}
                                        <p>{{ $item->deskripsi }}</p>
                                    </div>
                                    {{-- <div class="list-card-badge">
                                        <span class="badge badge-danger">OFFER</span> <small>65% OSAHAN50</small>
                                    </div> --}}
                                    <div class="text-muted mb-3">
                                        <strong>Rp. {{ $item->harga }}</strong>
                                    </div>

                                    <button class="btn btn-primary btn-block">Pesan</button>
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

@endsection