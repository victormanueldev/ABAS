@extends('layouts.app')
@section('custom-css')
<!-- FooTable -->
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection
@section('content')
<script>
    document.getElementById('m-recepcion').setAttribute("class", "active");
    document.getElementById('a-recepcion').removeAttribute("style");
    document.getElementById('ml2-recepcion').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-recepcion-ordenes').setAttribute("class", "active");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Recepción de Órdenes de Servicio</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Recepción órdenes</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de todas las novedades</h5>

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
                    <div>
                        <h4>Filtro por clientes</h4>
                        <p>Indique los datos del cliente para realizar el filtro.</p>
                        <div class="row">
                            <div class="form-group ">
                                <label class="col-sm-12 col-md-2 control-label">Buscar cliente por: </label>
                                <div class="col-sm-12 col-md-10">
                                    <label class="radio-inline">
                                        <input class="radio-options" type="radio" value="1" id="por_nombre" name="optionsRadios">
                                        Nombre </label>
                                    <label class="radio-inline">
                                        <input class="radio-options" type="radio" value="2" id="por_rs" name="optionsRadios">
                                        Razon Social </label>
                                    <label class="radio-inline">
                                        <input class="radio-options" type="radio" value="3" id="por_nit" name="optionsRadios">
                                        NIT/CC </label>
                                </div>
                                <div class="col-sm-12 col-md-12" style="margin-top: 10px;">
                                    <input type="text" placeholder="Cliente..." class="typeahead_1 form-control" id="input_autocomplete"
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group col-md-5" style="margin-top: 15px">
                                <label class="control-label">Sede *</label>
                                <select class="form-control " id="select_sedes">
                                    <option value="" selected disabled>Selecciona una sede</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-5" id="data_1" style="margin-top: 15px">
                                <label>Fecha de aplicación *</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" placeholder="" name="fecha_inicio" id="fecha_inicio">
                                </div>
                            </div>

                            <div class="form-group col-md-2" style="margin-top: 37px">
                                <button type="button" id="btn-find-service" class="btn btn-primary">Buscar servicio</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <!---------------------------------------
        /* Formulario Orden de Servicio */
        ---------------------------------------->
        <div class="col-lg-12 hidden" id="form-ods">
            <div class="ibox float-e-margins">
                {!! Form::open(['method' => 'post', 'autocomplete' => 'on', 'id' => 'form-orden-servicio'])!!}
                {{Form::token()}}
                <div class="ibox-title">
                    <h5>Formulario de Órden de Servicio</h5>

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
                        <!-- Informacion de la orden -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4>Información de la Orden</h4>
                                    <p>Ingresa los datos de identificacion y tiempo utilizado por el tecnico.</p>
                                </div>
                                <div class="form-group col-sm-4 col-md-5">
                                    <label>Código de la Orden:</label>
                                    <input type="text" id="codigo" class="form-control" required>
                                </div>
                                <div class="col-md-2" style="margin-top: 23px">
                                    <button type="button" id="btn-add-tenico" class="btn btn-primary">Añadir técnico <i
                                            class="fa fa-plus" style="margin-left: 10px;"></i> </button>
                                </div>
                            </div>
                            <div class="row" id="tecnicos">
                                <div class="form-group col-md-2 col-sm-4">
                                    <label>Nombre del Técnico: </label>
                                    <select required class="form-control" id="select-tecnicos-0">
                                    </select>
                                </div>
                                <div class="form-group col-lg-2 col-sm-4">
                                    <label>Hora de entrada</label>
                                    <div class="input-group clockpicker" data-autoclose="true">
                                        <span class="input-group-addon">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                        <input required type="text" class="form-control" placeholder="09:30" id="hora_entrada-0">
                                    </div>
                                </div>
                                <div class="form-group col-lg-2 col-sm-4">
                                    <label>Hora de Salida</label>
                                    <div class="input-group clockpicker" data-autoclose="true">
                                        <span class="input-group-addon">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                        <input required type="text" class="form-control" placeholder="09:30PM" id="hora_salida-0">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- Areas con precencia de plagas-->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4>Áreas con presencia de plagas</h4>
                                    <p>Crea los espacios necesarios para registrar las áreas con precencia de plagas.</p>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" id="btn-add-area" class="btn btn-primary">Añadir área <i
                                            class="fa fa-plus" style="margin-left: 10px;"></i> </button>
                                </div>
                            </div>
                            <div class="row" id="areas_plagas">
                                <!-- Areas -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre del área</label>
                                    <input type="text" id="area-0" class="form-control">
                                </div>

                            </div>
                            <hr>
                        </div>
                        <!-- Nivel de actividad -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4>Nivel de actividad</h4>
                                    <p>Selecciona el nivel de actividad de cada tipo de plaga.</p>
                                </div>
                            </div>
                            <div class="row" id="plagas">
                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="C: BLATELLA GERMANICA"
                                        readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 border-right">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_blatella">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="C: PERIPLANETA" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_periplaneta">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="H: DULCERA" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_dulcera">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="H: LOCA" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_loca">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="H: FARAONA" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_faraona">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="H: FUEGO" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_fuego">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="H: FANTASMA" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_fantasma">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="R: RATTUS RATTUS"
                                        readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_rattus">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="R: RATTUS NORVEGICUS"
                                        readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_norvegicus">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de plaga</label>
                                    <input type="text" id="area-0" class="form-control" value="R: MUS MUSCULUS"
                                        readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select required class="form-control" id="nivel_musculus">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de otra plaga</label>
                                    <input type="text" id="area-0" class="form-control" id="otra_1">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select class="form-control" id="nivel_otra1">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>

                                <!-- Plaga -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label>Nombre de otra plaga</label>
                                    <input type="text" id="area-0" class="form-control" id="otra_2">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>Nivel de actividad: </label>
                                    <select class="form-control" id="nivel_otra2">
                                        <option value="0">No</option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- Checklist de novedades del servicio -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4>Checklist de novedades</h4>
                                    <p>Selecciona la opción para generar una novedad.</p>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" id="tratamiento_correctivo">
                                        <span style="bottom: 5px;position: relative;">Tratamiento Correctivo</span>
                                    </label>
                                </div>

                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" id="tratamiento_preventivo">
                                        <span style="bottom: 5px;position: relative;">Tratamiento Preventivo</span>
                                    </label>
                                </div>

                                <div class="col-md-2">
                                    <label>
                                        <input type="checkbox" id="realizo_inspeccion">
                                        <span style="bottom: 5px;position: relative;">Realizo Inspección</span>
                                    </label>
                                </div>

                                <div class="col-md-2">
                                    <label>
                                        <input type="checkbox" id="requiere_refuerzo">
                                        <span style="bottom: 5px;position: relative;">Requiere Refuerzo</span>
                                    </label>
                                </div>

                                <div class="col-md-2">
                                    <label>
                                        <input type="checkbox" id="mejorar_frecuencia">
                                        <span style="bottom: 5px;position: relative;">Mejorar Frecuencia</span>
                                    </label>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- Reporte de productos -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4>Reporte de productos</h4>
                                    <p>Selecciona el producto e ingresa la cantidad.</p>
                                </div>
                                <div class="col-md-3" style="text-align: center">
                                    <button type="button" id="btn-add-product" class="btn btn-primary">Añadir producto<i
                                            class="fa fa-plus" style="margin-left: 10px;"></i> </button>
                                </div>
                            </div>
                            <div class="row" id="productos">
                                <div class="form-group col-md-2 col-sm-6">
                                    <label>Nombre comercial: </label>
                                    <select required class="form-control" id="nombre-comercial-0">
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 col-md-2">
                                    <label>Cantidad utilizada</label>
                                    <input required type="number" step="0.01" class="form-control" id="cantidad_utilizada-0" step=".01">
                                </div>
                                <div class="form-group col-md-2 col-sm-6 border-right">
                                    <label>Unidad de medida: </label>
                                    <select required class="form-control" id="unidad_medida-0">
                                        <option value="gr">GRAMO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4>Observaciones del cliente/tecnico</h4>
                                    <p>Agrega observaciones del cliente o del técnico como una novedad temporal del
                                        cliente.</p>
                                </div>
                                <div class="col-md-3" style="text-align: center">
                                    <button type="button" id="btn-add-observacion" class="btn btn-primary">Añadir
                                        Observación<i class="fa fa-plus" style="margin-left: 10px;"></i> </button>
                                </div>
                            </div>
                            <div class="row" id="observaciones">
                                <div class="form-group col-lg-6">
                                    <label>Observación</label>
                                    <textarea required class="form-control" placeholder="Escriba aquí las observaciones del técnico o cliente."
                                        rows="2" name="instrucciones" id="observacion-0" maxlength="60"></textarea>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="ibox-footer">
                    <button type="submit" id="submit-orden" class="btn btn-w-m btn-primary pull-right">Guardar Orden de servicio</button>
                    <button type="button" class="btn btn-w-m btn-default" id="test-submit">Limpiar formulario</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script>
    //Inicializacion de variables
    var nit_clientes = [];
    var nombres_clientes = [];
    var razon_social_clientes = [];
    var $input;
    var data;
    var clienteSeleccionado;
    var crsfToken = document.getElementsByName("_token")[0].value;
    var productos = [];
    var tecnicos = [];

    var contAreas = 1;
    var contProductos = 1;
    var contTecnicos = 1;
    var contObservaciones = 1;
    var servicio;

    $(document).ready(function () {
        //Peticion al servidor para obtener los clientes de la DB
        $.get('/clientes')
            .then((res) => {
                clientes = res;
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
                })
            })
            .catch((err) => {
                console.log(err);
            });

        //Peticion para obtener todos los productos registrados
        $.get('/productos')
            .then(res => {
                productos = res;
                productos.forEach((producto, index) => {
                    $("#nombre-comercial-0").append(`<option value="${producto.id}">${producto.nombre_comercial}</option>`)
                })
            })
            .catch(err => {
                console.log(err)
            })

        $.get('/all/tecnicos')
            .then(res => {
                tecnicos = res;
                tecnicos.forEach((tecnico, index) => {
                    $("#select-tecnicos-0").append(`<option value="${tecnico.id}">${tecnico.nombre}</option>`)
                });
            })
            .catch(err => {
                console.error(err)
            })

        //Inicia el Autocompletado con los NIT de los clientes
        $input = $('.typeahead_1').typeahead({
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

        $input.change(() => {
            var current = $input.typeahead("getActive");
            //Peticion GET al servidor a la ruta /sedes/clientes/{id} (Sedes de cliente)
            clienteSeleccionado = current.id
            $.get(`/sedes/cliente/${current.id}`, function (res) {
                $("#select_sedes").empty();//Limipia el select
                $("#select_sedes").append(`<option value='' disabled selected> Selecciona una sede </option>`);
                if (res == '') {//Valida que el cliente tenga sedes
                    $("#select_sedes").append(`<option value="0"> Sede Única </option>`);
                } else {
                    //Recorre la respuesta del servidor
                    res.forEach(element => {
                        //Añade Options al select de sedes dependiendo de la respues del servidor
                        $("#select_sedes").append(`<option value=${element.id}> ${element.nombre} </option>`);
                    });
                }
            }).then((res) => {
                console.log('Sedes encontradas');
            }).catch((err) => {
                console.log(err);
            });
        });

        //Evento change del select de unidad de medida 0
        $(`#nombre-comercial-0`).change(function(e){
            $(`#unidad_medida-0`).empty()
            let prodSel = productos.filter(producto => { return producto.id == e.target.value })[0]
            switch (prodSel.unidad_medida) {
                case 'ml':
                    $(`#unidad_medida-0`).append(`
                        <option value="ml">MILILITRO</option>
                        <!-- <option value="l">LITRO</option>
                        <option value="gal">GAlÓN</option> -->
                    `)
                    break
                case 'gr':
                    $(`#unidad_medida-0`).append(`
                        <!-- <option value="mg">MILIGRAMO</option>
                        <option value="lb">LIBRA</option>
                        <option value="oz">ONZA</option>
                        <option value="kg">KILOGRAMO</option> -->
                        <option value="gr">GRAMO</option>
                    `)
                    break
                default:
                    $(`#unidad_medida-0`).append(`
                        <option value="un">UNIDAD</option>
                    `)
                    break
            }
            $(`#unidad_medida-0`).val(prodSel.unidad_medida)
        })

        //Evento Chanfe del date picker
        $("#btn-find-service").click(e => {
            if ($("#fecha_inicio").val() && clienteSeleccionado != 0 && $("#select_sedes").val() != null) {
                $.get(`/find/service/${$("#fecha_inicio").val()}/${clienteSeleccionado}/${$("#select_sedes").val()}`)
                    .then(res => {
                        if(res){
                            servicio = res;
                            swal('¡Servicio encontrado!', 'Servicio agendado para el cliente seleccionado.', 'success');
                            $("#btn-find-service").attr('disabled', 'disabled')
                            $("#form-ods").removeClass('hidden');
                        }
                    })
                    .catch(err => {
                        swal('¡Error!', 'No existe un servicio agendado para este cliente en esta fecha.', 'error');
                    })
            } else {
                swal('Información', 'Por favor, diligencia todo el formulario', 'info')
            }
        })

        $("#btn-add-area").click(() => {
            contAreas++;
            //Añade una serie de nodos dentro del componente con ID columna_principal
            $("#areas_plagas").append(`
                    <div class="form-group col-sm-6 col-md-3">
                        <label>Nombre del área</label>
                        <input type="text" id="area-${contAreas - 1}" class="form-control">
                    </div>
                `);
        })

        $("#btn-add-product").click(() => {
            contProductos++;
            $("#productos").append(
                `<div class="form-group col-md-2 col-sm-6">
                    <label>Nombre comercial: </label>
                    <select class="form-control" id="nombre-comercial-${contProductos - 1}">
                    </select>
                </div>
                <div class="form-group col-sm-6 col-md-2">
                    <label>Cantidad utilizada</label>
                    <input type="number" step="0.01" class="form-control" id="cantidad_utilizada-${contProductos - 1}" step=".01">
                </div>
                <div class="form-group col-md-2 col-sm-6 border-right">
                    <label>Unidad de medida: </label>
                    <select required class="form-control" id="unidad_medida-${contProductos - 1}">
                        <option value="gr">GRAMO</option>
                    </select>

                </div>`
            )
            anadirProductosSelect(contProductos - 1)
        })

        //Añade productos al select de Productos
        function anadirProductosSelect(idSelect) {
            productos.forEach((producto, index) => {
                $(`#nombre-comercial-${idSelect}`).append(`<option value="${producto.id}">${producto.nombre_comercial}</option>`)
                $(`#nombre-comercial-${idSelect}`).change(function(e){
                    $(`#unidad_medida-${idSelect}`).empty()
                    let prodSel = productos.filter(producto => { return producto.id == e.target.value })[0]
                    switch (prodSel.unidad_medida) {
                        case 'ml':
                            $(`#unidad_medida-${idSelect}`).append(`
                                <option value="ml">MILILITRO</option>
                                <!-- <option value="l">LITRO</option>
                                <option value="gal">GAlÓN</option> -->
                            `)
                            break
                        case 'gr':
                            $(`#unidad_medida-${idSelect}`).append(`
                                <!-- <option value="mg">MILIGRAMO</option>
                                <option value="lb">LIBRA</option>
                                <option value="oz">ONZA</option>
                                <option value="kg">KILOGRAMO</option> -->
                                <option value="gr">GRAMO</option>
                            `)
                            break
                        default:
                            $(`#unidad_medida-${idSelect}`).append(`
                                <option value="un">UNIDAD</option>
                            `)
                            break
                    }
                    $(`#unidad_medida-${idSelect}`).val(prodSel.unidad_medida)
                })
            })
        }

        $("#btn-add-tenico").click(() => {
            contTecnicos++;
            $("#tecnicos").append(
                `<div class="form-group col-md-2 col-sm-4">
                    <label>Nombre del Técnico: </label>
                    <select class="form-control" id="select-tecnicos-${contTecnicos - 1}">
                    </select>
                </div>
                <div class="form-group col-lg-2 col-sm-4">
                    <label>Hora de entrada</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                        <input type="text" class="form-control" placeholder="09:30" id="hora_entrada-${contTecnicos - 1}">
                    </div>
                </div>
                <div class="form-group col-lg-2 col-sm-4">
                    <label>Hora de Salida</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                        <input type="text" class="form-control" placeholder="09:30PM" id="hora_salida-${contTecnicos - 1}">
                    </div>
                </div>`
            )

            //Inicializa el clickpocker
            $('.clockpicker').clockpicker({
                twelvehour: true
            });
            anadirTecnicosSelect(contTecnicos - 1)
        });

        function anadirTecnicosSelect(idSelect) {
            tecnicos.forEach((tecnico, index) => {
                $(`#select-tecnicos-${idSelect}`).append(`<option value="${tecnico.id}">${tecnico.nombre}</option>`)
            });
        }

        $("#btn-add-observacion").click(() => {
            contObservaciones++
            $("#observaciones").append(
                `<div class="form-group col-lg-6">
                    <label>Obsrvación</label>
                    <textarea class="form-control" placeholder="Escriba aquí las observaciones del técnico o cliente."
                        rows="2" name="instrucciones" id="observacion-${contObservaciones-1}" maxlength="60"></textarea>
                </div>`
            )
        })

        /** Submit del formulario para guardar la orden de serivio*/
        $("#form-orden-servicio").submit(e => {
            e.preventDefault();
            var dataToSend = {
                idServicio: servicio.id,
                codigo: '',
                tecnicos: [],
                areasPlagas: [],
                nivelActividadPlagas: [],
                tratamientoCorrectivo: 0,
                tratamientoPreventivo: 0,
                realizoInspeccion: 0,
                requiereRefuerzo: 0,
                mejorarFrecuencia: 0,
                reporteProductos: [],
                observaciones: []
            };

            /** Estructuracion de la informacion para el envvio del formulario
            -------------------------------------------------------------------*/

            dataToSend.codigo = $("#codigo").val();
            
            //Asignacion de Tecnicos
            for (var i = 0; i < contTecnicos; i++) {
                dataToSend.tecnicos[i] = { id: $(`#select-tecnicos-${i}`).val(), horaEntrada: '', horaSalida: '' }
                dataToSend.tecnicos[i].horaEntrada = moment(`0000-01-01 '${$(`#hora_entrada-${i}`).val()}`, 'YYYY-MM-DD hh:mmA').format('HH:mm:ss');
                dataToSend.tecnicos[i].horaSalida = moment(`0000-01-01 '${$(`#hora_salida-${i}`).val()}`, 'YYYY-MM-DD hh:mmA').format('HH:mm:ss');
            }
            
            //Asignacion de Areas con presencia de plagas
            for (var i = 0; i < contAreas; i++) {
                dataToSend.areasPlagas[i] = $(`#area-${i}`).val();
            }

            //Asignacion de nivel de actividad de plagas
            dataToSend.nivelActividadPlagas[0] = { plaga: 'BLATELLA GERMANICA', nivel: $("#nivel_blatella").val() }
            dataToSend.nivelActividadPlagas[1] = { plaga: 'PERIPLANETA', nivel: $("#nivel_periplaneta").val() }
            dataToSend.nivelActividadPlagas[2] = { plaga: 'DULCERA', nivel: $("#nivel_dulcera").val() }
            dataToSend.nivelActividadPlagas[3] = { plaga: 'LOCA', nivel: $("#nivel_loca").val() }
            dataToSend.nivelActividadPlagas[4] = { plaga: 'FARAONA', nivel: $("#nivel_faraona").val() }
            dataToSend.nivelActividadPlagas[5] = { plaga: 'FUEGO', nivel: $("#nivel_fuego").val() }
            dataToSend.nivelActividadPlagas[6] = { plaga: 'FANTASMA', nivel: $("#nivel_fantasma").val() }
            dataToSend.nivelActividadPlagas[7] = { plaga: 'RATTUS RATTUS', nivel: $("#nivel_rattus").val() }
            dataToSend.nivelActividadPlagas[8] = { plaga: 'RATTUS NORVEGICUS', nivel: $("#nivel_norvegicus").val() }
            dataToSend.nivelActividadPlagas[9] = { plaga: 'MUS MUSCULUS', nivel: $("#nivel_musculus").val() }
            dataToSend.nivelActividadPlagas[10] = { plaga: 'otra_1', nivel: $("#nivel_otra1").val() }
            dataToSend.nivelActividadPlagas[11] = { plaga: 'otra_2', nivel: $("#nivel_otra2").val() }

            //Checklist de novedades del servicio
            dataToSend.tratamientoCorrectivo = $("#tratamiento_correctivo:checked").length;
            dataToSend.tratamientoPreventivo = $("#tratamiento_preventivo:checked").length;
            dataToSend.realizoInspeccion = $("#realizo_inspeccion").length;
            dataToSend.requiereRefuerzo = $("#requiere_refuerzo").length;
            dataToSend.mejorarFrecuencia = $("#mejorar_frecuencia").length;

            //Reporte de productos
            for (var i = 0; i < contProductos; i++) {
                dataToSend.reporteProductos[i] = { idProducto: $(`#nombre-comercial-${i}`).val(), cantidadUtilizada: '', unidadMedida: ''}
                dataToSend.reporteProductos[i].cantidadUtilizada = $(`#cantidad_utilizada-${i}`).val();
                dataToSend.reporteProductos[i].unidadMedida = $(`#unidad_medida-${i}`).val();
            }

            //Observaciones del cliente/tecnico
            for (var i = 0; i < contObservaciones; i++) {
                dataToSend.observaciones[i] = {descripcion: $(`#observacion-${i}`).val()}
            }

            swal({
                title: "¡Advertencia!",
                text: "¿Estás seguro de guardar esta orden de servicio?",
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
                if(isConfirm){
                    $.ajax({
                        url: '/ordenes',
                        data: dataToSend,
                        type: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                        }
                    })
                    .then( res => {
                        swal('Creación Correcta!','La orden de servicio se ha guardado exitosamente','success')
                        .then( value => {
                            if(value){
                                window.location.href = '/ordenes/create';
                            }
                        })
                    })
                    .catch( err => {
                        console.log(err)
                        swal('¡Error!', err.responseJSON ,'error')
                    })
                }
            })
        })

    })
</script>
@endsection