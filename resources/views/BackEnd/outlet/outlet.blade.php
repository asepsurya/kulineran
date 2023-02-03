@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Outlet</h1>
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

<div class="card mx-3">
    <div class="card-header bg-default">
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <div class="float-right"><button class="btn btn-primary" data-toggle="modal" data-target="#addModal">+
                        Tambah Outlet</button></div>
            </div>
        </div>


    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Outlet</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">Alamat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp
                @foreach ($outlet as $item )

                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $item->namaOutlet }}</td>
                    <td>{{ $item->pemilik }}</td>
                    <td>{{ $item->alamat }} {{ $item->district->name }}, {{ $item->regency->name }}, {{ $item->province->name }}</td> 
                    <td>
                        <div class="btn-group ">
                           <a href="/outlet/edit/{{ $item->id }}"><button class="btn btn-primary btn-sm">Edit</button></a>
                           <a href="/outlet/hapus/{{ $item->id }}"><button class="btn btn-danger btn-sm">Hapus</button></a>
                        </div>
                    </td>               
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- modal tambah --}}

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Outlet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/outlet/new" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">Nama Outlet</label>
                        <input type="text" name="namaOutlet" id="namaOutlet" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Nama pemilik</label>
                        <input type="text" name="pemilik" id="pemilik" class="form-control">
                    </div>
                    <h4 class="p-3 bg-success">Alamat Outlet</h4>
                    <div class="mb-3">
                        <input type="text" name="alamat" id="alamat" class="form-control"
                            placeholder="Nama Jalan, Gedung, No.Rumah">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select name="id_provinsi" id="provinsi" class="form-control select2">
                                <option value="">Provinsi</option>
                                @foreach ($provinsi as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="id_kabupaten" id="kabupaten" class="form-control select2">
                                <option value="">Kota/Kabupaten</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select name="id_kecamatan" id="kecamatan" class="form-control select2">
                                <option value="">Kecamatan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="id_desa" id="desa" class="form-control select2">
                                <option value="">Kelurahan/Desa</option>
                            </select>
                        </div>
                    </div>
                   


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $(function (){
            $('#provinsi').on('change',function(){
                let id_provinsi = $('#provinsi').val();
                
                $.ajax({
                    type : 'POST',
                    url : "{{route('getkabupaten')}}",
                    data : {id_provinsi:id_provinsi},
                    cache : false,
                    success: function(msg){
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error:',data)
                    },
                })
            })
            $('#kabupaten').on('change',function(){
                let id_kabupaten = $('#kabupaten').val();
              
                $.ajax({
                    type : 'POST',
                    url : "{{route('getkecamatan')}}",
                    data : {id_kabupaten:id_kabupaten},
                    cache : false,
                    success: function(msg){
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                       
                        
                    },
                    error: function(data) {
                        console.log('error:',data)
                    },
                })
            })
            $('#kecamatan').on('change',function(){
                let id_kecamatan = $('#kecamatan').val();
               
                $.ajax({
                    type : 'POST',
                    url : "{{route('getdesa')}}",
                    data : {id_kecamatan:id_kecamatan},
                    cache : false,
                    success: function(msg){
                        $('#desa').html(msg);
                       
                        
                    },
                    error: function(data) {
                        console.log('error:',data)
                    },
                })
            })
        })
    });
</script>
@endsection