@extends('layouts.template')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Tambah Hasil Pertandingan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tambah Data</a></li>
              <li class="breadcrumb-item active">Tambah Hasil Pertandingan</li>
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
                    <!-- <div class="card-header">{{ __('Tambah Nelayan') }}</div> -->
                    <div class="card-header">{{ __('Form Tambah Hasil Pertandingan') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storeHasil') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="jadwal_id" class="normal col-md-4 col-form-label text-md-right">{{ __('Pilih Pertandingan') }}</label>

                                <div class="col-md-6">
                                    <select name="jadwal_id" id="jadwal_id" class="form-control center" required  > 
                                        <option selected="selected" hidden value="" disabled selected >Pilih Pertandingan</option>
                                        @foreach($jadwals as $jadwal)
                                        <option value={{$jadwal->id}}>{{$jadwal->homeTim}} vs {{$jadwal->awayTim}} || {{$jadwal->tanggal}} at {{$jadwal->waktu}}</option>
                                        @endforeach
                                    </select> 
                                    @error('jadwal_id')
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
            </div>
        </div>
    </div>
<!-- /.content-wrapper -->
</div>
<style>
.tes {
  padding-left: 10px;
}
</style>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(200, 0).slideUp(200, function(){
    $(this).remove(); 
  });
}, 3000);
</script>
@endsection