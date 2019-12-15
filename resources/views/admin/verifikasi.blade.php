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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{\DB::table('users')->where('id', $item->peternak_id)->value('name')}}</td>
                            <td>{{$item->pertanyaan}}</td>
                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" data-id="{{$item->id}}" class="btn btn-primary" data-toggle="modal" data-target="#verifikasiModal">
                                    Verifikasi
                                </button>
                                <button type="button" data-id="{{$item->id}}" class="btn btn-danger" data-toggle="modal" data-target="#batalModal">
                                    Batal
                                </button>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/getVerifikasi')}}">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    Apakah anda yakin memverifikasi pertanyaan ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="batalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan Alasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/getBatal')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alasan</label>
                        <input type="text" name="alasan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted">Alasan kenapa anda membatalkan pertanyaan ini</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('footer-content')
<script>
    $(document).ready(function(){
        $('#verifikasiModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var id = button.data('id')
            
            var modal = $(this)
            modal.find('.modal-body #id').val(id)
        });

        $('#batalModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var id = button.data('id')
            
            var modal = $(this)
            modal.find('.modal-body #id').val(id)
        });
    });
</script>
@stop