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
                {!! Form::open(['method' => 'PUT', 'id' =>'form-editar']) !!}
                <div class="ibox-title">
                    <h5>Formulario para editar la información del servicio </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="form-group col-lg-6" id="data_1">
                                    <label>Fecha de inicio</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" placeholder="" name="fecha_inicio" id="fecha_inicio" value="{{$servicio->fecha_inicio}}">
                                    </div>
                                </div>

                                 <div class="form-group col-lg-6">
                                    <label>Hora de inicio*</label>
                                    <div class="input-group clockpicker" data-autoclose="true">
                                        <span class="input-group-addon">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                        <input type="text" class="form-control" placeholder="09:30" name="hora_inicio" id="hora_inicio" value="{{$servicio->hora_inicio}}">
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

                                <div class="form-group col-lg-6" >
                                    <label >Duración del servicio</label>
                                    <div class="input-group col-lg-12">
                                        <input style="width: 50%;" type="number" min="0" class="form-control" id="num_horas" placeholder="Horas">
                                        <input style="width: 50%;" type="number" min="0" max="60" class="form-control" id="num_minutos" placeholder="Minutos">
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label >Servicio a realizar</label>
                                    <select class="form-control" id="select_servicios" multiple="multiple">
                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->nombre}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                 <div class="form-group col-lg-4">
                                    <label >Tecnicos</label>
                                    <select class="form-control" id="select_tecnicos2" multiple="multiple">
                                        @foreach($tecnicos as $tecnico)
                                            <option value="{{$tecnico->id}}">{{$tecnico->nombre}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-xs-6 col-lg-2">
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
                                
                            </div>
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
        var switchery
        var id_servicio;
        $(document).ready(function() {
            //Separar los items del URL por /
            var path = window.location.pathname.split('/');
            //Obtiene el id del servicio que esta en el URL
            id_servicio = path[2];
            //Declara arrays para la estructuracion de informacion necesaria para llenar los selects
            var tipos_seleccionados = new Array();
            var tecnicos_asignados = new Array();
            //Peticion al servidor para obtener los tipos de servicios y los tecnicos de ese servicio
            $.get(`/servicios/${id_servicio}`)
            .then((res) => {
                //Inicizalizacion de Selects
                $("#select_servicios").select2({
                    width: '100%',
                    placeholder: 'Servicios...'
                });
                $("#select_tecnicos2").select2({
                    width: '100%',
                    placeholder: 'Técnicos...'
                });
                //Recorre la respuesta para llenar un array ordenado de la forma correcta para la visualizacion
                res[0].tipos.forEach((value, index) => {
                    tipos_seleccionados[index] = value.id.toString();
                });
                res[0].tecnicos.forEach((value, index) => {
                    tecnicos_asignados[index] = value.id.toString();
                });
                //Selecciona los valores en el select
                $("#select_servicios").select2('val', tipos_seleccionados);
                $("#select_tecnicos2").select2('val', tecnicos_asignados);
                $("#select_frecuencia").val(res[0].frecuencia).change();
                //Operacion para convertir los minutos a horas
                var hours = Math.floor((res[0].duracion)/60);
                var minutes = (res[0].duracion % 60);
                //Setting a los valores de los input de duracion (horas y minutos)
                $("#num_horas").val(hours);
                $("#num_minutos").val(minutes);
                //Valida que el Servicio (Sanicontrol) esta confirmado
                if(res[0].confirmado === 1){
                    //Checkea el checkbox de confirmacion
                    $("#confirmado").attr('checked', 'checked');
                }
            })
            .catch((err) => {
                console.log(err);
            });

            
            $("#form-editar").submit(event => {
                event.preventDefault();
                //Alert de confirmacion
                swal({
                    title: "¡Advertencia!",
                    text: "¿Estás seguro de guardar esta información?",
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
                .then(isConfirm =>  { //Boton Aceptar presionado
                    if (isConfirm) {
                        //Variables locales
                        var frecuencia;
                        var tecnicos = []; 
                        var tipos_servicio = [];
                        var duracion;
                        var confirmado;
                        var crsfToken;
                        //Setting de variables para estructuracion de informacion
                        duracion = (parseInt($("#num_horas").val()) * 60) + parseInt($("#num_minutos").val()) 
                        frecuencia = parseInt($("#select_frecuencia").val());
                        $("#select_tecnicos2").val().forEach((value, index) => {
                            tecnicos[index] = value;
                        });
                        $("#select_servicios").val().forEach((value, index) => {
                            tipos_servicio[index] = value
                        });
                        //valida que el checkbox esta seleccionado
                        if($("#confirmado:checked").length == 1){
                            confirmado = 1;
                        }else{
                            confirmado = 0;
                        }
                        crsfToken = document.getElementsByName("_token")[0].value;
                        var horaInicioFormat = moment($("#hora_inicio").val(), 'hh:mmA').format('HH:mm');
                        //Peticion al servidor para actualizar el servicio
                        $.ajax({
                            url: '/servicios/'+id_servicio,
                            data: {
                                fecha_inicio: $("#fecha_inicio").val(),
                                hora_inicio: horaInicioFormat,
                                frecuencia: frecuencia,
                                duracion: duracion,
                                tecnicos: tecnicos,
                                tipos: tipos_servicio,
                                confirmado: confirmado,
                                tipoServicio: $("#select_tipo_servicio").val()
                            },
                            type: "PUT",//Método de envío
                            headers: {
                                "Content-Type": 'application/x-www-form-urlencoded',
                                "X-CSRF-TOKEN": crsfToken   //Token de seguridad
                            },
                        })
                        .then((res) => {
                            console.log(res);
                            swal("Actualizado!", "El servicio ha sido actualizado.", "success")
                            .then(value => { //Boton OK actualizado
                                if(value){
                                    window.location.href = "/servicios/create"
                                }
                            })
                        })
                        .catch((err) => {
                            console.log(err)
                            swal("¡Error!", "Ha ocurrido un error inesperado.", "error")
                        })
                        
                    } else {
                        swal("Cancelado", "Actualización cancelada.", "error");
                    }
                })

            })
        });

    </script>
@endsection