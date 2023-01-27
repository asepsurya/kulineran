  <!-- Trending this week -->
  <div class="pt-4 pb-2 title d-flex align-items-center">
    <h5 class="m-0">Menu Rekomendasi</h5>
    <a class="font-weight-bold ml-auto" href="trending.html">View all <i class="feather-chevrons-right"></i></a>
</div>
<!-- slider -->
<div class="trending-slider">
    @foreach ($rekomendasi as $produk)
        @if ($produk->rekomendasi == "on")
        <div class="osahan-slider-item">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                <div class="list-card-image">
                    <div class="star position-absolute"><span class="badge badge-success">{{ $produk->kategori->jenisKategori }}</span></div>
                    <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                    <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                    <div style="background-image: url('/storage/{{ $produk->gambar }}');
                        max-height:200px;
                        overflow:hidden;
                        height:200px; 
                        background-repeat: no-repeat;
                        background-size: cover;">
                    </div>
                </div>
                <div class="p-3 position-relative">
                    <div class="list-card-body">
                        <h6 class="mb-1"><a href="restaurant.html" class="text-black">{{ $produk->namaProduk }}
                      </a>
                        </h6>
                        <p class="text-gray mb-3"> {{ $produk->deskripsi }}</p>
                        <p class="text-gray mb-3 time"><button type="button" class="btn btn-primary">Pesan</button><span class="float-right text-black-80"> <strong>Rp. {{ $produk->harga }}</strong> </span></p>
                    </div>
                    {{-- <div class="list-card-badge">
                        <span class="badge badge-danger">OFFER</span> <small> Use Coupon OSAHAN50</small>
                    </div> --}}
                </div>
            </div>
        </div> 
        @endif
    @endforeach
    

</div>