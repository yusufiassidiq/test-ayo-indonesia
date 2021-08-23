@extends('layouts.template')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Tambah Tim</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tambah Data</a></li>
              <li class="breadcrumb-item active">Tambah Tim</li>
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
                    <div class="card-header">{{ __('Form Tambah Tim') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storeTim') }}" enctype="multipart/form-data">
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
                                <label for="logo" class="normal col-md-4 col-form-label text-md-right">{{ __('Logo Tim') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file" class="@error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}"  autocomplete="logo" autofocus>
                                    <!-- <input type="file" name="logo" placeholder="Choose file" id="logo"> -->
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tahun_berdiri" class="normal col-md-4 col-form-label text-md-right">{{ __('Tahun Berdiri') }}</label>

                                <div class="col-md-6">
                                    <input id="tahun_berdiri" type="number" class="form-control @error('tahun_berdiri') is-invalid @enderror" name="tahun_berdiri" value="{{ old('tahun_berdiri') }}" autocomplete="tahun_berdiri" autofocus>

                                    @error('tahun_berdiri')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="alamat" class="normal col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                <div class="col-md-6">
                                    <textarea id="alamat" type="number" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus></textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kota" class="normal col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>

                                <div class="col-md-6">
                                    <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" autocomplete="kota" autofocus>

                                    @error('kota')
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