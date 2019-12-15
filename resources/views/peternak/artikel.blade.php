@extends('dashboard')

@section('content') 
<h1 style="text-align: center;">Artikel</h1><br>
@foreach ($data as $item)

<div class="cont">
	<img src="{{asset('storage/' . Auth::user()->avatar)}}" alt="Avatar" style="width:100%;"><br>
	<h3>{{\DB::table('users')->where('id', $item->dokter_id)->value('name')}}</h3>
	<br><h3><b>{{$item->judul_artikel}}</b></h3>
	<p>{{$item->isi_artikel}}</p>
	<span class="time-right">{{$item->created_at}}</span>
</div>

@endforeach
<br><br>
@endsection