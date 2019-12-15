@extends('dashboard')

@section('content')
<br><br><br><br>

<button class="tablink" onclick="openPage('Home', this, '#e0cece')">Paket</button>
<button class="tablink" onclick="openPage('News', this, '#cfe3d9')" id="defaultOpen">Saldo</button>

<div id="Home" class="tabcontent">
	
	<div class="alert">
		Nazilla Andiz Azizah telah membeli paket A
		<span class="time-right">17/10/2019 20.03 PM</span>
	</div>
	
	<div class="alert">
		Masa waktu berlangganan paket B atas nama Nurul Alfiana telah habis
		<span class="time-right">10/10/2019 11.03 PM</span>
	</div>
	
	<div class="alert">
		Masa waktu berlangganan paket B atas nama Ari Puji Astuti telah habis
		<span class="time-right">10/10/2019 11.03 PM</span>
	</div>
	
</div>

<div id="News" class="tabcontent">
	@php
	$saldo = \DB::table('transaksi')->where('status', ['menarik', 'menambah'])->get()->all();
	@endphp
	{{-- @dd($saldo) --}}
	@foreach ($saldo as $item)
	
	@if ($item->status == 'menarik')
	<div class="alert">
		@php
			$user = \DB::table('users')->where('id', $item->user_id)->value('name');
		@endphp
		{{$user}} berhasil menarik saldo sebesar Rp {{number_format($item->nominal)}}
		<span class="time-right">{{$item->created_at}}</span>
	</div>
	@elseif($item->status == 'menambah')
	<div class="alert">
		Eucalyptra Citta Kinari berhasil menambah saldo sebesar Rp 500.000
		<span class="time-right">2/10/2019 05.54 PM</span>
	</div>
	@endif
	
	
	@endforeach
	
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