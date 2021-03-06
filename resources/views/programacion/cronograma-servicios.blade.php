@extends('layouts.app')
{{-- Css --}}
@section('custom-css')
<link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
<link href="{{asset('css/plugins/switchery/switchery.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
@endsection
{{-- Contenido --}}
@section('content')
<script>
    document.getElementById('m-cronograma').setAttribute("class", "active");
    document.getElementById('a-cronograma').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Agenda</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li>
                Agenda
            </li>
            <li class="active">
                <strong>Eventos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">

        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-inline">
                            <div class="form-group col-sm-8 col-lg-8">
                                <label>Impresión de documentos</label><br>
                                <span>Presiona el botón para ver todas las opciones de impresión de servicios</span>
                            </div>
                            <div class="form-group col-sm-2 col-lg-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-print-options" id="btn-modal-p-o">Ver opciones de
                                    impresion</button>
                            </div>
                            <div class="form-group col-sm-2 col-lg-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#search-service" id="btn-modal-p-o">Buscar servicios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Agenda </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                {{-- Botones de mostrar modal --}}
                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#modal-servicios" id="btn-modal">
                    Launch modal
                </button>
                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#event-option" id="btn-modal2">
                    Launch modal
                </button>
                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#neutral-service" id="btn-modal3">
                    Launch modal
                </button>
                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#delivery-service" id="btn-modal4">
                    Launch modal
                </button>


                <!--===================================================
                /* Calendario */
                ====================================================-->
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>


                <!--===================================================
                /* Modal de Crear Servicio */
                ====================================================-->
                <div id="modal-servicios" class="modal inmodal fade" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="width: 98%;">
                        <div class="modal-content ">
                            {!! Form::open(['route' => ['guardaEventos'], 'method' => 'POST', 'id'
                            =>'form-calendario']) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h3 class="modal-title">Agendar servicio</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 b-r col-md-12 col-lg-4">
                                        <h3 class="m-t-none m-b">Información del cliente</h3>
                                        <p>Indique los datos del cliente al que se le agendará el servicio.</p>
                                        <div class="row">
                                            <div class="form-group ">
                                                <label class="col-sm-4 control-label">Buscar cliente por: </label>
                                                <div class="col-sm-8">
                                                    <label class="radio-inline">
                                                        <input class="radio-options" type="radio" value="1"
                                                            id="por_nombre" name="optionsRadios"> Nombre </label>
                                                    <label class="radio-inline">
                                                        <input class="radio-options" type="radio" value="2" id="por_rs"
                                                            name="optionsRadios"> Razon Social </label>
                                                    <label class="radio-inline">
                                                        <input class="radio-options" type="radio" value="3" id="por_nit"
                                                            name="optionsRadios"> NIT/CC </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-top: 10px;">
                                                <input type="text" placeholder="Cliente..."
                                                    class="typeahead_1 form-control" id="input_autocomplete"
                                                    autocomplete="off" />
                                            </div>
                                            <div class="form-group col-lg-12" style="margin-top: 15px;">
                                                <label class="control-label">Sede *</label>
                                                <select class="form-control " id="select_sedes">
                                                    <option value="" selected disabled>Selecciona una sede</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h3 class="m-t-none m-b">Información de Sede/Residencia</h3>
                                        <p style="margin-bottom: 14px;">Confirma la información del lugar donde se
                                            realizará el servicio.</p>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>Contacto</label>
                                                <input class="form-control" rows="2" id="contacto_sede" readonly>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Email</label>
                                                <input class="form-control" rows="2" id="ema_sede" readonly>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Telefono</label>
                                                <input class="form-control" rows="2" id="tel_sede" readonly>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Celular</label>
                                                <input class="form-control" rows="2" id="cel_sede" readonly>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Dirección</label>
                                                <input class="form-control" rows="2" id="dir_sede" readonly>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Barrio</label>
                                                <input class="form-control" rows="2" id="barrio_sede" readonly>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label>Novedades temporales</label>
                                                <ul class="todo-list ui-sortable" id="lista-servicios"
                                                    style="cursor: pointer;margin-top:6px;">
                                                    {{-- Servicios --}}

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 b-r col-md-12 col-lg-4">
                                        <h3 class="m-t-none m-b">Información de la solicitud</h3>
                                        <p>Agenda el servicio con base a esta información.</p>
                                        <div class="row">

                                            <div class="form-group col-lg-12">
                                                <label class="control-label">Codigo de Solicitud *</label>
                                                <select class="form-control " id="select_solicitudes"
                                                    style="margin-top: 10px;">
                                                    <option value="" selected disabled>Selecciona una solicitud</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="control-label">Valor del plan</label>
                                                <input type="text" id="valor_plan_solicitud" class="form-control"
                                                    readonly>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label class="control-label"># de visitas</label>
                                                <input type="text" id="numero_visitas" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-lg-5">
                                                <label class="control-label">Frec. de visitas</label>
                                                <input type="text" id="frecuencia_visitas_solicitud"
                                                    class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label class="control-label">Tipo de servicio</label>
                                                <input type="text" id="tipo_servicio" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="control-label">Frec. de servicio</label>
                                                <input style="text-transform: uppercase" type="text"
                                                    id="frecuencia_solicitud" class="form-control" readonly>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="control-label">Valor servicio</label>
                                                <input type="text" id="valor_servicios_solicitud" class="form-control"
                                                    readonly>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="control-label">T. facturación</label>
                                                <input style="text-transform: uppercase" type="text"
                                                    id="tipo_facturacion_solicitud" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label class="control-label">Observaciones del servicio</label>
                                                <textarea style="text-transform: uppercase" class="form-control"
                                                    placeholder="Observaciones de visitas." rows="5"
                                                    id="observaciones_visitas_solicitud" readonly></textarea>
                                            </div>
                                            <div class="form-group col-lg-12" id="more-solicitud"></div>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4">
                                        <h3 class="m-t-none m-b">Información del servicio</h3>
                                        <p>Diligencie todos los campos del referentes al servicio</p>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>Tipo de servicio: </label>
                                                <select class="form-control" style="margin-top: 10px;"
                                                    id="select_tipo_servicio">
                                                    <option value="0">Seleccione un tipo.</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Refuerzo">Refuerzo</option>
                                                    <option value="Neutro">Neutro</option>
                                                    <option value="Mensajeria">Mensajeria</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Frecuencia sugerida</label>
                                                <input class="form-control" id="sug_frecuency" readonly
                                                    style="margin-top: 10px;">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Repetir cada:</label>
                                                <div class="input-group">
                                                    <input style="width: 18%;margin-right: 10px;" type="number"
                                                        name="indice-frecuencia" id="indice-frecuencia"
                                                        class="form-control" min="1">
                                                    <select style="width: 30%;margin-left: 10px;"
                                                        name="opcion-frecuencia" id="opcion-frecuencia"
                                                        class="form-control">
                                                        <option value="0" selected>Seleccione una opcion</option>
                                                        <option value="dias" selected>Días</option>
                                                        <option value="semanas">Semanas</option>
                                                        <option value="meses">Meses</option>
                                                        <option value="anios">Años</option>
                                                    </select>
                                                    <select style="width: 42.5%;margin-left: 10px;" name=""
                                                        id="opcion-personalizada" class="form-control">
                                                        <option value="">Opción personalizada</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label>Hora *</label>
                                                <div class="input-group clockpicker" data-autoclose="true">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-clock-o"></span>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="09:30"
                                                        name="hora_inicio" id="hora_inicio">
                                                </div>
                                            </div>
                                            {{-- <div class="form-group col-lg-4">
                                                <label>Hora de inicio*</label>
                                                <div class="input-group" style="width: 100%">
                                                    <input type="time" class="form-control" id="hora_inicio" style="width: 100%">
                                                </div>
                                            </div> --}}
                                            <div class="form-group col-lg-8">
                                                <label>Duración del servicio</label>
                                                <div class="input-group">
                                                    <input style="width: 40%;margin-right: 10px;" type="number" min="0"
                                                        max="11" class="form-control" id="num_horas"
                                                        placeholder="Horas">
                                                    <input style="width: 42%;margin-left: 10px;" type="number" min="0"
                                                        max="60" class="form-control" id="num_minutos"
                                                        placeholder="Minutos">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label>Tipo de servicio</label>
                                                <select class="form-control" id="select_servicios" multiple="multiple">
                                                    @foreach($tipos as $tipo)
                                                    <option value="{{$tipo->id}}">{{$tipo->nombre}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-9">
                                                <label>Tecnicos</label>
                                                <select class="form-control" id="select_tecnicos2" multiple="multiple">
                                                    @foreach($tecnicos as $tecnico)
                                                    <option value="{{$tecnico->id}}">{{$tecnico->nombre}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label style="width: 100%">Historial</label>
                                                <button type="button" class="btn btn-white" id="historial_tecnicos">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <div id="list-historic" style="display: none">
                                                    <ul class="list-group" id="list-tecnicos">

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label>Instrucciones y Observaciones</label>
                                                <textarea class="form-control"
                                                    placeholder="Escriba aquí las observaciones para el técnico."
                                                    rows="1" name="instrucciones" id="text-instrucciones"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button style="margin-bottom: 0;" type="button" id="btn-close2" class="btn btn-default"
                                    data-dismiss="modal">Cancelar</button>
                                <button id="create-services" type="submit" class="btn btn-primary">Crear
                                    servicios</button> {{-- No se si este
                                boton de guardar sea necesario. --}}
                                <button id="btn-unique" type="button" class="btn btn-success">Guardar servicio
                                    único</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <!--===================================================
                /* Modal de Ver Info de Servicio */
                ====================================================-->
                <div class="modal inmodal fade" id="event-option" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content " id="modal-dialog">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h6 class="modal-title">Información del servicio</h6>
                            </div>
                            <div class="modal-body ibox-content sk-loading" style="padding: 20px 30px 0px 30px;">
                                <!-- Loader -->
                                <div class="sk-spinner sk-spinner-double-bounce">
                                    <div class="sk-double-bounce1"></div>
                                    <div class="sk-double-bounce2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <div class="row">
                                            <div class="col-sm-8" style="margin-bottom: 15px;">
                                                <h3>Información del cliente </h3>
                                            </div>
                                            <div class="col-sm-4" style="margin-top: 5px;" id="info-client">
                                                {{-- Informacion por mora del cliente --}}
                                            </div>

                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Cliente </label>
                                                <input type="text" disabled class="form-control" id="ver_nombre_cliente"
                                                    style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Sede/Residencia </label>
                                                <input type="text" disabled class="form-control" id="ver_nombre_sede"
                                                    style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Dirección </label>
                                                <input type="text" disabled class="form-control" id="ver_direccion_sede"
                                                    style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Barrio </label>
                                                <input type="text" disabled class="form-control" id="ver_barrio_sede"
                                                    style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Contacto </label>
                                                <input type="text" disabled class="form-control" id="ver_contacto_sede"
                                                    style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Teléfono </label>
                                                <input type="text" disabled class="form-control" id="ver_telefono_sede"
                                                    style="width: 100%;background-color: #fff;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-5 col-xs-12" style="margin-bottom: 7px;">
                                                <a class="btn btn-primary" id="btn-lock"></a>
                                            </div>
                                            <div class="col-sm-7 col-xs-12"
                                                style="margin-bottom: 7px;padding-left: 90px;" id="div-opciones">

                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Hora de inicio </label>
                                                <input type="text" disabled class="form-control" id="ver_hora_inicio"
                                                    style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Fecha/Hora de fin. </label>
                                                <input type="text" disabled class="form-control" id="ver_datos_fin"
                                                    style="width: 100%;background-color: #fff;">
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label>Frecuencia: </label>
                                                <input type="button" class="form-control" value="Cambiar frecuencia"
                                                    id="change-frecuency">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Duración del servicio</label>
                                                <input type="text" disabled class="form-control" id="ver_duracion"
                                                    style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label>Instrucciones y Observaciones</label>
                                                <textarea class="form-control" readonly rows="1" name="instrucciones"
                                                    style="background-color: #fff;" id="ver_instrucciones"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tipo de Servicio</th>
                                                    <th>Numero de Factura</th>
                                                    <th>Valor Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-tipos">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre del Técnico</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-tecnicos">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button style="margin-bottom: 0;" type="button" class="btn btn-white"
                                    data-dismiss="modal" id="btn-close3">Cerrar</button>
                                <button style="margin-bottom: 0;" type="button" class="btn btn-danger"
                                    data-dismiss="modal" id="btn-cancelar-servicio">Cancelar servicio</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--===================================================
                  /* Modal opciones de impresion  
                ====================================================-->
                <div class="modal inmodal fade" id="event-print" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            {!! Form::open(['id' =>'form-print']) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">Editar servicio</h4>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="i-checks">
                                            <label>
                                                <input id="orden" type="checkbox" value="1" name="check_op">
                                                <i></i> Option one </label>
                                        </div>
                                        <div class="i-checks">
                                            <label>
                                                <input id="ruta-lamparas" type="checkbox" value="2" name="check_op">
                                                <i></i> Option two </label>
                                        </div>
                                        <div class="i-checks">
                                            <label>
                                                <input id="ruta-ratas" type="checkbox" value="3" name="check_op">
                                                <i></i> Option three </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button style="margin-bottom: 0;" type="button" class="btn btn-white"
                                    data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <!--===================================================
                /* Modal Servicios Neutros
                ====================================================-->
                <div class="modal inmodal fade" id="neutral-service" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h2 class="modal-title" style="font-size: 23px;">Servicio Neutro</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-8" style="margin-bottom: 15px;">
                                        <h3>Información del cliente </h3>
                                    </div>
                                    <div class="col-sm-4" style="margin-top: 5px;" id="info-client">
                                        {{-- Informacion por mora del cliente --}}
                                    </div>

                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Cliente </label>
                                        <input type="text" disabled class="form-control" id="ver_nombre_cliente_3"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Sede/Residencia </label>
                                        <input type="text" disabled class="form-control" id="ver_nombre_sede_3"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Dirección </label>
                                        <input type="text" disabled class="form-control" id="ver_direccion_sede_3"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Barrio </label>
                                        <input type="text" disabled class="form-control" id="ver_barrio_sede_3"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Contacto </label>
                                        <input type="text" disabled class="form-control" id="ver_contacto_sede_3"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Teléfono </label>
                                        <input type="text" disabled class="form-control" id="ver_telefono_sede_3"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-md-12">
                                        <label class="control-label">Observaciones</label>
                                        <textarea class="form-control" id="ver_observaciones_3" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button id="edit-neutral-service" class="btn btn-primary">Editar</button>
                                <button id="delete-neutral-service" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--===================================================
                /* Modal Servicios Mensajeria
                ====================================================-->
                <div class="modal inmodal fade" id="delivery-service" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h2 class="modal-title" style="font-size: 23px;">Servicio de Mensajería</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-8" style="margin-bottom: 15px;">
                                        <h3>Información del cliente </h3>
                                    </div>
                                    <div class="col-sm-4" style="margin-top: 5px;" id="info-client">
                                        {{-- Informacion por mora del cliente --}}
                                    </div>

                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Cliente </label>
                                        <input type="text" disabled class="form-control" id="ver_nombre_cliente_4"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Sede/Residencia </label>
                                        <input type="text" disabled class="form-control" id="ver_nombre_sede_4"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Dirección </label>
                                        <input type="text" disabled class="form-control" id="ver_direccion_sede_4"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Barrio </label>
                                        <input type="text" disabled class="form-control" id="ver_barrio_sede_4"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Contacto </label>
                                        <input type="text" disabled class="form-control" id="ver_contacto_sede_4"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Teléfono </label>
                                        <input type="text" disabled class="form-control" id="ver_telefono_sede_4"
                                            style="width: 100%;background-color: #fff;">
                                    </div>
                                    <div class="form-group col-xs-12 col-md-12">
                                        <label class="control-label">Observaciones</label>
                                        <textarea class="form-control" id="ver_observaciones_4" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button id="delete-mensajeria-service" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!--===================================================
                /* Modal opciones de Eliminacion
                ====================================================-->
                <div class="modal inmodal fade" id="modal-delete-options" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            {!! Form::open(['id' => 'form-delete']) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h2 class="modal-title" style="font-size: 23px;">Opciones de eliminación</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="i-checks">
                                            <label>
                                                <input type="radio" value="1" name="delete-op">
                                                <i></i> Servicio actual </label>
                                        </div>
                                        <div class="i-checks">
                                            <label>
                                                <input type="radio" value="2" name="delete-op">
                                                <i></i> Servicios posteriores </label>
                                        </div>
                                        <div class="i-checks">
                                            <label>
                                                <input type="radio" value="3" name="delete-op">
                                                <i></i> Todos los servicios </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button id="btn-delete-servicio" type="submit" class="btn btn-primary">Eliminar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <!--===================================================
                /* Modal opciones de Actualizacion de Frecuencia
                ====================================================-->
                <div class="modal inmodal fade" id="modal-update-options" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h2 class="modal-title" style="font-size: 23px;">Opciones de Actualización</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Repetir cada:</label>
                                        <div class="input-group">
                                            <input style="width: 20%;margin-right: 10px;" type="number"
                                                name="indice-frecuencia" id="indice-frecuencia-actl"
                                                class="form-control">
                                            <select style="width: 30%;margin-left: 10px;" name="opcion-frecuencia"
                                                id="opcion-frecuencia-actl" class="form-control">
                                                <option value="dias" selected>Días</option>
                                                <option value="semanas">Semanas</option>
                                                <option value="meses">Meses</option>
                                                <option value="anios">Años</option>
                                            </select>
                                            <select style="width: 42.5%;margin-left: 10px;" name=""
                                                id="opcion-personalizada-actl" class="form-control">
                                                <option value="">Opción personalizada</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="i-checks">
                                            <label>
                                                <input type="radio" value="1" name="update-op">
                                                <i></i> Servicio actual </label>
                                        </div>
                                        <div class="i-checks">
                                            <label>
                                                <input type="radio" value="2" name="update-op">
                                                <i></i> Servicios posteriores </label>
                                        </div>
                                        <div class="i-checks">
                                            <label>
                                                <input type="radio" value="3" name="update-op">
                                                <i></i> Todos los servicios </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button id="btn-actl-servicio" type="button" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--===================================================
                  /* Modal opciones de impresion  
                ====================================================-->
                <div class="modal inmodal fade" id="modal-print-options" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            {!! Form::open(['id' =>'form-print']) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">Imprimir Servicios</h4>
                            </div>
                            <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                                <div class="row">
                                    <div class="col-lg12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h4>Filtrar por fechas</h4>
                                            </div>
                                            {{-- <div class="col-md-2">
                                                <input type="radio" value="1"  name="option-filter" class="i-checks" checked/>
                                                <span class="m-l-xs">Fecha Actual</span>
                                            </div> --}}
                                            {{-- <div class="col-md-3">
                                                <input type="radio" value="2"  name="option-filter" class="i-checks" />
                                                <span class="m-l-xs">Fecha de Mañana</span>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" value="3"  name="option-filter" class="i-checks"/>
                                                <span class="m-l-xs">Fecha Seleccionada</span>
                                            </div> --}}
                                            <div class="form-group col-lg-5" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="fecha_inicio_impresion" id="fecha_inicio_impresion">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-outline btn-primary"
                                                    id="filter-dates">Buscar servicios</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <h3>Lisado de servicios por realizar</h3>
                                        <div class="sk-spinner sk-spinner-pulse" id="loader-impresion"></div>
                                        <ul class="todo-list m-t ui-sortable" id="lista-servicios-impresion"
                                            style="cursor: pointer">
                                            {{-- Servicios --}}
                                        </ul>
                                        <div
                                            style="margin: 20px 20px 0 0; width: 68%;position: relative;display: inline-block;">
                                            <label>
                                                <input type="checkbox" id="select-all" value="1">
                                                <i></i> <b>Seleccionar todos</b> </label>
                                        </div>
                                        <div style="display: inline-block;position: relative;">
                                            <i id="filter-state">(Filtro no aplicado)</i>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 b-r">
                                        <h3>Opciones de impresión</h3>
                                        <table class="table">
                                            <tbody>
                                                <tr>

                                                    <td class="row" colspan="2">
                                                        <div class="col-sm-6 col-md-4" style="padding: 0">
                                                            <button type="button" class="btn btn-primary m-r-sm"
                                                                id="print-ods">OS</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-18" style="padding: 0">
                                                            <p style="margin-bottom: 0">Órdenes de Servicio <br><i
                                                                    style="font-size: 10px;position: absolute;">(Generadas
                                                                    por ABAS)</i></p>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td class="row">
                                                        <div class="col-sm-6 col-md-4" style="padding: 0">
                                                            <button type="button" class="btn btn-success m-r-sm"
                                                                id="print-rt">RT</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-8" style="padding: 0">
                                                            <p style="margin-bottom: 0">Ruta de técnicos <br><i
                                                                    style="font-size: 10px;position: absolute;">(Generadas
                                                                    por ABAS)</i></p>
                                                        </div>
                                                    </td>
                                                    <td class="row">
                                                        <div class="col-sm-6 col-md-4" style="padding: 0">
                                                            <button type="button" class="btn btn-warning m-r-sm"
                                                                id="print-ctf">CT</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-8" style="padding: 0">

                                                            <p style="margin-bottom: 0">Certificados <br><i
                                                                    style="font-size: 10px;position: absolute;">(Tomado
                                                                    de la BD)</i></p>
                                                        </div>
                                                    </td>

                                                    {{-- <td class="row">
                                                        <div class="col-sm-6 col-md-4" style="padding: 0">
                                                            <button type="button" class="btn btn-primary m-r-sm" id="print-rs">RS</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-8" style="padding: 0">

                                                            <p style="margin-bottom: 0">Ruta de Saneamiento <br><i
                                                                    style="font-size: 10px;position: absolute;">(Tomado
                                                                    de la BD)</i></p>
                                                        </div>
                                                    </td> --}}

                                                </tr>
                                                <tr>

                                                    {{-- <td class="row">
                                                        <div class="col-sm-6 col-md-4" style="padding: 0">
                                                            <button type="button" class="btn btn-primary m-r-sm" id="print-rri">RI</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-8" style="padding: 0">

                                                            <p style="margin-bottom: 0">Ruta Roedores Int.<br><i style="font-size: 10px;position: absolute;">(Tomado
                                                                    de la BD)</i></p>
                                                        </div>
                                                    </td> --}}
                                                    {{-- 
                                                    <td class="row">
                                                        <div class="col-sm-6 col-md-4" style="padding: 0">
                                                            <button type="button" class="btn btn-primary m-r-sm" id="print-rre">RE</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-8" style="padding: 0">

                                                            <p style="margin-bottom: 0">Ruta de Roedores Ext.<br><i
                                                                    style="font-size: 10px;position: absolute;">(Tomado
                                                                    de la BD)</i></p>
                                                        </div>
                                                    </td> --}}

                                                </tr>
                                                <tr>

                                                    {{-- <td class="row">
                                                        <div class="col-sm-6 col-md-4" style="padding: 0">
                                                            <button type="button" class="btn btn-primary m-r-sm" id="print-rl">RL</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-8" style="padding: 0">

                                                            <p style="margin-bottom: 0">Ruta de Lámparas <br><i style="font-size: 10px;position: absolute;">(Tomado
                                                                    de la BD)</i></p>
                                                        </div>
                                                    </td> --}}

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button style="margin-bottom: 0;" type="button" class="btn btn-white"
                                    data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>


                <!--===================================================
                /* Modal Buscar Servicios
                ====================================================-->
                <div class="modal inmodal fade" id="search-service" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h2 class="modal-title" style="font-size: 23px;">Buscar servicios</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group ">
                                        <label class="col-sm-4 control-label">Buscar cliente por: </label>
                                        <div class="col-sm-8">
                                            <label class="radio-inline">
                                                <input class="radio-options" type="radio" value="1" id="por_nombre"
                                                    name="optionsRadios"> Nombre </label>
                                            <label class="radio-inline">
                                                <input class="radio-options" type="radio" value="2" id="por_rs"
                                                    name="optionsRadios"> Razon Social </label>
                                            <label class="radio-inline">
                                                <input class="radio-options" type="radio" value="3" id="por_nit"
                                                    name="optionsRadios"> NIT/CC </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <input type="text" placeholder="Cliente..." class="typeahead_2 form-control"
                                            id="input_autocomplete_2" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-lg-12" style="margin-top: 15px;">
                                        <label class="control-label">Sede *</label>
                                        <select class="form-control " id="select_sedes_2">
                                            <option value="" selected disabled>Selecciona una sede</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" id="list-services">
                                    
                                    <!-- Resultados de busqueda -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button id="btn-search-service" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
{{-- JavaScript --}}
@section('ini-scripts')
<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>

<!-- Full Calendar -->
<script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/locale/es.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment-timezone.js')}}"></script>
<script src="{{asset('js/date.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>

<!-- Chosen -->
<script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>

<!-- Typehead -->
<script src="{{asset('js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
<script>
    //Inicializacion de variables globales
    var infoServiceSelected = {
        id: '',
        duration: '',
        state: 0
    };
    var inicio_servicio;
    var solicitudes;
    var notificacionesListadas = []
    var tiposServicios = []
    var tecnicos = []
    var solicitudSeleccionada;

    $(document).ready(function () {

        /** Servicio de notificaiones
        --------------------------------------------------------------------------*/
        setInterval(() => {
            $.get('/notificaciones')
                .then(res => {

                    res.forEach(value => {
                        if (notificacionesListadas.length == 0 && value.type ==
                            'ABAS\\Notifications\\SolicitudPublicada') {
                            notificacionesListadas.push(value.id)
                            mostrarToast(value.data.cliente, value.data.sede, value.data
                                .codigo, value.id)
                        }

                        let existeNotificacion = notificacionesListadas.includes(value.id)

                        if (!existeNotificacion && value.type ==
                            'ABAS\\Notifications\\SolicitudPublicada') {
                            notificacionesListadas.push(value.id)
                            mostrarToast(value.data.cliente, value.data.sede, value.data
                                .codigo, value.id)
                        }
                    })

                })
                .catch(err => {
                    console.log(err)
                })
        }, 6000)


        function eliminarNotificacion(idNotificacion) {
            $.ajax({
                url: `/notificaciones/${idNotificacion}`,
                type: 'DELETE',
                headers: {
                    "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value //Token de seguridad
                }
            })
        }

        function mostrarToast(cliente, sede, codigoSolicitud, idToast) {
            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": true,
                "showDuration": "0",
                "hideDuration": "0",
                "timeOut": "0",
                "extendedTimeOut": "0",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
            }

            toastr["error"](`Solicitud ${codigoSolicitud} para ${cliente} ${sede}`,
                "¡Nueva solicitud creada!", {
                own_id: idToast,
                onHidden: function () {
                    eliminarNotificacion(this.own_id)
                }
            })
        }

        //Inicializacion de selects
        $("#select_servicios").select2({
            width: '100%',
            placeholder: 'Servicios...'
        });

        $("#select_tecnicos2").select2({
            width: '100%',
            placeholder: 'Técnicos...'
        });

        $("#fecha_inicio_impresion").val(moment().tz('America/Bogota').format('YYYY-MM-DD'))

        /* Estructuracion de la información del cliente para el autocompletado
        ------------------------------------------------------------------------*/
        //Inicializacion de variables
        var nit_clientes = [];
        var nombres_clientes = [];
        var razon_social_clientes = [];
        var $input;
        var data;
        var info_clientes = [];

        //Peticion al servidor para obtener los clientes de la DB
        $.get('/clientes')
            .then((res) => {
                //Recorre la respueta
                res.forEach((value, index) => {
                    //Convertir a formato JSON para poder ser mostrados en el typehead
                    nit_clientes[index] = JSON.parse(
                        `{"name": "${value.nit_cedula}", "id": "${value.id}"}`);
                    nombres_clientes[index] = JSON.parse(
                        `{"name": "${value.nombre_cliente}", "id": "${value.id}"}`);
                    if (value.razon_social == 'null' || value.razon_social == null) {
                        razon_social_clientes[index] = JSON.parse(
                            `{"name": "${value.nombre_cliente}", "id": "${value.id}"}`);
                    } else {
                        razon_social_clientes[index] = JSON.parse(
                            `{"name": "${value.razon_social}", "id": "${value.id}"}`);
                    }
                });

                info_clientes = res;
            })
            .catch((err) => {
                console.log(err);
            });

        $.get('/tipos')
            .then(res => {
                tiposServicios = res;
            }).catch(err => {
                console.log("No se pudieron obtener los tipos de servicio");

            })

        //Inicia el Autocompletado con los NIT de los clientes
        $input = $('.typeahead_1').typeahead({
            source: nit_clientes
        });
        $input2 = $('.typeahead_2').typeahead({
            source: nit_clientes
        });

        //Evento click de los radiobuttons
        $(".radio-options").click(event => {
            //Valida el valor del radiobutton seleccionado
            switch (event.target.value) {
                //Buscar por nombre de clientes
                case '1':
                    data = nombres_clientes;
                    $('.typeahead_1').typeahead('destroy').typeahead({
                        source: data
                    });
                    $('.typeahead_2').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                //Buscar por razon social de clientes
                case '2':
                    data = razon_social_clientes;
                    $('.typeahead_1').typeahead('destroy').typeahead({
                        source: data
                    });
                    $('.typeahead_2').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                //Buscar por NIT o CC de clientes
                case '3':
                    data = nit_clientes;
                    $('.typeahead_1').typeahead('destroy').typeahead({
                        source: data
                    });
                    $('.typeahead_2').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                default:
                    console.log('Default');
                    data = [];
                    break;
            }
        })

        /* Inicialización de componentes de la pagina
         -----------------------------------------------------------------*/
        //Inicia iCheck 
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });


        /* Inicializa el Calendario
         -----------------------------------------------------------------*/
        //Instancia la Clase Date para obtener la fecha actual
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        //Declaracion de Variables publicas de Servicio
        var checkbox = false;
        var color;
        var frecuencia_solicitud;
        var id_solicitud;
        var id_cliente;
        var id_sede;

        //Inicializa el calendario
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día'
            },
            //Muestra todas las eventos de la BD
            // events: {
            //     url: "/servicios"
            // },
            defaultView: 'agendaWeek',
            eventLimit: true,
            editable: true,
            eventLimit: true,
            nowIndicator: true,
            firstDay: 0,
            businessHours: {
                // Dias de la semana en un array (0=Domingo)
                dow: [1, 2, 3, 4, 5, 6], // Lunes a Sabado

                start: '07:00', // Hora de inicio
                end: '18:00', // Hora de finalizacion
            },
            droppable: true, // Premite las eventos se puedan arrastrar dentro del calendario

            //Evento para renderizar contenido HMTL en cada uno de los eventos
            eventRender: function (event, element, view) {
                if (event.lock === 0) {
                    element.find('.fc-title').prepend(
                        '<i style="margin-left: 5px" class="fa fa-unlock"></i> ');
                } else {
                    element.find('.fc-title').prepend(
                        '<i style="margin-left: 5px"  class="fa fa-lock"></i> ');
                }
            },

            //Evento de mostrar la interfaz de agenda del dia, dando click en cualquier dia del calendario
            dayClick: function (start, end, allDay) {
                //Simula click en el boton de mostrar el modal
                document.getElementById("btn-modal").click();
                //Guarda la fecha y hora del dia seleccionado
                inicio_servicio = start.format("YYYY-MM-DD");
                //Limpiar elementos
                $("#select_sedes").empty();
                $(".list-group-item").remove();
                $('#input_autocomplete').val('');
                $("#dir_sede").val('');
                $("#barrio_sede").val('');
                $("#contacto_sede").val('');
                $("#tel_sede").val('');
                $("#ema_sede").val(''),
                    $("#cel_sede").val(''),
                    $("#select_frecuencia").val('0').change();
                $("#opcion-frecuencia").val('0').change();
                $("#hora_inicio").val('');
                $("#num_horas").val('');
                $("#num_minutos").val(0);
                $("#opcion-personalizada").empty();
                $("#opcion-personalizada").append(`<option>Opción personalizad</option>`);
                $('#select_servicios').select2("val", "");
                $('#select_tecnicos2').select2("val", "");
                $("#historial_tecnicos").popover('destroy');
                $("#text-instrucciones").val("")
                $("#create-services").prop('disabled', false);
                $("#lista-servicios").empty();
                $("#select_tipo_servicio").val('0').change();
                $("#frecuencia_solicitud").val('');
                $("#valor_plan_solicitud").val('');
                $("#frecuencia_visitas_solicitud").val('');
                $("#valor_servicios_solicitud").val('');
                $("#tipo_facturacion_solicitud").val('');
                $("#observaciones_visitas_solicitud").val('');
            },

            //Evento de reajustar el tamaño de la evento dentro del calendario (interfaz de agenda dia)
            eventResize: function (event) {
                var start = event.start.format("YYYY-MM-DD HH:mm");
                var backgroundC = event.backgroundColor;
                var allDay = event.allDay;
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-bottom-right",
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                if (event.end) { //valida si hay una fecha de terminación de la evento
                    var end = event.end.format("YYYY-MM-DD HH:mm");
                } else {
                    var end = "NULL"; //Sino la iguala a NULL
                }
                crsfToken = document.getElementsByName("_token")[0].value;
                $.ajax({
                    url: '/servicios/edit/dates',
                    data: {
                        idServicio: event.id,
                        start: start,
                        end: end,
                        option: 'resize'
                    },
                    type: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": crsfToken
                    },
                    success: function (json) {
                        toastr.success('La hora de finalización ha cambiado.',
                            'Actualizacion exitosa');
                    },
                    error: function (json) {
                        console.log("Error al actualizar evento");
                    }
                });
            },

            //Evento de cambiar de dia la evento dentro del calendario
            eventDrop: function (event, delta) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-bottom-right",
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                var start = event.start.format("YYYY-MM-DD HH:mm:ss");
                if (event.end) {
                    var end = event.end.format("YYYY-MM-DD HH:mm:ss");
                } else {
                    var end = "NULL";
                }
                var back = event.backgroundColor;
                var allDay = event.allDay;
                crsfToken = document.getElementsByName("_token")[0].value;
                $.ajax({
                    url: '/servicios/edit/dates',
                    data: {
                        idServicio: event.id,
                        start: start,
                        end: end,
                        option: 'drop'
                    },
                    type: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": crsfToken
                    },
                    success: function (json) {
                        toastr.success('Las fechas han sido actualizadas.',
                            'Actualizacion exitosa');
                        $("#calendar").fullCalendar('refetchEvents');
                    },
                    error: function (json) {
                        console.log("Error al actualizar evento");
                    }
                });
            },

            //Evento de mostrar el Tooltip teniendo el mouse dentro de la evento
            eventMouseover: function (event, jsEvent, view) {
                var start = (event.start.format("HH:mm"));
                var back = event.backgroundColor;
                if (event.end != null) {
                    var end = event.end.format("HH:mm");
                } else {
                    var end = "No definido";
                }
                if (event.allDay) {
                    var allDay = "Si";
                } else {
                    var allDay = "No";
                }
                //Componente HTML para mostrar la descripcion de la evento (Tooltip)
                var tooltip =
                    `<div 
                        class="tooltipevent" 
                        style=" border: 1px solid #d2d2d2;
                                width:210px;
                                height:auto;
                                padding:10px;
                                background:#fff;
                                position:absolute;
                                z-index:10001;
                                background-color: #fff;
                                color:#676a6c;">
                        <div class="">
                            <div class="border-bottom" style="margin-bottom: 5px;">
                                <h4 style="text-align: left;margin-bottom: 5px;">${event.title}</h4>
                            </div>
                            <div >
                                <ul class="unstyled" style="margin-bottom: 0px;text-align:left;padding-left:0;" id="list-dates">
                                    <li><strong>Inicio: </strong>${event.start.format("YYYY-MM-DD hh:mm a")}</li>
                                    <li><strong>Fin: </strong>${event.end.format("YYYY-MM-DD hh:mm a")}</li>
                                    <hr style="margin-top: 5px;margin-bottom: 5px;">
                                    <li><strong>Dirección: </strong>${event.dirClient}</li>
                                    <li><strong>Contacto: </strong>${event.contactClient}</li>
                                    <li><strong>Teléfono: </strong>${event.telClient}</li>
                                </ul>
                            </div>
                        </div>
                    </div>`;
                //Agrega el elemento al DOM
                $("body").append(tooltip);
                //Eventos cuando el mouse esta dentro de la evento
                $(this).mouseover(function (e) {
                    $(this).css('z-index', 10000); //Mueve el tooltip con el mouse
                    $('.tooltipevent').fadeIn('500');
                    $('.tooltipevent').fadeTo('10', 1.9);
                }).mousemove(function (e) {
                    $('.tooltipevent').css('top', e.pageY + 10);
                    $('.tooltipevent').css('left', e.pageX + 20);
                });
            },

            //Evento de quitar el tooltip cuando el mouse está fuera de la evento
            eventMouseout: function (calEvent, jsEvent) {
                $(this).css('z-index', 8);
                $('.tooltipevent').remove();
            },

            //Evento de eliminar evento, cuando el usuario hace click en alguna de ellas
            eventClick: (event, jsEvent, view) => {
                infoServiceSelected.id = event.id;
                infoServiceSelected.duration = event.duration;
                inicio_servicio = event.start.format("YYYY-MM-DD HH:mm:ss");
                $("#div-opciones").empty();
                //Añadir opciones al modal de ver servicio
                $("#div-opciones").append(
                    `<label>Opciones: </label>
                    <a href="/servicios/${event.id}" class="btn btn-default btn-outline" id="btn-editar-servicio" title="Editar Servicio">
                        <i class="fa fa-edit"></i>
                    </a>
                    <!--<button class="btn btn-default btn-outline" id="btn-imprimir-servicio" onclick="printOptions()" title="Imprimir Documentos">
                        <i class="fa fa-print"></i>
                    </button>-->
                    <button class="btn btn-default btn-outline" id="btn-eliminar-servicio" onclick="deleteEvent(${event.id})" title="Eliminar Servicios">
                        <i class="fa fa-trash-o"></i>
                    </button>`
                )
                //Variables locales
                var id_servicio = event.id;
                var nombre_sede;
                var direccion_cliente;
                var barrio_cliente;
                var telefono_cliente;
                var nombre_contacto;
                var observaciones;
                crsfToken = document.getElementsByName("_token")[0].value;
                $("#ind-fac").removeClass('hidden')
                $("#info-client").empty();
                $("#tbody-tipos").empty();
                $("#tbody-tecnicos").empty();
                $("#btn-lock").empty(); //Limpia el boton de bloqueado
                $("#btn-lock").removeClass('active'); //Quita la clase css del elemento HTML
                //Peticion al servidor para obtener los datos del servicio seleccionado
                $.get(`/servicios/${event.id}/edit`)
                    .then((res) => {
                        console.log(res)
                        //Valida que el cliente sea persona natural o juridica
                        if (res[0].solicitud.sede) {
                            nombre_sede = res[0].solicitud.sede.nombre;
                            direccion_cliente = res[0].solicitud.sede.direccion;
                            barrio_cliente = res[0].solicitud.sede.barrio;
                            telefono_cliente = res[0].solicitud.sede.telefono_contacto;
                            nombre_contacto = res[0].solicitud.sede.nombre_contacto;
                        } else {
                            nombre_sede = 'Sede única';
                            direccion_cliente = res[0].solicitud.cliente.direccion;
                            barrio_cliente = res[0].solicitud.cliente.barrio;
                            telefono_cliente = res[0].solicitud.cliente.celular;
                            nombre_contacto = res[0].solicitud.cliente.nombre_contacto;
                        }
                        //Valida si el servicio esta bloqueado o no
                        infoServiceSelected.state = res[0].confirmado;
                        if (res[0].confirmado === 0) {
                            $("#btn-lock").append(`<i class="fa fa-unlock"></i> Desbloqueado`);
                        } else {
                            $("#btn-lock").append(`<i class="fa fa-lock"></i> Bloqueado`)
                                .addClass('active');
                        }
                        //Conversiones y procesamiento de las fechas para su correcta visualización
                        var date1 = moment(res[0].fecha_inicio + " " + res[0].hora_inicio,
                            "YYYY-MM-DD HH:mm").format('YYYY-MM-DD hh:mm a');
                        var date2 = moment(res[0].fecha_fin + " " + res[0].hora_fin,
                            "YYYY-MM-DD HH:mm").format('YYYY-MM-DD hh.mm a');
                        var hours = Math.floor((res[0].duracion) / 60);
                        var minutes = (res[0].duracion % 60);
                        //Llena los input con los valores de la respuesta del servidor
                        $("#ver_nombre_cliente").val(res[0].solicitud.cliente.nombre_cliente);
                        $("#ver_nombre_sede").val(nombre_sede);
                        $("#ver_direccion_sede").val(direccion_cliente);
                        $("#ver_barrio_sede").val(barrio_cliente);
                        $("#ver_contacto_sede").val(nombre_contacto);
                        $("#ver_telefono_sede").val(telefono_cliente);
                        $("#ver_hora_inicio").val(date1);
                        $("#ver_datos_fin").val(date2);
                        $("#ver_frecuencia").val(res[0].frecuencia).change();
                        $("#ver_duracion").val(hours + " hora(s) " + minutes + " minuto(s)");
                        $("#ver_instrucciones").val(res[0].solicitud.observaciones);
                        res[0].tipos.forEach((value, index) => {
                            if (value.pivot.valor) {
                                $("#tbody-tipos").append(
                                    `<tr>    
                                        <td>${index + 1}</td>
                                        <td>${value.nombre}</td>
                                        <td><input id="num-factura-${value.pivot.id_servicio_tipo}" class="form-control" type="number" value="${parseInt(value.pivot.numero_factura)}"/></td>
                                        <td><input id="val-factura-${value.pivot.id_servicio_tipo}" class="form-control" type="number" value="${parseInt(value.pivot.valor)}"/></td>
                                        <td><button class="btn btn-primary" id="btn-save-fac-${value.pivot.id_servicio_tipo}" onclick="assignBill(${value.pivot.id_servicio_tipo})" ${value.pivot.valor ? 'disabled="disabled"' : ''}><i class="fa fa-save"></i></button></td>
                                    </tr>`);
                            } else {
                                $("#tbody-tipos").append(
                                    `<tr>    
                                        <td>${index + 1}</td>
                                        <td>${res[0].solicitud.detalle_servicios[index].tipo_servicio}</td>
                                        <td><input id="num-factura-${value.pivot.id_servicio_tipo}" class="form-control" type="number" value=""/></td>
                                        <td><input id="val-factura-${value.pivot.id_servicio_tipo}" class="form-control" type="number" value="${parseInt(res[0].solicitud.detalle_servicios[index].valor_servicio)}"/></td>
                                        <td><button class="btn btn-primary" id="btn-save-fac-${value.pivot.id_servicio_tipo}" onclick="assignBill(${value.pivot.id_servicio_tipo})"><i class="fa fa-save"></i></button></td>
                                    </tr>`);
                            }
                        });
                        res[0].tecnicos.forEach((value, index) => {
                            $("#tbody-tecnicos").append(
                                `<tr>    
                                <td>${index + 1}</td>
                                <td>${value.nombre}</td>
                            </tr>`);
                        });
                        if (res[0].factura) {

                            $("#num-fac").val(res[0].factura.numero_factura);
                            $("#val-fac").val(res[0].factura.valor);
                        } else {
                            $("#num-fac").val('');
                            $("#val-fac").val('');
                        }
                        if (res[0].solicitud.cliente.estado_facturacion !== "Normal") {
                            $("#info-client").append(
                                `<label class="label label-danger">Cliente en mora</label>`);
                        }
                        //Quita el loader de la vista
                        $(".modal-body").removeClass('sk-loading');
                        console.log('GET ver servicios Successfully');
                        if (res[0].tipo == 'Neutro') {
                            $("#ver_nombre_cliente_3").val(res[0].solicitud.cliente
                                .nombre_cliente);
                            $("#ver_nombre_sede_3").val(nombre_sede);
                            $("#ver_direccion_sede_3").val(direccion_cliente);
                            $("#ver_barrio_sede_3").val(barrio_cliente);
                            $("#ver_contacto_sede_3").val(nombre_contacto);
                            $("#ver_telefono_sede_3").val(telefono_cliente);
                            $("#ver_observaciones_3").val(res[0].observaciones);
                            document.getElementById("btn-modal3").click()
                            return;
                        }
                        if (res[0].tipo == 'Mensajeria') {
                            $("#ver_nombre_cliente_4").val(res[0].solicitud.cliente
                                .nombre_cliente);
                            $("#ver_nombre_sede_4").val(nombre_sede);
                            $("#ver_direccion_sede_4").val(direccion_cliente);
                            $("#ver_barrio_sede_4").val(barrio_cliente);
                            $("#ver_contacto_sede_4").val(nombre_contacto);
                            $("#ver_telefono_sede_4").val(telefono_cliente);
                            $("#ver_observaciones_4").val(res[0].observaciones);
                            document.getElementById("btn-modal4").click()
                            return;
                        }
                        document.getElementById("btn-modal2").click();
                    })
                    .catch((err) => {
                        $(".modal-body").removeClass('sk-loading');
                        console.log(err);
                    })

            }
        });

        function addSources(res) {
            res.forEach(tecnico => {
                $('#calendar').fullCalendar('addEventSource',
                    `/servicios/show/${tecnico.id}`
                ); //Añade el source servicios de cada tecnico
                $(`#tecnico-${tecnico.id}`).click(e => {
                    if ($(`#tecnico-${tecnico.id}`).is(
                        ':checked')) { //Valida si el checkbox esta activo
                        $('#calendar').fullCalendar('addEventSource',
                            `/servicios/show/${tecnico.id}`)
                    } else {
                        $('#calendar').fullCalendar('removeEventSource',
                            `/servicios/show/${tecnico.id}`
                        ) //Elimina del calendario los servicios segun el id del tecnico seleccionado
                    }
                })
            });
        }

        $.get('/tecnicos')
            .then(res => {
                //$("#calendar").fullCalendar('addEventSource', '/servicios')
                tecnicos = res
                addSources(tecnicos)
                $('#calendar').fullCalendar('addEventSource',
                    `/servicios/show/neutro`); //Añade el source servicios de cada tecnico
                $("#neutros").click(e => {
                    if ($(`#neutros`).is(
                        ':checked')) { //Valida si el checkbox esta activo
                        $('#calendar').fullCalendar('addEventSource',
                            `/servicios/show/neutro`)
                    } else {
                        $('#calendar').fullCalendar('removeEventSource',
                            `/servicios/show/neutro`
                        ) //Elimina del calendario los servicios segun el id del tecnico seleccionado
                    }
                })

                $('#calendar').fullCalendar('addEventSource',
                    `/servicios/show/mensajeria`); //Añade el source servicios de cada tecnico
                $("#mensajeria").click(e => {
                    if ($(`#mensajeria`).is(
                        ':checked')) { //Valida si el checkbox esta activo
                        $('#calendar').fullCalendar('addEventSource',
                            `/servicios/show/mensajeria`)
                    } else {
                        $('#calendar').fullCalendar('removeEventSource',
                            `/servicios/show/mensajeria`
                        ) //Elimina del calendario los servicios segun el id del tecnico seleccionado
                    }
                })


                console.log("Add source events")
            })
            .catch(err => {
                console.log(err)
            })


        function obtenerClienteSede(idCliente, numberFilter) {
            //Valida si el cliente esta en Mora
            info_clientes.forEach(cliente => {
                if (id_cliente == cliente.id) {
                    if (cliente.estado_facturacion !== "Normal") {
                        swal('¡Advertencia!', 'El cliente seleccionado se encuentra en mora.',
                            'warning');
                        $("#create-services").attr('disabled', 'disabled')
                    } else if (!cliente.estado_facturacion) {
                        $("#create-services").prop('disabled', false)
                    } else {
                        $("#create-services").prop('disabled', false)
                    }
                }
            })

            //Peticion GET al servidor a la ruta /sedes/clientes/{id} (Sedes de cliente)
            $.get(`/sedes/cliente/${id_cliente}`, function (res) {
                if(numberFilter === 1){
                    establecerSede('select_sedes', res)
                } else {
                    establecerSede('select_sedes_2', res)
                }
            }).then((res) => {
                console.log('Petición Exitosa');
            }).catch((err) => {
                console.log(err);
            });
        }

        function establecerSede(idSelect, res){
            $(`#${idSelect}`).empty(); //Limipia el select
            $(`#${idSelect}`).append(
                `<option value='' disabled selected> Selecciona una sede </option>`);
            if (res == '') { //Valida que el cliente tenga sedes
                $(`#${idSelect}`).append(`<option value="0"> Sede Única </option>`);
            } else {
                //Recorre la respuesta del servidor
                res.forEach(element => {
                    //Añade Options al select de sedes dependiendo de la respues del servidor
                    $(`#${idSelect}`).append(
                        `<option value=${element.id}> ${element.nombre} </option>`
                    );
                });
            }
        }

        //Change del input de autocompletado
        $input.change(function () {
            var current = $input.typeahead("getActive");
            id_cliente = current.id;
            obtenerClienteSede(id_cliente,1)
        });

        $input2.change(function () {
            let current = $input2.typeahead("getActive");
            id_cliente = current.id;
            obtenerClienteSede(id_cliente,2)
        })

        //Peticion al servidor para obtener la solicitud de una sede
        function obtenerSolicitudSede(id_sede, crsfToken) {
            $.ajax({
                url: '/solicitud/show',
                data: {
                    'id_cliente': id_cliente,
                    'id_sede': id_sede,
                    '_token': crsfToken //Obligatorio
                },
                type: 'POST',
                header: {
                    "Content-Type": 'application/x-www-form-urlencoded',
                    "X-CSRF-TOKEN": crsfToken //Token de segurodad (Obligatorio)
                },
                success: function (res) {
                    if (res == '') { //Valida que la respueta este vacia
                        swal('¡Error!', 'Esta sede no tiene una solicitud a programación.',
                            'error');
                        $(".list-group-item").remove();
                        $("#dir_sede").val('');
                        $("#barrio_sede").val('');
                        $("#contacto_sede").val('');
                        $("#tel_sede").val('');
                        $("#ema_sede").val('');
                        $("#cel_sede").val('');
                        $("#select_frecuencia").val('0').change();
                        $("#hora_inicio").val('');
                        $("#num_horas").val('');
                        $("#num_minutos").val('');
                        $('#select_servicios').select2("val", "");
                        $('#select_tecnicos2').select2("val", "");
                        $("#text-instrucciones").val('');
                        $("#sug_frecuency").val('');

                        id_solicitud = '';
                    } else {
                        $("#text-instrucciones").val(res[0]['observaciones']);
                        $("#dir_sede").val(res[0].direccion);
                        $("#barrio_sede").val(res[0].barrio);
                        $("#contacto_sede").val(!res[0].nombre_contacto_inicial ? res[0]
                            .nombre_contacto : res[0].nombre_contacto_inicial);
                        $("#tel_sede").val(res[0].telefono_contacto);
                        $("#ema_sede").val(res[0].email_contacto || res[0].email_contacto_inicial);
                        $("#cel_sede").val(res[0].celular_contacto || res[0].telefono_contacto);
                        // $("#sug_frecuency").val(res[0]['frecuencia'])
                        //Inicializacion del Popover
                        $('#historial_tecnicos').popover({
                            title: "Historial de Tecnicos",
                            container: false,
                            animation: true,
                            html: true,
                            placement: 'left',
                            template: '<div class="popover" role="tooltip" style="top: -1.93333px; left: 55px; display: block;width: 250px;"><div class="arrow"></div><h3 class="popover-title" style="text-align: center;"></h3><div class="popover-content"></div></div>',
                            content: function () {
                                return $("#list-historic")
                                    .html(); //Retorna el contenido del HTML que se encuentra dentro del ID seleccionado
                            }
                        });
                        id_solicitud = res[0]['id_solicitud'];
                        //Servicio para obtener el historia de tecnicos del cliente seleccionado
                        $.get(`/tecnicos/${id_solicitud}`)
                            .then((data) => {
                                $(".list-group-item")
                                    .remove(); //Quita los elementos del DOM que contengan esta clase
                                if (data == '') { //Valida que haya tenido servicios
                                    $("#list-tecnicos").append(
                                        `<li class="list-group-item" style="text-align: center">Todavia no hay servicios en esta sede.</li>`
                                    ); //Agreaga elementos HTML en el elem con el ID seleccionado
                                } else {
                                    data.forEach((value, index) => {
                                        $("#list-tecnicos").append(
                                            `<li class="list-group-item" style="text-align: center" id="tec${index}" onmouseover="tool(${index},${value.id},${id_solicitud})" onmouseout="quit(${index})">${value.nombre}</li>`
                                        );
                                    });

                                }
                            });
                        frecuencia_solicitud = res[0][
                            'frecuencia'
                        ]; //Guarda la frecuencia en la variable publica
                        $("#select_frecuencia").val(frecuencia_solicitud)
                            .change(); //Cambia el valor del input   

                        $.get(`/temporales/novedad/${id_cliente}/${id_sede}`)
                            .then(res => {
                                res.forEach((novedad, index) => {
                                    $("#lista-servicios").append(`
                                        <li class="item-list" id="item-novedad-${novedad.id}">
                                            <input type="checkbox" value="${novedad.id}" id="check-${index}"/>
                                            <span class="m-l-xs">${novedad.descripcion}</span>
                                        </li>
                                    `);

                                    document.getElementById(`check-${index}`)
                                        .addEventListener('click', e => {
                                            $.ajax({
                                                url: `/temporales/novedad/${e.target.value}`,
                                                type: 'DELETE',
                                                header: {
                                                    "Content-Type": 'application/x-www-form-urlencoded',
                                                    "X-CSRF-TOKEN": crsfToken //Token de segurodad (Obligatorio)
                                                },
                                                success: (res) => {
                                                    url: `/temporales/novedad/${e.target.value}`,
                                                        $(
                                                            `#item-novedad-${e.target.value}`
                                                        )
                                                            .remove();
                                                },
                                                error: (err) => {
                                                    console.log(err)
                                                }
                                            })
                                        })
                                })
                            })
                            .catch(err => {
                                console.log(err)
                            })

                        $.get(`/show/inspections/${id_cliente}/${id_sede}`)
                            .then(res => {
                                solicitudes = res;
                                $("#select_solicitudes").empty(); //Limipia el select
                                $("#select_solicitudes").append(
                                    `<option value='' disabled selected> Selecciona una solicitud </option>`
                                );

                                res.forEach((value, index) => {
                                    $("#select_solicitudes").append(
                                        `<option value="${value.id}">${value.codigo} - ${value.fecha} ${value.estado_agenda !== 'nuevo' ? '- Agendado' : ''}</option>`
                                    )
                                })
                            })
                            .catch(err => {
                                console.log(err)
                            })
                    }
                },
                error: function (err) {
                    swal('¡Error!', 'Error al obtener la información de la sede', 'error');
                }
            });
        }

        $("#select_solicitudes").change(e => {
            $("#frecuencia_solicitud").val('');
            $("#valor_plan_solicitud").val('');
            $("#frecuencia_visitas_solicitud").val('');
            $("#valor_servicios_solicitud").val('');
            $("#tipo_facturacion_solicitud").val('');
            $("#observaciones_visitas_solicitud").val('');
            $("#more-solicitud").empty();
            solicitudSeleccionada = e.target.value
            solicitudes.forEach((value, index) => {
                if (value.id == e.target.value) {

                    // Añadir los tipos de servicios al select de tipos de servicio
                    if (value.detalle_servicios.length > 0) {
                        let tiposServiciosSeleccionados = []
                        tiposServicios.forEach(tipo => {
                            value.detalle_servicios.forEach(tipoSolicitud => {
                                if (tipo.nombre == tipoSolicitud
                                    .tipo_servicio) {
                                    tiposServiciosSeleccionados.push(tipo.id
                                        .toString())
                                }
                            })
                        })
                        // $("#select_servicios").select2('val', tiposServiciosSeleccionados)
                    }

                    $("#frecuencia_solicitud").val(value.detalle_servicios[0].frecuencia_servicio)
                    $("#valor_plan_solicitud").val(value.valor_plan_saneamiento.toString())
                    $("#frecuencia_visitas_solicitud").val("Cada " + value.frecuencia_visitas +
                        " días")
                    $("#valor_servicios_solicitud").val(value.total_detalle_servicios
                        .toString())
                    $("#tipo_facturacion_solicitud").val(value.tipo_facturacion)
                    $("#observaciones_visitas_solicitud").val(value.detalle_servicios[0].observacion_servicio)
                    $("#more-solicitud").append(
                        `<a class="pull-right" href="/solicitud/${value.id}/edit">Ver más datos</a>`
                    )

                    $("#numero_visitas").val(value.visitas.length.toString());
                    $("#tipo_servicio").val(value.detalle_servicios[0].tipo_servicio);
                    $("#sug_frecuency").val(value.detalle_servicios[0].frecuencia_servicio);
                }
            })
        })

        //Evento change del select de Sedes
        $("#select_sedes").change(event => {
            crsfToken = document.getElementsByName("_token")[0].value;
            var id_sede = $("#select_sedes").val();
            $("#frecuencia_solicitud").val('');
            $("#valor_plan_solicitud").val('');
            $("#frecuencia_visitas_solicitud").val('');
            $("#valor_servicios_solicitud").val('');
            $("#tipo_facturacion_solicitud").val('');
            $("#observaciones_visitas_solicitud").val('');
            //Referencia al metodo de obtener la solicitud del cliente
            obtenerSolicitudSede(id_sede, crsfToken);
        });

        // Evento change del select de sedes 2
        $("#select_sedes_2").change(e => {
            id_sede = e.target.value;
        })

        $("#opcion-frecuencia").change(event => {
            addOptionsAtSelects('frecuencia', 'personalizada');
        })

        function saveService(unique) {
            if ($("#select_tipo_servicio").val() == '0') {
                swal('Información', 'Selecciona un tipo de servicio.', 'info')
                return
            }
            if ($("#num_horas").val() == '' || $("#num_minutos").val() == '') {
                if ($("#select_tipo_servicio").val() == 'Normal' || $("#select_tipo_servicio").val() ==
                    'Refuerzo') {
                    swal('Información', 'Número de horas o minutos inválido.', 'info')
                    return
                }
            }
            if ($("#indice-frecuencia").val() == '' || $("#opcion-frecuencia").val() == '') {
                if ($("#select_tipo_servicio").val() == 'Normal' || $("#select_tipo_servicio").val() ==
                    'Refuerzo') {
                    swal('Información', 'Selecciona una frecuencia válida.', 'info')
                    return
                }
            }

            //Declaracion de Variables locales de Servicio
            var duracion_servicio = (parseInt($("#num_horas").val()) * 60) + parseInt($("#num_minutos").val());
            var frecuencia;
            var start_event = inicio_servicio;
            var tipoServicio = $("#select_tipo_servicio").val();
            var observaciones = $("#text-instrucciones").val();
            frecuencia = parseInt($("#indice-frecuencia").val());
            var tecnicos = [];
            $("#select_tecnicos2").val().forEach((value, index) => {
                tecnicos[index] = value;
            });
            var tipos_servicio = [];
            $("#select_servicios").val().forEach((value, index) => {
                tipos_servicio[index] = value
            });

            //Prueba de fechas y horas
            console.log($("#hora_inicio").val()); //email, start1.format('YYYY-MM-DD HH:mm'));
            crsfToken = document.getElementsByName("_token")[0].value;
            var start_service = moment(start_event + $("#hora_inicio").val(), 'YYYY-MM-DD hh:mmA');
            var end_service = start_service.add(duracion_servicio || 30, 'minutes');
            //var horaInicioFormat = moment($("#hora_inicio").val(), 'hh:mmA').format('HH:mm');
            let dataToSend = {
                tipos: tipos_servicio.length != 0 ? tipos_servicio : 'sin servicios',
                frecuencia: frecuencia || 0,
                tipo_servicio: tipoServicio,
                start: start_event,
                hora_inicio: moment(start_event + $("#hora_inicio").val(), 'YYYY-MM-DD hh:mmA').format(
                    "HH:mm"),
                hora_fin: end_service.format("HH:mm"),
                duracion: duracion_servicio || 0,
                id_tecnicos: tecnicos.length != 0 ? tecnicos : 'sin tecnicos',
                id_solicitud: id_solicitud,
                opcionFrecuencia: '',
                diaOrdinal: '',
                nombreDia: '',
                dayOfWeek: '',
                diaDelMes: '',
                observaciones: observaciones,
                frecuenciaUnica: unique
            };
            if ($("#opcion-frecuencia").val() == 'semanas') {
                dataToSend.opcionFrecuencia = "semanas";
                dataToSend.dayOfWeek = $("#opcion-personalizada").val();
            } else if ($("#opcion-frecuencia").val() == 'meses') {
                dataToSend.opcionFrecuencia = "meses";
                let arrCustomOption = ($("#opcion-personalizada").val()).split('-');
                console.log(arrCustomOption);
                if (arrCustomOption[0] != 'all') {
                    dataToSend.diaOrdinal = arrCustomOption[0];
                    dataToSend.nombreDia = arrCustomOption[1];
                } else {
                    dataToSend.diaDelMes = arrCustomOption[1];
                }

            } else if ($("#opcion-frecuencia").val() == 'dias') {
                dataToSend.opcionFrecuencia = "dias";
            } else {
                dataToSend.opcionFrecuencia = "anios";
            }

            if ($("#select_tipo_servicio").val() == 'Normal' || $("#select_tipo_servicio").val() ==
                'Refuerzo') {
                if (dataToSend.id_tecnicos == 'sin tecnicos' || dataToSend.tipos == 'sin servicios') {
                    swal('Información', 'Selecciona al menos un técnico y servicio.', 'info')
                    return
                }
            }
            //Alert de confirmacion
            swal({
                title: "¡Advertencia!",
                text: "¿Estás seguro de guardar este servicio?",
                icon: "warning",
                buttons: {
                    cancel: true,
                    confirm: {
                        text: 'Aceptar',
                        visible: true,
                        value: true,
                        closeModal: false, //Muestra el Loader
                    }
                }
            })
                .then(isConfirm => {
                    if (isConfirm) {
                        $.ajax({
                            url: '/edit/inspection/state',
                            data: { estado_agenda: 'agendado', id: solicitudSeleccionada },
                            type: 'PUT',
                            headers: {
                                "Content-Type": 'application/x-www-form-urlencoded',
                                "X-CSRF-TOKEN": crsfToken //Token de seguridad
                            }
                        })
                            .then(() => {
                                //Peticion HTTP para guardar el evento
                                $.ajax({
                                    url: '/servicios', //URL del servicio
                                    data: dataToSend,
                                    type: "POST", //Método de envío
                                    headers: {
                                        "Content-Type": 'application/x-www-form-urlencoded',
                                        "X-CSRF-TOKEN": crsfToken //Token de seguridad
                                    },

                                })
                                    .then(events => {
                                        swal("¡Creación Correcta!", "Servicios creados correctamente.",
                                            "success")
                                            .then(value => { //Boton OK actualizado
                                                if (value) {
                                                    console.log('Evento creado'); //Escribe en la consola
                                                    $("#btn-close2").click();
                                                    // addSources(tecnicos)
                                                    $('#calendar').fullCalendar(
                                                        'refetchEvents'
                                                    ); //Refresca todos los eventos dentro del calendario
                                                }
                                            })
                                    })
                                    .catch(error => {
                                        swal("¡Error!", 'Ha ocurrido un error al intentar crear los servicios',
                                            "error")
                                    })
                            })
                            .catch(err => {
                                console.log(err);

                            })

                        console.log(dataToSend)
                    }
                })
        }

        //Evento Submit del modal de crear Servicio
        $('#form-calendario').submit(event => {
            event.preventDefault();
            saveService("duplicado");
        });

        $("#btn-unique").click(function () {
            saveService("unico");
        })

        //Evento click del boton de imprimir Modal (Crear Servicio)

        // $("#btn-print").click(event => {
        $("#btn-imprimir-servicio").click(event => {
            console.log("event.target");
            event.preventDefault();

            // var url="/eventos/index";
            // $('#calendar').fullCalendar({ events: {url: url}    });//Refresca todos los eventos dentro del calendario
            // $('#calendar').fullCalendar('removeEvents');
            // $('#calendar').fullCalendar('addEventSource', url);
            // $('#event-option')
            // .modal('hide')                          //Oculta el modal abierto
            // .on('hidden.bs.modal', function (e) {   //Evento de ocultar el modal abiert
            //     $('#event-print').modal('show');    //Muestra el nuevo modal

            //     $(this).off('hidden.bs.modal');     // Quita el evento del objeto actual
            // });
        });


        $("#form-print").submit(event => {
            event.preventDefault();
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
            })
            $('#event-print')
                .modal('hide')
        })


        /* Módulo de impresion de documentos por tecnico
        --------------------------------------------------------------------*/

        /**
         * Obtiene los servicios dentro de un rango de fechas
         * @param idTecnicos: ID del Tecnico seleccionado
         * @param dateStart: Fecha de inicio de la busqueda
         * @param dateEnd: Fecha de fin de la busqueda
         */
        function getServicesByDates(idTecnician, dateStart, dateEnd) {
            $.get(`/tecnicos/serviciosPorFecha/all/${dateStart}/${dateEnd}`)
                .then((res) => {
                    $("#loader-impresion").remove();
                    //Variables de fechas
                    var dateStart, dateEnd, diffDates;
                    //Recorre los servicios retornados
                    if (res.length == 0) {
                        $("#lista-servicios-impresion").append(`
                            <li class="item-list" >
                                <span>No hay servicios en esta fecha</span>
                            </li>
                        `)
                    } else {

                        res.forEach((value, index) => {
                            //Formate las fechas con Moment
                            dateStart = moment(value.start); //Hora Inicio del servicio
                            dateEnd = moment($("#fecha_inicio_impresion").val(), 'YYYY-MM-DD').tz('America/Bogota'); //Hora Actual Colombia
                            diffDates = dateStart.diff(dateEnd, 'hours');
                            if (diffDates >= 24) { //Valida la diferencia de fechas en Dias
                                $("#lista-servicios").append(`
                                    <li class="item-list" id="${index}">
                                        <input type="radio" value="${value.id}"  name="selected-service" class="i-checks"/>
                                        <span class="m-l-xs"><a id="${value.id}" class="text-primary" href="#" onclick="return false;">${value.nombre}</a> ${value.direccion}</span>
                                        <!--<small class="label label-info pull-right"><i class="fa fa-clock-o"></i> ${dateStart.diff(dateEnd, 'days')} días</small>-->
                                    </li>
                                `);
                                /** Inicializacion del iCheck **/
                                $('.i-checks').iCheck({
                                    checkboxClass: 'icheckbox_square-green',
                                    radioClass: 'iradio_square-green'
                                });
                            } else if (diffDates >= 0 && diffDates <=
                                1) { //Valida la diferencia de fechas en Minutos
                                $("#lista-servicios-impresion").append(`
                                    <li class="item-list" id="${index}">
                                        <input type="radio" value="${value.id}"  name="selected-service" class="i-checks"/>
                                        <span class="m-l-xs"><a id="${value.id}" class="text-primary" href="#" onclick="return false;">${value.nombre}</a> ${value.direccion}</span>
                                        <!--<small class="label label-danger pull-right"><i class="fa fa-clock-o"></i> ${dateStart.diff(dateEnd, 'minutes')} min</small>-->
                                    </li>
                                `);
                                /** Inicializacion del iCheck **/
                                $('.i-checks').iCheck({
                                    checkboxClass: 'icheckbox_square-green',
                                    radioClass: 'iradio_square-green'
                                });
                            } else if (diffDates < 0) { //Valida que hayan servicios realizados
                                $("#lista-servicios-impresion").append(`
                                    <li class="item-list" id="${index}">
                                        <input type="radio" value="${value.id}"  name="selected-service" class="i-checks"/>
                                        <span class="m-l-xs"><a id="${value.id}" class="text-primary" href="#" onclick="return false;">${value.nombre}</a> ${value.direccion}</span>
                                        <!--<small class="label label-default pull-right">Realizado</small>-->
                                    </li>
                                `);
                                /** Inicializacion del iCheck **/
                                $('.i-checks').iCheck({
                                    checkboxClass: 'icheckbox_square-green',
                                    radioClass: 'iradio_square-green'
                                });
                            } else { //Valida la diferencia de fechas en Horas
                                $("#lista-servicios-impresion").append(`
                                    <li class="item-list" id="${index}">
                                        <input type="radio" value="${value.id}"  name="selected-service" class="i-checks"/>
                                        <span class="m-l-xs"><a id="${value.id}" class="text-primary" href="#" onclick="return false;">${value.nombre}</a> ${value.direccion}</span>
                                        <!--<small class="label label-primary pull-right"><i class="fa fa-clock-o"></i> ${diffDates} hors</small>-->
                                    </li>
                                `);
                                /** Inicializacion del iCheck **/
                                $('.i-checks').iCheck({
                                    checkboxClass: 'icheckbox_square-green',
                                    radioClass: 'iradio_square-green'
                                });
                            }
                        });
                    }
                })
                .catch((err) => {
                    console.log(err)
                })
        }

        /** Retorna las fechas seleccionadas **/
        function selectedDates(option) {
            var selectedDates;
            switch (option) {
                case '1':
                    selectedDates = {
                        start: moment().tz("America/Bogota").format('YYYY-MM-DD'),
                        end: moment().tz("America/Bogota").format('YYYY-MM-DD')
                    }
                    break;
                case '2':
                    selectedDates = {
                        start: moment().tz("America/Bogota").format('YYYY-MM-DD'),
                        end: moment().tz("America/Bogota").add(1, 'days').format('YYYY-MM-DD')
                    }
                    break;

                case '3':
                    selectedDates = {
                        start: daySelected,
                        end: daySelected
                    }
                    break;
                default:
                    selectedDates = {
                        start: $("#fecha_inicio_impresion").val(),
                        end: $("#fecha_inicio_impresion").val()
                    }
                    break;
            }
            return selectedDates;
        }

        /** Valida el estado del  checkbox de seleccionar todos **/
        function verifySelectedAll() {
            //Valida que no haya seleccionado ningun servicio
            if ($("#select-all:checked").length != 1 && !$("input[name='selected-service']:checked").val()) {
                return "None selected";
            }
            //Valida si el checkbox está checkeado
            else if ($("#select-all:checked").length == 1) {
                return true;
            }
            return false;

        }

        function obtenerServicios() {
            $("#lista-servicios-impresion").empty();
            $("#filter-state").empty();
            //Valida la opcion de filtro de servicios
            // switch ($("input[name='option-filter']:checked").val()) {
            //     case '1': //Fecha Actual
            //         getServicesByDates($("#select_tecnicos").val(), moment().tz("America/Bogota")
            //             .format('YYYY-MM-DD'), moment().tz("America/Bogota").format('YYYY-MM-DD'));
            //         $("#filter-state").append("(Filtro aplicado)");
            //         filterState = true;
            //         break;
            //     case '2': //Fecha Mañana
            //         getServicesByDates($("#select_tecnicos").val(), moment().tz("America/Bogota")
            //             .format('YYYY-MM-DD'), moment().tz("America/Bogota").add(1, 'days').format(
            //                 'YYYY-MM-DD'));
            //         $("#filter-state").append("(Filtro aplicado)");
            //         filterState = true;
            //         break;
            //     case '3': //Fecha Seleccionada
            //         getServicesByDates($("#select_tecnicos").val(), daySelected, daySelected);
            //         $("#filter-state").append("(Filtro no aplicado)");
            //         filterState = false;
            //         break;
            //     default:
            //         console.log("Uknown option")
            //         break;
            // }
            getServicesByDates($("#select_tecnicos").val(), $("#fecha_inicio_impresion").val(), $("#fecha_inicio_impresion").val());
            $("#filter-state").append("(Filtro aplicado)");
            filterState = true;
        }

        //Evento Click en filtro por rango de fechas
        $("#filter-dates").click(event => {
            obtenerServicios()
        })


        /**
         * Abre la pestaña con la informacion de la opcion de impresion seleccionada
         * @param option: Opcion de impresion
         * @param idTecnico: ID del Tecnico seleccionado
         * @param idService: ID  del servicio seleccionado
         **/
        function printOptions(option) {
            let dates = selectedDates($("input[name='option-filter']:checked").val());
            let verifySelected = verifySelectedAll();
            if (verifySelected === true) {
                //Valida que el filtro por fechas esté aplicado
                if (filterState === true) {
                    //Envia el rango de fechas seleccionadas
                    window.open(
                        `/tecnicos/imprimir-${option}/all/${dates.start}/${dates.end}/all`
                    );
                } else {
                    window.open(
                        `/tecnicos/imprimir-${option}/all/${daySelected}/${daySelected}/all`
                    );
                }
            } else if (!verifySelected) {
                //Envia el ID del servicio seleccionado en los Radiobuttons
                if (filterState === true) {
                    window.open(
                        `/tecnicos/imprimir-${option}/all/${dates.start}/${dates.end}/${$("input[name='selected-service']:checked").val()}`
                    );
                } else {
                    window.open(
                        `/tecnicos/imprimir-${option}/all/${daySelected}/${daySelected}/${$("input[name='selected-service']:checked").val()}`
                    );
                }
            } else {
                swal("Información", "Selecciona al menos un servicio antes de imprimir", "info")
            }
        }

        // Abrir el modal de impresion
        $("#btn-imprimir").click(() => {
            $("#lista-servicios-impresion").empty();
            $("#btn-modal-p-o").click();
        })

        //Evento Click del boton de imprimir solo ordenes de servicio
        $("#print-ods").click(event => {
            printOptions('ods')
        })

        // Evento click para imprimir certificado
        $("#print-ctf").click(event => {
            printOptions('ctf')
        })

        // Evento click para imprimir la ruta de tecnicos
        $("#print-rt").click(event => {
            printOptions('horarios')
        })

        //Evento click del checkbox de Seleccionar todos
        $("#select-all").click(event => {
            if ($("#select-all:checked").length == 1) {
                //Deshabilita los Radio Buttons
                $("input[name=selected-service]").attr("disabled", "disabled");
            } else {
                //Habilita los Radio Buttons
                $("input[name=selected-service]").removeAttr("disabled");
            }
        })

        /* Modulo de busqueda de servicios
        --------------------------------------------------------------------*/

        $("#btn-search-service").click(e => {
            $("#list-services").empty();
            $("#list-services").append(`
                <div class="sk-spinner sk-spinner-pulse" id="loader-search-service"></div>
            `)
            $.get(`/servicios/list/${id_cliente}/${id_sede}`)
            .then(res => {
                $("#loader-search-service").remove();
                if(res.length > 0){
                    res.forEach(servicio => {
                        let momentDateStart = moment(servicio.start, 'YYYY-MM-DD HH:mm:ss');
                        let momentDateEnd   = moment(servicio.end, 'YYYY-MM-DD HH:mm:ss');
                        $("#list-services").append(`
                            <div class="col-sm-12">
                                <a href="/ordenes/${servicio.id}" style="text-decoration: none; color: #fff">
                                    <div class="widget style1" style="background-color: ${servicio.backgroundColor}">
                                        <div class="row">
                                            <div class="col-md-2 m-t-xs" style="padding: 0 28px">
                                                <h4 class="m-b-xxs" style="font-size: 15px; margin-top: 2px">
                                                    ${momentDateStart.format('MMM').toUpperCase()}
                                                </h4>
                                                <h2 class="font-bold m-b-xs">${momentDateStart.format('DD')}</h2>
                                            </div>
                                            <div class="col-md-8 m-t-xs no-padding">
                                                <span>
                                                    ${servicio.title} - ${ servicio.sede }
                                                </span>
                                                <br>
                                                <p>${momentDateStart.format('h a')} - ${momentDateEnd.format('h a')} - ${servicio.dirClient}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `)
                    })
                } else {
                    $("#list-services").append(`
                        <span>No se encontraron servicios.</span>
                    `)
                }
            })
            .catch(err => {
                $("#loader-search-service").remove();
                console.log(err);
            })
        })



    });

    /* Eventos para Modales y Botones de Impresion y Eliminacion de Servicios
    ------------------------------------------------------------------------*/

    //Variables globales
    var idEventVal;

    /**
     * Obtiene el texto en español del lugar del dia en el mes.
     * @param {Number} weekContainer: Numero de la semana que contiene el dia seleccionado
     * @return {Array} Texto en español. 
     **/
    function getOrdinalDay(weekContainer) {
        console.log(weekContainer)
        let text = [];
        switch (weekContainer) {
            case 1:
                text = ['Primer', 'First'];
                break;
            case 2:
                text = ['Segundo', 'Second'];
                break;
            case 3:
                text = ['Tercer', 'Third'];
                break;
            case 4:
                text = ['Cuarto', 'Fourth'];
                break;
            default:
                text = ['Último', 'Last'];
                break;
        }
        return text;
    }

    /**
     * Obtiene el numero de la semana en la que se encuentra un dia del mes
     * @param {Number} year: El presente año
     * @param {Number} month: El mes seleccionado en el calendario
     * @param {Number} numberOfDay: Numero del dia en el mes seleccionado
     * @return {Number} Retorna el numero de la semana que contiene el dia evaluado
     **/
    function getWeeksContainerOfDay(year, month, numberOfDay, indexDay) {
        //Declara las variables de inicio y fin
        var monthStart = moment().year(year).month(month).date(1);
        var monthEnd = moment().year(year).month(month).endOf('month');
        var numDaysInMonth = moment().year(year).month(month).endOf('month').date();
        var numberDay = numberOfDay;
        //Calculas las semanas del mes recibido
        var weeks = Math.ceil((numDaysInMonth + monthStart.day()) / 7);
        var weekRange = [];
        var weekStart = moment().year(year).month(month).date(1);
        var i = 0;
        var j = 1;

        while (i < weeks) {
            var weekEnd = moment(weekStart);
            var daysOfWeek = [];
            var indexDayOfWeek = [];
            //valida que el ultimo dia de la semana sea menor que el numero de dias del mes dado
            //y que la semana evaluada pertenezca al mes dado
            if (weekEnd.endOf('week').date() <= numDaysInMonth && weekEnd.month() == month) {
                //Obtiene el dia de fin de la semana
                weekEnd = weekEnd.endOf('week').format('DD');
            } else {
                //Obtiene el dia de fin de la semana
                weekEnd = moment(monthEnd);
                weekEnd = weekEnd.format('DD')
            }
            //Crea un array de el numero del dia en el mes por cada semana obtenida en el ciclo
            while (j <= parseInt(weekEnd)) {
                //Agrega un elemento al array
                daysOfWeek.push(j);
                indexDayOfWeek.push(moment(`${year}-${month + 1}-${j}`, "YYYY-MM-DD").day())
                j++;
            }

            //Agrega un elemento al array
            weekRange.push({
                'weekStart': weekStart.format('DD'),
                'weekEnd': weekEnd,
                'daysOfWeek': daysOfWeek,
                'indexDayOnWeek': indexDayOfWeek,
                'numberOfWeek': i + 1
            });

            weekStart = weekStart.weekday(7);
            i++;
        }

        //Recorre el rango de las fechas
        weekRange.forEach((value, index) => {
            //valida que el numero del dia dado, esté contenido dentro del array
            //de de dias de cualquier semana del mes.
            if (value.daysOfWeek.includes(numberDay)) {
                //valida que el dia de la semana seleccionado se encuentre en el rango de la primera
                //semana del mes seleccionado 
                if (!weekRange[0].indexDayOnWeek.includes(indexDay)) {
                    //Asignar el valor de la semana contenedora
                    switch (value.numberOfWeek) {
                        case 2:
                            weekContainer = 1
                            break;
                        case 3:
                            weekContainer = 2;
                            break;
                        case 4:
                            weekContainer = 3;
                            break;
                        case 5:
                            //Valida que el mes seleccionado tenga 6 rangos de semanas
                            //y que el dia de la semana seleccionado no se encuentre en el ultimo rango de semanas
                            if (index == 5 && !weekRange[5].indexDayOnWeek.includes(indexDay)) {
                                weekContainer = 5;
                            } else if (index == 4 && weekRange[4].indexDayOnWeek.includes(indexDay) && month ==
                                1) {
                                weekContainer = 5;
                            } else {
                                weekContainer = 4;
                            }
                            break;
                        default:
                            weekContainer = 5;
                            break;
                    }
                } else {
                    //Valida que el dia de la semana seleccionado no esté contenido entre el ultimo rango de fechas
                    if (value.numberOfWeek == 4 && !weekRange[4].indexDayOnWeek.includes(indexDay)) {
                        weekContainer = 5;
                    } else {
                        weekContainer = value.numberOfWeek;
                    }
                }
            }
        });

        let text = getOrdinalDay(weekContainer);
        return text;
    }

    /**
     * Obtiene el nombre del dia en español
     * @param {Number} indexDay: Indice del dia en la semana
     * @return {String} El nombre del dia
     **/
    function getNameOfDaySpanish(indexDay) {
        let nameOfDaySpanish;
        switch (indexDay) {
            case 0:
                nameOfDaySpanish = 'domingo';
                break;
            case 1:
                nameOfDaySpanish = 'lunes';
                break;
            case 2:
                nameOfDaySpanish = 'martes';
                break;
            case 3:
                nameOfDaySpanish = 'miercoles';
                break;
            case 4:
                nameOfDaySpanish = 'jueves';
                break;
            case 5:
                nameOfDaySpanish = 'viernes';
                break;
            case 6:
                nameOfDaySpanish = 'sábado';
                break;
            default:
                console.log('default');
                break;
        }
        return nameOfDaySpanish;
    }

    /**
     * Añade y cambia propiedades de los inputs(selects) con el ID seleccionado
     * @param {String} slctFrecuency: ID del Input de opciones de frecuencia
     * @param {String} slctCustomOpt: ID del input de opciones personalizadas
     **/
    function addOptionsAtSelects(slctFrecuency, slctCustomOpt) {
        let dateSelected = moment(inicio_servicio);
        if ($(`#opcion-${slctFrecuency}`).val() == 'semanas') {
            $(`#opcion-${slctCustomOpt}`).empty();
            $(`#opcion-${slctCustomOpt}`).append(`
                <option value="1">Todos los lunes</option>
                <option value="2">Todos los martes</option>
                <option value="3">Todos los miércoles</option>
                <option value="4">Todos los jueves</option>
                <option value="5">Todos los viernes</option>
                <option value="6">Todos los sábados</option>
            `);
            $(`#opcion-${slctCustomOpt}`).val(dateSelected.day().toString()).change();
            $(`#opcion-${slctCustomOpt}`).attr("disabled", "disabled");
        } else if ($(`#opcion-${slctFrecuency}`).val() == 'meses') {
            $(`#opcion-${slctCustomOpt}`).empty();
            let ordinalTextOfDay = getWeeksContainerOfDay(dateSelected.year(), dateSelected.month(), dateSelected
                .date(), dateSelected.day());
            let nameOfDaySpanish = getNameOfDaySpanish(dateSelected.day());
            $(`#opcion-${slctCustomOpt}`).append(`
                <option value="all-${dateSelected.date()}">El ${dateSelected.date()} de cada mes</option>
                <option value="${ordinalTextOfDay[1]}-${dateSelected.format('dddd')}">El ${ordinalTextOfDay[0]} ${nameOfDaySpanish} de cada mes</option>
            `)
            $(`#opcion-${slctCustomOpt}`).prop("disabled", false);
        } else {
            $(`#opcion-${slctCustomOpt}`).empty();
            $(`#opcion-${slctCustomOpt}`).append(`
                <option value="">Opción personalizada</option>
            `);
        }
    }

    /**
     * Evento MouseOver del item de la lista del historial de tecnicos
     * Muestra el tooltip para cada elemento de la lista
     * @param {id} ID del elemento HTML
     * @param {tecnico} ID del tecnico (BD)
     * @param {id_solicitud} ID de la solicitud
     */
    function tool(id, tecnico, id_solicitud) {
        //Variable que guarda el contenido HTML del tooltip a mostrar
        var tooltip2 =
            `<div 
            class="tooltipevent" 
            style=" border: 1px solid #d2d2d2;
                    width:200px;
                    height:auto;
                    padding:10px;
                    color:inherit;
                    background:#fff;
                    position:absolute;
                    z-index:10001;
                    right: 230px;
                    bottom:-45px;
                    background-color: rgba(0,0,0,0.85);
                    color:#fff;">
            <div class="row">
                <h4>Fechas de servicios</h4>
                <div class="col-lg-12">
                    <ul class="list-group" style="margin-bottom: 0px;" id="list-dates">
                        <div class="sk-spinner sk-spinner-pulse" id="loader"></div>
                    </ul>
                </div>
            </div>
        </div>`;

        //Agrega el elemento al DOM (Elemento de la lista de historial de tecnicos)
        $(`#tec${id}`).append(tooltip2);
        //Peticion al servidor para obtener las fechas de los servicios realizados en esta sede por tecnico
        $.get(`/tecnicos/fechas/${id_solicitud}/${tecnico}`)
            .then((res) => {
                //Quita el loader
                $("#loader").remove();
                //Borra los items de la lista existente (tooltip)
                $(".date-service").remove();
                //Recorre el array de la respuesta del servidor
                res.forEach(value => {
                    //Añade un item a la lista de fechas (tooltip)
                    $("#list-dates").append(
                        `<li class="list-group-item date-service" style="border: none;">${value.fecha_inicio}</li>`
                    );
                })
            })
            .catch((err) => {
                console.log(err);
            })
    }


    /**
     * Quita el tooltip activado
     * @param {id} ID del elemento HTML
     */
    function quit(id) {
        $(".tooltipevent").remove();
    }

    /**
     * Mestra el modal de opciones de impresion
     * envia los datos del formulario
     */
    function printOptions() {
        console.log("Click!");
        $('#event-option')
            .modal('hide') //Oculta el modal abierto
            .on('hidden.bs.modal', function (e) { //Evento de ocultar el modal abiert
                $('#event-print').modal('show'); //Muestra el nuevo modal

                $(this).off('hidden.bs.modal'); // Quita el evento del objeto actual
            });
    }

    /**
     * Muestra el modal de Opciones de Eliminacion
     * @param {idElemento}
     */
    function deleteEvent(idEvent) {
        idEventVal = idEvent
        $('#event-option')
            .modal('hide') //Oculta el modal abierto
            .on('hidden.bs.modal', function (e) { //Evento de ocultar el modal abiert
                $('#modal-delete-options').modal('show'); //Muestra el nuevo modal

                $(this).off('hidden.bs.modal'); // Quita el evento del objeto actual
            });
    }

    $("#delete-neutral-service").click(e => {
        e.preventDefault()
        idEventVal = infoServiceSelected.id
        $("#neutral-service").modal('hide')
            .on('hidden.bs.modal', (e) => {
                $('#modal-delete-options').modal('show'); //Muestra el nuevo modal

                $(this).off('hidden.bs.modal');
            })
    })

    $("#delete-mensajeria-service").click(e => {
        e.preventDefault()
        idEventVal = infoServiceSelected.id
        $("#delivery-service").modal('hide')
            .on('hidden.bs.modal', (e) => {
                $('#modal-delete-options').modal('show'); //Muestra el nuevo modal

                $(this).off('hidden.bs.modal');
            })
    })

    /**
     * Evento click del boton para el envio del formulario
     * con las opciones de eliminacion de servicios (Radio Inputs)
     */
    $("#btn-delete-servicio").on('click', e => {
        e.preventDefault();
        crsfToken = document.getElementsByName("_token")[0].value;
        //Servicio para eliminacion de servicio(s)
        $.ajax({
            url: '/servicios/' + idEventVal,
            data: {
                option: $("input[name=delete-op]:checked").val() //Valor del radio seleccionado
            },
            type: 'DELETE',
            headers: {
                "Content-Type": 'application/x-www-form-urlencoded',
                "X-CSRF-TOKEN": crsfToken //Token de seguridad
            },
            success: (res) => {
                console.log(res);
                $('#calendar').fullCalendar(
                    'refetchEvents'); //Actualiza los servicios del calendario
                $("#modal-delete-options").modal('hide'); //Oculta el modal abierto
            },
            error: (err) => {
                console.log(err)
            }
        });
    });

    $("#change-frecuency").click(event => {
        $('#event-option')
            .modal('hide') //Oculta el modal abierto
            .on('hidden.bs.modal', function (e) { //Evento de ocultar el modal abiert
                $('#modal-update-options').modal('show'); //Muestra el nuevo modal

                $(this).off('hidden.bs.modal'); // Quita el evento del objeto actual
            });
    })

    $("#opcion-frecuencia-actl").change(() => {
        addOptionsAtSelects('frecuencia-actl', 'personalizada-actl')
    })

    $("#btn-actl-servicio").click(() => {
        let formattedDate = moment(inicio_servicio, 'YYYY-MM-DD HH:mm:ss');
        let dateEnd = moment(inicio_servicio, 'YYYY-MM-DD HH:mm:ss').add(parseInt(infoServiceSelected.duration),
            'minutes');
        let dataToSendUpdt = {
            idServicio: infoServiceSelected.id,
            duracion: infoServiceSelected.duration,
            frecuencia: $("#indice-frecuencia-actl").val(),
            fecha_inicio: formattedDate.format("YYYY-MM-DD"),
            hora_inicio: formattedDate.format('HH:mm:ss'),
            hora_fin: dateEnd.format("HH:mm:ss"),
            opcionFrecuencia: '',
            dayOfWeek: '',
            diaOrdinal: '',
            nombreDia: '',
            diaDelMes: '',
            optionActl: $("input[name=update-op]:checked").val()
        };
        if ($("#opcion-frecuencia-actl").val() == 'semanas') {
            dataToSendUpdt.opcionFrecuencia = "semanas";
            dataToSendUpdt.dayOfWeek = $("#opcion-personalizada-actl").val();
        } else if ($("#opcion-frecuencia-actl").val() == 'meses') {
            dataToSendUpdt.opcionFrecuencia = "meses";
            let arrCustomOption = ($("#opcion-personalizada-actl").val()).split('-');
            if (arrCustomOption[0] != 'all') {
                dataToSendUpdt.diaOrdinal = arrCustomOption[0];
                dataToSendUpdt.nombreDia = arrCustomOption[1];
            } else {
                dataToSendUpdt.diaDelMes = arrCustomOption[1];
            }

        } else if ($("#opcion-frecuencia-actl").val() == 'dias') {
            dataToSendUpdt.opcionFrecuencia = "dias";
        } else {
            dataToSendUpdt.opcionFrecuencia = "anios";
        }
        let crsfToken = document.getElementsByName("_token")[0].value;

        $.ajax({
            url: '/servicios/edit/frecuency',
            type: 'PUT',
            data: dataToSendUpdt,
            headers: {
                "Content-Type": 'application/x-www-form-urlencoded',
                "X-CSRF-TOKEN": crsfToken //Token de seguridad
            },
            success: (res) => {
                console.log(res)
                $('#calendar').fullCalendar(
                    'refetchEvents'); //Actualiza los servicios del calendario
                $("#modal-update-options").modal('hide'); //Oculta el modal abierto
            },
            error: (err) => {
                console.log(err)
            }
        });
    })

    $("#save-fac").click(() => {
        let factura = {
            numFac: $("#num-fac").val(),
            valFac: $("#val-fac").val(),
            idServicio: infoServiceSelected.id
        };

        $.ajax({
            url: '/facturas',
            data: factura,
            type: 'POST',
            headers: {
                "X-CSRF-TOKEN": crsfToken //Token de seguridad
            },
            success: (res) => {
                $("#ind-fac").remove();
                $("#save-fac").attr('disabled', 'disabled');
                console.log(res);
            },
            error: (err) => {
                console.log(err);
            }
        })
    });

    $("#btn-lock").click(event => {
        let state;

        $.ajax({
            url: '/servicios/edit/state',
            data: infoServiceSelected,
            type: 'PUT',
            headers: {
                "Content-Type": 'application/x-www-form-urlencoded',
                "X-CSRF-TOKEN": crsfToken //Token de seguridad
            },
            success: (res) => {
                $("#btn-lock").empty();
                if (!res) {
                    $("#btn-lock").append(`<i class="fa fa-unlock"></i> Desbloqueado`).removeClass(
                        'active');
                    $("#calendar").fullCalendar('refetchEvents');
                } else {
                    $("#btn-lock").append(`<i class="fa fa-lock"></i> Bloqueado`).addClass(
                        'active');
                    $("#calendar").fullCalendar('refetchEvents');
                }
            },
            error: (err) => {
                console.log(err)
            }
        })
    });

    function assignBill(idTypeService) {
        $.ajax({
            url: "/tipo/bill",
            data: {
                idTypeService: idTypeService,
                bill: $(`#num-factura-${idTypeService}`).val(),
                value: $(`#val-factura-${idTypeService}`).val(),
            },
            type: 'PUT',
            headers: {
                "Content-Type": 'application/x-www-form-urlencoded',
                "X-CSRF-TOKEN": crsfToken //Token de seguridad
            },
            success: (res) => {
                swal('¡Excelente!', 'La factura ha sido asignada con éxito', 'success')
                $(`#btn-save-fac-${idTypeService}`).attr('disabled', 'disabled')
            },
            error: (err) => {
                swal('Error!', 'Ha ocurrido un error al intentar guardar la factura', 'error')
            }
        })
    }

    function disableInputs(type) {
        if (type == 1) {
            $("#indice-frecuencia").attr("disabled", "disabled");
            $("#opcion-frecuencia").attr("disabled", "disabled");
            $("#opcion-personalizada").attr("disabled", "disabled");
            $("#hora_inicio").attr("disabled", "disabled");
            $("#num_horas").attr("disabled", "disabled");
            $("#num_minutos").attr("disabled", "disabled");
            $("#select_servicios").attr("disabled", "disabled");
            $("#select_tecnicos2").attr("disabled", "disabled");
            //$("#text-instrucciones").attr("disabled", "disabled");
        } else if (type == 0) {
            $("#indice-frecuencia").prop("disabled", false);
            $("#opcion-frecuencia").prop("disabled", false);
            $("#opcion-personalizada").prop("disabled", false);
            $("#hora_inicio").prop("disabled", false);
            $("#num_horas").prop("disabled", false);
            $("#num_minutos").prop("disabled", false);
            $("#select_servicios").prop("disabled", false);
            $("#select_tecnicos2").prop("disabled", false);
            //$("#text-instrucciones").prop("disabled", false);
        } else if (type == 2) {
            $("#indice-frecuencia").prop("disabled", false);
            $("#opcion-frecuencia").prop("disabled", false);
            $("#opcion-personalizada").prop("disabled", false);
            $("#hora_inicio").prop("disabled", false);
            $("#num_horas").prop("disabled", false);
            $("#num_minutos").prop("disabled", false);
            $("#select_servicios").prop("disabled", false);
            $("#select_tecnicos2").prop("disabled", true);
        } else {
            $("#indice-frecuencia").attr("disabled", "disabled");
            $("#opcion-frecuencia").attr("disabled", "disabled");
            $("#opcion-personalizada").attr("disabled", "disabled");
        }
    }

    $("#select_tipo_servicio").change(event => {
        switch (event.target.value) {
            case 'Neutro':
                disableInputs(2);
                break;
            case "Mensajeria":
                disableInputs(1);
                break;
            case "Refuerzo":
                disableInputs(0);
                break;
            default:
                disableInputs(0);
                break;
        }
    });

    $("#edit-neutral-service").click(e => {
        window.location.href = `/servicios/${infoServiceSelected.id}`;
    })

    //Metodo para cancelar un servicio
    $("#btn-cancelar-servicio").click(e => {
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de cancelar este servicio?",
            icon: "warning",
            buttons: {
                cancel: true,
                confirm: {
                    text: 'Aceptar',
                    visible: true,
                    value: true,
                    closeModal: false, //Muestra el Loader
                }
            }
        })
            .then(isConfirm => {
                if (isConfirm) {
                    $.ajax({
                        url: `/servicios/${infoServiceSelected.id}`,
                        data: {
                            option: '4',
                        },
                        type: 'DELETE',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        }
                    })
                        .then(res => {
                            swal('¡Servivio Cancelado', 'El servicio seleccionado fue cancelado',
                                'success')
                                .then(value => {
                                    if (value) {
                                        $('#calendar').fullCalendar('refetchEvents');
                                    }
                                })
                        })
                        .catch(err => {
                            swal("¡Error!", 'Ha ocurrido un error al intentar crear los servicios',
                                "error")
                        })
                }
            })
    })
</script>
@endsection