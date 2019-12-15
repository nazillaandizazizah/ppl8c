@extends('dashboard')

@section('content')
<br><br><br>
<div class="cont">
	<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-id="{{Auth::user()->id}}" data-target="#tambahSaldo">
		Tambah Saldo
	</button>
	<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-id="{{Auth::user()->id}}" data-target="#tarikModal">
		Tarik Saldo
	</button>
	{{-- @dd(Auth::user()->id) --}}
	@php
	$data = \DB::table('saldos')->where('user_id', Auth::user()->id)->value('saldo');
	$transaksi = \DB::table('transaksi')->where(['user_id' => Auth::user()->id, 'status' => 'proses'])->value('paket_id');
	// $cek = count($transaksi);
	$paket =  \DB::table('pakets')->where('id', $transaksi)->get()->all();
	$d = date('Y-m-d');
	if (isset($transaksi)) {
		$a = intval($paket[0]->lama_paket);
		$e = date('Y-m-d', strtotime('+'.$a.' months', strtotime($d))); 
	}
	// dd($e);
	@endphp
	<h2>Saldo Saya : Rp {{number_format($data)}}</h2>
</div>

<div class="cont">
	@if (isset($transaksi))
	<h2>Sedang berlangganan : {{\DB::table('pakets')->where('id', $transaksi)->value('nama_paket')}}</h2>
	<h2>Paket berakhir : {{$e}}</h2>
	@else 
	<h2>Sedang berlangganan : </h2>
	<h2>Paket berakhir : </h2>
	@endif
</div>

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
		<button type="button" class="btn btn-primary" data-toggle="modal" data-harga="{{$item->harga_paket}}" data-id="{{$item->id}}" data-target="#pilihPaket">
			Beli
		</button>
	</div>
</div>

@endforeach



<div id="id01" class="modal">
	<form class="modal-content animate">
		<div class="konten">
			
			<label>Top Up Via ATM BCA</label><br>
			<table>	
				<tr>
					<td>1.</td>
					<td>Masukkan kartu ATM dan PIN Anda</td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Masuk ke menu TRANSFER dan klik Virtual Account</td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Masukkan kode perusahaan untuk Tersekuy:60023 dan nomor telepon yang terdaftar pada aplikasi (Contoh: 600230812XXXXXXX)</td>
				</tr>
				<tr>
					<td>4.</td>
					<td>Masukkan jumlah top up yang diinginkan</td>
				</tr>
			</table><br>
			
			<label>Top Up Via KlikBCA</label><br>
			<table>	
				<tr>
					<td>1.</td>
					<td>Login ke KLIK BCA</td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Pilih FUND TRANSFER > TRANSFER TO BCA VIRTUAL ACCOUNT.</td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Masukkan kode perusahaan untuk Tersekuy:60023 dan nomor telepon yang terdaftar pada aplikasi (Contoh: 600230812XXXXXXX)</td>
				</tr>
				<tr>
					<td>4.</td>
					<td>Masukkan jumlah top up yang diinginkan</td>
				</tr>
			</table><br>
			
			<label>Top Up Via m_BCA (BCA Mobile)</label><br>
			<table>	
				<tr>
					<td>1.</td>
					<td>Login ke m_BCA</td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Pilih M-TRANSFER > TRANSFER BCA VIRTUAL ACCOUNT</td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Masukkan kode perusahaan untuk Tersekuy:60023 dan nomor telepon yang terdaftar pada aplikasi (Contoh: 600230812XXXXXXX)</td>
				</tr>
				<tr>
					<td>4.</td>
					<td>Masukkan jumlah top up yang diinginkan</td>
				</tr>
				<tr>
					<td>5.</td>
					<td>Masukkan PIN Anda</td>
				</tr>
			</table><br>
			
			<center>
				<br>
				<button onclick="document.getElementById('id01').style.display='none'" class="button">Keluar</button>
			</center>
		</div>
	</form>
</div>



<div id="id02" class="modal">
	<form class="modal-content animate">
		<div class="konten">
			<center>
				<h2>Apakah Anda yakin ingin membeli paket ini?</h2><br><br>
				<button onclick="document.getElementById('id02').style.display='none'" class="button">Iya</button>
				<button onclick="document.getElementById('id02').style.display='none'" class="button">Batal</button>
			</center>
		</div>
	</form>
</div>


<!-- Modal -->
<div class="modal fade" id="pilihPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{url('pilihPaket')}}" method="POST">
				@csrf
				
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<input type="hidden" name="harga" id="harga">
					<h2>Apakah Anda yakin ingin membeli paket ini?</h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Beli</button>
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
			<form action="{{url('tambahSaldoPeternak')}}" method="POST">
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
<div class="modal fade" id="tarikModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tarik Saldo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('langganan.update', 'id')}}" method="POST">
				@csrf
				{{method_field('PUT')}}
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
@endsection
@section('footer-content')
<script>
	$(document).ready(function(){
		$('#tarikModal').on('show.bs.modal', function (event) {
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
		
		$('#pilihPaket').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			var harga = button.data('harga')

			var modal = $(this)
			modal.find('.modal-body #id').val(id)
			modal.find('.modal-body #harga').val(harga)
		});
	});
</script>
@endsection