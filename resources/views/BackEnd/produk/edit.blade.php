@extends('BackEnd.layout.main')
@section('container')
@foreach ($produk as $item )
<form action="/produk/updateProduk" method="post" enctype="multipart/form-data">
    @csrf
<div class="content-header">
<div class="container-fluid px-5">
    <div class="row justify-content-between align-items-end g-3 ">
        <div class="col-12 col-sm-auto col-xl-8">
          <h2>Edit Produk</h2>
        </div>
       
        <div class="col-12 col-sm-auto col-xl-4">
          <div class="d-flex"><a  href="/produk" class="btn btn-default px-5 me-2">Batal</a><button type="submit" class="btn btn-primary px-5 w-100 text-nowrap">Simpan Data</button></div>
        </div>
      </div>
    </div>
</div>
      <div class="content ">
        <div class="container-fluid px-5 mb-3">
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="idProduk" id="idProduk" value="{{ $item->id }}" hidden>
            <input type="text" name="idUser" id="idUser" value="{{ auth()->user()->id }}" hidden>
            <label for="gambar">Foto Produk /</label>
            <small>Upload foto yang menggugah selera biar pelanggan makin tertarik</small>
            <label for="images" class="drop-container mb-3">
                <span class="drop-title">Drop files here</span>
                or
                <input type="file" name="gambar" class="image" id="imgInp" accept="image/*">
            </label>
            <small>Preview :</small><br>
            <img id="blah" src="#" alt="your image" width="200"/>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Image Preview</div>
                <div class="card-body">
                        <div align="center">
                            <img src="/storage/{{ $item->gambar }}" alt="" srcset="" width="300" class="rounded">
                        </div>
                        <input type="text" name="oldImage" value="{{ $item->gambar }}" hidden>
                   
                </div>
                
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label> Jenis Produk </label>
                <input type="text" class="form-control form-control-border" name="namaProduk" required=""
                    placeholder="Ex: Sate Ayam, Sempol Ayam" value="{{ $item->namaProduk }}">
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <select class="form-control js-example-basic-single " style="width: 100%;" name="idSupplier">
                    <option value="25001" data-select2-id="2"> eFoody Store</option>
                </select>
                <div align="right">
                    <small><a href="/category">+ Tambah Supplier</a></small>
                </div>
            </div>

            <div class="form-group">
                <label for="">Status Produk</label>
                <select name="status" id="status" class="form-control ">
                    @if ($item->status == 1)
                        <option value="1">Tersedia</option>
                    @else
                        <option value="0">Belum Tersedia</option>
                    @endif
                    <option value="1">Tersedia</option>
                    <option value="0">Belum Tersedia</option>
                </select>
            </div>
            <div class="form-group">
                @if ($item->rekomendasi == "on")
                    <input type="hidden" name="rekomendasi" value="off">
                    <input type="checkbox" name="rekomendasi"  checked  value="on">
                    <label for="">Tampilkan di Halaman Rekomendasi Produk?</label>
                @else
                    <input type="hidden" name="rekomendasi" value="off">
                    <input type="checkbox" name="rekomendasi" value="on" >
                    <label for="">Tampilkan di Halaman Rekomendasi Produk?</label>
                @endif
                
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-6">
            <div class="form-group">
                <label> Harga Produk(Rp.) </label>
                <small>Termasuk Pajak dan lain-lain</small>
                <input type="number" class="form-control form-control-border" name="harga" required=""
                    placeholder="Harga Jual Produk" value="{{ $item->harga }}">
            </div>
            <div class="form-group">
                <label>Kategori</label>

                <select class="form-control js-example-basic-single" name="idKategori" style="margin:10px">
                    <option value="{{ $item->kategori->id }}"> {{ $item->kategori->jenisKategori }}</option>
                    @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->jenisKategori }}</option>
                    @endforeach
                </select>
                <div align="right">
                    <small><a href="/category">+ Tambah Kategori</a></small>
                </div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <label> Varian Produk </label><br>
                <input type="text" name="varian" id="varian" class="form-control form-control-border" value="{{ $item->varian }}">
                <small>Pisahkan dengan tanda (,) Ex:Pedas,Manis,Original</small>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <label> Deskripsi Produk </label>
    <textarea class="form-control" name="deskripsi" rows="5" placeholder="Gambarkan Mengenai Menu Anda..">{{ $item->deskripsi }}</textarea>  
</div> 
</div>
@endforeach
<script>
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@endsection