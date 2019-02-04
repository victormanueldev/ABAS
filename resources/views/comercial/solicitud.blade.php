@extends('layouts.app')

@section('custom-css')
    <link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection

@section('content')
<script>
    document.getElementById('m-solicitud').setAttribute("class", "active");
    document.getElementById('a-solicitudes').removeAttribute("style");
    document.getElementById('ml2-doc-solicitud').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-crearEmpresa').setAttribute("class", "active");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Documentación</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Inicio</a>
            </li>
            <li>
                <a>Documentación</a>
            </li>
            <li class="active">
                <strong>Solicitud de Programación</strong>
            </li>
        </ol>
    </div>
</div>



<div class="wrapper wrapper-content animated fadeInRight">
    {!! Form::open(array('route'=>('solicitud.store'), 'method'=>'POST', 'autocomplete'=>'on', 'id' => 'form-solicitud')) !!}
    {{Form::token()}}

   	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">

					     	<div class="row">
					            <div class="col-lg-12">
                                    <div class="ibox-title col-lg-12">
                                            {{-- <label class="control-label">AM-CM-01</label> --}}
                                        <h1>SOLICITUD A PROGRAMACIÓN</h1>
                                        {{-- <button type="button" class="btn btn-w-m btn-primary"><span class="glyphicon glyphicon-refresh" aria-hidden="true" style="margin-right: 8px;"></span> Generar Código</button> --}}
                                        <br>
                                        <br>                                                   
                                    </div>
    
                                        <div class="form-group col-lg-4" id="data_1">
                                            <label>Fecha *</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="fecha_creacion" class="form-control" placeholder="" name="fecha_creacion" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Inspector Comercial:</label>
                                            <input type="text" id="nombre_usuario" name="nombre-usuario" placeholder="" class="form-control" value="{{$user->nombres}} {{$user->apellidos}}">
                                            <br>
                                        </div>
    
                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Frecuencia del Servicio</label>
                                            
                                            <select class="form-control" id="frecuencia_servicio" name="frecuencia_servicio" required>
                                                <option value="" selected>Seleccione una frecuencia</option>
                                                <option value="7">Semanales</option>
                                                <option value="15">Quincenales</option>
                                                <option value="30">Mensuales</option>
                                                <option value="60">Bimestrales</option>
                                                <option value="90">Trimestrales</option>
                                                <option value="120">Cada 4 Meses</option>
                                                <option value="180">Semestrales</option>
                                                <option value="360">Anuales</option>
                                            </select>
    
                                        </div>


                                    <div class="ibox-title col-lg-12">
                                        <h3>Facturar a Nombre de:</h3>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Razón Social/Nombre *</label>

                                        <!-- Select con Autocompletar-->
                                        <select data-placeholder="Seleccione NIT" class="chosen-select"  tabindex="2" id="select_clientes" name="id_cliente" required>
                                            <option value="" selected disabled>Selecciona un cliente</option>
                                            @foreach($clientes as $cliente)
                                                <option value="{{$cliente->id}}">{{$cliente->nombre_cliente}}</option>
                                            @endforeach
                                        </select>



                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                        <input type="text"  id="input-nit" name="input-nit" placeholder="Nit ó Cedula" class="form-control">
                                                    
                                    </div>


                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text"  id="input-direccion" name="input-direccion" placeholder="Dirección de cliente" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text"  id="input-ciudad" name="input-ciudad" placeholder="Ciudad del cliente" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" id="input-barrio" name="input-barrio" placeholder="Barrio del cliente" class="form-control">

                                    </div>

                                    
                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" id="input-contacto" name="input-contacto" placeholder="Nombre de contacto del servicio" class="form-control">
                                        
                                    </div>
                                    
                                    <div class="form-group col-lg-6"><label class="control-label">Cargo *</label>
                                        <input type="text" id="input-cargo" name="input-cargo" placeholder="Zona del cliente" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" id="input-telefono" name="input-telefono" placeholder="Teléfono del contacto a facturar" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" id="input-celular" name="input-celular" placeholder="Celular del contacto a facturar" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email"  id="input-email" name="input-email" placeholder="Email del contacto a facturar" class="form-control">
                                        
                                    </div>
                                    
                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Realizar Servicio en:</h3>
                                        <br>
                                    </div>
												

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Razón Social/Nombre *</label>
                                        
                                        <select class="form-control" id="select_sedes" name="id_sede">
                                            <option value="">Selecciona una sede</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                        <input type="text" id="input-sede-nit" name="input-sede-nit" placeholder="Nit ó Cedula" class="form-control">
                                                    
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text"  id="input-sede-direccion" name="input-sede-direccion"placeholder="Dirección de donde se realizará el servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text" id="input-sede-ciudad" name="input-sede-ciudad" placeholder="Ciudad donde se realizará el servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" id="input-sede-barrio" name="input-sede-barrio" placeholder="Barrio donde se realizará el servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Zona *</label>
                                        <input type="text" id="input-sede-zona" name="input-sede-zona" placeholder="Zona donde se realizará el servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" id="input-sede-contacto" name="input-sede-contacto" placeholder="Nombre de contacto del lugar" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" id="input-sede-telefono" name="input-sede-telefono" placeholder="Teléfono del contacto del servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" id="input-sede-celular" name="input-sede-celular" placeholder="Celular del contacto del lugar" class="form-control">
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email" id="input-sede-email" name="input-sede-email"  placeholder="Email del contacto del servicio" class="form-control">
                                        
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto Factura *</label>
                                        <input type="text"  placeholder="Nombre del contacto a facturar" name="contacto-name-factura" id="contacto_name_factura" class="form-control" style="display: block;">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                        <input type="text"  placeholder="Teléfono del contacto a facturar" name="contacto-telefono-factura" id="contacto_telefono_factura" class="form-control">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text"  placeholder="Celular del contacto a facturar" name="contacto-celular-factura" id="contacto_celular_factura" class="form-control">
                                    </div>

					                <div class="form-group col-lg-12">
					                    <label>Instrucciones y Observaciones</label>
					                    <textarea class="form-control" placeholder="Escriba aquí las observaciones para el técnico." rows="3" name="instrucciones" id="observaciones_tecnico" required></textarea>
					                </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Plan de Saneamiento</h3>
                                        <hr>
                                        <br>
                                    </div>
                                    
                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Valor plan de saneamiento</label>
                                        <input type="number" min=0 name="total_plan" id="total_plan" placeholder="Valor total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Observaciones</label>
                                        <textarea class="form-control" placeholder="Escriba aquí las observaciones que desee." rows="3" name="instrucciones" id="instrucciones"></textarea>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Inventario Inicial</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Estaciones de Roedor</label>
                                        <input type="number" min=0 id="estaciones_roedor" name="estaciones_roedor" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Lámparas 925 control voladores</label>
                                        <input type="number" min=0 id="lamparas_control" name="lamparas_control" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Cajas de alcantarilla electricas</label>
                                        <input type="number" min=0 id="cajas_alcantarilla" name="numero_tapas" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Trampas de impacto plásticas</label>
                                        <input type="number" min=0 id="trampas_plasticas" name="trampas_plasticas" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Número de Residencias</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Casas</label>
                                        <input type="number" min=0 id="numero_casas" name="numero_casas" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Aptos</label>
                                        <input type="number" min=0 id="numero_aptos" name="numero_aptos" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Bodegas</label>
                                        <input type="number" min=0 id="numero_bodegas" name="numero_bodegas" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Forma de Pago de Servicios </h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">¿Tiene Contrato?</label>
                                        <select class="form-control" id="contrato" name="contrato">
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Forma de Pago</label>
                                        <select class="form-control" id="forma_pago" name="forma_pago">
                                            <option>Efectivo</option>
                                            <option>Tarjeta Crédito</option>
                                            <option>Tarjeta Dédito</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Facturación</label>
                                        <input type="text" id="facturacion" name="facturacion" placeholder="Ej: SC" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                    </div>
    
                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Incluir los siguientes servicios</label>
                                        <input type="text" id="servicios_1" name="servicios_1" placeholder="Ingrese servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Frecuencia del Servicio</label>
                                        <select class="form-control" id="frecuencia_servicios_1" name="frecuencia_servicios_1">
                                            <option>Ocasionalmente</option>
                                            <option>Semanales</option>
                                            <option>Quincenales</option>
                                            <option>Mensuales</option>
                                            <option>Bimestrales</option>
                                            <option>Trimestrales</option>
                                            <option>Cada 4 Meses</option>
                                            <option>Semestrales</option>
                                            <option>Anuales</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor</label>
                                        <input type="number" min=0 id="valor_servicios_1" name="valor_servicios_1" placeholder="Valor" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Incluir los siguientes servicios</label>
                                        <input type="text" id="servicios_2" name="servicios_2" placeholder="Ingrese servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Frecuencia del Servicio</label>
                                        <select class="form-control" id="frecuencia_servicios_2" name="frecuencia_servicios_2">
                                            <option>Ocasionalmente</option>
                                            <option>Semanales</option>
                                            <option>Quincenales</option>
                                            <option>Mensuales</option>
                                            <option>Bimestrales</option>
                                            <option>Trimestrales</option>
                                            <option>Cada 4 Meses</option>
                                            <option>Semestrales</option>
                                            <option>Anuales</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor</label>
                                        <input type="number" min=0 id="valor_servicios_2" name="valor_servicios_2" placeholder="Valor" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Incluir los siguientes servicios</label>
                                        <input type="text" id="servicios_3" name="servicios_3" placeholder="Ingrese servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Frecuencia del Servicio</label>
                                        <select class="form-control" id="frecuencia_servicios_3" name="frecuencia_servicios_3">
                                            <option>Ocasionalmente</option>
                                            <option>Semanales</option>
                                            <option>Quincenales</option>
                                            <option>Mensuales</option>
                                            <option>Bimestrales</option>
                                            <option>Trimestrales</option>
                                            <option>Cada 4 Meses</option>
                                            <option>Semestrales</option>
                                            <option>Anuales</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor</label>
                                        <input type="number" min=0 id="valor_servicios_3" name="valor_servicios_3" placeholder="Valor" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Total a facturar</label>
                                        <input type="number" id="total_servicios" name="total_servicios" class="form-control" value=0 disabled>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Compra de Dispositivos</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">#1 Dispositivo</label>
                                        <input type="text" id="dispositivos_1" name="dispositivos_1" placeholder="Nombre de dispositivo" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Cantidad</label>
                                        <input type="number" min=0 id="cantidad_dispositivos_1" name="cantidad_dispositivos_1" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor por unidad</label>
                                        <input type="number" min=0 id="unidad_dispositivos_1" name="unidad_dispositivos_1" placeholder="Valor C/U" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor total</label>
                                        <input type="number" min=0 id="total_dispositivos_1" name="total_dispositivos_1" placeholder="Valor Total" class="form-control" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">#2 Dispositivos</label>
                                        <input type="text" id="dispositivos_2" name="dispositivos_2" placeholder="Nombre de dispositivo" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Cantidad</label>
                                        <input type="number" min=0 id="cantidad_dispositivos_2" name="cantidad_dispositivos_2" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor por unidad</label>
                                        <input type="number" min=0 id="unidad_dispositivos_2" name="unidad_dispositivos_2" placeholder="Valor C/U" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor total</label>
                                        <input type="number" min=0 id="total_dispositivos_2" name="total_dispositivos_2" placeholder="Valor Total" class="form-control" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">#3 Dispositivos</label>
                                        <input type="text" id="dispositivos_3" name="dispositivos_3" placeholder="Nombre de dispositivo" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Cantidad</label>
                                        <input type="number" min=0 id="cantidad_dispositivos_3" name="cantidad_dispositivos_3" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor por unidad</label>
                                        <input type="number" min=0 id="unidad_dispositivos_3" name="unidad_dispositivos_3" placeholder="Valor C/U" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor total</label>
                                        <input type="number" min=0 id="total_dispositivos_3" name="total_dispositivos_3" placeholder="Valor Total" class="form-control" disabled>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Observaciones</label>
                                        <textarea class="form-control" placeholder="Escriba aquí las observaciones que desee." rows="3" name="observaciones_dispositivos" id="observaciones_dispositivos"></textarea>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Dispositivos en Comodato para esta Propuesta</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">#1 Dispositivo</label>
                                        <input type="text" id="dispositivos_comodato_1" name="dispositivos_comodato_1" placeholder="Nombre de dispositivo" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Cantidad</label>
                                        <input type="number" min=0 id="cantidad_dispositivos_comodato_1" name="cantidad_dispositivos_comodato_1" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor por unidad</label>
                                        <input type="number" min=0 id="unidad_dispositivos_comodato_1" name="unidad_dispositivos_comodato_1" placeholder="Valor C/U" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor total</label>
                                        <input type="number" min=0 id="total_dispositivos_comodato_1" name="total_dispositivos_comodato_1" placeholder="Valor Total" class="form-control" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">#2 Dispositivos</label>
                                        <input type="text" id="dispositivos_comodato_2" name="dispositivos_comodato_2" placeholder="Nombre de dispositivo" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Cantidad</label>
                                        <input type="number" min=0 id="cantidad_dispositivos_comodato_2" name="cantidad_dispositivos_comodato_2" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor por unidad</label>
                                        <input type="number" min=0 id="unidad_dispositivos_comodato_2" name="unidad_dispositivos_comodato_2" placeholder="Valor C/U" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor total</label>
                                        <input type="number" min=0 id="total_dispositivos_comodato_2" name="total_dispositivos_comodato_2" placeholder="Valor Total" class="form-control" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">#3 Dispositivos</label>
                                        <input type="text" id="dispositivos_comodato_3" name="dispositivos_comodato_3" placeholder="Nombre de dispositivo" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Cantidad</label>
                                        <input type="number" min=0 id="cantidad_dispositivos_comodato_3" name="cantidad_dispositivos_comodato_3" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor por unidad</label>
                                        <input type="number" min=0 id="unidad_dispositivos_comodato_3" name="unidad_dispositivos_comodato_3" placeholder="Valor C/U" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor total</label>
                                        <input type="number" min=0 id="total_dispositivos_comodato_3" name="total_dispositivos_comodato_3" placeholder="Valor Total" class="form-control" disabled>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Observaciones</label>
                                        <textarea class="form-control" placeholder="Escriba aquí las observaciones que desee." rows="3" name="observaciones_dispositivos_comodato" id="observaciones_dispositivos_comodato"></textarea>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <h3>Detalle y Valor del Servicio</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Medio por el cual se entero de nuestro servicio</label>
                                        <select class="form-control" name="medio_contacto" id="medio_contacto">
                                            <option value="amigo">Un amigo</option>
                                            <option value="internet">Internet</option>
                                            <option value="contacto_asesor">Contacto Asesor Directamente</option>
                                            <option value="llamada_telefonica">Llamada Telefónica</option>
                                            <option value="directorio">Directorio Telefónico</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Otro ¿Cúal?</label>
                                        <input type="text" id="otro" name="otro" placeholder="Otros medios" class="form-control" disabled>
                                        <br>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Firma Inspector Comercial</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Firma Gestión de Calidad</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Firma Programación</label>
                                        <textarea class="form-control" rows="3"></textarea>                                        
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Firma Jefe Técnico:</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="ibox-footer">
                                                <button type="submit" class="btn btn-primary" id="btn-submit">Guardar</button>
                                                <a href="\home"><button type="button" class="btn btn-default" style="text-decoration: none; color: #676a6c;">Cancelar</button></a>
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

    {!! Form::close() !!}
</div>                    
@section('ini-scripts')
    <script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
    <script>

            $(document).ready(function() {
                var date = moment().format("YYYY-MM-DD");
                $('#fecha_creacion').val(date);
            });

        //Inicializador del Select AUTOCOMPLETAR
        $('.chosen-select').chosen({width: "100%"});

        //Inicializador del Select AUTOCOMPLETAR
        $('.chosen-select').chosen({width: "100%"});

        //Evento change del select de clientes
        $("#select_clientes").change(event => {
            //Peticion GET al servidor a la ruta /clientes/{id} (Cliente con id = $id)
            $.get(`/clientes/${event.target.value}/edit`, function (res) {
                //Asignacion de valores a Inputs Clientes
                $("#input-nit").val(res[0]['nit_cedula']);
                $("#input-direccion").val(res[0]['direccion']);
                $("#input-ciudad").val(res[0]['municipio']);
                $("#input-barrio").val(res[0]['barrio']);
                $("#input-contacto").val(res[0]['nombre_contacto']);
                $("#input-cargo").val(res[0]['cargo_contacto']);
                $("#input-telefono").val(res[0]['telefono']);
                $("#input-celular").val(res[0]['celular']);
                $("#input-email").val(res[0]['email']);
                $("#input-sede-nit").val(res[0]['nit_cedula']);
            }).then((res) => {//Peticion exitosa => status: 200
                console.log('Petición Exitosa');
            }).catch((err) => {//Peticion fallida => status: > 400
                console.log(err);
            });
            //Peticion GET al servidor a la ruta /sedes/clientes/{id} (Sedes de cliente)
            $.get(`/sedes/cliente/${event.target.value}`,  function (res) {
                $("#select_sedes").empty();//Limipia el select
                $("#input-sede-direccion").val('');
                $("#input-sede-ciudad").val('');
                $("#input-sede-barrio").val('');
                $("#input-sede-zona").val('');
                $("#input-sede-contacto").val('');
                $("#input-sede-telefono").val('');
                $("#input-sede-celular").val('');
                $("#input-sede-email").val('');
                console.log(res);                
                if(res == ''){//Valida que el cliente tenga sedes
                    $("#select_sedes").append(`<option value='' disabled selected> Sede Única </option>`);
                    $("#select_sedes").prop('required',false);

                    $("#select_sedes").prop('disabled',true);
                    $("#input-sede-nit").prop('disabled',true);
                    $("#input-sede-direccion").prop('disabled',true);
                    $("#input-sede-ciudad").prop('disabled', true);
                    $("#input-sede-barrio").prop('disabled', true);
                    $("#input-sede-zona").prop('disabled', true);
                    $("#input-sede-contacto").prop('disabled', true);
                    $("#input-sede-telefono").prop('disabled', true);
                    $("#input-sede-celular").prop('disabled', true);
                    $("#input-sede-email").prop('disabled', true);
                }else{
                    $("#select_sedes").append(`<option value='' disabled selected> Selecciona una sede </option>`);
                    $("#select_sedes").prop('required',true);

                    $("#select_sedes").prop('disabled',false);
                    $("#input-sede-nit").prop('disabled',false);
                    $("#input-sede-direccion").prop('disabled',false);
                    $("#input-sede-ciudad").prop('disabled', false);
                    $("#input-sede-barrio").prop('disabled', false);
                    $("#input-sede-zona").prop('disabled', false);
                    $("#input-sede-contacto").prop('disabled', false);
                    $("#input-sede-telefono").prop('disabled', false);
                    $("#input-sede-celular").prop('disabled', false);
                    $("#input-sede-email").prop('disabled', false);

                    //Recorre la respuesta del servidor
                    res.forEach(element => {
                        //Añade Options al select de sedes dependiendo de la respues del servidor
                        $("#select_sedes").append(`<option value=${element.id}> ${element.nombre} </option>`);
                    });              
                }
            }).then((res) => {
                console.log('Petición Exitosa');
            }).catch((err) => {
                console.log(err);
            });
        });

        //Evento change del select de Sedes
        $("#select_sedes").change(event => {
            $.get(`/sedes/${event.target.value}`, function (res) {
                //Asignacion de valores de los inputs de Sede
                $("#input-sede-direccion").val(res['direccion']);
                $("#input-sede-ciudad").val(res['ciudad']);
                $("#input-sede-barrio").val(res['barrio']);
                $("#input-sede-zona").val(res['zona_ruta']);
                $("#input-sede-contacto").val(res['nombre_contacto']);
                $("#input-sede-telefono").val(res['telefono_contacto']);
                $("#input-sede-celular").val(res['celular_contacto']);
                $("#input-sede-email").val(res['email']);
            }).then((res) => {
                console.log('Petición Exitosa');
            }).catch((err) => {
                console.log(err);
            });
        });
        
        //Generar numero aleatorio
        function codigoAleatorio() {
            var randomCode = Math.round(Math.random()*(999 - 0));
            if(randomCode <= 9){
                return "FS00"+randomCode.toString();
            }else if (randomCode >= 9 && randomCode <= 99){
                return "FS0"+randomCode.toString();
            }else{
                return "FS"+randomCode.toString();
            }
        }

        $('.visita').change(event => {
            var v1 = parseFloat(jQuery("#visita_1").val());
            var v2 = parseFloat(jQuery("#visita_2").val());
            var v3 = parseFloat(jQuery("#visita_3").val());
            var v4 = parseFloat(jQuery("#visita_4").val());
            
            var suma = v1+v2+v3+v4;

            $('#total_horas_visita').val(suma);
        });

        $(".visita").change(event => {
            var val_hora = parseFloat(jQuery("#valor_hora").val());
            var facturar_total = parseFloat(jQuery("#total_horas_visita").val());
            $("#valor_facturar").val(val_hora*facturar_total);
        });

        $("#medio_contacto").change(event => {
            if ($('#medio_contacto').val() === 'otro') {
                $("#otro").prop('disabled', false);
            } else {
                $("#otro").prop('disabled', true);
            }
        });   
        
        //Realiza la peticion POST al servidor (AJAX)
        function guardarSolicitud(
                                    res,
                                    codigo_solicitud,
                                    fecha_creacion,
                                    nombre_usuario,
                                    frecuencia_servicio,
                                    select_clientes,
                                    select_sedes,
                                    contacto_name_factura,
                                    contacto_telefono_factura,
                                    contacto_celular_factura,
                                    observaciones_tecnico,
                                    total_plan,
                                    instrucciones,
                                    estaciones_roedor,
                                    lamparas_control,
                                    cajas_alcantarilla,
                                    trampas_plasticas,
                                    numero_casas,
                                    numero_aptos,
                                    numero_bodegas,
                                    contrato,
                                    forma_pago,
                                    facturacion,
                                    servicios_1,
                                    frecuencia_servicios_1,
                                    valor_servicios_1,
                                    servicios_2,
                                    frecuencia_servicios_2,
                                    valor_servicios_2,
                                    servicios_3,
                                    frecuencia_servicios_3,
                                    valor_servicios_3,
                                    total_servicios,
                                    dispositivos_1,
                                    cantidad_dispositivos_1,
                                    unidad_dispositivos_1,
                                    total_dispositivos_1,
                                    dispositivos_2,
                                    cantidad_dispositivos_2,
                                    unidad_dispositivos_2,
                                    total_dispositivos_2,
                                    dispositivos_3,
                                    cantidad_dispositivos_3,
                                    unidad_dispositivos_3,
                                    total_dispositivos_3,
                                    observaciones_dispositivos,
                                    dispositivos_comodato_1,
                                    cantidad_dispositivos_comodato_1,
                                    unidad_dispositivos_comodato_1,
                                    total_dispositivos_comodato_1,
                                    dispositivos_comodato_2,
                                    cantidad_dispositivos_comodato_2,
                                    unidad_dispositivos_comodato_2,
                                    total_dispositivos_comodato_2,
                                    dispositivos_comodato_3,
                                    cantidad_dispositivos_comodato_3,
                                    unidad_dispositivos_comodato_3,
                                    total_dispositivos_comodato_3,
                                    observaciones_dispositivos_comodato,
                                    medio_contacto,
                                    otro,
                                    crsfToken
                                ) {
                                    console.log(
                                    res, 
                                    codigo_solicitud,
                                    fecha_creacion,
                                    nombre_usuario,
                                    frecuencia_servicio,
                                    select_clientes,
                                    select_sedes,
                                    contacto_name_factura,
                                    contacto_telefono_factura,
                                    contacto_celular_factura,
                                    observaciones_tecnico,
                                    total_plan,
                                    instrucciones,
                                    estaciones_roedor,
                                    lamparas_control,
                                    cajas_alcantarilla,
                                    trampas_plasticas,
                                    numero_casas,
                                    numero_aptos,
                                    numero_bodegas,
                                    contrato,
                                    forma_pago,
                                    facturacion,
                                    servicios_1,
                                    frecuencia_servicios_1,
                                    valor_servicios_1,
                                    servicios_2,
                                    frecuencia_servicios_2,
                                    valor_servicios_2,
                                    servicios_3,
                                    frecuencia_servicios_3,
                                    valor_servicios_3,
                                    total_servicios,
                                    dispositivos_1,
                                    cantidad_dispositivos_1,
                                    unidad_dispositivos_1,
                                    total_dispositivos_1,
                                    dispositivos_2,
                                    cantidad_dispositivos_2,
                                    unidad_dispositivos_2,
                                    total_dispositivos_2,
                                    dispositivos_3,
                                    cantidad_dispositivos_3,
                                    unidad_dispositivos_3,
                                    total_dispositivos_3,
                                    observaciones_dispositivos,
                                    dispositivos_comodato_1,
                                    cantidad_dispositivos_comodato_1,
                                    unidad_dispositivos_comodato_1,
                                    total_dispositivos_comodato_1,
                                    dispositivos_comodato_2,
                                    cantidad_dispositivos_comodato_2,
                                    unidad_dispositivos_comodato_2,
                                    total_dispositivos_comodato_2,
                                    dispositivos_comodato_3,
                                    cantidad_dispositivos_comodato_3,
                                    unidad_dispositivos_comodato_3,
                                    total_dispositivos_comodato_3,
                                    observaciones_dispositivos_comodato,
                                    medio_contacto,
                                    otro,
                                    crsfToken
                                    );
            $.ajax({
                url: '/solicitud',
                data: {
                    'codigo_solicitud': res,
                    'fecha_creacion': fecha_creacion,
                    'nombre_usuario': nombre_usuario,
                    'frecuencia_servicio': frecuencia_servicio,
                    'select_clientes': select_clientes,
                    'select_sedes': select_sedes,
                    'contacto_name_factura': contacto_name_factura,
                    'contacto_telefono_factura': contacto_telefono_factura,
                    'contacto_celular_factura': contacto_celular_factura,
                    'observaciones_tecnico': observaciones_tecnico,
                    'total_plan': total_plan,
                    'instrucciones': instrucciones,
                    'estaciones_roedor': estaciones_roedor,
                    'lamparas_control': lamparas_control,
                    'cajas_alcantarilla': cajas_alcantarilla,
                    'trampas_plasticas': trampas_plasticas,
                    'numero_casas': numero_casas,
                    'numero_aptos': numero_aptos,
                    'numero_bodegas': numero_bodegas,
                    'contrato': contrato,
                    'forma_pago': forma_pago,
                    'facturacion': facturacion,
                    'servicios_1': servicios_1,
                    'frecuencia_servicios_1': frecuencia_servicios_1,
                    'valor_servicios_1': valor_servicios_1,
                    'servicios_2': servicios_2,
                    'frecuencia_servicios_2': frecuencia_servicios_2,
                    'valor_servicios_2': valor_servicios_2,
                    'servicios_3': servicios_3,
                    'frecuencia_servicios_3': frecuencia_servicios_3,
                    'valor_servicios_3': valor_servicios_3,
                    'total_servicios': total_servicios,
                    'dispositivos_1': dispositivos_1,
                    'cantidad_dispositivos_1': cantidad_dispositivos_1,
                    'unidad_dispositivos_1': unidad_dispositivos_1,
                    'total_dispositivos_1': total_dispositivos_1,
                    'dispositivos_2': dispositivos_2,
                    'cantidad_dispositivos_2': cantidad_dispositivos_2,
                    'unidad_dispositivos_2': unidad_dispositivos_2,
                    'total_dispositivos_2': total_dispositivos_2,
                    'dispositivos_3': dispositivos_3,
                    'cantidad_dispositivos_3': cantidad_dispositivos_3,
                    'unidad_dispositivos_3': unidad_dispositivos_3,
                    'total_dispositivos_3': total_dispositivos_3,
                    'observaciones_dispositivos': observaciones_dispositivos,
                    'dispositivos_comodato_1': dispositivos_comodato_1,
                    'cantidad_dispositivos_comodato_1': cantidad_dispositivos_comodato_1,
                    'unidad_dispositivos_comodato_1': unidad_dispositivos_comodato_1,
                    'total_dispositivos_comodato_1': total_dispositivos_comodato_1,
                    'dispositivos_comodato_2': dispositivos_comodato_2,
                    'cantidad_dispositivos_comodato_2': cantidad_dispositivos_comodato_2,
                    'unidad_dispositivos_comodato_2': unidad_dispositivos_comodato_2,
                    'total_dispositivos_comodato_2': total_dispositivos_comodato_2,
                    'dispositivos_comodato_3': dispositivos_comodato_3,
                    'cantidad_dispositivos_comodato_3': cantidad_dispositivos_comodato_3,
                    'unidad_dispositivos_comodato_3': unidad_dispositivos_comodato_3,
                    'total_dispositivos_comodato_3': total_dispositivos_comodato_3,
                    'observaciones_dispositivos_comodato': observaciones_dispositivos_comodato,
                    'medio_contacto': medio_contacto,
                    'otro': otro,
                },
                headers: {
                    "X-CSRF-TOKEN": crsfToken
                },
                type: "POST",
                success: function () {
                    console.log("Form enviado");
                },
                error: function () {
                    console.error("Error al enviar el form");
                }
            });
        }
        
        //Evento Submit del Formulario de Solicitud
        $("#form-solicitud").submit(event => {
            event.preventDefault();
            crsfToken = document.getElementsByName("_token")[0].value; //Obtiene el token del formulario a enviar
            var codigo_solicitud = codigoAleatorio();   //Obtiene el valor del codigo generado automaticamente (String)
            //Captura la informacion de los inputs del formulario HTML
            var fecha_creacion = $('#fecha_creacion').val();
            var nombre_usuario = $('#nombre_usuario').val();
            var frecuencia_servicio = $('#frecuencia_servicio').val();
            var select_clientes = $('#select_clientes').val();
            var select_sedes = $('#select_sedes').val();
            var contacto_name_factura = $('#contacto_name_factura').val();
            var contacto_telefono_factura = $('#contacto_telefono_factura').val();
            var contacto_celular_factura = $('#contacto_celular_factura').val();
            var observaciones_tecnico = $('#observaciones_tecnico').val();
            var total_plan = $('#total_plan').val();
            var instrucciones = $('#instrucciones').val();
            var estaciones_roedor = $('#estaciones_roedor').val();
            var lamparas_control = $('#lamparas_control').val();
            var cajas_alcantarilla = $('#cajas_alcantarilla').val();
            var trampas_plasticas = $('#trampas_plasticas').val();
            var numero_casas = $('#numero_casas').val();
            var numero_aptos = $('#numero_aptos').val();
            var numero_bodegas = $('#numero_bodegas').val();
            var contrato = $('#contrato').val();
            var forma_pago = $('#forma_pago').val();
            var facturacion = $('#facturacion').val();
            var servicios_1 = $('#servicios_1').val();
            var frecuencia_servicios_1 = $('#frecuencia_servicios_1').val();
            var valor_servicios_1 = $('#valor_servicios_1').val();
            var servicios_2 = $('#servicios_2').val();
            var frecuencia_servicios_2 = $('#frecuencia_servicios_2').val();
            var valor_servicios_2 = $('#valor_servicios_2').val();
            var servicios_3 = $('#servicios_3').val();
            var frecuencia_servicios_3 = $('#frecuencia_servicios_3').val();
            var valor_servicios_3 = $('#valor_servicios_3').val();
            var total_servicios = $('#total_servicios').val();
            var dispositivos_1 = $('#dispositivos_1').val();
            var cantidad_dispositivos_1 = $('#cantidad_dispositivos_1').val();
            var unidad_dispositivos_1 = $('#unidad_dispositivos_1').val();
            var total_dispositivos_1 = $('#total_dispositivos_1').val();
            var dispositivos_2 = $('#dispositivos_2').val();
            var cantidad_dispositivos_2 = $('#cantidad_dispositivos_2').val();
            var unidad_dispositivos_2 = $('#unidad_dispositivos_2').val();
            var total_dispositivos_2 = $('#total_dispositivos_2').val();
            var dispositivos_3 = $('#dispositivos_3').val();
            var cantidad_dispositivos_3 = $('#cantidad_dispositivos_3').val();
            var unidad_dispositivos_3 = $('#unidad_dispositivos_3').val();
            var total_dispositivos_3 = $('#total_dispositivos_3').val();
            var observaciones_dispositivos = $('#observaciones_dispositivos').val();
            var dispositivos_comodato_1 = $('#dispositivos_comodato_1').val();
            var cantidad_dispositivos_comodato_1 = $('#cantidad_dispositivos_comodato_1').val();
            var unidad_dispositivos_comodato_1 = $('#unidad_dispositivos_comodato_1').val();
            var total_dispositivos_comodato_1 = $('#total_dispositivos_comodato_1').val();
            var dispositivos_comodato_2 = $('#dispositivos_comodato_2').val();
            var cantidad_dispositivos_comodato_2 = $('#cantidad_dispositivos_comodato_2').val();
            var unidad_dispositivos_comodato_2 = $('#unidad_dispositivos_comodato_2').val();
            var total_dispositivos_comodato_2 = $('#total_dispositivos_comodato_2').val();
            var dispositivos_comodato_3 = $('#dispositivos_comodato_3').val();
            var cantidad_dispositivos_comodato_3 = $('#cantidad_dispositivos_comodato_3').val();
            var unidad_dispositivos_comodato_3 = $('#unidad_dispositivos_comodato_3').val();
            var total_dispositivos_comodato_3 = $('#total_dispositivos_comodato_3').val();
            var observaciones_dispositivos_comodato = $('#observaciones_dispositivos_comodato').val();
            var medio_contacto = $('#medio_contacto').val();
            var otro = $('#otro').val();

            //Alert para cambiar el codigo generado por uno personalizado (opcional)
            swal({
                title: "Código de Solicitud",
                text: "Código generado: "+codigo_solicitud+", escribe otro código aquí: ",
                icon: "warning",
                content: {
                    element: "input",
                    attributes: {
                    placeholder: "Ingresa el código personalizado para el formulario de solicitud",
                    type: "text"
                    },
                },
                buttons: true,
                dangerMode: false,
            })
            //Cuando el usuario presione algun botón
            .then((res) => {
                if (res == '') {  //Valida que el usuario presione el boton guardar
                    //Llama a la funcion de guardar form
                    guardarSolicitud(
                                        res,
                                        fecha_creacion,
                                        nombre_usuario,
                                        frecuencia_servicio,
                                        select_clientes,
                                        select_sedes,
                                        contacto_name_factura,
                                        contacto_telefono_factura,
                                        contacto_celular_factura,
                                        observaciones_tecnico,
                                        total_plan,
                                        instrucciones,
                                        estaciones_roedor,
                                        lamparas_control,
                                        cajas_alcantarilla,
                                        trampas_plasticas,
                                        numero_casas,
                                        numero_aptos,
                                        numero_bodegas,
                                        contrato,
                                        forma_pago,
                                        facturacion,
                                        servicios_1,
                                        frecuencia_servicios_1,
                                        valor_servicios_1,
                                        servicios_2,
                                        frecuencia_servicios_2,
                                        valor_servicios_2,
                                        servicios_3,
                                        frecuencia_servicios_3,
                                        valor_servicios_3,
                                        total_servicios,
                                        dispositivos_1,
                                        cantidad_dispositivos_1,
                                        unidad_dispositivos_1,
                                        total_dispositivos_1,
                                        dispositivos_2,
                                        cantidad_dispositivos_2,
                                        unidad_dispositivos_2,
                                        total_dispositivos_2,
                                        dispositivos_3,
                                        cantidad_dispositivos_3,
                                        unidad_dispositivos_3,
                                        total_dispositivos_3,
                                        observaciones_dispositivos,
                                        dispositivos_comodato_1,
                                        cantidad_dispositivos_comodato_1,
                                        unidad_dispositivos_comodato_1,
                                        total_dispositivos_comodato_1,
                                        dispositivos_comodato_2,
                                        cantidad_dispositivos_comodato_2,
                                        unidad_dispositivos_comodato_2,
                                        total_dispositivos_comodato_2,
                                        dispositivos_comodato_3,
                                        cantidad_dispositivos_comodato_3,
                                        unidad_dispositivos_comodato_3,
                                        total_dispositivos_comodato_3,
                                        observaciones_dispositivos_comodato,
                                        medio_contacto,
                                        otro,
                                        crsfToken
                                    );
                    //Alert de guardado con éxito
                    swal("¡Formato de solicitud guardado con éxito!", {
                        icon: "success",
                    });
                    
                }else if(res == null){ //Valida que el usuario presione el boton cancelar
                    return
                }else{
                    //Cambio de atributos
                    guardarSolicitud(
                                        res, 
                                        fecha_creacion,
                                        nombre_usuario,
                                        frecuencia_servicio,
                                        select_clientes,
                                        select_sedes,
                                        contacto_name_factura,
                                        contacto_telefono_factura,
                                        contacto_celular_factura,
                                        observaciones_tecnico,
                                        total_plan,
                                        instrucciones,
                                        estaciones_roedor,
                                        lamparas_control,
                                        cajas_alcantarilla,
                                        trampas_plasticas,
                                        numero_casas,
                                        numero_aptos,
                                        numero_bodegas,
                                        contrato,
                                        forma_pago,
                                        facturacion,
                                        servicios_1,
                                        frecuencia_servicios_1,
                                        valor_servicios_1,
                                        servicios_2,
                                        frecuencia_servicios_2,
                                        valor_servicios_2,
                                        servicios_3,
                                        frecuencia_servicios_3,
                                        valor_servicios_3,
                                        total_servicios,
                                        dispositivos_1,
                                        cantidad_dispositivos_1,
                                        unidad_dispositivos_1,
                                        total_dispositivos_1,
                                        dispositivos_2,
                                        cantidad_dispositivos_2,
                                        unidad_dispositivos_2,
                                        total_dispositivos_2,
                                        dispositivos_3,
                                        cantidad_dispositivos_3,
                                        unidad_dispositivos_3,
                                        total_dispositivos_3,
                                        observaciones_dispositivos,
                                        dispositivos_comodato_1,
                                        cantidad_dispositivos_comodato_1,
                                        unidad_dispositivos_comodato_1,
                                        total_dispositivos_comodato_1,
                                        dispositivos_comodato_2,
                                        cantidad_dispositivos_comodato_2,
                                        unidad_dispositivos_comodato_2,
                                        total_dispositivos_comodato_2,
                                        dispositivos_comodato_3,
                                        cantidad_dispositivos_comodato_3,
                                        unidad_dispositivos_comodato_3,
                                        total_dispositivos_comodato_3,
                                        observaciones_dispositivos_comodato,
                                        medio_contacto,
                                        otro,
                                        crsfToken
                                    );
                    swal("¡Formato de solicitud guardado con éxito!", {
                        icon: "success",
                    }); 
                }
            });
        })
    </script>
@endsection

@endsection