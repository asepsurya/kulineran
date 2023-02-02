@extends('BackEnd.layout.main')
@section('container')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Menu Saya</h1>
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
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i
                            class="fas fa-plus"></i> Tambah Data </button>
                    <a href="action/cetak.php"><button type="button" class="btn btn-default"><i
                                class="far fa-file-pdf"></i> Exsport Data</button></a>

                </div>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">

                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>ID</th>
                            <th>Jenis Produk</th>
                            <th>Harga Produk <span class="badge bg-primary">Rp</span></th>
                            <th>Kategori Produk</th>
                            <th>Status Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no =1;
                        @endphp
                        @foreach ($produk as $item )
                    
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>
                                <div class="btn-group ">
                                    <a  href="/produk/edit/{{ encrypt($item->id) }}" class="btn btn-default btn-sm btn-flat"> Edit </a>
                                    <form action="/produk/delete" method="post">
                                        @csrf
                                        <input type="text" name="idProduk" id="idProduk" value="{{ $item->id }}" hidden>
                                        <input type="text" name="oldImage" id="oldImage" value="{{ $item->gambar }}" hidden>
                                        <button type="submit" class="btn btn-default btn-sm btn-flat" onclick="return confirm('Anda Yakin Produk {{ $item->namaProduk}} akan dihapus?')">
                                            <i class="far fa-trash-alt"></i></button>
                                    </form>   
                                </div>
                            </td>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->namaProduk }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->kategori->jenisKategori }}</td>
                            <td>
                                @if ($item->status == 1)
                                <span class="badge rounded-pill bg-success">
                                    Tersedia</span>
                                @else
                                <span class="badge rounded-pill bg-danger">
                                    Tidak Tersedia</span>
                                @endif
                               
                            </td>
                        </tr>
                        <tr class="expandable-body d-none">
                            <td colspan="6" class="col-1">

                                <div class="card card-primary card-outline" style="display: none;">
                                    <div class="card-header">
                                        <h3 class="card-title"><b>Rincian Produk</b></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th style="width: 100px">ID Supplier</th>
                                                    <th style="width: 200px">Nama Supplier</th>
                                                    <th style="width: 200px">Varian Produk</th>
                                                    <th style="width: 100px">Foto</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1. </td>
                                                    <td>{{ $item->idSupplier }}</td>
                                                    <td>eFoody Store</td>
                                                    <td>{{ $item->varian }}</td>
                                                    
                                                    <td>
                                                       <img src="/storage/{{ $item->gambar }}" alt="" width="100">
                                                    </td>
                                                    <td style="width: 100px"></td>
                                                </tr>
                                                <tr class="expandable-body">
                                                    <td colspan="6" class="col-1">
                                                        <br>
                                                        <b>Keterangan Produk :</b><br>
                                                        <textarea class="form-control "
                                                            readonly=""> {{ $item->deskripsi }}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                            </td>
                        </tr>
                                
                        @endforeach
                    </tbody>
               
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    </div><!-- /.container-fluid -->
</div>

<!-- addModal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="addModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                    <h4>Detail Produk</h4>
                    <form action="/produk/addProduk" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="idUser" id="idUser" value="{{ auth()->user()->id }}" hidden>
                        <label for="gambar">Foto Produk /</label>
                        <small>Upload foto yang menggugah selera biar pelanggan makin tertarik</small>
                        <label for="images" class="drop-container mb-3">
                            <span class="drop-title">Drop files here</span>
                            or
                            <input type="file" name="gambar" class="image" id="images" accept="image/*" required>
                        </label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Jenis Produk <span style="color:red">*</span></label>
                                    <input type="text" class="form-control form-control-border" name="namaProduk" required=""
                                        placeholder="Ex: Sate Ayam, Sempol Ayam">
                                </div>
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select class="form-control " style="width: 100%;"
                                       name="idSupplier">
                                        <option value="25001" data-select2-id="2"> eFoody Store</option>
                                    </select>
                                    <div align="right">
                                        <small><a href="/category">+ Tambah Supplier</a></small>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="">Status Produk <span style="color:red">*</span></label>
                                    <select name="status" id="status" class="form-control " required>
                                        <option value="1">Tersedia</option>
                                        <option value="0">Belum Tersedia</option>
                                    </select>
                                </div>
                            </div> 

                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Harga Produk(Rp.) <span style="color:red">*</span></label>
                                    <small>Termasuk Pajak dan lain-lain</small>
                                    <input type="number" class="form-control form-control-border" name="harga" required=""
                                        placeholder="Harga Jual Produk" >
                                </div>
                                <div class="form-group">
                                    <label>Kategori <span style="color:red">*</span> </label>
                                    
                                    <select class="form-control select2 "
                                        name="idKategori" style="margin:10px" required>
                                        <option selected=""> ------ Pilih Kategori ------ </option>
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
                                    <input type="text" name="varian" id="varian" class="form-control form-control-border">
                                    <small>Ex:Pedas|Manis|Original</small>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <label> Deskripsi Produk <span style="color:red">*</span></label>
                        <textarea class="form-control" name="deskripsi" rows="5"
                            placeholder="Gambarkan Mengenai Menu Anda.." required></textarea>
               
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
            </form>
            </div>
        </div>
    </div>
</div>


@endsection