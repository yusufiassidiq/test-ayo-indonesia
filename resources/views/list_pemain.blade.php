@extends('layouts.template')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Data Pemain</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Pemain</a></li>
              <li class="breadcrumb-item active">List Data Pemain</li>
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
                      <th>Nama</th>
                      <th>Tinggi (Cm)</th>
                      <th>Berat (Kg)</th>
                      <th>Posisi</th>
                      <th>Nomor Punggung</th>
                      <th>Tim</th>
                      <th>Action</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0?>
                        @foreach ($pemains as $pemain)
                    <?php $i++?>
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$pemain->nama}}</td>
                      <td>{{$pemain->tinggi}}</td>
                      <td>{{$pemain->berat}}</td>
                      <td>{{$pemain->posisi}}</td>
                      <td>{{$pemain->nomor_punggung}}</td>
                      <td>{{$pemain->tim}}</td>
                      <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#editpemain" data-pemain_id="{{$pemain->id}}" data-nama="{{$pemain->nama}}" data-tinggi="{{$pemain->tinggi}}" data-berat="{{$pemain->berat}}" data-posisi="{{$pemain->posisi}}" data-nomor_punggung="{{$pemain->nomor_punggung}}" data-tim="{{$pemain->tim}}">
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
    <div class="modal fade" id="editpemain">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Pemain</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" name="editvisit" action="{{route('updatePemain')}}">
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
                            <select name="posisi" id="posisi" class="form-control center" > 
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
                            <select name="tim_id" id="tim_id" class="form-control center" required > 
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
        $('#editpemain').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var pemain_id = button.data('pemain_id')
        var nama = button.data('nama')
        var tinggi = button.data('tinggi')
        var berat = button.data('berat')
        var posisi = button.data('posisi')
        var nomor_punggung = button.data('nomor_punggung')
        var tim = button.data('tim')

        var modal = $(this)
        modal.find('.modal-body #id').val(pemain_id);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #tinggi').val(tinggi)
        modal.find('.modal-body #berat').val(berat);
        if(posisi != ''){
          $('select#posisi option:contains('+posisi+')').prop('selected',true);
        }else{
          $('select#posisi').val('');
        }
        modal.find('.modal-body #nomor_punggung').val(nomor_punggung);
        $('select#tim_id option:contains('+tim+')').prop('selected',true);
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