<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  <script>
        $(window).load(function() {
          // Animate loader off screen
          $(".se-pre-con").fadeOut("slow");;
        });
  </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
  
  <link href={{ url('img/logo_cut.png') }} rel="icon">

  <!-- Custom fonts for this template-->
  <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  <!-- Custom styles for this template-->
<link href="{{ url('css/admin-style.css') }}" rel="stylesheet">
  @yield('css')

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>

<body id="page-top">
  <div class="se-pre-con"></div>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon">
          <!-- <img src="{{ url('img/logo_ri.png') }}" alt=""> -->
          LMS
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      @if(\Auth::user()->status_id == 1)
      <li class="{{Request::is('training-saya') ? 'active' : ''}} nav-item" >
        <a class="nav-link" href="{{ route('trainingsaya') }}">
          <i class="fas fa-fw fa-home"></i>
          <span>Kelas Saya</span></a>
      </li>

      <li class="{{Request::is('ticket') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('ticket') }}">
          <i class="fas fa-fw fa-paper-plane"></i>
          <span>Tiket</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="{{Request::is('home') ? 'active' : ''}} nav-item" >
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-info"></i>
          <span>Bantuan</span></a>
      </li>
      @elseif(\Auth::user()->status_id == 2)
      <!-- Nav Item - Dashboard -->
      <li class="{{Request::is('training-saya') ? 'active' : ''}} nav-item" >
        <a class="nav-link" href="{{ route('trainingsaya') }}">
          <i class="fas fa-fw fa-home"></i>
          <span>Kelas Saya</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li class="{{Request::is('modules') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('modules') }}">
          <i class="fas fa-fw fa-book"></i>
          <span>Modul</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li class="{{Request::is('list-company') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('list-company') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Kelas</span></a>
      </li>

      {{--<li class="{{Request::is('create-company') ? 'active' : ''}} nav-item"  >
        <a class="nav-link" href="#" data-toggle="collapse" 
            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Training</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('create-company') }}" style="color: white;">Buat Training</a>
            <a class="collapse-item" href="{{ route('list-company') }}" style="color: white;">Daftar Training</a>
            <a class="collapse-item" href="{{ route('list-user-company') }}" style="color: white;">Daftar Anggota</a>
            <a class="collapse-item" href="{{ route('join-company') }}" style="color: white;">Ikut Training</a>
          </div>
        </div>
      </li>--}}

      <li class="{{Request::is('ticket') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('ticket') }}">
          <i class="fas fa-fw fa-paper-plane"></i>
          <span>Tiket</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li class="{{Request::is('home') ? 'active' : ''}} nav-item" >
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-info"></i>
          <span>Bantuan</span></a>
      </li>
      
      {{--<li class="{{Request::is('petunjuk') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('petunjuk') }}">
          <i class="fas fa-fw fa-info"></i>
          <span>Petunjuk</span></a>
      </li>--}}

      @else
      {{-- ISI MENU ADMIN DI SINI --}}

      <!-- Nav Item - Dashboard -->
      <li class="{{Request::is('home') ? 'active' : ''}} nav-item" >
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="{{Request::is('admin/userlist') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('userlist') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>Daftar Pengguna</span></a>
      </li>

      <li class="{{Request::is('admin/companylist') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('companylist') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Daftar Kelas</span></a>
      </li>

      <li class="{{Request::is('admin/participantlist') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('participantlist') }}">
          <i class="fas fa-fw fa-book"></i>
          <span>Daftar Pembelajar Modul</span></a>
      </li>
      
      <li class="{{Request::is('admin/payment-validation') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('payment-validation') }}">
          <i class="fas fa-fw fa-check"></i>
          <span>Validasi Pembayaran</span></a>
      </li>

      <li class="{{Request::is('admin/sertifikasi') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('getAdminSertifikasi') }}">
          <i class="fas fa-fw fa-scroll"></i>
          <span>Sertifikasi</span></a>
      </li>

      {{-- <li class="{{Request::is('admin/grafik-nilai') ? 'active' : ''}} nav-item">
        <a class="nav-link" href="{{ route('getAdminGrafikNilai') }}">
          <i class="fas fa-chart-area"></i>
          <span>Nilai</span></a>
      </li> --}}
      @endif

      <!-- Divider -->
      <hr class="sidebar-divider">

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <!---<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!-- <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a> -->
              <!-- Dropdown - Messages -->
              <!--<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li> -->

            <!-- Nav Item - Messages -->
            <!--<li class="nav-item promo">
              <strong><a class="nav-link" href="#" role="button">
                Promo Terbaru
              </a></strong>
            </li> -->

            <!-- Nav Item - Alerts -->
            <!--<li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                 <!--<span class="badge badge-danger badge-counter">3+</span>
              </a> -->
              <!--
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div> -->
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
              <img class="img-profile rounded-circle" src="{{ url('img/user.png') }}">
              </a>
              <!-- Dropdown - User Information -->
              <ul class="dropdown-menu">
                <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" style="text-align: center; text-decoration: none; color: black; margin-left: 50px; font-size: 12pt;">
                    Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;LMS 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  {{-- <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script> --}}
  {{-- <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

  <!-- Core plugin JavaScript-->
  {{-- <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  {{-- <script src="{{ url('vendor/chart.js/Chart.min.js') }}"></script> --}}

  <!-- Page level custom scripts -->
  {{-- <script src="{{ url('js/demo/chart-area-demo.js') }}"></script> --}}
  {{-- <script src="{{ url('js/demo/chart-pie-demo.js') }}"></script> --}}
  <script src="{{ url('js/autoNumeric.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>
  <script type="text/javascript">
  var APP_URL = {!! json_encode(url('/')) !!}
  </script>
  @include('sweetalert::alert')

  @yield('javascript')
  @yield('chart')
</body>

</html>


