

@extends('dashboard')

@section('content')
@if (Auth::user()->hasAnyRole('admin'))
<br><br><br>

<!-- @php
$data = \DB::table('artikels')->where('status', 'tidak')->get()->all();
// dd($data);
@endphp

@foreach ($data as $item)


<div class="cont">
    <img align="center" src="{{asset('storage/'. \DB::table('users')->where('id', $item->dokter_id)->value('avatar'))}}" style="display: block; margin-right: auto;margin-left: auto; padding-right: 5px;">
    <h1 style="font-size: 20px;">{{\DB::table('users')->where('id', $item->dokter_id)->value('name')}}</h1>
    <h5>Berbagi ke : Semua</h5>
    <h5>{{$item->isi_artikel}}</h5><br>
    <center>
        <button class="button" onclick="document.getElementById('id01').style.display='block'">Setujui</button>
        <button class="button" onclick="document.getElementById('id02').style.display='block'">Tidak Setujui</button>
    </center>
</div>

@endforeach

<br><br>

<div id="id02" class="modal">
    <form action="{{url('verifikasi.tidak')}}" method="POST"  class="modal-content animate">
        @csrf
        <div class="konten">
            <center>
                <h2>Silahkan masukkan alasan tidak menyetujui verifikasi ini</h2><br>
                <input type="text" placeholder="Alasan" name="alasan" required><br><br><br>
                <button type="submit" class="button">Selesai</button>
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="button">Batal</button>
            </center>
        </div>
    </form>
</div>

<div id="id01" class="modal">
    <form class="modal-content animate" action="{{url('verifikasi.ya')}}" method="POST">
        @csrf
        <div class="konten">
            <center>
                <h2>Apakah Anda yakin ingin menyetujui verifikasi ini?</h2><br>
                <button type="submit" class="button">Iya</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="button">Batal</button>
            </center>
        </div>
    </form>
</div> -->

<!-- <br><br><br><br><br><br><br>
<center>
    <img src="https://funkyimg.com/i/2Z7LA.png" style="width: 100px">
    <img src="https://funkyimg.com/i/2Z7LA.png" style="width: 40px">
    <img src="https://funkyimg.com/i/2Z7LA.png" style="width: 40px">
    <img src="https://funkyimg.com/i/2Z7LA.png" style="width: 40px">
    <img src="https://funkyimg.com/i/2Z7LA.png" style="width: 40px">
    <img src="https://funkyimg.com/i/2Z7LA.png" style="width: 40px">
<br><br><h3>Selamat Datang :)</h3>
</center> -->
<br><br><br>
<center>
    <img src="https://funkyimg.com/i/2Z7Pd.png" style="width: 500px">
<br><h3>Selamat Datang :)</h3>
</center>



@elseif(Auth::user()->hasAnyRole('peternak'))
<h1 style="text-align: center;">Artikel</h1><br>
@php
$data = \DB::table('artikels')->get()->all();
@endphp
@foreach ($data as $item)

<div class="cont">
    <img src="{{asset('storage/' . \DB::table('users')->where('id', $item->dokter_id)->value('avatar'))}}" alt="Avatar" style="width:100%;"><br>
    <h3>{{\DB::table('users')->where('id', $item->dokter_id)->value('name')}}</h3>
    <br><h3><b>{{$item->judul_artikel}}</b></h3>
    <p>{{$item->isi_artikel}}</p>
    <span class="time-right">{{$item->created_at}}</span>
</div>

@endforeach
<br><br>

@elseif(Auth::user()->hasAnyRole('dokter'))
<!-- <br><br><br>

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
    
</div>

<div id="News" class="tabcontent">

    @php
        $data = \DB::table('artikels')->get()->all();
    @endphp

    @foreach ($data as $item)
    
    <div class="cont">
        <img src="{{asset('storage/'. Auth::user()->avatar)}}" class="mb-3" alt="Avatar" style="width:100%;">
        <h3>{{\DB::table('users')->where('id', $item->dokter_id)->value('name')}}</h3>
        <br><h3><b>{{$item->judul_artikel}}</b></h3>
        <p>{{$item->isi_artikel}}</p>
        <span class="time-right">{{$item->created_at}}</span>
    </div>
    @endforeach
</div> -->
<br><br><br><br><br>
<center>
    <img src="https://funkyimg.com/i/2Z7N3.png" style="width: 500px">
<br><h3>Selamat Datang di</h3>
<h1>Website Tersekuy</h1>
</center>


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





@endif
@endsection