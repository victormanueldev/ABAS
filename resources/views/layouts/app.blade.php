<!--
*
*  ABAS Sanicontol
*  version 1.0
*
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ABAS | Sanicontrol S.A.S</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/clockpicker/clockpicker.css')}}" rel="stylesheet">
    <!-- Gritter -->
    <link href="{{asset('js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">
    <!-- Custom page css -->
    @yield('custom-css')
    <!-- Basic CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ])!!};
    </script>
</head>

<body class="md-skin" id="body-tag">
    <div id="wrapper" style="background-color: #5cae27;">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle img-responsive" src="{{ Storage::url(Auth::user()->foto) }}" style="width: 50px;"/>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->nombres}}</strong>
                             </span> <span class="text-muted text-xs block">{{ Auth::user()->cargo->descripcion}} <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Perfil</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            ABAS
                        </div>
                    </li>
                    <li id="m-inicio" >
                        <a href="/home" style="background-color: #5cae27;color: white;" id="a-inicio"><i class="fa fa-th-large"></i> <span class="nav-label">Inicio</span></a>
                    </li>

                    @if(Auth::user()->area_id == '1')

                        <li id="m-clientes">
                            <a href="#" style="background-color: #5cae27;color: white;" id="a-clientes"><i class="fa fa-user-plus"></i> <span class="nav-label">Clientes </span></a>
                            <ul class="nav nav-second-level collapse" id="ml2-clientes">
                                <li id="ml2-crearEmpresa"><a href="{{route('clientes.create')}}" style="color: white;">Crear Cliente</a></li>
                                <li id="ml2-verClientes"><a href="{{route('clientes.index')}}" style="color: white;">Ver Clientes</a></li>
                            </ul>
                        </li>
                        <li id="m-cronograma">
                            <a href="{{route('eventos')}}" style="background-color: #5cae27;color: white;" id="a-cronograma"><i class="fa fa-calendar"></i> <span class="nav-label">Calendario</span></a>
                        </li>
                        <li id="m-documentacion">
                            <a href="{{ url('/documentacion') }}" style="background-color: #5cae27;color: white;" id="a-documentacion"><i class="fa fa-list-alt"></i> <span class="nav-label">Documentación</span></a>
                            
                            <ul class="nav nav-second-level collapse" id="ml2-documentacion">
                                
                                <li id="ml2-solicitud-programacion" style="margin-bottom: 10px;"><a href="{{ url('solicitud') }}" style="color: white;"><i class="fa fa-list-alt"></i><span class="nav-label">Solicitud de Programación</span></a></li>
                                
                                <li id="ml2-cotizacion"><a href="{{route('home')}}" style="color: white;"><i class="fa fa-list-alt"></i><span class="nav-label">Cotización</span></a></li>
                            </ul>
                        </li>

                    @elseif(Auth::user()->area_id == '3')

                        <li id="m-cronograma">
                            <a href="{{route('servicios.create')}}" style="background-color: #5cae27;color: white;" id="a-cronograma"><i class="fa fa-calendar"></i> <span class="nav-label">Cronograma</span></a>
                        </li>
                        
                    @else

                        <li id="m-inicio" >
                            <a href="/home" style="background-color: #5cae27;color: white;" id="a-inicio"><i class="fa fa-th-large"></i> <span class="nav-label">Contabilidad</span></a>
                        </li>


                    @endif

                    <li id="m-novedades">
                            <a href="{{route('novedades.show')}}" style="background-color: #5cae27;color: white;" id="a-novedades"><i class="fa fa-bullhorn"></i> <span class="nav-label">Novedades</span></a>
                    </li>
                    
                        
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#" style="background-color: #5CAE27;border-color: #5CAE27;"><i class="fa fa-bars"></i> </a>
                            {{--  <form role="search" class="navbar-form-custom" action="search_results.html">
                                <div class="form-group">
                                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                                </div>
                            </form>  --}}
                        </div>
                        <ul class="nav navbar-top-links navbar-right" id="notificacion">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Bienvenido a ABAS</span>
                            </li>

                            <notificaciones></notificaciones>
                            
                            <li>
                                <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            @yield('content');
            <div class="footer">
                    <div>
                        <strong>Copyright</strong> Sanicontrol S.A. &copy; 2018
                    </div>
                </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    
    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{asset('js/plugins/toastr/toastr.min.js')}}"></script>

    <!-- Clock picker -->
    <script src="{{asset('js/plugins/clockpicker/clockpicker.js')}}"></script>

    <!-- Data picker -->
   <script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>



   @yield('ini-scripts');
    <script>
            $(document).ready(function(){
    
                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true,
                    format: "yyyy-mm-dd"
                });

                $('.clockpicker').clockpicker();
            }); 
    
    </script>
    <script>
        $(document).ready(function() {

            $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 48], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#5CAE27',
                fillColor: "transparent"
            });

        });
    </script>
</body>
</html>
