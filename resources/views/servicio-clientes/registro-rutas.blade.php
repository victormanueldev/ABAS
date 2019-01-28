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
    document.getElementById('ml2-recepcion-rutas').setAttribute("class", "active");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Recepción de Rutas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Recepción Rutas</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>información del cliente</h5>

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


                            <div class="form-group col-md-5" style="margin-top: 15px">
                                <label class="control-label">Tipo de ruta *</label>
                                <select class="form-control " id="select_tipo_ruta">
                                    <option value="" selected disabled>Selecciona una sede</option>
                                    <option value="RUTA DE LAMPARAS">Ruta de Lámparas</option>
                                    <option value="RUTA DE ROEDORES INTERNA">Ruta de Roedores Interna</option>
                                    <option value="RUTA DE ROEDORES EXTERNA">Ruta de Roedores Externa</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2" style="margin-top: 37px">
                                <button type="button" id="btn-find-route" class="btn btn-primary">Buscar Ruta</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 hidden" id="form-routes">
            <div class="ibox float-e-margins">
                {!! Form::open(['method' => 'post', 'autocomplete' => 'on', 'id' => 'form-ruta'])!!}
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
                                    <input required type="number" class="form-control" id="cantidad_utilizada-0" step=".01">
                                </div>
                                <div class="form-group col-md-2 col-sm-6 border-right">
                                    <label>Unidad de medida: </label>
                                    <select required class="form-control" id="unidad_medida-0">
                                        <option value="0">Litros</option>
                                        <option value="3">Mililitros</option>
                                        <option value="1">Kilogramos</option>
                                        <option value="2">Gramos</option>
                                        <option value="3">Unidad</option>
                                    </select>
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
    var ruta;
    var contProductos = 1;

    $(document).ready(() => {

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

        $("#btn-find-route").click(() => {
            $.ajax({
                url: '/find/route',
                data: {
                    tipo: $("#select_tipo_ruta").val(),
                    idCliente: clienteSeleccionado,
                    idSede: $("#select_sedes").val(),
                },
                type: 'POST',
                headers: {
                    "X-CSRF-TOKEN": crsfToken       //Token de seguridad    
                }
            })
                .then(res => {
                    ruta = res;
                    swal('Ruta encontrada!', 'Ruta encontrada para el cliente seleccionado.', 'success');
                    $("#form-routes").removeClass('hidden');
                    $("#btn-find-route").attr('disabled', 'disabled')
                    anadirProductosSelect(0);
                })
                .catch(err => {
                    console.log(err)
                })

        });

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
                    <input type="number" class="form-control" id="cantidad_utilizada-${contProductos - 1}" step=".01">
                </div>
                <div class="form-group col-md-2 col-sm-6 border-right">
                    <label>Unidad de medida: </label>
                    <select class="form-control" id="unidad_medida-${contProductos - 1}">
                        <option value="0">Litros</option>
                        <option value="3">Mililitros</option>
                        <option value="1">Kilogramos</option>
                        <option value="2">Gramos</option>
                        <option value="3">Unidad</option>
                    </select>
                </div>`
            )
            anadirProductosSelect(contProductos - 1)
        })

        //Añade productos al select de Productos
        function anadirProductosSelect(idSelect) {
            productos.forEach((producto, index) => {
                $(`#nombre-comercial-${idSelect}`).append(`<option value="${producto.id}">${producto.nombre_comercial}</option>`)
            })
        }

        $("#form-ruta").submit(e => {
            e.preventDefault();
            var dataToSend = {
                idRuta: ruta.id,
                reporteProductos: []
            }

            //Reporte de productos
            for (var i = 0; i < contProductos; i++) {
                dataToSend.reporteProductos[i] = { idProducto: $(`#nombre-comercial-${i}`).val(), cantidadUtilizada: '', unidadMedida: ''}
                dataToSend.reporteProductos[i].cantidadUtilizada = $(`#cantidad_utilizada-${i}`).val();
                dataToSend.reporteProductos[i].unidadMedida = $(`#unidad_medida-${i}`).val();
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
                        url: '/save/route/product',
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
                                window.location.reload();
                            }
                        })
                    })
                    .catch( err => {
                        swal('¡Error!', err.statusText ,'error')
                    })
                }
            })

        })
    })
</script>
@endsection