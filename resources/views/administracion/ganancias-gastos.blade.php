@extends('layouts.app')

@section('custom-css')
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Reporte de ganancias</h2>
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
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Total Facturado</h5>
                    <span class="label label-primary pull-right">Ganancias</span>
                </div>
                <div class="ibox-content">
                    <h1 style="font-size: 26px" class="no-margins" id="total-facturas"></h1>
                    <div class="stat-percent font-bold text-navy">100%</div>
                    <small>Total recibido</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Total Compras</h5>
                    <span class="label label-danger pull-right">Gastos</span>
                </div>
                <div class="ibox-content">
                    <h1 style="font-size: 26px" class="no-margins" id="total-compras"></h1>
                    <div class="stat-percent font-bold text-danger" id="porcentaje-gasto-compra"></div>
                    <small>Porcentaje de gasto: </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Gastos</span>
                    <h5>Total Productos</h5>
                </div>
                <div class="ibox-content">
                    <h1 style="font-size: 26px" class="no-margins" id="total-productos"></h1>
                    <div class="stat-percent font-bold text-danger" id="porcentaje-gasto-producto"></div>
                    <small>Porcentaje de gasto: </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Total hrs. Hombre</h5>
                    <span class="label label-danger pull-right">Gastos</span>
                </div>
                <div class="ibox-content">
                    <h1 style="font-size: 26px" class="no-margins" id="total-tecnicos"></h1>
                    <div class="stat-percent font-bold text-danger" id="porcentaje-gasto-tecnicos"></div>
                    <small>Porcentaje de gasto: </small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Estadística de resultados</h5>
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
                        <div class="col-lg-8">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ul class="stat-list">
                                <li class="row">
                                    <div class="col-md-10">
                                        <div class="form-group" id="data_5">
                                            <label class="control-label">Ver resultados desde:</label>
                                            <div class="input-daterange input-group" id="datepicker" style="width: 100%;">
                                                <input type="text" id="date-start" class="form-control-sm form-control"
                                                    name="start" value="01/14/2018" />
                                                <span class="input-group-addon">hasta</span>
                                                <input type="text" id="date-end" class="form-control-sm form-control"
                                                    name="end" value="01/22/2018" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top: 25px;padding: 0 0">
                                        <button title="Actualizar resultados" class="btn btn-success btn-circle btn-outline"
                                            id="act-resultados"><i style="font-size: 15px" class="fa fa-refresh"></i></button>
                                    </div>
                                </li>
                                <li style="margin-top: 0">
                                    <h2 class="no-margins" id="total-ganancias"></h2>
                                    <small>Ganancias totales</small>
                                    {{-- <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                    --}}
                                    <div class="progress progress-mini">
                                        <div style="width: 50%;" class="progress-bar"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins" id="total-gastos"></h2>
                                    <small>Gastos totales</small>
                                    {{-- <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div> --}}
                                    <div class="progress progress-mini">
                                        <div style="width: 50%;" class="progress-bar progress-bar-danger"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('ini-scripts')
<!-- Sweet Alert -->
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<!-- Flot -->
<script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.symbol.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.time.js')}}"></script>
<!-- Moment -->
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment-timezone.js')}}"></script>
<script>
    $(document).ready(function () {

        $("#date-start").val(moment().startOf("month").tz("America/Bogota").format("MM/DD/YYYY"));
        $("#date-end").val(moment().endOf("month").tz("America/Bogota").format("MM/DD/YYYY"));

        /** Inicializacion del Date Range **/
        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        function obtenerResultado() {
            return $.ajax({
                url: `/reporte/ganancias/${moment($("#date-start").val(), "MM/DD/YYYY").format("YYYY-MM-DD")} 00:00:00/${moment($("#date-end").val(), "MM/DD/YYYY").format("YYYY-MM-DD")} 23:59:00`,
                type: 'GET',
                success: (res) => {
                    return res
                },
                error: (err) => {
                    return err
                }
            })
        }

        function crearGrafico(data2, data3) {
            var dataset = [
                {
                    label: "Total de facturas",
                    data: data3,
                    color: "#38921B",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth: 0,
                        opacity: 1
                    }

                }, {
                    label: "Gastos totales",
                    data: data2,
                    yaxis: 2,
                    color: "#DB2525",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth: 0,
                        opacity: 1
                    }
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5",
                    monthNames: ["ene", "feb", "mar", "abr", "may", "jun", "jul", "ago", "sep", "oct", "nov", "dic"]
                },
                yaxes: [{
                    position: "left",
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: true,
                    borderWidth: 0,
                    autoHighlight: true
                },
                tooltip: true
            };

            $.plot($("#flot-dashboard-chart"), dataset, options);
        }

        function crearEstadistica() {
            //Creacion del loader como un NodeElement
            var loader = document.createElement("div")
            loader.innerHTML = `
                    <div class="sk-spinner sk-spinner-double-bounce">
                        <div class="sk-double-bounce1"></div>
                        <div class="sk-double-bounce2"></div>
                    </div>`
            // Alert loader
            swal({
                title: "Recolectando información...",
                content: loader,
                buttons: false
            })
            obtenerResultado()
                .then(res => {
                    let data2 = []  // Dataset Gastos
                    let data3 = []  // Dataset Ganancias

                    // Creación del grafico
                    data3 = res["facturas"].map(factura => { return [new Date(factura.fecha_pago).getTime(), factura.valor] })
                    let compras = res["compras"].map(compra => { return [new Date(compra.created_at).getTime(), compra.costo_total] })
                    let productos = res["productos"].map(producto => { return [new Date(producto.fecha).getTime(), producto.totalInvertido] })
                    let tecnicos = res["tecnicos"].map(tecnico => { return [new Date(tecnico.fecha).getTime(), tecnico.totalInvertido] })
                    // Une varios arrays en uno solo
                    data2 = $.merge($.merge(productos, compras), tecnicos)
                    crearGrafico(data2, data3)

                    // Calcula los totales
                    let totalFacturas = 0
                    res["facturas"].map(factura => { totalFacturas += factura.valor })

                    let totalCompras = 0
                    res["compras"].map(compra => { totalCompras += compra.costo_total })

                    let totalProductos = 0
                    res["productos"].map(producto => { totalProductos += producto.totalInvertido })

                    let totalTecnicos = 0
                    res["tecnicos"].map(tecnico => { totalTecnicos += tecnico.totalInvertido })

                    let totalGastos = (totalCompras + totalProductos + totalTecnicos)
                    let totalGanancias = totalFacturas - totalGastos

                    // Añade las variables a la vista
                    $("#total-facturas").append(`$ ${totalFacturas.toLocaleString('de-DE')}`)
                    $("#total-compras").append(`$ ${totalCompras.toLocaleString('de-DE')}`)
                    $("#porcentaje-gasto-compra").append(`${((totalCompras / totalGastos) * 100).toFixed(2)}%`)
                    $("#total-productos").append(`$ ${totalProductos.toLocaleString('de-DE')}`)
                    $("#porcentaje-gasto-producto").append(`${((totalProductos / totalGastos) * 100).toFixed(2)}%`)
                    $("#total-tecnicos").append(`$ ${totalTecnicos.toLocaleString('de-DE')}`)
                    $("#porcentaje-gasto-tecnicos").append(`${((totalTecnicos / totalGastos) * 100).toFixed(2)}%`)
                    $("#total-ganancias").append(`$ ${totalGanancias.toLocaleString('de-DE')}`)
                    $("#total-gastos").append(`$ ${totalGastos.toLocaleString('de-DE')}`)
                    swal.close()
                })
                .catch(err => {
                    console.log(err)
                })
        }

        (function () { crearEstadistica() })()

        $("#act-resultados").click(function () {
            $("#total-facturas").empty()
            $("#total-compras").empty()
            $("#porcentaje-gasto-compra").empty()
            $("#total-productos").empty()
            $("#porcentaje-gasto-producto").empty()
            $("#total-tecnicos").empty()
            $("#porcentaje-gasto-tecnicos").empty()
            $("#total-ganancias").empty()
            $("#total-gastos").empty()
            crearEstadistica()
        })

    })
</script>
@endsection