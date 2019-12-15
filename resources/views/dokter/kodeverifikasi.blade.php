@extends('dokter/dashboard')

@section('content')
<br><br><br>
<div class="cont">
	<center><br>	
		<h2>Kode verifikasi telah dikirim ke email Anda.</h2>
		<h4>Silahkan masukkan kode verifikasi :</h4><br>	
		<input type="text" name="kodeverifikasi" placeholder="Kode Verifikasi"><br>	<br>	
		<button class="button">Selesai</button>
		<a href="http://localhost:8000/dokter/profil"><button class="button">Batal</button></a>
		<br><br>	
	</center>
</div>
@endsection