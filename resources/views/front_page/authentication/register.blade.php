<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <style>
       
 
    #progressBar {
      height: 20px;
      width: 100%;
      margin-top: 0.6em;
      border-radius:50px;
      border:2px solid #ddd
    }
 
    #progress-bar {
      width: 0%;
      height: 100%;
      transition: width 500ms linear;
      border-radius:50px;
      box-shadow:0px 1px 5px #555
    }
 
    .progress-bar-danger {
      background: #d00;
    }
 
    .progress-bar-warning {
      background: #f50;
    }
 
    .progress-bar-success {
      background: #080;
    }
 
</style>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <img alt="#" src="{{ asset('img/logo2.png') }}" class="img-fluid item-img w-50">
     
    </div>
    <div class="card-body">
      <form action="/register/new" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Nama Lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('nama_lengkap')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('telp') is-invalid @enderror" placeholder="Nomor Telepon" name="telp" value="{{ old('telp') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
          @error('telp')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="pwd" placeholder="Password" name="password" onchange="generateStrongPassword()" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password2') is-invalid @enderror" placeholder="Masukan Ulang password" name="password2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password2')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          <br>
         
        </div>
        <div class="form-group">
        <small class="tx-grey"> Kekuatan password : </small>
        <div  class="progress progress-xs progress-striped ">
      <div id="progress-bar"></div>
        </div>
        <small>Minimum 8 characters including capital & small letters (A-Z), (a-z), and numbers (1-9)</small>
        <br>
         
  </div>
        <div class="row">
          <div class="col-9">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               <small>Saya setuju dengan semua <a href="#">kebijakan</a></small>
              </label>
            </div>
          </div>
          
          <!-- /.col -->
         
        </div>
      
      <div class="social-auth-links text-center">
        <button type="submit" class="btn btn-block btn-primary" name="input">
          <i class="fab fa-sign mr-2"></i>
          Daftar Pengguna baru
        </button>
        </form>
      </div>
      <div align="center" class="text-muted">
        <a href="/login">Saya sudah mempunyai Akun</a>
      </div>
      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js ') }}"></script>

<?php

function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
{
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '23456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '!@#$%&*?';

	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[array_rand(str_split($set))];
		$all .= $set;
	}

	$all = str_split($all);
	for($i = 0; $i < $length - count($sets); $i++)
		$password .= $all[array_rand($all)];

	$password = str_shuffle($password);

	if(!$add_dashes)
		return $password;

	$dash_len = floor(sqrt($length));
	$dash_str = '';
	while(strlen($password) > $dash_len)
	{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}
	$dash_str .= $password;
	return $dash_str;
}
    
?>
 <script>
jQuery.strength = function( element, password ) {
        var desc = [{'width':'0px'}, {'width':'20%'}, {'width':'40%'}, {'width':'60%'}, {'width':'80%'}, {'width':'100%'}];
        var descClass = ['', 'progress-bar-danger', 'progress-bar-danger', 'progress-bar-warning', 'progress-bar-success', 'progress-bar-success'];
        var score = 0;
 
        //Jika Password Lebih Dari 6 Karakter Tambah Skor
        if(password.length > 6){ 
            score++;
        }
 
        //Jika Password Terdapat Huruf Kecil dan Besar Tambah Skor
        if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))){ 
            score++;
        }
 
         
        //Jika Password Terdiri dari Angka
        if(password.match(/\d+/)){
            score++;
        }
         
        //Jika Password Terdapat Simbol
        if(password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)){
            score++;
        }
 
        //Jika Password Lebih dari 10 Karakter  
        if (password.length > 10){
            score++;
        }
 
        element.removeClass( descClass[score-1] ).addClass( descClass[score] ).css( desc[score] );
    };
 
jQuery(function() {
  jQuery("#pwd").keyup(function() {
                    jQuery.strength(jQuery("#progress-bar"), jQuery(this).val());
                });
});
</script> 
</body>
</html>
