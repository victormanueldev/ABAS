@extends('layouts.app')
@section('custom-css')
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection
@section('content')
<script>
    document.getElementById('m-asignar-metas').setAttribute("class", "active");
    document.getElementById('a-asignar-metas').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Comisiones</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Comisiones Pendientes</strong>
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

                            <div class="form-group col-md-2" style="margin-top: 37px">
                                <button type="button" id="btn-find-docs" class="btn btn-primary">Buscar documentos</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div id="seccion-sedes"></div>

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
    ///var crsfToken = document.getElementsByName("_token")[0].value;

    $(document).ready(function () {

        /**
         * Filtro de busqueda por cliente
         * -----------------------------------------------------------
         **/

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

        $input = $('.typeahead_1').typeahead({
            source: nit_clientes
        });

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

        /**
         * Ver reporte de documentos por sede
         * ----------------------------------------------------------
         **/

        $("#btn-find-docs").click(function (){
            $("#seccion-sedes").empty()
            $.get(`/documents/show/${clienteSeleccionado}/${$("#select_sedes").val()}`)
            .then(res => {
                console.log(res)
            })
            .catch(err => {
                console.error(err)
            })
            $("#seccion-sedes").append(`
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Nombre de sede</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content table-responsive">
                            <table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    <th>Tipo de documento</th>
                                    <th>Frecuencia</th>
                                    <th>Estado</th>
                                    <th>Último registrado</th>
                                    <th>Fecha vencimiento</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><small>Pending...</small></td>
                                    <td><i class="fa fa-clock-o"></i> 11:20pm</td>
                                    <td>Samantha</td>
                                    <td class="text-navy"> <i class="fa fa-level-up"></i> 24% </td>
                                    <td>INF020190515 <a class="btn btn-white btn-bitbucket" style="display: ruby-base; padding: 0px 3px">
                                        <i class="fa fa-external-link text-navy"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            `)
        })


    })
</script>
@endsection