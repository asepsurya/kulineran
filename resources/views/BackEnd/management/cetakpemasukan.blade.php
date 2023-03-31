<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Hasil Penjualan</title>
</head>
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
<body>
    <div align="center">
        <h3>Laporan Hasil Penjualan</h3>
    </div>
   <table id="customers">
    <thead>
        <th>#</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Total</th>
    </thead>
    <tbody>
        @php
            $no=1;
            $total=0;
        @endphp
    @foreach ($myorder as $item)
        @php
            $total += $item->Totalbayar
        @endphp
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <b>Hasil Penjualan</b><br>
                Hasil Penjualan Dari Konsumen <br>{{ $item->noPesanan }}
                
            </td>
            <td>{{ number_format($item->Totalbayar   ,0,".",".") }}</td>
        </tr>       
    @endforeach
    <tr>
        <td colspan="3"><strong>Jumlah</strong> </td>
        <td >{{number_format( $total   ,0,".",".") }}</td>
    </tr>
    </tbody>
   </table>
</body>
</html>