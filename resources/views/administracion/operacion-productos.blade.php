@extends('layouts.app')

@section('custom-css')
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<script>
    document.getElementById('m-crear-tecnicos').setAttribute("class", "active");
    document.getElementById('a-crear-tecnicos').removeAttribute("style");
</script>
<script src="{{asset('js/plugins.js')}}"></script>
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
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                {!! Form::open(['route' => ['productos.store'], 'method' => 'POST', 'id' => 'crear-productos']) !!}
                {!! Form::token() !!}

                <div class="ibox-title">
                    <h5>Formulario para creación de productos</h5>
                </div>

                <div class="ibox-content">
                    <p>Indique los datos del producto para realizar el registro.</p>
                    <button type="button" style="margin-top: -35px;" class="btn btn-primary pull-right" id="btn-add-product"><i
                            class="fa fa-plus"></i> Agregar Producto</button>
                    <div class="row" id="productos">
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Nombre comercial *</label>
                            <input style="text-transform: uppercase" type="text" name="nombre_comercial-0" id="nombre_comercial-0"
                                class="form-control" required placeholder="Escriba el nombre comercial del producto">
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Tipo *</label>
                            <select style="text-transform: uppercase" name="tipo_producto-0" id="tipo_producto-0"
                                class="form-control">
                                <option value="0" selected>Seleccione una opción</option>
                                <option value="Insecticida">INSECTICIDA</option>
                                <option value="Piretroide">PIRETOIDE</option>
                                <option value="Roenticida">ROENTICIDA</option>
                                <option value="Trampas">TRAMPAS</option>
                                <option value="Desinfectante">DESINFECTANTE</option>
                                <option value="Detiagas">DETIAGAS</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Presentación </label>
                            <select style="text-transform: uppercase" name="presentacion_producto-0" id="presentacion_producto-0"
                                class="form-control">
                                <option value="0" selected>Seleccione una opción</option>
                                <option value="Presentacion 1">Presentacion 1</option>
                                <option value="Presentacion 2">Presentacion 2</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3" style="margin-top: 15px;">
                            <label class="control-label">Unidad de medida </label>
                            <select style="text-transform: uppercase" name="unidad_medida_producto-0" id="unidad_medida_producto-0"
                                class="form-control">
                                <option value="0" selected>Seleccione una opción</option>
                                <option value="mg">MILIGRAMO</option>
                                <option value="ml">MILILITRO</option>
                                <option value="lb">LIBRA</option>
                                <option value="oz">ONZA</option>
                                <option value="l">LITRO</option>
                                <option value="kg">KILOGRAMO</option>
                                <option value="gal">GAlÓN</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3" style="margin-top: 15px;">
                            <label class="control-label">Cantidad total (Según medida seleccionada) *</label>
                            <input type="number" step="0.01" name="cantidad_producto-0" id="cantidad_producto-0" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-3" style="margin-top: 15px;">
                            <label class="control-label">Valor unidad (Según medida seleccionada) *</label>
                            <input type="text" name="valor_unidad_producto-0" id="valor_unidad_producto-0" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-3" style="margin-top: 15px;">
                            <label class="control-label">Costo total *</label>
                            <input type="text" name="costo_producto-0" id="costo_producto-0" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button style="margin-bottom: 0;" type="button" id="btn-close2" class="btn btn-default"
                        data-dismiss="modal">Cancelar</button>
                    <button id="create-tecnicians" type="submit" class="btn btn-primary">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h5>Listado de técnicos del sistema</h5>
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
                        <table id="tabla_tecnicos" class="table table-striped table-bordered table-hover dataTables-example"
                            data-filter=#filter>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Color</th>
                                    <th>Estado</th>
                                    <th style="text-align: center">Acción</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-update"
            id="btn-modal">
            Launch modal
        </button>

        <!--===================================================
        /* Modal editar producto
        ====================================================-->
        <div class="modal inmodal fade" id="modal-update" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h2 class="modal-title" style="font-size: 23px;">Editar Producto</h2>
                        </div>
                        <div class="modal-body">
                            <div class="row" id="form-modal">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                            <button id="btn-update" type="button" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function(){

    })
</script>
@endsection