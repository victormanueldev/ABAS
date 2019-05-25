@extends('layouts.app')

@section('custom-css')
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<script>
    document.getElementById('m-productos').setAttribute("class", "active");
    document.getElementById('a-productos').removeAttribute("style");
    document.getElementById('ml2-productos').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-crear-productos').setAttribute("class", "active");
</script>
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
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                {!! Form::open(['route' => ['productos.store'], 'method' => 'POST', 'id' => 'crear-productos']) !!}
                {!! Form::token() !!}

                <div class="ibox-title">
                    <h5>Formulario para creación de productos</h5>
                </div>

                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-8">
                            <p>Indique los datos del producto para realizar el registro.</p>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" id="btn-compra"><i class="fa fa-cart-plus"
                                    style="margin-right: 3px"></i> Registrar Compra</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" id="btn-add-product"><i class="fa fa-plus"></i>
                                Agregar Producto</button>
                        </div>
                    </div>

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
                                        <option value="un">UNIDAD</option>
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
                        <table id="tabla_productos" class="table table-hover dataTables-example" data-filter=#filter>
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

        <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-compras"
            id="btn-modal-compra">
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
                        <button id="btn-cancel-modal" type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button id="btn-update" type="button" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--===================================================
        /* Modal compras de productos
        ====================================================-->
        <div class="modal inmodal fade" id="modal-compras" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <form id="form-compra">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h2 class="modal-title" style="font-size: 23px;">Comprar Producto</h2>
                        </div>
                        <div class="modal-body">
                            <div class="row" id="form-modal">
                                <div class="form-group col-lg-6" id="data_1" style="margin-top: 15px;">
                                    <label>Fecha *</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                            type="text" id="fecha_creacion" class="form-control" placeholder="" name="fecha_creacion"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6" style="margin-top: 15px;">
                                    <label class="control-label">Selecciona el producto</label>
                                    <select style="text-transform: uppercase" name="producto_compra" id="producto_compra"
                                        class="form-control" required>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6" style="margin-top: 15px;">
                                    <label class="control-label">No. Factura *</label>
                                    <input type="text" name="factura_compra" id="factura_compra" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-lg-6" style="margin-top: 15px;">
                                    <label class="control-label">Unidad de medida comprada</label>
                                    <select style="text-transform: uppercase" name="unidad_medida_producto_compra" id="unidad_medida_producto_compra"
                                        class="form-control" required>
                                        <option value="0" selected>Seleccione una opción</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-4" style="margin-top: 15px;">
                                    <label class="control-label">Cantidad total comprada *</label>
                                    <input type="number" step="0.01" name="cantidad_producto_compra" id="cantidad_producto_compra"
                                        class="form-control" required>
                                </div>
                                <div class="form-group col-lg-4" style="margin-top: 15px;">
                                    <label class="control-label">Valor unidad *</label>
                                    <input type="text" name="valor_unidad_producto_compra" id="valor_unidad_producto_compra"
                                        class="form-control" required>
                                </div>
                                <div class="form-group col-lg-4" style="margin-top: 15px;">
                                    <label class="control-label">Costo total</label>
                                    <input type="text" name="costo_producto_compra" id="costo_producto_compra" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="btn-cancel-compra" type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                            <button id="btn-guardar-compra" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/plugins/autonumeric/autonumeric.js')}}"></script>
<script>

    var productos
    var productoSelected
    var costoProductoEdit

    $(document).ready(function () {

        var date = moment().format("YYYY-MM-DD");
        $('#fecha_creacion').val(date);

        /**
        * Guardar productos
        * ----------------------------------------------------------
        **/

        var inputsProductos = 1
        var costos_productos = []
        var costo_producto_compra

        costos_productos[0] = new AutoNumeric(document.getElementById('costo_producto-0'), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        costo_producto_compra = new AutoNumeric(document.getElementById('costo_producto_compra'), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

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
            costos_productos[inputsProductos] = new AutoNumeric(document.getElementById(`costo_producto-${inputsProductos}`), {
                digitalGroupSpacing: '3',
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 0,
                outputFormat: "number"
            })
            inputsProductos++
        })

        /**
        * Calcula el valor en gr, ml o un de la unidad de medida seleccionada
        * @param medida {String} Valor del Select
        * @param cantidad {String} Cantidad total del producto
        * @return {Array} [0] = Unidad de medida, [1] Valor calculado 
        **/
        function valorConvertido(medida, cantidad) {
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
                    costoTotal: costos_productos[index].rawValue
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
         * Ver Productos
         * --------------------------------------------------------
         **/

        function obtenerProductos() {
            return $.ajax({
                url: '/productos',
                type: 'GET',
                success: (res) => {
                    return res
                },
                error: (err) => {
                    return err
                }
            })
        }

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
                    data: 'total_unidades',
                    render: (totalUnidades) => {
                        return parseFloat(totalUnidades) <= 0 ? `${totalUnidades} <i class="fa fa-warning text-warning" ></i>` : totalUnidades
                    }
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

        async function fillTable() {
            productosBD = await obtenerProductos()
            if (productosBD != null) {
                table.clear().draw()
                table.rows.add(productosBD).draw()
                productos = productosBD
            }
        }

        fillTable()

        $("#btn-update").click(function () {
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
                        $.ajax({
                            url: `/productos/${productoSelected.id}`,
                            data: {
                                id: productoSelected.id,
                                nombreComercial: $(`#nombre_comercial`).val(),
                                tipo: $(`#tipo_producto`).val(),
                                presentacion: $(`#presentacion_producto`).val(),
                                unindadMedida: valorConvertido($(`#unidad_medida_producto`).val(), $(`#cantidad_producto`).val())[0],
                                cantidadTotal: valorConvertido($(`#unidad_medida_producto`).val(), $(`#cantidad_producto`).val())[1],
                                valorUnidad: parseInt($(`#valor_unidad_producto`).val()),
                                costoTotal: costoProductoEdit.rawValue
                            },
                            type: 'PUT',
                            headers: {
                                "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value
                            }
                        })
                            .then(res => {
                                swal('¡Actualización Completada!', 'Producto actualizado correctamente.', 'success')
                                    .then(okPressed => {
                                        if (okPressed) {
                                            $("#btn-cancel-modal").click()
                                            fillTable()
                                        }
                                    })
                            })
                            .catch(err => {
                                swal('¡Error!', 'Error al actulizar producto.', 'error')
                            })
                    }
                })
        })

        /**
        * Registro de compras de productos
        * ------------------------------------------------
        */

        $("#btn-compra").click(async function () {
            $("#producto_compra").empty()
            await productos.forEach(producto => {
                $("#producto_compra").append(`
                    <option value="${producto.id}">${producto.nombre_comercial}</option>
                `)
            })

            $("#btn-modal-compra").click()
        })

        $("#producto_compra").change(e => {
            $("#unidad_medida_producto_compra").empty()
            let prodSel = productos.filter(producto => { return producto.id == e.target.value })[0]
            switch (prodSel.unidad_medida) {
                case 'ml':
                    $("#unidad_medida_producto_compra").append(`
                        <option value="ml">MILILITRO</option>
                        <option value="l">LITRO</option>
                        <option value="gal">GAlÓN</option>
                    `)
                    break
                case 'gr':
                    $("#unidad_medida_producto_compra").append(`
                        <option value="mg">MILIGRAMO</option>
                        <option value="lb">LIBRA</option>
                        <option value="oz">ONZA</option>
                        <option value="gr">GRAMO</option>
                        <option value="kg">KILOGRAMO</option>
                    `)
                    break
                default:
                    $("#unidad_medida_producto_compra").append(`
                        <option value="un">UNIDAD</option>
                    `)
                    break
            }
            $("#unidad_medida_producto_compra").val(prodSel.unidad_medida)

        })

        function guardarCompra(compra) {
            return $.ajax({
                url: '/compras',
                data: compra,
                type: 'POST',
                headers: {
                    "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value
                },
                success: (res) => {
                    return res
                },
                error: (err) => {
                    return err
                }
            })
        }

        $("#form-compra").submit(function (e) {
            e.preventDefault()
            let data = {
                idProductoSeleccionado: $("#producto_compra").val(),
                unidadMedida: valorConvertido($(`#unidad_medida_producto_compra`).val(), $(`#cantidad_producto_compra`).val())[0],
                cantidadProducto: valorConvertido($(`#unidad_medida_producto_compra`).val(), $(`#cantidad_producto_compra`).val())[1],
                valorUnidad: parseInt($(`#valor_unidad_producto_compra`).val()),
                costoTotal: costo_producto_compra.rawValue,
                numeroFactura: $("#factura_compra").val(),
                fechaCompra: $("#fecha_creacion").val()
            }
            swal({
                title: "¡Advertencia!",
                text: "¿Estás seguro de guardar esta compra?",
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
                        guardarCompra(data)
                            .then(res => {
                                swal('¡Compra Guardada!', 'La compra se ha guardado correctamente', 'success')
                                    .then(okPressed => {
                                        if (okPressed) {
                                            $("#btn-cancel-compra").click()
                                            fillTable()
                                        }
                                    })
                            })
                            .catch(err => {
                                swal('¡Error!', 'Error al guardar la compra', 'error')
                            })
                    }
                })
        })
    })

    /**
    * Eliminar productos
    * ---------------------------------------------------
    **/

    function deleteProd(idSelected) {
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de eliminar este producto?",
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
                        url: `/productos/${idSelected}`,
                        type: 'DELETE',
                        headers: {
                            "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value
                        }
                    })
                        .then(res => {
                            swal('¡Eliminación exitosa!', 'El producto ha sido eliminado correctamente.', 'success')
                                .then(okPressed => {
                                    if (okPressed) {
                                        fillTable()
                                    }
                                })
                        })
                        .catch(err => {
                            swal('¡Error!', 'Ha ocurrido un error al eliminar el producto', 'error')
                        })
                }
            })
    }

    /**
     * Editar productos
     * ----------------------------------------------
     **/

    function updateProd(idSelected) {
        $("#form-modal").empty()
        productoSelected = productos.filter(producto => { return producto.id == idSelected })[0]
        $("#form-modal").append(`
            <div class="form-group col-lg-12" style="margin-top: 15px;">
                <label class="control-label">Nombre comercial</label>
                <input style="text-transform: uppercase" type="text" name="nombre_comercial" id="nombre_comercial"
                    class="form-control" required placeholder="Escriba el nombre comercial del producto">
            </div>
            <div class="form-group col-lg-6" style="margin-top: 15px;">
                <label class="control-label">Tipo</label>
                <select style="text-transform: uppercase" name="tipo_producto" id="tipo_producto"
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
            <div class="form-group col-lg-6" style="margin-top: 15px;">
                <label class="control-label">Presentación </label>
                <select style="text-transform: uppercase" name="presentacion_producto" id="presentacion_producto"
                    class="form-control" required>
                    <option value="0" selected>Seleccione una opción</option>
                    <option value="Presentacion 1">Presentacion 1</option>
                    <option value="Presentacion 2">Presentacion 2</option>
                </select>
            </div>
            <div class="form-group col-lg-6" style="margin-top: 15px;">
                <label class="control-label">Unidad de medida </label>
                <select style="text-transform: uppercase" name="unidad_medida_producto" id="unidad_medida_producto"
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
                    <option value="un">UNIDAD</option>
                </select>
            </div>
            <div class="form-group col-lg-6" style="margin-top: 15px;">
                <label class="control-label">Cantidad total (Según medida seleccionada)</label>
                <input type="number" step="0.01" name="cantidad_producto" id="cantidad_producto" class="form-control" required>
            </div>
            <div class="form-group col-lg-6" style="margin-top: 15px;">
                <label class="control-label">Valor unidad (Según medida seleccionada)</label>
                <input type="text" name="valor_unidad_producto" id="valor_unidad_producto" class="form-control" required>
            </div>
            <div class="form-group col-lg-6" style="margin-top: 15px;">
                <label class="control-label">Costo total</label>
                <input type="text" name="costo_producto" id="costo_producto" class="form-control" required>
            </div>
        `)

        $("#nombre_comercial").val(productoSelected.nombre_comercial)
        $("#tipo_producto").val(productoSelected.tipo)
        $("#presentacion_producto").val(productoSelected.presentacion)
        $("#unidad_medida_producto").val(productoSelected.unidad_medida)
        $("#cantidad_producto").val(parseFloat(productoSelected.total_unidades).toFixed(2))
        $("#valor_unidad_producto").val(productoSelected.valor_unidad)
        $("#costo_producto").val(productoSelected.costo_total)

        costoProductoEdit = new AutoNumeric(document.getElementById('costo_producto'), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        $("#btn-modal").click()
    }
</script>
@endsection