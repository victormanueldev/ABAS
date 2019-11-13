@extends('layouts.app')

@section('custom-css')
<link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection

@section('content')
<script>
    document.getElementById('m-crear-usuarios').setAttribute("class", "active");
    document.getElementById('a-crear-usuarios').removeAttribute("style");
    document.getElementById('ml2-crear-usuarios').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-ver-usuarios-l').setAttribute("class", "active");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Usuarios</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li>
                <a href="#">Usuarios</a>
            </li>
            <li class="active">
                <strong>Ver usuarios</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-md-12">
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
                <div class="ibox-title">
                    <h5>Buscar usuario</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="form-group col-lg-10" >
                            <select style="text-transform: uppercase" required name="user_selected" id="user_selected"
                                class="form-control">
                                <option value="0" selected>Seleccione una opción</option>
                                @foreach($users as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->nombres." ".$usuario->apellidos}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-2">
                            <button type="button" id="btn-buscar" class="btn btn-primary">Buscar <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                {!! Form::open(['route' => ['users.update', '0'], 'method' => 'PUT', 'id' => 'act-usuario', 'enctype' =>
                'multipart/form-data', 'files' => 'true']) !!}
                {!! Form::token() !!}

                <div class="ibox-title">
                    <h5>Formulario para creación de usuarios</h5>
                </div>

                <div class="ibox-content">
                    <p>Indique los datos del usuario para realizar el registro.</p>
                    <div class="row" id="usuarios">
                        <input style="display:none" type="text" name="user_id" id="user_id">
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
                                <label class="control-label">Contraseña </label>
                                <input type="password" name="contrasena_user" id="contrasena_user"
                                    class="form-control" placeholder="Nueva contraseña">
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
                                    <input type="checkbox" id="crear_clientes" name="crear_clientes" class="i-checks" />
                                    <span >Crear Clientes </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="ver_clientes" name="ver_clientes" class="i-checks" />
                                    <span >Ver Clientes </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="crear_docs" name="crear_docs" class="i-checks" />
                                    <span >Documentación </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="asignar_metas" name="asignar_metas" class="i-checks" />
                                    <span >Asignar metas </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="ver_progresos" name="ver_progresos" class="i-checks" />
                                    <span >Metas comerciales </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="ver_comisiones" name="ver_comisiones" class="i-checks" />
                                    <span >Ver Comisiones </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="resumen_comisiones" name="resumen_comisiones" class="i-checks" />
                                    <span >Resumen de Comisiones </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="clientes_cerrados" name="clientes_cerrados" class="i-checks" />
                                    <span >Listado de  clientes </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="asignar_facturas" name="asignar_facturas" class="i-checks" />
                                    <span >Asignación de facturas </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="control_pagos" name="control_pagos" class="i-checks" />
                                    <span >Control de pagos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="agendar_servicios" name="agendar_servicios" class="i-checks" />
                                    <span >Agenda </span>
                                </div>
                                {{-- <div class="form-group col-lg-3">
                                    <input type="checkbox" id="horarios_tecnicos" name="horarios_tecnicos" class="i-checks" />
                                    <span >Horarios de técnicos </span>
                                </div> --}}
                                {{-- <div class="form-group col-lg-3">
                                    <input type="checkbox" id="listado_servicios" name="listado_servicios" class="i-checks" />
                                    <span >Listado de servicios </span>
                                </div> --}}
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="recepcion_docs" name="recepcion_docs" class="i-checks" />
                                    <span >Recepción de documentos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="inventario_docs" name="inventario_docs" class="i-checks" />
                                    <span >Documentos de clientes </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="reporte_docs" name="reporte_docs" class="i-checks" />
                                    <span >Reporte de documentos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="crear_novedades" name="crear_novedades" class="i-checks" />
                                    <span >Registro de novedades </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="crear_tecnicos" name="crear_tecnicos" class="i-checks" />
                                    <span >Crear técnicos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="crear_usuarios" name="crear_usuarios" class="i-checks" />
                                    <span >Crear usuarios </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="reporte_ganancias" name="reporte_ganancias" class="i-checks" />
                                    <span >Reporte de ganancias </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="gestion_productos" name="gestion_productos" class="i-checks" />
                                    <span >Poductos </span>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="checkbox" id="gastos" name="gastos" class="i-checks" />
                                    <span >Gastos </span>
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
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function () {

        /** Inicializacion del iCheck **/
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green'
        });

        function returnArea(cargo){
            switch (cargo) {
                case '1':
                    return '1'
                    break
                case '2':
                    return '2'
                    break
                case '3':
                    return '3'
                    break
                case '4':
                    return '1'
                    break
                case '5':
                    return '4'
                    break
                case '6':
                    return '5'
                    break
                default:
                    return '6'
                    break
            }
        }

        $("#btn-buscar").click(() => {
            $.get(`/users/${$("#user_selected").val()}`)
            .then(res => {
                //Loader
                
                //Llenar los campos del formulario
                $("#cedula_usuario").val(res.cedula)
                $("#nombres_usuario").val(res.nombres)
                $("#apellidos_usuario").val(res.apellidos)
                $("#iniciales_usuario").val(res.iniciales)
                $("#telefono_usuario").val(res.telefono)
                $("#email_usuario").val(res.email)
                $("#cargo_usuario").val(res.cargo_id.toString()).change()
                $("#area_usuario").val(res.area_id.toString()).change()
                $("#user_id").val(res.id)

                //Permisos
                res.permisos[0].crear_clientes == 'true' ? $("#crear_clientes").iCheck('check') : $("#crear_clientes").iCheck('uncheck')
                res.permisos[0].ver_clientes == 'true' ? $("#ver_clientes").iCheck('check') : $("#ver_clientes").iCheck('uncheck')
                res.permisos[0].crear_docs == 'true' ? $("#crear_docs").iCheck('check') : $("#crear_docs").iCheck('uncheck')
                res.permisos[0].asignar_metas == 'true' ? $("#asignar_metas").iCheck('check') : $("#asignar_metas").iCheck('uncheck')
                res.permisos[0].ver_progresos == 'true' ? $("#ver_progresos").iCheck('check') : $("#ver_progresos").iCheck('uncheck')
                res.permisos[0].ver_comisiones == 'true' ? $("#ver_comisiones").iCheck('check') : $("#ver_comisiones").iCheck('uncheck')
                res.permisos[0].resumen_comisiones == 'true' ? $("#resumen_comisiones").iCheck('check') : $("#resumen_comisiones").iCheck('uncheck')
                res.permisos[0].clientes_cerrados == 'true' ? $("#clientes_cerrados").iCheck('check') : $("#clientes_cerrados").iCheck('uncheck')
                res.permisos[0].asignar_facturas == 'true' ? $("#asignar_facturas").iCheck('check') : $("#asignar_facturas").iCheck('uncheck')
                res.permisos[0].control_pagos == 'true' ? $("#control_pagos").iCheck('check') : $("#control_pagos").iCheck('uncheck')
                res.permisos[0].agendar_servicios == 'true' ? $("#agendar_servicios").iCheck('check') : $("#agendar_servicios").iCheck('uncheck')
                res.permisos[0].horarios_tecnicos == 'true' ? $("#horarios_tecnicos").iCheck('check') : $("#horarios_tecnicos").iCheck('uncheck')
                res.permisos[0].listado_servicios == 'true' ? $("#listado_servicios").iCheck('check') : $("#listado_servicios").iCheck('uncheck')
                res.permisos[0].recepcion_docs == 'true' ? $("#recepcion_docs").iCheck('check') : $("#recepcion_docs").iCheck('uncheck')
                res.permisos[0].inventario_docs == 'true' ? $("#inventario_docs").iCheck('check') : $("#inventario_docs").iCheck('uncheck')
                res.permisos[0].reporte_docs == 'true' ? $("#reporte_docs").iCheck('check') : $("#reporte_docs").iCheck('uncheck')
                res.permisos[0].crear_novedades == 'true' ? $("#crear_novedades").iCheck('check') : $("#crear_novedades").iCheck('uncheck')
                res.permisos[0].crear_tecnicos == 'true' ? $("#crear_tecnicos").iCheck('check') : $("#crear_tecnicos").iCheck('uncheck')
                res.permisos[0].crear_usuarios == 'true' ? $("#crear_usuarios").iCheck('check') : $("#crear_usuarios").iCheck('uncheck')
                res.permisos[0].reporte_ganancias == 'true' ? $("#reporte_ganancias").iCheck('check') : $("#reporte_ganancias").iCheck('uncheck')
                res.permisos[0].gestion_productos == 'true' ? $("#gestion_productos").iCheck('check') : $("#gestion_productos").iCheck('uncheck')
                res.permisos[0].gastos == 'true' ? $("#gastos").iCheck('check') : $("#gastos").iCheck('uncheck')
            })
            .catch(err => {
                console.log(err)
            })
        })

        $("#cargo_usuario").change(e => {
            $("#area_usuario").val(returnArea(e.target.value)).change()
        })
    })
</script>
@endsection