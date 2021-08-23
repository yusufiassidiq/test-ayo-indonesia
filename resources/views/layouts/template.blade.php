<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AYO INDONESIA</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.0.0/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.0.0/dist/css/adminlte.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.0.0/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{url('AdminLTE-3.0.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.css')}}">
  <!-- <link rel="stylesheet" href="{{url('AdminLTE-3.0.0/plugins/select2_dari_mytosca/dist/css/select2.min.css')}}"> -->
  <!-- JavaScript -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Testing -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.0.0/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini layout-fixed ">
<div class="wrapper">

  @include('layouts.header')

  @include('layouts.sidebar')

  @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{url('AdminLTE-3.0.0/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{url('AdminLTE-3.0.0/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{url('AdminLTE-3.0.0/dist/js/adminlte.js')}}"></script>
<!-- Select2 -->
<script src="{{url('AdminLTE-3.0.0/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- <script src="{{url('AdminLTE-3.0.0/plugins/select2_dari_mytosca/dist/js/select2.full.min.js')}}"></script> -->
<!-- DataTables -->
<script src="{{url('AdminLTE-3.0.0/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('AdminLTE-3.0.0/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{url('AdminLTE-3.0.0/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{url('AdminLTE-3.0.0/dist/js/demo.js')}}"></script>
<script src="{{url('AdminLTE-3.0.0/dist/js/pages/dashboard3.js')}}"></script>
<script src="{{url('AdminLTE-3.0.0/dist/js/custom.js')}}"></script>


</body>
</html>