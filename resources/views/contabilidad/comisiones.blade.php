@extends('layouts.app')
@section('custom-css')
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
                <strong>Comisiones</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Comisiones de área comercial</h5>

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
                        <div class="row">
                            {!! Form::open() !!}
                            <div class="col-md-10" style="margin-top: 15px">
                                <label>Filtro por mes: </label>
                                <select name="mes" id="mes" class="form-control">
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2" style="margin-top:37px">
                                <button type="button" id="btn-comisiones" class="btn btn-primary">Ver comisiones</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="comisiones"></div>

    </div>
</div>

@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script>

    var crsfToken = document.getElementsByName("_token")[0].value
    $(document).ready(function () {

        /** 
         * Asignacion de valores para calculo de comision
         * ------------------------------------------------------------------
         **/

        porcentajesComision = {
            recompras: 0,
            clientesNuevos: 0,
            clientesContrato: 0
        }

        $.get('/valores')
            .then(res => {

                //Asigna los valores
                res.forEach(porcentaje => {
                    if (porcentaje.descripcion == 'porcentaje_recompras') {
                        porcentajesComision.recompras = parseFloat(porcentaje.valor) / 100
                    } else if (porcentaje.descripcion == 'porcentaje_clientes_nuevos') {
                        porcentajesComision.clientesNuevos = parseFloat(porcentaje.valor) / 100
                    } else {
                        porcentajesComision.clientesContrato = parseFloat(porcentaje.valor) / 100
                    }
                })


            })
            .catch(err => {
                console.error(err)
            })

        /**
         * Calculo de comisiones
         * ---------------------------------------------------------------
         **/

        $("#btn-comisiones").click(() => {
            //Creacion del loader como un NodeElement
            var loader = document.createElement("div")
            loader.innerHTML = `
                    <div class="sk-spinner sk-spinner-double-bounce">
                        <div class="sk-double-bounce1"></div>
                        <div class="sk-double-bounce2"></div>
                    </div>`

            swal({
                title: "Recolectando información...",
                content: loader,
                buttons: false
            })

            $("#comisiones").empty()
            $.get(`/comisiones/${moment().year()}-${$("#mes").val()}-01`)
                .then(res => {

                    var meses = ["0", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]

                    //Recorrido de array de inspectores
                    res.forEach((inspector, index) => {
                        $("#comisiones").append(`
                            <div class="col-sm-6 col-md-6">
                                <div class="ibox selected">
                                    <div class="ibox-content">
                                        <div class="tab-content">
                                            <div id="contact-1" class="tab-pane active">
                                                <div class="row m-b-md">
                                                    <div class="col-lg-4 text-center">
                                                        <h3>${inspector.nombres} ${inspector.apellidos}</h3>

                                                        <div class="m-b-sm">
                                                            <img alt="image" class="img-circle " src="{{ asset('img/${inspector.foto}') }}"
                                                                style="width: 62px">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 text-center">
                                                        <strong>
                                                            Inspector Comercial
                                                        </strong>
                                                        <p style="margin-bottom: 6px">
                                                            Total de comisión ${meses[parseInt($("#mes").val())]}
                                                        </p>
                                                        <label class="label label-primary" style="font-size: 13px;display: inline-block;width:119px" id="total-comision_${inspector.id}"></label>
                                                        <br>
                                                        <p style="margin-bottom: 6px">
                                                            Total pendiente ${meses[parseInt($("#mes").val())]}
                                                        </p>
                                                        <label class="label label-danger" style="font-size: 13px;display: inline-block;width:119px" id="total-pendiente_${inspector.id}"></label>
                                                    </div>
                                                    <div class="col-lg-4 text-center">
                                                        <strong>
                                                            Pagar
                                                        </strong>
                                                        <p style="margin-bottom: 1px">
                                                            Registrar pago de comision:
                                                        </p>
                                                        <b style="margin-bottom: 2px;display: inline-block" id="codigo-comision_${inspector.id}"></b>
                                                        <br>
                                                        <button title="Pagar" id="CM${inspector.id}${$("#mes").val()}${moment().year()}" class="btn btn-success btn-rounded" onclick="guardarComision(${inspector.id})"><i class="fa fa-dollar" ></i></button>
                                                    </div>
                                                </div>
                                                <div class="client-detail">
                                                    <div class="full-height-scroll">

                                                        <h4>Recompras</h4>
                                                        <table class="table table-responsive ">
                                                            <thead>
                                                                <tr>
                                                                    <td><b>Nombre Cliente</b></td>
                                                                    <td><b>No. Factura</b></td>
                                                                    <td><b>Total</b></td>
                                                                    <td><b>Comisión</b></td>
                                                                    <td><b>Pago</b></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="comisiones-recompras_${inspector.id}">
                                                                <!-- RECOMPRAS -->
                                                                
                                                            </tbody>
                                                        </table>
                                                        <div class="pull-right">
                                                            <b>Total en recompras: </b><label class="label label-default" id="total-comisiones-recompras_${inspector.id}"></label>
                                                            <b>Pendiente: </b> <label class="label label-default" id="total-comisiones-pendientes-recompras_${inspector.id}"></label>
                                                        </div>
                                                        <br>
                                                        <h4>Clientes Nuevos</h4>
                                                        <table class="table table-responsive ">
                                                            <thead>
                                                                <tr>
                                                                    <td><b>Nombre Cliente</b></td>
                                                                    <td><b>No. Factura</b></td>
                                                                    <td><b>Total</b></td>
                                                                    <td><b>Comisión</b></td>
                                                                    <td><b>Pago</b></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="comisiones-clientes-nuevos_${inspector.id}">
                                                                <!-- CLIENTES NUEVOS -->
                                                            </tbody>
                                                        </table>
                                                        <div class="pull-right">
                                                            <b>Total en clientes nuevos: </b><label class="label label-default" id="total-comisiones-clientes-nuevos_${inspector.id}"></label>
                                                            <b>Pendiente: </b> <label class="label label-default" id="total-comisiones-pendientes-cnuevos_${inspector.id}"></label>
                                                        </div>
                                                        <br>
                                                        <h4>Clientes con contrato</h4>
                                                        <table class="table table-responsive ">
                                                            <thead>
                                                                <tr>
                                                                    <td><b>Nombre Cliente</b></td>
                                                                    <td><b>No. Factura</b></td>
                                                                    <td><b>Total</b></td>
                                                                    <td><b>Comisión</b></td>
                                                                    <td><b>Pago</b></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="comisiones-clientes-contrato_${inspector.id}">
                                                               <!-- CLIENTES CONTRATO -->
                                                            </tbody>
                                                        </table>
                                                        <div class="pull-right">
                                                            <b>Total en clientes con contrato: </b><label class="label label-default" id="total-comisiones-clientes-contrato_${inspector.id}"></label>
                                                            <b>Pendiente: </b> <label class="label label-default" id="total-comisiones-pendientes-ccontrato_${inspector.id}"></label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `)
                        // Add slimscroll to element
                        $('.full-height-scroll').slimscroll({
                            height: '100%'
                        })
                    })


                    //Arrays para facturas
                    facturasRecompras = []
                    faturasClientesNuevos = []
                    facturaClientesContrato = []

                    //Totales para comisiones por inspector
                    comisionesInspector = []

                    res.forEach((inspector, index) => {
                        //Inicializacion de totales de comisiones
                        comisionesInspector[index] = {
                            idInspector: inspector.id,
                            totalComision: 0,
                            totalPendiente: 0,
                            totalRecompras: 0,
                            totalClientesNuevos: 0,
                            totalClientesContrato: 0,
                            totalComisionPendienteRecompra: 0,
                            totalComisionPendienteClientesNuevos: 0,
                            totalComisionPendienteClientesContrato: 0,
                            codigoComision: `CM${inspector.id}${$("#mes").val()}${moment().year()}`,
                            fechaInicio: `${moment().year()}-${$("#mes").val()}-01`
                        }

                        //Recorrido por clientes de cada inspector
                        inspector.clientes.forEach(cliente => {
                            //Valida el tipo de comisión a calcular
                            if (cliente.estado_registro == 'recompra') {
                                cliente.facturas.forEach(factura => {
                                    //Recorrido de facturas de clientes
                                    facturasRecompras.push({
                                        inspector: inspector.id,
                                        nombreCliente: cliente.nombre_cliente,
                                        numFactura: factura.numero_factura,
                                        valorFactura: factura.valor,
                                        estadoFactura: factura.estado,
                                        comision: factura.valor * porcentajesComision.recompras // <- DB Data
                                    })


                                })
                            } else if (cliente.estado_registro == 'cliente_contrato') {
                                cliente.facturas.forEach(factura => {
                                    facturaClientesContrato.push({
                                        inspector: inspector.id,
                                        nombreCliente: cliente.nombre_cliente,
                                        numFactura: factura.numero_factura,
                                        valorFactura: factura.valor,
                                        estadoFactura: factura.estado,
                                        comision: factura.valor * porcentajesComision.clientesContrato // <- DB Data
                                    })
                                })
                            } else {
                                cliente.facturas.forEach(factura => {
                                    faturasClientesNuevos.push({
                                        inspector: inspector.id,
                                        nombreCliente: cliente.nombre_cliente,
                                        numFactura: factura.numero_factura,
                                        valorFactura: factura.valor,
                                        estadoFactura: factura.estado,
                                        comision: factura.valor * porcentajesComision.clientesNuevos // <- DB Data
                                    })
                                })
                            }
                        })
                    })

                    /** 
                    * Calculo de totales y adicion de elementos a las tablas de comisiones
                    * --------------------------------------------------------------------
                    **/

                    //Recompras
                    facturasRecompras.forEach(factura => {
                        $(`#comisiones-recompras_${factura.inspector}`).append(`
                            <tr>
                                <td>${factura.nombreCliente}</td>
                                <td>${factura.numFactura}</td>
                                <td>${factura.valorFactura}</td>
                                <td>${factura.comision.toFixed(1)}</td>
                                <td>${factura.estadoFactura == 'Pagado' ? `<i class="fa fa-check-circle " style="color: #5CAE27; font-size: 21px"></i>` : `<label class="badge badge-danger">P</label>`}</td>
                            </tr>
                        `)

                        //Valida si la factura fue pagada
                        if (factura.estadoFactura == 'Pagado') {
                            comisionesInspector.forEach(inspector => {
                                if (inspector.idInspector == factura.inspector) {  //Asigna el total al inspector correspondiente
                                    //Total de comision por recompra
                                    inspector.totalRecompras += factura.comision
                                }
                            })
                        } else {
                            comisionesInspector.forEach(inspector => {
                                if (inspector.idInspector == factura.inspector) {  //Asigna el total al inspector correspondiente
                                    //Total de comision por recompra pendiente por pagar
                                    inspector.totalComisionPendienteRecompra += factura.comision
                                }
                            })
                        }
                    })

                    //Clientes Nuevos
                    faturasClientesNuevos.forEach(factura => {
                        $(`#comisiones-clientes-nuevos_${factura.inspector}`).append(`
                            <tr>
                                <td>${factura.nombreCliente}</td>
                                <td>${factura.numFactura}</td>
                                <td>${factura.valorFactura}</td>
                                <td>${factura.comision.toFixed(1)}</td>
                                <td>${factura.estadoFactura == 'Pagado' ? `<i class="fa fa-check-circle " style="color: #5CAE27; font-size: 21px"></i>` : `<label class="badge badge-danger">P</label>`}</td>
                            </tr>
                        `)

                        //Valida si la factura fue pagada
                        if (factura.estadoFactura == 'Pagado') {
                            comisionesInspector.forEach(inspector => {
                                if (inspector.idInspector == factura.inspector) {  //Asigna el total al inspector correspondiente
                                    //Total de comision por recompra
                                    inspector.totalClientesNuevos += factura.comision
                                }
                            })
                        } else {
                            comisionesInspector.forEach(inspector => {
                                if (inspector.idInspector == factura.inspector) {  //Asigna el total al inspector correspondiente
                                    //Total de comision por recompra pendiente por pagar
                                    inspector.totalComisionPendienteClientesNuevos += factura.comision
                                }
                            })
                        }
                    })

                    //ClientesContrato
                    facturaClientesContrato.forEach(factura => {
                        $(`#comisiones-clientes-contrato_${factura.inspector}`).append(`
                            <tr>
                                <td>${factura.nombreCliente}</td>
                                <td>${factura.numFactura}</td>
                                <td>${factura.valorFactura}</td>
                                <td>${factura.comision.toFixed(1)}</td>
                                <td>${factura.estadoFactura == 'Pagado' ? `<i class="fa fa-check-circle " style="color: #5CAE27; font-size: 21px"></i>` : `<label class="badge badge-danger">P</label>`}</td>
                            </tr>
                        `)

                        //Valida si la factura fue pagada
                        if (factura.estadoFactura == 'Pagado') {
                            comisionesInspector.forEach(inspector => {
                                if (inspector.idInspector == factura.inspector) {  //Asigna el total al inspector correspondiente
                                    //Total de comision por recompra
                                    inspector.totalClientesContrato += factura.comision
                                }
                            })
                        } else {
                            comisionesInspector.forEach(inspector => {
                                if (inspector.idInspector == factura.inspector) {  //Asigna el total al inspector correspondiente
                                    //Total de comision por recompra pendiente por pagar
                                    inspector.totalComisionPendienteClientesContrato += factura.comision
                                }
                            })
                        }
                    })

                    //Calcula el total de todas las comisiones por inspector
                    comisionesInspector.forEach(inspector => {
                        inspector.totalComision = inspector.totalRecompras + inspector.totalClientesNuevos + inspector.totalClientesContrato
                        inspector.totalPendiente = inspector.totalComisionPendienteRecompra + inspector.totalComisionPendienteClientesNuevos + inspector.totalComisionPendienteClientesContrato
                        //Muestra el total de la comision
                        $(`#total-comision_${inspector.idInspector}`).append(`$ ${inspector.totalComision.toLocaleString('de-DE')}`)
                        //Total pendiente de la comision
                        $(`#total-pendiente_${inspector.idInspector}`).append(`$ ${inspector.totalPendiente.toLocaleString('de-DE')}`)
                        //Total de comisiones de recompra
                        $(`#total-comisiones-recompras_${inspector.idInspector}`).append(`$ ${inspector.totalRecompras.toLocaleString('de-DE')}`)
                        //Total pendiente  de comisiones de recompra
                        $(`#total-comisiones-pendientes-recompras_${inspector.idInspector}`).append(`$ ${inspector.totalComisionPendienteRecompra.toLocaleString('de-DE')}`)
                        //Total de comisiones de clientes nuevos
                        $(`#total-comisiones-clientes-nuevos_${inspector.idInspector}`).append(`$ ${inspector.totalClientesNuevos.toLocaleString('de-DE')}`)
                        //Total pendiente de comisiones clientes nuevos
                        $(`#total-comisiones-pendientes-cnuevos_${inspector.idInspector}`).append(`$ ${inspector.totalComisionPendienteClientesNuevos.toLocaleString('de-DE')}`)
                        //Total de comisiones por clientes con contrato
                        $(`#total-comisiones-clientes-contrato_${inspector.idInspector}`).append(`$ ${inspector.totalComisionPendienteClientesContrato.toLocaleString('de-DE')}`)
                        //Total pendiente en comsisiones por clientes con contrato
                        $(`#total-comisiones-pendientes-ccontrato_${inspector.idInspector}`).append(`$ ${inspector.totalComisionPendienteClientesContrato.toLocaleString('de-DE')}`)
                        //Codigo de comision
                        $(`#codigo-comision_${inspector.idInspector}`).append(inspector.codigoComision)
                    })

                    /**
                    * Verificacion de comisiones pagadas
                    * -----------------------------------------------------------
                    **/

                    $.post('/show/comisiones', { codigos: comisionesInspector }, (res) => {
                        res.forEach(codigo => {
                            comisionesInspector.forEach(inspector => {
                                if (codigo == inspector.codigoComision) {
                                    $(`#${codigo}`).prop("disabled", true);
                                }
                            })
                        })
                    })

                    swal.close()
                })
                .catch(err => {
                    console.error(err)
                })
        })


    })

    /**
    * Guardar comisiones
    * -----------------------------------------------
    **/

    function guardarComision(idInspector) {

        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de guardar esta comisión?",
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
                        url: '/comisiones',
                        data: comisionesInspector.filter(inspector => { return inspector.idInspector == idInspector })[0],
                        type: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        }
                    })
                        .then(res => {
                            swal("¡Creación Correcta!", "Servicios creados correctamente.", "success")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        $(`#${res}`).prop("disabled", true);
                                    }
                                })
                                .catch(err => {
                                    swal("¡Error!", 'Ha ocurrido un error al intentar guardar la comisión', "error")
                                })
                        })
                }
            })
    }
</script>
@endsection