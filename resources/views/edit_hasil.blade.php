@extends('layouts.template')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Lihat Hasil Pertandingan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Lihat Data</a></li>
              <li class="breadcrumb-item active">Hasil Pertandingan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row-md-7 justify-content-center">
            <div class="col-md-7 span6" style="float: none; margin: 0 auto;">

            @if ($message = Session::get('success'))
            <div id="messageAlert" class="alert alert-success alert-dismissible">
              <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
              {{ $message }}
            </div>
            @endif

            @if (count($errors) > 0)
            <div id="messageAlert" class="alert alert-danger alert-dismissible">
              <h4><i class="icon fa fa-close"></i> Gagal!</h4>
              @foreach ($errors->all() as $error)
              <label class="failed form-control alert alert-danger" >
                <li>{{ $error }}</li>
              </label>
              @endforeach
            </div>
            @endif
                <div class="card">
                    <div class="card-header">Hasil Pertandingan</div>
                    <div class="card-body">
                        <p>Pertandingan: {{$hasil->homeTim}} vs {{$hasil->awayTim}}</p>
                        <p>Tanggal: {{$hasil->tanggal}}</p>
                        <p>Jam: {{$hasil->waktu}}</p>
                        <hr>
                        <p>Skor: {{$hasil->homeTim}} {{count($skorHome)}} vs {{count($skorAway)}} {{$hasil->awayTim}}</p>
                    </div>
                </div>

                <div class="card">
                    <!-- <div class="card-header">{{ __('Tambah Nelayan') }}</div> -->
                    <div class="card-header">{{ __('Tambah Pencetak Gol') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storePencetakGol') }}" >
                            @csrf

                            <div class="form-group row">
                                <label for="waktu_gol" class="normal col-md-4 col-form-label text-md-right">{{ __('Waktu') }}</label>

                                <div class="col-md-6">
                                    <input id="waktu_gol" type="time" class="form-control @error('waktu_gol') is-invalid @enderror" name="waktu_gol" value="{{ old('waktu_gol') }}" autocomplete="waktu_gol" autofocus>

                                    @error('waktu_gol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="tim" class="normal col-md-4 col-form-label text-md-right">{{ __('Tim') }}</label>

                                <div class="col-md-6">
                                    <select name="tim" id="" class="form-control center" required > 
                                        <option selected="selected" hidden value="" disabled selected >Pilih Tim</option> 
                                        <option value={{$hasil->homeTimId}}>{{$hasil->homeTim}}</option>
                                        <option value={{$hasil->awayTimId}}>{{$hasil->awayTim}}</option>
                                    </select> 

                                    @error('tim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="pencetak_gol_id" class="normal col-md-4 col-form-label text-md-right">{{ __('Pencetak Gol') }}</label>
                                <div class="col-md-6">
                                    <select name="pencetak_gol_id" id="" class="form-control center" required > 
                                        <option selected="selected" hidden value="" disabled selected >Pilih Tim</option> 
                                        @foreach($pemainHome as $ph)
                                        <option value={{$ph->id}}>{{$ph->nama}} || {{$hasil->homeTim}}</option>
                                        @endforeach
                                        @foreach($pemainAway as $pa)
                                        <option value={{$pa->id}}>{{$pa->nama}} || {{$hasil->awayTim}}</option>
                                        @endforeach
                                    </select> 
                                    @error('pencetak_gol_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row" hidden>
                                <label for="hasil_id" class="normal col-md-4 col-form-label text-md-right">{{ __('id hasil') }}</label>

                                <div class="col-md-6">
                                    <input id="hasil_id" value="{{$hasil->id}}" type="text" class="form-control @error('hasil_id') is-invalid @enderror" name="hasil_id" value="{{ old('hasil_id') }}" required autocomplete="hasil_id" autofocus>

                                    @error('hasil_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Tambah') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <!-- <div class="card-header">{{ __('Tambah Nelayan') }}</div> -->
                    <div class="card-header">{{ __('Daftar Pencetak Gol') }}</div>
                    <div class="card-body">
                    <table id="datatable2" class="table table-bordered table-striped">
                        <thead>
                        <div style="padding-bottom:20px; position:relative;text-align:left" class="">
                        
                        </div>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemain</th>
                            <th>Nama Tim</th>
                            <th>Waktu Gol</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0?>
                            @foreach ($hasil->pencetak_gol as $pg)
                        <?php $i++?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$pg->namaTim}}</td>
                            <td>{{$pg->namaPemain}}</td>
                            <td>{{$pg->waktu_gol}}</td>
                            <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#editpencetakgol" data-hasil_id="{{$pg->hasil_id}}" data-pencetak_gol_id="{{$pg->id}}" data-waktu_gol="{{$pg->waktu_gol}}" data-pencetak_gol="{{$pg->namaPemain}} || {{$pg->namaTim}}">
                                    <i class="fa fa-edit"></i> 
                                    Edit Pencetak Gol
                                </a>

                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                        
                        </tr>
                        </tfoot>
                        
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.content-wrapper -->
</div>
<div class="modal fade" id="editpencetakgol">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Pencetak Gol</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" method="post" name="editpencetakgol" action="{{route('updatePencetakGol')}}">
            <div class="modal-body">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <input type="text" name="id" id="id" value="" hidden> 
                <input type="text" name="hasil_id" id="hasil_id" value="" hidden> 
                
                <div class="form-group row">
                    <label for="waktu_gol" class="normal col-md-4 col-form-label text-md-right">{{ __('Waktu') }}</label>

                    <div class="col-md-6">
                        <input id="waktu_gol" type="time" class="form-control @error('waktu_gol') is-invalid @enderror" name="waktu_gol" value="{{ old('waktu_gol') }}" autocomplete="waktu_gol" autofocus>

                        @error('waktu_gol')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pencetak_gol_id" class="normal col-md-4 col-form-label text-md-right">{{ __('Pencetak Gol') }}</label>
                    <div class="col-md-6">
                        <select name="pencetak_gol_id" id="pencetak_gol_id" class="form-control center" required > 
                            <option selected="selected" hidden value="" disabled selected >Pilih Tim</option> 
                            @foreach($pemainHome as $ph)
                            <option value={{$ph->id}}>{{$ph->nama}} || {{$hasil->homeTim}}</option>
                            @endforeach
                            @foreach($pemainAway as $pa)
                            <option value={{$pa->id}}>{{$pa->nama}} || {{$hasil->awayTim}}</option>
                            @endforeach
                        </select> 
                        @error('pencetak_gol_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<style>
.tes {
  padding-left: 10px;
}
</style>
<script>
    $(document).ready(function () {
        $('#editpencetakgol').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var pencetak_gol_id = button.data('pencetak_gol_id')
        var hasil_id = button.data('hasil_id')
        var waktu_gol = button.data('waktu_gol')
        var pencetak_gol = button.data('pencetak_gol')

        var modal = $(this)
        modal.find('.modal-body #id').val(pencetak_gol_id);
        modal.find('.modal-body #hasil_id').val(hasil_id);
        modal.find('.modal-body #waktu_gol').val(waktu_gol);
        $('select#pencetak_gol_id option:contains('+pencetak_gol+')').prop('selected',true);

        })   
    })  
  $(function () {
    $("#datatable1").DataTable();
    $('#datatable2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
  window.setTimeout(function() {
    $(".alert").fadeTo(200, 0).slideUp(200, function(){
    $(this).remove(); 
  });
}, 3000);
</script>
@endsection