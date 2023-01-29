<!-- Modal -->
@foreach ($produk as $item)
<div class="modal fade" id="detileProduk-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
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
                background-image: url('/storage/{{ $item->gambar }}');
                max-height:200px;
                overflow:hidden;
                height:200px; 
                background-repeat: no-repeat;
                background-size: cover; ">
                </div>
                <form action="/addCartVarian" method="post">
                    @csrf
                <div class="row m-0">
                    <h6 class="p-3 m-0 bg-light w-100">{{ $item->namaProduk }} <small class="text-black-50">{{ $item->kategori->jenisKategori }}</small></h6>
                    <div class="col-md-12 px-0 border-top">
                    
                    
                    @php
                    //Contoh Penggunaan Fungsi explode ()
                    $string = $item->varian;
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
                <input type="text" name="idProduk" id="idProduk" value="{{ $item->id }}" hidden>
                <button  type="submit" class="btn btn-primary btn-block">Pesan</button></a>
            </form>

            </div>
        </div>
    </div>
</div>
   
@endforeach


