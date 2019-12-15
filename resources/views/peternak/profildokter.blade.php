@extends('dashboard')

@section('content')

{{-- @dd($id) --}}

@php
$dokter = \DB::table('users')->where('id', $id)->get()->all();
$artikel = \DB::table('artikels')->where('dokter_id', $id)->get()->all();
// dd($artikel);
@endphp



<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<center>
					<img align="center" src="{{asset('storage/'. $dokter[0]->avatar)}}" style="width: 170px; display: block; margin-right: auto;margin-left: auto; padding: 15px; border-radius: 50%">
				</center>
				<div class="clearfix"></div>
			</div>
			<center>
				<table>
					<tr>
						<td style="text-align: center; font-size: 18px;"><b>{{$dokter[0]->name}}</b></td>
					</tr>
					<tr>
						<td style="text-align: center;">{{$dokter[0]->lulusan}}, {{date('Y', strtotime($dokter[0]->tahunLulus))}}</td>
					</tr>
					<tr>
						<td style="text-align: center; font-size: 16px;">{{\DB::table('cities')->where('city_id', $dokter[0]->city)->value('title')}}, {{\DB::table('provinces')->where('province_id', $dokter[0]->province)->value('title')}}</td>
					</tr>
				</table>
			</center>
		</div>
	</div></div>
	
	@foreach ($artikel as $item)
		
	{{-- @dd($item) --}}
	<div class="cont">
		<br><h3><b>{{$item->judul_artikel}}</b></h3>
		<p>{{$item->isi_artikel}}</p>
		<span class="time-right">{{$item->created_at}}</span>
	</div>
	@endforeach
<br><br>
@endsection