@extends('layouts.app')

@section('custom-css')
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Registro de Técnicos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Crear técnicos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content" id="clientes">
    <div class="row" id="productos">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Reporte de salida de productos</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center">
                                    <h4>Filtrar por fechas</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="data_5">
                                        <div class="input-daterange input-group" id="datepicker" style="width: 100%;">
                                            <input type="text" id="date-start" class="form-control-sm form-control"
                                                name="start" value="01/14/2018" />
                                            <span class="input-group-addon">hasta</span>
                                            <input type="text" id="date-end" class="form-control-sm form-control" name="end"
                                                value="01/22/2018" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-outline btn-primary" id="filter-dates">Aplicar</button>
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

@section('ini-scripts')
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment-timezone.js')}}"></script>
<script>
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

        $("#filter-dates").click(function () {
            $.get(`/gasto/productos/${moment(`${$("#date-start").val()} 00:00:00`, 'MM/DD/YYYY HH:mm:ss').format("YYYY-MM-DD HH:mm:ss")}/${moment(`${$("#date-end").val()} 23:59:59`, 'MM/DD/YYYY HH:mm:ss').format("YYYY-MM-DD HH:mm:ss")}`)
                .then(res => {
                    var productosStock = []
                    var gastoOrden, gastoRuta
                    
                    // Calcula el total de gastos de cada producto y crea un nuevo array
                    res.forEach((producto, index) => {
                        gastoOrden = 0
                        gastoRuta = 0
                        productosStock[index] = {
                            id: producto.id,
                            nombre: producto.nombre_comercial,
                            tipo: producto.tipo,
                            unMedida: producto.unidad_medida,
                            totalStock: producto.total_unidades,
                            totalGasto: 0
                        }

                        producto.ordenes.forEach(orden => {
                            gastoOrden += parseFloat(orden.pivot.cantidad_aplicada)
                        })

                        producto.rutas.forEach(ruta => {
                            gastoRuta += parseFloat(ruta.pivot.cantidad_aplicada)
                        })

                        productosStock[index].totalGasto = gastoOrden + gastoRuta
                    })

                    // Muestra los elementos a al vista
                    productosStock.forEach((producto, index) => {
                        $("#productos").append(`
                            <div class="col-lg-4">
                                <div class="ibox ">
                                    <div class="ibox-title" style="padding: 15px 15px 7px 21px">
                                        <span class="label label-primary pull-right">
                                            <a href="/detalle/producto/${producto.id}/${moment(`${$("#date-start").val()} 00:00:00`, 'MM/DD/YYYY HH:mm:ss').format("YYYY-MM-DD HH:mm:ss")}/${moment(`${$("#date-end").val()} 23:59:59`, 'MM/DD/YYYY HH:mm:ss').format("YYYY-MM-DD HH:mm:ss")}" style="color: white">Ver detalle</a> 
                                            <i class="fa fa-external-link"></i></span>
                                        <h3 style="margin: 0">${producto.nombre}</h3>
                                        <span>${producto.tipo}</span>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h1 class="no-margins" style="display: inline;">${parseFloat(producto.totalStock).toLocaleString('de-DE')} </h1>
                                                <!-- <i style="font-size: 20px;padding-left: 8px;display: inline;position: absolute;bottom: 26px;"
                                                    class="fa fa-check-circle text-navy"></i> -->
                                                <div class="font-bold text-navy">Total en stock (${producto.unMedida.toUpperCase()})</div>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 class="no-margins" style="display: inline;">${producto.totalGasto.toLocaleString('de-DE')} </h1>
                                                <i style="font-size: 20px;padding-left: 21px;display: inline;position: absolute;bottom: 36px;"
                                                    class="fa fa-play fa-rotate-90 text-danger"></i>
                                                <div class="font-bold text-danger">Total gasto (${producto.unMedida.toUpperCase()})</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `)
                    })
                })
                .catch(err => {
                    console.log(err)
                })
        })
    })
</script>
@endsection