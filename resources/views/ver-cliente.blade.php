@extends('layouts.app')
@section('content')
@section('custom-css')
<link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
@endsection
<script>
    document.getElementById('m-clientes').setAttribute("class", "active");
    document.getElementById('a-clientes').removeAttribute("style");
    document.getElementById('ml2-clientes').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-crearPersona').setAttribute("class", "active");
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
<div class="wrapper wrapper-content animated fadeInUp">      
    <div class="row">
   
        <div class="col-lg-9">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <a href="#" class="btn btn-warning btn-xs pull-right">Editar cliente</a>
                                <a href="#" class="btn btn-warning btn-xs pull-right" style="margin-right: 10px">Añadir Sede</a>
                                <a href="#" class="btn btn-warning btn-xs pull-right" style="margin-right: 10px">Añadir Cotización</a>
                                <h2>{{$cliente[0]->nombre_cliente}}</h2>
                            </div>
                            @if($cliente[0]->tipo_cliente == 'Persona Juridica')
                            <dl class="dl-horizontal">
                                <dt>Tipo de Cliente:</dt> <dd><span class="label label-primary">{{$cliente[0]->tipo_cliente}}</span></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>NIT:</dt> <dd>{{$cliente[0]->nit_cedula}}</dd>
                                <dt>Sector Económico:</dt> <dd>  {{$cliente[0]->sector_economico}}</dd>
                                <dt>Nombre de Contacto:</dt> <dd> {{$cliente[0]->nombre_contacto}} </dd>
                                <dt>Cargo de Contacto:</dt> <dd> 	{{$cliente[0]->cargo_contacto}} </dd>
                            </dl>
                            @else
                            <dl class="dl-horizontal">
                                <dt>Tipo de Cliente:</dt> <dd><span class="label label-warning">{{$cliente[0]->tipo_cliente}}</span></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>Nro. Cédula:</dt> <dd>{{$cliente[0]->nit_cedula}}</dd>
                            </dl>
                            @endif
                        </div>
                        <div class="col-lg-6" id="cluster_info">
                            <dl class="dl-horizontal" >
                                <dt>Fecha Registro:</dt> <dd>{{$cliente[0]->created_at}}</dd>
                                <dt>Fecha Actualización:</dt> <dd> 	{{$cliente[0]->updated_at}} </dd>
                                <dt>Nombre Asesor:</dt> <dd> 	{{$cliente[0]['user']['nombres']." ".$cliente[0]['user']['apellidos']}} </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">
                                <dt>Municipio:</dt> <dd>{{$cliente[0]->municipio}}</dd>
                                <dt>Dirección:</dt> <dd>{{$cliente[0]->direccion}}</dd>
                                <dt>Barrio:</dt>  <dd>{{$cliente[0]->barrio}}</dd>
                                <dt>Zona:</dt> <dd>{{$cliente[0]->zona}}</dd>
                            </dl>
                        </div>
                        <div class="col-lg-6">
                                <dl class="dl-horizontal">
                                    <dt>Email:</dt> <dd>{{$cliente[0]->municipio}}</dd>
                                    <dt>Celular:</dt> <dd>{{$cliente[0]->direccion}}</dd>
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
                                                        <dt style="text-align: left;width: 100px;">Ciudad: </dt>
                                                        <dd style="margin-left: 50px">{{$sede->ciudad}}</dd>
        
                                                        <dt style="text-align: left;width: 100px;">Dirección: </dt>
                                                        <dd style="margin-left: 50px">{{$sede->direccion}}</dd>
        
                                                        <dt style="text-align: left;width: 100px;">Barrio: </dt>
                                                        <dd style="margin-left: 50px">{{$sede->barrio}}</dd>

                                                        <dt style="text-align: left;width: 100px;">Zona/Ruta: </dt>
                                                        <dd style="margin-left: 50px">{{$sede->zona_ruta}}</dd>
                                                    </dl>
                                                </div>
                                                <div class="col-lg-6">

                                                    <dl class=" dl-horizontal">
                                                        <dt style="text-align: left;width: 100px;">Contacto: </dt>
                                                        <dd style="margin-left: 100px">{{$sede->nombre_contacto}}</dd>
        
                                                        <dt style="text-align: left;width: 100px;">Celular: </dt>
                                                        <dd style="margin-left: 100px">{{$sede->celular_contacto}}</dd>
        
                                                        <dt style="text-align: left;width: 100px;">Email: </dt>
                                                        <dd style="margin-left: 100px">{{$sede->email}}</dd>

                                                        <dt style="text-align: left;width: 100px;">Teléfono: </dt>
                                                        <dd style="margin-left: 100px">{{$sede->telefono_contacto}}</dd>
                                                    </dl>
                                                </div>
                                            </div>

                                            <div class="m-t-sm">
                                                <a href="#" class="text-muted"><i class="fa fa-gift"></i> Editar información</a>
                                                |
                                                <a href="#" class="text-muted"><i class="fa fa-trash"></i> Eliminar sede</a>
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
                                    <a class="stat-percent font-bold text-navy" >Editar <i class="fa fa-edit"></i></a>
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
                                        <a class="stat-percent font-bold text-navy" >Editar <i class="fa fa-edit"></i></a>
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
                        <small >Listado de documentos del cliente</small>
                        <ul class="todo-list m-t small-list">
                            <li >
                                <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                                    <input type="checkbox" id="checkbox" >
                                    <label  >RUT</label>
                                    <!-- <span class="badge badge-success pull-right" >E</span> -->
                                </div>                
                            </li>
                            <li >
                                <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                                    <input type="checkbox" id="checkbox" >
                                    <label  >Cédula</label>
                                    <!-- <span class="badge badge-success pull-right" >E</span> -->
                                </div>                
                            </li>

                        </ul>
                    </div>
                </div>
            @endif
            {{-- <div class="wrapper wrapper-content project-manager">
                <h4>Project description</h4>
                <img src="img/zender_logo.png" class="img-responsive">
                <p class="small">
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look
                    even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                </p>
                <p class="small font-bold">
                    <span><i class="fa fa-circle text-warning"></i> High priority</span>
                </p>
                <h5>Project tag</h5>
                <ul class="tag-list" style="padding: 0">
                    <li><a href=""><i class="fa fa-tag"></i> Zender</a></li>
                    <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                    <li><a href=""><i class="fa fa-tag"></i> Passages</a></li>
                    <li><a href=""><i class="fa fa-tag"></i> Variations</a></li>
                </ul>
                <h5>Project files</h5>
                <ul class="list-unstyled project-files">
                    <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
                    <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                    <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                    <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                </ul>
                <div class="text-center m-t-md">
                    <a href="#" class="btn btn-xs btn-primary">Add files</a>
                    <a href="#" class="btn btn-xs btn-primary">Report contact</a>
    
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection