@extends('layouts.app')
@section('content')
@section('custom-css')
<link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Clientes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li class="active">
                <strong>Ver Cliente</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content ">
    <div class="row">
        @if(Auth::user()->area_id == "4" || Auth::user()->area_id == "6")
            <div class="col-lg-9">
        @else
            <div class="col-lg-12">
        @endif
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <button type="button" class="btn btn-warning btn-xs pull-right" style="margin-right: 10px"
                                    data-toggle="modal" data-target="#modal-update-cliente">Editar cliente</button>
                                <button type="button" class="btn btn-warning btn-xs pull-right" style="margin-right: 10px"
                                    data-toggle="modal" data-target="#modal-create-sede">Añadir Sede</a>
                                    <button type="button" class="btn btn-warning btn-xs pull-right" style="margin-right: 10px"
                                        data-toggle="modal" data-target="#modal-create-cotizacion">Añadir Cotización</button>
                                    <h2>{{$cliente[0]->nombre_cliente}}</h2>
                            </div>
                            @if($cliente[0]->tipo_cliente == 'Persona Juridica')
                            <div class="row">
                                <div class="col-md-6">
                                    <dl class="dl-horizontal">
                                        <dt>Tipo de Cliente:</dt>
                                        <dd><span class="label label-default">{{$cliente[0]->tipo_cliente}}</span></dd>
                                    </dl>
                                </div>
                                <div class="col-md-6">
                                    <dl class="dl-horizontal">
                                        <dt>Estado del Cliente:</dt>
                                        @if($cliente[0]->estado_negociacion == 'Prospecto')
                                        <dd><span class="label label-defult">Prospecto</span></dd>
                                        @else
                                        <dd><span class="label label-success">Cliente</span></dd>
                                        @endif
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>NIT:</dt>
                                <dd>{{$cliente[0]->nit_cedula}}</dd>
                                <dt>Razon Social/Nombre:</dt>
                                <dd> {{$cliente[0]->nombre_cliente}}</dd>
                                <dt>Nombre Comercial:</dt>
                                <dd> {{$cliente[0]->razon_social}} </dd>
                                <dt>Sector Económico:</dt>
                                <dd> {{$cliente[0]->sector_economico}} </dd>
                            </dl>
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <dl class="dl-horizontal">
                                        <dt>Tipo de Cliente:</dt>
                                        <dd><span class="label label-default">{{$cliente[0]->tipo_cliente}}</span></dd>
                                    </dl>
                                </div>
                                <div class="col-md-6">
                                    <dl class="dl-horizontal">
                                        <dt>Estado del Cliente:</dt>
                                        @if($cliente[0]->estado_negociacion == 'Prospecto')
                                            <dd><span class="label label-default">Prospecto</span></dd>
                                        @else
                                            <dd><span class="label label-success">Cliente</span></dd>
                                        @endif
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>Nro. Cédula:</dt>
                                <dd>{{$cliente[0]->nit_cedula}}</dd>
                            </dl>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>Municipio:</dt>
                                <dd>{{$cliente[0]->municipio}}</dd>
                                <dt>Dirección:</dt>
                                <dd>{{$cliente[0]->direccion}}</dd>
                                <dt>Barrio:</dt>
                                <dd>{{$cliente[0]->barrio}}</dd>
                                <dt>Zona:</dt>
                                <dd>{{$cliente[0]->zona}}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>Contacto Inical:</dt>
                                <dd>{{$cliente[0]->nombre_contacto_inicial}}</dd>
                                <dt>Cargo:</dt>
                                <dd>{{$cliente[0]->cargo_contacto_inicial}}</dd>
                                <dt>Celular:</dt>
                                <dd>{{$cliente[0]->celular_contacto_inicial}}</dd>
                                <dt>Email:</dt>
                                <dd>{{$cliente[0]->email_contacto_inicial}}</dd>
                            </dl>
                        </div>

                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>Contacto Técnico:</dt>
                                <dd>{{$cliente[0]->nombre_contacto_tecnico}}</dd>
                                <dt>Cargo:</dt>
                                <dd>{{$cliente[0]->cargo_contacto_tecnico}}</dd>
                                <dt>Celular:</dt>
                                <dd>{{$cliente[0]->celular_contacto_tecnico}}</dd>
                                <dt>Email:</dt>
                                <dd>{{$cliente[0]->email_contacto_tecnico}}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>Contacto Facturación:</dt>
                                <dd>{{$cliente[0]->nombre_contacto_facturacion}}</dd>
                                <dt>Cargo:</dt>
                                <dd>{{$cliente[0]->cargo_contacto_facturacion}}</dd>
                                <dt>Celular:</dt>
                                <dd>{{$cliente[0]->celular_contacto_facturacion}}</dd>
                                <dt>Email:</dt>
                                <dd>{{$cliente[0]->email_contacto_facturacion}}</dd>
                            </dl>
                        </div>

                        <div class="col-lg-6" id="cluster_info">
                            <dl class="dl-horizontal">
                                <dt>Fecha Registro:</dt>
                                <dd>{{$cliente[0]->created_at}}</dd>
                                <dt>Fecha Actualización:</dt>
                                <dd> {{$cliente[0]->updated_at}} </dd>
                                <dt>Nombre Asesor:</dt>
                                <dd> {{$cliente[0]['user']['nombres']." ".$cliente[0]['user']['apellidos']}} </dd>
                                <dt>Telefonos :</dt>
                                <dd>
                                    @foreach($cliente[0]->telefonos as $telefono)
                                    {{$telefono->numero}} -
                                    @endforeach
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row m-t-sm">
                        <div class="col-lg-12">
                            <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab-1" data-toggle="tab">Sedes</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab">Inspección</a></li>
                                            <li class=""><a href="#tab-3" data-toggle="tab">Solicitudes</a></li>
                                            <li class=""><a href="#tab-4" data-toggle="tab">Cotizaciones</a></li>
                                            <li class=""><a href="#tab-5" data-toggle="tab">Certificados</a></li>
                                            <li class=""><a href="#tab-6" data-toggle="tab">Rutas</a></li>
                                            <li class=""><a href="#tab-7" data-toggle="tab">Novedades Temporales</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">

                                            <div class="table-responsive">
                                                <table class="table shoping-cart-table">
                                                    <tbody>
                                                        @foreach($cliente[0]->sedes as $sede)
                                                        <tr>
                                                            <td class="desc">
                                                                <h3>
                                                                    {{$sede->nombre}}
                                                                </h3>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <dl class=" dl-horizontal">
                                                                            <dt style="text-align: left;width: 100px;">Ciudad:
                                                                            </dt>
                                                                            <dd style="margin-left: 50px">{{$sede->ciudad}}</dd>

                                                                            <dt style="text-align: left;width: 100px;">Dirección:
                                                                            </dt>
                                                                            <dd style="margin-left: 50px">{{$sede->direccion}}</dd>

                                                                            <dt style="text-align: left;width: 100px;">Barrio:
                                                                            </dt>
                                                                            <dd style="margin-left: 50px">{{$sede->barrio}}</dd>

                                                                            <dt style="text-align: left;width: 100px;">Zona/Ruta:
                                                                            </dt>
                                                                            <dd style="margin-left: 50px">{{$sede->zona_ruta}}</dd>
                                                                        </dl>
                                                                    </div>
                                                                    <div class="col-lg-6">

                                                                        <dl class=" dl-horizontal">
                                                                            <dt style="text-align: left;width: 100px;">Contacto:
                                                                            </dt>
                                                                            <dd style="margin-left: 100px">{{$sede->nombre_contacto}}</dd>

                                                                            <dt style="text-align: left;width: 100px;">Celular:
                                                                            </dt>
                                                                            <dd style="margin-left: 100px">{{$sede->celular_contacto}}</dd>

                                                                            <dt style="text-align: left;width: 100px;">Email:
                                                                            </dt>
                                                                            <dd style="margin-left: 100px">{{$sede->email_contacto}}</dd>

                                                                            <dt style="text-align: left;width: 100px;">Teléfono:
                                                                            </dt>
                                                                            <dd style="margin-left: 100px">{{$sede->telefono_contacto}}</dd>
                                                                        </dl>
                                                                    </div>
                                                                </div>

                                                                <div class="m-t-sm">
                                                                    <a href="#" class="stat-percent font-bold text-navy"
                                                                        data-toggle="modal" data-target="#modal-edit-sedes-{{$sede->id}}">
                                                                        <i class="fa fa-edit"></i>Editar información</a>

                                                                </div>

                                                                <div class="modal inmodal fade" id="modal-edit-sedes-{{$sede->id}}"
                                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button id="btn-close-cotization" type="button"
                                                                                    class="close" data-dismiss="modal">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    <span class="sr-only">Close</span>
                                                                                </button>
                                                                                <h4 class="modal-title">Editar Sede</h4>
                                                                            </div>

                                                                            <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                                                                                <div class="row">

                                                                                <input type="hidden" id="id_sede-{{$loop->index}}" 
                                                                                        value="{{$sede->id}}">

                                                                                    <div class="form-group col-lg-6"><label
                                                                                            class="control-label">Nombre
                                                                                            *</label>
                                                                                        <input style="text-transform: uppercase"
                                                                                            type="text" id="nombre_sedes-{{$loop->index}}"
                                                                                            placeholder="Ej: Norte, C.C. Unicentro, Salomia..."
                                                                                            class="form-control" value="{{$sede->nombre}}">
                                                                                    </div>

                                                                                    <div class="form-group col-lg-6"><label
                                                                                            class="control-label">Dirección
                                                                                            *</label>
                                                                                        <input style="text-transform: uppercase"
                                                                                            type="text" id="direccion_sedes-{{$loop->index}}"
                                                                                            placeholder="Escriba la dirección"
                                                                                            class="form-control" value="{{$sede->direccion}}">
                                                                                    </div>

                                                                                    <div class="form-group col-lg-6"><label
                                                                                            class="control-label">Ciudad
                                                                                            *</label>
                                                                                        <input style="text-transform: uppercase"
                                                                                            type="text" id="ciudad_sedes-{{$loop->index}}"
                                                                                            placeholder="Escriba la ciudad"
                                                                                            class="form-control" value="{{$sede->ciudad}}">
                                                                                    </div>

                                                                                    <div class="form-group col-lg-6"><label
                                                                                            class="control-label">Barrio
                                                                                            *</label>
                                                                                        <input style="text-transform: uppercase"
                                                                                            type="text" id="barrio_sedes-{{$loop->index}}"
                                                                                            placeholder="Escriba el Barrio"
                                                                                            class="form-control" value="{{$sede->barrio}}">
                                                                                    </div>

                                                                                    <div class="form-group col-lg-6"><label
                                                                                            class="control-label">Zona/Ruta
                                                                                            *</label>
                                                                                        <input style="text-transform: uppercase"
                                                                                            type="text" id="ruta_sedes-{{$loop->index}}"
                                                                                            placeholder="Zona Ruta"
                                                                                            class="form-control" value="{{$sede->zona_ruta}}">
                                                                                    </div>

                                                                                    <div class="form-group col-lg-6"><label
                                                                                            class="control-label">Nombre
                                                                                            de
                                                                                            Contacto *</label>
                                                                                        <input style="text-transform: uppercase"
                                                                                            type="text" id="nombre_contacto-{{$loop->index}}"
                                                                                            placeholder="Nombre del contacto o cliente"
                                                                                            class="form-control" value="{{$sede->nombre_contacto}}">
                                                                                    </div>

                                                                                    <div class="form-group col-lg-6"><label
                                                                                            class="control-label">Teléfono
                                                                                        </label>
                                                                                        <input style="text-transform: uppercase"
                                                                                            type="text" id="telefono_sedes-{{$loop->index}}"
                                                                                            placeholder="Teléfono del contacto o cliente"
                                                                                            class="form-control" value="{{$sede->telefono_contacto}}">

                                                                                    </div>

                                                                                    <div class="form-group col-lg-6"><label
                                                                                            class="control-label">Celular
                                                                                            *</label>
                                                                                        <input style="text-transform: uppercase"
                                                                                            type="text" id="celular_sedes-{{$loop->index}}"
                                                                                            placeholder="Celular del contacto"
                                                                                            class="form-control" value="{{$sede->celular_contacto}}">
                                                                                    </div>

                                                                                    <div class="form-group col-lg-6"><label
                                                                                            class="control-label">Email
                                                                                            *</label>
                                                                                        <input style="text-transform: uppercase"
                                                                                            type="email" id="email_sedes-{{$loop->index}}"
                                                                                            placeholder="Email de contacto"
                                                                                            class="form-control" value="{{$sede->email_contacto}}">

                                                                                    </div>

                                                                                    <div class="form-group col-lg-12">
                                                                                        <br>
                                                                                        <strong>Nota: </strong>Diligencia
                                                                                        el formulario de Sede si la
                                                                                        empresa
                                                                                        tiene mas
                                                                                        sedes además de la principal,
                                                                                        en
                                                                                        caso contrario no llenar este
                                                                                        modal.
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button style="margin-bottom: 0;" type="button"
                                                                                    id="btn-close-sedes" class="btn btn-white"
                                                                                    data-dismiss="modal">Cerrar</button>
                                                                                <button type="button"
                                                                                    class="btn btn-primary btn-update-sedes" onclick="dataSede({{$loop->index}})">Guardar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>

                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="tab-3">
                                            <div class="row">
                                                @if(isset($cliente[0]->inspeccion))
                                                    @foreach($cliente[0]->inspeccion as $inspeccion)
                                                    <div class="col-lg-6" style="padding: 0 30px">
                                                        <h5>Solicitud</h5>
                                                        <h1 class="no-margins">{{$inspeccion->codigo}}</h1>
                                                        <a href="/solicitud/{{$inspeccion->id}}/edit" class="stat-percent font-bold text-navy">Editar solicitud <i class="fa fa-edit"></i></a>
                                                        <strong>Creación: </strong><small>{{$inspeccion->created_at}}</small>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                @foreach($cliente[0]->solicitudes as $solicitud)
                                                <div class="col-lg-6" style="padding: 0 30px">
                                                    <h5>Inspección</h5>
                                                    <h1 class="no-margins">{{$solicitud->codigo}}</h1>
                                                    <a href="/inspeccion/{{$solicitud->id}}/edit" class="stat-percent font-bold text-navy">Editar inspección <i class="fa fa-edit"></i></a>
                                                    <strong>Creación: </strong><small>{{$solicitud->created_at}}</small>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-4">
                                            <div class="row">
                                                @if(isset($cliente[0]->cotizacion))
                                                @foreach($cliente[0]->cotizacion as $cotizacion)
                                                <div class="col-lg-5" style="padding: 0 30px">
                                                    <h5 style="width:30%;display:inline-block">Cotización</h5><span
                                                        class="badge badge-default">{{$cotizacion->estado}}</span>
                                                    <h1 class="no-margins">{{$cotizacion->codigo}}</h1>
                                                    <a href="javascript: optionCotization({{$cotizacion->id}})" class="stat-percent font-bold text-navy">Marcar
                                                        como aprobada <i class="fa fa-edit"></i></a>
                                                    <strong>Creación: </strong><small>{{$cotizacion->created_at}}</small>
                                                </div>
                                                @endforeach
                                                @else
                                                <div></div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-5">
                                            <div class="row">
                                                @if($cliente[0]->solicitudes->count() != 0)
                                                @foreach($cliente[0]->solicitudes as $solicitud)
                                                    @foreach($solicitud->certificados as $certificado)
                                                            <div class="col-lg-6 " style="padding: 0 30px">
                                                                <h5>Certificado</h5>
                                                                <dl class="dl-horizontal no-margins">
                                                                    <dt style="text-align:left;width: 30%;">Sede:</dt>
                                                                    @if($cliente[0]->sedes->count() == 0)
                                                                        <dd style="text-align:left;margin-left:0"><span>Sede Única</span></dd>    
                                                                    @else
                                                                        @foreach ($cliente[0]->sedes as $sede)
                                                                            @if($solicitud->sede_id == $sede->id)
                                                                                <dd style="text-align:left;margin-left:0"><span>{{$sede->nombre}}</span></dd>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </dl>
                                                                <dl class="dl-horizontal no-margins">
                                                                    <dt style="text-align:left;width: 30%;">Frecuencia:</dt>
                                                                    <dd style="text-align:left;margin-left:0"><span>{{$certificado->frecuencia}}</span></dd>
                                                                </dl>
                                                                <dl class="dl-horizontal no-margins">
                                                                    <dt style="text-align:left;width: 30%;">Area Tratada:</dt>
                                                                    <dd style="text-align:left;margin-left:0"><span>{{$certificado->area_tratada}}</span></dd>
                                                                </dl>
                                                                <dl class="dl-horizontal ">
                                                                    @foreach($certificado->tratamientos as $tratamiento)
                                                                    <dt style="text-align:left;width: 30%;">Tratamiento
                                                                        {{$loop->index + 1 }}:</dt>
                                                                    <dd style="text-align:left;margin-left:0"><span>{{$tratamiento}}
                                                                        </span></dd>
                                                                    @endforeach
                                                                </dl>
                                                                <strong>Creación: </strong><small>{{$certificado->created_at}}</small>
                                                                <a href="javascript: deleteCertificate({{$certificado->id}})"
                                                                    class="stat-percent font-bold text-navy">Eliminar <i class="fa fa-edit"></i></a>
                                                            </div>
                                                    @endforeach
                                                @endforeach
                                                @else
                                                    <div></div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-6">
                                            <div class="row">
                                                @if($cliente[0]->solicitudes->count() != 0)
                                                    @if($cliente[0]->solicitudes[0]->rutas->count() != 0)
                                                        @foreach ($cliente[0]->solicitudes[0]->rutas as $ruta)
                                                        <div class="col-lg-6 " style="padding: 0 30px;margin-bottom: 15px;">
                                                            <h5>{{$ruta->tipo}}</h5>
                                                            <b>R<b style="text-transform: lowercase">{{ substr($ruta->tipo,
                                                                    1)}}</b> </b>
                                                            <h1 class="no-margins">{{$ruta->codigo}}</h1>
                                                            <strong>Creación: </strong><small>{{$ruta->created_at}}</small>
                                                            <a href="javascript: deleteRoute({{$ruta->id}})" class="stat-percent font-bold text-navy">Eliminar
                                                                <i class="fa fa-edit"></i></a>
                                                        </div>
                                                        @endforeach
                                                    @else
                                                    <div></div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-7">
                                            <div id="temporales">
                                                <novedades-temporales></novedades-temporales>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3" id="documentos">
            @if (Auth::user()->area_id == '4' || Auth::user()->area_id == '6')
            <documentos></documentos>

            <div class="ibox">
                <div class="ibox-content">
                    <h2>Generación de Documentos</h2>
                    <small>Creación de certificados.</small>
                    <hr style="margin-top: 8px; margin-bottom: 8px;">
                    <button type="button" class="btn btn-primary btn-block btn-outline" data-toggle="modal" data-target="#modal-create-cert">Certificados</button>
                    {{-- <button type="button" class="btn btn-primary btn-block btn-outline" data-toggle="modal" data-target="#modal-create-route-s">Ruta
                        de saneamiento</button>
                    <button type="button" class="btn btn-primary btn-block btn-outline" data-toggle="modal" data-target="#modal-create-route-l">Ruta
                        de lámparas</button>
                    <button type="button" class="btn btn-primary btn-block btn-outline" data-toggle="modal" data-target="#modal-create-route-r">Ruta
                        de roedores</button> --}}
                </div>
            </div>
            @endif

            <!--===================================================
            /* Modal Editar Cliente
            ====================================================-->
            <div class="modal inmodal fade" id="modal-update-cliente" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        {!! Form::open(array('route' => ['clientes.updateCliente', $cliente[0] -> id], 'method' =>
                        'POST',
                        'autocomplete' => 'on')) !!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Editar Cliente</h4>
                        </div>
                        <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                            <div class="row">

                                <div class="form-group col-sm-12 col-md-12">
                                    <label>Razon Social/Nombre: </label>
                                    <input style="text-transform: uppercase" type="text" class="form-control" id="nombre_cliente"
                                        name="nombre_cliente" value="{{$cliente[0]->nombre_cliente}}">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Nombre Comercial </label>
                                    <input style="text-transform: uppercase" type="text" name="razon_social"
                                        placeholder="Nombre comercial del cliente/empresa" class="form-control" value="{{$cliente[0]->razon_social}}">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Tipo de Cliente: </label>
                                    <select class="form-control" id="tipo_cliente" name="tipo_cliente">
                                        @if($cliente[0]->tipo_cliente == 'Persona Natural')
                                        <option value="Persona Natural" selected>PERSONA NATURAL</option>
                                        <option value="Persona Juridica">PERSONA JURIDICA</option>
                                        @else
                                        <option value="Persona Natural">PERSONA NATURAL</option>
                                        <option value="Persona Juridica" selected>PERSONA JURIDICA</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Estado de Cliente: </label>
                                    <select class="form-control" id="estado_negociacion" name="estado_negociacion">
                                        @if($cliente[0]->estado_negociacion == 'Prospecto')
                                        <option value="Prospecto" selected>PROSPECTO</option>
                                        <option value="Cliente">CLIENTE</option>
                                        @else
                                        <option value="Prospecto">PROSPECTO</option>
                                        <option value="Cliente" selected>CLIENTE</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>NIT: </label>
                                    <input style="text-transform: uppercase" type="text" min="0" class="form-control"
                                        id="nit_cedula" name="nit_cedula" value="{{$cliente[0]->nit_cedula}}" {{ Auth::user()->cargo_id == '8' || Auth::user()->cargo_id == '6' ? '' : 'readonly'}}>
                                </div>


                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Sector Económico: </label>
                                    <input style="text-transform: uppercase" type="text" class="form-control" id="sector_economico"
                                        name="sector_economico" value="{{$cliente[0]->sector_economico}}">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Municipio: </label>
                                    <input style="text-transform: uppercase" type="text" class="form-control" id="municipio"
                                        name="municipio" value="{{$cliente[0]->municipio}}">
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Dirección: </label>
                                    <input style="text-transform: uppercase" type="text" class="form-control" id="direccion"
                                        name="direccion" value="{{$cliente[0]->direccion}}">
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Barrio: </label>
                                    <input style="text-transform: uppercase" type="text" class="form-control" id="barrio"
                                        name="barrio" value="{{$cliente[0]->barrio}}">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Zona: </label>
                                    <input style="text-transform: uppercase" type="text" class="form-control" id="zona"
                                        name="zona" value="{{$cliente[0]->zona}}">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Teléfono principal*</label>
                                    <input style="text-transform: uppercase" type="text" name="telefono[0]" placeholder="Teléfono principal"
                                class="form-control" value="{{ $cliente[0]->telefonos->count() != 0 ? $cliente[0]->telefonos[0]->numero : '' }}" required>
                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Contacto Inicial *</label>
                                    <input style="text-transform: uppercase" type="text" name="nombre_contacto_inicial"
                                        placeholder="Nombre del contacto inicial" class="form-control" value="{{$cliente[0]->nombre_contacto_inicial}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Cargo </label>
                                    <input style="text-transform: uppercase" type="text" name="cargo_contacto_inicial"
                                        placeholder="Cargo del contacto inicial" class="form-control" value="{{$cliente[0]->cargo_contacto_inicial}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Celular </label>
                                    <input style="text-transform: uppercase" type="text" name="celular_contacto_inicial"
                                        placeholder="celular del contacto inicial" class="form-control" value="{{$cliente[0]->celular_contacto_inicial}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Email </label>
                                    <input style="text-transform: uppercase" type="text" name="email_contacto_inicial"
                                        placeholder="email del contacto inicial" class="form-control" value="{{$cliente[0]->email_contacto_inicial}}">

                                </div>


                                <div class="form-group col-lg-3"><label class="control-label">Contacto Técnico *</label>
                                    <input style="text-transform: uppercase" type="text" name="nombre_contacto_tecnico"
                                        placeholder="nombre del contacto técnico" class="form-control" value="{{$cliente[0]->nombre_contacto_tecnico}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Cargo </label>
                                    <input style="text-transform: uppercase" type="text" name="cargo_contacto_tecnico"
                                        placeholder="cargo del contacto técnico" class="form-control" value="{{$cliente[0]->cargo_contacto_tecnico}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Celular </label>
                                    <input style="text-transform: uppercase" type="text" name="celular_contacto_tecnico"
                                        placeholder="celular del contacto técnico" class="form-control" value="{{$cliente[0]->celular_contacto_tecnico}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Email </label>
                                    <input style="text-transform: uppercase" type="text" name="email_contacto_tecnico"
                                        placeholder="email del contacto técnico" class="form-control" value="{{$cliente[0]->email_contacto_tecnico}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Contacto Fac. E. *</label>
                                    <input style="text-transform: uppercase" type="text" name="nombre_contacto_facturacion"
                                        placeholder="Nombre del contacto de facturación" class="form-control" value="{{$cliente[0]->nombre_contacto_facturacion}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Cargo </label>
                                    <input style="text-transform: uppercase" type="text" name="cargo_contacto_facturacion"
                                        placeholder="cargo del contacto de facturación" class="form-control" value="{{$cliente[0]->cargo_contacto_facturacion}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Celular </label>
                                    <input style="text-transform: uppercase" type="text" name="celular_contacto_facturacion"
                                        placeholder="celular del contacto de facturación" class="form-control" value="{{$cliente[0]->celular_contacto_facturacion}}">

                                </div>

                                <div class="form-group col-lg-3"><label class="control-label">Email </label>
                                    <input style="text-transform: uppercase" type="text" name="email_contacto_facturacion"
                                        placeholder="email del contacto de facturación" class="form-control" value="{{$cliente[0]->email_contacto_facturacion}}">

                                </div>

                                <div class="form-group col-lg-12"><label class="control-label">Empresa de fumigación
                                        actualmente *</label>
                                    <input style="text-transform: uppercase" type="text" name="empresa_actual"
                                        placeholder="Empresa que le presta los servicios de fumigación" class="form-control"
                                        value="{{$cliente[0]->empresa_actual}}">

                                </div>

                                <div class="form-group col-lg-12" nombre_>
                                    <label>Razón del cambio</label>
                                    <input style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las razones por la cual escogio el cliente a Sanicontrol como su empresa para prestar los servicios de fumigación."
                                        name="razon_cambio" value="{{$cliente[0]->razon_cambio}}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="control-label">Medio por el cual se entero de nuestro servicio</label>
                                    <input style="text-transform: uppercase" type="text" name="medio_contacto"
                                        placeholder="Medio por el cual se enteró" class="form-control" value="{{$cliente[0]->medio_contacto}}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="control-label">Otro ¿Cúal?</label>
                                    <input style="text-transform: uppercase" type="text" name="otro" placeholder="Otros medios"
                                        class="form-control" value="{{$cliente[0]->otro_medio}}">
                                    <br>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!--===================================================
            /* Modal Añadir Sede
            ====================================================-->
            <div class="modal inmodal fade" id="modal-create-sede" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button id="btn-close-cotization" type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Añadir Sede</h4>
                        </div>
                        <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                            <div class="row">
                                <div class="form-group col-lg-6"><label class="control-label">Nombre *</label>
                                    <input style="text-transform: uppercase" type="text" id="nombre_sedes_nueva"
                                        placeholder="Ej: Norte, C.C. Unicentro, Salomia..." class="form-control">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                    <input style="text-transform: uppercase" type="text" id="direccion_sedes_nueva"
                                        placeholder="Escriba la dirección" class="form-control">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                    <input style="text-transform: uppercase" type="text" id="ciudad_sedes_nueva"
                                        placeholder="Escriba la ciudad" class="form-control">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                    <input style="text-transform: uppercase" type="text" id="barrio_sedes_nueva"
                                        placeholder="Escriba el Barrio" class="form-control">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Zona/Ruta *</label>
                                    <input style="text-transform: uppercase" type="text" id="ruta_sedes_nueva"
                                        placeholder="Zona Ruta" class="form-control">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Nombre de Contacto *</label>
                                    <input style="text-transform: uppercase" type="text" id="nombre_contacto_nueva"
                                        placeholder="Nombre del contacto o cliente" class="form-control">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                    <input style="text-transform: uppercase" type="text" id="telefono_sedes_nueva"
                                        placeholder="Teléfono del contacto o cliente" class="form-control">

                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                    <input style="text-transform: uppercase" type="text" id="celular_sedes_nueva"
                                        placeholder="Celular del contacto" class="form-control">
                                </div>

                                <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                    <input style="text-transform: uppercase" type="email" id="email_sedes_nueva"
                                        placeholder="Email de contacto" class="form-control">

                                </div>

                                <div class="form-group col-lg-12">
                                    <br>
                                    <strong>Nota: </strong>Diligencia el formulario de Sede si la empresa tiene mas
                                    sedes además de la principal, en caso contrario no llenar este modal.
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button style="margin-bottom: 0;" type="button" id="btn-close-sedes" class="btn btn-white"
                                data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn-save-sedes" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--===================================================
            /* Modal Crear Cotizacion
            ====================================================-->
            <div class="modal inmodal fade" id="modal-create-cotizacion" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['id' =>'form-certificate']) !!}
                        <div class="modal-header">
                            <button id="btn-close-cotization" type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Creación de Cotizacion</h4>
                        </div>
                        <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                            <div class="row">

                                <input type="hidden" id="cliente-cotizacion" value="{{$cliente[0]->id}}">

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Código:</label>
                                    <input style="text-transform: uppercase" type="text" class="form-control" id="codigo-cotizacion"
                                        min="0">
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Estado de la Cotización: </label>
                                    <select class="form-control" id="estado-cotizacion" name="cliente-sede" style="background-color: #fff;">
                                        <option value="Inicial">INICIAL</option>
                                        <option value="Final">FINAL</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Valor Acordado:</label>
                                    <input type="text" class="form-control" id="valor-cotizacion" >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn-save-cotizacion" class="btn btn-primary">Guardar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!--===================================================
            /* Modal Crear Certificados
            ====================================================-->
            <div class="modal inmodal fade" id="modal-create-cert" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['id' =>'form-certificate']) !!}
                        <div class="modal-header">
                            <button id="btn-close-certificate" type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Creación de Certificados</h4>
                        </div>
                        <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Cliente/Sede: </label>
                                    <select class="form-control" id="cliente-certificado" name="cliente-sede" style="background-color: #fff;">
                                        @if(count($cliente[0]->sedes) == 0)
                                        <option value="{{$cliente[0]->id.',0'}}">{{$cliente[0]->nombre_cliente}}</option>
                                        @else
                                        @foreach($cliente[0]->sedes as $sede)
                                        <option value="{{$cliente[0]->id.",".$sede->id}}">{{$sede->nombre}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Área Tratada:</label>
                                    <input style="text-transform: uppercase" type="text" class="form-control" id="area-tratada">
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Frecuencia de servicios: </label>
                                    <select class="form-control" id="frecuencia-certificado" name="cliente-sede" style="background-color: #fff;">
                                        <option value="Mensual">MENSUAL</option>
                                        <option value="Ocasional">OCASIONAL</option>
                                        <option value="Semanal">SEMANAL</option>
                                        <option value="Bimensual">BIMENSUAL</option>
                                        <option value="Trimestral">TRIMESTRE</option>
                                        <option value="Semestral">SEMESTRE</option>
                                        <option value="Anual">ANUAL</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="row">
                                        <div class="col-sm-8 col-md-7">
                                            <h3>Tratamientos realizados</h3>
                                        </div>
                                        <div class="col-sm-4 col-md-5">
                                            <button id="btn-add-service" type="button" class="btn btn-primary pull-right"
                                                style="position: relative; display: inline-block;"><span class="bold">Añadir
                                                    tratamientos &nbsp;</span><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="row" id="columna-tratamientos" style="margin-top: 15px;">

                                        <div class="form-group col-sm-12 col-md-4">
                                            <select class="form-control" id="tratamiento-0" style="background-color: #fff;">
                                                <option value="Desinsectacion">DESINSECTACION</option>
                                                <option value="Desratizacion">DESRATIZACION</option>
                                                <option value="Desinfeccion">DESINFECCION</option>
                                                <option value="Gasificacion">GASIFICACION</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-8 col-md-7">
                                            <h3>Descripción de productos</h3>
                                        </div>
                                        <div class="col-sm-4 col-md-5">
                                            <button id="btn-add-product" type="button" class="btn btn-primary pull-right"
                                                style="position: relative; display: inline-block;"><span class="bold">Añadir
                                                    productos &nbsp;</span><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="row" id="columna-productos" style="margin-top: 15px;">

                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Producto utilizado</label>
                                            <select class="form-control" id="producto-0" style="background-color: #fff;">
                                                <option value="Insecticida">INSECTICIDA</option>
                                                <option value="Piretroide">PIRETOIDE</option>
                                                <option value="Roenticida">ROENTICIDA</option>
                                                <option value="Trampas">TRAMPAS</option>
                                                <option value="Desinfectante">DESINFECTANTE</option>
                                                <option value="Detiagas">DETIAGAS</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Nombre comercial</label>
                                            <input style="text-transform: uppercase" type="text" id="nombre-comercial-0"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Nivel de Toxicidad</label>
                                            <select class="form-control" id="toxicidad-0" style="background-color: #fff;">
                                                <option value="1">I</option>
                                                <option value="2">II</option>
                                                <option value="3">III</option>
                                                <option value="0">NINGUNO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn-save-certificate" class="btn btn-primary">Guardar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!--===================================================
            /* Modal Crear Ruta de Saneamiento
            ====================================================-->
            <div class="modal inmodal fade" id="modal-create-route-s" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['id' =>'form-rs']) !!}
                        <div class="modal-header">
                            <button id="btn-close-rs" type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Creación de Ruta de Saneamiento</h4>
                        </div>
                        <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>Cliente/Sede: </label>
                                    <select class="form-control" id="cliente-rs" style="background-color: #fff;">
                                        @if(count($cliente[0]->sedes) == 0)
                                        <option value="{{$cliente[0]->id.",0"}}">{{$cliente[0]->nombre_cliente}}</option>
                                        @else
                                        @foreach($cliente[0]->sedes as $sede)
                                        <option value="{{$cliente[0]->id.",".$sede->id}}">{{$sede->nombre}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8 col-md-7">
                                    <h3>Áreas</h3>
                                </div>
                                <div class="col-sm-4 col-md-5">
                                    <button id="btn-add-area" type="button" class="btn btn-primary pull-right" style="position: relative; display: inline-block;"><span
                                            class="bold">Añadir áreas &nbsp;</span><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="row" id="columna-areas" style="margin-top: 15px;">

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Nombre del área</label>
                                    <input type="text" id="area-0" class="form-control">
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Frecuencia</label>
                                    <select class="form-control" id="frecuencia-area-0" style="background-color: #fff;">
                                        <option value="Mensual">MENSUAL</option>
                                        <option value="Ocasional">OCASIONAL</option>
                                        <option value="Semanal">SEMANAL</option>
                                        <option value="Bimensual">BIMENSUAL</option>
                                        <option value="Trimestral">TRIMESTRE</option>
                                        <option value="Semestral">SEMESTRE</option>
                                        <option value="Anual">ANUAL</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn-save-rs" class="btn btn-primary">Guardar Ruta</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


            <!--===================================================
            /* Modal Crear Ruta de Lamparas
            ====================================================-->
            <div class="modal inmodal fade" id="modal-create-route-l" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['id' =>'form-rl']) !!}
                        <div class="modal-header">
                            <button id="btn-close-rl" type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Creación de Ruta de lámparas</h4>
                        </div>
                        <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>Cliente/Sede: </label>
                                    <select class="form-control" id="cliente-rl" style="background-color: #fff;">
                                        @if(count($cliente[0]->sedes) == 0)
                                        <option value="{{$cliente[0]->id.",0"}}">{{$cliente[0]->nombre_cliente}}</option>
                                        @else
                                        @foreach($cliente[0]->sedes as $sede)
                                        <option value="{{$cliente[0]->id.",".$sede->id}}">{{$sede->nombre}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8 col-md-7">
                                    <h3>Áreas de ubicación de lámparas</h3>
                                </div>
                                <div class="col-sm-4 col-md-5">
                                    <button id="btn-add-area-lamp" type="button" class="btn btn-primary pull-right"
                                        style="position: relative; display: inline-block;"><span class="bold">Añadir
                                            áreas &nbsp;</span><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="row" id="columna-areas-lamparas" style="margin-top: 15px;">

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Nombre del área</label>
                                    <input type="text" id="area-lampara-0" class="form-control">
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Tipo de lámpara</label>
                                    <select class="form-control" id="tipo-lampara-0" style="background-color: #fff;">
                                        <option value="lamina">Con lámina adhesiva</option>
                                        <option value="electroconductora">Electroconductora</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn-save-rl" class="btn btn-primary">Guardar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


            <!--===================================================
            /* Modal Crear Ruta de Roedores
            ====================================================-->
            <div class="modal inmodal fade" id="modal-create-route-r" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['id' =>'form-rr']) !!}
                        <div class="modal-header">
                            <button id="btn-close-rr" type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Creación de Ruta de Roedores</h4>
                        </div>
                        <div class="modal-body ibox-content" style="padding: 20px 30px 15px 30px;">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label>Cliente/Sede: </label>
                                    <select class="form-control" id="cliente-rr" style="background-color: #fff;">
                                        @if(count($cliente[0]->sedes) == 0)
                                        <option value="{{$cliente[0]->id.",0"}}">{{$cliente[0]->nombre_cliente}}</option>
                                        @else
                                        @foreach($cliente[0]->sedes as $sede)
                                        <option value="{{$cliente[0]->id.",".$sede->id}}">{{$sede->nombre}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 b-r">
                                    <div class="row">
                                        <div class="col-sm-8 col-md-7">
                                            <h3>Áreas Externas</h3>
                                        </div>
                                        <div class="col-sm-4 col-md-5">
                                            <button id="btn-add-area-ext" type="button" class="btn btn-primary pull-right"
                                                style="position: relative; display: inline-block;"><span class="bold">Añadir
                                                    áreas &nbsp;</span><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="row" id="columna-areas-externas" style="margin-top: 15px;">

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>Nombre del área</label>
                                            <input type="text" id="area-externa-0" class="form-control">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>Tipo de trampa</label>
                                            <select class="form-control" id="tipo-trampa-ae-0" style="background-color: #fff;">
                                                <option value="Adhesiva">Adhesiva</option>
                                                <option value="Cebo">Cebo</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 b-r">
                                    <div class="row">
                                        <div class="col-sm-8 col-md-7">
                                            <h3>Áreas Internas</h3>
                                        </div>
                                        <div class="col-sm-4 col-md-5">
                                            <button id="btn-add-area-int" type="button" class="btn btn-primary pull-right"
                                                style="position: relative; display: inline-block;"><span class="bold">Añadir
                                                    áreas &nbsp;</span><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="row" id="columna-areas-internas" style="margin-top: 15px;">

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>Nombre del área</label>
                                            <input type="text" id="area-interna-0" class="form-control">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>Tipo de trampa</label>
                                            <select class="form-control" id="tipo-trampa-ai-0" style="background-color: #fff;">
                                                <option value="Adhesiva">Adhesiva</option>
                                                <option value="Cebo">Cebo</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn-save-rr" class="btn btn-primary">Guardar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('ini-scripts')
<!-- Sweet Alert -->
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script src="{{asset('js/plugins/autonumeric/autonumeric.js')}}"></script>
<script>


    var idCliente = window.location.pathname.split("/")[2]

    //Inicializacion de Contadores
    var contTratamientos = 1;
    var contProductos = 1;
    var contAreas = 1;
    var contAreaExt = 1;
    var contAreaInt = 1;
    var contAreasLampara = 1;
    var auInnput;
    var dataSedesUpdate = null

    function dataSede(id){
        dataSedesUpdate = {
                id_sede: $(`#id_sede-${id.toString()}`).val(),
                nombre_sedes: $(`#nombre_sedes-${id.toString()}`).val(),
                direccion_sedes: $(`#direccion_sedes-${id.toString()}`).val(),
                ciudad_sedes: $(`#ciudad_sedes-${id.toString()}`).val(),
                barrio_sedes: $(`#barrio_sedes-${id.toString()}`).val(),
                ruta_sedes: $(`#ruta_sedes-${id.toString()}`).val(),
                nombre_contacto: $(`#nombre_contacto-${id.toString()}`).val(),
                telefono_sedes: $(`#telefono_sedes-${id.toString()}`).val(),
                celular_sedes: $(`#celular_sedes-${id.toString()}`).val(),
                email_sedes: $(`#email_sedes-${id.toString()}`).val(),
                //cliente_id: parseInt({{ $cliente[0] -> id }})
            };
    }


    $(document).ready(() => {
        //Inicializacion del plugin para input de numeros
        auInnput = new AutoNumeric(document.getElementById('valor-cotizacion'),{
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })



        $(".btn-update-sedes").click(event => {


            let crsfToken = document.getElementsByName("_token")[0].value;

            swal({
                title: "¡Advertencia!",
                text: "¿Estás seguro de guardar esta sede?",
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
            }).then(isConfirm => {
                if (isConfirm) {
                    $.ajax({
                        url: `/sedes/${dataSedesUpdate.id_sede}`,
                        data: dataSedesUpdate,
                        type: 'PUT',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: (res) => {
                            console.log(res)
                        },
                        error: (err) => {
                            console.log(err);
                        }
                    }).then(events => {
                        swal("¡Creación Correcta!", "Sede guardada con éxito.", "success")
                            .then(value => { //Boton OK actualizado
                                if (value) {
                                    window.location.reload();
                                    $("#btn-close-sedes").click();
                                }
                            })
                    })
                        .catch(error => {
                            swal("¡Error!", "Campos Incorrectos", "error")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        $("#btn-close-sedes").click();
                                    }
                                })
                        })
                }
            })
        });

        $("#btn-save-sedes").click(event => {
            let dataSedes = {
                nombre_sedes: $("#nombre_sedes_nueva").val(),
                direccion_sedes: $("#direccion_sedes_nueva").val(),
                ciudad_sedes: $("#ciudad_sedes_nueva").val(),
                barrio_sedes: $("#barrio_sedes_nueva").val(),
                ruta_sedes: $("#ruta_sedes_nueva").val(),
                nombre_contacto: $("#nombre_contacto_nueva").val(),
                telefono_sedes: $("#telefono_sedes_nueva").val(),
                celular_sedes: $("#celular_sedes_nueva").val(),
                email_sedes: $("#email_sedes_nueva").val(),
                cliente_id: idCliente
            };

            console.log(dataSedes);
            let crsfToken = document.getElementsByName("_token")[0].value;

            swal({
                title: "¡Advertencia!",
                text: "¿Estás seguro de guardar esta sede?",
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
            }).then(isConfirm => {
                if (isConfirm) {
                    $.ajax({
                        url: `/sedes`,
                        data: dataSedes,
                        type: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: (res) => {
                            console.log(res)
                        },
                        error: (err) => {
                            console.log(err);
                        }
                    }).then(events => {
                        swal("¡Creación Correcta!", "Sede guardada con éxito.", "success")
                            .then(value => { //Boton OK actualizado
                                if (value) {
                                    $("#btn-close-sedes").click();
                                    window.location.reload();
                                }
                            })
                    })
                        .catch(error => {
                            swal("¡Error!", "Campos Incorrectos", "error")
                        })
                }
            })
        });

    })

    //Evento click del btn con ID
    $("#btn-add-service").click(event => {
        contTratamientos++;
        //Añade una serie de nodos dentro del componente con ID columna_principal
        $("#columna-tratamientos").append(`
            <div class="form-group col-sm-12 col-md-4">
                <select type="text" id="tratamiento-${contTratamientos - 1}" class="form-control">
                    <option value="Desinsectacion">Desinsectación</option>
                    <option value="Desratizacion">Desratización</option>
                    <option value="Desinfeccion">Desinfección</option>
                    <option value="Gasificacion">Gasificación</option>
                </select>
            </div>`);
    });

    //Evento click del btn con ID
    $("#btn-add-product").click(event => {
        contProductos++;
        //Añade una serie de nodos dentro del componente con ID columna_principal
        $("#columna-productos").append(`
            <div class="form-group col-sm-12 col-md-4">
                <label >Producto utilizado</label>
                    <select class="form-control" id="producto-${contProductos - 1}" style="background-color: #fff;" >
                        <option value="Insecticida">Insecticida</option>
                        <option value="Piretroide">Piretroide</option>
                        <option value="Roenticida">Roenticida</option>
                        <option value="Trampas">Trampas</option>
                        <option value="Desinfectante">Desinfectante</option>
                        <option value="Detiagas">Detiagas</option>
                    </select>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label >Nombre comercial</label>
                <input type="text" id="nombre-comercial-${contProductos - 1}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label >Nivel de Toxicidad</label>
                    <select class="form-control" id="toxicidad-${contProductos - 1}" style="background-color: #fff;" >
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="0">Ninguno</option>
                    </select>
            </div>
        `);
    });

    //Evento click del btn con ID
    $("#btn-add-area").click(event => {
        contAreas++;
        //Añade una serie de nodos dentro del componente con ID columna_principal
        $("#columna-areas").append(`
            <div class="form-group col-sm-12 col-md-6">
                <label >Nombre del área</label>
                <input type="text" id="area-${contAreas - 1}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label >Frecuencia</label>
                <select class="form-control" id="frecuencia-area-${contAreas - 1}"style="background-color: #fff;">
                    <option value="Mensual">Mensual</option>
                    <option value="Ocasional">Ocasional</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Bimensual">Bimensual</option>
                    <option value="Trimestral">Trimestral</option>
                    <option value="Semestral">Semestral</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>
        `);
    });

    $("#btn-add-area-lamp").click(event => {
        contAreasLampara++;
        $("#columna-areas-lamparas").append(`
            <div class="form-group col-sm-12 col-md-6">
                <label>Nombre del área</label>
                <input type="text" id="area-lampara-${contAreasLampara - 1}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>Tipo de lámpara</label>
                <select class="form-control" id="tipo-lampara-${contAreasLampara - 1}" style="background-color: #fff;">
                    <option value="Con lámina adhesiva">Con lámina adhesiva</option>
                    <option value="Electroconductora">Electroconductora</option>
                </select>
            </div>
        `)
    })

    //Evento click del btn con ID
    $("#btn-add-area-ext").click(event => {
        contAreaExt++;
        //Añade una serie de nodos dentro del componente con ID columna_principal
        $("#columna-areas-externas").append(`
            <div class="form-group col-sm-12 col-md-6">
                <label >Nombre del área</label>
                <input type="text" id="area-externa-${contAreaExt - 1}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label >Tipo de trampa</label>
                <select class="form-control" id="tipo-trampa-ae-${contAreaExt - 1}" style="background-color: #fff;">
                    <option value="Adhesiva">Adhesiva</option>
                    <option value="Cebo">Cebo</option>
                </select>
            </div>
        `);
    });

    //Evento click del btn con ID
    $("#btn-add-area-int").click(event => {
        contAreaInt++;
        //Añade una serie de nodos dentro del componente con ID columna_principal
        $("#columna-areas-internas").append(`
            <div class="form-group col-sm-12 col-md-6">
                <label >Nombre del área</label>
                <input type="text" id="area-interna-${contAreaInt - 1}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label >Tipo de trampa</label>
                <select class="form-control" id="tipo-trampa-ai-${contAreaInt - 1}" style="background-color: #fff;">
                    <option value="Adhesiva">Adhesiva</option>
                    <option value="Cebo">Cebo</option>
                </select>
            </div>
        `);
    });

    //Evento click del boton de guardar certificado
    $("#btn-save-certificate").click(event => {
        event.preventDefault();

        //Variables del formulario
        let tratamientos = [];
        let productos = [];
        let cliente = $("#cliente-certificado").val().split(',');  //Separacion del string por coma
        let clienteId = cliente[0];
        let sedeId = cliente[1];
        let crsfToken = document.getElementsByName("_token")[0].value;
        console.log(cliente)
        //Recorrido de los controles del HTML como arreglos
        for (let index = 0; index < contTratamientos; index++) {
            tratamientos[index] = $(`#tratamiento-${index}`).val();
        }
        for (let index = 0; index < contProductos; index++) {
            if ($(`#nombre-comercial-${index}`).val() != "") {
                productos[index] = {
                    producto: $(`#producto-${index}`).val(),
                    nombreComercial: $(`#nombre-comercial-${index}`).val(),
                    toxicidad: $(`#toxicidad-${index}`).val()
                }
            }
        }
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de guardar este Certificado?",
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
                if (isConfirm && $("#area-tratada").val() != "") {
                    //Petición AJAX para guardar el certificado
                    $.ajax({
                        url: '/certificados',
                        data: {
                            area_tratada: $("#area-tratada").val(),
                            frecuencia: $("#frecuencia-certificado").val(),
                            tratamientos: tratamientos,
                            productos: productos,
                            cliente_id: clienteId,
                            sede_id: sedeId
                        },
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        // error: (err) => {

                        // }
                    })
                        .then(events => {
                            swal("¡Creación Correcta!", "Certificado guardada con éxito.", "success")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        window.location.reload();
                                        $("#btn-close-certificate").click();
                                    }
                                })
                        })
                        .catch(err => {
                            swal("¡Error!", 'Solicitud a programación no encontrada.', 'error')
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        $("#btn-close-certificate").click();
                                    }
                                })
                        })
                } else if (isConfirm == null) {
                    return;

                } else {
                    swal('Información', 'Por favor, escriba el area tratada', 'info')
                }
            })
    });

    function deleteCertificate(id) {
        let crsfToken = document.getElementsByName("_token")[0].value;
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de eliminar este certificado?",
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
                        url: `/certificados/${id}`,
                        type: 'DELETE',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        }
                    })
                        .then((res) => {
                            swal("¡Eliminación Correcta!", "Certificado eliminada con éxito.", "success")
                                .then(value => { //Boton OK actualizado
                                    window.location.reload();
                                })
                        })
                        .catch((err) => {
                            swal("¡Error!", err.statusText, "error")
                                .then(value => { //Boton OK actualizado
                                    return
                                })
                        })
                }
            })
    }

    /**
     * Petición AJAX para guardar las rutas
     * @param type: Tipo de Ruta
     * @param cliente: ID del cliente
     * @param sede: ID de la sede
     * @param contenido: Areas, frecuencia, tipo de trampa o lamparas
     * @param crsfToken: Token de seguridad para validad el formulario
     * @return HTTP Response
    */
    function saveRoute(type, cliente, sede, contenido, crsfToken) {
        return $.ajax({
            url: '/rutas',
            data: {
                tipo: type,
                contenido: contenido,
                cliente_id: cliente,
                sede_id: sede
            },
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": crsfToken
            },
            success: (res) => {
                //Retorna la respuesta del servidor
                return res;
            },
            error: (err) => {
                //Retorna la respuesta del servidor
                return err;
            }
        })

    }

    /**
    * Evento Click para guardar rutas de saneamiento  
    */
    $("#btn-save-rs").click(event => {
        event.preventDefault();
        let cliente = $("#cliente-rs").val().split(',');  //Separacion del string por coma
        let clienteId = parseInt(cliente[0]);
        let sedeId = parseInt(cliente[1]);
        let contenidRutaSaneamiento = [];
        let crsfToken = document.getElementsByName("_token")[0].value;
        for (let index = 0; index < contAreas; index++) {
            contenidRutaSaneamiento[index] = {
                area: $(`#area-${index}`).val(),
                frecuencia: $(`#frecuencia-area-${index}`).val()
            };
        }
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de guardar esta ruta?",
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
                    saveRoute('rs', clienteId, sedeId, contenidRutaSaneamiento, crsfToken)
                        .then((res) => {
                            swal("¡Creación Correcta!", "Ruta guardada con éxito.", "success")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        window.location.reload()
                                        $("#btn-close-rs").click();
                                    }
                                })

                        })
                        .catch((err) => {
                            swal("¡Error!", err.statusText, "error")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        $("#btn-close-rs").click();
                                    }
                                })
                        })
                }
            })

    })

    /**
    * Evento Click para guardar rutas de lamparas  
    */
    $("#btn-save-rl").click(event => {
        event.preventDefault();
        let cliente = $("#cliente-rl").val().split(',');  //Separacion del string por coma
        let clienteId = parseInt(cliente[0]);
        let sedeId = parseInt(cliente[1]);
        let contenidoRutaLamparas = [];
        let crsfToken = document.getElementsByName("_token")[0].value;

        for (let index = 0; index < contAreas; index++) {
            contenidoRutaLamparas[index] = {
                area: $(`#area-lampara-${index}`).val(),
                tipoLampara: $(`#tipo-lampara-${index}`).val()
            };
        }
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de guardar esta ruta?",
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
                    saveRoute('rl', clienteId, sedeId, contenidoRutaLamparas, crsfToken)
                        .then((res) => {
                            swal("¡Creación Correcta!", "Ruta guardada con éxito.", "success")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        window.location.reload()
                                        $("#btn-close-rl").click();
                                    }
                                })
                        })
                        .catch((err) => {
                            swal("¡Error!", err.statusText, "error")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        $("#btn-close-rl").click();
                                    }
                                })
                        })
                }
            })
    })

    /**
    * Evento Click para guardar rutas de rutas de roedores  
    */
    $("#btn-save-rr").click(event => {
        event.preventDefault();
        let cliente = $("#cliente-rr").val().split(',');  //Separacion del string por coma
        let clienteId = parseInt(cliente[0]);
        let sedeId = parseInt(cliente[1]);
        let crsfToken = document.getElementsByName("_token")[0].value;
        let contenidoRutaRoedores = {
            rutaExterna: [],
            rutaInterna: []
        };
        //Recorre los Elementos HTML para obtener los valores de areas externas
        for (let index = 0; index < contAreaExt; index++) {
            contenidoRutaRoedores.rutaExterna[index] = {
                area: $(`#area-externa-${index}`).val(),
                tipoTrampa: $(`#tipo-trampa-ae-${index}`).val()
            };
        }

        //Recorre los Elementos HTML para obtener los valores de areas internas
        for (let index = 0; index < contAreaInt; index++) {
            contenidoRutaRoedores.rutaInterna[index] = {
                area: $(`#area-interna-${index}`).val(),
                tipoTrampa: $(`#tipo-trampa-ai-${index}`).val()
            };
        }
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de guardar esta ruta?",
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
                    saveRoute('rr', clienteId, sedeId, contenidoRutaRoedores, crsfToken)
                        .then((res) => {
                            swal("¡Creación Correcta!", "Ruta guardada con éxito.", "success")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        window.location.reload()
                                        $("#btn-close-rr").click();
                                    }
                                })
                        })
                        .catch((err) => {
                            swal("¡Error!", err.statusText, "error")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        $("#btn-close-rr").click();
                                    }
                                })
                        })
                }
            })
    })

    function deleteRoute(id) {
        let crsfToken = document.getElementsByName("_token")[0].value;
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de eliminar esta ruta?",
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
                        url: `/rutas/${id}`,
                        type: 'DELETE',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        }
                    })
                        .then((res) => {
                            swal("¡Eliminación Correcta!", "Ruta eliminada con éxito.", "success")
                                .then(value => { //Boton OK actualizado
                                    window.location.reload();
                                })
                        })
                        .catch((err) => {
                            swal("¡Error!", err.statusText, "error")
                                .then(value => { //Boton OK actualizado
                                    return
                                })
                        })
                }
            })
    }

    $("#btn-save-cotizacion").click(event => {
        event.preventDefault();
        let cotizacion = {
            estado: $("#estado-cotizacion").val(),
            valor: parseInt(auInnput.rawValue), //Toma el valor ingresado por el usuario
            idCliente: $("#cliente-cotizacion").val(),
            codigo: $("#codigo-cotizacion").val()
        };
        let crsfToken = document.getElementsByName("_token")[0].value;
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de guardar esta cotización?",
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
                        url: '/cotizaciones',
                        data: cotizacion,
                        type: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: (res) => {
                            console.log(res)
                        },
                        error: (err) => {
                            console.log(err);
                        }
                    })
                        .then(events => {
                            swal("¡Creación Correcta!", "Cotización guardada con éxito.", "success")
                                .then(value => { //Boton OK actualizado
                                    if (value) {
                                        window.location.reload()
                                        $("#btn-close-cotization").click();
                                    }
                                })
                        })
                        .catch(error => {
                            swal("¡Error!", error.statusText, "error")
                        })
                }
            })
    })

    function optionCotization(id) {
        let crsfToken = document.getElementsByName("_token")[0].value;
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro que desea aprobar esta cotización?",
            icon: "warning",
            buttons: {
                cancel: true,
                edit: {
                    text: 'Aceptar',
                    visible: true,
                    value: 'approved',
                    closeModal: false, //Muestra el Loader
                }
            }
        })
            .then(option => {
                if (option == 'approved') {
                        $.ajax({
                            url: `/cotizaciones/${id}`,
                            data: {
                                estado: 'aprobada',
                                cliente: idCliente
                            },
                            type: 'PUT',
                            headers: {
                                "X-CSRF-TOKEN": crsfToken
                            }
                        })
                            .then(res => {
                                if (res) {
                                    swal('¡Cotizacion Aprobada!', 'La cotizacion ha cambiado su estado a aprobada.', 'success')
                                    .then(val => {
                                        if(val){
                                            window.location.reload()
                                        }
                                    })
                                }
                            })
                            .catch(err => {
                                swal("¡Error!", err.statusText, "error")
                                    .then(value => { //Boton OK actualizado
                                        return
                                    })
                            })
                }
            })
    }

    function updateCotization(id) {
        let crsfToken = document.getElementsByName("_token")[0].value;
        swal({
            title: "¡Advertencia!",
            text: "¿Estás seguro de eliminar esta cotización?",
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
                        url: `/cotizaciones/${id}`,
                        type: 'DELETE',
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        }
                    })
                        .then((res) => {
                            swal("¡Eliminación Correcta!", "Cotizacion eliminada con éxito.", "success")
                                .then(value => { //Boton OK actualizado
                                    window.location.reload();
                                })
                        })
                        .catch((err) => {
                            swal("¡Error!", err.statusText, "error")
                                .then(value => { //Boton OK actualizado
                                    return
                                })
                        })
                }
            })
    }

    function openModal() {
        $("#btn-modal-edit-sedes")
    }


</script>
@endsection
@endsection