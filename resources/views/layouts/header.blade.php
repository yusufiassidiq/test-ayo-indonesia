<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

        <!-- User Account Menu -->
      <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="nav-link" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="AdminLTE-3.0.0/dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="AdminLTE-3.0.0/dist/img/avatar5.png" class="img-circle" alt="User Image">
                <p>{{ Auth::user()->name }}</p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer" >
                <div id="wrapper">
                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
            </ul>
        </li>

      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li> -->
      
    </ul>
  </nav>
  <!-- /.navbar -->

<style>
#wrapper{text-align:center}
</style>