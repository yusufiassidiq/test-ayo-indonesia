@extends('layouts.template')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark tes">Data </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data </a></li>
              <li class="breadcrumb-item active">List Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row-md-12 justify-content-center">
            <div class="col-md-12 span12" style="float: none; margin: 0 auto;">
            
            <div class="card card-primary">
            <div class="card-body">
                    <!-- Small Box (Stat card) -->
                    <h5 class="mb-2 ">Data Insight</h5>
                        <div class="row">
                          <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                              <div class="inner">
                                <h3> Orang</h3>

                                <p>Total Pemain</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-ship"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                <!-- More info <i class="fas fa-arrow-circle-right"></i> -->
                              </a>
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                              <div class="inner">
                                <h3> Tim</h3>

                                <p>Total Tim</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                <!-- More info <i class="fas fa-arrow-circle-right"></i> -->
                              </a>
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                              <div class="inner">
                                <h3>Pemain</h3>

                                <p>Pemain Terbaik</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-balance-scale"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                <!-- More info <i class="fas fa-arrow-circle-right"></i> -->
                              </a>
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <h3>Tim</h3>

                                <p>Tim Terbaik</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                <!-- More info <i class="fas fa-arrow-circle-right"></i> -->
                              </a>
                            </div>
                          </div>
                          <!-- ./col -->
                        </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- <div class="card card-primary">
              <div class="card-body">
                <div class="chart">
                  <canvas id="bar-chart" style="height: 400px; max-height: 400px;"></canvas>
                </div>
              </div>
            </div> -->
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Form Tambah Data</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
             
            </div>
            <!-- /.card -->
            </div>
            
        </div>
    </div>
<!-- /.content-wrapper -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>

</script>
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