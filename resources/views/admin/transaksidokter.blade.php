@extends('dashboard')

@section('content')
<br><br><br><br>

<button class="tablink" onclick="openPage('Home', this, '#e0cece')">Data Diri</button>
<button class="tablink" onclick="openPage('News', this, '#cfe3d9')" id="defaultOpen">Paket</button>
@php
	$cek = count($users); 
	dd($users);
@endphp
@if ($cek > 0)
	

@foreach ($users as $item)

{{-- @dd($item) --}}
<div id="Home" class="tabcontent">
	<div class="alert">
		Drh. Ilma Soraya berhasil mengubah data diri
		<span class="time-right">17/10/2019 20.03 PM</span>
	</div>
	
	<div class="alert">
		Drh. Ilma Soraya berhasil mengubah data diri
		<span class="time-right">10/10/2019 11.03 PM</span>
	</div>
</div>

<div id="News" class="tabcontent">
	
	<div class="alert">
		Drh. Ilma Soraya berhasil mengubah data diri berhasil menarik saldo sebesar Rp 500.000
		<span class="time-right">2/10/2019 05.54 PM</span>
	</div>
	<div class="alert">
		Drh. Ilma Soraya berhasil mengubah data diri berhasil menarik saldo sebesar Rp 200.000
		<span class="time-right">17/10/2019 20.03 PM</span>
	</div>
	
	<div class="alert">
		Drh. Ilma Soraya berhasil mengubah data diri berhasil menarik saldo sebesar Rp 500.000
		<span class="time-right">2/10/2019 05.54 PM</span>
	</div>
	<div class="alert">
		Drh. Ilma Soraya berhasil mengubah data diri berhasil menarik saldo sebesar Rp 200.000
		<span class="time-right">17/10/2019 20.03 PM</span>
	</div>
</div>
@endforeach
@endif



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