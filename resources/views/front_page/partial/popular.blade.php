  <!-- Most popular -->
  <div class="py-3 title d-flex align-items-center">
    <h5 class="m-0">Menu Unggulan</h5>
    <a class="font-weight-bold ml-auto" href="/search">{{ $produk->count() }} Menu<i class="feather-chevrons-right"></i></a>
</div>
<!-- Most popular -->
<div class="most_popular">
    <div class="row">
     @foreach ($produk as $item)
  
        <div class="col-md-3 pb-3">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                <div class="list-card-image">
                    <div class="star position-absolute"><span class="badge badge-success">• {{ $item->kategori->jenisKategori }}</span></div>
                    <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                    {{-- <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div> --}}
                   
                        <div style="background-image: url('/storage/{{ $item->gambar }}');
                                    max-height:200px;
                                    overflow:hidden;
                                    height:200px; 
                                    background-repeat: no-repeat;
                                    background-size: cover;">
                        </div>
                    
                </div>
                <div class="p-3 position-relative">
                    <div class="list-card-body">
                        <h6 >{{ $item->namaProduk }} </h6>
                        
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                    {{-- <div class="list-card-badge">
                        <span class="badge badge-danger">OFFER</span> <small>65% OSAHAN50</small>
                    </div> --}}
                    <div class="text-muted mb-3">
                        <strong>Rp. {{ $item->harga }}</strong> 
                    </div>

                    @if ($item->varian == "")
                        <button class="btn btn-primary btn-block">Pesan</button>
                    @else
                        <button data-bs-toggle="modal" data-bs-target="#detileProduk-{{ $item->id }}"  class="btn btn-primary btn-block">Pesan</button>
                    @endif
                    
                </div>
            </div>
        </div>
              
     @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{-- paginator --}}
        {{ $produk->links() }}
    </div>
    
    @include('front_page.partial.detileProduk')
</div>