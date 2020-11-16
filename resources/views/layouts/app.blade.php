<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Análisis financiero</title>

  <!-- Favicons -->
  
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/zabuto_calendar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/gritter/css/jquery.gritter.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/to-do.css') }}">
  <script src="{{ asset('lib/chart-master/Chart.js') }}"></script>
  
</head>

<body>

  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="{{route('home')}}" class="logo"><b>AN<span>F</span></b></a>
      <!--logo end-->
     
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            
            <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Cerrar sesión
          </a>
          
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          
          <h5 class="centered">{{ Auth::user()->name }}</h5>
          <li class="mt">
            <a href="{{route('home')}}">
            <i class="fa fa-th"></i>
              <span>Inicio</span>
              </a>
          </li>
          <li class="mt">
            <a href="{{route('crear_empresa')}}">
              <i class="fa fa-plus"></i>
              <span>Agregar empresa</span>
              </a>
          </li>
          <li class="mt">
            <a  href="{{route('empresas')}}">
              <i class="fa fa-building-o"></i>
              <span>Empresas</span>
              </a>
          </li>
          <li class="mt">
            <a  href="{{route('users.index')}}">
              <i class="fa fa-users"></i>
              <span>Usuarios</span>
              </a>
          </li>
          
         
          
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>


    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
          @yield('content')
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Análisis <strong>Financiero</strong>. Derechos reservados
        </p>
       
        <a href="blank.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('lib/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/jquery.sparkline.js') }}"></script>
    <!--common script for all pages-->
    <script src="{{ asset('lib/common-scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/gritter-conf.js') }}"></script>
    <!--script for this page-->
    <script src="{{ asset('lib/sparkline-chart.js') }}"></script>
    <script src="{{ asset('lib/zabuto_calendar.js') }}"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="{{ asset('lib/tasks.js') }}" type="text/javascript"></script>
    <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-daterangepicker/date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('lib/advanced-form-components.js') }}"></script>
    <script>
    jQuery(document).ready(function() {
      TaskList.initTaskWidget();
    });

    $(function() {
      $("#sortable").sortable();
      $("#sortable").disableSelection();
    });
  </script>
    @include('sweetalert::alert')

  </body>
  
  </html>
  