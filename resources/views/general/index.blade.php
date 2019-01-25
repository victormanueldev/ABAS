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
        <div class="col-md-6">

            <div class="profile-image">
                <img src="{{ Storage::url($user[0]->foto)}}" class="img-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            {{ $user[0]->nombres}} {{ $user[0]->apellidos}}
                        </h2>
                        <h4>{{ $user[0]->cargo->descripcion}}</h4>
                        <small>
                            Esta es la página principal, en donde podrás acceder a todas las funcionalidades de ABAS, ver tu actividad reciente
                            y la de tus compañeros de trabajo.
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
             <small>Área de desempeño</small>
            <h2 class="no-margins">{{$user[0]->area->descripcion}}</h2>
            {{-- <div id="sparkline1"></div>  --}}
            <img alt="image" class="img-lg-logo img-responsive" src="{{ asset('img/logo-2.png')}}" />
        </div>
        <div class="col-md-3">
                <h3 class="no-margins"></h3>
                <img src="{{asset('img/zender_logo.png')}}" class="img-fluid">
                <p class="small">
                    Administrador de base de datos de <br> Sanicontrol S.A.S. &copy; 2018 </p>
       </div>


    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins" id="tareas">
                <tareas></tareas>
            </div>
        </div>

        <div class="col-lg-5" id="novedad">
            
                <div class="social-feed-box">
                    {!! Form::open(['route' => ['novedades.store'], 'method' => 'POST']) !!}
                    {!! Form::token() !!}
                        {{-- <div class="pull-right social-action dropdown">
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
                        </div> --}}
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="{{ Storage::url($user[0]->foto)}}">
                            </a>
                            <div class="media-body">
                                <a href="#" style="color: #676a6c;">
                                   {{ $user[0]->nombres}} {{$user[0]->apellidos}}
                                </a>
                            
                                <small class="text-muted">
                                    <i class="fa fa-globe"></i> Visibilidad: 
                                    <select name="area" required>
                                            <option value="{{$user[0]->area->id}}" selected>{{$user[0]->area->descripcion}}</option>
                                            @foreach($areas as $area)
                                                @if($area->id != $user[0]->area->id)
                                                    <option value="{{$area->id}}" >{{$area->descripcion}}</option>
                                                @endif
                                            @endforeach
                                                <option value="0" >Pública</option>
                                    </select>
                                </small>
                                <small class="text-muted">
                                        <select name="prioridad" required>
                                                <option value="Normal" selected>Prioridad</option>
                                                <option value="Normal"> Normal</option>
                                                <option value="Urgente"> Urgente</option>
                                        </select>
                                    </small>
                            
                            </div>
                        
                        </div>
                   
                        <div class="social-body">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Escriba aquí una novedad" rows="3" name="descripcion"></textarea>
                                </div>
                    
                                <div class="btn-group text-muted">
                                    <button type="submit" class="btn btn-outline btn-primary btn-xs "><i class="fa fa-share"></i> Publicar</button>
                                </div>  
                                    
                        </div>
                    {!! Form::close() !!}
                </div>
                <novedades></novedades>
                </div>
                   
        <div class="col-lg-4 m-b-lg">
            <div id="vertical-timeline" class="vertical-container light-timeline no-margins">
                @foreach($data_eventos as $evento)
                <div class="vertical-timeline-block">
                    @if($evento['tipo'] == 'Llamada')
                        <div class="vertical-timeline-icon yellow-bg">
                            <i class="fa fa-phone"></i>
                        </div>
                    @elseif($evento['tipo'] == 'Visita')
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-file-text"></i>
                        </div>
                    @else
                        <div class="vertical-timeline-icon blue-bg">
                            <i class="fa fa-file-text"></i>
                        </div>
                    @endif

                    <div class="vertical-timeline-content">
                        <h2>{{$evento['tipo']}}</h2>
                        <p>{{$evento['asunto']}}</p>
                        
                    @if($evento['tipo'] == 'Llamada')
                        <a href="#" class="btn btn-sm btn-warning">Ver más</a>
                        @if($evento['fecha_inicio'] == $fecha_actual)
                            <span class="vertical-date">
                            Hoy <br>
                            <small>{{$evento['hora_inicio']}}</small>
                            </span>
                        @else
                            <span class="vertical-date">
                            Mañana <br>
                            <small>{{$evento['hora_inicio']}}</small>
                            </span>
                        @endif
                    @elseif($evento['tipo'] == 'Visita')
                        <a href="#" class="btn btn-sm btn-primary">Ver más</a>
                        @if($evento['fecha_inicio'] == $fecha_actual)
                            <span class="vertical-date">
                            Hoy <br>
                            <small>{{$evento['hora_inicio']}}</small>
                            </span>
                        @else
                            <span class="vertical-date">
                            Mañana <br>
                            <small>{{$evento['hora_inicio']}}</small>
                            </span>
                        @endif
                    @else
                        <a href="#" class="btn btn-sm btn-success">Ver más </a>
                        @if($evento['fecha_inicio'] == $fecha_actual)
                            <span class="vertical-date">
                            Hoy <br>
                            <small>{{$evento['hora_inicio']}}</small>
                            </span>
                        @else
                            <span class="vertical-date">
                            Mañana <br>
                            <small>{{$evento['hora_inicio']}}</small>
                            </span>
                        @endif
                    @endif
                    </div>
                    
                </div>
                @endforeach

            </div>

        </div>

    </div>

</div>
@endsection
