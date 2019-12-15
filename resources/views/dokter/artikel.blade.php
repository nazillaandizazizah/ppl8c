@extends('dashboard')

@section('content')
<button class="button" data-toggle="modal" data-target="#artikelModal" style="float: right;">+ Tambah</button>
<h1 style="text-align: left; margin: 10px;">Artikel</h1><br>

<button class="tablink" onclick="openPage('Home', this, '#e0cece')">Saya</button>
<button class="tablink" onclick="openPage('News', this, '#cfe3d9')" id="defaultOpen">Umum</button>

<div id="Home" class="tabcontent">
	@php
	$artikel = \DB::table('artikels')->where('dokter_id', Auth::user()->id)->get()->all();
	// dd($data);
	@endphp
	
	@foreach ($artikel as $art)
	
	
	
	<div class="cont">
		
		<img src="{{asset('storage/'. Auth::user()->avatar)}}" class="mb-3" alt="Avatar" style="width:100%;">
		<div class="float-left">
			<span class="time-right mt-3"><button class="mt-3" type="button" data-judul="{{$art->judul_artikel}}" data-isi="{{$art->isi_artikel}}" data-id="{{$art->id}}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button></span>
			
			<span class="time-right mt-3"><button class="mt-3" type="button" data-id="{{$art->id}}" data-toggle="modal" data-target="#hapusModal"><i class="fas fa-trash-alt"></i></button></span><br>
		</div>
		<h3>{{\DB::table('users')->where('id', $art->dokter_id)->value('name')}}</h3>
		<br><h3><b>{{$art->judul_artikel}}</b></h3>
		<p>{{$art->isi_artikel}}</p>
		<span class="time-right">{{$art->created_at}}</span>
	</div>
	@endforeach
	
</div><br><br><br>

<div id="News" class="tabcontent">
	@foreach ($data as $item)
	
	<div class="cont">
		<img src="{{asset('storage/'. Auth::user()->avatar)}}" class="mb-3" alt="Avatar" style="width:100%;">
		<h3>{{\DB::table('users')->where('id', $item->dokter_id)->value('name')}}</h3>
		<br><h3><b>{{$item->judul_artikel}}</b></h3>
		<p>{{$item->isi_artikel}}</p>
		<span class="time-right">{{$item->created_at}}</span>
	</div>
	@endforeach
</div><br><br><br>


<!-- Modal -->
<div class="modal fade" id="artikelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="jawaban" action="{{route('artikel.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					{{-- <input type="hidden" name="id" id="id" value=""> --}}
					<div class="form-group">
						<label for="exampleFormControlInput1">Judul Artikel</label>
						<input type="text" class="form-control" name="judul_artikel" id="judul_artikel">
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Isi Artikel</label>
						<textarea class="form-control" name="isi_artikel" id="isi_artikel" rows="3"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">submit</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="jawaban" action="{{route('artikel.update', 'id')}}" method="POST" enctype="multipart/form-data">
				@csrf
				{{method_field('PUT')}}
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="exampleFormControlInput1">Judul Artikel</label>
						<input type="text" class="form-control" name="judul_artikel" id="judul_artikel">
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Isi Artikel</label>
						<textarea class="form-control" name="isi_artikel" id="isi_artikel" rows="3"></textarea>
					</div>
					<div class="form-group">
						<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="gambar" id="gambar" aria-describedby="inputGroupFileAddon01">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">submit</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hapus Artikel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="jawaban" action="{{route('artikel.destroy', 'id')}}" method="POST" enctype="multipart/form-data">
				@csrf
				{{method_field('DELETE')}}
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<h3>Apakah anda yakin akan menghapus artikel ini ?</h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	function openPage(pageName,elmnt,color) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].style.backgroundColor = "";
		}
		document.getElementById(pageName).style.display = "block";
		elmnt.style.backgroundColor = color;
	}
	
	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>


@endsection

@section('footer-content')
<script>
	$(document).ready(function(){
		$('#editModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			var judul = button.data('judul')
			var isi = button.data('isi')
			
			var modal = $(this)
			modal.find('.modal-body #judul_artikel').val(judul)
			modal.find('.modal-body #isi_artikel').val(isi)
			modal.find('.modal-body #id').val(id)
		});
		$('#hapusModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			
			var modal = $(this)
			modal.find('.modal-body #id').val(id)
		});
	});
</script>
@stop