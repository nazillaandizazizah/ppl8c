@extends('dashboard')

@section('content')
@php
$data = \DB::table('users')->where('id', Auth::user()->id)->get()->all();
$province = DB::table('provinces')->pluck('title', 'province_id');
// dd($data);
@endphp
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Profil Saya</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li>
						<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-avatar="{{$data[0]->avatar}}" data-id="{{$data[0]->id}}" data-name="{{$data[0]->name}}" data-email="{{$data[0]->email}}" data-nomor="{{$data[0]->nomorHP}}" data-bank="{{$data[0]->bank}}" data-rekening="{{$data[0]->nomorRekening}}" data-province="{{$data[0]->province}}" data-city="{{$data[0]->city}}" data-target="#ubahProfile">
							Ubah
						</button>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			
			
			
			<div class="x_content">
				<table class="table" cellspacing ="10">
					<img align="center" src="{{asset('storage/'. $data[0]->avatar)}}" style="width: 200px; display: block; margin-right: auto;margin-left: auto; padding: 15px;">
					<tr>
						<td width="45%" style="padding-left: 37%;">Nama</td>
						<td align="center" width="10%">:</td>
						<td width="45%">{{$data[0]->name}}</td>
					</tr>
					<tr>
						<td style="padding-left: 37%;">Alamat</td>
						<td align="center">:</td>
						<td>{{\DB::table('cities')->where('city_id', $data[0]->city)->value('title')}}, {{\DB::table('provinces')->where('province_id', $data[0]->province)->value('title')}}</td>
					</tr>
					<tr>
						<td style="padding-left: 37%;">Email</td>
						<td align="center">:</td>
						<td>{{$data[0]->email}}</td>
					</tr>
				</table>
				
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="ubahProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('users.update', 'id')}}" method="POST" enctype="multipart/form-data">
				@csrf
				{{method_field('PUT')}}
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="exampleInputPassword1">Foto Profil</label>
						<input type="file" name="avatar" class="form-control" id="avatar">
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
						<label for="exampleInputPassword1">Password</label>
						<input type="password" name="password" class="form-control" id="password" >
					</div>
					<div class="form-group">
						<label for="nomorHP">Nomor HP</label>
						<input type="number" placeholder="Nomor HP" class="form-control" name="nomorHP" value="" id="nomorHP" required>
					</div>
					<div class="form-group">
						<label for="country">Bank</label>
						<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<select name="bank" id="bank" class="form-control">
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
						<input type="number" placeholder="Nomor Rekening" class="form-control" name="nomorRekening" id="rekening" required>
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
						{{-- <input type="text" id="province"> --}}
					</div>
					<div class="form-group">
						<label for="country">Kota</label>
						<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<select name="city" id="city" class="form-control">
								<option>--Kota--</option>
							</select>
							<small>abaikan jika tidak ingin merubah kota</small>
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
		
		$('#ubahProfile').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			var avatar = button.data('avatar')
			var name = button.data('name')
			var email = button.data('email')
			var nomorHp = button.data('nomor')
			var bank = button.data('bank')
			var rekening = button.data('rekening')
			var province = button.data('province')
			var city = button.data('city')
			
			console.log(rekening);
			
			
			var modal = $(this)
			modal.find('.modal-body #id').val(id)
			modal.find('.modal-body #nama').val(name)
			modal.find('.modal-body #email').val(email)
			modal.find('.modal-body #nomorHP').val(nomorHp)
			modal.find('.modal-body #bank').val(bank)
			modal.find('.modal-body #rekening').val(rekening)
			modal.find('.modal-body #province').val(province)
			modal.find('.modal-body #city').val(city)
		});
		
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