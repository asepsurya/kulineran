@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Outlet</h1>
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
    <div class="card-header">
        Edit Outlet
    </div>
    @foreach ($outlet as $outlet)
   
    <div class="card-body m-0 p-0">
        <div class="p-3">
            <form action="/outlet/edit" method="post">
                @csrf
                <input type="text" name="id" id="id" value="{{ $outlet->id }}" hidden>
                <div class="mb-3">
                    <label for="">Nama Outlet</label>
                    <input type="text" name="namaOutlet" id="namaOutlet" class="form-control" value="{{ $outlet->namaOutlet }}">
                </div>
                <div class="mb-3">
                    <label for="">Nama pemilik</label>
                    <input type="text" name="pemilik" id="pemilik" class="form-control" value="{{ $outlet->pemilik }}">
                </div>
        </div>
        <h5 class="card-header">Alamat Outlet</h5>
        <div class="p-3">
            <div class="mb-3">
                <input type="text" name="alamat" id="alamat" class="form-control"
                    placeholder="Nama Jalan, Gedung, No.Rumah" value="{{ $outlet->alamat }}">
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <select name="id_provinsi" id="provinsi" class="form-control js-example-basic-single">
                        <option value="{{ $outlet->province->id }}">{{ $outlet->province->name }}</option>
                        @foreach ($provinsi as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <select name="id_kabupaten" id="kabupaten" class="form-control js-example-basic-single">
                        <option value="{{ $outlet->regency->id }}">{{ $outlet->regency->name }}</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <select name="id_kecamatan" id="kecamatan" class="form-control js-example-basic-single">
                        <option value="{{ $outlet->district->id }}">{{ $outlet->district->name }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select name="id_desa" id="desa" class="form-control js-example-basic-single">
                        <option value="{{ $outlet->village->id }}">{{ $outlet->village->name }}</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan Data</button>
            </form>
        </div>
    </div>
         
    @endforeach
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