@extends('layouts.app')
@section('custom-css')
<!-- FooTable -->
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
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
<div class="wrapper wrapper-content " id="clientes">
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

                            <div class="form-group col-md-3" style="margin-top: 15px">
                                <label class="control-label">Sede *</label>
                                <select class="form-control " id="select_sedes">
                                    <option value="" selected disabled>Selecciona una sede</option>
                                </select>
                            </div>

                            <div class="col-md-4" style="margin-top: 15px">
                                <div class="form-group" id="data_5">
                                    <label class="control-label">Fechas de búsqeuda *</label>
                                    <div class="input-daterange input-group" id="datepicker" style="width: 100%;">
                                        <input type="text" id="date-start" class="form-control-sm form-control"
                                            name="start" value="01/14/2018" />
                                        <span class="input-group-addon">hasta</span>
                                        <input type="text" id="date-end" class="form-control-sm form-control" name="end"
                                            value="01/22/2018" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1"  style="margin-top: 37px">
                                <button class="btn btn-success btn-bitbucket" id="btn-search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>

                            <div class="form-group col-md-2" style="margin-top: 15px" >
                                <label class="control-label" style="margin-bottom: 13px;">Estado de facturación *</label>
                                <div id="fac-state">
                                    
                                </div>
                            </div>

                            <div class="form-group col-md-2" {{ Auth::user()->cargo_id == '3' ? 'style=display:none' : 'style=margin-top:37px'}}>
                                <button type="button" id="btn-edit-client" class="btn btn-primary" {{ Auth::user()->cargo_id == '3' ? 'style=display:none' : ''}}>Clasificar cliente</button>
                            </div>

                            <div class="form-group col-md-2" {{ Auth::user()->cargo_id == '2' ? 'style=display:none' : 'style=margin-top:37px'}}>
                                <button type="button" id="btn-edit-client" class="btn btn-primary" {{ Auth::user()->cargo_id == '2' ? 'style=display:none' : ''}} data-toggle="modal" data-target="#modal-create-fac">Facturas Maestras</button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="tabla_clientes_cont" class="table table-hover dataTables-example" data-filter=#filter
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Desctipción</th>
                                        <th>Fecha de realizacion</th>
                                        <th>Tipo</th>
                                        <th>No. Factura</th>
                                        <th>Total COP</th>
                                        <th>Estado</th>
                                        <th>Fecha de pago</th>
                                    </tr>
                                </thead>
                                <tbody style="cursor: pointer">
                                </tbody>
                            </table>
                            {{Form::token()}}
                        </div>
                    </div>
                </div>
            </div>

            <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-fac"
                id="btn-modal">
                Launch modal
            </button>

                <!--===================================================
                /* Modal opciones de actualizacion Factura
                ====================================================-->
                <div class="modal inmodal fade" id="modal-edit-fac" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h2 class="modal-title" style="font-size: 23px;">Opciones de Factura</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">   
                                    <div class="col-sm-8" style="margin-bottom: 15px;">
                                        <h3>Información del Servicio </h3>
                                    </div>

                                    <div class="form-group col-xs-12 col-lg-12">
                                        <label class="control-label">Nombre del servicio </label>
                                        <input type="text" disabled class="form-control" id="tipo_servicio"
                                            style="width: 100%;background-color: #fff;">
                                    </div>

                                    <div class="form-group col-xs-12 col-lg-6">
                                            <label class="control-label">ID </label>
                                            <input type="number" disabled class="form-control" id="id_tipo_servicio"
                                                style="width: 100%;background-color: #fff;">
                                        </div>

                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Estado </label>
                                        <input type="text" class="form-control" id="estado_factura"
                                            style="width: 100%;background-color: #fff;">
                                    </div>

                                    <div class="form-group col-xs-12 col-lg-6">
                                            <label class="control-label">No. de factura </label>
                                            <input type="text" class="form-control" id="numero_factura"
                                                style="width: 100%;background-color: #fff;">
                                        </div>
    
                                        <div class="form-group col-xs-12 col-lg-6">
                                            <label class="control-label">Valor total (COP) </label>
                                            <input type="number" class="form-control" id="valor_factura"
                                                style="width: 100%;background-color: #fff;">
                                        </div>
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button type="button" id="btn-delete-fac" class="btn btn-danger">Borrar datos</button>
                                <button type="button" id="btn-update-fac" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--===================================================
                /* Modal creacion facturas maestras
                ====================================================-->
                <div class="modal inmodal fade" id="modal-create-fac" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h2 class="modal-title" style="font-size: 23px;">Factura Maestra</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">   

                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Número de factura *</label>
                                        <input type="text" class="form-control" id="num_factura_maestra"
                                            style="width: 100%;background-color: #fff;">
                                    </div>

                                    <div class="form-group col-xs-12 col-lg-6">
                                        <label class="control-label">Valor de factura *</label>
                                        <input type="text" class="form-control" id="val_factura_maestra"
                                            style="width: 100%;background-color: #fff;">
                                    </div>

                                    <div class="col-md-12" style="margin-top: 15px">
                                        <div class="form-group" id="data_6">
                                            <label class="control-label">Rango de fechas de asignación *</label>
                                            <div class="input-daterange input-group" id="datepicker_2" style="width: 100%;">
                                                <input type="text" id="date_start_factura_maestra" class="form-control-sm form-control"
                                                    name="start" value="01/14/2018" />
                                                <span class="input-group-addon">hasta</span>
                                                <input type="text" id="date_end_factura_maestra" class="form-control-sm form-control" name="end"
                                                    value="01/22/2018" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button type="button" id="btn-create-fac" class="btn btn-primary">Crear factura</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endsection
    @section('ini-scripts')
    <!-- FooTable -->
    {{--
    <script src="{{asset('js/plugins/footable/footable.js')}}"></script> --}}
    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('js/plugins/fullcalendar/moment-timezone.js')}}"></script>
    <script src="{{asset('js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
    <script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
    <!-- Scripts de inicializacion -->
    <script>
            //Inicializacion de variables
            var nit_clientes = [];
            var nombres_clientes = [];
            var razon_social_clientes = [];
            var $input;
            var data;
            var clienteSeleccionado;
            var crsfToken = document.getElementsByName("_token")[0].value;
            var dataServer;
            var table;
            let clientes;
            let url = window.location.pathname.split("/")

        $(document).ready(function () {

        /** Asignacion de fechas por default a dateRange **/
        $("#date-start").val(moment().tz("America/Bogota").format("MM/DD/YYYY"));
        $("#date-end").val(moment().tz("America/Bogota").add(1, "month").format("MM/DD/YYYY"));

        /** Inicializacion del Date Range **/
        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        /** Inicializacion del Date Range **/
        $('#data_6 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });



            /* Estructuracion de la información del cliente para el autocompletado
            ------------------------------------------------------------------------*/

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
                $("#fac-state").empty();
                var current = $input.typeahead("getActive");
                clienteSeleccionado = current.id;
                clientes.forEach((value, index) => {
                    if(clienteSeleccionado == value.id){
                        $("#fac-state").append(`<label class="label label-${value.estado_facturacion == 'Normal' ? 'primary' : 'danger'}" style="padding: 4px 18px;font-size: 12px">${value.estado_facturacion}</label>`)
                    }
                })
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
            table = $("#tabla_clientes_cont").DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'excel', title: 'ListadoNovedadesSanicontrolSAS' },
                    { extend: 'pdf', title: 'ListadoNovedadesSanicontrolSAS' }
                ],
                columns: [
                    { data: 'tipo.pivot.id_servicio_tipo' },
                    { data: 'tipo.nombre' },
                    {
                        data: 'servicio',
                        render: (servicio) => {
                            return moment(`${servicio.fecha_inicio} ${servicio.hora_inicio}`, "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD hh:mm A");
                        }
                    },
                    {
                        data: 'servicio',
                        render: (servicio) => {
                            return `<span class="label label-primary" style="background-color: ${servicio.color};">${servicio.tipo}</span>`
                        }
                    },
                    {
                        data: 'tipo.pivot.numero_factura',
                        render: (factura) => {
                            if (!factura) {
                                return "No asignado &nbsp;<i class='fa fa-warning' style='color: red;float:right'></i>";
                            } else {
                                return factura;
                            }
                        }
                    },
                    {
                        data: 'tipo.pivot.valor',
                        render: (total) => {
                            if (!total) {
                                return "---";
                            } else {
                                return `$ ${total.toLocaleString('de-DE')}`;
                            }
                        }
                    },
                    {
                        data: 'tipo.pivot.estado',
                        render: (estado) => {
                            let estadoRendered;
                            switch (estado) {
                                case 'Pendiente':
                                    estadoRendered = `<span class="label label-default">${estado}</span>`;
                                    break;
                                case 'Pagado':
                                    estadoRendered = `<span class="label label-primary" style="padding: 2px 14px;">${estado}</span>`;
                                    break;
                                default:
                                    estadoRendered = `N/A`;
                                    break;
                            }
                            return estadoRendered;
                        }
                    },
                    {
                        data: 'tipo.pivot.updated_at',
                        render: (fechaPago) => {
                            if (!fechaPago) {
                                return "---"
                            } else {
                                return moment(fechaPago, 'YYYY-MM-DD HH:mm:ss').format("YYYY-MM-DD");
                            }
                        }
                    }
                ]
            });

            $("#tabla_clientes_cont tbody").on('click', 'tr', function () {
                let dataToSend = table.row(this).data();
                //Alert de confirmacion
                swal({
                    title: "Información!",
                    text: "¿Que acción desea realizar con esta factura?",
                    icon: "info",
                    buttons: {
                        cancel: true,
                        confirm: {
                            text: 'Registrar pago',
                            visible: url[1] == 'contabilidad' ? true : false,
                            value: 'pay',
                            closeModal: false, //Muestra el Loader
                        },
                        edit: {
                            text: 'Editar factura',
                            visible: url[1] == 'programacion' ? true : false,
                            value: 'edit',
                            closeModal: true, //Muestra el Loader
                        }
                    }
                })
                    .then(value => {
                        if (value === "pay") {
                            //Peticion HTTP para guardar el evento
                            if(!dataToSend.tipo.pivot.numero_factura || !dataToSend.tipo.pivot.valor){
                                swal('Información', 'El servicio seleccionado no tiene asignada una factura.', 'info');
                            }else{
                                $.ajax({
                                    url: '/payment/register',//URL del servicio
                                    type: "PUT",//Método de envío
                                    data: {
                                        id_servicio_tipo: dataToSend.tipo.pivot.id_servicio_tipo,
                                        numero_factura: dataToSend.tipo.pivot.numero_factura
                                    },
                                    headers: {
                                        "Content-Type": 'application/x-www-form-urlencoded',
                                        "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                                    },

                                })
                                    .then(events => {
                                        swal("¡Pago Registrado!", "El pago se registró exitosamente.", "success")
                                            .then(value => { //Boton OK actualizado
                                                if (value) {
                                                    console.log('Pago registrado');   //Escribe en la consola
                                                    fillTable(clienteSeleccionado, $("#select_sedes").val());
                                                }
                                            })
                                    })
                                    .catch(error => {
                                        swal("¡Error!", 'Ha ocurrido un error al intentar registrar el pago', "error")
                                    })
                            }
                        }else if(value === "edit"){
                            fillModal(dataToSend.tipo);
                        }
                    })
                    .catch(err => {
                        console.log(err)
                    })
            });


            $("#btn-search").click(() => {
                fillTable(clienteSeleccionado, $("#select_sedes").val());
            })

            function fillModal(dataTable) {
                $("#id_tipo_servicio").val(dataTable.pivot.id_servicio_tipo)
                $("#tipo_servicio").val(dataTable.nombre);
                $("#numero_factura").val(dataTable.pivot.numero_factura);
                $("#valor_factura").val(dataTable.pivot.valor);
                $("#estado_factura").val(dataTable.pivot.estado);
                $("#btn-modal").click();
            }

            $("#btn-edit-client").click(e => {
                swal({
                    title: '¡Advertencia!',
                    text: "¿Esta seguro que desea cambiar el estado del cliente?",
                    icon: "info",
                    buttons: {
                        cancel: true,
                        confirm: {
                            text: 'Cambiar estado',
                            visible: true,
                            value: 'mora',
                            closeModal: false, //Muestra el Loader
                        },
                    }
                })
                .then( value => {
                    if(value){
                        $.ajax({
                            url: '/estado/cliente',
                            data: {
                                idCliente: clienteSeleccionado
                            },
                            type: 'PUT',
                            headers: {
                                "Content-Type": 'application/x-www-form-urlencoded',
                                "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                            },
                        })
                        .then( res => {
                            console.log(res)
                            $("#fac-state").empty();
                            swal('!Acualizacion exitosa!', 'El cliente ha cambiado su estado de facturación','success');
                            $("#fac-state").append(`<label class="label label-${res == 'Normal' ? 'primary' : 'danger'}" style="padding: 4px 18px;font-size: 12px">${res}</label>`);
                        })
                        .catch( err => {
                            console.log(err)
                        }) 
                    }
                })
            })

        });


        function fillTable(idCliente, idSede){
            table.clear().draw();
            let serviciosTabla = [];
            $.get({
                    url: `/facturacion/cliente/${idCliente}/${idSede}`,
                    data: {
                        fecha_inicio: moment($("#date-start").val(), 'MM/DD/YYYY').format('YYYY-MM-DD'),
                        fecha_fin: moment($("#date-end").val(), 'MM/DD/YYYY').format('YYYY-MM-DD')
                    },
                    type: 'GET',
                    headers: {
                        "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                    }
            })
                .then(res => {
                    if (res[0].solicitudes != null) {
                            if (res[0].solicitudes[0].servicios != null) {
                                dataServer = res;

                                var serviciosTipo = res[0].solicitudes[0].servicios.map((servicio, index) => {
                                    var servicios = [];
                                    servicio.tipos.forEach((tipo, ind) => {
                                        if(servicio.id == tipo.pivot.servicio_id){
                                            servicios.push({servicio: servicio, tipo: tipo})
                                        }
                                    })
                                    return servicios;
                                })

                                serviciosTipo.forEach(value => {
                                    value.forEach( val => {
                                        serviciosTabla.push(val)
                                    })
                                })
                                
                                table.rows.add(serviciosTabla).draw();
                            } else {
                                table.clear().draw();
                                return;
                            }
                    } else {
                        table.clear().draw();
                        return;
                    }
                })
                .catch(err => {
                    console.log(err)
                });
        }

        function updateBill(dataToSend){
            swal({
                title: "Información!",
                    text: "¿Está seguro de actualizar la factura?",
                    icon: "info",
                    buttons: {
                        cancel: true,
                        confirm: {
                            text: 'Aceptar',
                            value: 'confirm',
                            closeModal: false
                        }
                    }
            })
            .then( isConfirm => {
                if(isConfirm){
                    $.ajax({
                        url: '/payment/update',
                        data: dataToSend,
                        type: 'PUT',
                        headers: {
                            "Content-Type": 'application/x-www-form-urlencoded',
                            "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                        },
                    })
                    .then( res => {
                        swal('¡Actualización Exitosa!','Factura actualizada con exito', 'success')
                        .then( value => {
                            if(value){
                                fillTable(clienteSeleccionado, $("#select_sedes").val());
                            }    
                        })
                    })
                    .catch( err => {
                        swal('¡Error!', 'Error al intentar actualizar la factura', 'error')
                    })
                }
            })

        }

        $("#btn-update-fac").click(e => {
            var data = {
                id_servicio_tipo: $("#id_tipo_servicio").val(),
                option: 'update',
                num_fac: $("#numero_factura").val(),
                total_fac: $("#valor_factura").val()
            }
            updateBill(data);
        });

        $("#btn-delete-fac").click(e => {
            var data ={
                id_servicio_tipo: $("#id_tipo_servicio").val(),
                option: 'delete'
            };
            updateBill(data);
        })
        
        $("#btn-create-fac").click(() => {
            swal({
                title: "Información!",
                    text: "¿Está seguro de crear la factura?",
                    icon: "info",
                    buttons: {
                        cancel: true,
                        confirm: {
                            text: 'Aceptar',
                            value: 'confirm',
                            closeModal: false
                        }
                    }
            })
            .then(isConfirm => {
                if(isConfirm){
                    $.ajax({
                        url: '/factura/maestra',
                        data: {
                            numero_factura: $("#num_factura_maestra").val(),
                            total_factura: $("#val_factura_maestra").val(),
                            cliente_id: clienteSeleccionado,
                            sede_id: $("#select_sedes").val(),
                            date_start: moment($("#date_start_factura_maestra").val()).format('YYYY-MM-DD'),
                            date_end: moment($("#date_end_factura_maestra").val()).format('YYYY-MM-DD')
                        },
                        type: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken       //Token de seguridad
                        }
                    })
                    .then( res => {
                        swal('¡Creación Exitosa!','Factura creada con exito', 'success')
                        .then( value => {
                            if(value){
                                fillTable(clienteSeleccionado, $("#select_sedes").val());
                            }    
                        })
                    })
                    .catch( err => {
                        swal('¡Error!', 'Error al intentar crear la factura', 'error')
                    })
                }
            })

        })

    </script>
    @endsection