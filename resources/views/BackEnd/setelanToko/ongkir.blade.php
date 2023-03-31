@extends('BackEnd.layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Setelan Ongkir</h1>
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

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Setelan Ongkir</div>
    
    <div class="card-body">
        @if ($ongkir->count() == "0")
            @php  $value =  0; @endphp
        @else
            @foreach ($ongkir as $item)
                 @php  $value = $item->ongkir; @endphp  
            @endforeach
        @endif
        
        <form action="/setelan/ongkir/add" method="post">
            @csrf
            <label for="ongkir">Setelan Default Ongkos Kirim</label>
            <input type="text" class="form-control mb-3" name="ongkir" id="ongkir" value="{{ $value }}" disabled>
            
            <button type="submit" class="btn btn-primary" id="simpan">Simpan Data</button>
        </form>
        <button class="btn btn-primary" id="ubah">Ubah</button>
    </div>
</div>
</div>
<script>
    $('#simpan').hide();
    $('#ubah').click(function(){
        document.getElementById('ongkir').disabled = false;
        $('#ongkir').enable=true;
        $('#simpan').show();
        $('#ubah').hide();
    });
</script>
@endsection