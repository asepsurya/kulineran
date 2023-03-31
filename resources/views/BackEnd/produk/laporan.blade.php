<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Daftar Produk</title>
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
      background-color: #6972f3;
      color: white;
    }
    </style>
<body>
    <div align="center">
        <h3>Laporan Daftar Produk</h3>
        <small>Dicetak pada Tanggal : {{ date('d-m-Y') }}</small>
    </div>
    <br>
    <table id="customers">
        <th>#</th>
        <th>Nama Produk</th>
        <th>Harga Produk</th>
        <th>Kategori</th>
        <th>Outlet</th>
        <th>Status Barang</th>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($produk as $item)
        
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->namaProduk }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->kategori->jenisKategori }}</td>
                <td>{{ $item->outlet->namaOutlet }}</td>
                <td>
                    @if ($item->statu =="1")
                        Tersedia
                    @else
                        Belum Tersedia
                    @endif
                   
                </td>
            </tr>         
            @endforeach
        </tbody>
    </table>
    
</body>
</html>