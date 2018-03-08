@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Página Principal</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.html">Inicio</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row m-b-lg m-t-lg">
        <div class="col-md-7">

            <div class="profile-image">
                <img src="img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            Andrés Medina
                        </h2>
                        <h4>Asesor Comercial</h4>
                        <small>
                            Esta es la página principal, en donde podrás acceder a todas las funcionalidades de ABAS, ver tu actividad reciente
                            y la de tus compañeros de trabajo.
                        </small>
                    </div>
                </div>
            </div>
        </div>
        {{--  <div class="col-md-3">
            <table class="table small m-b-xs">
                <tbody>
                <tr>
                    <td>
                        <strong>Identificación</strong><br> 1061507565
                    </td>
                    <td>
                        <strong> Empleado</strong><br> 001
                    </td>

                </tr>
                <tr>
                    <td>
                        <strong>Género</strong><br> Masculino
                    </td>
                    <td>
                        <strong>Teléfono</strong><br> 343804545
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Fecha Nac.</strong> 1998-02-02
                    </td>
                    <td>
                        <strong>Email</strong> andres@gmail.com
                    </td>
                </tr>
                </tbody>
            </table>
        </div>  --}}
        <div class="col-md-5">
            <small>Área de desempeño</small>
            <h2 class="no-margins">Área Comercial</h2>
            <div id="sparkline1"></div> 
        </div>


    </div>
    <div class="row">

        <div class="col-lg-3">

            <div class="ibox">
                <div class="ibox-content">
                    <h3>Registro de Clientes</h3>

                    <p class="small">
                        Registra un nuevo cliente
                    </p>
                    
                    <button class="btn btn-success btn-block">Iniciar</button>

                </div>
            </div>
            <div class="ibox">
                <div class="ibox-content">
                    <h3>Tareas Rápidas</h3>

                    <p class="small">
                        Registra una tarea rápidamente
                    </p>

                    <div class="form-group">
                        <label>Prioridad</label>
                        <select class="form-control m-b" name="account">
                            <option>Normal</option>
                            <option>Urgente</option>
                            <option>Importante</option>
                        </select>
                    </div>

                    <div class="form-group" id="data_1">
                        <label>Fecha</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Hora</label>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="text" class="form-control" value="09:30" >
                            <span class="input-group-addon">
                                <span class="fa fa-clock-o"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Asunto</label>
                        <input type="email" class="form-control" placeholder="Escriba el Asunto">
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" placeholder="Descripción del asunto" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary btn-block">Guardar</button>

                </div>
            </div>

        </div>

        <div class="col-lg-5">

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
                        <a href="#">
                           Victor Manuel Arenas
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
                        <button class="btn btn-white btn-xs "><i class="fa fa-check-square-o"></i> Resuelto</button>
                    </div>
                </div>
                <div class="social-footer">
                    <div class="social-comment">
                        <a href="" class="pull-left">
                            <img alt="image" src="img/a3.jpg">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                Yurani Calvo Ruiz
                            </a>
                            Ha resuelto la novedad.
                            <br/>
                            <a href="#" class="small"><i class="fa fa-check"></i> Resuelto!</a> -
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
                        <a href="#">
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
                        <button class="btn btn-white btn-xs "><i class="fa fa-check-square-o"></i> Resolver</button>
                    </div>
                <div class="social-footer">
            </div>

        </div>
    </div>
</div>
        <div class="col-lg-4 m-b-lg">
            <div id="vertical-timeline" class="vertical-container light-timeline no-margins">
                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon navy-bg">
                        <i class="fa fa-briefcase"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>Reunión</h2>
                        <p>Reunión con el cliente <strong>La Locura sede Norte</strong> dirección Cra 2D # 24A - 21 a las 12:30:00.
                        </p>
                        <a href="#" class="btn btn-sm btn-primary"> Ver más</a>
                            <span class="vertical-date">
                                Hoy <br>
                                <small>2018-08-03</small>
                            </span>
                    </div>
                </div>

                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon blue-bg">
                        <i class="fa fa-file-text"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>Revisar documentación</h2>
                        <p>Revisar la documentación del cliente No. <strong>C0123</strong> y Razón social <strong>Leños & Carbón</strong> sede Chipichape.</p>
                        <a href="#" class="btn btn-sm btn-success">Ver más </a>
                            <span class="vertical-date">
                            Hoy <br>
                                <small>2018-08-03</small>
                            </span>
                    </div>
                </div>

                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon yellow-bg">
                        <i class="fa fa-phone"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>Llamada a cliente</h2>
                        <p>Llamar a cliente para concretar visita de inpección.</p>
                        <a href="#" class="btn btn-sm btn-primary">Ver más </a>
                        <span class="vertical-date">Hoy <br><small>2018-08-03</small></span>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

    @endsection