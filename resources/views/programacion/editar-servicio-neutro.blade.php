@extends('layouts.app')

@section('custom-css')
<link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
<link href="{{asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar Servicio</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Inicio</a>
            </li>
            <li>
                <a>Calendario</a>
            </li>
            <li class="active">
                <strong>Editar Servicio</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                {!! Form::open(['method' => 'POST', 'id' =>'form-editar']) !!}
                <div class="ibox-title">
                    <h5>Formulario para editar la información del servicio </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="form-group col-xs-12 col-lg-6">
                            <label class="control-label">Cliente </label>
                            <input type="text" disabled class="form-control" id="ver_nombre_cliente" style="width: 100%;background-color: #fff;"
                                value="{{$servicio[0]->solicitud->cliente->nombre_cliente}}">
                        </div>
                        <div class="form-group col-xs-12 col-lg-6">
                            <label class="control-label">Sede/Residencia </label>
                            @if($servicio[0]->solicitud->sede)
                            <input type="text" disabled class="form-control" id="ver_nombre_sede" style="width: 100%;background-color: #fff;"
                                value="{{$servicio[0]->solicitud->sede->nombre}}">
                            @else
                            <input type="text" disabled class="form-control" id="ver_nombre_sede" style="width: 100%;background-color: #fff;"
                                value="Sede Única">
                            @endif
                        </div>
                        <input type="hidden" id="solicitud_id" value="{{$servicio[0]->solicitud->id}}">
                        <div class="form-group col-lg-6" id="data_1">
                            <label>Fecha de inicio</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" placeholder="" name="fecha_inicio" id="fecha_inicio"
                                    value="{{$servicio[0]->fecha_inicio}}">
                            </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Hora de inicio*</label>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                                <input type="text" class="form-control" placeholder="09:30" name="hora_inicio" id="hora_inicio"
                                    value="{{$servicio[0]->hora_inicio}}">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Repetir cada:</label>
                            <div class="input-group">
                                <input style="width: 20%;margin-right: 10px;" type="number" name="indice-frecuencia" id="indice-frecuencia"
                                    class="form-control">
                                <select style="width: 30%;margin-left: 10px;" name="opcion-frecuencia" id="opcion-frecuencia"
                                    class="form-control">
                                    <option value="0" selected>Seleccione una opcion</option>
                                    <option value="dias" selected>Días</option>
                                    <option value="semanas">Semanas</option>
                                    <option value="meses">Meses</option>
                                    <option value="anios">Años</option>
                                </select>
                                <select style="width: 42.5%;margin-left: 10px;" name="" id="opcion-personalizada" class="form-control">
                                    <option value="">Opción personalizada</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Duración del servicio</label>
                            <div class="input-group col-lg-12">
                                <input style="width: 50%;" type="number" min="0" class="form-control" id="num_horas"
                                    placeholder="Horas">
                                <input style="width: 50%;" type="number" min="0" max="60" class="form-control" id="num_minutos"
                                    placeholder="Minutos">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Servicio a realizar</label>
                            <select class="form-control" id="select_servicios" multiple="multiple">
                                @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->nombre}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Tecnicos</label>
                            <select class="form-control" id="select_tecnicos2" multiple="multiple">
                                @foreach($tecnicos as $tecnico)
                                <option value="{{$tecnico->id}}">{{$tecnico->nombre}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-xs-6 col-md-2">
                            <label for="" style="margin-bottom: 6px;margin-right: 15px;" class="control-label">¿Confirmado?</label>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" id="confirmado">
                                    <label class="onoffswitch-label" for="confirmado">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Tipo de servicio: </label>
                            <select class="form-control" id="select_tipo_servicio">
                                <option value="">Seleccione una tipo.</option>
                                <option value="Normal">Normal</option>
                                <option value="Refuerzo">Refuerzo</option>
                                <option value="Neutro">Neutro</option>
                                <option value="Mensajeria">Mensajeria</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Instrucciones y Observaciones</label>
                            <textarea class="form-control" placeholder="Escriba aquí las observaciones para el técnico."
                                rows="1" name="instrucciones" id="text-instrucciones"></textarea>
                        </div>

                    </div>
                </div>
                <div class="ibox-footer">
                    <div class="btn-group">
                        <a type="button" href="/servicios/create" class="btn btn-white">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('ini-scripts')
<!-- Select2 -->
<script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script>

    $(document).ready(function () {
        //Separar los items del URL por /
        var path = window.location.pathname.split('/');
        //Obtiene el id del servicio que esta en el URL
        var id_servicio = path[3];

        //Inicizalizacion de Selects
        $("#select_servicios").select2({
            width: '100%',
            placeholder: 'Servicios...'
        });

        $("#select_tecnicos2").select2({
            width: '100%',
            placeholder: 'Técnicos...'
        });

        //Evento Submit del modal de crear Servicio
        $('#form-editar').submit(event => {
            event.preventDefault();
            //Declaracion de Variables locales de Servicio
            var duracion_servicio = (parseInt($("#num_horas").val()) * 60) + parseInt($("#num_minutos").val());
            var frecuencia;
            var start_event = $("#fecha_inicio").val();
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
            console.log(tecnicos);
            //Prueba de fechas y horas
            console.log($("#hora_inicio").val());//email, start1.format('YYYY-MM-DD HH:mm'));
            crsfToken = document.getElementsByName("_token")[0].value;
            var start_service = moment(start_event + $("#hora_inicio").val(), 'YYYY-MM-DD hh:mmA');
            var end_service = start_service.add(duracion_servicio, 'minutes');
            //var horaInicioFormat = moment($("#hora_inicio").val(), 'hh:mmA').format('HH:mm');
            let dataToSend = {
                tipos: tipos_servicio,
                frecuencia: frecuencia,
                tipo_servicio: tipoServicio,
                start: start_event,
                hora_inicio: moment(start_event + $("#hora_inicio").val(), 'YYYY-MM-DD hh:mmA').format("HH:mm"),
                hora_fin: end_service.format("HH:mm"),
                duracion: duracion_servicio,
                id_tecnicos: tecnicos,
                id_solicitud: $("#solicitud_id").val(),
                opcionFrecuencia: '',
                diaOrdinal: '',
                nombreDia: '',
                dayOfWeek: '',
                diaDelMes: '',
                observaciones: observaciones
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
            console.log(dataToSend)
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
                            url: `/servicios/${id_servicio}`,
                            data: {
                                option: '1'
                            },
                            type: 'DELETE',
                            headers: {
                                "Content-Type": 'application/x-www-form-urlencoded',
                                "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                            },
                        })
                            .then( res => {
                                //Peticion HTTP para guardar el evento
                                $.ajax({
                                    url: '/servicios',//URL del servicio
                                    data: dataToSend,
                                    //Datos que enviará
                                    /*{
                                        tipos: tipos_servicio,
                                        frecuencia: frecuencia,
                                        tipo_servicio: tipoServicio,
                                        start: start_event,
                                        hora_inicio: horaInicioFormat,
                                        duracion: duracion_servicio,
                                        id_tecnicos: tecnicos,
                                        id_solicitud: id_solicitud
                                    },*/
                                    type: "POST",//Método de envío
                                    headers: {
                                        "Content-Type": 'application/x-www-form-urlencoded',
                                        "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                                    },

                                })
                                    .then(events => {
                                        swal("¡Creación Correcta!", "Servicios creados correctamente.", "success")
                                            .then(value => { //Boton OK actualizado
                                                if (value) {
                                                    window.location.href = "/servicios/create"
                                                }
                                            })
                                    })
                                    .catch(error => {
                                        swal("¡Error!", 'Ha ocurrido un error al intentar crear los servicios', "error")
                                    })
                            })
                            .catch( err => {

                            })
                    }
                })
        });

        /**
        * Añade y cambia propiedades de los inputs(selects) con el ID seleccionado
        * @param {String} slctFrecuency: ID del Input de opciones de frecuencia
        * @param {String} slctCustomOpt: ID del input de opciones personalizadas
        **/
        function addOptionsAtSelects(slctFrecuency, slctCustomOpt) {
            let dateSelected = moment($("#fecha_inicio").val());
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
                let ordinalTextOfDay = getWeeksContainerOfDay(dateSelected.year(), dateSelected.month(), dateSelected.date(), dateSelected.day());
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
                                } else if (index == 4 && weekRange[4].indexDayOnWeek.includes(indexDay) && month == 1) {
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

        $("#opcion-frecuencia").change(event => {
            addOptionsAtSelects('frecuencia', 'personalizada');
        })

    });

</script>
@endsection