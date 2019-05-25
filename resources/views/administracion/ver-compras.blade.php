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
    document.getElementById('ml2-ver-compras').setAttribute("class", "active");
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
                <div class="ibox-title">
                    <h5>Historial de compras</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tabla_compras" class="table table-hover dataTables-example" data-filter=#filter>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. de factura</th>
                                    <th>Producto</th>
                                    <th>Un. medida</th>
                                    <th>Cantidad comprada</th>
                                    <th>Valor unidad</th>
                                    <th>Costo total</th>
                                    <th>Fecha de compra</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-compras"
            id="btn-modal-compra">
            Launch modal
        </button>

        <!--===================================================
        /* Modal editar compras
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
                            <h2 class="modal-title" style="font-size: 23px;">Editar Compra</h2>
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
                                <!-- <div class="form-group col-lg-4" style="margin-top: 15px;">
                                    <label class="control-label">Costo total</label>
                                    <input type="text" name="costo_producto_compra" id="costo_producto_compra" class="form-control"
                                        required>
                                </div> -->
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
    var compras
    var compraSeleccionada
    var productos
    var costoTotal
    var deleteComp

    $(document).ready(function () {

        var date = moment().format("YYYY-MM-DD");
        $('#fecha_creacion').val(date);

        $.get('/productos')
            .then(res => {
                productos = res
            })
            .catch(err => {
                console.log(err)
            })

        function obtenerCompras() {
            return $.ajax({
                url: '/compras',
                type: 'GET',
                success: (res) => {
                    return res
                },
                error: (err) => {
                    return err
                }
            })
        }

        table = $("#tabla_compras").DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'excel', title: 'ListadoComprasSanicontrolSAS' },
                { extend: 'pdf', title: 'ListadoComprasSanicontrolSAS' }
            ],
            columns: [
                { data: 'id' },
                { data: 'numero_factura' },
                {
                    data: 'producto',
                    render: (producto) => {
                        return producto.nombre_comercial.toUpperCase()
                    }
                },
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
                    render: (idCompra) => {
                        return `<button title="Editar compra" class="btn btn-primary btn-circle btn-outline" onclick="updateCompra(${idCompra})"><i style="font-size: 15px" class="fa fa-edit"></i></button>
                                <button title="Eliminar compra" class="btn btn-danger btn-circle btn-outline" onclick="deleteCompra(${idCompra})"><i style="font-size: 15px" class="fa fa-trash"></i></button>`
                    }
                }
            ]
        })

        async function fillTable() {
            comprasBD = await obtenerCompras()
            if (comprasBD != null) {
                table.clear().draw()
                table.rows.add(comprasBD).draw()
                compras = comprasBD
            }
        }

        fillTable()

        $("#producto_compra").change(e => {
            $("#unidad_medida_producto_compra").empty()
            let prodSel = productos.filter(producto => { return producto.id == e.target.value })[0]
            console.log(prodSel.unidad_medida)
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

        function guardarCompra(compra) {
            return $.ajax({
                url: `/compras/${compra.idCompraSeleccionada}`,
                data: compra,
                type: 'PUT',
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
                idCompraSeleccionada: compraSeleccionada.id,
                idProductoSeleccionado: $("#producto_compra").val(),
                unidadMedida: valorConvertido($(`#unidad_medida_producto_compra`).val(), $(`#cantidad_producto_compra`).val())[0],
                cantidadProducto: valorConvertido($(`#unidad_medida_producto_compra`).val(), $(`#cantidad_producto_compra`).val())[1],
                valorUnidad: parseInt($(`#valor_unidad_producto_compra`).val()),
                costoTotal: costoTotal.rawValue,
                numeroFactura: $("#factura_compra").val(),
                fechaCreacion: $("#fecha_creacion").val()
            }
            swal({
                title: "¡Advertencia!",
                text: "¿Estás seguro de editar esta compra?",
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

        deleteComp = function (idCompra){
            swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de eliminar esta compra?",
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
                        url: `/compras/${idCompra}`,
                        type: 'DELETE',
                        headers: {
                            "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value
                        }
                    })
                        .then(res => {
                            swal('¡Eliminación exitosa!', 'La compra ha sido eliminado correctamente.', 'success')
                                .then(okPressed => {
                                    if (okPressed) {
                                        fillTable()
                                    }
                                })
                        })
                        .catch(err => {
                            swal('¡Error!', 'Ha ocurrido un error al eliminar la compra', 'error')
                        })
                }
            })
        }

    })

    async function fillProducts(compraSelected) {
        $("#producto_compra").empty()
        await productos.forEach(producto => {
            $("#producto_compra").append(`
                    <option value="${producto.id}">${producto.nombre_comercial}</option>
                `)
        })
        $("#producto_compra").val(compraSelected.producto.id)
        $("#unidad_medida_producto_compra").val(compraSelected.unidad_medida)
        $("#btn-modal-compra").click()
    }

    function updateCompra(idCompra) {
        costoTotal = ''
        $("#div-costo").remove()
        $("#unidad_medida_producto_compra").empty()
        compraSeleccionada = compras.filter(compra => { return compra.id == idCompra })[0]
        let date = moment(compraSeleccionada.created_at, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD')
        $("#fecha_creacion").val(date)
        $("#factura_compra").val(compraSeleccionada.numero_factura)
        $("#cantidad_producto_compra").val(compraSeleccionada.total_unidades)
        $("#valor_unidad_producto_compra").val(compraSeleccionada.valor_unidad)
        $("#form-modal").append(`
            <div class="form-group col-lg-4" style="margin-top: 15px;" id="div-costo">
                <label class="control-label">Costo total</label>
                <input type="text" name="costo_producto_compra" id="costo_producto_compra" class="form-control" required>
            </div>
        `)
        $("#unidad_medida_producto_compra").append(`
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
        `)
        $("#costo_producto_compra").val(compraSeleccionada.costo_total.toString())
        costoTotal = new AutoNumeric(document.getElementById('costo_producto_compra'), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })
        fillProducts(compraSeleccionada)
    }

    function deleteCompra(idCompra) {
        deleteComp(idCompra)
    }

</script>
@endsection