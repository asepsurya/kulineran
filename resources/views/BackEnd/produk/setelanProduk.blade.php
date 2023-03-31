@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Setelan Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                            href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                            aria-selected="true">Produk Rekomendasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                            href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                            aria-selected="false">Banner Depan</a>
                    </li>
                    
                </ul>
            </div>
            <div class="card-body p-0 m-0">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                        aria-labelledby="custom-tabs-four-home-tab">
                        <div class="card-body table-responsive p-0">
                          
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Produk</th>
                                        <th>kategori</th>
                                        <th>harga</th>
                                        <th>Deskripsi Produk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($produk as $item)
                               
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->namaProduk }}</td>
                                        <td>{{ $item->kategori->jenisKategori }}</td>
                                        <td><span class="tag tag-success">{{ $item->harga }}</span></td>
                                        <td>{{ $item->deskripsi }}</td>
                                    </tr>
                                           
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-four-profile-tab">
                        <div class="card-header">
                            <button class="btn btn-primary"  data-toggle="modal" data-target="#add">+ Tambah</button>
                        </div>
                        <table class="table table-hover text-nowrap">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Banner</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($banner as $item )
                              
                              <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <img src="/storage/{{ $item->banner }}" alt="" srcset="" width="50">
                                </td>
                                <td>
                                    <form action="/hapusBanner" method="post">
                                        @csrf
                                    <input type="text" value="{{ $item->banner }}" name="oldimage" hidden>
                                    <input type="text" value="{{ $item->id }}" name="id" hidden>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </form>
                                </td>
                               
                              </tr>
                                    
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-centered" role="document">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Rekening</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> --}}
        <div class="modal-body p-0">
            <form action="/tambahBanner" method="post" enctype="multipart/form-data" >
                <div class="p-3">
                @csrf
                <input type="text" name="idUser" id="idUser" value="{{ auth()->user()->id }}" hidden>
                <label for="gambar">Upload Foto /</label>
                <small>Upload foto Promosi Produk anda</small>
                <label for="images" class="drop-container mb-3">
                    <span class="drop-title">Drop files here</span>
                    or
                    <input type="file" name="gambar" class="image" id="images" accept="image/*" required>
                </label>
            </div>
                <input type="text" name="idUser" value="{{ auth()->user()->id }}" hidden>
                <button type="submit" class="btn btn-primary btn-block">+ Simpan</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection