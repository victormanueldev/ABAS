@extends('layouts.app')

@section('custom-css')
<link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection

@section('content')
<script>
    document.getElementById('m-crear-usuarios').setAttribute("class", "active");
    document.getElementById('a-crear-usuarios').removeAttribute("style");
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
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            @if(count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-success" style="margin: 10px 15px;">{{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                @endforeach
            @else
                @include('flash::message')
            @endif
            <div class="ibox float-e-margins">
                {!! Form::open(['route' => ['users.store'], 'method' => 'POST', 'id' => 'crear-usuario','enctype' =>
                'multipart/form-data', 'files' => 'true']) !!}
                {!! Form::token() !!}

                <div class="ibox-title">
                    <h5>Formulario para creación de usuarios</h5>
                </div>

                <div class="ibox-content">
                    <p>Indique los datos del usuario para realizar el registro.</p>
                    <div class="row" id="usuarios">
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Número de cédula *</label>
                            <input style="text-transform: uppercase" type="text" name="cedula_usuario" id="cedula_usuario"
                                class="form-control" required placeholder="No. de documento">
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Nombres *</label>
                            <input style="text-transform: uppercase" type="text" name="nombres_usuario" id="nombres_usuario"
                                class="form-control" required placeholder="Nombres del usuario">
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Apellidos *</label>
                            <input style="text-transform: uppercase" type="text" name="apellidos_usuario" id="apellidos_usuario"
                                class="form-control" required placeholder="Apellidos del usuario">
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Iniciales *</label>
                            <input maxlength="3" style="text-transform: uppercase" type="text" name="iniciales_usuario"
                                id="iniciales_usuario" class="form-control" required placeholder="Ej: JJS">
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Teléfono </label>
                            <input style="text-transform: uppercase" type="text" name="telefono_usuario" id="telefono_usuario"
                                class="form-control" placeholder="Teléfono móvil o fijo">
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Foto </label>
                            <input style="text-transform: uppercase" type="file" name="foto_usuario" id="foto_usuario"
                                class="form-control" placeholder="Seleccione un archivo">
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">E-mail *</label>
                            <input style="text-transform: uppercase" type="email" name="email_usuario" id="email_usuario"
                                class="form-control" required placeholder="Ej: juan@gmail.com">
                        </div>

                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Cargo *</label>
                            <select style="text-transform: uppercase" required name="cargo_usuario" id="cargo_usuario"
                                class="form-control">
                                <option value="0" selected>Seleccione una opción</option>
                                @foreach($cargos as $cargo)
                                    <option value="{{$cargo->id}}">{{$cargo->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Area </label>
                            <select style="text-transform: uppercase" disabled name="area_usuario" id="area_usuario"
                                class="form-control">
                                <option value="0" selected>Seleccione una opción</option>
                                @foreach($areas as $area)
                                    <option value="{{$area->id}}">{{$area->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-12" style="margin-top: 15px;">
                            <label class="control-label">Permisos *</label>
                            <div class="row" style="margin-top: 15px">
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="crear_clientes" class="i-checks" />
                                    <span >Crear Clientes </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="ver_clientes" class="i-checks" />
                                    <span >Ver Clientes </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="crear_docs" class="i-checks" />
                                    <span >Crear Inspecciones/Solicitudes </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="asignar_metas" class="i-checks" />
                                    <span >Asignación de metas </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="ver_progresos" class="i-checks" />
                                    <span >Ver progresos comerciales </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="ver_comisiones" class="i-checks" />
                                    <span >Ver Comisiones </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="resumen_comisiones" class="i-checks" />
                                    <span >Ver Resumen de Comisiones </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="clientes_cerrados" class="i-checks" />
                                    <span >Listado de  clientes cerrados </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="asignar_facturas" class="i-checks" />
                                    <span >Asignación de facturas </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="control_pagos" class="i-checks" />
                                    <span >Control de pagos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="agendar_servicios" class="i-checks" />
                                    <span >Agendamiento de servicios </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="horarios_tecnicos" class="i-checks" />
                                    <span >Horarios de técnicos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="listado_servicios" class="i-checks" />
                                    <span >Listado de servicios </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="recepcion_docs" class="i-checks" />
                                    <span >Recepción de órdenes </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="inventario_docs" class="i-checks" />
                                    <span >Inventario de documentos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="reporte_docs" class="i-checks" />
                                    <span >Reporte de documentos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="crear_novedades" class="i-checks" />
                                    <span >Registro de novedades </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="crear_tecnicos" class="i-checks" />
                                    <span >Crear técnicos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="crear_usuarios" class="i-checks" />
                                    <span >Crear usuarios </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="reporte_ganancias" class="i-checks" />
                                    <span >Reporte de ganancias </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="gestion_productos" class="i-checks" />
                                    <span >Gestión de productos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" name="gastos" class="i-checks" />
                                    <span >Gastos de técnicos/productos </span>
                                </div>
                            </div>
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
    </div>
</div>
@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(document).ready(function () {

        /** Inicializacion del iCheck **/
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green'
        });

        $("#cargo_usuario").change(e => {
            switch (e.target.value) {
                case '1':
                    $("#area_usuario").val('1').change()
                    break
                case '2':
                    $("#area_usuario").val('2').change()
                    break
                case '3':
                    $("#area_usuario").val('3').change()
                    break
                case '4':
                    $("#area_usuario").val('1').change()
                    break
                case '5':
                    $("#area_usuario").val('4').change()
                    break
                case '6':
                    $("#area_usuario").val('5').change()
                    break
                default:
                    $("#area_usuario").val('6').change()
                    break
            }
        })
    })
</script>
@endsection