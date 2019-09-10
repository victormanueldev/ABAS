@extends('layouts.app')
@section('custom-css')
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 id="tipo-doc-titulo"></h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li>
                <a href="/documents/create">Registro de documentos</a>
            </li>
            <li class="active">
                <strong>Actualizacion de documentos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" id="seccion-docs">
        <!-- Seccion para docmentos generados automaticamente -->

    </div>
</div>
@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment-timezone.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script>
    $(document).ready(function () {

        var docsSede = []
        var docsTipoSede = []
        const dataDocumento = {
            idCliente: window.location.pathname.split("/")[3],
            idSede: window.location.pathname.split("/")[4],
            tipoDoc: window.location.pathname.split("/")[5]
        }


        function toCapitalCase(tipoDoc) {
            switch (tipoDoc) {
                case 'Ninguna':
                    return null
                    break
                default:
                    // Reemplaza todas las coincidencias del caracter
                    return tipoDoc.replace(/_/g, " ").toUpperCase()
                    break
            }
        }

        $("#tipo-doc-titulo").append(toCapitalCase(dataDocumento.tipoDoc));
        $("#seccion-docs").empty()

        $.get(
                `/documents/edit/${ dataDocumento.idCliente }/${ dataDocumento.idSede }/${ dataDocumento.tipoDoc }`
                )
            .then(res => {

                /** Estructura de datos para mostrar documentos
                -------------------------------------------------- **/

                res.forEach((documento, index) => {

                    $("#seccion-docs").append(`
                        <div class="col-lg-12" id="column-${index}">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="row" >
                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Nombre del documento *</label>
                                            <input type="text" style="text-transform: uppercase" id="nombre_documento_${index}"
                                                name="nombre_documento_${index}" placeholder="Ej: Acta de concepto favorable"
                                                class="form-control" value="${documento.nombre}"required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" id="data_${index}">
                                                <label>Fechas de vigencia *</label>
                                                <div class="input-daterange input-group" id="datepicker" style="width: 100%;">
                                                    <input type="text" id="date-start_${index}" class="form-control-sm form-control"
                                                        name="start" value="01/14/2018" required />
                                                    <span class="input-group-addon">hasta</span>
                                                    <input type="text" id="date-end_${index}" class="form-control-sm form-control"
                                                        name="end" value="01/22/2018" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label class="control-label">URL de drive *</label>
                                            <input type="text" style="text-transform: uppercase" id="url-doc_${index}"
                                                name="url-doc_${index}" placeholder="Pega el vinculo para compartir de drive"
                                                class="form-control" value="${documento.url}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-footer">
                                    <button type="button" class="btn btn-w-m btn-default">Cancelar</button>
                                    <button type="button" class="btn btn-w-m btn-danger" id="eliminar-doc_${index}">Eliminar</button>
                                    <button type="button" class="btn btn-w-m btn-primary" id="editar-doc_${documento.id}">Guardar</button>
                                </div>
                            </div>
                        </div>
                    `)

                    /** Asignacion de fechas por default a dateRange **/
                    $(`#date-start_${index}`).val(moment(documento.fecha_inicio_vigencia,
                        "YYYY-MM-DD").format(
                        "MM/DD/YYYY"));
                    $(`#date-end_${index}`).val(moment(documento.fecha_fin_vigencia, "YYYY-MM-DD")
                        .format("MM/DD/YYYY"));

                    /** Inicializacion del Date Range **/
                    $(`#data_${index} .input-daterange`).datepicker({
                        keyboardNavigation: false,
                        forceParse: false,
                        autoclose: true
                    });

                    $(`#eliminar-doc_${index}`).click(() => {
                        //Alert de confirmacion
                        swal({
                                title: "¡Advertencia!",
                                text: "¿Estás seguro de eliminar este documento?",
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
                                            url: `/documents/${documento.id}`,
                                            type: 'DELETE'
                                        })
                                        .then(res => {
                                            swal("¡Eliminación Correcta!",
                                                "Documento borrado correctamente.",
                                                "success")
                                            $(`#column-${index}`).remove()
                                        })
                                        .catch(err => {
                                            swal("¡Error!",
                                                'Ha ocurrido un error al intentar eliminar el documento',
                                                "error")
                                        })
                                }
                            })
                    })

                    $(`#editar-doc_${documento.id}`).click(() => {

                        let dataToSend = {
                            id: documento.id,
                            nombre: $(`#nombre_documento_${index}`).val(),
                            fechaInicio: moment($(`#date-start_${index}`).val(), "MM/DD/YYYY").format("YYYY-MM-DD"),
                            fechaFin: moment($(`#date-end_${index}`).val(), "MM/DD/YYYY").format("YYYY-MM-DD"),
                            url: $(`#url-doc_${index}`).val()
                        }

                        //Alert de confirmacion
                        swal({
                                title: "¡Advertencia!",
                                text: "¿Estás seguro de actualizar este documento?",
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
                                            url: '/documents/update',
                                            data: dataToSend,
                                            type: 'PUT'
                                        })
                                        .then(res => {
                                            window.location.reload()
                                        })
                                        .catch(err => {
                                            swal("¡Error!",
                                                'Ha ocurrido un error al intentar eliminar el documento',
                                                "error")
                                        })
                                }
                            })
                    })

                })

            })

    })
</script>
@endsection