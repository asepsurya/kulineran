@extends('front_page.layout.main')
@section('container')

<div class="osahan-profile">
    <div class="d-none">
        <div class="bg-primary border-bottom p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2 hc-nav-trigger hc-nav-1" href="#" role="button"
                aria-controls="hc-nav-1"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Profile</h4>
        </div>
    </div>
    <!-- profile -->
    <div class="container position-relative">
        <div class="py-5 osahan-profile row">
            @include('front_page.myAccount.menu')
            <div class="col-md-8 mb-3">
                <div class="rounded shadow-sm p-0 bg-white">
                    <h5 class="p-4">Alamat Saya</h5>
                    @foreach ($alamat as $item)
                   
                    <div class="p-3 border-bottom gold-members">
                        <span class="float-right"></span>
                        <div class="media">

                        <a href="/address/delete/{{ $item->id }}" onclick="return confirm('Anda Yakin data ini akan dihapus..?')">
                            <button data-toggle="tooltip" data-placement="top" title="Hapus Data" class="mr-3 btn-sm btn btn-primary">x</button>
                        </a> 
                            <div class="media-body">
                                <a href="/address/update/{{ $item->id }}">
                                 <h6 class="mb-1">{{ $item->nama_lengkap }}</a> 
                                    @if($item->default == "on")
                                        <span class="badge badge-success">Default</span>
                                    @endif
                                 </h6>
                                <p class="text-muted mb-0">{{ $item->alamat }}({{ $item->other }}), {{ $item->district->name }}, {{ $item->regency->name }}, {{ $item->province->name }}, <p>Telepon {{ $item->telp }}</p></p>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                    <a href="" data-toggle="modal" data-target="#addAddress" class="text-center">
                        <h6 class="p-3 m-0 bg-light w-100">+ Tambah Alamat</h6>
                    </a>
                </div>

            </div>
        </div>
    </div>

    @include('front_page.partial.footermobile')
    @include('front_page.myAccount.ubahPhoto')
    <!-- Modal -->
    <div class="modal fade" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered rounded" role="document">
            <div class="modal-content ">
                {{-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}
                <div class="modal-body p-0 m-0">
                    <form action="/address/add" method="post">
                        @csrf
                        <button type="button" class="close mr-3 mt-3" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6 class="p-3 m-0 bg-light w-100">Kontak</h6>
                        <input type="text" name="idUser" id="idUser" value="{{ auth()->user()->id }}" hidden>
                        <div class="p-3">
                            <div class="mb-3">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ auth()->user()->nama_lengkap }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Nomor Telepon</label>
                                <input type="text" name="telp" id="telp" class="form-control" value="{{ auth()->user()->telp }}">
                            </div>
                        </div>
                        <h6 class="p-3 m-0 bg-light w-100">Alamat</h6>
                        <div class="p-3">
                            <div class="mb-3">
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Nama Jalan, Gedung, No.Rumah">
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
                            <div class="mb-3">
                                <input type="text" name="other" id="other" class="form-control" placeholder="Detail Lainnya (contoh : blok / No., Patokan )">
                            </div>
                            <input type="hidden" name="default" value="off">
                            <input type="checkbox" name="default" id="default" value="on">
                            <label for="default">Jadikan Alamat ini sebagai default?</label>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
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
      <script>
        $(document).ready(function() {
            $('.select2').select2({
            dropdownParent: $('#addAddress'),
            theme: 'bootstrap4'
            });
        });

      </script>
    @endsection