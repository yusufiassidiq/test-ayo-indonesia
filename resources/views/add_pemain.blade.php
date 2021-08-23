@extends('layouts.template')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Tambah Pemain</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tambah Data</a></li>
              <li class="breadcrumb-item active">Tambah Pemain</li>
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

                <div class="card">
                    <!-- <div class="card-header">{{ __('Tambah Nelayan') }}</div> -->
                    <div class="card-header">{{ __('Form Tambah Pemain') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storePemain') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nama" class="normal col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tinggi" class="normal col-md-4 col-form-label text-md-right">{{ __('Tinggi') }}</label>

                                <div class="col-md-6">
                                    <input id="tinggi" type="number" class="form-control @error('tinggi') is-invalid @enderror" name="tinggi" value="{{ old('tinggi') }}" autocomplete="tinggi" autofocus>

                                    @error('tinggi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="berat" class="normal col-md-4 col-form-label text-md-right">{{ __('Berat') }}</label>

                                <div class="col-md-6">
                                    <input id="berat" type="number" class="form-control @error('berat') is-invalid @enderror" name="berat" value="{{ old('berat') }}" autocomplete="berat" autofocus>

                                    @error('berat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="posisi" class="normal col-md-4 col-form-label text-md-right">{{ __('Posisi') }}</label>

                                <div class="col-md-6">
                                    <select name="posisi" id="" class="form-control center" > 
                                        <option selected="selected" hidden value="" disabled selected >Pilih Posisi</option> 
                                        <option value="Penyerang">Penyerang</option>
                                        <option value="Gelandang">Gelandang</option>  
                                        <option value="Bertahan">Bertahan</option>  
                                        <option value="Penjaga Gawang">Penjaga Gawang</option>  
                                    </select> 

                                    @error('posisi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nomor_punggung" class="normal col-md-4 col-form-label text-md-right">{{ __('Nomor Punggung') }}</label>

                                <div class="col-md-6">
                                    <input id="nomor_punggung" type="text" class="form-control @error('nomor_punggung') is-invalid @enderror" name="nomor_punggung" value="{{ old('nomor_punggung') }}" autocomplete="nomor_punggung" autofocus>

                                    @error('nomor_punggung')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tim_id" class="normal col-md-4 col-form-label text-md-right">{{ __('Tim') }}</label>

                                <div class="col-md-6">
                                    <select name="tim_id" id="" class="form-control center" required > 
                                        <option selected="selected" hidden value="" disabled selected >Pilih Tim</option> 
                                        @foreach($tims as $tim)
                                        <option value={{$tim->id}}>{{$tim->nama}}</option>
                                        @endforeach
                                       
                                    </select> 

                                    @error('tim_id')
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