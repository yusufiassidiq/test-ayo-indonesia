@extends('layouts.template')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Data Tim</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Tim</a></li>
              <li class="breadcrumb-item active">List Data Tim</li>
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
                      <th>Nama</th>
                      <th>Logo</th>
                      <th>Tahun Berdiri</th>
                      <th>Alamat</th>
                      <th>Kota</th>
                      <th>Action</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0?>
                        @foreach ($tims as $tim)
                    <?php $i++?>
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$tim->nama}}</td>
                      <td><image style="max-width:150px;max-height:auto;" src="{{url('/storage/image')}}/{{$tim->logo}}"></image></td>
                      <td>{{$tim->tahun_berdiri}}</td>
                      <td>{{$tim->alamat}}</td>
                      <td>{{$tim->kota}}</td>
                      <td>{{$tim->kota}}</td>
                      <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#edittim" data-tim_id="{{$tim->id}}" data-nama="{{$tim->nama}}" data-logo="{{$tim->logo}}" data-tahun_berdiri="{{$tim->tahun_berdiri}}" data-alamat="{{$tim->alamat}}" data-kota="{{$tim->kota}}">
                            <i class="fa fa-edit"></i> 
                            Edit
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
    <div class="modal fade" id="edittim">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tim</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" name="editvisit" action="{{route('updateTim')}}" enctype= multipart/form-data>
                <div class="modal-body">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <input type="text" name="id" id="id" value="" hidden> 
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
                        <!-- <img style="height: 250px; width: 250px;" alt="" src="" id="logo" name="logo" class="img-responsive">  -->

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
        $('#edittim').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var tim_id = button.data('tim_id')
        var nama = button.data('nama')
        var logo = button.data('logo')
        var tahun_berdiri = button.data('tahun_berdiri')
        var alamat = button.data('alamat')
        var kota = button.data('kota')

        var modal = $(this)
        modal.find('.modal-body #id').val(tim_id);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #logo').prop("src","{{url('/storage/image')}}"+'/'+logo);
        modal.find('.modal-body #tahun_berdiri').val(tahun_berdiri);
        modal.find('.modal-body #alamat').val(alamat);
        modal.find('.modal-body #kota').val(kota);

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