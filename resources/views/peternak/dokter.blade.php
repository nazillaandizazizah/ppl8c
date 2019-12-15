@extends('dashboard')

@section('content')
<div class="row">
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
			
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats" align="center">
					<img src="{{asset('storage/'. $dokter->avatar)}}" style="width: 170px; padding: 10px; border-radius: 50%;">
					<h2>{{$dokter->name}}</h2>
					<p>{{$dokter->lulusan}}, {{date('Y', strtotime($dokter->tahunLulus))}}</p>
					<p>{{\DB::table('cities')->where('city_id', $dokter->city)->value('title')}}, {{\DB::table('provinces')->where('province_id', $dokter->province)->value('title')}}</p><br>
					<a href="{{url('peternak/profildokter', $dokter->id)}}"><button class="btn btn-primary mt-3">Lihat Artikel</button></a>
				</div>
			</div>

			@endforeach
			@endforeach
			
			
		</div>
	</div>
</div>

@endsection