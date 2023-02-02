
@if(session()->has('Berhasil'))
    <script>
        $(document).ready(function(){
            toastr.success('Data Berhasil Disimpan');
        });
    </script>
@endif
@if(session()->has('updateBerhasil'))
    <script>
        $(document).ready(function(){
            toastr.success('Data Berhasil diUbah');
        });
    </script>
@endif
@if(session()->has('hapusBerhasil'))
    <script>
        $(document).ready(function(){
            toastr.success('Data Berhasil diHapus');
        });
    </script>
@endif
