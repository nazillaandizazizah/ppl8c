@extends('dashboard')

@section('content')
<div class="row">
	<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#tambahDokter">
		Tambah Dokter
	</button>
	@php
	$province = DB::table('provinces')->pluck('title', 'province_id');
	@endphp
	{{-- @dd($province) --}}
	<div class="col-md-12">
		<div class="row top_tiles">
			@php
			$role = \DB::table('role_user')->where('role_id', 2)->get()->all();
			// dd($role);
			@endphp
			@foreach ($role as $item)
			{{-- @dd($item) --}}
			@php
			$users = \DB::table('users')->where('id', $item->user_id)->get()->all();
			@endphp
			@foreach ($users as $dokter)
			{{-- {{var_dump($dokter)}} --}}
			
			
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats" align="center">
					<img src="{{asset('storage/'. $dokter->avatar)}}" style="width: 170px; padding: 10px; border-radius: 50%;">
					<h2>{{$dokter->name}}</h2>
					<h5>{{$dokter->lulusan}}, {{date('Y', strtotime($dokter->tahunLulus))}}</h5>
					<h5>{{\DB::table('cities')->where('city_id', $dokter->city)->value('title')}}, {{\DB::table('provinces')->where('province_id', $dokter->province)->value('title')}}</h5>
					<h5>{{$dokter->nomorHP}}</h5>
					<h5>{{$dokter->email}}</h5>
					<h5>{{$dokter->nomorRekening}} ({{$dokter->bank}})</h5><br>

				</div>
			</div>
			
			
			@endforeach
			@endforeach
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahDokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputPassword1">Foto Profil</label>
						<input type="file" name="avatar" class="form-control" id="avatar" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Nama</label>
						<input type="text" name="nama" class="form-control" id="nama" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Email</label>
						<input type="email" name="email" class="form-control" id="email" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" placeholder="Password" class="form-control" name="password" required>
					</div>
					<div class="form-group">
						<label for="lulusan">Lulusan</label>
						<input type="text" placeholder="Lulusan" class="form-control" name="lulusan" required>
					</div>
					<div class="form-group">
						<label for="tahunlulus">Tahun Lulus</label>
						<input type="date" placeholder="Tahun Lulus" class="form-control" name="tahunlulus" required>
					</div>
					<div class="form-group">
						<label for="nomorHP">Nomor HP</label>
						<input type="number" placeholder="Nomor HP" class="form-control" name="nomorHP" required>
					</div>
					<div class="form-group">
						<label for="country">Bank</label>
						<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<select name="bank" id="province" class="form-control">
								<option value="BRI">BRI</option>
								<option value="BNI">BNI</option>
								<option value="Mandiri">Mandiri</option>
								<option value="BCA">BCA</option>
								<option value="Bank Jatim">Bank Jatim</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="tahunlulus">Nomor Rekening</label>
						<input type="number" placeholder="Nomor Rekening" class="form-control" name="nomorRekening" required>
					</div>
					<div class="form-group">
						<label for="country">Provinsi</label>
						<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<select name="province" id="province" class="form-control">
								<option value="">--Provinsi--</option>
								@foreach ($province as $provinc => $value)
								<option value="{{$provinc}}">{{$value}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="country">Kota</label>
						<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<select name="city" id="city" class="form-control">
								<option>--Kota--</option>
							</select>
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Selesai</button>
				</div>
			</form>
		</div>
	</div>
</div>


@endsection
@section('footer-content')
<script>
	$(document).ready(function(){
		$('select[name="province"]').on('change', function(){
			let provinceId = $(this).val();
			console.log(provinceId);
			
			if (provinceId) {
				jQuery.ajax({
					url: "{{url('province')}}"+'/'+provinceId+'/cities',
					type: "GET",
					dataType: "json",
					success: function(data) {
						
						
						$('select[name="city"]').empty();
						$.each(data, function(key, value) {
							$('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option> ');
						});
					},
				});
			}else {
				$('select[name="city"]').empty();
			}
		});
		
		
		
	});
</script>
@endsection