@extends('dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Nama Peternak</th>
                            <th>Pertanyaan</th>
                            <th>Tgl pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Tgl Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{\DB::table('users')->where('id', $item->peternak_id)->value('name')}}</td>
                            <td>{{$item->pertanyaan}}</td>
                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>{{$item->jawaban}}</td>
                            <td>{{date('d-m-Y', strtotime($item->tanggal_jawaban))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>


@endsection
