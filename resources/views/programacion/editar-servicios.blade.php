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
                                        <input type="text" class="form-control" placeholder="" name="fecha_inicio">
                                    </div>
                                </div>

                                <div class="form-group col-lg-6" id="data_1">
                                    <label>Fecha de finalización</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" placeholder="" name="fecha_inicio">
                                    </div>
                                </div>

                                 <div class="form-group col-lg-6">
                                    <label>Hora de inicio*</label>
                                    <div class="input-group clockpicker" data-autoclose="true">
                                        <span class="input-group-addon">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                        <input type="text" class="form-control" placeholder="09:30" name="hora_inicio">
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Hora de Finalización*</label>
                                    <div class="input-group clockpicker" data-autoclose="true">
                                        <span class="input-group-addon">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                        <input type="text" class="form-control" placeholder="09:30" name="hora_inicio">
                                    </div>
                                </div>
                                
                                <div class="form-group col-xs-6 col-lg-6">
                                    <label class="control-label">Frecuencia </label>
                                    <select class="form-control" id="select_frecuencia" name="frecuencia_calidad">
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

                                <div class="form-group col-lg-6" >
                                    <label >Duración del servicio</label>
                                    <div class="input-group col-lg-12">
                                        <input style="width: 50%;" type="number" min="0" class="form-control" id="num_horas" placeholder="Horas">
                                        <input style="width: 50%;" type="number" min="0" max="60" class="form-control" id="num_minutos" placeholder="Minutos">
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label >Tipo de servicio</label>
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
                                    <label for="" style="margin-bottom: 6px;">¿Confirmado?</label>
                                    <div class="switch">
                                        <div class="onoffswitch">
                                            <input type="checkbox" checked class="onoffswitch-checkbox" id="confirmado">
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
			</div>
		</div>
	</div>
</div>
@endsection
{{-- JavaScript --}}
@section('ini-scripts')
<!-- Select2 -->
<script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
        //Separar los items del URL por /
        var path = window.location.pathname.split('/');
        //Obtiene el id del servicio que esta en el URL
        var id_servicio = path[2];
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
        })
        .catch((err) => {
            console.log(err);
        })
            
    });
</script>
@endsection