@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kategori Pemasukan</h1>
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
    <div class="card">
        <div class="card-header">
            Form Input Pemasukan
        </div>
        <div class="card-body">
            <form action="/toko/kategoripemasukan/add" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Masukan Kategori Transaksi</label>
                    <input type="text" name="NmKategori" id="NmKategori" class="form-control" value="{{ old('NmKategori') }}">
                </div>
                <button type="submit" class="btn btn-primary">+ Tambah</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Daftar Kategori Pemasukan</div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                @foreach ($Kpemasukan as $item )
                  <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        <a  data-toggle="modal" data-target="#edit-{{ $item->id }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/toko/kategoripengeluaran/delete/{{ $item->id }}" onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>      
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
<!-- Modal -->
@foreach ($Kpemasukan as $item)

<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/toko/kategoripemasukan/update" method="post">
                @csrf
                <input type="text" name="id" id="id" value="{{ $item->id }}" hidden>
                <div class="mb-3">
                    <label for="">Masukan Kategori Transaksi</label>
                    <input type="text" name="NmKategori" id="NmKategori" class="form-control" value="{{ $item->kategori }}">
                </div>
                <button type="submit" class="btn btn-primary">+ Simpan</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
    
  @endforeach
@endsection