@extends('layouts.template')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Tambah Jadwal Pertandingan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tambah Data</a></li>
              <li class="breadcrumb-item active">Tambah Jadwal Pertandingan</li>
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
                    <div class="card-header">{{ __('Form Tambah Jadwal Pertandingan') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storeJadwal') }}">
                            @csrf

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
                            <!-- <span  class="clear far fa-times-circle"></span> -->

                            <div class="form-group row">
                                <div class="col-md-4 offset-md-4">
                                    <button id="cleartim" type="button" class="btn btn-danger">
                                        {{ __('Reset Tim') }}
                                    </button>
                                </div>
                            </div>
<hr>
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
    $("#cleartim").click(function(){
        $("#home_id").val('');
        $("#away_id").val('');
        $('option').prop('disabled', false);
        $('select').each(function(event){
            var prevValue = $(this).data('previous');
            $('select').not(this).find('option[value="'+prevValue+'"]').show();    
            var value = $(this).val();
            $(this).data('previous',value); $('select').find('option[value="'+value+'"]').show();
        });
    
    });
    // $('select').on('change', function() {
    //     $('option').prop('disabled', false);
    //     $('select').each(function() {
    //         var val = this.value;
    //         $('select').not(this).find('option').filter(function() {
    //         return this.value === val;
    //         }).prop('disabled', true);
    //     });
    // }).change();
    $(document).ready(function(){
        $('select').on('change', function(event ) {
        var prevValue = $(this).data('previous');
        $('select').not(this).find('option[value="'+prevValue+'"]').show();    
        var value = $(this).val();
        $(this).data('previous',value); $('select').not(this).find('option[value="'+value+'"]').hide();
        });
    });
    window.setTimeout(function() {
        $(".alert").fadeTo(200, 0).slideUp(200, function(){
            $(this).remove(); 
        });
    }, 3000);
</script>
@endsection