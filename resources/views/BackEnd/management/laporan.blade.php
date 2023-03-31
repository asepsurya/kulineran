<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Keuangan</title>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
</head>
<body>
    <div align="center">
        <h4>Laporan Pemasukan dan Pengeluaran Toko</h4>
        <small style="margin-bottom:10px">Tanggal Cetak :{{ date("Y-m-d")  }}</small>
    </div><br>
    <table class="table" id="customers">
        <thead>
            <th>#</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Jumlah</th>
        </thead>
        <tbody>
            {{-- cek Saldo Masuk Orderan  --}}
            @php
                 $no = 1;
                 $total= 0;
                 $a= 0;
            @endphp
            @if ($myorder->count())
                @foreach ($myorder as $item2)
                    @php
                    
                    $total += $item2->Totalbayar;
                    @endphp
              
                @endforeach

            <tr>
                <td>{{ $no++ }}</td>
                <td>{{  date("Y-m-d") }}</td>
                <td>
                    <b>Hasil Penjualan</b><br>
                    Total Hasil Penjualan Dari Konsumen
                </td>
                <td>0</td>
                <td>{{number_format( $total   ,0,".",".") }}</td>
                <td>{{number_format( $total   ,0,".",".") }}</td>
            </tr> 
            @endif
            {{-- End --}}
            @php
               
                $totalDebet = 0;
                $totalKredit = 0;
                $SubTotal = 0;
                $SaldoKas = 0;
                $SaldoKas = 0;
            @endphp
            @foreach ($bukuKas as $item)
                @php
                    $totalDebet += $item->Debet;
                    $totalKredit += $item->Kredit;
                    $SaldoKas = $SaldoKas+ $item->Kredit - $item->Debet;
            
                @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>
                    <b>{{ $item->rekening->namaRek}}</b><br>
                    {{ $item->tanggal }}
                </td>
                <td>
                    @if ($item->jenisTrans == "Debet")
                    <strong>
                        &nbsp;&nbsp; {{ $item->Kpengeluaran->kategori }}
                    </strong>
                    @else
                    <strong>
                        {{ $item->Kpemasukan->kategori }}
                    </strong>
                    @endif
                    <br>
                    &nbsp;&nbsp; {{ $item->keterangan }}
                </td>
                <td>{{number_format( $item->Debet  ,0,".",".") }}</td>
                <td>{{ number_format( $item->Kredit ,0,".",".") }}</td>
                <td>{{ number_format( $SaldoKas  ,0,".",".")  }}</td>
            </tr>
                
            @endforeach
            <tr>
                <td colspan="3" style="background-color: #04AA6D;color:white;">Jumlah</td>
                <td>{{number_format( $totalDebet ,0,".",".")  }}</td>
                <td>{{number_format( $totalKredit+$total ,0,".",".") }}</td>
                <td>{{number_format( $SubTotal += $SaldoKas+$total ,0,".",".") }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>