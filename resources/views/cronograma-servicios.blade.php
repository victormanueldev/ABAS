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
        <!--<div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Crear Eventos</h5>
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
                    <p>Aqui puedes crear todas las Eventos que quieras sólo haciendo click en Agregar.</p>
                    <div class="form-group">
                        <select  id="tipo-evento" class="form-control">
                            <option value="1">Llamada</option>
                            <option value="2">Seguimiento</option>
                            <option value="3">Visita</option>
                        </select> 
                    </div>
                    <div class="input-group">
                        <input id="new-event" type="text" class="form-control" placeholder="Escriba el asunto"><span class="input-group-btn">
                            <button id="add-new-event" class="btn btn-primary">+</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Eventos</h5>
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
                    <p>Arrastra los Eventos dentro del calendario.</p>
                    <div id='external-events'>
                        
                        <div class='external-event navy-bg'>evento ejemplo</div>
                        
                        <p class="m-t">
                            <input type='checkbox' id='drop-remove' class="i-checks" checked /> <label for='drop-remove'>Quitar despues de soltar</label>
                        </p>
                    </div>


                </div>
            </div>
        </div>-->
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
                <button style="display: none" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" id="btn-modal">
                    Launch demo modal
                </button>
                 {{-- Formulario de guardar Eventos --}}
                 
                 <div class="ibox-content">
                     <div id="calendar"></div>
                    </div>
                
                <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" style="margin: 120px auto">
                        <div class="modal-content animated bounceInRight">
                            {!! Form::open(['route' => ['guardaEventos'], 'method' => 'POST', 'id' =>'form-calendario']) !!}
                            <div class="modal-header">
                                <button type="button" class="close" id="btn-close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <i class="fa fa-laptop modal-icon"></i>
<<<<<<< HEAD
                                <h4 class="modal-title">Agregar servicio</h4>
                                <small class="font-bold">Se añadira en el calendario un servicio para realizar</small>
=======
                                <h4 class="modal-title">Modal title</h4>
                                <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                            </div>
                            <div class="modal-body">
                                <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                    remaining essentially unchanged.</p>
                                        <div class="form-group"><label>Sample Input</label> <input required type="email" placeholder="Enter your email" class="form-control" id="email"></div>
>>>>>>> 10b3a73eaba8814bd90b04eb902304b5d2440400
                            </div>
                            {{-- <div class="modal-body"></div> --}}

                            
                                <div class="form-group col-lg-4" id="data_1">
                                    <label>Fecha *</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="fecha" class="form-control" placeholder="" name="fecha_creacion">
                                    </div>
                                </div>

                                <div class="form-group col-lg-4" id="data_1">
                                    <label>Hora *</label>
                                    <div class="input-group">
                                       <input type="text"  id="input-nit" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group col-lg-4" id="data_1">
                                    <label>Tiempo de servicio *</label>
                                    <div class="input-group">
                                       <input type="text"  id="input-nit"  placeholder="Horas" class="form-control">
                                    </div>
                                </div>
                                    
                                <div class="ibox-title col-lg-12">
                                    <h3>Facturar a nombre de:</h3>
                                    <br>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="control-label">Razón Social/Nombre *</label>
                                    
                                    <select class="form-control " id="select_clientes" name="id_cliente">
                                        <option value="" selected disabled>Selecciona un cliente</option>
                                        {{-- @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre_cliente}}</option>
                                        @endforeach --}}

                                    </select>

                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                    <input type="text"  id="input-nit"  placeholder="Nit ó Cedula" class="form-control">
                                                
                                </div>


                                <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                    <input type="text"  id="input-direccion"  placeholder="Dirección de cliente" class="form-control">
                                    
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                    <input type="text"  id="input-ciudad"  placeholder="Ciudad del cliente" class="form-control">
                                    
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                    <input type="text" id="input-barrio"  placeholder="Barrio del cliente" class="form-control">

                                </div>

                                
                                <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                    <input type="text" id="input-contacto"  placeholder="Nombre de contacto del servicio" class="form-control">
                                    
                                </div>
                                
                                <div class="form-group col-lg-6"><label class="control-label">Cargo *</label>
                                    <input type="text" id="input-cargo"  placeholder="Zona del cliente" class="form-control">

                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                    <input type="text" id="input-telefono"  placeholder="Teléfono del contacto a facturar" class="form-control">
                                    
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                    <input type="text" id="input-celular"  placeholder="Celular del contacto a facturar" class="form-control">

                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                    <input type="email"  id="input-email"  placeholder="Email del contacto a facturar" class="form-control">
                                    
                                </div>


                                <div class="ibox-title col-lg-12">
                                    <br>
                                    <h3>Realizar servicio en:</h3>
                                    <br>
                                </div>
                                            

                                <div class="form-group col-lg-6">
                                    <label class="control-label">Razón Social/Nombre *</label>
                                    
                                    <select class="form-control " id="select_sedes" name="id_sede">
                                        <option value="">Selecciona una sede</option>
                                    </select>

                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                    <input type="text" id="input-sede-nit"  placeholder="Nit ó Cedula" class="form-control">
                                                
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                    <input type="text"  id="input-sede-direccion" placeholder="Dirección de donde se realizará el servicio" class="form-control">
                                    
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                    <input type="text" id="input-sede-ciudad"  placeholder="Ciudad donde se realizará el servicio" class="form-control">
                                    
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                    <input type="text" id="input-sede-barrio"  placeholder="Barrio donde se realizará el servicio" class="form-control">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Zona *</label>
                                    <input type="text" id="input-sede-zona"  placeholder="Zona donde se realizará el servicio" class="form-control">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                    <input type="text" id="input-sede-contacto"  placeholder="Nombre de contacto del lugar" class="form-control">
                                    
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                    <input type="text" id="input-sede-telefono"  placeholder="Teléfono del contacto del servicio" class="form-control">
                                    
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                    <input type="text" id="input-sede-celular"  placeholder="Celular del contacto del lugar" class="form-control">
                                </div>
    
                                <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                    <input type="email" id="input-sede-email"   placeholder="Email del contacto del servicio" class="form-control">
                                    
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Servicio a realizar *</label>
                                    <input type="" id=""   placeholder="" class="form-control">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="control-label">Técnicos *</label>
                                    
                                    <select class="form-control " id="select_clientes" name="id_cliente">
                                        <option value="" selected disabled>Selecciona un Técnico</option>
                                        <option value="" selected disabled>Andres</option>
                                        <option value="" selected disabled>Luis</option>
                                        <option value="" selected disabled>Valentina</option>
                                    </select>

                                </div>



                            <div class="modal-footer">
<<<<<<< HEAD
                                <button type="button" id="btn-close2" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button type="button" id="btn-submit" class="btn btn-primary">Guardar</button>
=======
                                <button type="button" id="btn-close2" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" id="btn-submit" class="btn btn-primary">Save changes</button>
>>>>>>> 10b3a73eaba8814bd90b04eb902304b5d2440400
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
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script>

    $(document).ready(function() {

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
        var start1;
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

            //Evento de mostrar la interfaz de agenda del dia, dando click en cualquier dia del calendario
            dayClick: function(start, end, allDay) {
                //Simula click en el boton de mostrar el modal
                document.getElementById("btn-modal").click();
                //Evento click del boton submit del Formulario de la ventana modal
                start1 = start;

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
            },
            
            //Evento de quitar el tooltip cuando el mouse está fuera de la evento
            eventMouseout: function(calEvent, jsEvent) {
                $(this).css('z-index', 8);
                $('.tooltipevent').remove();
            },
            
            //Evento de eliminar evento, cuando el usuario hace click en alguna de ellas
            eventClick: function (event, jsEvent, view) {
                crsfToken = document.getElementsByName("_token")[0].value;
                var con=confirm("Esta seguro que desea eliminar el evento");//Muestra alert con botones de aceptar y cancelar
                if(con){//En caso de presionar aceptar
                    $.ajax({
                    url: '/eventos/elminar-evento',
                    data: 'id=' + event.id,
                    headers: {
                        "X-CSRF-TOKEN": crsfToken
                        },
                    type: "POST",
                    success: function () {
                            $('#calendar').fullCalendar('removeEvents', event._id);
                            console.log("Evento eliminado");
                        }
                    });
                }else{
                console.log("Cancelado");
                }
            }
        });
        $('#form-calendario').submit(event => {
                    //Obtener el valor de un elemento del formulario
                    event.preventDefault();
                    var email = document.getElementById('email').value;
                    //Prueba de fechas y horas
                    console.log(email, start1.format('YYYY-MM-DD HH:mm'));
                })
    });

</script>
@endsection