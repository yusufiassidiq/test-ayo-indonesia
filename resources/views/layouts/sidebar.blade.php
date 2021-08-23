<!-- Main Sidebar Container -->
<aside id="tes" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div style="text-align:center">
    <a href="" class="brand-link">
      <img src="AdminLTE-3.0.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8;">
      <h4 style="text-align:justify"class="brand-text font-weight-light" >Ayo Indonesia</h4>
    </a>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="AdminLTE-3.0.0/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-header">Daftar Menu</li>
          
          <li class="nav-item has-treeview">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                  <p>Grafik Tangkapan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-trophy nav-icon"></i>
                  <p>Nelayan Terbaik</p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-ship nav-icon"></i>
              <p>
                Tambah Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addTimPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Tambah Tim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addPemainPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Tambah Pemain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addJadwalPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Tambah Jadwal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addHasilPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Tambah Hasil Pertandingan</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Nelayan</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Tambah Data</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{route('getListTimPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Tim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('getListPemainPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Pemain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('getListJadwalPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Jadwal</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>