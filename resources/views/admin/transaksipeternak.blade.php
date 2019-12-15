@extends('dashboard')

@section('content')
<br><br><br><br>

<button class="tablink" onclick="openPage('News', this, '#e0cece')">Saldo</button>
<button class="tablink" onclick="openPage('Home', this, '#cfe3d9')" id="defaultOpen">Paket</button>

{{-- @dd($id) --}}
@php

$saldo = \DB::table('transaksi')->where(['user_id'=> $id , 'status' => ['menarik', 'menambah']])->get()->all();
$paket = \DB::table('transaksi')->where(['user_id'=> $id , 'status' => ['proses', 'berakhir']])->get()->all();

// dd($saldo)
@endphp

<div id="Home" class="tabcontent">
	@foreach ($paket as $item)
	@php
		$user = \DB::table('users')->where('id', $item->user_id)->value('name');
	@endphp
	<div class="alert">
		{{$user}} telah membeli paket A
		<span class="time-right">{{$item->created_at}}</span>
	</div>
	
	@endforeach
</div>

<div id="News" class="tabcontent">
	@foreach ($saldo as $item)
		
	<div class="alert">
		{{-- @dd($item->status) --}}
		@if ($item->status == 'menambah')	
		{{\DB::table('users')->where('id', $item->user_id)->value('name')}} berhasil menambah saldo sebesar Rp 500.000
		<span class="time-right">2/10/2019 05.54 PM</span>
		@elseif($item->status == 'menarik') 
		{{\DB::table('users')->where('id', $item->user_id)->value('name')}} berhasil menarik saldo sebesar Rp 500.000
		@endif
	</div>

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