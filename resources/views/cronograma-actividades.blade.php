@extends('layouts.app')
{{-- Css --}}
@section('custom-css')
<link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
@endsection
{{-- Contenido --}}
@section('content')
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
                <strong>Tareas</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Tareas</h5>
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
                    <p>Arrastra las tareas dentro del calendario.</p>
                    <div id='external-events'>
                        
                        <div class='external-event navy-bg'>Tarea ejemplo</div>
                        
                        <p class="m-t">
                            <input type='checkbox' id='drop-remove' class="i-checks" checked /> <label for='drop-remove'>Quitar despues de soltar</label>
                        </p>
                    </div>

                    {{-- Formulario de guardar Eventos --}}
                    {!! Form::open(['route' => ['guardaEventos'], 'method' => 'POST', 'id' =>'form-calendario']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h2>Crear tareas</h2> <p>Aqui puedes crear todas las tareas que quieras sólo haciendo click en Agregar.</p>
                    <div class="form-group">
                        <select  id="tipo-tarea" class="form-control">
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
        </div>
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Striped Table </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
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
<script>

    $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

        /* Inicializa las Tareas (Eventos)
         -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {

                    var eventObject = {
                        title: $.trim($(this).text()) // usa el texto del elemento como titulo
                    };
                    
                    // Guarda el Objeto de Evento en el elemento DOM para que podamos llegar a él más tarde
                    $(this).data('eventObject', eventObject);

                    // hacer que el evento sea arrastrable usando la interfaz de usuario de jQuery UI
                    $(this).draggable({
                        zIndex: 1111999,
                        revert: true,      // hará que la tarea vuelva a su posición
                        revertDuration: 0  //  original después del arrastre
                    });
                });
            }
        ini_events($('#external-events div.external-event'));//Agrega la funcion Dropable a las tareas

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
            //Muestra todas las tareas de la BD
            events: { 
                url:"/tareas/index"
            },

            editable: true,
            droppable: true, // Premite las tareas se puedan arrastrar dentro del calendario
            drop: function(date, allDay) {
                //Obtiene todos los datos de la Tarea que fue arrastrada dentro del calendario
                var originalEventObject = $(this).data('eventObject');
                //Hace una copia de la tarea para que otras tareas no tengan referencia al mismo objeto
                var copiedEventObject = $.extend({}, originalEventObject);
                //Dia Completo = true
                allDay = 1;
                //Se obtienen los datos de la tarea
                copiedEventObject.start = date;//Obtiene la fecha de inicio
                copiedEventObject.allDay = allDay;//Obtiene la propiedad dia_completo
                copiedEventObject.backgroundColor = $(this).css("background-color");//Obtiene el color de fondo en RGB
                // Valida si esta chequeado el elemento de desaparecer luego de soltar
                if ($('#drop-remove').is(':checked')) {
                    // Quita la tarea del panel de tareas luego de ser soltada en el calendario
                    $(this).remove();
                    console.log(copiedEventObject.backgroundColor);
                }
                var title = copiedEventObject.title;//Obtiene el titulo o el asunto de la tarea
                var start = copiedEventObject.start.format("YYYY-MM-DD HH:mm");//Formatea la fecha para poder ser guardada en la BD
                var backgroundC = copiedEventObject.backgroundColor;//Obtiene  el color de fondo de la tarea
                
                crsfToken = document.getElementsByName("_token")[0].value;//Obtiene los valores del formulario
                //Utilizaciond el metodo AJAX para el envio de elementos al servidor
                $.ajax({
                    url: '/tareas/guardar-tarea',//Redirecciona a la direccion URL
                    data: 'title='+ title+'&start='+ start+'&allday='+allDay+'&background='+backgroundC,//Datos que enviará
                    type: "POST",//Método de envío
                    headers: {
                        "X-CSRF-TOKEN": crsfToken //Token de segurodad
                    },
                    success: function(events) {//En caso de ser exitoso el envio de datos
                        console.log('Evento creado'); //Escribe en la consola 
                        $('#calendar').fullCalendar('refetchEvents');//Refresca todos los eventos dentro del calendario
                    },
                    error: function(json){//En caso de ser erroneo el envio de datos 
                        console.log("Error al crear evento");//Escribe en consola
                    }        
                });
            },
            
            //Evento de reajustar el tamaño de la tarea dentro del calendario (interfaz de agenda dia)
            eventResize: function(event) {
                var start = event.start.format("YYYY-MM-DD HH:mm");
                var backgroundC=event.backgroundColor;
                var allDay=event.allDay;
                if(event.end){//valida si hay una fecha de terminación de la tarea
                    var end = event.end.format("YYYY-MM-DD HH:mm");
                }else{
                    var end="NULL"; //Sino la iguala a NULL
                }
                crsfToken = document.getElementsByName("_token")[0].value;
                    $.ajax({
                    url: '/tareas/editar-tarea',
                    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id+'&background='+backgroundC+'&allday='+allDay,
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

            //Evento de cambiar de dia la tarea dentro del calendario
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
                    url: '/tareas/editar-tarea',
                    data: 'title='+ event.title+'&start='+ start +'&end='+ end+'&id='+ event.id+'&background='+back+'&allday='+allDay ,           
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
            
            //Evento de mostrar el Tooltip teniendo el mouse dentro de la tarea
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
                //Componente HTML para mostrar la descripcion de la tarea (Tooltip)
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
                //Eventos cuando el mouse esta dentro de la tarea
                $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);//Mueve el tooltip con el mouse
                $('.tooltipevent').fadeIn('500');
                $('.tooltipevent').fadeTo('10', 1.9);
                }).mousemove(function(e) {
                $('.tooltipevent').css('top', e.pageY + 10);
                $('.tooltipevent').css('left', e.pageX + 20);
                });            
            },
            
            //Evento de quitar el tooltip cuando el mouse está fuera de la tarea
            eventMouseout: function(calEvent, jsEvent) {
                $(this).css('z-index', 8);
                $('.tooltipevent').remove();
            },
            
            //Evento de mostrar la interfaz de agenda del dia, dando click en cualquier dia del calendario
            dayClick: function(date, jsEvent, view) {
                if (view.name === "month") {
                    $('#calendar').fullCalendar('gotoDate', date);
                    $('#calendar').fullCalendar('changeView', 'agendaDay');
                }
            },
            
            //Evento de eliminar tarea, cuando el usuario hace click en alguna de ellas
            eventClick: function (event, jsEvent, view) {
                crsfToken = document.getElementsByName("_token")[0].value;
                var con=confirm("Esta seguro que desea eliminar el evento");//Muestra alert con botones de aceptar y cancelar
                if(con){//En caso de presionar aceptar
                    $.ajax({
                    url: '/tareas/elminar-tarea',
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

        /* Añadir tareas en el contenedor de tareas
        ------------------------------------------------------------------*/
        var currColor = '#5CAE27';
        // $('#add-new-event').css({"background-color": currColor, "border-color": currColor});//Añade las propiedades CSS a la nueva tarea
        //Evento del click en el boton (+) para agregar tarea
        $("#add-new-event").click(function (e) {
            e.preventDefault();
            //Obtiene el valor del Select con el tipo de tarea
            var tipo = $('#tipo-tarea').val();
            if (tipo == 1) {//Si es Llamada
                var val = $("#new-event").val();
                if (val.length == 0) {
                    return;
                }
                var otroColor = '#DBA525';
                var event = $("<div />"); //Agrega un DIV
                event.css({"background-color": otroColor, "border-color": otroColor, "color": "#fff"}).addClass("external-event");
                event.html(val); //Agrega la tarea al DOM
                $('#external-events').prepend(event); //Agrega la tarea en el contenedor
            }else if (tipo == 2) {//Si es Seguimiento
                var val = $("#new-event").val();
                if (val.length == 0) {
                    return;
                }
                var otroColor = '#45821D';
                var event = $("<div />"); //Agrega un DIV
                event.css({"background-color": otroColor, "border-color": otroColor, "color": "#fff"}).addClass("external-event");
                event.html(val); //Agrega la tarea al DOM
                $('#external-events').prepend(event); //Agrega la tarea en el contenedor
            }else{// SI es visita
                var val = $("#new-event").val();
                if (val.length == 0) {
                    return;
                }
                //Crear la tarea
                var event = $("<div />"); //Agrega un DIV
                event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
                event.html(val); //Agrega la tarea al DOM
                $('#external-events').prepend(event); //Agrega la tarea en el contenedor
            }
            //Añade la funcionalidad de Drag and Drop a la tarea
            ini_events(event);
            //Limpia el input de crear la tarea
            $("#new-event").val("");
        });
    });

</script>
@endsection