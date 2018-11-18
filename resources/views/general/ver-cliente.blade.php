@extends('layouts.app')
@section('content')
@section('custom-css')
<link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
@endsection
<script>
    document.getElementById('m-clientes').setAttribute("class", "active");
    document.getElementById('a-clientes').removeAttribute("style");
    document.getElementById('ml2-clientes').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-verClientes').setAttribute("class", "active");
</script>

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

        <div class="col-lg-9">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <a href="#" class="btn btn-warning btn-xs pull-right">Editar cliente</a>
                                <a href="#" class="btn btn-warning btn-xs pull-right" style="margin-right: 10px">Añadir
                                    Sede</a>
                                <a href="#" class="btn btn-warning btn-xs pull-right" style="margin-right: 10px">Añadir
                                    Cotización</a>
                                <h2>{{$cliente[0]->nombre_cliente}}</h2>
                            </div>
                            @if($cliente[0]->tipo_cliente == 'Persona Juridica')
                            <dl class="dl-horizontal">
                                <dt>Tipo de Cliente:</dt>
                                <dd><span class="label label-primary">{{$cliente[0]->tipo_cliente}}</span></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>NIT:</dt>
                                <dd>{{$cliente[0]->nit_cedula}}</dd>
                                <dt>Sector Económico:</dt>
                                <dd> {{$cliente[0]->sector_economico}}</dd>
                                <dt>Nombre de Contacto:</dt>
                                <dd> {{$cliente[0]->nombre_contacto}} </dd>
                                <dt>Cargo de Contacto:</dt>
                                <dd> {{$cliente[0]->cargo_contacto}} </dd>
                            </dl>
                            @else
                            <dl class="dl-horizontal">
                                <dt>Tipo de Cliente:</dt>
                                <dd><span class="label label-warning">{{$cliente[0]->tipo_cliente}}</span></dd>
                            </dl>
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
                        <div class="col-lg-6" id="cluster_info">
                            <dl class="dl-horizontal">
                                <dt>Fecha Registro:</dt>
                                <dd>{{$cliente[0]->created_at}}</dd>
                                <dt>Fecha Actualización:</dt>
                                <dd> {{$cliente[0]->updated_at}} </dd>
                                <dt>Nombre Asesor:</dt>
                                <dd> {{$cliente[0]['user']['nombres']." ".$cliente[0]['user']['apellidos']}} </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>Email:</dt>
                                <dd>{{$cliente[0]->municipio}}</dd>
                                <dt>Celular:</dt>
                                <dd>{{$cliente[0]->direccion}}</dd>
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
                                            <li class=""><a href="#tab-2" data-toggle="tab">Solicitudes</a></li>
                                            <li class=""><a href="#tab-3" data-toggle="tab">Cotizaciones</a></li>
                                            <li class=""><a href="#tab-4" data-toggle="tab">Certificados</a></li>
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
                                                                            <dd style="margin-left: 100px">{{$sede->email}}</dd>

                                                                            <dt style="text-align: left;width: 100px;">Teléfono:
                                                                            </dt>
                                                                            <dd style="margin-left: 100px">{{$sede->telefono_contacto}}</dd>
                                                                        </dl>
                                                                    </div>
                                                                </div>

                                                                <div class="m-t-sm">
                                                                    <a href="#" class="text-muted"><i class="fa fa-gift"></i>
                                                                        Editar información</a>
                                                                    |
                                                                    <a href="#" class="text-muted"><i class="fa fa-trash"></i>
                                                                        Eliminar sede</a>
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
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                @foreach($cliente[0]->solicitudes as $solicitud)
                                                <div class="col-lg-6" style="padding: 0 30px">
                                                    <h5>Solicitud</h5>
                                                    <h1 class="no-margins">{{$solicitud->codigo}}</h1>
                                                    <a class="stat-percent font-bold text-navy">Editar <i class="fa fa-edit"></i></a>
                                                    <strong>Creación: </strong><small>{{$solicitud->created_at}}</small>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-3">
                                            <div class="row">

                                                <div class="col-lg-6" style="padding: 0 30px">
                                                    <h5>Cotización</h5>
                                                    <h1 class="no-margins">CT-MO-AS-12</h1>
                                                    <a class="stat-percent font-bold text-navy">Editar <i class="fa fa-edit"></i></a>
                                                    <strong>Creación: </strong><small>2018-04-05 18:04:12</small>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-4">
                                            <div class="row">

                                                <div class="col-lg-6 " style="padding: 0 30px">
                                                    <h5>Certificado</h5>
                                                    <h1 class="no-margins">CTF-001</h1>
                                                    <a class="stat-percent font-bold text-navy">Editar <i class="fa fa-edit"></i></a>
                                                    <strong>Creación: </strong><small>2018-04-05 18:04:12</small>
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
        </div>
        <div class="col-lg-3" id="documentos">
            @if($cliente[0]->tipo_cliente == 'Persona Juridica')
            <documentos></documentos>
            @else
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Documentos</h2>
                    <small>Listado de documentos del cliente.</small>
                    <ul class="todo-list m-t small-list">
                        <li>
                            <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                                <input type="checkbox" id="checkbox">
                                <label>RUT</label>
                                <!-- <span class="badge badge-success pull-right" >E</span> -->
                            </div>
                        </li>
                        <li>
                            <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                                <input type="checkbox" id="checkbox">
                                <label>Cédula</label>
                                <!-- <span class="badge badge-success pull-right" >E</span> -->
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            @endif

            <div class="ibox">
                <div class="ibox-content">
                    <h2>Generación de Documentos</h2>
                    <small>Creación de certificados y rutas.</small>
                    <hr style="margin-top: 8px; margin-bottom: 8px;">
                    <button type="button" class="btn btn-primary btn-block btn-outline" data-toggle="modal" data-target="#modal-create-cert">Certificados</button>
                    <button type="button" class="btn btn-primary btn-block btn-outline" data-toggle="modal" data-target="#modal-create-route-s">Ruta
                        de saneamiento</button>
                    <button type="button" class="btn btn-primary btn-block btn-outline" data-toggle="modal" data-target="#modal-create-route-l">Ruta
                        de lámparas</button>
                    <button type="button" class="btn btn-primary btn-block btn-outline" data-toggle="modal" data-target="#modal-create-route-r">Ruta
                        de roedores</button>
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
                            <button type="button" class="close" data-dismiss="modal">
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
                                        <option value="{{$sede->id.",".$cliente[0]->id}}">{{$sede->nombre}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Área Tratada:</label>
                                    <input type="text" class="form-control" id="area-tratada">
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Frecuencia de servicios: </label>
                                    <select class="form-control" id="frecuencia-certificado" name="cliente-sede" style="background-color: #fff;">
                                        <option value="Mensual">Mensual</option>
                                        <option value="Ocasional">Ocasional</option>
                                        <option value="Semanal">Semanal</option>
                                        <option value="Bimensual">Bimensual</option>
                                        <option value="Trimestral">Trimestral</option>
                                        <option value="Semestral">Semestral</option>
                                        <option value="Anual">Anual</option>
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
                                                <option value="Desinsectacion">Desinsectación</option>
                                                <option value="Desratizacion">Desratización</option>
                                                <option value="Desinfeccion">Desinfección</option>
                                                <option value="Gasificacion">Gasificación</option>
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
                                                <option value="Insecticida">Insecticida</option>
                                                <option value="Piretroide">Piretroide</option>
                                                <option value="Roenticida">Roenticida</option>
                                                <option value="Trampas">Trampas</option>
                                                <option value="Desinfectante">Desinfectante</option>
                                                <option value="Detiagas">Detiagas</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Nombre comercial</label>
                                            <input type="text" id="nombre-comercial-0" class="form-control">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label>Nivel de Toxicidad</label>
                                            <select class="form-control" id="toxicidad-0" style="background-color: #fff;">
                                                <option value="1">I</option>
                                                <option value="2">II</option>
                                                <option value="3">III</option>
                                                <option value="0">Ninguno</option>
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
                            <button type="button" class="close" data-dismiss="modal">
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
                                        <option value="Mensual">Mensual</option>
                                        <option value="Ocasional">Ocasional</option>
                                        <option value="Semanal">Semanal</option>
                                        <option value="Bimensual">Bimensual</option>
                                        <option value="Trimestral">Trimestral</option>
                                        <option value="Semestral">Semestral</option>
                                        <option value="Anual">Anual</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn-save-rs"class="btn btn-primary">Guardar Ruta</button>
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
                            <button type="button" class="close" data-dismiss="modal">
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
                                    <button id="btn-add-area-lamp" type="button" class="btn btn-primary pull-right" style="position: relative; display: inline-block;"><span
                                            class="bold">Añadir áreas &nbsp;</span><i class="fa fa-plus"></i></button>
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
                                        <option value="Con lámina adhesiva">Con lámina adhesiva</option>
                                        <option value="Electroconductora">Electroconductora</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button style="margin-bottom: 0;" type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn-save-rl"class="btn btn-primary">Guardar</button>
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
                            <button type="button" class="close" data-dismiss="modal">
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
<script>
    //Inicializacion de Contadores
    var contTratamientos = 1;
    var contProductos = 1;
    var contAreas = 1;
    var contAreaExt = 1;
    var contAreaInt = 1;
    var contAreasLampara = 1;

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
                <input type="text" id="area-lampara-${contAreasLampara-1}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>Tipo de lámpara</label>
                <select class="form-control" id="tipo-lampara-${contAreasLampara-1}" style="background-color: #fff;">
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
            productos[index] = {
                producto: $(`#producto-${index}`).val(),
                nombreComercial: $(`#nombre-comercial-${index}`).val(),
                toxicidad: $(`#toxicidad-${index}`).val()
            }
        }

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
        })
            .then((res) => {
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            })

    });

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
        saveRoute('rs', clienteId, sedeId, contenidRutaSaneamiento, crsfToken)
            .then((res) => console.log(res))    //Success
            .catch((err) => console.log(err.responseJSON.errorInfo[2])) //Error
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

        saveRoute('rl', clienteId, sedeId, contenidoRutaLamparas, crsfToken)
            .then((res) => console.log(res))    //Success
            .catch((err) => console.log(err.responseJSON.errorInfo[2])) //Error
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

        saveRoute('rr', clienteId, sedeId, contenidoRutaRoedores, crsfToken)
            .then((res) => console.log(res))    //Success
            .catch((err) => console.log(err.responseJSON.errorInfo[2])) //Error
    })
    
</script>
@endsection
@endsection