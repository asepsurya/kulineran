@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pengajuan Pembatalan</h1>
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
<div class="px-3">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link  active" id="custom-tabs-four-home-tab" data-toggle="pill"
                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                        aria-selected="false">Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                        href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                        aria-selected="true">Riwayat Pembatalan</a>
                </li>

            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                    aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nomor Pesanan</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Alasan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($pembatalan as $item )
                            @if ($item->status == "Pengajuan")

                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->noPesanan }}</td>
                                <td>{{ $item->user->nama_lengkap }}</td>
                                @if ($item->Alasan == NULL)
                                <td>{{ $item->other }}</td>
                                @else
                                <td>{{ $item->Alasan }}</td>
                                @endif

                                <td>
                                    <div class="btn-group">
                                        <a href="/order/pembatalan/{{ $item->noPesanan }}"><button
                                                class="btn btn-default">Setujui</button></a>
                                        <a href="/order/detile/{{ $item->noPesanan }}/{{ $item->idUser }}"><button
                                                class="btn btn-success">Detile</button></a>
                                        <a href="/order/dibatalkan/{{ $item->noPesanan }}"><button
                                                class="btn btn-danger">Batalkan</button></a>
                                    </div>

                                </td>
                            </tr>

                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade " id="custom-tabs-four-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-four-profile-tab">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nomor Pesanan</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Alasan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($pembatalan as $item )
                            @if ($item->status == "Pengajuan Diterima")
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->noPesanan }}</td>
                                <td>{{ $item->user->nama_lengkap }}</td>
                                @if ($item->Alasan == NULL)
                                <td>{{ $item->other }}</td>
                                @else
                                <td>{{ $item->Alasan }}</td>
                                @endif

                                <td>
                                    <div class="btn-group">
                                        
                                        <a href="/order/detile/{{ $item->noPesanan }}/{{ $item->idUser }}"><button
                                                class="btn btn-success">Detile</button></a>
                                        <a href="/order/dibatalkan/{{ $item->noPesanan }}"><button
                                                class="btn btn-danger">Batalkan</button></a>
                                    </div>

                                </td>
                            </tr>
                            @endif


                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>


</div>
@endsection