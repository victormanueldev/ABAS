@extends('layouts.app')

@section('custom-css')
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
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Reporte de salida de {{$producto[0]->nombre_comercial}}</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tabla_detalle_gasto" class="table table-hover dataTables-example" data-filter=#filter>
                            <thead>
                                <tr>
                                    <th>Ruta/Orden</th>
                                    <th>Código del documento</th>
                                    <th>Fecha</th>
                                    <th>Cantidad aplicada</th>
                                    <th>Unidad de Medida</th>
                                    <th>Responsable(s)</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="ibox-footer">
                        <a href="/salida/productos" class="btn btn-primary">Volver al reporte anterior</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var arrDetalle = []
        var index = 0

        var table = $("#tabla_detalle_gasto").DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'excel', title: 'DetalleSalidaProducto' },
                { extend: 'pdf', title: 'DetalleSalidaProducto' }
            ],
            columns: [
                { data: 'tipo' },
                { data: 'codigo' },
                { data: 'fecha' },
                { data: 'cantidad' },
                { data: 'unMedida' },
                { data: 'responsables' }
            ]
        })
        
        $.get(window.location.pathname)
            .then(res => {
                res[0].ordenes.forEach((orden) => {
                    arrDetalle[index] = {
                        tipo: 'Orden de servicio',
                        codigo: orden.codigo,
                        fecha: orden.pivot.created_at,
                        cantidad: orden.pivot.cantidad_aplicada,
                        unMedida: res[0].unidad_medida.toUpperCase(),
                        responsables: orden.tecnicos.map(tecnico => { return tecnico.nombre })
                    }

                    index++
                });

                res[0].rutas.forEach((ruta) => {
                    arrDetalle[index] = {
                        tipo: `R${ruta.tipo.toLowerCase().substr(1,)}`,
                        codigo: ruta.codigo,
                        fecha: ruta.pivot.created_at,
                        cantidad: ruta.pivot.cantidad_aplicada,
                        unMedida: res[0].unidad_medida.toUpperCase(),
                        responsables: ruta.tecnicos.map(tecnico => { return tecnico.nombre })
                    }
                    index++
                });

                table.rows.add(arrDetalle).draw()
            })
            .catch(err => {
                console.log(err)
            })
        
    })
</script>
@endsection