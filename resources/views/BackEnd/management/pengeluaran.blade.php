@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Buku Harian Toko</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah">+ Tambah </a>
                    <a href="/toko/bukuKas/laporan" class="btn btn-default btn-sm">Export</a>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                        aria-selected="true">Buku Kas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                        href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                        aria-selected="false">Laporan Hasil Penjualan</a>
                </li>
            </ul>
        </div>
        <div class="card-body p-0 m-0">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                    aria-labelledby="custom-tabs-four-home-tab">
                    <div class="card-body table-responsive p-0">
                       
                            <div class="card-header ">
                                <form action="/toko/bukuKas/filterBukuKas" method="get">

                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <span>Pilih dari tanggal</span>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" name="start"
                                                            value="{{ old('start') }}">

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <span>Sampai tanggal</span>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" name="end"
                                                            value="{{ old('end') }}">
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                                                </div>
                                            </div>

                                        </div>
                                </form>
                                <div class="col-lg-6">
                                    <div align="right">
                                        <div class="btn-group ">
                                            @php
                                            $jmlDebet = 0;
                                            $jmlKredit = 0;
                                            @endphp
                                            @foreach ($bukuKas as $item)
                                            @if ($item->jenisTrans == "Debet")
                                            @php
                                            $jmlDebet += $item->Debet
                                            @endphp
                                            @elseif($item->jenisTrans == "Kredit")
                                            @php
                                            $jmlKredit += $item->Kredit
                                            @endphp
                                            @endif
                                            @endforeach
                                            <button class="btn btn-success btn-sm">Pemasukan : + Rp.{{number_format(
                                                $jmlKredit,0,".",".") }} </button>
                                            <button class="btn btn-danger btn-sm">Pengeluaran : - Rp.{{number_format(
                                                $jmlDebet,0,".",".") }} </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- Buku Harian Toko --}}

                        
                        <div class="card-body table-responsive p-0" style="height: 550px;">
                            <table class="table">

                                <tbody>
                                    @foreach ($bukuKas as $item)
                                    <tr>
                                        <td>
                                            <div class="badge badge-primary"> {{ $item->rekening->namaRek}}</div>
                                            <br><a href="">{{ $item->created_at }}</a>
                                        </td>
                                        <td>
                                            @if ($item->jenisTrans == "Debet")
                                            <strong>
                                                {{ $item->Kpengeluaran->kategori }}
                                            </strong>
                                            @else
                                            <strong>
                                                {{ $item->Kpemasukan->kategori }}
                                            </strong>
                                            @endif

                                            <p>{{ $item->keterangan}}</p>
                                        </td>
                                        <td class="text-right">
                                            <br>
                                            @if ($item->jenisTrans == "Debet")
                                            <span class="text-danger"> - Rp. {{number_format( $item->Debet,0,".",".")
                                                }}</span>
                                            @else
                                            <span class="text-success">+ Rp. {{number_format( $item->Kredit ,0,".",".")
                                                }}</span>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="card-footer  bg-default">
                    <div class="row">
                        <div class="col-md-5">
                            {{ $bukuKas->links() }}
                        </div>
                        <div class="col-md text-right text-success">
                            @php
                            $total = ($jmlKredit - $jmlDebet)
                            @endphp
                            <h4>Total Rp.{{number_format( $total,0,".",".") }}</h4>

                        </div>
                    </div>


                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                aria-labelledby="custom-tabs-four-profile-tab">
                <div class="card-header">
                <form action="/toko/bukuKas/filterpenghasilan" method="get">
                    <div class="row">
                        <div class="col-md-5">
                            <span>Pilih dari tanggal</span>
                            <div class="input-group">
                                <input type="date" class="form-control" name="dari"
                                    value="{{ old('start') }}">

                            </div>
                        </div>
                        <div class="col-md-5">
                            <span>Sampai tanggal</span>
                            <div class="input-group">
                                <input type="date" class="form-control" name="sampai"
                                    value="{{ old('end') }}">
                            </div>

                        </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary mt-4">Filter</button>
                                <a href="/toko/bukuKas/cetak" class="btn btn-default mt-4">Export</a>
                            </div>
                          
                        </div>
                    </div>
                </form>
                </div>
                <div class="card-body p-0">
                    <table class="table">

                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($myorder as $item)
                            <tr>
                                <td><br>{{ $item->created_at }}</td>
                                <td>
                                    <strong>Hasil Penjualan</strong>
                                    <p>Hasil Penjualan Dari Konsumen <a href="">{{ $item->noPesanan }}</a></p>
                                </td>
                                <td class="text-success"><br>+ Rp.{{number_format( $item->Totalbayar,0,".",".") }}</td>
                            </tr>
                            @php 
                            $hasil = $item->Totalbayar;
                            $subTotal = $total += $hasil;
                            @endphp
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="card-footer text-right">
                    <h4>Total Rp.{{number_format($subTotal ,0,".",".") }}</h4>
                </div>
            </div>

        </div>
    </div>

</div>

</div>

{{-- modal tambah Transaksi --}}
<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body">
                <form action="/toko/bukuKas/add" method="post">
                    @csrf
                    <div class="btn-group btn-group-toggle w-100 mb-3" data-toggle="buttons">
                        <label class="btn btn-outline-secondary active">

                            <input type="radio" name="jenis" id="option" checked="" value="1"> Pengeluaran
                        </label>
                        <label class="btn btn-outline-secondary">

                            <input type="radio" name="jenis" id="option2" value="2">Pemasukan
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal">Rekening Bank</label>
                        <select name="id_rekening" id="rekening" class="form-control select3" required>
                            <option value="">Pilih Rekening Bank</option>
                            @foreach ($rekening as $item)
                            <option value="{{ $item->id }}">{{ $item->namaRek }}</option>
                            @endforeach

                        </select>
                        <small><a href="/toko/rekening">+ Tambah </a></small>
                    </div>
                    {{-- pengeluaran --}}
                    <div id="1" class="desc a">
                        <div class="mb-3">
                            <label for="tanggal">Kategori</label>
                            <select name="id_kategori_debet" id="id_kategori_debet" class="form-control select3 " >
                                <option value="">Pilih Kategori Transaksi</option>
                                @foreach ($Kpengeluaran as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                            <small><a href="/toko/kategoripengeluaran">+ Tambah </a></small>
                        </div>
                        <input type="text" name="jeniskategoriDebet" value="Debet" hidden>
                    </div>
                    {{-- pemasukan --}}
                    <div id="2" class="desc ">
                        <div class="mb-3">
                            <label for="tanggal">Kategori</label>
                            <select name="id_kategori_kredit" id="id_kategori_kredit" class="form-control select3 " >
                                <option value="">Pilih Kategori Transaksi</option>
                                @foreach ($Kpemasukan as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                            <small><a href="/toko/kategoripemasukan">+ Tambah</a> </small>
                        </div>
                        <input type="text" name="jeniskategoriKredit" value="Kredit" hidden>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" value="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal">Keterangan</label>
                        <input type="text" name="ket" id="ket" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer p-0 m-0">
                <button type="submit" class="btn btn-primary btn-block">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("div.desc").hide();
     $("div.a").show();
    $("input[name$='jenis']").click(function() {
            $("div.a").show();
            var test = $(this).val();
            
            $("div.desc").hide();
            $("#" + test).show();
        });

</script>

@endsection