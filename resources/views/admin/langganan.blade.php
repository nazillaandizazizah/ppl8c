@extends('dashboard')

@section('content')
<br><br><br>
<div class="cont">
	<button type="button" style="float: right" class="btn btn-primary" data-id="{{Auth::user()->id}}" data-toggle="modal" data-target="#tambahSaldo">
		Tambah Saldo
	</button>
	<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-id="{{Auth::user()->id}}" data-target="#tarikSaldo">
		Tarik Saldo
	</button>
	@php
	$data = \DB::table('saldos')->where('user_id', Auth::user()->id)->value('saldo');
	@endphp
	<h2>Saldo Saya : Rp {{number_format($data)}}</h2>
</div>
<div class="cont">
	<h2>
		Email :   {{\DB::table('users')->where('id', Auth::user()->id)->value('email') }} <button data-id="{{Auth::user()->id}}" type="button" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
	</h2>
	<h2>
		Bank : {{\DB::table('users')->where('id', Auth::user()->id)->value('bank') }} <button data-id="{{Auth::user()->id}}" type="button" data-toggle="modal" data-target="#editBankModal"><i class="fas fa-edit"></i></button>
	</h2>
	<h2>
		No Rekening : {{\DB::table('users')->where('id', Auth::user()->id)->value('nomorRekening') }} <button data-id="{{Auth::user()->id}}" type="button" data-toggle="modal" data-target="#editRekModal"><i class="fas fa-edit"></i></button>
	</h2></div><br>
	<button type="button" data-toggle="modal" data-target="#tambahPaket" class="btn btn-primary">Tambah Paket</button><br><br>



@php
$paket = \DB::table('pakets')->get()->all()
@endphp
@foreach ($paket as $item)


<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	<div class="tile-stats" align="center">
		<img src="{{asset('storage/'. $item->icon_paket)}}" style="width: 170px; padding: 10px; border-radius: 50%;">
		<h2>{{$item->nama_paket}}</h2>
		<h5>{{$item->lama_paket}} Bulan</h5>
		<h5>Rp {{number_format($item->harga_paket)}}</h5><br>
		<button type="button" class="btn btn-info" data-id="{{$item->id}}" data-nama="{{$item->nama_paket}}" data-lama="{{$item->lama_paket}}" data-harga="{{$item->harga_paket}}" data-toggle="modal" data-target="#editPaket">Edit</button>
		<button type="button" class="btn btn-danger" data-id="{{$item->id}}" data-toggle="modal" data-target="#hapusPaket">Hapus</button>
	</div>
</div>

@endforeach
<br><br><br>


<!-- Modal -->
<div class="modal fade" id="hapusPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hapus Paket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('paket.destroy', 'id')}}" method="POST" enctype="multipart/form-data">
				@csrf
				{{method_field('DELETE')}}
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					Apakah anda yakin ingin menghapus paket ini ?
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form" action="{{route('paket.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="exampleInputPassword1">Nama Paket</label>
						<input type="text" name="nama" class="form-control" id="nama" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Lama Paket</label>
						<input type="number" name="lama" class="form-control" id="lama" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Harga Paket</label>
						<input type="number" name="harga" class="form-control" id="harga" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Icon Paket</label>
						<input type="file" name="icon" class="form-control" id="icon">
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

<!-- Modal -->
<div class="modal fade" id="editPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Paket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('paket.update', 'id')}}" method="POST" enctype="multipart/form-data">
				@csrf
				{{method_field('PUT')}}
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="exampleInputPassword1">Nama Paket</label>
						<input type="text" name="nama" class="form-control" id="nama" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Lama Paket</label>
						<input type="number" name="lama" class="form-control" id="lama" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Harga Paket</label>
						<input type="number" name="harga" class="form-control" id="harga" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Icon Paket</label>
						<input type="file" name="icon" class="form-control" id="icon">
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

<!-- Modal -->
<div class="modal fade" id="tarikSaldo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tarik Saldo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{url('tarikSaldo')}}" method="POST">
				@csrf
				{{-- {{method_field('PUT')}} --}}
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="exampleInputPassword1">Nominal</label>
						<input type="number" name="nominal" class="form-control" id="nominal" required>
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

<!-- Modal -->
<div class="modal fade" id="tambahSaldo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Saldo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{url('admin.tambahSaldo')}}" method="POST">
				@csrf
				
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="exampleInputPassword1">Nominal</label>
						<input type="number" name="nominal" class="form-control" id="nominal" required>
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


<!-- Modal -->
<div class="modal fade" id="editRekModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Saldo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{url('editRekAdmin')}}" method="POST">
				@csrf
				
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="exampleInputPassword1">No Rekening</label>
						<input type="number" name="rekening" class="form-control" id="nominal" required>
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


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Saldo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{url('editEmailAdmin')}}" method="POST">
				@csrf
				
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="exampleInputPassword1">Email</label>
						<input type="email" name="email" class="form-control" id="nominal" required>
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

<!-- Modal -->
<div class="modal fade" id="editBankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Saldo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{url('editBankAdmin')}}" method="POST">
				@csrf
				
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="exampleFormControlSelect1">Bank</label>
						<select name="bank" class="form-control" id="exampleFormControlSelect1">
							<option value="BRI">BRI</option>
							<option value="BNI">BNI</option>
							<option value="Mandiri">Mandiri</option>
							<option value="BCA">BCA</option>
							<option value="Bank Jatim">Bank Jatim</option>
						</select>
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
		$('#tarikSaldo').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			
			var modal = $(this)
			modal.find('.modal-body #id').val(id)
		});
		
		$('#tambahSaldo').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			
			var modal = $(this)
			modal.find('.modal-body #id').val(id)
		});
		
		$('#editModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			
			var modal = $(this)
			modal.find('.modal-body #id').val(id)
		});
		$('#editBankModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			
			var modal = $(this)
			modal.find('.modal-body #id').val(id)
		});
		$('#editRekModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			
			var modal = $(this)
			modal.find('.modal-body #id').val(id)
		});
		$('#editPaket').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			var nama = button.data('nama')
			var lama = button.data('lama')
			var harga = button.data('harga')
			
			var modal = $(this)
			modal.find('.modal-body #id').val(id)
			modal.find('.modal-body #nama').val(nama)
			modal.find('.modal-body #lama').val(lama)
			modal.find('.modal-body #harga').val(harga)
		});
		$('#hapusPaket').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			
			var modal = $(this)
			modal.find('.modal-body #id').val(id)
		});
		
		
	});
</script>
@endsection