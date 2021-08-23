@extends('layouts.template')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Data Jadwal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Jadwal</a></li>
              <li class="breadcrumb-item active">List Data Jadwal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row-md-12 justify-content-center">
            @if ($message = Session::get('success'))
            <div id="messageAlert" class="alert alert-success alert-dismissible">
              <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
              {{ $message }}
            </div>
            @endif
            @if ($message = Session::get('failed'))
            <div id="messageAlert" class="alert alert-danger alert-dismissible">
              <h4><i class="icon fa fa-times"></i> Gagal!</h4>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Form Tambah Data</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              
                

                <div class="card-body">
                
                <table id="datatable2" class="table table-bordered table-striped">
                    <thead>
                    <div style="padding-bottom:20px; position:relative;text-align:left" class="">
                    
                    </div>
                    <tr>
                      <th>No</th>
                      <th>Pertandingan</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Action</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0?>
                        @foreach ($jadwals as $jadwal)
                    <?php $i++?>
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$jadwal->homeTim}} vs {{$jadwal->awayTim}}</td>
                      <td>{{$jadwal->tanggal}}</td>
                      <td>{{$jadwal->waktu}}</td>
                      <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#editjadwal" data-jadwal_id="{{$jadwal->id}}" data-tanggal="{{$jadwal->tanggal}}" data-waktu="{{$jadwal->waktu}}" data-hometim="{{$jadwal->homeTim}}" data-awaytim="{{$jadwal->awayTim}}">
                            <i class="fa fa-edit"></i> 
                            Edit Jadwal
                          </a>
                          @if($jadwal->hasil)
                          <a href="{{route('editHasil',$jadwal->hasil->id)}}" class="btn btn-secondary">Edit Hasil Pertandingan</a>
                          @else
                          <form id="tambah_hasil" method="POST" action="{{ route('storeHasil') }}" hidden>
                            @csrf
                            <input name="jadwal_id" value="{{$jadwal->id}}">
                          </form>
                          <a style="color:#ffffff;" id="button_tambah_hasil" type="submit" class="btn btn-secondary">Tambah Hasil Pertandingan</a>
                          @endif
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
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
              
            </div>
            <!-- /.card -->
            </div>
            
        </div>
    </div>
<!-- /.content-wrapper -->
</div>
    <div class="modal fade" id="editjadwal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tim</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" name="editvisit" action="{{route('updateJadwal')}}">
                <div class="modal-body">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <input type="text" name="id" id="id" value="" hidden> 
                    
                    <div class="form-group row">
                        <label for="tanggal" class="normal col-md-4 col-form-label text-md-right">{{ __('Tanggal') }}</label>

                        <div class="col-md-6">
                            <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" autocomplete="tanggal" autofocus>

                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="waktu" class="normal col-md-4 col-form-label text-md-right">{{ __('Waktu') }}</label>

                        <div class="col-md-6">
                            <input id="waktu" type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ old('waktu') }}" autocomplete="waktu" autofocus>

                            @error('waktu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="home_id" class="normal col-md-4 col-form-label text-md-right">{{ __('Tim Tuan Rumah') }}</label>

                        <div class="col-md-6">
                            <select name="home_id" id="home_id" class="form-control center" required  > 
                                <option selected="selected" hidden value="" disabled selected >Pilih Tim</option>
                                @foreach($tims as $tim)
                                <option value={{$tim->id}}>{{$tim->nama}}</option>
                                @endforeach
                            </select> 
                            @error('home_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="away_id" class="normal col-md-4 col-form-label text-md-right">{{ __('Tim Tamu') }}</label>

                        <div class="col-md-6">
                            <select name="away_id" id="away_id" class="form-control center" required > 
                                <option selected="selected" hidden value="" disabled selected >Pilih Tim</option>
                                @foreach($tims as $tim)
                                <option value={{$tim->id}}>{{$tim->nama}}</option>
                                @endforeach
                            </select> 
                            
                            @error('away_id')
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
  $(document).ready(function() {
      $("#button_tambah_hasil").click(function() {
          $("#tambah_hasil").submit();
      });
  });
  $(document).ready(function () {
      $('#editjadwal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var jadwal_id = button.data('jadwal_id')
      var tanggal = button.data('tanggal')
      var waktu = button.data('waktu')
      var homeTim = button.data('hometim')
      var awayTim = button.data('awaytim')

      var modal = $(this)
      modal.find('.modal-body #id').val(jadwal_id);
      modal.find('.modal-body #tanggal').val(tanggal);
      modal.find('.modal-body #waktu').val(waktu);
      $('select#home_id option:contains('+homeTim+')').prop('selected',true);
      $('select#away_id option:contains('+awayTim+')').prop('selected',true);

      })   
  })   
  $(document).ready(function(){
      $('select').on('change', function(event ) {
      var prevValue = $(this).data('previous');
      $('select').not(this).find('option[value="'+prevValue+'"]').show();    
      var value = $(this).val();
      $(this).data('previous',value); $('select').not(this).find('option[value="'+value+'"]').hide();
      });
  });
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
</script>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(200, 0).slideUp(200, function(){
    $(this).remove(); 
  });
}, 3000);
</script>
<style>
.b {
  position: relative;
  right: 0px;
  left: 100px;
  /* width: 100px; */
  /* height: 120px; */
  /* border: 3px solid blue; */
} 
</style>

@endsection