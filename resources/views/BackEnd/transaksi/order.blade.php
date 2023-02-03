@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Transaksi</h1>
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

<div class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                            href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                            aria-selected="true">Orderan Baru </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                            href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                            aria-selected="false">Sedang diproses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                            href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                            aria-selected="false">Sedang Dikirim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                            href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings"
                            aria-selected="false">Selesai</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" name="a" role="tabpanel"
                        aria-labelledby="custom-tabs-four-home-tab">
                        <div class="card-body table-responsive p-0">
                            <form>
                                <div class="input-group">
                                    <input type="search" id="myInput" class="form-control form-control-sm"
                                        placeholder="Type your keywords here">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Customers</th>
                                        <th>#Invoice</th>
                                        <th>Date</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                    @foreach ($order as $item )
                                    @if ($item->statusorder == "1")
                                    <tr>
                                        <td><img src="/storage/{{ $item->user->gambar }}" alt="" srcset=""
                                                class="rounded-circle mr-3" width="30">{{ $item->user->nama_lengkap }}
                                        </td>
                                        <td>#<a href="/order/detile/{{ $item->noPesanan }}/{{ $item->idUser }}">{{
                                                $item->noPesanan }}</a></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/order/detile/{{ $item->noPesanan }}/{{ $item->idUser }}"><button
                                                        class="btn btn-success">Detile Pesanan</button></a>
                                                <form action="/order/update" method="get">
                                                    <input type="hidden" name="step2" value="{{ $item->noPesanan }}">
                                                    <button class="btn btn-default">Tahap Selanjutnya</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-four-profile-tab">
                        <div class="card-body table-responsive p-0">
                            <form>
                                <div class="input-group">
                                    <input type="search" id="myInput" class="form-control form-control-sm"
                                        placeholder="Type your keywords here">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Customers</th>
                                        <th>#Invoice</th>
                                        <th>Date</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                    @foreach ($order as $item )
                                    @if ($item->statusorder == "2")
                                    <tr>
                                        <td><img src="/storage/{{ $item->user->gambar }}" alt="" srcset=""
                                                class="rounded-circle mr-3" width="30">{{ $item->user->nama_lengkap }}
                                        </td>
                                        <td>#<a href="/order/detile/{{ $item->noPesanan }}/{{ $item->idUser }}">{{
                                                $item->noPesanan }}</a></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>

                                            <div class="btn-group">
                                                <a href="/order/detile/{{ $item->noPesanan }}/{{ $item->idUser }}"><button
                                                        class="btn btn-success">Detile Pesanan</button></a>
                                                <form action="/order/update" method="get">
                                                    <input type="hidden" name="step3" value="{{ $item->noPesanan }}">
                                                    <button class="btn btn-default">Tahap Selanjutnya</button>
                                                </form>

                                            </div>

                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                        aria-labelledby="custom-tabs-four-messages-tab">
                        <div class="card-body table-responsive p-0">
                            <form>
                                <div class="input-group">
                                    <input type="search" id="myInput" class="form-control form-control-sm"
                                        placeholder="Type your keywords here">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Customers</th>
                                        <th>#Invoice</th>
                                        <th>Date</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                    @foreach ($order as $item )
                                    @if ($item->statusorder == "3")
                                    <tr>
                                        <td><img src="/storage/{{ $item->user->gambar }}" alt="" srcset=""
                                                class="rounded-circle mr-3" width="30">{{ $item->user->nama_lengkap }}
                                        </td>
                                        <td>#<a href="/order/detile/{{ $item->noPesanan }}/{{ $item->idUser }}">{{
                                                $item->noPesanan }}</a></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/order/detile/{{ $item->noPesanan }}/{{ $item->idUser }}"><button
                                                        class="btn btn-success">Detile Pesanan</button></a>

                                                <form action="/order/update" method="get">
                                                    <input type="hidden" name="step4" value="{{ $item->noPesanan }}">
                                                    <button class="btn btn-default">Tahap Selanjutnya</button>
                                                </form>

                                            </div>

                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                        aria-labelledby="custom-tabs-four-settings-tab">
                        <div class="card-body table-responsive p-0">
                            <form>
                                <div class="input-group">
                                    <input type="search" id="myInput" class="form-control form-control-sm"
                                        placeholder="Type your keywords here">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Customers</th>
                                        <th>#Invoice</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                    @foreach ($order as $item )
                                    @if ($item->statusorder == "4")
                                    <tr>
                                        <td><img src="/storage/{{ $item->user->gambar }}" alt="" srcset=""
                                                class="rounded-circle mr-3" width="30">{{ $item->user->nama_lengkap }}
                                        </td>
                                        <td>#<a href="/order/detile/{{ $item->noPesanan }}/{{ $item->idUser }}">{{
                                                $item->noPesanan }}</a></td>
                                        <td>{{ $item->created_at }}</td>

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
    </div>
</div>


<script>
    //redirect to specific tab
    $(document).ready(function () {
        $('#custom-tabs-four-tab a[href="{{ old('tab') }}"]').tab('show');
    });
</script>
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
@endsection