<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="/assets/img/favicon.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>
        Կառավարման վահանակ
      </title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
      <!-- CSS Files -->
      <link href="/assets/css/material-dashboard.css?v=2.0.2" rel="stylesheet" />
      <link href="/assets/css/jquery-ui.css" rel="stylesheet">
      
      {{-- froala --}}
      <link href="/assets/froala/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="/assets/froala/js/froala_editor.pkgd.min.js"></script>
   
    </head>
    
    <body class="">
      <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white">
          <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    
            Tip 2: you can also add an image using data-image tag
        -->
          <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
              PS
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
              Pixel Store
            </a>
          </div>
          <div class="sidebar-wrapper">
            <ul class="nav">
              <li class="nav-item @if(Request::segment(2) == 'home') active @endif ">
                <a class="nav-link" href="{{ route('admin.home') }}">
                  <i class="material-icons">dashboard</i>
                  <p>Կառավարման վահանակ</p>
                </a>
              </li>
              <li class="nav-item @if(Request::segment(2) == 'homepage') active @endif ">
                <a class="nav-link" href="{{ route('admin.homepage.index') }}">
                  <i class="material-icons">home</i>
                  <p>Գլխավոր էջ</p>
                </a>
              </li>
              <li class="nav-item @if(Request::segment(2) == 'brand') active @endif ">
                <a class="nav-link" href="{{ route('admin.brand.index') }}">
                  <i class="material-icons">branding_watermark</i>
                  <p>Կատեգորիաներ</p>
                </a>
              </li>
              <li class="nav-item @if(Request::segment(2) == 'product' || Request::segment(2) == 'product-other') active @endif ">
                <a class="nav-link" href="{{ route('admin.product.index') }}">
                  <i class="material-icons">devices_other</i>
                  <p>Ապրանքներ</p>
                </a>
              </li>
              <li class="nav-item @if(Request::segment(2) == 'order') active @endif ">
                <a class="nav-link" href="{{ route('admin.order.index') }}">
                  <i class="material-icons">shopping_cart</i>
                  <p>Պատվերներ</p>
                </a>
              </li>
              <li class="nav-item @if(Request::segment(2) == 'info') active @endif ">
                <a class="nav-link" href="{{ route('admin.info.index') }}">
                  <i class="material-icons">info</i>
                  <p>Ընդհանուր <br> տեղեկատվություն</p>
                </a>
              </li>
              <li class="nav-item @if(Request::segment(2) == 'privacy-policy') active @endif ">
                <a class="nav-link" href="{{ route('admin.privacy-policy.askLanguages') }}">
                  <i class="material-icons">policy</i>
                  <p>Օգտագործման պայմաններ</p>
                </a>
              </li>

              <li class="nav-item @if(Request::segment(2) == 'password') active @endif ">
                <a class="nav-link" href="{{ route('admin.password.change') }}">
                  <i class="material-icons">settings_applications</i>
                  <p>Փոխել գաղտնաբառը</p>
                </a>
              </li>


              {{-- logout --}}
              <li class="nav-item  ">
                <a class="nav-link" href="/admin/logout"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  <i class="material-icons">logout</i>
                  <p>Դուրս գալ</p>
                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </a>
              </li>

          
              <!-- your sidebar here -->
            </ul>
          </div>
        </div>
        <div class="main-panel">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
              <div class="navbar-wrapper">
                <a class="navbar-brand" href="#pablo">Կառավարման վահանակ</a>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                      <i class="material-icons">notifications</i> Notifications
                    </a>
                  </li> --}}
                  <!-- your navbar here -->
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
          <div class="content">
            <div class="container-fluid">
              @yield('content')
            </div>
          </div>
          
        </div>
      </div>
      <!--   Core JS Files   -->
      <script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
      <script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
      <script src="/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
      <!-- Plugin for the Perfect Scrollbar -->
      <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
      <!-- Plugin for the momentJs  -->
      <script src="/assets/js/plugins/moment.min.js"></script>
      <!--  Plugin for Sweet Alert -->
      <script src="/assets/js/plugins/sweetalert2.js"></script>
      <!-- Forms Validations Plugin -->
      <script src="/assets/js/plugins/jquery.validate.min.js"></script>
      <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
      <script src="/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
      <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
      <script src="/assets/js/plugins/bootstrap-selectpicker.js"></script>
      <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
      <script src="/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
      <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
      <script src="/assets/js/plugins/jquery.datatables.min.js"></script>
      <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
      <script src="/assets/js/plugins/bootstrap-tagsinput.js"></script>
      <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
      <script src="/assets/js/plugins/jasny-bootstrap.min.js"></script>
      <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
      <script src="/assets/js/plugins/fullcalendar.min.js"></script>
      <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
      <script src="/assets/js/plugins/jquery-jvectormap.js"></script>
      <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
      <script src="/assets/js/plugins/nouislider.min.js"></script>
      <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
      <!-- Library for adding dinamically elements -->
      <script src="/assets/js/plugins/arrive.min.js"></script>
      <!-- Chartist JS -->
      <script src="/assets/js/plugins/chartist.min.js"></script>
      <!--  Notifications Plugin    -->
      <script src="/assets/js/plugins/bootstrap-notify.js"></script>
      <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="/assets/js/material-dashboard.min.js?v=2.0.2" type="text/javascript"></script>
      {{-- jquery ui for sortable --}}
      <script src="/assets/js/jquery-ui.js" type="text/javascript"></script>
      
      <script>
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          </script>
      @yield('scripts')
    </body>
    
</html>
    