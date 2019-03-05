@extends('layouts.app')
{{-- Css --}}
@section('custom-css')
<link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection
{{-- Contenido --}}
@section('content')
<script>
    document.getElementById('m-cronograma').setAttribute("class", "active");
    document.getElementById('a-cronograma').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Calendario</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li>
                Calendario
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

                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>

                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-servicios"
                    id="btn-modal">
                    Launch modal
                </button>
                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editar-servicios"
                    id="btn-modal-edit">
                    Launch modal
                </button>

                <!--===================================================
                /* Modal de Crear Evento */
                ====================================================-->
                <div id="modal-servicios" class="modal inmodal fade" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            {!! Form::open(['route' => ['guardaEventos'], 'method' => 'POST', 'id' =>'form-calendario']) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h3 class="modal-title">Agendar evento</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <h3 class="m-t-none m-b">Información del cliente</h3>
                                        <p>Indique los datos del cliente al que se le agendará el servicio.</p>
                                        <div class="row">
                                            <div class="form-group ">
                                                <label class="col-sm-4 control-label">Buscar cliente por: </label>
                                                <div class="col-sm-8">
                                                    <label class="radio-inline">
                                                        <input class="radio-options" type="radio" value="1" id="por_nombre"
                                                            name="optionsRadios2"> Nombre </label>
                                                    <label class="radio-inline">
                                                        <input class="radio-options" type="radio" value="2" id="por_rs"
                                                            name="optionsRadios2"> Razon Social </label>
                                                    <label class="radio-inline">
                                                        <input class="radio-options" type="radio" value="3" id="por_nit"
                                                            name="optionsRadios2"> NIT/CC </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-top: 10px;">
                                                <input type="text" placeholder="Cliente..." class="typeahead_1 form-control"
                                                    id="input_autocomplete" autocomplete="off" />
                                            </div>
                                            <div class="form-group col-lg-12" style="margin-top: 15px;">
                                                <label class="control-label">Sede </label>
                                                <select class="form-control " id="select_sedes" required>
                                                    <option value="" selected disabled>Selecciona una sede</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="control-label">Teléfono/Celular </label>
                                                <input style="text-transform: uppercase" type="text" class="form-control" id="telefono_evento" placeholder="Escriba un teléfono">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="control-label">Dirección</label>
                                                <input style="text-transform: uppercase" type="text" class="form-control" id="direccion_evento" placeholder="escriba una dirección">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="m-t-none m-b">Información del evento</h3>
                                        <p>Diligencie todos los campos del referentes al evento</p>
                                        <div class="row">
                                            <div class="form-group col-lg-12">
                                                <label>Tipo de Evento: </label>
                                                <select class="form-control" style="margin-top: 10px;" id="select_tipo_servicio" required>
                                                    <option value="0">SELECCIONA UN TIPO.</option>
                                                    @if(Auth::user()->area_id == 1)
                                                        <option value="Llamada">LLAMADA</option>
                                                        <option value="Visita">VISITA</option>
                                                    @else
                                                        <option value="Llamada">LLAMADA</option>
                                                        <option value="Visita">VISITA</option>
                                                        <option value="Actualizacion">ACTUALIZACION DE DOCUMENTOS</option>
                                                        <option value="Capacitacion">CAPACITACION</option>
                                                        <option value="Diagnostico">DIAGNOSTICO</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label>Hora de inicio*</label>
                                                <div class="input-group" style="width: 100%">
                                                    <input type="time" class="form-control" id="hora_inicio" min="07:00" max="18:00" style="width: 100%" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label>Hora de fin*</label>
                                                <div class="input-group" style="width: 100%">
                                                    <input type="time" class="form-control" id="hora_fin" min="07:00" max="19:00" style="width: 100%" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label>Todo el dia</label>
                                                <div class="input-group" style="width: 100%">
                                                        <input type="checkbox" id="allDay">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label>Observaciones</label>
                                                <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones para el evento."
                                                    rows="1" name="instrucciones" id="text-instrucciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button style="margin-bottom: 0;" type="button" id="btn-close2" class="btn btn-default"
                                    data-dismiss="modal">Cancelar</button>
                                <button id="create-event" type="submit" class="btn btn-primary">Crear evento</button> 
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <!--===================================================
                /* Modal de editar Evento */
                ====================================================-->
                <div id="modal-editar-servicios" class="modal inmodal fade" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content ">
                                {!! Form::open(['route' => ['guardaEventos'], 'method' => 'POST', 'id' =>'form-calendario-edit']) !!}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h3 class="modal-title">Editar evento</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-6 b-r">
                                            <h3 class="m-t-none m-b">Información del cliente</h3>
                                            <p>Indique los datos del cliente al que se le agendará el servicio.</p>
                                            <div class="row">
                                                <div class="form-group ">
                                                    <label class="col-sm-4 control-label">Buscar cliente por: </label>
                                                    <div class="col-sm-8">
                                                        <label class="radio-inline">
                                                            <input class="radio-options-edit" type="radio" value="1" id="por_nombre"
                                                                name="optionsRadios"> Nombre </label>
                                                        <label class="radio-inline">
                                                            <input class="radio-options-edit" type="radio" value="2" id="por_rs"
                                                                name="optionsRadios"> Razon Social </label>
                                                        <label class="radio-inline">
                                                            <input class="radio-options-edit" type="radio" value="3" id="por_nit"
                                                                name="optionsRadios"> NIT/CC </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12" style="margin-top: 10px;">
                                                    <input type="text" placeholder="Cliente..." class="form-control"
                                                    id="typeahead_2" autocomplete="off" />
                                                </div>
                                                <div class="form-group col-lg-12" style="margin-top: 15px;">
                                                    <label class="control-label">Cliente Actual </label>
                                                    <input type="text" id="actual-client" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-6" style="margin-top: 15px;">
                                                    <label class="control-label">Sede Actual </label>
                                                    <input type="text" id="actual-sede" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-6" style="margin-top: 15px;">
                                                    <label class="control-label">Nueva Sede *</label>
                                                    <select class="form-control " id="select_sedes_edit" required>
                                                        <option value="" selected disabled>Selecciona una sede</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="control-label">Teléfono/Celular </label>
                                                    <input style="text-transform: uppercase" type="text" class="form-control" id="telefono_evento_edit" placeholder="Escriba un teléfono">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="control-label">Dirección</label>
                                                    <input style="text-transform: uppercase" type="text" class="form-control" id="direccion_evento_edit" placeholder="escriba una dirección">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h3 class="m-t-none m-b">Información del evento</h3>
                                            <p>Diligencie todos los campos del referentes al evento</p>
                                            <div class="row">
                                                <div class="form-group col-lg-12">
                                                    <label>Tipo de Evento: </label>
                                                    <select class="form-control" style="margin-top: 10px;" id="select_tipo_servicio_edit" required>
                                                        <option value="0">SELECCIONA UN TIPO.</option>
                                                        @if(Auth::user()->area_id == 1)
                                                            <option value="Llamada">LLAMADA</option>
                                                            <option value="Visita">VISITA</option>
                                                        @else
                                                            <option value="Llamada">LLAMADA</option>
                                                            <option value="Visita">VISITA</option>
                                                            <option value="Actualizacion">ACTUALIZACION DE DOCUMENTOS</option>
                                                            <option value="Capacitacion">CAPACITACION</option>
                                                            <option value="Diagnostico">DIAGNOSTICO</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label>Hora de inicio*</label>
                                                    <div class="input-group" style="width: 100%">
                                                        <input type="time" class="form-control" id="hora_inicio_edit" min="07:00" max="18:00" style="width: 100%" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label>Hora de fin*</label>
                                                    <div class="input-group" style="width: 100%">
                                                        <input type="time" class="form-control" id="hora_fin_edit" min="07:00" max="19:00" style="width: 100%" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label>Todo el dia</label>
                                                    <div class="input-group" style="width: 100%">
                                                            <input type="checkbox" id="allDay_edit">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label>Observaciones</label>
                                                    <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones para el evento."
                                                        rows="1" name="instrucciones" id="text-instrucciones-edit"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button style="margin-bottom: 0;" type="button" id="btn-close3" class="btn btn-default"
                                        data-dismiss="modal">Cancelar</button>
                                        <button id="delete-event" type="button" class="btn btn-danger" >Eliminar evento</button>
                                    <button id="edit-event" type="submit" class="btn btn-primary">Editar evento</button> 
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
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<!-- Typehead -->
<script src="{{asset('js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
<script>

    var inicio_servicio;
    var id_evento;
    $(document).ready(function() {


        //Inicializacion de variables
        var nit_clientes = [];
        var nombres_clientes = [];
        var razon_social_clientes = [];
        var $input;
        var crsfToken = document.getElementsByName("_token")[0].value;
        var id_cliente;

         //Peticion al servidor para obtener los clientes de la DB
         $.get('/clientes')
            .then((res) => {
                //Recorre la respueta
                res.forEach((value, index) => {
                    //Convertir a formato JSON para poder ser mostrados en el typehead
                    nit_clientes[index] = JSON.parse(`{"name": "${value.nit_cedula}", "id": "${value.id}"}`);
                    nombres_clientes[index] = JSON.parse(`{"name": "${value.nombre_cliente}", "id": "${value.id}"}`);
                    if (value.razon_social == 'null' || value.razon_social == null) {
                        razon_social_clientes[index] = JSON.parse(`{"name": "${value.nombre_cliente}", "id": "${value.id}"}`);
                    } else {
                        razon_social_clientes[index] = JSON.parse(`{"name": "${value.razon_social}", "id": "${value.id}"}`);
                    }
                });
            })
            .catch((err) => {
                console.log(err);
            });

        //Inicia el Autocompletado con los NIT de los clientes
        $input = $('.typeahead_1').typeahead({
            source: nit_clientes
        });

        $input2 = $('#typeahead_2').typeahead({
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
        });

        $(".radio-options-edit").click(event => {
            //Valida el valor del radiobutton seleccionado
            switch (event.target.value) {
                //Buscar por nombre de clientes
                case '1':
                    data = nombres_clientes;
                    $('#typeahead_2').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                //Buscar por razon social de clientes
                case '2':
                    data = razon_social_clientes;
                    $('#typeahead_2').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                //Buscar por NIT o CC de clientes
                case '3':
                    data = nit_clientes;
                    $('#typeahead_2').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                default:
                    console.log('Default');
                    data = [];
                    break;
            }
        });

        function getSedes(current,idSelect){
            //Peticion GET al servidor a la ruta /sedes/clientes/{id} (Sedes de cliente)
            $.get(`/sedes/cliente/${current.id}`, function (res) {
                $(`#${idSelect}`).empty();//Limipia el select
                $(`#${idSelect}`).append(`<option value='' disabled selected> Selecciona una sede </option>`);
                if (res == '') {//Valida que el cliente tenga sedes
                    $(`#${idSelect}`).append(`<option value="0"> Sede Única </option>`);
                } else {
                    //Recorre la respuesta del servidor
                    res.forEach(element => {
                        //Añade Options al select de sedes dependiendo de la respues del servidor
                        $(`#${idSelect}`).append(`<option value=${element.id}> ${element.nombre} </option>`);
                    });
                }
            }).then((res) => {
                console.log('Petición Exitosa');
            }).catch((err) => {
                console.log(err);
            });
        }

        //Change del input de autocompletado
        $input.change(() => {
            var current = $input.typeahead("getActive");
            id_cliente = current.id;
            getSedes(current,'select_sedes')
        });

        $input2.change(() => {
            var current = $input2.typeahead("getActive");
            id_cliente = current.id;
            getSedes(current, 'select_sedes_edit')
        });



        /* Inicializa el Calendario
         -----------------------------------------------------------------*/
        //Instancia la Clase Date para obtener la fecah actual
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

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
                url:"/eventos/index"
            },
            
            editable: true,
            droppable: true, // Premite las eventos se puedan arrastrar dentro del calendario
            eventLimit: true,
            nowIndicator: true,
            businessHours: true,
            businessHours: {
                // days of week. an array of zero-based day of week integers (0=Sunday)
                dow: [ 1, 2, 3, 4, 5, 6 ], // Monday - Thursday

                start: '06:00', // a start time (10am in this example)
                end: '19:00', // an end time (6pm in this example)
            },

            //Evento de mostrar la interfaz de agenda del dia, dando click en cualquier dia del calendario
            dayClick: function(start, end, allDay) {
                //Simula click en el boton de mostrar el modal
                document.getElementById("btn-modal").click();
                 //Guarda la fecha y hora del dia seleccionado
                 inicio_servicio = start.format("YYYY-MM-DD");
                $("#select_sedes").empty();
                $('#input_autocomplete').val('');
                $("#hora_inicio").val('');
                $("#hora_fin").val('');
                $("#text-instrucciones").val("");
                $("#select_tipo_servicio").val('0').change();
                $("#telefono_evento").val('');
                $("#direccion_evento").val('');
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
                                    <li><strong>Cliente: </strong>${event.cliente}</li>
                                    <li><strong>Sede: </strong>${event.sede}</li>
                                    <li><strong>Teléfono: </strong>${event.telefono}</li>
                                    <li><strong>Dirección: </strong>${event.direccion}</li>
                                </ul>
                            </div>
                        </div>
                    </div>`;
                //Agrega el elemento al DOM
                $("body").append(tooltip);
                //Eventos cuando el mouse esta dentro de la evento
                $(this).mouseover(function (e) {
                    $(this).css('z-index', 10000);//Mueve el tooltip con el mouse
                    $('.tooltipevent').fadeIn('500');
                    $('.tooltipevent').fadeTo('10', 1.9);
                }).mousemove(function (e) {
                    $('.tooltipevent').css('top', e.pageY + 10);
                    $('.tooltipevent').css('left', e.pageX + 20);
                });
            },
            
            //Evento de quitar el tooltip cuando el mouse está fuera de la evento
            eventMouseout: function(calEvent, jsEvent) {
                $(this).css('z-index', 8);
                $('.tooltipevent').remove();
            },
            
            //Evento de eliminar evento, cuando el usuario hace click en alguna de ellas
            eventClick: function (event, jsEvent, view) {
                inicio_servicio = event.start.format("YYYY-MM-DD");
                id_evento = event.id;
                $("#btn-modal-edit").click()
                $("#typeahead_2").val('');
                $('#actual-client').val(event.cliente);
                $('#actual-sede').val(event.sede);
            }
        })



        function saveEvent(method){
            if(method === 1){
                if($("#select_tipo_servicio").val() == '0'){
                    swal('Información', 'Selecciona el tipo de evento.', 'info')
                    return
                }
                if(moment(`${inicio_servicio} ${$("#hora_fin").val()}`).hours() < moment(`${inicio_servicio} ${$("#hora_inicio").val()}`).hours()){
                    swal('Información', 'La hora final debe ser mayor que la hora inicial.', 'info')
                    return
                }
                if(!id_cliente){
                    swal('Información', 'Por favor selecciona un cliente.', 'info')
                    return
                }
            }else{
                if($("#select_tipo_servicio_edit").val() == '0'){
                    swal('Información', 'Selecciona el tipo de evento.', 'info')
                    return
                }
                if(moment(`${inicio_servicio} ${$("#hora_fin_edit").val()}`).hours() < moment(`${inicio_servicio} ${$("#hora_inicio_edit").val()}`).hours()){
                    swal('Información', 'La hora final debe ser mayor que la hora inicial.', 'info')
                    return
                }
                if(!id_cliente){
                    swal('Información', 'Por favor selecciona un cliente.', 'info')
                    return
                }
            }

            var dataToSend = {
                method: 'create',
                title: $("#text-instrucciones").val(),
                start: inicio_servicio,
                allDay: $("#allDay:checked").length,
                tipo: $("#select_tipo_servicio").val(),
                hora_inicio: $("#hora_inicio").val(),
                hora_fin: $("#hora_fin").val(),
                idCliente: id_cliente,
                idSede: $("#select_sedes").val(),
                telefono_evento: $("#telefono_evento").val(),
                direccion_evento: $("#direccion_evento").val()
            }
            var dataToSendEdit = {
                method: 'edit',
                id_evento: id_evento,
                title: $("#text-instrucciones-edit").val(),
                start: inicio_servicio,
                allDay: $("#allDay_edit:checked").length,
                tipo: $("#select_tipo_servicio_edit").val(),
                hora_inicio: $("#hora_inicio_edit").val(),
                hora_fin: $("#hora_fin_edit").val(),
                idCliente: id_cliente,
                idSede: $("#select_sedes_edit").val(),
                telefono_evento: $("#telefono_evento_edit").val(),
                direccion_evento: $("#direccion_evento_edit").val()
            }

            swal({
                title: "¡Advertencia!",
                text: "¿Estás seguro de guardar este evento?",
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
                        //Peticion HTTP para guardar el evento
                        $.ajax({
                            url: '/evento/guardar',//URL del servicio
                            data: method === 1 ? dataToSend : dataToSendEdit,
                            type: "POST",//Método de envío
                            headers: {
                                "Content-Type": 'application/x-www-form-urlencoded',
                                "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                            },

                        })
                            .then(events => {
                                swal("¡Creación Correcta!", "Evento creado correctamente.", "success")
                                    .then(value => { //Boton OK actualizado
                                        if (value) {
                                            $("#btn-close2").click();
                                            $("#btn-close3").click();
                                            $('#calendar').fullCalendar('refetchEvents');//Refresca todos los eventos dentro del calendario
                                        }
                                    })
                            })
                            .catch(error => {
                                swal("¡Error!", 'Ha ocurrido un error al intentar crear el evento', "error")
                            })
                    }
                })
        }

        $("#delete-event").click(function(){
            $.ajax({
                url: '/eventos/elminar-evento',
                data: {
                    id: id_evento
                },
                type: 'POST',
                headers: {
                    "Content-Type": 'application/x-www-form-urlencoded',
                    "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                }
            })
            .then(res => {
                $("#btn-close3").click();
                $('#calendar').fullCalendar('refetchEvents');//Refresca todos los eventos dentro del calendario
            })
            .catch(err => {
                $("#btn-close3").click();
                $('#calendar').fullCalendar('refetchEvents');//Refresca todos los eventos dentro del calendario
            })
        })

        $("#form-calendario-edit").submit(event => {
            event.preventDefault();
            saveEvent(2);
        })

        $("#form-calendario").submit(event => {
            event.preventDefault();
            saveEvent(1);
        })
    });

</script>
@endsection