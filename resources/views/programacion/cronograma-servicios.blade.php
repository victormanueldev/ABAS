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
        <h2>Cronograma</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li>
                Cronograma
            </li>
            <li class="active">
                <strong>Eventos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Calendario </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                {{-- Botones de mostrar modal  --}}
                <button style="display: none" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modal-servicios" id="btn-modal">
                    Launch modal
                </button>
                <button style="display: none" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#event-option" id="btn-modal2">
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
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content ">
                                {!! Form::open(['route' => ['guardaEventos'], 'method' => 'POST', 'id' =>'form-calendario']) !!}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h3 class="modal-title">Agendar servicio</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Información del cliente</h3>
                                            <p>Indique los datos del cliente al que se le agendará el servicio.</p>
                                            <div class="row">
                                                <div class="form-group "><label class="col-sm-4 control-label">Buscar cliente por: </label>
                                                    <div class="col-sm-8">
                                                        <label class="radio-inline"> <input class="radio-options" type="radio" value="1" id="por_nombre" name="optionsRadios"> Nombre </label> 
                                                        <label class="radio-inline"><input class="radio-options" type="radio" value="2" id="por_rs" name="optionsRadios"> Razon Social </label> 
                                                        <label class="radio-inline"><input class="radio-options" type="radio" value="3" id="por_nit" name="optionsRadios"> NIT/CC </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12" style="margin-top: 10px;">
                                                    <input type="text" placeholder="Cliente..." class="typeahead_1 form-control" id="input_autocomplete" autocomplete="off"/>
                                                </div>
                                                <div class="form-group col-lg-12" style="margin-top: 15px;">
                                                        <label class="control-label">Sede *</label>
                                                        <select class="form-control " id="select_sedes">
                                                            <option value="" selected disabled>Selecciona una sede</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <h3 class="m-t-none m-b">Información de Sede/Residencia</h3>
                                            <p style="margin-bottom: 14px;">Confirma la información del lugar donde se realizará el servicio.</p>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>Dirección</label>
                                                    <input class="form-control" rows="2" id="dir_sede" readonly>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Barrio</label>
                                                    <input class="form-control" rows="2" id="barrio_sede" readonly>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Contacto</label>
                                                    <input class="form-control" rows="2" id="contacto_sede" readonly>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Telefono</label>
                                                    <input class="form-control" rows="2" id="tel_sede" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h3 class="m-t-none m-b">Información del servicio</h3>
                                            <p>Diligencie todos los campos del referentes al servicio</p>
                                            <div class="row">
                                                <div class="form-group col-lg-12">
                                                        <label>Frecuencia: </label>
                                                        <select class="form-control" id="select_frecuencia" name="frecuencia_calidad" style="margin-top: 10px;">
                                                            <option value="">Seleccione una frecencia.</option>
                                                            <option value="7">Semanal</option>
                                                            <option value="15">Quincenal</option>
                                                            <option value="30">Mensual</option>
                                                            <option value="60">Bimestral</option>
                                                            <option value="90">Trimestral</option>
                                                            <option value="120">Cada 4 Meses</option>
                                                            <option value="180">Semestral</option>
                                                            <option value="360">Anual</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-4" >
                                                        <label>Hora de inicio*</label>
                                                        <div class="input-group" style="width: 100%">
                                                            <input type="time"  class="form-control" id="hora_inicio" style="width: 100%">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-8" >
                                                            <label >Duración del servicio</label>
                                                            <div class="input-group">
                                                                <input style="width: 45%;margin-right: 10px;" type="number" min="0" class="form-control" id="num_horas" placeholder="Horas">
                                                                <input style="width: 47%;margin-left: 10px;" type="number" min="0" max="60" class="form-control" id="num_minutos" placeholder="Minutos">
                                                            </div>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label >Tipo de servicio</label>
                                                        <select class="form-control" id="select_servicios" multiple="multiple">
                                                            @foreach($tipos as $tipo)
                                                                <option value="{{$tipo->id}}">{{$tipo->nombre}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label >Tecnicos</label>
                                                        <select class="form-control" id="select_tecnicos2" multiple="multiple">
                                                            @foreach($tecnicos as $tecnico)
                                                                <option value="{{$tecnico->id}}">{{$tecnico->nombre}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Instrucciones y Observaciones</label>
                                                        <textarea class="form-control" placeholder="Escriba aquí las observaciones para el técnico." rows="1" name="instrucciones" id="text-instrucciones"></textarea>
                                                    </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button style="margin-bottom: 0;" type="button" id="btn-close2" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button> {{-- No se si este boton de guardar sea necesario. --}}
                                    <button  id="btn-print" type="button" class="btn btn-primary" >Imprimir</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                <!--===================================================
                /* Modal de Ver Info de Servicio */
                ====================================================-->
                <div class="modal inmodal fade" id="event-option" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-lg" >
                        <div class="modal-content " id="modal-dialog">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
                                            <div class="col-sm-12" style="margin-bottom: 15px;">
                                                <h3>Información del cliente </h3>
                                            </div>
                
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Cliente </label>
                                                <input type="text" disabled class="form-control" id="ver_nombre_cliente" style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Sede/Residencia </label>
                                                <input type="text" disabled class="form-control" id="ver_nombre_sede" style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Dirección </label>
                                                <input type="text" disabled class="form-control" id="ver_direccion_sede" style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Barrio </label>
                                                <input type="text" disabled class="form-control" id="ver_barrio_sede" style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                <label class="control-label">Contacto </label>
                                                <input type="text" disabled class="form-control" id="ver_contacto_sede" style="width: 100%;background-color: #fff;">
                                            </div>
                                            <div class="form-group col-xs-12 col-lg-6">
                                                    <label class="control-label">Teléfono </label>
                                                    <input type="text" disabled class="form-control" id="ver_telefono_sede" style="width: 100%;background-color: #fff;">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                                <div class="col-sm-6 col-xs-12" style="margin-bottom: 7px;">
                                                        <a class="btn btn-primary btn-outline" id="btn-lock" style="cursor: not-allowed;"></a>
                                                </div>
                                                <div class="col-sm-6 col-xs-12" style="margin-bottom: 7px;">
                                                    <label >Opciones: </label>
                                                    <a class="btn btn-default btn-outline" title="Editar Servicio">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-default btn-outline" title="Imprimir Documentos">
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                    <a class="btn btn-default btn-outline">
                                                        <i class="fa fa-wrench"></i>
                                                    </a>
                                                </div>
                                                <div class="form-group col-xs-12 col-lg-6">
                                                    <label class="control-label">Hora de inicio </label>
                                                    <input type="text" disabled class="form-control" id="ver_hora_inicio" style="width: 100%;background-color: #fff;">
                                                </div>
                                                <div class="form-group col-xs-12 col-lg-6">
                                                        <label class="control-label">Fecha/Hora de fin. </label>
                                                        <input type="text" disabled class="form-control" id="ver_datos_fin" style="width: 100%;background-color: #fff;">
                                                    </div>

                                                <div class="form-group col-sm-6">
                                                        <label>Frecuencia: </label>
                                                        <select class="form-control" id="ver_frecuencia" name="frecuencia_calidad" style="background-color: #fff;" disabled>    
                                                            <option value="7">Semanal</option>
                                                            <option value="15">Quincenal</option>
                                                            <option value="30">Mensual</option>
                                                            <option value="60">Bimestral</option>
                                                            <option value="90">Trimestral</option>
                                                            <option value="120">Cada 4 Meses</option>
                                                            <option value="180">Semestral</option>
                                                            <option value="360">Anual</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6" >
                                                            <label >Duración del servicio</label>
                                                            <input type="text" disabled class="form-control" id="ver_duracion" style="width: 100%;background-color: #fff;">
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Instrucciones y Observaciones</label>
                                                        <textarea class="form-control" readonly rows="1" name="instrucciones" style="background-color: #fff;" id="ver_instrucciones"></textarea>
                                                    </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===================================================
                  /* Modal opciones de impresion  
                ====================================================-->
                <div class="modal inmodal fade" id="event-print" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            {!! Form::open(['id' =>'form-print']) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Editar servicio</h4>
                            </div>
                            <div class="modal-body">
                                    
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="i-checks"><label> <input id="orden" type="checkbox" value="1" name="check_op"> <i></i> Option one </label></div>
                                        <div class="i-checks"><label> <input id="ruta-lamparas" type="checkbox" value="2" name="check_op"> <i></i> Option two </label></div>
                                        <div class="i-checks"><label> <input id="ruta-ratas" type="checkbox" value="3" name="check_op"> <i></i> Option three </label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                            {!! Form::close() !!}
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
<script src="{{asset('js/plugins/fullcalendar/locale/es.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
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

    $(document).ready(function() {

        $("#select_servicios").select2({
            width: '100%',
            placeholder: 'Servicios...'
        });

        $("#select_tecnicos2").select2({
            width: '100%',
            placeholder: 'Técnicos...'
        });
        
        /* Estructuracion de la información del cliente para el autocompletado
        ------------------------------------------------------------------------*/
        //Inicializacion de variables
        var nit_clientes = [];
        var nombres_clientes = [];
        var razon_social_clientes = [];
        var $input;
        var data;

        //Peticion al servidor para obtener los clientes de la DB
        $.get('/clientes')
        .then((res) => {
            //Recorre la respueta
            res.forEach((value, index) => {
                nit_clientes[index] = JSON.parse(`{"name": "${value.nit_cedula}", "id": "${value.id}"}`);
                nombres_clientes[index] = JSON.parse(`{"name": "${value.nombre_cliente}", "id": "${value.id}"}`);
                if(value.razon_social == 'null' || value.razon_social == null){
                    razon_social_clientes[index] = JSON.parse(`{"name": "${value.nombre_cliente}", "id": "${value.id}"}`);
                }else{
                    razon_social_clientes[index] = JSON.parse(`{"name": "${value.razon_social}", "id": "${value.id}"}`);
                }
            })
        })
        .catch((err) => {
            console.log(err);
        });

        //Inicia el Autocompletado con los NIT de los clientes
        $input = $('.typeahead_1').typeahead({
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
                    break;
                //Buscar por razon social de clientes
                case '2':
                    data = razon_social_clientes;
                    $('.typeahead_1').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                //Buscar por NIT o CC de clientes
                case '3':                  
                    data = nit_clientes;
                    $('.typeahead_1').typeahead('destroy').typeahead({
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
        //Instancia la Clase Date para obtener la fecah actual
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        //Declaracion de Variables publicas de Servicio
        var inicio_servicio;
        var checkbox = false;
        var color;
        var frecuencia_solicitud;
        var id_solicitud;
        var id_cliente;

        //Inicia el calendario
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
            events: { 
                url:"/servicios"
            },
            eventLimit: true,
            editable: true,
            eventLimit: true,
            nowIndicator: true,
            businessHours: {
                // days of week. an array of zero-based day of week integers (0=Sunday)
                dow: [ 1, 2, 3, 4, 5, 6 ], // Monday - Thursday

                start: '07:00', // a start time (10am in this example)
                end: '18:00', // an end time (6pm in this example)
            },
            droppable: true, // Premite las eventos se puedan arrastrar dentro del calendario

            //Evento de mostrar la interfaz de agenda del dia, dando click en cualquier dia del calendario
            dayClick: function(start, end, allDay) {
                //Simula click en el boton de mostrar el modal
                document.getElementById("btn-modal").click();
                //Guarda la fecha y hora del dia seleccionado
                inicio_servicio = start.format("YYYY-MM-DD");
                //Limpiar elementos
                $("#select_sedes").empty();
                $('#input_autocomplete').val('');
                $("#dir_sede").val('');
                $("#barrio_sede").val('');
                $("#contacto_sede").val('');
                $("#tel_sede").val('');
                $("#select_frecuencia").val('0').change();
                $("#hora_inicio").val('');
                $("#num_horas").val('');
                $("#num_minutos").val('');
                $('#select_servicios').select2("val", "");
                $('#select_tecnicos2').select2("val", "");
            },
            
            //Evento de reajustar el tamaño de la evento dentro del calendario (interfaz de agenda dia)
            eventResize: function(event) {
                var start = event.start.format("YYYY-MM-DD HH:mm");
                var backgroundC=event.backgroundColor;
                var allDay=event.allDay;
                if(event.end){//valida si hay una fecha de terminación de la evento
                    var end = event.end.format("YYYY-MM-DD HH:mm");
                }else{
                    var end="NULL"; //Sino la iguala a NULL
                }
                crsfToken = document.getElementsByName("_token")[0].value;
                    $.ajax({
                    url: '/eventos/editar-evento',
                    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id_evento='+ event.id+'&background='+backgroundC+'&allday='+allDay,
                    type: "POST",
                    headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function(json) {
                        console.log("Updated Successfully");
                        },
                        error: function(json){
                        console.log("Error al actualizar evento");
                        }
                    });
            },

            //Evento de cambiar de dia la evento dentro del calendario
            eventDrop: function(event, delta) {
                var start = event.start.format("YYYY-MM-DD HH:mm");
                if(event.end){
                    var end = event.end.format("YYYY-MM-DD HH:mm");
                }else{
                    var end="NULL";
                }
                var back=event.backgroundColor;
                var allDay=event.allDay;
                crsfToken = document.getElementsByName("_token")[0].value;
                $.ajax({  
                    url: '/eventos/editar-evento',
                    data: 'title='+ event.title+'&start='+ start +'&end='+ end+'&id_evento='+ event.id+'&background='+back+'&allday='+allDay ,           
                    type: "POST",
                    headers: {
                    "X-CSRF-TOKEN": crsfToken
                    },
                    success: function(json) {
                    console.log("Updated Successfully eventdrop");
                    },
                    error: function(json){
                    console.log("Error al actualizar eventdrop");
                    }
                });
            },
            
            //Evento de mostrar el Tooltip teniendo el mouse dentro de la evento
            eventMouseover: function( event, jsEvent, view ) {   
                var start = (event.start.format("HH:mm"));
                var back=event.backgroundColor;
                if(event.end){
                    var end = event.end.format("HH:mm");
                }else{
                    var end="No definido";
                }
                if(event.allDay){
                    var allDay = "Si";
                }else{
                    var allDay="No";
                }
                //Componente HTML para mostrar la descripcion de la evento (Tooltip)
                var tooltip = '<div class="tooltipevent" style="border: 1px solid #d2d2d2;width:200px;height:auto;padding:10px;color:inherit;background:#fff;position:absolute;z-index:10001;">'
                                    +'<p >'
                                        + '<b>'+event.title+'</b>'
                                    +'</p>'
                                    +'<p class="text-left" style="padding: 0">'
                                        +'Todo el dia: '+allDay+'<br>'
                                        + 'Inicio: '+start+'<br>'
                                        + 'Fin: '+ end 
                                    +'</p>'
                                +'</div>';
                //Agrega el elemento al DOM
                $("body").append(tooltip);
                //Eventos cuando el mouse esta dentro de la evento
                $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);//Mueve el tooltip con el mouse
                $('.tooltipevent').fadeIn('500');
                $('.tooltipevent').fadeTo('10', 1.9);
                }).mousemove(function(e) {
                $('.tooltipevent').css('top', e.pageY + 10);
                $('.tooltipevent').css('left', e.pageX + 20);
                });
                //console.log(event);            
            },
            
            //Evento de quitar el tooltip cuando el mouse está fuera de la evento
            eventMouseout: function(calEvent, jsEvent) {
                $(this).css('z-index', 8);
                $('.tooltipevent').remove();
            },
            
            //Evento de eliminar evento, cuando el usuario hace click en alguna de ellas
            eventClick: function (event, jsEvent, view) {
                //Variables locales
                var nombre_sede;
                var direccion_cliente;
                var barrio_cliente;
                var telefono_cliente;
                var nombre_contacto;
                crsfToken = document.getElementsByName("_token")[0].value;
                $("#btn-lock").empty(); //Limpia el boton de bloqueado
                //Peticion al servidor para obtener los datos del servicio seleccionado
                $.get(`/servicios/${event.id}/edit`)
                .then((res) => {
                    //Quita el loader de la vista
                    $(".modal-body").removeClass('sk-loading');
                    //Valida que el cliente sea persona natural o juridica
                    if(res[0].solicitud.sede){
                        nombre_sede = res[0].solicitud.sede.nombre;
                        direccion_cliente = res[0].solicitud.sede.direccion;
                        barrio_cliente = res[0].solicitud.sede.barrio;
                        telefono_cliente = res[0].solicitud.sede.telefono_contacto;
                        nombre_contacto = res[0].solicitud.sede.nombre_contacto;
                    }else{
                        nombre_sede = 'Sede única';
                        direccion_cliente = res[0].solicitud.cliente.direccion;
                        barrio_cliente = res[0].solicitud.cliente.barrio;
                        telefono_cliente = res[0].solicitud.cliente.celular;
                        nombre_contacto = res[0].solicitud.cliente.nombre_contacto;
                    }
                    //Valida si el servicio esta bloqueado o no
                    if(res[0].confirmado === 0){
                        $("#btn-lock").append(`<i class="fa fa-unlock"></i> Desbloqueado`);
                    }else{
                        $("#btn-lock").append(`<i class="fa fa-lock"></i> Bloqueado`).addClass('active');
                    }
                    //Conversiones y procesamiento de las fechas para su correcta visualización
                    var date1 = moment(res[0].fecha_inicio+" "+res[0].hora_inicio).format('YYYY-MM-DD hh:mm a');
                    var date2 = moment(res[0].fecha_fin+" "+res[0].hora_fin).format('YYYY-MM-DD hh.mm a');
                    var hours = Math.floor((res[0].duracion)/60);
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
                    $("#ver_duracion").val(hours+" hora(s) "+minutes+" minuto(s)");
                    $("#ver_instrucciones").val(res[0].solicitud.observaciones)
                    $("#color_tecnico_editar").attr('style', `background-color: ${res[0].color}`);
                    console.log('GET ver servicios Successfully');
                })
                .catch((err) => {
                    $(".modal-body").removeClass('sk-loading');
                    console.log(err);
                })
                document.getElementById("btn-modal2").click();
            } 
        });

        //Change del input de autocompletado
        $input.change(function() {
            var current = $input.typeahead("getActive");
            id_cliente = current.id;
                //Peticion GET al servidor a la ruta /sedes/clientes/{id} (Sedes de cliente)
                $.get(`/sedes/cliente/${current.id}`,  function (res) {
                $("#select_sedes").empty();//Limipia el select
                $("#select_sedes").append(`<option value='' disabled selected> Selecciona una sede </option>`);
                if(res == ''){//Valida que el cliente tenga sedes
                    $("#select_sedes").append(`<option value="0"> Sede Única </option>`);
                }else{
                    //Recorre la respuesta del servidor
                    res.forEach(element => {
                        //Añade Options al select de sedes dependiendo de la respues del servidor
                        $("#select_sedes").append(`<option value=${element.id}> ${element.nombre} </option>`);
                    });              
                }
            }).then((res) => {
                console.log('Petición Exitosa');
            }).catch((err) => {
                console.log(err);
            });
        });
        
        //Evento change del select de tecnicos
        $(".tecnicos").change(event => {
            $.get(`/tecnicos/getColor/${event.target.value}`, function (res) {
                //Peticion para obtener el color de un técnico
                $(".color_tecnico").attr('style', `background-color: ${res[0].color}`); //Cambia el color del elemento
                color = res[0].color;   //Guarda el color en la variable publica
            });
        })
        
        //Peticion al servidor para obtener la solicitud de una sede
        function obtenerSolicitudSede(id_sede, crsfToken ) {
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
                success: function(res){
                    if(res == ''){  //Valida que la respueta este vacia
                        //$("#select_frecuencia option:eq(0)").attr('selected', 'selected');
                        id_solicitud = '';
                    }else{
                        console.log(res);
                        $("#text-instrucciones").val(res[0]['observaciones']);
                        $("#dir_sede").val(res[0].direccion);
                        $("#barrio_sede").val(res[0].barrio);
                        $("#contacto_sede").val(res[0].nombre_contacto);
                        $("#tel_sede").val(res[0].telefono_contacto);
                        //console.log(res[0]['frecuencia']);
                        id_solicitud = res[0]['id'];
                        // $.get(`/tecnicos/${id_solicitud}`, function (data) {
                        //     $("#rows-table-history").empty();
                        //     data.forEach(element => {
                        //         console.log(element);
                        //         $("#rows-table-history").append(`<tr><td>${element.nombre}</td><td>${element.servicios}</td> </tr>`);
                        //     });
                        // });
                        frecuencia_solicitud = res[0]['frecuencia']; //Guarda la frecuencia en la variable publica
                        $("#select_frecuencia").val(frecuencia_solicitud).change(); //Cambia el valor del input      
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

        //Evento change del select de Sedes
        $("#select_sedes").change(event => {
            crsfToken = document.getElementsByName("_token")[0].value;
            var id_sede = $("#select_sedes").val();
            //Referencia al metodo de obtener la solicitud del cliente
            obtenerSolicitudSede(id_sede, crsfToken);
            
        });

        //Evento Submit del modal de crear Servicio
        $('#form-calendario').submit(event => {
            event.preventDefault();
            //Declaracion de Variables locales de Servicio
            var duracion_servicio = (parseInt($("#num_horas").val()) * 60) + parseInt($("#num_minutos").val()) 
            var frecuencia;
            var start_event = inicio_servicio;
            frecuencia = parseInt($("#select_frecuencia").val());
            var tecnicos = [];
            $("#select_tecnicos2").val().forEach((value, index) => {
                tecnicos[index] = value;
            });
            var tipos_servicio = [];
            $("#select_servicios").val().forEach((value, index) => {
                tipos_servicio[index] = value
            });
            console.log(tecnicos);
            //Prueba de fechas y horas
            console.log($("#hora_inicio").val());//email, start1.format('YYYY-MM-DD HH:mm'));
            crsfToken = document.getElementsByName("_token")[0].value;
            //Peticion HTTP para guardar el evento
            $.ajax({
                url: '/servicios',//Redirecciona a la direccion URL
                data:
                    //Datos que enviará
                    {
                        tipos: tipos_servicio,
                        frecuencia: frecuencia,
                        start: start_event,
                        hora_inicio: $("#hora_inicio").val(),
                        duracion: duracion_servicio,
                        id_tecnicos: tecnicos,
                        id_solicitud: id_solicitud
                    },
                type: "POST",//Método de envío
                headers: {
                    "Content-Type": 'application/x-www-form-urlencoded',
                    "X-CSRF-TOKEN": crsfToken   //Token de seguridad
                },
                success: function(events) {     //En caso de ser exitoso el envio de datos
                    console.log('Evento creado'); //Escribe en la consola
                    document.getElementById("btn-close2").click();
                    $('#calendar').fullCalendar('refetchEvents');//Refresca todos los eventos dentro del calendario
                },
                error: function(json){//En caso de ser erroneo el envio de datos 
                    console.log("Error al crear evento");//Escribe en console
                }        
            });
        });

        //Evento click del boton de imprimir Modal (Crear Servicio)
        $("#btn-print").click(event => {
            event.preventDefault();
            $('#modal-servicios')
            .modal('hide')                          //Oculta el modal abierto
            .on('hidden.bs.modal', function (e) {   //Evento de ocultar el modal abiert
                $('#event-print').modal('show');    //Muestra el nuevo modal

                $(this).off('hidden.bs.modal');     // Quita el evento del objeto actual
            });
        });

        $("#form-print").submit(event => {
            event.preventDefault();
            swal({
                text: "Oie!",
                icon: "success"
            });
            $('#event-print')
            .modal('hide')  
        })
    });

</script>
@endsection