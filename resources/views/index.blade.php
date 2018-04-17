@extends('layouts.app')
@section('custom-css')
<link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
@endsection
@section('content')
<script>
    document.getElementById('m-inicio').setAttribute("class", "active");
    document.getElementById('a-inicio').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Página Principal</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/home">Inicio</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row m-b-lg m-t-lg">
        <div class="col-md-7">

            <div class="profile-image">
                <img src="{{ Storage::url($user->foto)}}" class="img-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            {{ $user->nombres}} {{ $user->apellidos}}
                        </h2>
                        <h4>{{ $user->cargo->descripcion}}</h4>
                        <small>
                            Esta es la página principal, en donde podrás acceder a todas las funcionalidades de ABAS, ver tu actividad reciente
                            y la de tus compañeros de trabajo.
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <small>Área de desempeño</small>
            <h2 class="no-margins">{{$user->area->descripcion}}</h2>
            <div id="sparkline1"></div> 
        </div>


    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins" id="app">
                <tareas></tareas>
            </div>
        </div>

        <div class="col-lg-5">

                <div class="social-feed-box">
                        <div class="pull-right social-action dropdown">
                            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                <i class="fa fa-gear"></i>
                            </button>
                            <ul class="dropdown-menu m-t-xs">
                                <li>
                                    <a href="">Publica</a>
                                </li>
                                <li>
                                    <a href="">Área Comercial</a>
                                </li>
                                <li>
                                    <a href="">Área Programación</a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="{{ Storage::url($user->foto)}}">
                            </a>
                            <div class="media-body">
                                <a href="#" style="color: #676a6c;">
                                   {{ $user->nombres}} {{$user->apellidos}}
                                </a>
                                <small class="text-muted"><i class="fa fa-globe"></i> Visibilidad: {{$user->area->descripcion}}</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <form action="">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Escriba aquí una novedad" rows="3"></textarea>
                                </div>
            
                                <div class="btn-group text-muted">
                                    <button type="submit" class="btn btn-outline btn-primary btn-xs "><i class="fa fa-share"></i> Publicar</button>
                                </div>
                            </form>
                        </div>
                    </div>

            <div class="social-feed-box">

                <div class="pull-right social-action dropdown">
                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu m-t-xs">
                        <li><a href="#">Ocultar</a></li>
                    </ul>
                </div>
                <div class="social-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="img/a1.jpg">
                    </a>
                    <div class="media-body">
                        <a href="#" style="color: #676a6c;">
                           Andrés Stiven Medina
                        </a>
                        <small class="text-muted">Hoy 4:21 pm - 2018-02-21</small>
                    </div>
                </div>
                <div class="social-body">
                    <p>
                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                        default model text, and a search for 'lorem ipsum' will uncover many web sites still
                        in their infancy. Packages and web page editors now use Lorem Ipsum as their
                        default model text.
                    </p>

                    <div class="btn-group text-muted">
                        <button class="btn btn-outline btn-default btn-xs "><i class="fa fa-check"></i> Resuelto</button>
                    </div>
                </div>
                <div class="social-footer">
                    <div class="social-comment">
                        <a href="" class="pull-left">
                            <img alt="image" src="img/a3.jpg">
                        </a>
                        <div class="media-body">
                            <a href="#" style="color: #676a6c;">
                                Yurani Calvo Ruiz
                            </a>
                            Ha resuelto la novedad.
                            <br/>
                            <a href="#" class="small" style="color: #676a6c;"><i class="fa fa-check"></i> Resuelto!</a> -
                            <small class="text-muted">2018-02-22</small>
                        </div>
                    </div>

                </div>

            </div>

            <div class="social-feed-box">

                <div class="pull-right social-action dropdown">
                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu m-t-xs">
                        <li><a href="#">Config</a></li>
                    </ul>
                </div>
                <div class="social-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="img/a3.jpg">
                    </a>
                    <div class="media-body">
                        <a href="#" style="color: #676a6c;">
                            Yurani Calvo Ruiz
                        </a>
                        <small class="text-muted">Hoy 4:21 pm - 2018-02-22</small>
                    </div>
                </div>
                <div class="social-body">
                    <p>
                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                        default model text, and a search for 'lorem ipsum' will uncover many web sites still
                        in their infancy. Packages and web page editors now use Lorem Ipsum as their
                        default model text.
                    </p>
                    <p>
                        Lorem Ipsum as their
                        default model text, and a search for 'lorem ipsum' will uncover many web sites still
                        in their infancy. Packages and web page editors now use Lorem Ipsum as their
                        default model text.
                    </p>
                    <img src="img/gallery/3.jpg" class="img-responsive">
                    <div class="btn-group">
                        <button class="btn btn-outline btn-success btn-xs "><i class="fa fa-check-square-o"></i> Resolver</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 m-b-lg">
            <div id="vertical-timeline" class="vertical-container light-timeline no-margins">
                @foreach($data_eventos as $evento)
                <div class="vertical-timeline-block">
                    @if($evento->tipo == 'Llamada')
                        <div class="vertical-timeline-icon yellow-bg">
                            <i class="fa fa-phone"></i>
                        </div>
                    @elseif($evento->tipo == 'Visita')
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-file-text"></i>
                        </div>
                    @else
                        <div class="vertical-timeline-icon blue-bg">
                            <i class="fa fa-file-text"></i>
                        </div>
                    @endif

                    <div class="vertical-timeline-content">
                        <h2>{{$evento->tipo}}</h2>
                        <p>{{$evento->asunto}}</p>
                        
                    @if($evento->tipo == 'Llamada')
                        <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-calendar"></i></a>
                        <span class="vertical-date">
                        Hoy <br>
                        <small>{{$evento->fecha_inicio}}</small>
                        </span>
                    @elseif($evento->tipo == 'Visita')
                        <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-calendar"></i></a>
                        <span class="vertical-date">
                            Hoy <br>
                            <small>{{$evento->fecha_inicio}}</small>
                        </span>
                    @else
                        <a href="#" class="btn btn-sm btn-success"><i class="fa fa-calendar"></i> </a>
                        <span class="vertical-date">
                        Hoy <br>
                            <small>{{$evento->fecha_inicio}}</small>
                        </span>
                    @endif
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection
@section('ini-scripts')
{{-- <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

    });
</script>  --}}
@endsection