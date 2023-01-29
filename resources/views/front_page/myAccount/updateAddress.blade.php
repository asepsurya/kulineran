@extends('front_page.layout.main')
@section('container')
<div class="osahan-profile">
    <div class="container position-relative">
        <div class="py-5 osahan-profile row">
            @include('front_page.myAccount.menu')
            <div class="col-md-8 mb-3">
                <div class="rounded shadow-sm p-0 bg-white">
                    <h5 class="p-4">Ubah Alamat</h5>
            <form action="/address/update" method="post">
                @csrf
                @foreach ($alamat as $item )
            
                <h6 class="p-3 m-0 bg-light w-100">Kontak</h6>
                <input type="text" name="id" id="id" value="{{ $item->id }}" hidden>
                <input type="text" name="idUser" id="idUser" value="{{ auth()->user()->id }}" hidden>
                <div class="p-3">
                    <div class="mb-3">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                            value="{{ $item->nama_lengkap }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Nomor Telepon</label>
                        <input type="text" name="telp" id="telp" class="form-control"
                            value="{{ $item->telp }}">
                    </div>
                </div>
                <h6 class="p-3 m-0 bg-light w-100">Alamat</h6>
                <div class="p-3">
                    <div class="mb-3">
                        <input type="text" name="alamat" id="alamat" class="form-control"
                            placeholder="Nama Jalan, Gedung, No.Rumah" value="{{ $item->alamat }}">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select name="id_provinsi" id="provinsi" class="form-control select2">
                                <option value="{{ $item->province->id }}">{{ $item->province->name }}</option>
                                @foreach ($provinsi as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="id_kabupaten" id="kabupaten" class="form-control select2">
                                <option value="{{ $item->regency->id }}">{{ $item->regency->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select name="id_kecamatan" id="kecamatan" class="form-control select2">
                                <option value="{{ $item->district->id }}">{{ $item->district->name }}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="id_desa" id="desa" class="form-control select2">
                                <option value="{{ $item->village->id }}">{{ $item->village->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="other" id="other" class="form-control"
                            placeholder="Detail Lainnya (contoh : blok / No., Patokan )" value="{{ $item->other }}">
                    </div>
                    @if($item->default == "on")
                    <input type="hidden" name="default" value="off">
                        <input type="checkbox" name="default" id="default" checked value="on">
                        <label for="default">Jadikan Alamat ini sebagai default?</label>
                    @else
                        <input type="hidden" name="default" value="off">
                        <input type="checkbox" name="default" id="default" value="on">
                        <label for="default">Jadikan Alamat ini sebagai default?</label>
                    @endif
                    <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                </div>
            </form>
                    
            @endforeach
            </div>
    </div>
        </div>
    </div>
</div>
@include('front_page.myAccount.ubahPhoto')
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
  <script>
    $(document).ready(function() {
        $('.select2').select2({
        theme: 'bootstrap4'
        });
    });

  </script>
@endsection