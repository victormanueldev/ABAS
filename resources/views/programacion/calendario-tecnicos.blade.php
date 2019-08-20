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
                    <h5>Técnicos </h5>
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
                            <div class="form-group col-sm-7 col-lg-9">
                                <label>Técnico: </label>
                                <select class="form-control" style="width: 85%" id="select_tecnicos">
                                    <option value="" selected>Seleccione un técnico</option>
                                    <option value="all" selected>Todos los Tecnicos</option>
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
                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-print-options"
                    id="btn-modal-p-o">
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
                            <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                                <div class="row">
                                    <div class="col-lg12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h4>Filtrar por fechas</h4>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" value="1"  name="option-filter" class="i-checks"/>
                                                <span class="m-l-xs">Fecha Actual</span>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" value="2"  name="option-filter" class="i-checks" />
                                                <span class="m-l-xs">Fecha de Mañana</span>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" value="3"  name="option-filter" class="i-checks"/>
                                                <span class="m-l-xs">Fecha Seleccionada</span>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-outline btn-primary" id="filter-dates">Aplicar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <h3>Lisado de servicios por realizar</h3>
                                        <div class="sk-spinner sk-spinner-pulse" id="loader"></div>
                                        <ul class="todo-list m-t ui-sortable" id="lista-servicios" style="cursor: pointer">
                                            {{-- Servicios --}}
                                        </ul>
                                        <div style="margin: 20px 20px 0 0; width: 68%;position: relative;display: inline-block;">
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
                                                            <button type="button" class="btn btn-primary m-r-sm" id="print-ods">OS</button>
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
                                                            <button type="button" class="btn btn-success m-r-sm" id="print-rt">RT</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-8" style="padding: 0">
                                                            <p style="margin-bottom: 0">Ruta de técnicos <br><i
                                                                    style="font-size: 10px;position: absolute;">(Generadas
                                                                    por ABAS)</i></p>
                                                        </div>
                                                    </td>
                                                    <td class="row">
                                                        <div class="col-sm-6 col-md-4" style="padding: 0">
                                                            <button type="button" class="btn btn-warning m-r-sm" id="print-ctf">CT</button>
                                                        </div>
                                                        <div class="col-sm-6 col-md-8" style="padding: 0">

                                                            <p style="margin-bottom: 0">Certificados <br><i style="font-size: 10px;position: absolute;">(Tomado
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
{{--
<script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
<!-- Full Calendar -->
<script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/locale/es.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment-timezone.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>


<script>

    /** Definicion de variables globales **/
    var daySelected;
    var filterState = false;

    /** Definicion de funcionaes JQuery **/
    $(document).ready(function () {

        /** Asignacion de fechas por default a dateRange **/
        $("#date-start").val(moment().tz("America/Bogota").format("MM/DD/YYYY"));
        $("#date-end").val(moment().tz("America/Bogota").add(13, "days").format("MM/DD/YYYY"));

        /** Inicializacion del iCheck **/
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        /** Inicializacion del Date Range **/
        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        /** Inicializacion del Calendario **/
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
                dow: [1, 2, 3, 4, 5, 6],
                start: '07:00',
                end: '18:00',
            },
            droppable: true,
            dayClick: function (start, end, allDay) {
                $("#lista-servicios").empty();
                $("#btn-modal-p-o").click();
                daySelected = start.format("YYYY-MM-DD");
                getServicesByDates($("#select_tecnicos").val(), start.format("YYYY-MM-DD"), start.format("YYYY-MM-DD"));
            },

        });

        //Evento click del boton
        $("#btn-buscar").click(event => {
            event.preventDefault();
            //Borra todos los URL existentes en el calendario
            $('#calendar').fullCalendar('removeEventSources', url);
            //Concatena el valor del select de tecnicos
            var url = "/tecnicos/servicios/" + $("#select_tecnicos").val();
            //Borra los eventos del calendario (Los quita de la interfaz)
            $('#calendar').fullCalendar('removeEvents');
            //Añande un nuevo source de los eventos para mostrar en el calendario
            $('#calendar').fullCalendar('addEventSource', url);
        });
    });

    /**
     * Obtiene los servicios dentro de un rango de fechas
     * @param idTecnicos: ID del Tecnico seleccionado
     * @param dateStart: Fecha de inicio de la busqueda
     * @param dateEnd: Fecha de fin de la busqueda
     */
    function getServicesByDates(idTecnician, dateStart, dateEnd) {
        $.get(`tecnicos/serviciosPorFecha/${idTecnician}/${dateStart}/${dateEnd}`)
            .then((res) => {
                console.log(res);
                //Variables de fechas
                var dateStart, dateEnd, diffDates;
                //Recorre los servicios retornados
                res.forEach((value, index) => {
                    $("#loader").remove();
                    //Formate las fechas con Moment
                    dateStart = moment(value.start);    //Hora Inicio del servicio
                    dateEnd = moment().tz('America/Bogota');    //Hora Actual Colombia
                    diffDates = dateStart.diff(dateEnd, 'hours');
                    if (diffDates >= 24) {  //Valida la diferencia de fechas en Dias
                        $("#lista-servicios").append(`
                                <li class="item-list" id="${index}">
                                    <input type="radio" value="${value.id}"  name="selected-service" class="i-checks"/>
                                    <span class="m-l-xs"><a id="${value.id}" class="text-primary" href="#" onclick="return false;">${value.nombre}</a> ${value.direccion}</span>
                                    <small class="label label-info pull-right"><i class="fa fa-clock-o"></i> ${dateStart.diff(dateEnd, 'days')} días</small>
                                </li>
                            `);
                        /** Inicializacion del iCheck **/
                        $('.i-checks').iCheck({
                            checkboxClass: 'icheckbox_square-green',
                            radioClass: 'iradio_square-green'
                        });
                    } else if (diffDates >= 0 && diffDates <= 1) {  //Valida la diferencia de fechas en Minutos
                        $("#lista-servicios").append(`
                                <li class="item-list" id="${index}">
                                    <input type="radio" value="${value.id}"  name="selected-service" class="i-checks"/>
                                    <span class="m-l-xs"><a id="${value.id}" class="text-primary" href="#" onclick="return false;">${value.nombre}</a> ${value.direccion}</span>
                                    <small class="label label-danger pull-right"><i class="fa fa-clock-o"></i> ${dateStart.diff(dateEnd, 'minutes')} min</small>
                                </li>
                            `);
                        /** Inicializacion del iCheck **/
                        $('.i-checks').iCheck({
                            checkboxClass: 'icheckbox_square-green',
                            radioClass: 'iradio_square-green'
                        });
                    } else if (diffDates < 0) {   //Valida que hayan servicios realizados
                        $("#lista-servicios").append(`
                                <li class="item-list" id="${index}">
                                    <input type="radio" value="${value.id}"  name="selected-service" class="i-checks"/>
                                    <span class="m-l-xs"><a id="${value.id}" class="text-primary" href="#" onclick="return false;">${value.nombre}</a> ${value.direccion}</span>
                                    <small class="label label-default pull-right">Realizado</small>
                                </li>
                            `);
                        /** Inicializacion del iCheck **/
                        $('.i-checks').iCheck({
                            checkboxClass: 'icheckbox_square-green',
                            radioClass: 'iradio_square-green'
                        });
                    } else {  //Valida la diferencia de fechas en Horas
                        $("#lista-servicios").append(`
                                <li class="item-list" id="${index}">
                                    <input type="radio" value="${value.id}"  name="selected-service" class="i-checks"/>
                                    <span class="m-l-xs"><a id="${value.id}" class="text-primary" href="#" onclick="return false;">${value.nombre}</a> ${value.direccion}</span>
                                    <small class="label label-primary pull-right"><i class="fa fa-clock-o"></i> ${diffDates} hors</small>
                                </li>
                            `);
                        /** Inicializacion del iCheck **/
                        $('.i-checks').iCheck({
                            checkboxClass: 'icheckbox_square-green',
                            radioClass: 'iradio_square-green'
                        });
                    }
                });
            })
            .catch((err) => {
                console.log(err)
            })
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
                        end: moment().tz("America/Bogota").add(1,'days').format('YYYY-MM-DD')
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
                        start: '',
                        end: ''
                    }
                break;
        }
        return selectedDates;
    }

    //Evento Click en filtro por rango de fechas
    $("#filter-dates").click(event => {
        $("#lista-servicios").empty();
        $("#filter-state").empty();
        //Valida la opcion de filtro de servicios
        switch ($("input[name='option-filter']:checked").val()) {
            case '1':   //Fecha Actual
                getServicesByDates($("#select_tecnicos").val(), moment().tz("America/Bogota").format('YYYY-MM-DD'), moment().tz("America/Bogota").format('YYYY-MM-DD'));
                $("#filter-state").append("(Filtro aplicado)");
                filterState = true;
                break;
            case '2':   //Fecha Mañana
                getServicesByDates($("#select_tecnicos").val(), moment().tz("America/Bogota").format('YYYY-MM-DD'), moment().tz("America/Bogota").add(1,'days').format('YYYY-MM-DD'));
                $("#filter-state").append("(Filtro aplicado)");
                filterState = true;
                break;
            case '3':   //Fecha Seleccionada
                getServicesByDates($("#select_tecnicos").val(), daySelected, daySelected);
                $("#filter-state").append("(Filtro no aplicado)");
                filterState = false;
                break;
            default:
                console.log("Uknown option")
                break;
        }
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
                window.open(`tecnicos/imprimir-${option}/${$("#select_tecnicos").val()}/${dates.start}/${dates.end}/all`);
            } else {
                window.open(`tecnicos/imprimir-${option}/${$("#select_tecnicos").val()}/${daySelected}/${daySelected}/all`);
            }
        } else if (!verifySelected) {
            //Envia el ID del servicio seleccionado en los Radiobuttons
            if (filterState === true) {
                window.open(`tecnicos/imprimir-${option}/${$("#select_tecnicos").val()}/${dates.start}/${dates.end}/${$("input[name='selected-service']:checked").val()}`);
            } else {
                window.open(`tecnicos/imprimir-${option}/${$("#select_tecnicos").val()}/${daySelected}/${daySelected}/${$("input[name='selected-service']:checked").val()}`);
            }
        } else {
            swal("Información", "Selecciona al menos un servicio antes de imprimir", "info")
        }
    }

    $("#btn-imprimir").click(() => {
        $("#lista-servicios").empty();
        $("#btn-modal-p-o").click();
    })

    //Evento Click del boton de imprimir paquete completo
    $("#print-all").click(event => {
        printOptions('todo')
    })

    //Evento Click del boton de imprimir solo ordenes de servicio
    $("#print-ods").click(event => {
        printOptions('ods')
    })

    //Evento Click del boton de imprimir solo rutas de saneamiento
    $("#print-rs").click(event => {
        printOptions('rs')
    })

    //Evento Click del boton de imprimir solo rutas de roedores internas
    $("#print-rri").click(event => {
        printOptions('rri')
    })

    //Evento Click del boton de imprimir solo rutas de roedores externas
    $("#print-rre").click(event => {
        printOptions('rre')
    })

    //Evento Click del boton de imprimir solo rutas de lamparas
    $("#print-rl").click(event => {
        printOptions('rl')
    })

    $("#print-ctf").click(event => {
        printOptions('ctf')
    })

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


</script>
@endsection