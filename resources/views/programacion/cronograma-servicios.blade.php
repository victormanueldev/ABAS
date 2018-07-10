@extends('layouts.app')
{{-- Css --}}
@section('custom-css')
<link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
<link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
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
                <button style="display: none" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modal-servicios" id="btn-modal">
                    Launch demo modal
                </button>
                <button style="display: none" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#event-option" id="btn-modal2">
                    Launch demo modal
                </button>

                 {{-- Formulario de guardar Eventos --}}
                 <div class="ibox-content">
                     <div id="calendar"></div>
                    </div>
                
                <div class="modal inmodal" id="modal-servicios" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated bounceInRight">
                            {!! Form::open(['route' => ['guardaEventos'], 'method' => 'POST', 'id' =>'form-calendario']) !!}

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            
                                <h4 class="modal-title">Agregar servicio</h4>
                                <small class="font-bold">Se añadira en el calendario un servicio para realizar</small>
                            </div>
                            {{-- <div class="modal-body" style="padding: 16px;"> --}}
                            <div class="row" style="padding: 20px;">
                                
                                <div class="form-group col-lg-12" id="data_1">
                                <label>Fecha *</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="fecha" class="form-control" placeholder="" name="fecha_creacion">
                                    </div>
                                </div>

                            {{-- </div> --}}
                            {{-- </div> --}}

                            
                            {{-- <div class="form"> --}}

                                <div class="form-group col-lg-6">
                                    <!-- Select con Autocompletar-->
                                    <label >Cliente *</label>
                                    <select data-placeholder="Seleccione NIT" class="chosen-select"  tabindex="2" id="select_clientes" name="id_cliente">
                                        <option value="" selected disabled>Selecciona un cliente</option>
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nit_cedula}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="control-label">Sede *</label>
                                    
                                    <select class="form-control " id="select_sedes">
                                        <option value="" selected disabled>Selecciona una sede</option>
                                    </select>

                                </div>
                                <div class="row" style="padding: 0px 15px">
                                    <div class="form-group col-lg-2">
                                        <label>Frecuencia sugerida</label>
                                        <input type="text" class="form-control" id="frecuencia_solicitud">
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label>Otra</label>
                                        <input type="checkbox" class="form-control" id="check">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Frecuencia</label>
                                        <select class="form-control" id="select_frecuencia" name="frecuencia_calidad" disabled>
                                            <option value="">Seleccione una frec.</option>
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
                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Servicios *</label>
                                        
                                        <select class="form-control " id="select_tipo" name="tipo_servicio">
                                            <option value="" selected disabled>Selecciona un Servicio</option>
                                            <option value="Fumigacion">Fumigación</option>
                                            <option value="Desratizacion">Desratización</option>
                                            <option value=""></option>
                                        </select>
    
                                    </div>
                                </div>

                                <div class="row" style="padding: 0px 15px;">
                                    <div class="form-group col-lg-2" >
                                        <label>Hora *</label>
                                        <div class="input-group" style="width: 100%">
                                            <input type="time"  class="form-control" id="hora_inicio" style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4" >
                                        <label >Tiempo del servicio</label>
                                        <div class="input-group">
                                            <input style="width: 45%;margin-right: 10px;" type="number" min="0" class="form-control" id="num_horas" placeholder="Horas">
                                            <input style="width: 47%;margin-left: 10px;" type="number" min="0" max="60" class="form-control" id="num_minutos" placeholder="Minutos">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-5">
                                        <label class="control-label">Técnicos *</label>
                                        
                                        <select class="form-control " id="select_tecnicos" >
                                            <option value="" selected disabled>Selecciona un Técnico</option>
                                            @foreach($tecnicos as $tecnico)
                                                <option value="{{$tecnico->id}}">{{$tecnico->nombre}} </option>
                                            @endforeach
                                        </select>
    
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label class="control-label">Color *</label>
                                        <div id="color" class="circle" style="background-color: white;"></div>
                                    </div>
                                </div>


                                <div class="form-group col-lg-12">
                                    <label>Instrucciones y Observaciones</label>
                                    <textarea class="form-control" placeholder="Escriba aquí las observaciones para el técnico." rows="1" name="instrucciones" id="text-instrucciones"></textarea>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" id="btn-close2" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button> {{-- No se si este boton de guardar sea necesario. --}}
                                <button type="button" class="btn btn-primary">Imprimir</button>

                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="modal inmodal fade" id="event-option" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Opciones del servicio</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Opciones *</label>
                                    
                                    <select class="form-control " id="select_opciones" name="opcion">
                                        <option value="" selected disabled>Selecciona una opción</option>
                                        <option value="1">Imprimir documentos por Técnico</option>
                                        <option value="2"> Imprimir documentos por Servicio</option>
                                        <option value="3"> Eliminar servicio</option>
                                    </select>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Aceptar</button>
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
<script src="{{asset('js/plugins/fullcalendar/locale/es.js')}}"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<!-- Chosen -->
<script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>
<script>

    $(document).ready(function() {

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.chosen-select').chosen({width: "100%"});

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
                inicio_servicio = start.format("YYYY-MM-DD ");

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
                console.log(event);            
            },
            
            //Evento de quitar el tooltip cuando el mouse está fuera de la evento
            eventMouseout: function(calEvent, jsEvent) {
                $(this).css('z-index', 8);
                $('.tooltipevent').remove();
            },
            
            //Evento de eliminar evento, cuando el usuario hace click en alguna de ellas
            eventClick: function (event, jsEvent, view) {
                crsfToken = document.getElementsByName("_token")[0].value;
                // var con=confirm("Esta seguro que desea eliminar el evento");//Muestra alert con botones de aceptar y cancelar
                // if(con){//En caso de presionar aceptar
                //     $.ajax({
                //     url: '/eventos/elminar-evento',
                //     data: 'id=' + event.id,
                //     headers: {
                //         "X-CSRF-TOKEN": crsfToken
                //         },
                //     type: "POST",
                //     success: function () {
                //             $('#calendar').fullCalendar('removeEvents', event._id);
                //             console.log("Evento eliminado");
                //         }
                //     });
                // }else{
                // console.log("Cancelado");
                // }
                document.getElementById("btn-modal2").click();
            } 
        });

        //Evento change del select de clientes
        $("#select_clientes").change(event => {
                //Peticion GET al servidor a la ruta /sedes/clientes/{id} (Sedes de cliente)
                $.get(`/sedes/cliente/${event.target.value}`,  function (res) {
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
        
        //Evento click del checbox
        $("#check").on('click', function () {
            if ($("#check:checked").length == 1) {  //valida que el checkbox este seleccionado
                $("#select_frecuencia").attr('disabled', false);        //Habilita el select
                $("#frecuencia_solicitud").attr('disabled', true);      //Deshabilita el input
                checkbox = true;
            }else{
                $("#select_frecuencia").attr('disabled', 'disabled');   //Deshabilita el select
                $("#frecuencia_solicitud").attr('disabled', false);     //Habilita el input
                checkbox = false;
            }
        })
        
        //Evento change del select de tecnicos
        $("#select_tecnicos").change(event => {
            $.get(`/tecnicos/getColor/${event.target.value}`, function (res) {
                //Peticion para obtener el color de un técnico
                $("#color").attr('style', `background-color: ${res[0].color}`); //Cambia el color del elemento
                color = res[0].color;   //Guarda el color en la variable publica
            });
        })
        
        //Peticion al servidor para obtener la solicitud de una sede
        function obtenerSolicitudSede(id_cliente, id_sede, crsfToken ) {
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
                        //console.log(res[0]['frecuencia']);
                        id_solicitud = res[0]['id'];
                        frecuencia_solicitud = res[0]['frecuencia']; //Guarda la frecuencia en la variable publica
                        switch (res[0]['frecuencia']) { //Valida la respuesta del servidor (Frecuencia del servicio desde la solicitud)
                            case 7:
                                $("#frecuencia_solicitud").val('Semanal'); //Cambia el valor del input       
                                break;

                            case 15:
                                $("#frecuencia_solicitud").val('Quincenal');        
                                break;

                            case 30:
                                $("#frecuencia_solicitud").val('Mensual');        
                                break;

                            case 60:
                                $("#frecuencia_solicitud").val('Bimestral');        
                                break;
                            
                            case 90:
                                $("#frecuencia_solicitud").val('Trimestral');        
                                break;

                            case 120:
                                $("#frecuencia_solicitud").val('Cada 4 meses');        
                                break;

                            case 180:
                                $("#frecuencia_solicitud").val('Semestral');        
                                break;

                            case 360:
                                $("#frecuencia_solicitud").val('Anual');        
                                break;

                            default:
                                $("#frecuencia_solicitud").val('selected');  
                                break;
                        }
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

        //Evento change del select de Sedes
        $("#select_sedes").change(event => {
            
            $.get(`/sedes/${event.target.value}`, function (res) {
                //
            }).then((res) => {
                console.log('Petición Exitosa');
            }).catch((err) => {
                console.log(err);
            });
            crsfToken = document.getElementsByName("_token")[0].value;
            var id_cliente = $("#select_clientes").val();
            var id_sede = $("#select_sedes").val();
            obtenerSolicitudSede(id_cliente, id_sede, crsfToken);
            
        });

        //Evento Submit del modal de crear Servicio
        $('#form-calendario').submit(event => {
            event.preventDefault();
            //Declaracion de Variables locales de Servicio
            var duracion_servicio = (parseInt($("#num_horas").val()) * 60) + parseInt($("#num_minutos").val()) 
            var frecuencia;
            var start_event = inicio_servicio+" "+$("#hora_inicio").val();
            if(checkbox){   //Valida que el checkbox este seleccionado
                frecuencia = parseInt($("#select_frecuencia").val());
            }else{
                frecuencia = frecuencia_solicitud;  //Guarda la frecuencia en la variable global
            }
            //Prueba de fechas y horas
            console.log($("#hora_inicio").val());//email, start1.format('YYYY-MM-DD HH:mm'));
            crsfToken = document.getElementsByName("_token")[0].value;
            //Peticion HTTP para guardar el evento
            $.ajax({
                url: '/servicios',//Redirecciona a la direccion URL
                data:
                    //Datos que enviará
                    'tipo='+$("#select_tipo").val()+
                    '&frecuencia='+frecuencia+
                    '&start='+start_event+
                    '&duracion='+duracion_servicio+
                    '&color='+color+
                    '&id_tecnico='+$("#select_tecnicos").val()+
                    '&id_solicitud='+id_solicitud,
                type: "POST",//Método de envío
                headers: {
                    "Content-Type": 'application/x-www-form-urlencoded',
                    "X-CSRF-TOKEN": crsfToken //Token de seguridad
                },
                success: function(events) {//En caso de ser exitoso el envio de datos
                    console.log('Evento creado'); //Escribe en la consola
                    document.getElementById("btn-close2").click();
                    $('#calendar').fullCalendar('refetchEvents');//Refresca todos los eventos dentro del calendario
                },
                error: function(json){//En caso de ser erroneo el envio de datos 
                    console.log("Error al crear evento");//Escribe en console
                }        
            });
        });


    });

</script>
@endsection