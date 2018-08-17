@extends('layouts.app')
{{-- Css --}}
@section('custom-css')
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
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
                            <button class="btn btn-white" type="button" id="btn-buscar">Ver cronograma</button>
                        </div>
                        </form>
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

<!-- Full Calendar -->
<script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/locale/es.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/date.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>


<script>
    $(document).ready(function() {
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

            },

        });
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