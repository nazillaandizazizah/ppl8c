@extends('dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Konsultasi</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <button class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'">Tambah Pertanyaan</button>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Nama Peternak</th>
                            <th>Pertanyaan</th>
                            <th>Tgl pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Nama Dokter</th>
                            <th>Tgl Jawaban</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        {{-- @dd($item) --}}
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{\DB::table('users')->where('id', $item->peternak_id)->value('name')}}</td>
                            <td>{{$item->pertanyaan}}</td>
                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>{{$item->jawaban}}</td>
                            <td>
                                @if ($item->dokter_id != 0)
                                {{\DB::table('users')->where('id', $item->dokter_id)->value('name')}}
                                @else
                                semua
                                @endif
                            </td>
                            <td>{{$item->tanggal_jawaban}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

@php
$data = \DB::table('role_user')->where('role_id', '2')->get()->all();
@endphp


<div id="id01" class="modal">
    <form class="modal-content animate m-5" action="{{route('question.store')}}" method="POST">
        @csrf
        <div class="konten">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Pertanyaan</label>
                <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Dokter</label>
                <select class="form-control" name="dokter" id="dokter">
                    <option value="0">Semua Dokter</option>
                    @foreach ($data as $item)
                    @php
                    $role = \DB::table('users')->where('id', $item->user_id)->get()->all();
                    @endphp
                    @foreach ($role as $dokter)
                    <option value="{{$dokter->id}}">{{$dokter->name}}</option>
                    @endforeach
                    @endforeach
                </select>
            </div>
            <center><br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="button">Batal</button>
            </center>
        </div>
    </form>
    
</div>
@endsection