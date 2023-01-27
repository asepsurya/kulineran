@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kategori</h1>
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

<div class="container-fluid">
    <!-- Main content -->
    <div class="content">
        <div class="card card-primary card-outline pb-0">
            <div class="card-header">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i
                        class="fa fa-plus"></i> Tambah Data</button>
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
            <div class="card-body table-responsive p-0" style="height: 700px; padding:0%">

                <table class="table table-head-fixed text-nowrap mt-0">
                    <thead>
                        <tr>
                            <th style="width: 10px"></th>
                            <th style="width: 10px">#</th>
                            <th>Jenis Kategori </th>
                            <th>Icon SVG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                            @foreach ($kategori as $data)
                        <tr>  
                            <td>
                                <div class="btn-group ">
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#updateModal-{{ $data->id }}">Edit</button>
                                    <form action="/category/delete" method="post">
                                        @csrf
                                        <input type="text" name="id" id="" value="{{ $data->id }}" hidden>
                                        <input type="text" name="old_image" id="" value="{{ $data->gambar }}" hidden>
                                        <button type="submit" class="btn btn-default btn-sm"  onclick="return confirm('Anda Yakin Kategori {{ $data->jenisKategori }} akan dihapus?')"><i class=" nav-ico fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->jenisKategori }}</td>
                            <td><img src="/storage/{{ $data->gambar }}" alt="" srcset="" width="30"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- modal Add Category --}}
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">+ Tambah Kategori</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/category/new" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label> Jenis Kategori </label>
                        <input type="text" class="form-control form-control-border @error('jenisKategori') is-invalid @enderror" name="jenisKategori"
                            value="{{ old('jenisKategori') }}">
                            @error('jenisKategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label> Icon </label>
                        <input type="file" class="form-control form-control-border @error('gambar') is-invalid @enderror " name="gambar">
                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Update Modal -->
@foreach ($kategori as $k)
<div class="modal fade" id="updateModal-{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">+ Update Kategori</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/category/update" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{ $k->gambar }}" name="oldImage" hidden>
                    <input type="text" value="{{ $k->id }}" name="id" hidden>
                    <div class="form-group">
                        <label> Jenis Kategori </label>
                        <input type="text" class="form-control form-control-border" name="jenisKategori"
                            value="{{ $k->jenisKategori}}">
                    </div>
                    <div class="form-group">
                        <label> Icon </label>
                        <input type="file" class="form-control form-control-border" name="gambar">
                    </div>
                    <div class="form-group">
                        <div class="mb-2">
                            <small>Icon Preview</small>
                        </div>
                        <img src="/storage/{{ $k->gambar }}" alt="" srcset="" width="50">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
            </div>
        </div>
    </div>
</div> 
@endforeach
@endsection