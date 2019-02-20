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
    {!! Form::open(array('route'=>('solicitud.store'), 'method'=>'POST', 'autocomplete'=>'on', 'id' =>
    'form-inspeccion')) !!}
    {!! Form::token() !!}

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox-title col-lg-12">
                                        <h1>FORMATO DE INSPECCIÓN</h1>
                                        <br>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-4" id="data_1">
                                        <label>Fecha *</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                                type="text" id="fecha_creacion" class="form-control" placeholder=""
                                                name="fecha_creacion" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Inspector Comercial:</label>
                                        <input style="text-transform: uppercase" type="text" id="nombre_usuario" name="nombre-usuario"
                                            placeholder="" class="form-control" >
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Frecuencia del Servicio</label>

                                        <select style="text-transform: uppercase" class="form-control" id="frecuencia_servicio"
                                            name="frecuencia_servicio" required>
                                            <option value="" selected>Seleccione una frecuencia</option>
                                            <option value="Semanal">SEMANAL</option>
                                            <option value="Quincenal">QUINCENAL</option>
                                            <option value="Mensual">MENSUAL</option>
                                            <option value="Bimestral">BIMESTRAL</option>
                                            <option value="Trimestral">TRIMESTRAL</option>
                                            <option value="Cuatrimestral">CUATRIMESTRAL</option>
                                            <option value="Semestral">SEMESTRAL</option>
                                            <option value="Anual">ANUAL</option>
                                            <option value="Ocasional">OCASIONAL</option>
                                        </select>

                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <h3>Facturar a Nombre de:</h3>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Razón Social/Nombre *</label>

                                        <!-- Select con Autocompletar-->
                                        <select data-placeholder="Seleccione NIT" class="chosen-select" tabindex="2" id="id_cliente"
                                            name="id_cliente" required>
                                            <option value="" selected disabled>Selecciona un cliente</option>
                                            @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre_cliente}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                        <input type="text" id="input-nit" name="input-nit" placeholder="Nit ó Cedula"
                                            class="form-control">

                                    </div>


                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-direccion" name="input-direccion" placeholder="Dirección de cliente"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-ciudad" name="input-ciudad" placeholder="Ciudad del cliente"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-barrio" name="input-barrio" placeholder="Barrio del cliente"
                                            class="form-control">

                                    </div>


                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-contacto" name="input-contacto" placeholder="Nombre de contacto del servicio"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Cargo *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-cargo" name="input-cargo" placeholder="Zona del cliente"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-telefono" name="input-telefono" placeholder="Teléfono del contacto a facturar"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-celular" name="input-celular" placeholder="Celular del contacto a facturar"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email" id="input-email" name="input-email" placeholder="Email del contacto a facturar"
                                            class="form-control">

                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Realizar Servicio en:</h3>
                                        <br>
                                    </div>


                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Razón Social/Nombre *</label>

                                        <select style="text-transform: uppercase" class="form-control" id="select_sedes" name="id_sede">
                                            <option value="">Selecciona una sede</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                        <input type="text" id="input-sede-nit" name="input-sede-nit" placeholder="Nit ó Cedula"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-direccion" name="input-sede-direccion"
                                            placeholder="Dirección de donde se realizará el servicio" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-ciudad" name="input-sede-ciudad" placeholder="Ciudad donde se realizará el servicio"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-barrio" name="input-sede-barrio" placeholder="Barrio donde se realizará el servicio"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Zona *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-zona" name="input-sede-zona" placeholder="Zona donde se realizará el servicio"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-contacto" name="input-sede-contacto"
                                            placeholder="Nombre de contacto del lugar" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-telefono" name="input-sede-telefono"
                                            placeholder="Teléfono del contacto del servicio" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-celular" name="input-sede-celular"
                                            placeholder="Celular del contacto del lugar" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email" id="input-sede-email" name="input-sede-email" placeholder="Email del contacto del servicio"
                                            class="form-control">

                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto Factura *</label>
                                        <input type="text" style="text-transform: uppercase" placeholder="Nombre del contacto a facturar" name="contacto-name-factura"
                                            id="contacto_name_factura" class="form-control" style="display: block;">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                        <input type="text" style="text-transform: uppercase" placeholder="Teléfono del contacto a facturar" name="contacto-telefono-factura"
                                            id="contacto_telefono_factura" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" style="text-transform: uppercase" placeholder="Celular del contacto a facturar" name="contacto-celular-factura"
                                            id="contacto_celular_factura" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Instrucciones y Observaciones</label>
                                        <textarea style="text-transform: uppercase" style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones para el técnico."
                                            rows="3" name="instrucciones" id="observaciones_tecnico" required></textarea>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Plan de Saneamiento</h3>
                                        <button type="button" style="margin-top: -35px;" class="btn btn-primary pull-right" id="btn-add-visitas"><i
                                                class="fa fa-plus"></i> Agregar visitas</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" style="padding: 15px 15px" id="visitas">
                                        <div class="form-group col-lg-2">
                                            <label class="control-label"># Visita</label>
                                            <input type="number" min=0 name="num_visita-0" id="num_visita-0" placeholder="Ej: 1"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-lg-4 b-r">
                                            <label>Duración del servicio</label>
                                            <div class="input-group">
                                                <input style="width: 40%;margin-right: 10px;" type="number" min="0" max="11"
                                                    class="form-control" id="num_horas_visita-0" placeholder="Horas">
                                                <input style="width: 42%;margin-left: 10px;" type="number" min="0" max="60"
                                                    class="form-control" id="num_minutos_visita-0" placeholder="Minutos">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor plan de saneamiento</label>
                                        <input type="number" min=0 name="total_plan" id="total_plan" placeholder="Valor total"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Frecuencia de visitas</label>
                                        <select style="text-transform: uppercase" id="frecuencia_visitas_plan" class="form-control">
                                            <option value="8">Cada 8 días</option>
                                            <option value="10">Cada 10 días</option>
                                            <option value="12">Cada 12 días</option>
                                            <option value="15">Cada 15 días</option>
                                            <option value="20">Cada 20 días</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label>Observaciones</label>
                                        <textarea style="text-transform: uppercase" style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                                            rows="1" name="observaciones_plan" id="observaciones_plan"></textarea>
                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Detalle y valor del servicio preventivo y/o correctivo</h3>
                                        <button type="button" style="margin-top: -35px;" class="btn btn-primary pull-right" id="btn-add-servicio"><i
                                                class="fa fa-plus"></i> Agregar servicio</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="detalle-servicios" style="padding: 15px 15px;">
                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Servicio a incluir</label>
                                            <select style="text-transform: uppercase" id="servicio_detalle-0" class="form-control">
                                                <option value="8">Cada 8 días</option>
                                                <option value="10">Cada 10 días</option>
                                                <option value="12">Cada 12 días</option>
                                                <option value="15">Cada 15 días</option>
                                                <option value="20">Cada 20 días</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label class="control-label">Valor </label>
                                            <input type="number" min=0 name="valor_servicio_detalle-0" id="valor_servicio_detalle-0"
                                                placeholder="Valor total" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label class="control-label">Frecuencia</label>
                                            <select style="text-transform: uppercase" id="frecuencia_servicio_detalle-0" class="form-control">
                                                <option value="" selected>Seleccione una frecuencia</option>
                                                <option value="Semanal">SEMANAL</option>
                                                <option value="Quincenal">QUINCENAL</option>
                                                <option value="Mensual">MENSUAL</option>
                                                <option value="Bimestral">BIMESTRAL</option>
                                                <option value="Trimestral">TRIMESTRAL</option>
                                                <option value="Cuatrimestral">CUATRIMESTRAL</option>
                                                <option value="Semestral">SEMESTRAL</option>
                                                <option value="Anual">ANUAL</option>
                                                <option value="Ocasional">OCASIONAL</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label>Observaciones</label>
                                            <textarea style="text-transform: uppercase" style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                                                rows="1" name="observacion_servicio_detalle-0" id="observacion_servicio_detalle-0"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Total a facturar</label>
                                        <input type="number" min=0 name="total_servicio_detalle" id="total_servicio_detalle"
                                            placeholder="Valor total" class="form-control" readonly>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Forma de Pago de Servicios </h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Facturación</label>
                                        <select style="text-transform: uppercase" id="tipo_facturacion" class="form-control">
                                            <option value="" selected>Seleccione una opción</option>
                                            <option value="sc">SC</option>
                                            <option value="green">GREEN</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Forma de pago</label>
                                        <select style="text-transform: uppercase" id="forma_pago" class="form-control">
                                            <option value="" selected>Seleccione una opción</option>
                                            <option value="contado">CONTADO</option>
                                            <option value="8_dias">8 Dias</option>
                                            <option value="10_dias">10 Dias</option>
                                            <option value="15_dias">15 Dias</option>
                                            <option value="20_dias">20 Dias</option>
                                            <option value="30_dias">30 Dias</option>
                                            <option value="60_dias">60 Dias</option>
                                            <option value="90_dias">90 Dias</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">¿Tiene contrato?</label>
                                        <select style="text-transform: uppercase" id="contrato" class="form-control">
                                            <option value="" selected>Seleccione una opción</option>
                                            <option value="si">SI</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Número de Residencias</h3>
                                        <button type="button" style="margin-top: -35px;" class="btn btn-primary pull-right" id="btn-add-residencia"><i
                                                class="fa fa-plus"></i> Agregar residencia</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="residencias" style="padding: 15px 15px">
                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Tipo de residencia</label>
                                            <select style="text-transform: uppercase" id="tipo_residencia-0" class="form-control">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="casa">casa</option>
                                                <option value="apto">apto</option>
                                                <option value="bodega">bodega</option>
                                                <option value="local">local</option>
                                                <option value="oficina">oficina</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Valor</label>
                                            <input type="number" min=0 name="valor_residencia-0" id="valor_residencia-0"
                                                placeholder="Valor total" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3 ">
                                            <label>Duración del servicio</label>
                                            <div class="input-group">
                                                <input style="width: 40%;margin-right: 10px;" type="number" min="0" max="11"
                                                    class="form-control" id="num_horas_residencia-0" placeholder="Horas">
                                                <input style="width: 42%;margin-left: 10px;" type="number" min="0" max="60"
                                                    class="form-control" id="num_minutos_residencia-0" placeholder="Minutos">
                                            </div>
                                        </div>


                                        <div class="form-group col-lg-3 ">
                                            <label>Observaciones</label>
                                            <textarea style="text-transform: uppercase" style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                                                rows="1" name="observaciones_residencia-0" id="observaciones_residencia-0"></textarea>
                                        </div>
                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Inventario Inicial del Cliente</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Lámpara con lámina</label>
                                        <input type="number" min=0 name="cantidad_lampara_lamina" id="cantidad_lampara_lamina"
                                            placeholder="Valor total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Lámpara insectocutora</label>
                                        <input type="number" min=0 name="cant_lampara_insectocutora" id="cant_lampara_insectocutora"
                                            placeholder="Valor total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Trampas de impacto</label>
                                        <input type="number" min=0 name="cant_trampas_impacto" id="cant_trampas_impacto"
                                            placeholder="Valor total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Jaulas</label>
                                        <input type="number" min=0 name="cant_jaulas" id="cant_jaulas"
                                            placeholder="Valor total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Estaciones de roedor</label>
                                        <input type="number" min=0 name="cant_estaciones_roedor" id="cant_estaciones_roedor"
                                            placeholder="Valor total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Observaciones</label>
                                        <textarea style="text-transform: uppercase" style="text-transform: uppercase" name="observaciones_estaciones" id="observaciones_estaciones" placeholder="Escriba aquí las observaciones"
                                            rows="1" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Cajas de alcantarilla y eléctricas</label>
                                        <input type="number" min=0 name="cant_cajas" id="cant_cajas"
                                            placeholder="Valor total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Sumideros</label>
                                        <input type="number" min=0 name="cant_sumideros" id="cant_sumideros"
                                            placeholder="Valor total" class="form-control">
                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Compra de Dispositivos</h3>
                                        <button type="button" style="margin-top: -35px;" class="btn btn-primary pull-right" id="btn-add-dispositivo"><i
                                                class="fa fa-plus"></i> Agregar dispositivo</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="dispositivos" style="padding: 15px 15px">

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Tipo de dispositivo</label>
                                            <select style="text-transform: uppercase" id="tipo_dispositivo-0" class="form-control">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="estaciones_de_roedor">estaciones de roedor</option>
                                                <option value="identificadores_estaciones">identificadores de
                                                    estaciones</option>
                                                <option value="lamparas_de_lamina_adhesiva">lamparas de lamina adhesiva</option>
                                                <option value="lamparas de lamina_adhesiva_p">lamparas de lamina
                                                    adhesiva p.</option>
                                                <option value="lamparas_insetocutoras">lamparas insetocutoras</option>
                                                <option value="identificadores_lamparas">identificadores de lamparas</option>
                                                <option value="jaula_pequena">jaula pequeña</option>
                                                <option value="jaula_grande">jaula grande</option>
                                                <option value="trampa_de_impacto_plastica">trampa de impacto plastica</option>
                                                <option value="trampa_de_impacto_madera">trampa de impacto madera</option>
                                                <option value="cebadero_moscas">cebadero moscas</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-1">
                                            <label class="control-label">Cant.</label>
                                            <input type="text" id="cant_dispositivo-0" name="cant_dispositivo-0" placeholder=""
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label class="control-label">Valor unitario sin IVA</label>
                                            <input type="text" id="valor_sin_iva_dispositivo-0" name="valor_sin_iva_dispositivo-0" placeholder="Nombre de dispositivo"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Valor total.</label>
                                            <input type="text" id="total_dispositivo-0" name="total_dispositivo-0" placeholder="Nombre de dispositivo"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3 ">
                                            <label>Observaciones</label>
                                            <textarea style="text-transform: uppercase" style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                                                rows="1" name="observacion_dispositivo-0" id="observacion_dispositivo-0"></textarea>
                                        </div>

                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Dispositivos en Comodato para esta Propuesta</h3>
                                        <button type="button" style="margin-top: -35px;" class="btn btn-primary pull-right" id="btn-add-dispositivo-comodato"><i
                                                class="fa fa-plus"></i> Agregar dispositivo</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="dispositivos-comodato" style="padding: 15px 15px">

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Tipo de dispositivo</label>
                                            <select style="text-transform: uppercase" id="tipo_dispositivo_comodato-0" class="form-control">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="estaciones_de_roedor">estaciones de roedor</option>
                                                <option value="identificadores_estaciones">identificadores de
                                                    estaciones</option>
                                                <option value="lamparas_de_lamina_adhesiva">lamparas de lamina adhesiva</option>
                                                <option value="lamparas de lamina_adhesiva_p">lamparas de lamina
                                                    adhesiva p.</option>
                                                <option value="lamparas_insetocutoras">lamparas insetocutoras</option>
                                                <option value="identificadores_lamparas">identificadores de lamparas</option>
                                                <option value="jaula_pequena">jaula pequeña</option>
                                                <option value="jaula_grande">jaula grande</option>
                                                <option value="trampa_de_impacto_plastica">trampa de impacto plastica</option>
                                                <option value="trampa_de_impacto_madera">trampa de impacto madera</option>
                                                <option value="cebadero_moscas">cebadero moscas</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-1">
                                            <label class="control-label">Cant.</label>
                                            <input type="text" id="cant_dispositivo_comodato-0" name="cant_dispositivo_comodato-0" placeholder=""
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label class="control-label">Valor unitario sin IVA</label>
                                            <input type="text" id="valor_sin_iva_dispositivo_comodato-0" name="valor_sin_iva_dispositivo_comodato-0" placeholder="Nombre de dispositivo"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Valor total.</label>
                                            <input type="text" id="total_dispositivo_comodato-0" name="total_dispositivo_comodato-0" placeholder="Nombre de dispositivo"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3 ">
                                            <label>Observaciones</label>
                                            <textarea style="text-transform: uppercase" style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                                                rows="1" name="observacione_dispositivo_comodato-0" id="observacione_dispositivo_comodato-0"></textarea>
                                        </div>

                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Gestion de calidad</h3>
                                        <button type="button" style="margin-top: -35px;" class="btn btn-primary pull-right" id="btn-add-doc"><i
                                                class="fa fa-plus"></i> Agregar documento</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="gestion-calidad" style="padding: 15px 15px">
                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Tipo de documento</label>
                                            <select style="text-transform: uppercase" id="tipo_doc-0" class="form-control">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="diagnostico_inicial">diagnostico inicial</option>
                                                <option value="cronograma_servicios">cronograma de servicios</option>
                                                <option value="mapas_estaciones_lamparas">mapas de estaciones/lamparas</option>
                                                <option value="visitas_calidad">visitas_calidad</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Frecuencia.</label>
                                            <select style="text-transform: uppercase" id="frecuencia_doc-0" class="form-control">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="mensual">mensual</option>
                                                <option value="semanal">semanal</option>
                                                <option value="quincenal">quincenal</option>
                                                <option value="bimestral">bimestral</option>
                                                <option value="trimestral">trimestral</option>
                                                <option value="cuatrimestral">cuatrimestral</option>
                                                <option value="semestral">semestral</option>
                                                <option value="anual">anual</option>
                                                <option value="ocasional">ocasional</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label>Observaciones</label>
                                            <textarea style="text-transform: uppercase" style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                                                rows="1" name="observacion_doc-0" id="observacion_doc-0"></textarea>
                                        </div>
                                    </div>


                                    <hr>
                                    <br>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Áreas</h3>
                                        <button type="button" style="margin-top: -35px;" class="btn btn-primary pull-right" id="btn-add-area"><i
                                                class="fa fa-plus"></i> Agregar área</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="areas" style="padding: 15px 15px">
                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Nombre y/o descripción del área</label>
                                            <input type="text" style="text-transform: uppercase" id="area-0" name="area-0" placeholder="Nombre de dispositivo"
                                                class="form-control">
                                        </div>
    
                                        <div class="form-group col-lg-3 ">
                                            <label>Tiempo estimado</label>
                                            <div class="input-group">
                                                <input style="width: 40%;margin-right: 10px;" type="number" min="0" max="11"
                                                    class="form-control" id="num_horas_area-0" placeholder="Horas">
                                                <input style="width: 42%;margin-left: 10px;" type="number" min="0" max="60"
                                                    class="form-control" id="num_minutos_area-0" placeholder="Minutos">
                                            </div>
                                        </div>
    
                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Evidencia y/o plaga observada</label>
                                            <select style="text-transform: uppercase" data-placeholder="Seleccione las opciones" class="chosen-select" multiple style="width:350px;" tabindex="4" id="plagas_area-0">
                                                <option value="cucarachas">CUCARACHAS</option>
                                                <option value="moscas">MOSCAS</option>
                                                <option value="pulgas">PULGAS</option>
                                                <option value="hormigas">HORMIGAS</option>
                                                <option value="mosquitos">MOSQUITOS</option>
                                                <option value="garrapatas">GARRAPATAS</option>
                                                <option value="roedores">ROEDORES</option>
                                                <option value="aranas">ARAÑAS</option>
                                                <option value="chinches">CHINCHES</option>
                                            </select>
                                        </div>
    
                                        <div class="form-group col-lg-2">
                                            <label class="control-label">Nivel act.</label>
                                            <select style="text-transform: uppercase" name="nivel_area-0" id="nivel_area-0" class="form-control">
                                                <option value="alto">alto</option>
                                                <option value="medio">medio</option>
                                                <option value="bajo">bajo</option>
                                                <option value="no">no</option>
                                            </select>
                                        </div>
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

    $(document).ready(function () {
        var date = moment().format("YYYY-MM-DD");
        $('#fecha_creacion').val(date);
    });

    //Inicializador del Select AUTOCOMPLETAR
    $('.chosen-select').chosen({ width: "100%" });

    //Evento change del select de clientes
    $("#id_cliente").change(event => {
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
        $.get(`/sedes/cliente/${event.target.value}`, function (res) {
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
            if (res == '') {//Valida que el cliente tenga sedes
                $("#select_sedes").append(`<option value='' disabled selected> Sede Única </option>`);
                $("#select_sedes").prop('required', false);

                $("#select_sedes").prop('disabled', true);
                $("#input-sede-nit").prop('disabled', true);
                $("#input-sede-direccion").prop('disabled', true);
                $("#input-sede-ciudad").prop('disabled', true);
                $("#input-sede-barrio").prop('disabled', true);
                $("#input-sede-zona").prop('disabled', true);
                $("#input-sede-contacto").prop('disabled', true);
                $("#input-sede-telefono").prop('disabled', true);
                $("#input-sede-celular").prop('disabled', true);
                $("#input-sede-email").prop('disabled', true);
            } else {
                $("#select_sedes").append(`<option value='' disabled selected> Selecciona una sede </option>`);
                $("#select_sedes").prop('required', true);

                $("#select_sedes").prop('disabled', false);
                $("#input-sede-nit").prop('disabled', false);
                $("#input-sede-direccion").prop('disabled', false);
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

    /* Estructuras de repecticion de inputs del formulario
    -------------------------------------------------------*/
    var contVisitas = 1;
    var contServicio = 1;
    var contResidencias = 1;
    var contDispositivos = 1;
    var contComodatos = 1;
    var contDocs = 1;
    var contAreas = 1;

    //Plan de sanemaiento
    $("#btn-add-visitas").click(function(){
        $("#visitas").append(`
            <div class="form-group col-lg-2">
                <label class="control-label"># Visita</label>
                <input type="number" min=0 name="num_visita-${contVisitas}" id="num_visita-${contVisitas}" placeholder="Ej: 1"
                    class="form-control">
            </div>
            <div class="form-group col-lg-4 b-r">
                <label>Duración del servicio</label>
                <div class="input-group">
                    <input style="width: 40%;margin-right: 10px;" type="number" min="0" max="11"
                        class="form-control" id="num_horas_visita-${contVisitas}" placeholder="Horas">
                    <input style="width: 42%;margin-left: 10px;" type="number" min="0" max="60"
                        class="form-control" id="num_minutos_visita-${contVisitas}" placeholder="Minutos">
                </div>
            </div>
        `)
        contVisitas++;
    })

    //Detalle del servicio correctivo y/o preventivo
    $("#btn-add-servicio").click(function(){
        $("#detalle-servicios").append(`
            <div class="form-group col-lg-4">
                <label class="control-label">Servicio a incluir</label>
                <select style="text-transform: uppercase" id="servicio_detalle-${contServicio}" class="form-control">
                    <option value="8">Cada 8 días</option>
                    <option value="10">Cada 10 días</option>
                    <option value="12">Cada 12 días</option>
                    <option value="15">Cada 15 días</option>
                    <option value="20">Cada 20 días</option>
                </select>
            </div>

            <div class="form-group col-lg-2">
                <label class="control-label">Valor </label>
                <input type="number" min=0 name="valor_servicio_detalle-${contServicio}" id="valor_servicio_detalle-${contServicio}"
                    placeholder="Valor total" class="form-control">
            </div>

            <div class="form-group col-lg-2">
                <label class="control-label">Frecuencia</label>
                <select style="text-transform: uppercase" id="frecuencia_servicio_detalle-${contServicio}" class="form-control">
                    <option value="" selected>Seleccione una frecuencia</option>
                    <option value="Semanal">SEMANAL</option>
                    <option value="Quincenal">QUINCENAL</option>
                    <option value="Mensual">MENSUAL</option>
                    <option value="Bimestral">BIMESTRAL</option>
                    <option value="Trimestral">TRIMESTRAL</option>
                    <option value="Cuatrimestral">CUATRIMESTRAL</option>
                    <option value="Semestral">SEMESTRAL</option>
                    <option value="Anual">ANUAL</option>
                    <option value="Ocasional">OCASIONAL</option>
                </select>
            </div>

            <div class="form-group col-lg-4">
                <label>Observaciones</label>
                <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                    rows="1" name="observacion_servicio_detalle-${contServicio}" id="observacion_servicio_detalle-${contServicio}"></textarea>
            </div>
        `)
        contServicio++;
    })

    //Numero de residencias
    $("#btn-add-residencia").click(function(){
        $("#residencias").append(`
            <div class="form-group col-lg-3">
                <label class="control-label">Tipo de residencia</label>
                <select style="text-transform: uppercase" id="tipo_residencia-${contResidencias}" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                    <option value="casa">casa</option>
                    <option value="apto">apto</option>
                    <option value="bodega">bodega</option>
                    <option value="local">local</option>
                    <option value="oficina">oficina</option>
                </select>
            </div>

            <div class="form-group col-lg-3">
                <label class="control-label">Valor</label>
                <input type="number" min=0 name="valor_residencia-${contResidencias}" id="valor_residencia-${contResidencias}"
                    placeholder="Valor total" class="form-control">
            </div>

            <div class="form-group col-lg-3 ">
                <label>Duración del servicio</label>
                <div class="input-group">
                    <input style="width: 40%;margin-right: 10px;" type="number" min="0" max="11"
                        class="form-control" id="num_horas_residencia-${contResidencias}" placeholder="Horas">
                    <input style="width: 42%;margin-left: 10px;" type="number" min="0" max="60"
                        class="form-control" id="num_minutos_residencia-${contResidencias}" placeholder="Minutos">
                </div>
            </div>


            <div class="form-group col-lg-3 ">
                <label>Observaciones</label>
                <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                    rows="1" name="observaciones_residencia-${contResidencias}" id="observaciones_residencia-${contResidencias}"></textarea>
            </div>
        `)
        contResidencias++;
    })

    //Compra de dispositivos
    $("#btn-add-dispositivo").click(function(){
        $("#dispositivos").append(`
            <div class="form-group col-lg-3">
                <label class="control-label">Tipo de dispositivo</label>
                <select style="text-transform: uppercase" id="tipo_dispositivo-${contDispositivos}" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                    <option value="estaciones_de_roedor">estaciones de roedor</option>
                    <option value="identificadores_estaciones">identificadores de
                        estaciones</option>
                    <option value="lamparas_de_lamina_adhesiva">lamparas de lamina adhesiva</option>
                    <option value="lamparas de lamina_adhesiva_p">lamparas de lamina
                        adhesiva p.</option>
                    <option value="lamparas_insetocutoras">lamparas insetocutoras</option>
                    <option value="identificadores_lamparas">identificadores de lamparas</option>
                    <option value="jaula_pequena">jaula pequeña</option>
                    <option value="jaula_grande">jaula grande</option>
                    <option value="trampa_de_impacto_plastica">trampa de impacto plastica</option>
                    <option value="trampa_de_impacto_madera">trampa de impacto madera</option>
                    <option value="cebadero_moscas">cebadero moscas</option>
                </select>
            </div>

            <div class="form-group col-lg-1">
                <label class="control-label">Cant.</label>
                <input type="text" id="cant_dispositivo-${contDispositivos}" name="cant_dispositivo-${contDispositivos}" placeholder=""
                    class="form-control">
            </div>

            <div class="form-group col-lg-2">
                <label class="control-label">Valor unitario sin IVA</label>
                <input type="text" id="valor_sin_iva_dispositivo-${contDispositivos}" name="valor_sin_iva_dispositivo-${contDispositivos}" placeholder="Nombre de dispositivo"
                    class="form-control">
            </div>

            <div class="form-group col-lg-3">
                <label class="control-label">Valor total.</label>
                <input type="text" id="total_dispositivo-${contDispositivos}" name="total_dispositivo-${contDispositivos}" placeholder="Nombre de dispositivo"
                    class="form-control">
            </div>

            <div class="form-group col-lg-3 ">
                <label>Observaciones</label>
                <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                    rows="1" name="observacion_dispositivo-${contDispositivos}" id="observacion_dispositivo-${contDispositivos}"></textarea>
            </div>
        `)
        contDispositivos++;
    })

    //Dispositivos en comodato
    $("#btn-add-dispositivo-comodato").click(function(){
        $("#dispositivos-comodato").append(`
            <div class="form-group col-lg-3">
                <label class="control-label">Tipo de dispositivo</label>
                <select style="text-transform: uppercase" id="tipo_dispositivo_comodato-${contComodatos}" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                    <option value="estaciones_de_roedor">estaciones de roedor</option>
                    <option value="identificadores_estaciones">identificadores de
                        estaciones</option>
                    <option value="lamparas_de_lamina_adhesiva">lamparas de lamina adhesiva</option>
                    <option value="lamparas de lamina_adhesiva_p">lamparas de lamina
                        adhesiva p.</option>
                    <option value="lamparas_insetocutoras">lamparas insetocutoras</option>
                    <option value="identificadores_lamparas">identificadores de lamparas</option>
                    <option value="jaula_pequena">jaula pequeña</option>
                    <option value="jaula_grande">jaula grande</option>
                    <option value="trampa_de_impacto_plastica">trampa de impacto plastica</option>
                    <option value="trampa_de_impacto_madera">trampa de impacto madera</option>
                    <option value="cebadero_moscas">cebadero moscas</option>
                </select>
            </div>

            <div class="form-group col-lg-1">
                <label class="control-label">Cant.</label>
                <input type="text" id="cant_dispositivo_comodato-${contComodatos}" name="cant_dispositivo_comodato-${contComodatos}" placeholder=""
                    class="form-control">
            </div>

            <div class="form-group col-lg-2">
                <label class="control-label">Valor unitario sin IVA</label>
                <input type="text" id="valor_sin_iva_dispositivo_comodato-${contComodatos}" name="valor_sin_iva_dispositivo_comodato-${contComodatos}" placeholder="Nombre de dispositivo"
                    class="form-control">
            </div>

            <div class="form-group col-lg-3">
                <label class="control-label">Valor total.</label>
                <input type="text" id="total_dispositivo_comodato-${contComodatos}" name="total_dispositivo_comodato-${contComodatos}" placeholder="Nombre de dispositivo"
                    class="form-control">
            </div>

            <div class="form-group col-lg-3 ">
                <label>Observaciones</label>
                <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                    rows="1" name="observacione_dispositivo_comodato-${contComodatos}" id="observacione_dispositivo_comodato-${contComodatos}"></textarea>
            </div>
        `)
        contComodatos++;
    })

    //Gestion de calidad
    $("#btn-add-doc").click(function(){
        $('#gestion-calidad').append(`
            <div class="form-group col-lg-4">
                <label class="control-label">Tipo de documento</label>
                <select style="text-transform: uppercase" id="tipo_doc-${contDocs}" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                    <option value="diagnostico_inicial">diagnostico inicial</option>
                    <option value="cronograma_servicios">cronograma de servicios</option>
                    <option value="mapas_estaciones_lamparas">mapas de estaciones/lamparas</option>
                    <option value="visitas_calidad">visitas_calidad</option>
                </select>
            </div>

            <div class="form-group col-lg-4">
                <label class="control-label">Frecuencia.</label>
                <select style="text-transform: uppercase" id="frecuencia_doc-${contDocs}" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                    <option value="mensual">mensual</option>
                    <option value="semanal">semanal</option>
                    <option value="quincenal">quincenal</option>
                    <option value="bimestral">bimestral</option>
                    <option value="trimestral">trimestral</option>
                    <option value="cuatrimestral">cuatrimestral</option>
                    <option value="semestral">semestral</option>
                    <option value="anual">anual</option>
                    <option value="ocasional">ocasional</option>
                </select>
            </div>

            <div class="form-group col-lg-4">
                <label>Observaciones</label>
                <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                    rows="1" name="observacion_doc-${contDocs}" id="observacion_doc-${contDocs}"></textarea>
            </div>
        `)
        contDocs++;
    })

    //Descripcion de areas
    $("#btn-add-area").click(function(){
        $("#areas").append(`
            <div class="form-group col-lg-3">
                <label class="control-label">Nombre y/o descripción del área</label>
                <input type="text" style="text-transform: uppercase" id="area-${contAreas}" name="area-${contAreas}" placeholder="Nombre de dispositivo"
                    class="form-control">
            </div>

            <div class="form-group col-lg-3 ">
                <label>Tiempo estimado</label>
                <div class="input-group">
                    <input style="width: 40%;margin-right: 10px;" type="number" min="0" max="11"
                        class="form-control" id="num_horas_area-${contAreas}" placeholder="Horas">
                    <input style="width: 42%;margin-left: 10px;" type="number" min="0" max="60"
                        class="form-control" id="num_minutos_area-${contAreas}" placeholder="Minutos">
                </div>
            </div>

            <div class="form-group col-lg-4">
                <label class="control-label">Evidencia y/o plaga observada</label>
                <select style="text-transform: uppercase" data-placeholder="Seleccione las opciones" class="chosen-select" multiple style="width:350px;" tabindex="4" id="plagas_area-${contAreas}">
                    <option value="cucarachas">CUCARACHAS</option>
                    <option value="moscas">MOSCAS</option>
                    <option value="pulgas">PULGAS</option>
                    <option value="hormigas">HORMIGAS</option>
                    <option value="mosquitos">MOSQUITOS</option>
                    <option value="garrapatas">GARRAPATAS</option>
                    <option value="roedores">ROEDORES</option>
                    <option value="aranas">ARAÑAS</option>
                    <option value="chinches">CHINCHES</option>
                </select>
            </div>

            <div class="form-group col-lg-2">
                <label class="control-label">Nivel act.</label>
                <select style="text-transform: uppercase" name="nivel_area-${contAreas}" id="nivel_area-${contAreas}" class="form-control">
                    <option value="alto">alto</option>
                    <option value="medio">medio</option>
                    <option value="bajo">bajo</option>
                    <option value="no">no</option>
                </select>
            </div>
        `)
        $('.chosen-select').chosen({ width: "100%" });
        contAreas++;
    })


    //Generar numero aleatorio
    function codigoAleatorio() {
        var randomCode = Math.round(Math.random() * (9999 - 0));
        if (randomCode <= 9) {
            return "INSP00" + randomCode.toString();
        } else if (randomCode >= 9 && randomCode <= 99) {
            return "INSP0" + randomCode.toString();
        } else {
            return "INSP" + randomCode.toString();
        }
    }

    /* Estructura de datos para envio del formulario
    -----------------------------------------------------*/
    $('#form-inspeccion').submit(e => {
        e.preventDefault();
        var crsfToken = document.getElementsByName("_token")[0].value; //Obtiene el token del formulario a enviar
        var dataToSend = {
            codigo: '',
            nombre_usuario: '',
            fecha: '',
            frecuencia: '',
            observaciones: '',
            valor_plan_saneamiento: '',
            frecuencia_visitas: '',
            observaciones_visitas: '',
            total_detalle_servicios: '',
            tipo_facturacion: '',
            forma_pago: '',
            contrato: '',
            cant_lampara_lamina: '',
            cant_lampara_insectocutora: '',
            cant_trampas: '',
            cant_jaulas: '',
            cant_estaciones_roedor: '',
            observaciones_estaciones: '',
            cant_cajas_alca_elec: '',
            sumideros: '',
            cliente_id: '',
            sede_id: '',
            visitas: [],
            detalle_servicios: [],
            residencias: [],
            compra_dispositivos: [],
            dispositivos_comodato: [],
            gestion_calidad: [],
            areas: [],
        }

        //Plan de saneamiento
        for (let index = 0; index < contVisitas; index++) {
            dataToSend.visitas[index] = {
                num_visita: $(`#num_visita-${index}`).val(),
                duracion: (parseInt($(`#num_horas_visita-${index}`).val()) * 60) + parseInt($(`#num_minutos_visita-${index}`).val())
            }
        }

        //Detalle del servicio correctivo y/o preventivo
        for (let index = 0; index < contServicio; index++) {
            dataToSend.detalle_servicios[index] = {
                tipo_servicio: $(`#servicio_detalle-${index}`).val(),
                valor_servicio: $(`#valor_servicio_detalle-${index}`).val(),
                frecuencia_servicio: $(`#frecuencia_servicio_detalle-${index}`).val(),
                observacion_servicio: $(`#observacion_servicio_detalle-${index}`).val()
            }
            
        }

        //Numero de residencias
        for (let index = 0; index < contResidencias; index++) {
            dataToSend.residencias[index] = {
                tipo_residencia: $(`#tipo_residencia-${index}`).val(),
                valor_residencia: $(`#valor_residencia-${index}`).val(),
                tiempo_estimado: (parseInt($(`#num_horas_residencia-${index}`).val()) * 60) + parseInt($(`#num_minutos_residencia-${index}`).val()),
                observaciones_residencia: $(`#observaciones_residencia-${index}`).val()
            }
        }

        //Compra de dispositivos
        for (let index = 0; index < contDispositivos; index++) {
            dataToSend.compra_dispositivos[index] = {
                tipo_dispositivo: $(`#tipo_dispositivo-${index}`).val(),
                cant_dispositivo: $(`#cant_dispositivo-${index}`).val(),
                valor_sin_iva: $(`#valor_sin_iva_dispositivo-${index}`).val(),
                total_dispositivo: $(`#total_dispositivo-${index}`).val(),
                observacion_dispositivo: $(`#observacion_dispositivo-${index}`).val()
            }   
        }
        
        //Dispositivos en comodato
        for (let index = 0; index < contComodatos; index++) {
            dataToSend.dispositivos_comodato[index] = {
                tipo_dispositivo: $(`#tipo_dispositivo_comodato-${index}`).val(),
                cant_dispositivo: $(`#cant_dispositivo_comodato-${index}`).val(),
                valor_sin_iva: $(`#valor_sin_iva_dispositivo_comodato-${index}`).val(),
                total_dispositivo: $(`#total_dispositivo_comodato-${index}`).val(),
                observacion_dispositivo: $(`#observacione_dispositivo_comodato-${index}`).val(),
            }
        }

        //Gestion de calidad
        for (let index = 0; index < contDocs; index++) {
            dataToSend.gestion_calidad[index] = {
                tipo_documento: $(`#tipo_doc-${index}`).val(),
                frecuencia_documento: $(`#frecuencia_doc-${index}`).val(),
                observacion_documento: $(`#observacion_doc-${index}`).val(),
            }
        }

        //Areas de inspeccion
        for (let index = 0; index < contAreas; index++) {
            dataToSend.areas[index] = {
                area: $(`#area-${index}`).val(),
                tiempo_estimado: (parseInt($(`#num_horas_area-${index}`).val()) * 60) + parseInt($(`#num_minutos_area-${index}`).val()),
                plagas_area: $(`#plagas_area-${index}`).val(),
                nivel_actividad_area: $(`#nivel_area-${index}`).val()
            }
            
        }
        
        dataToSend.codigo = codigoAleatorio();
        dataToSend.nombre_usuario = $("#nombre_usuario").val();
        dataToSend.fecha  = $("#fecha_creacion").val();
        dataToSend.frecuencia = $("#frecuencia_servicio").val();
        dataToSend.observaciones = $("#observaciones_tecnico").val();
        dataToSend.valor_plan_saneamiento = $("#total_plan").val();
        dataToSend.frecuencia_visitas = $("#frecuencia_visitas_plan").val();
        dataToSend.observaciones_visitas = $("#observaciones_plan").val();
        dataToSend.total_detalle_servicios = $("#total_servicio_detalle").val();
        dataToSend.tipo_facturacion = $("#tipo_facturacion").val();
        dataToSend.forma_pago = $("#forma_pago").val();
        dataToSend.contrato = $("#contrato").val();
        dataToSend.cant_lampara_lamina = $("#cantidad_lampara_lamina").val();
        dataToSend.cant_lampara_insectocutora = $("#cant_lampara_insectocutora").val();
        dataToSend.cant_trampas = $("#cant_trampas_impacto").val();
        dataToSend.cant_jaulas = $("#cant_jaulas").val();
        dataToSend.cant_estaciones_roedor = $("#cant_estaciones_roedor").val();
        dataToSend.observaciones_estaciones = $("#observaciones_estaciones").val();
        dataToSend.cant_cajas_alca_elec = $("#cant_cajas").val();
        dataToSend.sumideros = $("#cant_sumideros").val();
        dataToSend.cliente_id = $("#id_cliente").val();
        dataToSend.sede_id = $("#select_sedes").val();

        console.log(dataToSend)
        //Alert para cambiar el codigo generado por uno personalizado (opcional)
        swal({
            title: "Código de Inspección",
            text: "Código generado: "+dataToSend.codigo+", escribe otro código aquí: ",
            icon: "warning",
            content: {
                element: "input",
                attributes: {
                placeholder: "Ingresa el código personalizado para el formulario de inspeccion",
                type: "text"
                },
            },
            buttons: true,
            dangerMode: false,
        })
        .then(isConfirm => {
            if(isConfirm){
                console.log(isConfirm)
            }else{
                console.log(dataToSend.codigo)
            }
        })
        .catch(err => {
            console.log()
        })
    })

</script>
@endsection

@endsection