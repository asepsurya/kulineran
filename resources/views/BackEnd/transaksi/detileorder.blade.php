@extends('BackEnd.layout.main')
@section('container')
@foreach ($pesanan as $item )
@php
    $totalBayar = $item->Totalbayar
@endphp
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detile Order</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 " align="right">
                <div class="btn-group">
                    <a href="/order"><button class="btn btn-primary">Kembali</button></a>
                    
                </div>
               
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        @if ($item->user->gambar)
                            <img class="profile-user-img img-fluid img-circle" src="/storage/{{ $item->user->gambar }}"
                            alt="User profile picture">
                        @else
                            <img alt="#" src="{{ asset('img/user/defalut.jpg') }}" class="img-fluid rounded-circle header-user mr-2 header-user" width="100">   
                        @endif

                        </div>
                        <h3 class="profile-username text-center">{{ $item->user->nama_lengkap }}</h3>
                        <p class="text-muted text-center">{{ $item->user->email }}<br>Telp: {{ $item->user->telp}}</p>
                        
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Total Pesanan</b> <a class="float-right">{{ $item->qty }} Pcs</a>
                            </li>
                            <li class="list-group-item">
                                <b>Status pembayaran</b> <a class="float-right"><span class="badge badge-success">{{ $item->status }}</span></a>
                            </li>
                            <li class="list-group-item">
                                <b>Metode Pengiriman </b><p>{{ $item->pengiriman }}</p>
                            </li>
                        </ul>
                       @if($item->pengiriman == "Delivery Order")
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Pengiriman : </strong>
                        <p class="text-muted ml-4">
                            @foreach ($alamat as $item)
                            {{ $item->alamat }}({{ $item->other }}), {{ $item->district->name }}, {{ $item->regency->name }}, {{
                            $item->province->name }}
                            @endforeach
                        
                        </p>
                        <hr>
                        @endif
                        <strong><i class="far fa-file-alt mr-1"></i> Catatan pelanggan : </strong>
                        <p class="text-muted ml-4">
                           {{$item->notes}}
                        </p>
                        <hr>
                    </div>

                </div>


</div>

<div class="col-md-9">
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title ">#INVOICE <span class="text-primary">{{ request('noPesanan') }}</span> </h3>
                
                <div class="card-tools">
                    <a href="/order/detile/{{ $item->idUser }}-invoice{{ request('noPesanan') }}">
                    <button class="btn btn-default"><span class="far fa-file"></span> Cetak Invoice</button></a>
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button> --}}
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Jenis Menu
                            </th>
                            <th >
                                Qty
                            </th>
                            <th>
                                Harga 
                            </th>
                            <th>
                                Date/Time 
                            </th>
                            <th>
                                 Total 
                            </th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                            $total = 0;
                        @endphp
                        @foreach ($detile as $item)
                     
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>
                                <a>
                                   {{ $item->produk->namaProduk }}
                                </a>
                                <br>
                                <small>
                                    {{ $item->varian }}
                                </small>
                            </td>
                            <td>
                                x {{ $item->qty}}
                            </td>
                            <td class="project_progress">
                                {{number_format($item->produk->harga  ,0,".",".") }}
                            </td>
                           <td>{{ $item->created_at }}</td>
                            <td align="right">{{ number_format($item->qty * $item->produk->harga ,0,".",".")  }}</td>
                        </tr>
                             @php
                                
                                 $total += $item->qty * $item->produk->harga;
                                $status = $item->ongkir;
                             @endphp 
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-right" >
               <p><strong>Total :</strong>{{number_format($total ,0,".",".") }}</p><hr>
               <p><strong>Ongkos Kirim : </strong>
                {{number_format($status  ,0,".",".") }}
                </p><hr>
               <p><strong>Total Pembayaran : </strong>{{number_format($totalBayar  ,0,".",".") }}</p>
            </div>

        </div>

    </section>
            </div>

        </div>

    </div>
</section>
   
@endforeach
@endsection