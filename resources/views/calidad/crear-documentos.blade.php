@extends('layouts.app')
@section('custom-css')
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Actualización de documentos</h2>
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

        $("#seccion-docs").empty()

        $.get(`/documents/show/${ window.location.pathname.split("/")[3] }`)
            .then(res => {

                function estadoDoc(documento) {
                    if (documento != null) {
                        if (moment(`${documento.fecha_fin_vigencia}`, 'YYYY-MM-DD') < moment()) {
                            return ['Vencido', 'warning']
                        } else {
                            return ['Vigente', 'primary']
                        }
                    } else {
                        return ['Pendiente', 'detault']
                    }
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

                function validarVigencia(vigencia){
                    switch (vigencia) {
                        case 'Vencido':
                        case 'Pendiente':
                            return true
                        default:
                            return false
                    }
                }

                function generarCodigoTipo(indexSeccion) {
                    return docsTipoSede.map((tipoDoc, index) => {
                        if (indexSeccion == index) {
                            // Retorna el codigo identificadpr del documento y el tipo al que pertenece
                            return {
                                codigo: `DC0${(Math.random() * (9999 - 1) + 1).toFixed(0)}`,
                                tipo: tipoDoc.tipo
                            }
                        }
                    })[indexSeccion]
                }

                function guardarDocumentos(index, contadorDocumentos) {
                    var dataToSend = []

                    // Recorre todos los inputs creados
                    for (let i = 0; i <= contadorDocumentos[index]; i++) {
                        dataToSend.push({
                            codigo: generarCodigoTipo(index).codigo,
                            tipo: generarCodigoTipo(index).tipo,
                            nombre: $(
                                `#nombre_documento_${index}-${contadorDocumentos[i]}`
                            ).val(),
                            fechaInicio: moment($(
                                `#date-start_${index}-${contadorDocumentos[i]}`
                            ).val(), 'MM/DD/YYYY').format(
                                'YYYY-MM-DD'),
                            fechaFin: moment($(
                                `#date-end_${index}-${contadorDocumentos[i]}`
                            ).val(), 'MM/DD/YYYY').format(
                                'YYYY-MM-DD'),
                            url: $(
                                    `#url-doc_${index}-${contadorDocumentos[i]}`
                                )
                                .val(),
                            clienteId: window.location.pathname.split("/")[
                                3],
                            sedeId: window.location.pathname.split("/")[4]
                        })
                    }

                    //Alert de confirmacion
                    swal({
                            title: "¡Advertencia!",
                            text: "¿Estás seguro de guardar estos documentos?",
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
                                        url: '/documents',
                                        data: {
                                            documentos: dataToSend
                                        },
                                        type: 'POST'
                                    })
                                    .then(res => {
                                        swal("¡Creación Correcta!",
                                            "Documentos creados correctamente.",
                                            "success")
                                        $(`#column-${index}`).remove()
                                    })
                                    .catch(err => {
                                        swal("¡Error!",
                                            'Ha ocurrido un error al intentar guardar los documentos',
                                            "error")
                                    })
                            }
                        })
                }

                res[0].sedes.forEach((sede, index) => {

                    res[0].inspecciones.forEach(inspeccion => {
                        if (sede.nit_cedula) {
                            if (sede.id == inspeccion.cliente_id) {
                                inspeccion.gestion_calidad.forEach(tipo => {
                                    docsTipoSede.push({
                                        tipo: tipo.tipo_documento,
                                        frec: tipo.frecuencia_documento,
                                        sede: sede.id,
                                        docs: sede.documentos
                                    })
                                })
                            }
                        } else {
                            if (sede.id == inspeccion.sede_id) {
                                inspeccion.gestion_calidad.forEach(tipo => {
                                    docsTipoSede.push({
                                        tipo: tipo.tipo_documento,
                                        frec: tipo.frecuencia_documento,
                                        sede: sede.id,
                                        docs: sede.documentos
                                    })
                                })
                            }

                        }
                    })

                })

                /** Estructura y opciones para la información mostrada 
                -------------------------------------------------- **/
                var contadorDocumentos = []
                console.log(docsTipoSede);
                

                docsTipoSede.forEach((tiposDoc, index) => {
                    // Inicializa el contador para cada "Seccion"
                    contadorDocumentos[index] = 0
                    
                    // Valida que el documento exista y solo muestra los de la sede seleccionada
                    if (tiposDoc.tipo && tiposDoc.sede == window.location.pathname.split("/")[4] && validarVigencia(estadoDoc(tiposDoc.docs.filter(doc => { return tiposDoc.tipo == doc.tipo })[0])[0])) {
                        $("#seccion-docs").append(`
                            <div class="col-lg-12" id="column-${index}">
                                <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <div class="row">
                                                <div class="col-md-10 col-sm-6">
                                                    <h3 style="margin: 0;">${ toCapitalCase(tiposDoc.tipo || 'Ninguna')}
                                                        <span
                                                            class="label label-${ estadoDoc(tiposDoc.docs.filter(doc => { return tiposDoc.tipo == doc.tipo })[0])[1] }"
                                                            style="position: absolute;margin: 0 0 0 15px;">${estadoDoc(tiposDoc.docs.filter(doc => { return tiposDoc.tipo == doc.tipo })[0])[0] }<span>
                                                    </h3>
                                                    <span>${tiposDoc.frec.toUpperCase()}</span>

                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary pull-right"
                                                        id="add-seccion-${index}"><i class="fa fa-plus"></i> Agregar
                                                        documento</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content">
                                            <div class="row" id="seccion-${index}">
                                                <div class="form-group col-lg-4">
                                                    <label class="control-label">Nombre del documento *</label>
                                                    <input type="text" style="text-transform: uppercase"
                                                        id="nombre_documento_${index}-0"
                                                        name="nombre_documento_${index}-0"
                                                        placeholder="Ej: Acta de concepto favorable"
                                                        class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" id="data_${index}-0">
                                                        <label>Fechas de vigencia *</label>
                                                        <div class="input-daterange input-group" id="datepicker"
                                                            style="width: 100%;">
                                                            <input type="text" id="date-start_${index}-0"
                                                                class="form-control-sm form-control" name="start"
                                                                value="01/14/2018" required />
                                                            <span class="input-group-addon">hasta</span>
                                                            <input type="text" id="date-end_${index}-0"
                                                                class="form-control-sm form-control" name="end"
                                                                value="01/22/2018" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label class="control-label">URL de drive *</label>
                                                    <input type="text" style="text-transform: uppercase"
                                                        id="url-doc_${index}-0" name="url-doc_${index}-0"
                                                        placeholder="Pega el vinculo para compartir de drive"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <!--<div class="row">
                                                <div class="col-lg-12">
                                                    <br>
                                                    <strong>Observaciones: </strong>
                                                </div>
                                            </div>-->
                                        </div>
                                        <div class="ibox-footer">
                                            <button type="button" class="btn btn-w-m btn-default">Cancelar</button>
                                            <button type="button" id="enviar-${index}"
                                                class="btn btn-w-m btn-primary">Guardar</button>
                                        </div>
                                </div>
                            </div>
                        `)

                        /** Asignacion de fechas por default a dateRange **/
                        $(`#date-start_${index}-0`).val(moment().tz("America/Bogota").format(
                            "MM/DD/YYYY"));
                        $(`#date-end_${index}-0`).val(moment().tz("America/Bogota").add(1,
                            "month").format("MM/DD/YYYY"));

                        /** Inicializacion del Date Range **/
                        $(`#data_${index}-0 .input-daterange`).datepicker({
                            keyboardNavigation: false,
                            forceParse: false,
                            autoclose: true
                        });

                        // Evento de creacion de nuevos documentos
                        $(`#add-seccion-${index}`).click(e => {
                            contadorDocumentos[index]++
                            $(`#seccion-${index}`).append(`
                                <div class="form-group col-lg-4">
                                    <label class="control-label">Nombre del documento *</label>
                                    <input type="text" style="text-transform: uppercase" id="nombre_documento_${index}-${contadorDocumentos[index]}"
                                        name="nombre_documento_${index}-${contadorDocumentos[index]}" placeholder="Ej: Acta de concepto favorable"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" id="data_${index}-${contadorDocumentos[index]}">
                                        <label>Fechas de vigencia *</label>
                                        <div class="input-daterange input-group" id="datepicker" style="width: 100%;">
                                            <input type="text" id="date-start_${index}-${contadorDocumentos[index]}" class="form-control-sm form-control" name="start"
                                                value="01/14/2018" required />
                                            <span class="input-group-addon">hasta</span>
                                            <input type="text" id="date-end_${index}-${contadorDocumentos[index]}" class="form-control-sm form-control" name="end"
                                                value="01/22/2018" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="control-label">URL de drive *</label>
                                    <input type="text" style="text-transform: uppercase" id="url-doc_${index}-${contadorDocumentos[index]}"
                                        name="url-doc_${index}-${contadorDocumentos[index]}" placeholder="Pega el vinculo para compartir de drive"
                                        class="form-control" required>
                                </div>
                            `)

                            /** Asignacion de fechas por default a dateRange **/
                            $(`#date-start_${index}-${contadorDocumentos[index]}`).val(
                                moment().tz("America/Bogota").format(
                                    "MM/DD/YYYY"));
                            $(`#date-end_${index}-${contadorDocumentos[index]}`).val(
                                moment().tz("America/Bogota").add(1,
                                    "month").format("MM/DD/YYYY"));

                            /** Inicializacion del Date Range **/
                            $(`#data_${index}-${contadorDocumentos[index]} .input-daterange`)
                                .datepicker({
                                    keyboardNavigation: false,
                                    forceParse: false,
                                    autoclose: true
                                });
                        })


                        // Envio de formularios
                        $(`#enviar-${index}`).click(e => {
                            guardarDocumentos(index,contadorDocumentos)
                        })
                    }
                })

            })
    })
</script>
@endsection