@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rekening</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Rekening</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Form Input Rekening
        </div>
        <div class="card-body">
            <form action="/toko/rekening/add" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Masukan Nama Rekening/Dompet</label>
                    <input type="text" name="namaRek" id="namaRek" class="form-control" value="{{ old('namaRek') }}" required>
                </div>
                <div class="mb-3">
                    <label for="">Saldo</label>
                    <input type="text" name="saldo" id="saldo" class="form-control" value="0">
                </div>
                <button type="submit" class="btn btn-primary">+ Tambah</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Daftar Rekening</div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Rekening</th>
                    <th scope="col">Saldo</th>
                  </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach ($rekening as $item)
                  <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $item->namaRek }}</td>
                    <td>{{number_format($item->saldo ,0,".",".")  }}</td>
                    <td>
                        <a  data-toggle="modal" data-target="#editRek-{{ $item->id }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/toko/rekening/delete/{{ $item->id }}" onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
<!-- Modal -->
@foreach ($rekening as $item)

<div class="modal fade" id="editRek-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Rekening</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/toko/rekening/update" method="post">
                @csrf
                <input type="text" name="id" value="{{ $item->id }}" hidden>
                <div class="mb-3">
                    <label for="">Masukan Nama Rekening/Dompet</label>
                    <input type="text" name="namaRek" id="namaRek" class="form-control" value=" {{ $item->namaRek }}" required>
                </div>
                <div class="mb-3">
                    <label for="">Saldo</label>
                    <input type="text" name="saldo" id="saldo" class="form-control" value="{{ $item->saldo }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">+ Tambah</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
    
  @endforeach
@endsection