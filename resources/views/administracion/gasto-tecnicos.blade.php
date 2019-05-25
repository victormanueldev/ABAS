@extends('layouts.app')
{{-- Css --}}
@section('custom-css')
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection
{{-- Contenido --}}
@section('content')
<script>
    document.getElementById('m-gastos').setAttribute("class", "active");
    document.getElementById('a-gastos').removeAttribute("style");
    document.getElementById('ml2-gastos').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-gastos-tecnicos').setAttribute("class", "active");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Cronograma</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Inicio</a>
            </li>
            <li>
                Tecnicos
            </li>
            <li class="active">
                <strong>Calendario</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Técnicos </h5>
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
                        <form class="form-inline">
                            <div class="form-group col-sm-7 col-lg-9">
                                <label>Técnico: </label>
                                <select class="form-control" style="width: 85%" id="select_tecnicos">
                                    <option value="" selected>Seleccione un técnico</option>
                                    <option value="all" selected>Todos los Tecnicos</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-lg-3">
                                <button class="btn btn-primary" type="button" id="btn-buscar">Ver cronograma</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="ibox float-e-margin">
                <div class="ibox-title">
                    <h5>Resultados </h5>
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
                    <div class="table-responsive">
                        <table id="tabla_gasto_tecnico" class="table table-hover dataTables-example" data-filter=#filter>
                            <thead>
                                <tr>
                                    <th>Técnico</th>
                                    <th>Código del documento</th>
                                    <th>Fecha</th>
                                    <th>Producto</th>
                                    <th>Cantidad aplicada</th>
                                    <th>Unidad de Medida</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
{{-- JavaScript --}}
@section('ini-scripts')
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function () {

        var table = $("#tabla_gasto_tecnico").DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'excel', title: 'DetalleSalidaProducto' },
                { extend: 'pdf', title: 'DetalleSalidaProducto' }
            ],
            columns: [
                { data: 'tecnico' },
                { data: 'codigoDoc' },
                { data: 'fechaDoc' },
                { data: 'producto' },
                { data: 'cantidadAplicada' },
                { data: 'unMedida' }
            ]
        })

        $.get('/all/tecnicos')
            .then(res => {
                res.forEach(tecnico => {
                    $("#select_tecnicos").append(`
                    <option value="${tecnico.id}">${tecnico.nombre}</option>
                `)
                })
            })

        $("#btn-buscar").click(function () {
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
            table.clear().draw()
            $.get(`/gasto/tecnico/${$("#select_tecnicos").val()}`)
                .then(res => {
                    var arrGastoTecnico = []
                    var i = 0
                    res.forEach((tecnico, index) => {
                        tecnico.ordenes.forEach(orden => {
                            orden.productos.forEach(producto => {
                                arrGastoTecnico[i] = {
                                    tecnico: tecnico.nombre,
                                    codigoDoc: orden.codigo,
                                    fechaDoc: orden.created_at,
                                    producto: producto.nombre_comercial,
                                    unMedida: producto.unidad_medida.toUpperCase(),
                                    cantidadAplicada: producto.pivot.cantidad_aplicada
                                }
                                i++
                            })
                        })

                        tecnico.rutas.forEach(ruta => {
                            ruta.productos.forEach(producto => {
                                arrGastoTecnico[i] = {
                                    tecnico: tecnico.nombre,
                                    codigoDoc: ruta.codigo,
                                    fechaDoc: ruta.created_at,
                                    producto: producto.nombre_comercial,
                                    unMedida: producto.unidad_medida.toUpperCase(),
                                    cantidadAplicada: producto.pivot.cantidad_aplicada
                                }
                                i++
                            })
                        })
                    })

                    table.rows.add(arrGastoTecnico).draw()
                    swal.close()
                })
        })

    })
</script>
@endsection