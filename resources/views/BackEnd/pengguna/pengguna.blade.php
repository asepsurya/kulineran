@extends('BackEnd.layout.main')
@section('container')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Management Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 " align="right">
                <div class="btn-group">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">+ Tambah Pengguna Baru</button>
                    
                </div>
               
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Daftar Pengguna
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                        $no =1;
                    @endphp
                    @foreach ($user as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->telp }}</td>
                        <td>
                            @if ($item->role == "1")
                                Administrator
                            @else
                                Pengguna
                            @endif
                           
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="/pengguna/hapus/{{ $item->id }}" class="btn btn-danger btn-sm">Hapus</a>
                                <a href="" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#edit-{{ $item->id }}">Ubah Role</a>
                              
                            </div>
                        </td>
                    </tr>
                           
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/pengguna/add" method="post">
                @csrf
                <input type="text" name="id" value="{{ $item->id }}" hidden>
                <div class="mb-3">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control"  required placeholder="Masukan Nama Lengkap">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                </div>
                <div class="mb-3">
                    <label for="">Telp</label>
                    <input type="text" name="telp" id="telp" class="form-control" placeholder="Telepon">
                </div>
                <div class="mb-3">
                    <label for="">password</label>
                    <input type="password" name="password" id="password" class="form-control" >
                    <small>*) Min 8 Karakter </small>
                </div>
                <div class="mb-3">
                    <label for="">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="2">Pengguna</option>
                        <option value="1">Administrator</option>
                        
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">+ Tambah</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
  @foreach ($user as $item)
 
  <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/pengguna/update" method="post">
                @csrf
                <input type="text" name="id" value="{{ $item->id }}" hidden>
                <div class="mb-3">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control"  value="{{ $item->nama_lengkap }}">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $item->email }}">
                </div>
                <div class="mb-3">
                    <label for="">Telp</label>
                    <input type="text" name="telp" id="telp" class="form-control" value="{{ $item->telp }}">
                </div>
                <div class="mb-3">
                    <label for="">password</label>
                    <input type="password" name="password" id="password" class="form-control" minlength="8">
                </div>
                <small>*) Min 8 Karakter </small>
                <div class="mb-3">
                    <label for="">Role</label>
                    <select name="role" id="role" class="form-control">
                        @if ($item->role == "1")
                            <option value="1">Administrator</option>
                        @else
                            <option value="2">Pengguna</option>
                        @endif
                        <option value="2">Pengguna</option>
                        <option value="1">Administrator</option>
                        
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">+ simpan</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
       
  @endforeach
@endsection