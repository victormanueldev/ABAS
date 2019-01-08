@extends('layouts.app')
@section('custom-css')
<!-- FooTable -->
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<script>
    document.getElementById('m-control-facturacion').setAttribute("class", "active");
    document.getElementById('a-control-facturacion').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Control de Facturas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Facturación</strong>
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
                                <div class="col-sm-12 col-md-10" >
                                    <label class="radio-inline">
                                        <input class="radio-options" type="radio" value="1" id="por_nombre"
                                            name="optionsRadios"> Nombre </label>
                                    <label class="radio-inline">
                                        <input class="radio-options" type="radio" value="2" id="por_rs"
                                            name="optionsRadios"> Razon Social </label>
                                    <label class="radio-inline">
                                        <input class="radio-options" type="radio" value="3" id="por_nit"
                                            name="optionsRadios"> NIT/CC </label>
                                </div>
                                <div class="col-sm-12 col-md-12" style="margin-top: 10px;">
                                    <input type="text" placeholder="Cliente..." class="typeahead_1 form-control"
                                        id="input_autocomplete" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group col-md-12" style="margin-top: 15px">
                                <label class="control-label">Sede *</label>
                                <select class="form-control " id="select_sedes">
                                    <option value="" selected disabled>Selecciona una sede</option>
                                </select>
                            </div>
                            </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="tabla_clientes_cont" class="table table-hover dataTables-example" data-filter=#filter>
                            <thead>
                            <tr>
                                <th>NIT/Cédula</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ini-scripts')
<!-- FooTable -->
{{-- <script src="{{asset('js/plugins/footable/footable.js')}}"></script> --}}
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
<!-- Scripts de inicializacion -->
<script>
    $(document).ready(function(){

        /* Estructuracion de la información del cliente para el autocompletado
        ------------------------------------------------------------------------*/
        //Inicializacion de variables
        var nit_clientes = [];
        var nombres_clientes = [];
        var razon_social_clientes = [];
        var $input;
        var data;
        var clienteSeleccionado;

        //Peticion al servidor para obtener los clientes de la DB
        $.get('/clientes')
            .then((res) => {
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
            clienteSeleccionado = current.id;
            //Peticion GET al servidor a la ruta /sedes/clientes/{id} (Sedes de cliente)
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

        //Inicializacion de la tabla
        var table = $("#tabla_clientes_cont").DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'excel', title: 'ListadoNovedadesSanicontrolSAS'},
                {extend: 'pdf', title: 'ListadoNovedadesSanicontrolSAS'}
            ],
            columns: [
                {data: 'nit_cedula'},
            ]
        });

                    //Evento change del select de Sedes
        $("#select_sedes").change(event => {
            $.get(`/facturacion/cliente/${clienteSeleccionado}/${event.target.value}`)
                .then( res => {
                    if(res[0].solicitudes != null){
                        if(res[0].solicitudes[0].sede != null){
                            if(res[0].solicitudes[0].servicios != null){
                                var facturas = res[0].solicitudes[0].servicios.map((servicio, index) => {
                                    var tipos =  [];
                                    servicio.tipos.forEach((value, index)=>{
                                        tipos.push(value)
                                    })
                                    return  tipos;
                                })
                                console.log(facturas)
                            }else{
                                table.clear().draw();
                                return;          
                            }
                        }else{
                            table.clear().draw();
                            return;      
                        }
                    }else{
                        table.clear().draw();
                        return;
                    }
                })
                .catch( err => {
                    console.log(err)
                });
        })
    });

</script>
@endsection