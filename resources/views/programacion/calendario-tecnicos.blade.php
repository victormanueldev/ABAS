@extends('layouts.app')
{{-- Css --}}
@section('custom-css')
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
{{-- <link href="{{asset('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel='stylesheet'> --}}
@endsection
{{-- Contenido --}}
@section('content')
<script>
    document.getElementById('m-calendario-tecnicos').setAttribute("class", "active");
    document.getElementById('a-calendario-tecnicos').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Cronograma</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Inicio</a>
            </li>
            <li>
                Tecnicos
            </li>
            <li class="active">
                <strong>Calendario</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Técnicos  </h5>
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
                    <div class="row">
                        <form class="form-inline">
                        <div class="form-group col-sm-9 col-lg-9">
                            <label>Frecuencia: </label>
                            <select class="form-control" style="width: 85%" id="select_tecnicos" >
                                <option value="" selected>Seleccione un técnico</option>
                                @foreach($tecnicos as $tecnico)
                                    <option value="{{$tecnico->id}}">{{$tecnico->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-lg-3">
                            <button class="btn btn-primary" type="button" id="btn-buscar">Ver cronograma</button>
                        </div>
                        </form>
                    </div>
                </div>

                {{-- Botones para mostrar modals --}}
                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-print-options" id="btn-modal-p-o">
                    Modal Print
                </button>

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
                            <div class="modal-body ibox-content"  style="padding: 20px 30px 15px 30px;">
                                <div class="row">
                                    <div class="col-lg12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h3>Filtrar por fechas</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" id="data_5" >
                                                    <div class="input-daterange input-group" id="datepicker" style="width: 100%;">
                                                        <input type="text" id="date-start" class="form-control-sm form-control" name="start" value="01/14/2018"/>
                                                        <span class="input-group-addon">hasta</span>
                                                        <input type="text" id="date-end" class="form-control-sm form-control" name="end" value="01/22/2018" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                    <button type="button" class="btn btn-primary" id="filter-dates">Filtrar</button>
                                                    <button type="button" class="btn btn-default" id="filter-today">Quitar filtro</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <h3>Lisado de servicios por realizar</h3>
                                        <div class="sk-spinner sk-spinner-pulse" id="loader"></div>
                                        <ul class="todo-list m-t ui-sortable" id="lista-servicios">
                                            {{-- Servicios --}}
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 b-r">
                                        <h3>Opciones de impresión</h3>

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
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Calendario  </h5>
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
            </div>
        </div>
    </div>
</div>
@endsection
{{-- JavaScript --}}
@section('ini-scripts')
<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
<!-- Date Range -->
{{-- <script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
<!-- Full Calendar -->
<script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/locale/es.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment-timezone.js')}}"></script>
<script src="{{asset('js/date.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>


<script>
    $(document).ready(function() {
        $("#date-start").val(moment().tz("America/Bogota").format("MM/DD/YYYY"));
        $("#date-end").val(moment().tz("America/Bogota").add(5, "days").format("MM/DD/YYYY"));
        
        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });


        $("#calendar").fullCalendar({
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
            eventLimit: true,
            editable: true,
            eventLimit: true,
            nowIndicator: true,
            businessHours: {
                dow: [ 1, 2, 3, 4, 5, 6 ], 
                start: '07:00', 
                end: '18:00', 
            },
            droppable: true, 
            dayClick: function(start, end, allDay) {
                $("#lista-servicios").empty();
                $("#btn-modal-p-o").click();
                getServicesByDates($("#select_tecnicos").val(), start.format("YYYY-MM-DD"), start.format("YYYY-MM-DD"));
            },

        });
        
        /**
         * Obtiene los servicios dentro de un rango de fechas
         * @param idTecnicos
         * @param dateStart
         * @param dateEnd
         */
        function getServicesByDates(idTecnician, dateStart, dateEnd) {
            $.get(`tecnicos/serviciosPorFecha/${idTecnician}/${dateStart}/${dateEnd}`)
                .then((res) => {
                    //Variables de fechas
                    var dateStart, dateEnd, diffDates;
                    //Recorre los servicios retornados
                    res.forEach((value, index) => {
                        $("#loader").remove();
                        //Formate las fechas con Moment
                        dateStart = moment(value.start);    //Hora Inicio del servicio
                        dateEnd = moment().tz('America/Bogota');    //Hora Actual Colombia
                        diffDates = dateStart.diff(dateEnd, 'hours');
                        if( diffDates >= 24 ){  //Valida la diferencia de fechas en Dias
                            $("#lista-servicios").append(`
                                <li class="item-list" id="${index}">
                                    <span class="m-l-xs"><b>${value.nombre}</b> ${value.direccion}</span>
                                    <small class="label label-info pull-right"><i class="fa fa-clock-o"></i> ${dateStart.diff(dateEnd, 'days')} días</small>
                                </li>
                            `);
                        }else if(diffDates >= 0 && diffDates <=1){  //Valida la diferencia de fechas en Minutos
                            console.log(diffDates)
                            $("#lista-servicios").append(`
                                <li class="item-list" id="${index}">
                                    <span class="m-l-xs"><b>${value.nombre}</b> ${value.direccion}</span>
                                    <small class="label label-danger pull-right"><i class="fa fa-clock-o"></i> ${dateStart.diff(dateEnd, 'minutes')} min</small>
                                </li>
                            `);
                        }else if(diffDates < 0 ) {   //Valida que hayan servicios realizados
                            return;
                        }else{  //Valida la diferencia de fechas en Horas
                            $("#lista-servicios").append(`
                                <li class="item-list" id="${index}">
                                    <span class="m-l-xs"><b>${value.nombre}</b> ${value.direccion}</span>
                                    <small class="label label-primary pull-right"><i class="fa fa-clock-o"></i> ${diffDates} hors</small>
                                </li>
                            `);
                        }
                    });
                })
                .catch((err) => {
                    console.log(err)
                })
        }
        //Evento click del boton
        $("#btn-buscar").click(event => {
            event.preventDefault();
            //Borra todos los URL existentes en el calendario
            $('#calendar').fullCalendar('removeEventSources', url);
            //Concatena el valor del select de tecnicos
            var url="/tecnicos/servicios/"+$("#select_tecnicos").val();
            //Borra los eventos del calendario (Los quita de la interfaz)
            $('#calendar').fullCalendar('removeEvents');
            //Añande un nuevo source de los eventos para mostrar en el calendario
            $('#calendar').fullCalendar('addEventSource', url);
        });
    });
</script>
@endsection