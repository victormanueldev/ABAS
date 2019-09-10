@extends('layouts.app')
@section('custom-css')
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection
@section('content')
<script>
        document.getElementById('m-inventario-documentos').setAttribute("class", "active");
        document.getElementById('a-inventario-documentos').removeAttribute("style");
        document.getElementById('ml2-inventario-documentos').setAttribute("class", "nav nav-second-level collapse in");
        document.getElementById('ml2-registrar-docs').setAttribute("class", "active");
    </script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Registro de documentos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li>
                <a href="#">Documentos de clientes</a>
            </li>
            <li class="active">
                <strong>Registro de documentos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Registro de documentos por cliente</h5>

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
                    <div>
                        <h4>Filtro por clientes</h4>
                        <p>Indique los datos del cliente para realizar el filtro.</p>
                        <div class="row">
                            <div class="form-group ">
                                <label class="col-sm-12 col-md-2 control-label">Buscar cliente por: </label>
                                <div class="col-sm-12 col-md-10">
                                    <label class="radio-inline">
                                        <input class="radio-options" type="radio" value="1" id="por_nombre" name="optionsRadios">
                                        Nombre </label>
                                    <label class="radio-inline">
                                        <input class="radio-options" type="radio" value="2" id="por_rs" name="optionsRadios">
                                        Razon Social </label>
                                    <label class="radio-inline">
                                        <input class="radio-options" type="radio" value="3" id="por_nit" name="optionsRadios">
                                        NIT/CC </label>
                                </div>
                                <div class="col-sm-12 col-md-11" style="margin-top: 10px;width: 85%;">
                                    <input type="text" placeholder="Cliente..." class="typeahead_1 form-control" id="input_autocomplete"
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group col-md-1" style="margin-top: 10px">
                                <button type="button" id="btn-find-docs" class="btn btn-primary">Buscar <i class="fa fa-search" style="margin-left: 3px"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="seccion-sedes"></div>

    </div>
</div>
@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script>
    //Inicializacion de variables
    var nit_clientes = [];
    var nombres_clientes = [];
    var razon_social_clientes = [];
    var $input;
    var data;
    var clienteSeleccionado;

    ///var crsfToken = document.getElementsByName("_token")[0].value;

    $(document).ready(function () {

        /**
         * Filtro de busqueda por cliente
         * -----------------------------------------------------------
         **/

        $.get('/clientes')
            .then((res) => {
                clientes = res;
                //Recorre la respueta
                res.forEach((value, index) => {
                    //Convertir a formato JSON para poder ser mostrados en el typehead
                    nit_clientes[index] = JSON.parse(`{"name": "${value.nit_cedula}", "id": "${value.id}"}`);
                    nombres_clientes[index] = JSON.parse(`{"name": "${value.nombre_cliente}", "id": "${value.id}"}`);
                    if (value.razon_social == 'null' || value.razon_social == null) {
                        razon_social_clientes[index] = JSON.parse(`{"name": "${value.nombre_cliente}", "id": "${value.id}"}`);
                    } else {
                        razon_social_clientes[index] = JSON.parse(`{"name": "${value.razon_social}", "id": "${value.id}"}`);
                    }
                })
            })
            .catch((err) => {
                console.log(err);
            });

        $input = $('.typeahead_1').typeahead({
            source: nit_clientes
        });

        $(".radio-options").click(event => {
            //Valida el valor del radiobutton seleccionado
            switch (event.target.value) {
                //Buscar por nombre de clientes
                case '1':
                    data = nombres_clientes;
                    $('.typeahead_1').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                //Buscar por razon social de clientes
                case '2':
                    data = razon_social_clientes;
                    $('.typeahead_1').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                //Buscar por NIT o CC de clientes
                case '3':
                    data = nit_clientes;
                    $('.typeahead_1').typeahead('destroy').typeahead({
                        source: data
                    });
                    break;
                default:
                    console.log('Default');
                    data = [];
                    break;
            }
        });

        $input.change(() => {
            var current = $input.typeahead("getActive");
            //Peticion GET al servidor a la ruta /sedes/clientes/{id} (Sedes de cliente)
            clienteSeleccionado = current.id
        });

        /**
         * Ver reporte de documentos por sede
         * ----------------------------------------------------------
         **/
        

        $("#btn-find-docs").click(function (){
            var docsSede = []
            var docsTipoSede = [] 
            var clienteNatural;
            
            $("#seccion-sedes").empty()
            $.get(`/documents/show/${clienteSeleccionado}`)
            .then(res => {

                function estadoDoc(documento){
                    if(documento != null){
                        if(moment(`${documento.fecha_fin_vigencia}`, 'YYYY-MM-DD') < moment()){
                            return ['Vencido','warning']
                        }else{
                            return ['Vigente','primary']
                        }
                    }else{
                        return ['Pendiente','detault']
                    }
                }

                function toCapitalCase(tipoDoc) {
                    return tipoDoc.replace("_", " ").toUpperCase()
                }

               res[0].sedes.forEach((sede, index)=> {
                    $("#seccion-sedes").append(`
                        <div class="col-lg-6">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>${sede.nombre}</h5>
                                    <a class="text-navy" style="margin-left: 10px;" href="/docs/update/${clienteSeleccionado}/${sede.id}">Actualizar documentos <i class="fa fa-external-link"></i></a>
                                </div>
                                <div class="ibox-content ">
                                    <table class="table table-hover table-responsive" style="display: inline-block">
                                        <thead>
                                        <tr>
                                            <th style="width: 25px">Tipo de documento</th>
                                            <th>Frecuencia</th>
                                            <th>Estado</th>
                                            <th>Último registrado</th>
                                            <th>Fecha vencimiento</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <tbody id="sede-id_${sede.id}">
                                            <!-- Docs sede -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    `)
                    
                    res[0].inspecciones.forEach(inspeccion => {
                        if(sede.nit_cedula){
                            if(sede.id == inspeccion.cliente_id){
                                clienteNatural = 0;
                                inspeccion.gestion_calidad.forEach(tipo => {
                                    docsTipoSede.push({tipo: tipo.tipo_documento, frec: tipo.frecuencia_documento, sede: sede.id, docs: sede.documentos, id_cliente: inspeccion.cliente_id})
                                })
                            }
                            console.log(true)
                        }else{
                            if(sede.id == inspeccion.sede_id){
                                inspeccion.gestion_calidad.forEach(tipo => {
                                    docsTipoSede.push({tipo: tipo.tipo_documento, frec: tipo.frecuencia_documento, sede: sede.id, docs: sede.documentos, id_cliente: inspeccion.cliente_id})
                                })
                            }
                            
                        }
                    })
               })
               console.log(docsTipoSede)

               docsTipoSede.forEach(tiposDoc => {
                    $(`#sede-id_${tiposDoc.sede}`).append(`
                        <tr>
                            <td>${ toCapitalCase(tiposDoc.tipo)}</td>
                            <td>${tiposDoc.frec}</td>
                            <td><span class="label label-${ estadoDoc(tiposDoc.docs.filter(doc => { return tiposDoc.tipo == doc.tipo })[0])[1] }" style="padding: 3px 9px" >${ estadoDoc(tiposDoc.docs.filter(doc => { return tiposDoc.tipo == doc.tipo })[0])[0] }<span></td>
                            <td>${ tiposDoc.docs.filter(doc => { return tiposDoc.tipo == doc.tipo })[0] != null ? tiposDoc.docs.filter(doc => { return tiposDoc.tipo == doc.tipo })[0].codigo : '-----------' }</td>
                            <td>${ tiposDoc.docs.filter(doc => { return tiposDoc.tipo == doc.tipo })[0] != null ? tiposDoc.docs.filter(doc => { return tiposDoc.tipo == doc.tipo })[0].fecha_fin_vigencia : '-----------' }</td>
                            <td>
                                <a title="Editar documento" class="btn btn-primary btn-circle btn-outline"  href="/documents/edit/${clienteSeleccionado}/${clienteNatural == 0 ? clienteNatural : tiposDoc.sede}/${tiposDoc.tipo}"><i style="font-size: 15px" class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    `)
               })

            })

            .catch(err => {
                console.error(err)
            })
        })


    })
</script>
@endsection