@extends('dashboard')

@section('content')
<div class="row">
	<!-- <button class="button" style="margin: 10px;"  onclick="document.getElementById('id02').style.display='block'">+ Tambah</button> -->
	<div class="col-md-12">
		<div class="row top_tiles">
			@php
			$role = \DB::table('role_user')->where('role_id', 1)->get()->all();
			// dd($role);
			@endphp
			@foreach ($role as $item)
			{{-- @dd($item) --}}
			@php
			$users = \DB::table('users')->where('id', $item->user_id)->get()->all();
			@endphp
			@foreach ($users as $peternak)
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats" align="center">
					<img src="{{asset('storage/'. $peternak->avatar)}}" style="width: 170px; padding: 10px; border-radius: 50%;">
					<h2 class="text-capitalize">{{$peternak->name}}</h2>
					<h5>{{\DB::table('cities')->where('city_id', $peternak->city)->value('title')}}, {{\DB::table('provinces')->where('province_id', $peternak->province)->value('title')}}</h5>
					<h5>{{$peternak->nomorHP}}</h5>
					<h5>{{$peternak->email}}</h5>
					<h5>{{$peternak->nomorRekening}} ({{$peternak->bank}})</h5><br>
					<!-- <a href="{{url('transaksi/peternak', $peternak->id)}}"><button class="btn btn-primary">Transaksi</button></a> -->
				</div>
			</div>
			@endforeach
			@endforeach
		</div>
	</div>
</div>



<div id="id02" class="modal">
	<form class="modal-content animate">
		<div class="konten">
			<label for="foto"><b>Foto Profil</b></label>
			<input type="file" placeholder="Foto Profil" name="foto" required><br>
			
			<label for="nama"><b>Nama</b></label>
			<input type="text" placeholder="Nama" name="nama" required>
			
			<label for="alamat"><b>Alamat</b></label>
			<input type="text" placeholder="Alamat" name="alamat" required>
			
			<label for="email"><b>Email</b></label>
			<input type="email" placeholder="Email" name="email" required>
			
			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Password" name="password" required>
			
			<label for="lulusan"><b>Lulusan</b></label>
			<input type="text" placeholder="Lulusan" name="lulusan" required>
			
			<label for="tahunlulus"><b>Tahun Lulus</b></label>
			<input type="text" placeholder="Tahun Lulus" name="tahunlulus" required>
			
			<br>
			<center>
				<button type="submit" class="button">Selesai</button>
				<button onclick="document.getElementById('id02').style.display='none'" class="button">Batal</button>
			</center>
		</div></form></div>
		
		
		
		<div id="id01" class="modal">
			<form class="modal-content animate">
				<div class="konten">
					<center>
						<h2>Apakah Anda yakin ingin menonaktifkan akun ini?</h2>
						<br>
						<button type="submit" class="button">Iya</button>
						<button onclick="document.getElementById('id01').style.display='none'" class="button">Batal</button>
					</center>
				</div></form></div>
				
				
				<div id="id03" class="modal">
					<form class="modal-content animate">
						<div class="konten">
							<center>
								<h2>Apakah Anda yakin ingin mengaktifkan akun ini?</h2>
								<br>
								<button type="submit" class="button">Iya</button>
								<button onclick="document.getElementById('id03').style.display='none'" class="button">Batal</button>
							</center>
						</div></form></div>
						
						
						@endsection