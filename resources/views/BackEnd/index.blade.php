@extends('BackEnd.layout.main')
@section('container')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Utama</h1>
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
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="callout callout-danger">
            <p># eFoody2(Electronic Food Delivery)
                merupakan layanan pesan antar online di aplikasi eFoody. Mitra Usaha yang sudah terdaftar
                layananr eFoody akan menerima pesanan GoFood di halam dashboard aplikasi dan berkesempatan untuk
                meningkatkan penjualan dengan memperluas jangkauan usaha ke pengguna </p>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><a href="data_produk/index"><i
                                class="far fa-envelope"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Produk</span>

                        <span class="info-box-number">20</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Transaksi</span>
                        <span class="info-box-number">410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><a href="kategori/index"><i
                                class="far fa-copy"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kategori Produk</span>
                        <span class="info-box-number">2</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><a href="pelanggan/index"><i
                                class="far fa-star"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Konsumen</span>
                        <span class="info-box-number">2</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Interactive Area Chart
                    </h3>

                    <div class="card-tools">
                        Real time
                        <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                            <button type="button" class="btn btn-default btn-sm active"
                                data-toggle="on">On</button>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="interactive" style="height: 300px;"></div>
                </div>
                <!-- /.card-body-->
            </div>
            <!-- /.card -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection