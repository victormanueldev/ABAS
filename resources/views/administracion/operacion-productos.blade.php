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
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-4" style="margin-top: 15px;">
                                    <label class="control-label">Nombre comercial *</label>
                                    <input style="text-transform: uppercase" type="text" name="nombre_comercial-0" id="nombre_comercial-0"
                                        class="form-control" required placeholder="Escriba el nombre comercial del producto">
                                </div>
                                <div class="form-group col-lg-4" style="margin-top: 15px;">
                                    <label class="control-label">Tipo *</label>
                                    <select style="text-transform: uppercase" name="tipo_producto-0" id="tipo_producto-0"
                                        class="form-control" required>
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
                                        class="form-control" required>
                                        <option value="0" selected>Seleccione una opción</option>
                                        <option value="Presentacion 1">Presentacion 1</option>
                                        <option value="Presentacion 2">Presentacion 2</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3" style="margin-top: 15px;">
                                    <label class="control-label">Unidad de medida </label>
                                    <select style="text-transform: uppercase" name="unidad_medida_producto-0" id="unidad_medida_producto-0"
                                        class="form-control" required>
                                        <option value="0" selected>Seleccione una opción</option>
                                        <option value="mg">MILIGRAMO</option>
                                        <option value="ml">MILILITRO</option>
                                        <option value="lb">LIBRA</option>
                                        <option value="oz">ONZA</option>
                                        <option value="l">LITRO</option>
                                        <option value="kg">KILOGRAMO</option>
                                        <option value="gr">GRAMO</option>
                                        <option value="gal">GAlÓN</option>
                                        <option value="und">UNIDAD</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3" style="margin-top: 15px;">
                                    <label class="control-label">Cantidad total (Según medida seleccionada) *</label>
                                    <input type="number" step="0.01" name="cantidad_producto-0" id="cantidad_producto-0"
                                        class="form-control" required>
                                </div>
                                <div class="form-group col-lg-3" style="margin-top: 15px;">
                                    <label class="control-label">Valor unidad (Según medida seleccionada) *</label>
                                    <input type="text" name="valor_unidad_producto-0" id="valor_unidad_producto-0"
                                        class="form-control" required>
                                </div>
                                <div class="form-group col-lg-3" style="margin-top: 15px;">
                                    <label class="control-label">Costo total *</label>
                                    <input type="text" name="costo_producto-0" id="costo_producto-0" class="form-control"
                                        required>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button style="margin-bottom: 0;" type="button" id="btn-close2" class="btn btn-default"
                        data-dismiss="modal">Cancelar</button>
                    <button id="create-products" type="submit" class="btn btn-primary">Guardar</button>
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
                        <table id="tabla_productos" class="table table-hover dataTables-example"
                            data-filter=#filter>
                            <thead>
                                <tr>
                                    <th>Nombre Comercial</th>
                                    <th>Tipo de producto</th>
                                    <th>Presentación</th>
                                    <th>Unidad de Medida</th>
                                    <th>Unidades Disponibles</th>
                                    <th>Valor por unidad</th>
                                    <th>Costo total</th>
                                    <th>Fecha de registro</th>
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

    $(document).ready(function () {

        /**
        * Guardar productos
        * ----------------------------------------------------------
        **/

        var inputsProductos = 1;

        $("#btn-add-product").click(function () {
            $("#productos").append(`
                <div class="col-lg-12">
                    <div class="row">
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                                <label class="control-label">Nombre comercial *</label>
                                <input style="text-transform: uppercase" type="text" name="nombre_comercial-${inputsProductos}" id="nombre_comercial-${inputsProductos}"
                                    class="form-control" required placeholder="Escriba el nombre comercial del producto">
                            </div>
                            <div class="form-group col-lg-4" style="margin-top: 15px;">
                                <label class="control-label">Tipo *</label>
                                <select style="text-transform: uppercase" name="tipo_producto-${inputsProductos}" id="tipo_producto-${inputsProductos}"
                                    class="form-control" required>
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
                                <select style="text-transform: uppercase" name="presentacion_producto-${inputsProductos}" id="presentacion_producto-${inputsProductos}"
                                    class="form-control" required>
                                    <option value="0" selected>Seleccione una opción</option>
                                    <option value="Presentacion 1">Presentacion 1</option>
                                    <option value="Presentacion 2">Presentacion 2</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3" style="margin-top: 15px;">
                                <label class="control-label">Unidad de medida </label>
                                <select style="text-transform: uppercase" name="unidad_medida_producto-${inputsProductos}" id="unidad_medida_producto-${inputsProductos}"
                                    class="form-control" required>
                                    <option value="0" selected>Seleccione una opción</option>
                                    <option value="mg">MILIGRAMO</option>
                                    <option value="ml">MILILITRO</option>
                                    <option value="lb">LIBRA</option>
                                    <option value="oz">ONZA</option>
                                    <option value="l">LITRO</option>
                                    <option value="gr">GRAMO</option>
                                    <option value="kg">KILOGRAMO</option>
                                    <option value="gal">GAlÓN</option>
                                    <option value="und">UNIDAD</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3" style="margin-top: 15px;">
                                <label class="control-label">Cantidad total (Según medida seleccionada) *</label>
                                <input type="number" step="0.01" name="cantidad_producto-${inputsProductos}" id="cantidad_producto-${inputsProductos}" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-3" style="margin-top: 15px;">
                                <label class="control-label">Valor unidad (Según medida seleccionada) *</label>
                                <input type="text" name="valor_unidad_producto-${inputsProductos}" id="valor_unidad_producto-${inputsProductos}" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-3" style="margin-top: 15px;">
                                <label class="control-label">Costo total *</label>
                                <input type="text" name="costo_producto-${inputsProductos}" id="costo_producto-${inputsProductos}" class="form-control" required>
                            </div>
                     </div>
                    <hr>
                </div>    
            `)
            inputsProductos++
        })

        /**
        * Calcula el valor en mg, ml o un
        * @param medida {String} Valor del Select
        * @param cantidad {String} Cantidad total del producto
        * @return {Array} [0] = Unidad de medida, [1] Valor calculado 
        **/
        function valorConvertido(medida, cantidad){
            cantidadNumber = parseFloat(cantidad)
            switch (medida) {
                case 'ml':
                    return ['ml', cantidadNumber]
                    break
                case 'mg':
                    return ['gr', cantidadNumber / 1000]
                    break
                case 'lb':
                    return ['gr', cantidadNumber * 453.592]
                    break
                case 'oz':
                    return ['gr', cantidadNumber * 28.3495]
                    break
                case 'l':
                    return ['ml', cantidadNumber * 1000]
                    break
                case 'kg':
                    return ['gr', cantidadNumber * 1000]
                    break
                case 'gal':
                    return ['ml', cantidadNumber * 3785.41]
                    break
                case 'gr':
                    return ['gr', cantidadNumber]
                    break
                default:
                    return ['un', cantidadNumber]
                    break
            }
        }

        function crearProductos(arrProductos) {
            console.log(arrProductos)
            $.ajax({
                url: '/productos',
                data: {
                    productos: arrProductos
                },
                type: 'POST',
                headers: {
                    "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value
                }
            })
                .then(res => {
                    swal('¡Productos creados!', 'La información fue guardada correctamente.', 'success')
                        .then(okPressed => {
                            if (okPressed) {
                                window.location.href = "/productos/create"
                            }
                        })
                })
                .catch(err => {
                    swal('¡Error!', err.statusText, 'error')
                })

        }

        $("#crear-productos").submit(function (e) {
            e.preventDefault()
            var arrProductos = []
            for (let index = 0; index < inputsProductos; index++) {
                arrProductos[index] = {
                    nombreComercial: $(`#nombre_comercial-${index}`).val(),
                    tipo: $(`#tipo_producto-${index}`).val(),
                    presentacion: $(`#presentacion_producto-${index}`).val(),
                    unindadMedida: valorConvertido($(`#unidad_medida_producto-${index}`).val(), $(`#cantidad_producto-${index}`).val())[0],
                    cantidadTotal: valorConvertido($(`#unidad_medida_producto-${index}`).val(), $(`#cantidad_producto-${index}`).val())[1],
                    valorUnidad: parseInt($(`#valor_unidad_producto-${index}`).val()),
                    costoTotal: parseInt($(`#costo_producto-${index}`).val())
                }
            }

            swal({
                title: "¡Advertencia!",
                text: "¿Estás seguro de guardar esta información?",
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
                        crearProductos(arrProductos)
                    }
                })

        })


        /**
         * Ver, Editar y Eliminar Productos
         * --------------------------------------------------------
         **/

        table = $("#tabla_productos").DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'excel', title: 'ListadoNovedadesSanicontrolSAS' },
                { extend: 'pdf', title: 'ListadoNovedadesSanicontrolSAS' }
            ],
            columns: [
                { data: 'nombre_comercial' },
                { 
                    data: 'tipo',
                    render: (tipo) => {
                        return tipo.toUpperCase()
                    }
                },
                { data: 'presentacion' },
                {
                    data: 'unidad_medida',
                    render: (unidadMedida) => {
                        return unidadMedida.toUpperCase()
                    }
                },
                {
                    data: 'total_unidades'
                },
                {
                    data: 'valor_unidad',
                    render: (valor) => {
                        return `$ ${valor.toLocaleString('de-DE')}`
                    }
                },
                {
                    data: 'costo_total',
                    render: (costo) => {
                        return `$ ${costo.toLocaleString('de-DE')}`
                    }
                },
                {
                    data: 'created_at',
                    render: (fechaCreacion) => {
                        return moment(fechaCreacion, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD')
                    }
                },
                {
                    data: 'id',
                    render: (idProducto) => {
                        return `<button title="Editar producto" class="btn btn-primary btn-circle btn-outline" onclick="updateProd(${idProducto})"><i style="font-size: 15px" class="fa fa-edit"></i></button>
                                <button title="Eliminar producto" class="btn btn-danger btn-circle btn-outline" onclick="deleteProd(${idProducto})"><i style="font-size: 15px" class="fa fa-trash"></i></button>`
                    }
                }
            ]
        })

        $.get('/productos')
        .then(res => {
            table.rows.add(res).draw()
        })
        .catch(err => {
            console.error(err)
        })
    })
</script>
@endsection