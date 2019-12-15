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

                        {{-- @dd($data) --}}
                        @foreach ($data as $index => $item)
                        
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{\DB::table('users')->where('id', $item->peternak_id)->value('name')}}</td>
                            <td>{{$item->pertanyaan}}</td>
                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                
                                <button type="button" data-peternak="{{\DB::table('users')->where('id', $item->peternak_id)->value('name')}}" data-pertanyaan="{{$item->pertanyaan}}" data-id="{{$item->id}}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#jawabModal">
                                    Jawab Pertanyaan
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
<div class="modal fade" id="jawabModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jawab Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="jawaban" action="{{url('dokter/jawab')}}">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Peternak</label>
                        <input disabled type="text" class="form-control" id="peternak">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Pertanyaan</label>
                        <textarea disabled class="form-control" id="pertanyaan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Jawab</label>
                        <textarea class="form-control" id="jawab" name="jawab" rows="3"></textarea>
                        {{-- @error('jawab') <div class="invalid-feedback">{{$message}}</div> @enderror --}}
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

@endsection

@section('footer-content')
<script>
    $(document).ready(function(){
        $('#jawabModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var id = button.data('id')
            var pertanyaan = button.data('pertanyaan')
            var peternak = button.data('peternak')
            
            var modal = $(this)
            modal.find('.modal-body #peternak').val(peternak)
            modal.find('.modal-body #pertanyaan').val(pertanyaan)
            modal.find('.modal-body #id').val(id)
        });

        var validator = $('#jawaban').validate({
            rules: {
                jawab: {
                    required:true,
                    minlength:5,
                },
                
                
            }
        });
    });
</script>
@stop