@extends('layouts.app')

@section('custom-css')
<link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection

@section('content')
<script>
    document.getElementById('m-documentacion').setAttribute("class", "active");
    document.getElementById('a-documentacion').removeAttribute("style");
    document.getElementById('ml2-documentacion').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-formato-inspeccion').setAttribute("class", "active");
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
                <strong>Formato de inspeccion</strong>
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
                                        <input style="text-transform: uppercase" type="text" id="nombre_usuario"
                                            name="nombre-usuario" placeholder="" class="form-control"
                                            value="{{ Auth::user()->nombres." ".Auth::user()->apellidos }}">
                                        <br>
                                    </div>

                                    {{-- <div class="form-group col-lg-4">
                                        <label class="control-label">Frecuencia del Servicio</label>

                                        <select style="text-transform: uppercase" class="form-control"
                                            id="frecuencia_servicio" name="frecuencia_servicio" required>
                                            <option value="" disabled selected>Seleccione una frecuencia</option>
                                            <option value="Ocasional" selected>OCASIONAL</option>
                                            <option value="Semanal">SEMANAL</option>
                                            <option value="Quincenal">QUINCENAL</option>
                                            <option value="Mensual">MENSUAL</option>
                                            <option value="Bimestral">BIMESTRAL</option>
                                            <option value="Trimestral">TRIMESTRAL</option>
                                            <option value="Cuatrimestral">CUATRIMESTRAL</option>
                                            <option value="Semestral">SEMESTRAL</option>
                                            <option value="Anual">ANUAL</option>

                                        </select>

                                    </div> --}}


                                    <div class="ibox-title col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-xs-12">
                                                <h3>Facturar a Nombre de:</h3>
                                            </div>
                                            <div class="col-lg-9 col-xs-12" id="client-options">
                                                <input id="radio-1" type="radio" value="create" name="option-client"
                                                    class="i-checks" />
                                                <span class="m-l-xs"
                                                    style="position: relative;margin-right: 20px;">Crear cliente
                                                    nuevo</span>

                                                <input id="radio-2" type="radio" value="exist" name="option-client"
                                                    class="i-checks" checked />
                                                <span class="m-l-xs">Seleccionar cliente existente</span>
                                            </div>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6" id="select-filter">
                                        <label class="control-label">Razón Social/Nombre *</label>

                                        <!-- Select con Autocompletar-->
                                        <select data-placeholder="Seleccione NIT" class="chosen-select" tabindex="2"
                                            id="id_cliente" name="id_cliente">
                                            <option value="" selected disabled>Selecciona un cliente</option>
                                            @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">
                                                {{$cliente->nombre_cliente." - ".$cliente->razon_social}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6" id="input-create">
                                        <label class="control-label">Razón Social/Nombre *</label>
                                        <input type="text" style="text-transform: uppercase" id="nombre_cliente"
                                            name="nombre_cliente" placeholder="Razon social o Nombre del Cliente"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula </label>
                                        <input type="text" style="text-transform: uppercase" type="text" id="input-nit"
                                            name="input-nit" placeholder="Identificación del cliente"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Sector Económico
                                            *</label>
                                        <select class="form-control" name="input-sector" id="input-sector">
                                            <option value="RESIDENCIAL">RESIDENCIAL</option>
                                            <option value="COMERCIAL">COMERCIAL</option>
                                            <option value="SERVICIOS">SERVICIOS</option>
                                            <option value="INDUSTRIAL">INDUSTRIAL</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-direccion"
                                            name="input-direccion" placeholder="Dirección del cliente"
                                            class="form-control" required>

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad </label>
                                        <input type="text" style="text-transform: uppercase" id="input-ciudad"
                                            name="input-ciudad" placeholder="Nombre del municipio/ciudad"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio </label>
                                        <input type="text" style="text-transform: uppercase" id="input-barrio"
                                            name="input-barrio" placeholder="Nombre del barrio" class="form-control">

                                    </div>


                                    <div class="form-group col-lg-6"><label class="control-label">Contacto
                                            Inicial</label>
                                        <input type="text" style="text-transform: uppercase" id="input-contacto"
                                            name="input-contacto" placeholder="Nombre de contacto del servicio"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Cargo </label>
                                        <input type="text" style="text-transform: uppercase" id="input-cargo"
                                            name="input-cargo" placeholder="Zona del cliente" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular o Teléfono
                                            *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-celular"
                                            name="input-celular" placeholder="Celular del contacto a facturar"
                                            class="form-control" required>

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Email </label>
                                        <input type="text" style="text-transform: uppercase" type="email"
                                            id="input-email" name="input-email"
                                            placeholder="Email del contacto a facturar" class="form-control">

                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Realizar Servicio en:</h3>
                                        <br>
                                    </div>


                                    <div class="form-group col-lg-6" id="select-filter-sede">
                                        <label class="control-label">Razón Social/Nombre *</label>
                                        <select style="text-transform: uppercase" class="form-control" id="select_sedes"
                                            name="id_sede">
                                            <option value="">Selecciona una sede</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6" id="input-nombre-sede">
                                        <label class="control-label">Razón Social/Nombre Sede*</label>
                                        <input style="text-transform: uppercase" type="text" id="nombre_sede"
                                            name="input-sede-nit" placeholder="Razon social o nombre de sede"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula </label>
                                        <input type="text" style="text-transform: uppercase" type="text"
                                            id="input-sede-nit" name="input-sede-nit" placeholder="Nit ó Cedula"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-direccion"
                                            name="input-sede-direccion"
                                            placeholder="Dirección donde se realizará el servicio" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad </label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-ciudad"
                                            name="input-sede-ciudad" placeholder="Ciudad donde se realizará el servicio"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio </label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-barrio"
                                            name="input-sede-barrio" placeholder="Barrio donde se realizará el servicio"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Zona </label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-zona"
                                            name="input-sede-zona" placeholder="Zona donde se realizará el servicio"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto </label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-contacto"
                                            name="input-sede-contacto" placeholder="Nombre de contacto del lugar"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-telefono"
                                            name="input-sede-telefono" placeholder="Teléfono del contacto del servicio"
                                            class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular </label>
                                        <input type="text" style="text-transform: uppercase" id="input-sede-celular"
                                            name="input-sede-celular" placeholder="Celular del contacto del lugar"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Email </label>
                                        <input type="text" style="text-transform: uppercase" type="email"
                                            id="input-sede-email" name="input-sede-email"
                                            placeholder="Email del contacto del servicio" class="form-control">

                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto Factura</label>
                                        <input type="text" style="text-transform: uppercase"
                                            placeholder="Nombre del contacto a facturar" name="contacto-name-factura"
                                            id="contacto_name_factura" class="form-control" style="display: block;"
                                            >

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Email </label>
                                        <input type="text" style="text-transform: uppercase"
                                            placeholder="Teléfono del contacto a facturar"
                                            name="contacto-telefono-factura" id="contacto_email_factura"
                                            class="form-control" >

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" style="text-transform: uppercase" id="telefono_contacto_facturacion"
                                            name="telefono_contacto_facturacion" placeholder="Teléfono del contacto del servicio"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular </label>
                                        <input type="text" style="text-transform: uppercase"
                                            placeholder="Celular del contacto a facturar"
                                            name="contacto-celular-factura" id="contacto_celular_factura"
                                            class="form-control" >
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Plan de Saneamiento</h3>
                                        <button type="button" style="margin-top: -35px;"
                                            class="btn btn-primary pull-right" id="btn-add-visitas"><i
                                                class="fa fa-plus"></i> Agregar visitas</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" style="padding: 15px 15px" id="visitas">
                                        <div class="form-group col-lg-2">
                                            <label class="control-label"># Visita</label>
                                            <input type="number" min=0 name="num_visita-0" id="num_visita-0"
                                                placeholder="Ej: 1" value="1" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-4 b-r">
                                            <label>Duración del servicio</label>
                                            <div class="input-group">
                                                <input style="width: 40%;margin-right: 10px;" type="number" min="0"
                                                    max="11" class="form-control" id="num_horas_visita-0"
                                                    placeholder="Horas">
                                                <input style="width: 42%;margin-left: 10px;" type="number" min="0"
                                                    max="60" class="form-control" id="num_minutos_visita-0"
                                                    placeholder="Minutos">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor plan de saneamiento</label>
                                        <input type="text" min=0 name="total_plan" id="total_plan"
                                            placeholder="Valor total del plan" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Frecuencia de visitas</label>
                                        <select style="text-transform: uppercase" id="frecuencia_visitas_plan"
                                            class="form-control">
                                            <option value="8">Cada 8 días</option>
                                            <option value="10">Cada 10 días</option>
                                            <option value="12">Cada 12 días</option>
                                            <option value="15">Cada 15 días</option>
                                            <option value="20">Cada 20 días</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label>Observaciones</label>
                                        <textarea style="text-transform: uppercase" style="text-transform: uppercase"
                                            class="form-control" placeholder="Escriba aquí las observaciones que desee."
                                            rows="1" name="observaciones_plan" id="observaciones_plan"></textarea>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Forma de Pago</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Facturación</label>
                                        <select style="text-transform: uppercase" id="tipo_facturacion"
                                            class="form-control" >
                                            <option value="" selected>Seleccione una opción</option>
                                            <option value="sc">SC</option>
                                            <option value="green">GREEN</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Forma de pago</label>
                                        <select style="text-transform: uppercase" id="forma_pago" class="form-control" >
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
                                        <select style="text-transform: uppercase" id="contrato" class="form-control" >
                                            <option value="" selected>Seleccione una opción</option>
                                            <option value="si">SI</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Inventario Inicial del Cliente</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Lámpara con lámina</label>
                                        <input type="number" min=0 name="cantidad_lampara_lamina"
                                            id="cantidad_lampara_lamina" placeholder="Cantidad total"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Lámpara insectocutora</label>
                                        <input type="number" min=0 name="cant_lampara_insectocutora"
                                            id="cant_lampara_insectocutora" placeholder="Cantidad total"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Trampas de impacto</label>
                                        <input type="number" min=0 name="cant_trampas_impacto" id="cant_trampas_impacto"
                                            placeholder="Cantidad total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Jaulas</label>
                                        <input type="number" min=0 name="cant_jaulas" id="cant_jaulas"
                                            placeholder="Cantidad total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Estaciones de roedor</label>
                                        <input type="number" min=0 name="cant_estaciones_roedor"
                                            id="cant_estaciones_roedor" placeholder="Cantidad total"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Cajas de alcantarilla y eléctricas</label>
                                        <input type="number" min=0 name="cant_cajas" id="cant_cajas"
                                            placeholder="Cantidad total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Sumideros</label>
                                        <input type="number" min=0 name="cant_sumideros" id="cant_sumideros"
                                            placeholder="Cantidad total" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Observaciones</label>
                                        <textarea style="text-transform: uppercase" style="text-transform: uppercase"
                                            name="observaciones_estaciones" id="observaciones_estaciones"
                                            placeholder="Escriba aquí las observaciones" rows="1"
                                            class="form-control"></textarea>
                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Compra de Dispositivos</h3>
                                        <button type="button" style="margin-top: -35px;"
                                            class="btn btn-primary pull-right" id="btn-add-dispositivo"><i
                                                class="fa fa-plus"></i> Agregar dispositivo</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="dispositivos" style="padding: 15px 15px">

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Tipo de dispositivo</label>
                                            <select style="text-transform: uppercase" id="tipo_dispositivo-0"
                                                class="form-control">
                                                <option style="text-transform: uppercase" value="" selected>Seleccione
                                                    una opción</option>
                                                <option style="text-transform: uppercase" value="estaciones_de_roedor">
                                                    ESTACIONES DE ROEDOR</option>
                                                <option style="text-transform: uppercase"
                                                    value="identificadores_estaciones">IDENTIFICADORES DE ESTACIONES
                                                </option>
                                                <option style="text-transform: uppercase"
                                                    value="lamparas_de_lamina_adhesiva">LAMPARAS DE LAMINA ADHESIVA
                                                </option>
                                                <option style="text-transform: uppercase"
                                                    value="lamparas de lamina_adhesiva_p">LAMPARAS DE LAMINA ADHESIVA
                                                    PLA.</option>
                                                <option style="text-transform: uppercase"
                                                    value="lamparas_insetocutoras">LAMPARAS INSECTOCUTORA</option>
                                                <option style="text-transform: uppercase"
                                                    value="identificadores_lamparas">IDENTIFICADORES DE LAMPARAS
                                                </option>
                                                <option style="text-transform: uppercase" value="jaula_pequena">JAULA
                                                    PEQUEÑA</option>
                                                <option style="text-transform: uppercase" value="jaula_grande">JAULA
                                                    GRANDE</option>
                                                <option style="text-transform: uppercase"
                                                    value="trampa_de_impacto_plastica">TRAMPA DE IMPACTO PLASTICA
                                                </option>
                                                <option style="text-transform: uppercase"
                                                    value="trampa_de_impacto_madera">TRAMPA DE PLASTICO MADERA</option>
                                                <option style="text-transform: uppercase" value="cebadero_moscas">
                                                    CEBADERO DE MOSCAS</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-1">
                                            <label class="control-label">Cant.</label>
                                            <input type="text" id="cant_dispositivo-0" name="cant_dispositivo-0"
                                                placeholder="" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label class="control-label">Valor unitario sin IVA</label>
                                            <input type="text" id="valor_sin_iva_dispositivo-0"
                                                name="valor_sin_iva_dispositivo-0" placeholder="Valor sin IVA"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Valor total.</label>
                                            <input type="text" readonly id="total_dispositivo-0"
                                                name="total_dispositivo-0" placeholder="Valor total"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3 ">
                                            <label>Observaciones</label>
                                            <textarea style="text-transform: uppercase"
                                                style="text-transform: uppercase" class="form-control"
                                                placeholder="Escriba aquí las observaciones que desee." rows="1"
                                                name="observacion_dispositivo-0"
                                                id="observacion_dispositivo-0"></textarea>
                                        </div>

                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Dispositivos en Comodato para esta Propuesta</h3>
                                        <button type="button" style="margin-top: -35px;"
                                            class="btn btn-primary pull-right" id="btn-add-dispositivo-comodato"><i
                                                class="fa fa-plus"></i> Agregar dispositivo</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="dispositivos-comodato" style="padding: 15px 15px">

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Tipo de dispositivo</label>
                                            <select style="text-transform: uppercase" id="tipo_dispositivo_comodato-0"
                                                class="form-control">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="estaciones_de_roedor">estaciones de roedor</option>
                                                <option value="identificadores_estaciones">identificadores de
                                                    estaciones</option>
                                                <option value="lamparas_de_lamina_adhesiva">lamparas de lamina adhesiva
                                                </option>
                                                <option value="lamparas de lamina_adhesiva_p">lamparas de lamina
                                                    adhesiva p.</option>
                                                <option value="lamparas_insetocutoras">lamparas insetocutoras</option>
                                                <option value="identificadores_lamparas">identificadores de lamparas
                                                </option>
                                                <option value="jaula_pequena">jaula pequeña</option>
                                                <option value="jaula_grande">jaula grande</option>
                                                <option value="trampa_de_impacto_plastica">trampa de impacto plastica
                                                </option>
                                                <option value="trampa_de_impacto_madera">trampa de impacto madera
                                                </option>
                                                <option value="cebadero_moscas">cebadero moscas</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-1">
                                            <label class="control-label">Cant.</label>
                                            <input type="text" id="cant_dispositivo_comodato-0"
                                                name="cant_dispositivo_comodato-0" placeholder="" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label class="control-label">Valor unitario sin IVA</label>
                                            <input type="text" id="valor_sin_iva_dispositivo_comodato-0"
                                                name="valor_sin_iva_dispositivo_comodato-0" placeholder="Valor sin IVA"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Valor total.</label>
                                            <input type="text" id="total_dispositivo_comodato-0"
                                                name="total_dispositivo_comodato-0" placeholder="Valor Total"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3 ">
                                            <label>Observaciones</label>
                                            <textarea style="text-transform: uppercase"
                                                style="text-transform: uppercase" class="form-control"
                                                placeholder="Escriba aquí las observaciones que desee." rows="1"
                                                name="observacione_dispositivo_comodato-0"
                                                id="observacione_dispositivo_comodato-0"></textarea>
                                        </div>

                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Gestion de calidad</h3>
                                        <button type="button" style="margin-top: -35px;"
                                            class="btn btn-primary pull-right" id="btn-add-doc"><i
                                                class="fa fa-plus"></i> Agregar documento</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="gestion-calidad" style="padding: 15px 15px">
                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Tipo de documento</label>
                                            <select style="text-transform: uppercase" id="tipo_doc-0"
                                                class="form-control">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="diagnostico_inicial">Diagnósticos</option>
                                                <option value="cronograma_servicios">Cronograma de servicios</option>
                                                <option value="mapas_dispositivos">Mapa de dispositivos</option>
                                                <option value="programa_prevencion_control_plagas">Programa de
                                                    prevención y control de plagas</option>
                                                <option value="informes_tendencias">Informes con tendencias</option>
                                                <option value="informes_frecuentes">Informes frecuentes</option>
                                                <option value="fichas_tecnicas">Fichas técnicas</option>
                                                <option value="documentos_legales">Documentos legales</option>
                                                <option value="docs_prevencion_control_plagas">Documentos prevención de
                                                    plagas</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Frecuencia.</label>
                                            <select style="text-transform: uppercase" id="frecuencia_doc-0"
                                                class="form-control">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="mensual">Mensual</option>
                                                <option value="semanal">Semanal</option>
                                                <option value="quincenal">Quincenal</option>
                                                <option value="bimestral">Bimestral</option>
                                                <option value="trimestral">Trimestral</option>
                                                <option value="cuatrimestral">cuatrimestral</option>
                                                <option value="semestral">Semestral</option>
                                                <option value="anual">Anual</option>
                                                <option value="ocasional">Ocasional</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label>Observaciones</label>
                                            <textarea style="text-transform: uppercase"
                                                style="text-transform: uppercase" class="form-control"
                                                placeholder="Escriba aquí las observaciones que desee." rows="1"
                                                name="observacion_doc-0" id="observacion_doc-0"></textarea>
                                        </div>
                                    </div>


                                    <hr>
                                    <br>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Áreas</h3>
                                        <button type="button" style="margin-top: -35px;"
                                            class="btn btn-primary pull-right" id="btn-add-area"><i
                                                class="fa fa-plus"></i> Agregar área</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="areas" style="padding: 15px 15px">
                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Nombre y/o descripción del área</label>
                                            <input type="text" style="text-transform: uppercase" id="area-0"
                                                name="area-0" placeholder="Ej: Pasillo, sala, terraza..."
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group col-lg-3 ">
                                            <label>Tiempo estimado</label>
                                            <div class="input-group">
                                                <input style="width: 40%;margin-right: 10px;" type="number" min="0"
                                                    max="11" class="form-control" id="num_horas_area-0"
                                                    placeholder="Horas">
                                                <input style="width: 42%;margin-left: 10px;" type="number" min="0"
                                                    max="60" class="form-control" id="num_minutos_area-0"
                                                    placeholder="Minutos" >
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Evidencia y/o plaga observada</label>
                                            <select style="text-transform: uppercase"
                                                data-placeholder="Seleccione las opciones" class="chosen-select"
                                                multiple style="width:350px;" tabindex="4" id="plagas_area-0">
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
                                            <select style="text-transform: uppercase" name="nivel_area-0"
                                                id="nivel_area-0" class="form-control" required>
                                                <option value="alto">ALTO</option>
                                                <option value="medio">MEDIO</option>
                                                <option value="bajo">BAJO</option>
                                                <option value="no" selected>NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor total</label>
                                        <input type="text" style="text-transform: uppercase" id="valor_total_areas"
                                            name="valor_total_areas" readonly class="form-control">
                                    </div>


                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Detalle y valor del servicio preventivo y/o correctivo</h3>
                                        {{-- <button type="button" style="margin-top: -35px;"
                                            class="btn btn-primary pull-right" id="btn-add-servicio"><i
                                                class="fa fa-plus"></i> Agregar servicio</button> --}}
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="detalle-servicios" style="padding: 15px 15px;">
                                        <div class="form-group col-lg-4">
                                            <label class="control-label">Servicio a incluir</label>
                                            <select style="text-transform: uppercase" id="servicio_detalle-0"
                                                class="form-control" required>

                                            </select>
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label class="control-label">Valor </label>
                                            <input type="text" min=0 name="valor_servicio_detalle-0"
                                                id="valor_servicio_detalle-0" placeholder="Valor del servicio"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label class="control-label">Frecuencia</label>
                                            <select style="text-transform: uppercase" id="frecuencia_servicio"
                                                class="form-control" required>
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
                                            <textarea style="text-transform: uppercase"
                                                style="text-transform: uppercase" class="form-control"
                                                placeholder="Escriba aquí las observaciones que desee." rows="1"
                                                name="observacion_servicio_detalle-0"
                                                id="observacion_servicio_detalle-0"></textarea>
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="form-group col-lg-6">
                                        <label class="control-label">Total a facturar</label>
                                        <input type="number" min=0 name="total_servicio_detalle"
                                            id="total_servicio_detalle" placeholder="Valor total a facturar"
                                            class="form-control" readonly>
                                    </div> --}}

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Número de Residencias</h3>
                                        <button type="button" style="margin-top: -35px;"
                                            class="btn btn-primary pull-right" id="btn-add-residencia"><i
                                                class="fa fa-plus"></i> Agregar residencia</button>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="row" id="residencias" style="padding: 15px 15px">
                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Tipo de residencia</label>
                                            <select style="text-transform: uppercase" id="tipo_residencia-0"
                                                class="form-control">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="casa">CASA</option>
                                                <option value="apto">APTO</option>
                                                <option value="bodega">BODEGA</option>
                                                <option value="local">LOCAL</option>
                                                <option value="oficina">OFICINA</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label class="control-label">Valor</label>
                                            <input type="text" min=0 name="valor_residencia-0" id="valor_residencia-0"
                                                placeholder="Valor total por residencia" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3 ">
                                            <label>Duración del servicio</label>
                                            <div class="input-group">
                                                <input style="width: 40%;margin-right: 10px;" type="number" min="0"
                                                    max="11" class="form-control" id="num_horas_residencia-0"
                                                    placeholder="Horas">
                                                <input style="width: 42%;margin-left: 10px;" type="number" min="0"
                                                    max="60" class="form-control" id="num_minutos_residencia-0"
                                                    placeholder="Minutos">
                                            </div>
                                        </div>


                                        <div class="form-group col-lg-3 ">
                                            <label>Observaciones</label>
                                            <textarea style="text-transform: uppercase"
                                                style="text-transform: uppercase" class="form-control"
                                                placeholder="Escriba aquí las observaciones que desee." rows="1"
                                                name="observaciones_residencia-0"
                                                id="observaciones_residencia-0"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group col-lg-12">
                                        <label>Instrucciones y Observaciones</label>
                                        <textarea style="text-transform: uppercase" style="text-transform: uppercase"
                                            class="form-control"
                                            placeholder="Escriba aquí las observaciones para el técnico." rows="3"
                                            name="instrucciones" id="observaciones_tecnico"></textarea>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="ibox-footer">
                                            <button type="submit" class="btn btn-primary"
                                                id="btn-submit">Guardar</button>
                                            <a href="\home"><button type="button" class="btn btn-default"
                                                    style="text-decoration: none; color: #676a6c;">Cancelar</button></a>
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
<script src="{{asset('js/plugins/autonumeric/autonumeric.js')}}"></script>
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    //Declaracion de variables globales
    var servicios;
    var valoresServicios = [];
    var valoresResidencias = [];
    var valoresSinIvaDispositivos = [];
    var valorTotalDispositivos = [];
    var valoresSinIvaComodato = [];
    var valorTotalComodato = [];
    var totalPlanSaneamiento;
    var valorHoraHombre;
    var totalValorAreas = 0;

    $(document).ready(function () {

        /** Ocultar inputs de crear cliente/sede **/
        if ($("input[name=option-client]:checked", '#client-options').val() == "create") {
            $("#input-create").removeClass("hidden")
            $("#select-filter").addClass("hidden")
            $("#select-filter-sede").addClass("hidden")
            $("#input-nombre-sede").removeClass("hidden")
        } else {
            $("#input-create").addClass("hidden")
            $("#select-filter").removeClass("hidden")
            $("#select-filter-sede").removeClass("hidden")
            $("#input-nombre-sede").addClass("hidden")
        }

        /** Inicializacion del iCheck **/
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        /** Inicializacion de valores en Inputs **/
        var date = moment().format("YYYY-MM-DD");
        $('#fecha_creacion').val(date);
        $("#total_servicio_detalle").val(0)

        /** Inicializacion de servicios en el select **/
        $.get('/tipos')
            .then(res => {
                servicios = res;
                servicios.forEach((value, index) => {
                    $("#servicio_detalle-0").append(`
                    <option value="${value.nombre}">${value.nombre}</option>
                `)
                })
            })
            .catch(err => {
                console.log(err)
            })

        /** Inicializacion de variables de Horas Hombre **/
        $.get('/valores')
            .then(res => {
                res.forEach(valor => {
                    if(valor.descripcion == 'hora_hombre'){
                        valorHoraHombre = parseInt(valor.valor)
                    }
                });
            })
            .catch(err => {
                console.log(err);
            })

        /** Inicializacion del input Autonumeric **/
        valoresServicios[0] = new AutoNumeric(document.getElementById('valor_servicio_detalle-0'), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        valoresResidencias[0] = new AutoNumeric(document.getElementById('valor_residencia-0'), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        totalPlanSaneamiento = new AutoNumeric(document.getElementById('total_plan'), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        valoresSinIvaDispositivos[0] = new AutoNumeric(document.getElementById('valor_sin_iva_dispositivo-0'), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        // valorTotalDispositivos[0] = new AutoNumeric(document.getElementById('total_dispositivo-0'), {
        //     digitalGroupSpacing: '3',
        //     digitGroupSeparator: '.',
        //     decimalCharacter: ',',
        //     decimalPlaces: 0,
        //     outputFormat: "number"
        // })

        valoresSinIvaComodato[0] = new AutoNumeric(document.getElementById(
            'valor_sin_iva_dispositivo_comodato-0'), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        // valorTotalComodato[0] = new AutoNumeric(document.getElementById('total_dispositivo_comodato-0'), {
        //     digitalGroupSpacing: '3',
        //     digitGroupSeparator: '.',
        //     decimalCharacter: ',',
        //     decimalPlaces: 0,
        //     outputFormat: "number"
        // })

        //Ocultar/Mostar input para crear cliente o filtrarlo en caso de existir
        $("#radio-1, #radio-2").on('ifChecked', function (e) {
            if ($("input[name=option-client]:checked", '#client-options').val() == "create") {
                $("#input-create").removeClass("hidden")
                $("#select-filter").addClass("hidden")
                $("#select-filter-sede").addClass("hidden")
                $("#input-nombre-sede").removeClass("hidden")
            } else {
                $("#input-create").addClass("hidden")
                $("#select-filter").removeClass("hidden")
                $("#select-filter-sede").removeClass("hidden")
                $("#input-nombre-sede").addClass("hidden")
            }
        })


    });

    //Inicializador del Select AUTOCOMPLETAR
    $('.chosen-select').selectize({
        width: "100%"
    });

    //Evento change del select de clientes
    $("#id_cliente").change(event => {
        //Peticion GET al servidor a la ruta /clientes/{id} (Cliente con id = $id)
        $.get(`/clientes/${event.target.value}/edit`, function (res) {
            //Asignacion de valores a Inputs Clientes
            $("#input-nit").val(res[0]['nit_cedula']);
            $("#input-direccion").val(res[0]['direccion']);
            $("#input-ciudad").val(res[0]['municipio']);
            $("#input-barrio").val(res[0]['barrio']);
            $("#input-contacto").val(res[0]['nombre_contacto_inicial']);
            $("#input-cargo").val(res[0]['cargo_contacto_inicial']);
            $("#input-sector").val(res[0]['sector_economico']);
            $("#input-celular").val(res[0]['celular_contacto_inicial']);
            $("#input-email").val(res[0]['email_contacto_inicial']);
            $("#input-sede-nit").val(res[0]['nit_cedula']);
            $("#nombre_usuario").val(res[0].user.nombres + " " + res[0].user.apellidos)
            $("#contacto_name_factura").val(res[0]["nombre_contacto_facturacion"])
            $("#contacto_email_factura").val(res[0]["email_contacto_facturacion"])
            $("#contacto_celular_factura").val(res[0]["celular_contacto_facturacion"])
            $("#telefono_contacto_facturacion").val(res[0]["telefono_contacto_facturacion"])
        }).then((res) => { //Peticion exitosa => status: 200
            console.log('Petición Exitosa');
        }).catch((err) => { //Peticion fallida => status: > 400
            console.log(err);
        });
        //Peticion GET al servidor a la ruta /sedes/clientes/{id} (Sedes de cliente)
        $.get(`/sedes/cliente/${event.target.value}`, function (res) {
            $("#select_sedes").empty(); //Limipia el select
            $("#input-sede-direccion").val('');
            $("#input-sede-ciudad").val('');
            $("#input-sede-barrio").val('');
            $("#input-sede-zona").val('');
            $("#input-sede-contacto").val('');
            $("#input-sede-telefono").val('');
            $("#input-sede-celular").val('');
            $("#input-sede-email").val('');
            if (res == '') { //Valida que el cliente tenga sedes
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
                $("#select_sedes").append(
                    `<option value='' disabled selected> Selecciona una sede </option>`);
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
                    $("#select_sedes").append(
                        `<option value=${element.id}> ${element.nombre} </option>`);
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
            $("#input-sede-direccion").val(res[0]['direccion']);
            $("#input-sede-ciudad").val(res[0]['ciudad']);
            $("#input-sede-barrio").val(res[0]['barrio']);
            $("#input-sede-zona").val(res[0]['zona_ruta']);
            $("#input-sede-contacto").val(res[0]['nombre_contacto']);
            $("#input-sede-telefono").val(res[0]['telefono_contacto']);
            $("#input-sede-celular").val(res[0]['celular_contacto']);
            $("#input-sede-email").val(res[0]['email_contacto']);
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

    // Suma automatica de total de compra
    let valueCant = 0
    let valueContInputs = 0

    $(`#cant_dispositivo-0`).on("input", (e) => {
        valueCant = e.target.value
    })

    $(`#valor_sin_iva_dispositivo-0`).on("input", (e) => {
        let valueInput = e.target.value
        let arrValues = valueInput.split(".")
        let valueAsNumber = parseInt(arrValues.join(""))
        $(`#total_dispositivo-${valueContInputs}`).val((valueCant * valueAsNumber).toString())
    })

    // Suma automatica de productos comodato
    let valueCant2 = 0
    let valueContInputs2 = 0

    $(`#cant_dispositivo_comodato-0`).on("input", (e) => {
        valueCant2 = e.target.value
    })

    $(`#valor_sin_iva_dispositivo_comodato-0`).on("input", (e) => {
        let valueInput = e.target.value
        let arrValues = valueInput.split(".")
        let valueAsNumber = parseInt(arrValues.join(""))
        $(`#total_dispositivo_comodato-${valueContInputs2}`).val((valueCant2 * valueAsNumber).toString())
    })

    //Suma automatica de valores por area
    let horas = []
    let minutos = []
    let totalAreas = 0

    $("#num_horas_area-0").on("input", e => {
        horas[0] = parseInt(e.target.value) || 0
        calcularValorArea() 
    })

    $("#num_minutos_area-0").on("input", e => {
        minutos[0] = parseInt(e.target.value) || 0
        calcularValorArea()
    })

    function calcularValorArea(nuevoValor, tiempo) {
        let sumaHoras = 0
        let sumaMinutos = 0
        horas.forEach(hora =>  sumaHoras += hora )
        minutos.forEach(minuto => sumaMinutos += minuto )
        console.log({sumaHoras, sumaMinutos});
        
        totalAreas = (sumaHoras * valorHoraHombre) + (sumaMinutos * (valorHoraHombre / 60))

        $("#valor_total_areas").val(`$ ${totalAreas.toFixed(2).toString()}`)
    }


    //Definicion de frencuencias para documentos
    function frecuenciaDefinida(tipoDocumento, idSelectFrecuencia) {
        
        switch (tipoDocumento) {
            case 'diagnostico_inicial':
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('semestral').change()
                break
            case 'cronograma_servicios':
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('anual').change()
                break
            case 'mapas_dispositivos':
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('ocasional').change()
                break
            case 'programa_prevencion_control_plagas':
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('anual').change()
                break
            case 'informes_tendencias':
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('mensual').change()
                break
            case 'informes_frecuentes':
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('mensual').change()
                break
            case 'fichas_tecnicas':
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('ocasional').change()
                break
            case 'documentos_legales':
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('mensual').change()
                break
            case 'docs_prevencion_control_plagas':
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('anual').change()
                break
            default:
                $(`#frecuencia_doc${idSelectFrecuencia}`).val('ocasional').change()
                break;
        }

    }
    $("#tipo_doc-0").change(e => {
        frecuenciaDefinida(e.target.value, '-0')
    })

    //Plan de sanemaiento
    $("#btn-add-visitas").click(function () {
        $("#visitas").append(`
            <div class="form-group col-lg-2">
                <label class="control-label"># Visita</label>
                <input type="number" min=0 name="num_visita-${contVisitas}" id="num_visita-${contVisitas}" placeholder="Ej: 1" value="${contVisitas + 1}"
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
    $("#btn-add-servicio").click(function () {
        $("#detalle-servicios").append(`
            <div class="form-group col-lg-4">
                <label class="control-label">Servicio a incluir</label>
                <select style="text-transform: uppercase" id="servicio_detalle-${contServicio}" class="form-control">

                </select>
            </div>

            <div class="form-group col-lg-2">
                <label class="control-label">Valor </label>
                <input type="text" min=0 name="valor_servicio_detalle-${contServicio}" id="valor_servicio_detalle-${contServicio}"
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

        valoresServicios[contServicio] = new AutoNumeric(document.getElementById(
            `valor_servicio_detalle-${contServicio}`), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        //Añade el listener al evento especificado de cada input creado
        $(`#valor_servicio_detalle-${contServicio}`).on('keyup', e => {
            autosumaTotalServicio()
        })

        anadirServiciosSelect(contServicio)
        contServicio++;
    })

    $("#valor_servicio_detalle-0").on('keyup', e => {
        autosumaTotalServicio()

    })

    /**
     * Suma automaticamente los valores de los inputs con el id existente
     * @return void
     */
    function autosumaTotalServicio() {
        var sum = 0;
        for (let index = 0; index < contServicio; index++) {
            sum += parseInt(valoresServicios[index].rawValue);
        }
        $("#total_servicio_detalle").val(sum)
    }

    function anadirServiciosSelect(idSelect) {
        servicios.forEach((value, index) => {
            $(`#servicio_detalle-${idSelect}`).append(`
                <option value="${value.nombre}">${value.nombre}</option>
            `)
        })
    }

    //Numero de residencias
    $("#btn-add-residencia").click(function () {
        $("#residencias").append(`
            <div class="form-group col-lg-3">
                <label class="control-label">Tipo de residencia</label>
                <select style="text-transform: uppercase" id="tipo_residencia-${contResidencias}" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                    <option value="casa">CASA</option>
                    <option value="apto">APTO</option>
                    <option value="bodega">BODEGA</option>
                    <option value="local">LOCAL</option>
                    <option value="oficina">OFICINA</option>
                </select>
            </div>

            <div class="form-group col-lg-3">
                <label class="control-label">Valor</label>
                <input type="text" min=0 name="valor_residencia-${contResidencias}" id="valor_residencia-${contResidencias}"
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

        valoresResidencias[contResidencias] = new AutoNumeric(document.getElementById(
            `valor_residencia-${contResidencias}`), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })
        contResidencias++;
    })

    //Compra de dispositivos
    $("#btn-add-dispositivo").click(function () {
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
                   readonly class="form-control">
            </div>

            <div class="form-group col-lg-3 ">
                <label>Observaciones</label>
                <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                    rows="1" name="observacion_dispositivo-${contDispositivos}" id="observacion_dispositivo-${contDispositivos}"></textarea>
            </div>
        `)

        valoresSinIvaDispositivos[contDispositivos] = new AutoNumeric(document.getElementById(
            `valor_sin_iva_dispositivo-${contDispositivos}`), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        let valueCant = 0
        let valueContInputs = contDispositivos

        $(`#cant_dispositivo-${contDispositivos}`).on("input", (e) => {
            valueCant = e.target.value
        })

        $(`#valor_sin_iva_dispositivo-${contDispositivos}`).on("input", (e) => {
            let valueInput = e.target.value
            let arrValues = valueInput.split(".")
            let valueAsNumber = parseInt(arrValues.join(""))
            $(`#total_dispositivo-${valueContInputs}`).val((valueCant * valueAsNumber).toString())
        })

        // valorTotalDispositivos[contDispositivos] = new AutoNumeric(document.getElementById(`total_dispositivo-${contDispositivos}`),{
        //     digitalGroupSpacing: '3',
        //     digitGroupSeparator: '.',
        //     decimalCharacter: ',',
        //     decimalPlaces: 0,
        //     outputFormat: "number"
        // })

        contDispositivos++;
    })

    //Dispositivos en comodato
    $("#btn-add-dispositivo-comodato").click(function () {
        $("#dispositivos-comodato").append(`
            <div class="form-group col-lg-3">
                <label class="control-label">Tipo de dispositivo</label>
                <select style="text-transform: uppercase" id="tipo_dispositivo_comodato-${contComodatos}" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                    <option value="estaciones_de_roedor">ESTACIONES DE ROEDOR</option>
                    <option value="identificadores_estaciones">IDENTIFICADORES DE ESTACIONES</option>
                    <option value="lamparas_de_lamina_adhesiva">LAMPARAS DE LAMINA ADHESIVA</option>
                    <option value="lamparas de lamina_adhesiva_p">LAMPARAS DE LAMINA ADHESIVA PLA.</option>
                    <option value="lamparas_insetocutoras">LAMPARAS INSECTOCUTORA</option>
                    <option value="identificadores_lamparas">IDENTIFICADORES DE LAMPARAS</option>
                    <option value="jaula_pequena">JAULA PEQUEÑA</option>
                    <option value="jaula_grande">JAULA GRANDE</option>
                    <option value="trampa_de_impacto_plastica">TRAMPA DE IMPACTO PLASTICA</option>
                    <option value="trampa_de_impacto_madera">TRAMPA DE PLASTICO MADERA</option>
                    <option value="cebadero_moscas">CEBADERO DE MOSCAS</option>
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
                   readonly class="form-control">
            </div>

            <div class="form-group col-lg-3 ">
                <label>Observaciones</label>
                <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones que desee."
                    rows="1" name="observacione_dispositivo_comodato-${contComodatos}" id="observacione_dispositivo_comodato-${contComodatos}"></textarea>
            </div>
        `)

        valoresSinIvaComodato[contComodatos] = new AutoNumeric(document.getElementById(
            `valor_sin_iva_dispositivo_comodato-${contComodatos}`), {
            digitalGroupSpacing: '3',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            outputFormat: "number"
        })

        let valueCant = 0
        let valueContInputs = contComodatos

        $(`#cant_dispositivo_comodato-${contComodatos}`).on("input", (e) => {
            valueCant = e.target.value
        })

        $(`#valor_sin_iva_dispositivo_comodato-${contComodatos}`).on("input", (e) => {
            let valueInput = e.target.value
            let arrValues = valueInput.split(".")
            let valueAsNumber = parseInt(arrValues.join(""))
            $(`#total_dispositivo_comodato-${valueContInputs}`).val((valueCant * valueAsNumber)
                .toString())
        })

        // valorTotalComodato[contComodatos] = new AutoNumeric(document.getElementById(`total_dispositivo_comodato-${contComodatos}`),{
        //     digitalGroupSpacing: '3',
        //     digitGroupSeparator: '.',
        //     decimalCharacter: ',',
        //     decimalPlaces: 0,
        //     outputFormat: "number"
        // })
        contComodatos++;
    })

    //Gestion de calidad
    $("#btn-add-doc").click(function () {
        $('#gestion-calidad').append(`
            <div class="form-group col-lg-4">
                <label class="control-label">Tipo de documento</label>
                <select style="text-transform: uppercase" id="tipo_doc-${contDocs}" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                    <option value="diagnostico_inicial">Diagnósticos</option>
                    <option value="cronograma_servicios">Cronograma de servicios</option>
                    <option value="mapas_dispositivos">Mapa de dispositivos</option>
                    <option value="programa_prevencion_control_plagas">Programa de
                        prevención y control de plagas</option>
                    <option value="informes_tendencias">Informes con tendencias</option>
                    <option value="informes_frecuentes">Informes frecuentes</option>
                    <option value="fichas_tecnicas">Fichas técnicas</option>
                    <option value="documentos_legales">Documentos legales</option>
                    <option value="docs_prevencion_control_plagas">Documentos prevención de
                        plagas</option>
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

        $(`#tipo_doc-${contDocs}`).change(e => {
            frecuenciaDefinida(e.target.value, e.target.id.substr(8,))
        })

        contDocs++;
    })

    //Descripcion de areas
    $("#btn-add-area").click(function () {
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
                    <option value="alto">ALTO</option>
                    <option value="medio">MEDIO</option>
                    <option value="bajo">BAJO</option>
                    <option value="no" selected>NO</option>
                </select>
            </div>
        `)
        $('.chosen-select').selectize({
            width: "100%"
        });

        $(`#num_horas_area-${contAreas}`).on('input', e => {
            horas[contAreas] =  parseInt(e.target.value) || 0
            calcularValorArea()
        })
        $(`#num_minutos_area-${contAreas}`).on('input', e => {
            minutos[contAreas] = parseInt(e.target.value) || 0
            calcularValorArea()
        })

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

    function guardarCliente() {
        var dataCliente = {
            nombre_cliente: $("#nombre_cliente").val(),
            nit_cliente: $("#input-nit").val(),
            direccion_cliente: $("#input-direccion").val(),
            ciudad_cliente: $("#input-ciudad").val(),
            barrio_cliente: $("#input-barrio").val(),
            contacto_cliente: $("#input-contacto").val(),
            cargo_cliente: $("#input-cargo").val(),
            sector_economico_cliente: $("#input-sector").val(),
            celular_cliente: $("#input-celular").val(),
            email_cliente: $("#input-email").val(),
            nombre_sede: $("#nombre_sede").val(),
            direccion_sede: $("#input-sede-direccion").val(),
            ciudad_sede: $("#input-sede-ciudad").val(),
            barrio_sede: $("#input-sede-barrio").val(),
            zona_sede: $("#input-sede-zona").val(),
            contacto_sede: $("#input-sede-contacto").val(),
            telefono_sede: $("#input-sede-telefono").val(),
            celular_sede: $("#input-sede-celular").val(),
            email_sede: $("#input-sede-email").val(),
            contacto_name_factura: $("#contacto_name_factura").val(),
            contacto_email_factura: $("#contacto_email_factura").val(),
            telefono_contacto_facturacion: $("#telefono_contacto_facturacion").val(),
            contacto_celular_factura: $("#contacto_celular_factura").val(),
        }
        return $.ajax({
            url: '/clientes',
            data: dataCliente,
            type: 'POST',
            headers: {
                "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value
            },
            success: (res) => {
                return res;
            },
            error: (err) => {
                return err;
            }
        })
    }

    //Peticion HTTP POST para guardar el formato
    function guardarInspeccion(dataSend) {
        $.ajax({
                url: '/inspeccion',
                data: dataSend,
                type: 'POST',
                headers: {
                    "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value
                }
            })
            .then(res => {
                swal("¡Formato Guardado!", 'El formato de inspeccion fue guardado correctamente.', 'success')
                    .then(val => {
                        if (val) {
                            window.location.href = '/inspeccion/create'
                        }
                    })
            })
            .catch(err => {
                swal('¡Error!', err.statusText, "error")
            })
    }
    // var crsfToken = document.getElementsByName("_token")[0].value; //Obtiene el token del formulario a enviar
    /* Estructura de datos para envio del formulario
    -----------------------------------------------------*/
    $('#form-inspeccion').submit(e => {
        e.preventDefault();

        var dataToSendInspection = {
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

        // //Plan de saneamiento
        for (let index = 0; index < contVisitas; index++) {
            dataToSendInspection.visitas[index] = {
                num_visita: $(`#num_visita-${index}`).val(),
                duracion: (parseInt($(`#num_horas_visita-${index}`).val()) || 0 * 60) + parseInt($(
                    `#num_minutos_visita-${index}`).val()) || 0
            }
        }

        // //Detalle del servicio correctivo y/o preventivo
        for (let index = 0; index < contServicio; index++) {
            dataToSendInspection.detalle_servicios[index] = {
                tipo_servicio: $(`#servicio_detalle-${index}`).val(),
                valor_servicio: valoresServicios[index].rawValue,
                frecuencia_servicio: $(`#frecuencia_servicio_detalle-${index}`).val(),
                observacion_servicio: $(`#observacion_servicio_detalle-${index}`).val()
            }

        }

        // //Numero de residencias
        for (let index = 0; index < contResidencias; index++) {
            dataToSendInspection.residencias[index] = {
                tipo_residencia: $(`#tipo_residencia-${index}`).val(),
                valor_residencia: valoresResidencias[index].rawValue,
                tiempo_estimado: ((parseInt($(`#num_horas_residencia-${index}`).val()) || 0 )* 60) + parseInt($(
                    `#num_minutos_residencia-${index}`).val() || 0) ,
                observaciones_residencia: $(`#observaciones_residencia-${index}`).val()
            }
        }

        // //Compra de dispositivos
        for (let index = 0; index < contDispositivos; index++) {
            dataToSendInspection.compra_dispositivos[index] = {
                tipo_dispositivo: $(`#tipo_dispositivo-${index}`).val(),
                cant_dispositivo: $(`#cant_dispositivo-${index}`).val(),
                valor_sin_iva: valoresSinIvaDispositivos[index].rawValue,
                total_dispositivo: $(`#total_dispositivo-${index}`)
                    .val(), //valorTotalDispositivos[index].rawValue,
                observacion_dispositivo: $(`#observacion_dispositivo-${index}`).val()
            }
        }

        // //Dispositivos en comodato
        for (let index = 0; index < contComodatos; index++) {
            dataToSendInspection.dispositivos_comodato[index] = {
                tipo_dispositivo: $(`#tipo_dispositivo_comodato-${index}`).val(),
                cant_dispositivo: $(`#cant_dispositivo_comodato-${index}`).val(),
                valor_sin_iva: valoresSinIvaComodato[index].rawValue,
                total_dispositivo: $(`#total_dispositivo_comodato-${index}`)
                    .val(), //valorTotalComodato[index].rawValue,
                observacion_dispositivo: $(`#observacione_dispositivo_comodato-${index}`).val(),
            }
        }

        //Gestion de calidad
        for (let index = 0; index < contDocs; index++) {
            dataToSendInspection.gestion_calidad[index] = {
                tipo_documento: $(`#tipo_doc-${index}`).val(),
                frecuencia_documento: $(`#frecuencia_doc-${index}`).val(),
                observacion_documento: $(`#observacion_doc-${index}`).val(),
            }
        }

        // //Areas de inspeccion
        for (let index = 0; index < contAreas; index++) {
            dataToSendInspection.areas[index] = {
                area: $(`#area-${index}`).val(),
                tiempo_estimado: ((parseInt($(`#num_horas_area-${index}`).val()) || 0 )* 60) + parseInt($(
                    `#num_minutos_area-${index}`).val() || 0) ,
                plagas_area: $(`#plagas_area-${index}`).val(),
                nivel_actividad_area: $(`#nivel_area-${index}`).val()
            }

        }

        dataToSendInspection.codigo = codigoAleatorio();
        dataToSendInspection.nombre_usuario = $("#nombre_usuario").val();
        dataToSendInspection.fecha = $("#fecha_creacion").val();
        dataToSendInspection.frecuencia = $("#frecuencia_servicio").val();
        dataToSendInspection.observaciones = $("#observaciones_tecnico").val();
        dataToSendInspection.valor_plan_saneamiento = totalPlanSaneamiento.rawValue;
        dataToSendInspection.frecuencia_visitas = $("#frecuencia_visitas_plan").val();
        dataToSendInspection.observaciones_visitas = $("#observaciones_plan").val();
        dataToSendInspection.total_detalle_servicios = valoresServicios[0].rawValue;
        dataToSendInspection.tipo_facturacion = $("#tipo_facturacion").val();
        dataToSendInspection.forma_pago = $("#forma_pago").val();
        dataToSendInspection.contrato = $("#contrato").val() == 'si' ? true : false;
        dataToSendInspection.cant_lampara_lamina = $("#cantidad_lampara_lamina").val();
        dataToSendInspection.cant_lampara_insectocutora = $("#cant_lampara_insectocutora").val();
        dataToSendInspection.cant_trampas = $("#cant_trampas_impacto").val();
        dataToSendInspection.cant_jaulas = $("#cant_jaulas").val();
        dataToSendInspection.cant_estaciones_roedor = $("#cant_estaciones_roedor").val();
        dataToSendInspection.observaciones_estaciones = $("#observaciones_estaciones").val();
        dataToSendInspection.cant_cajas_alca_elec = $("#cant_cajas").val();
        dataToSendInspection.sumideros = $("#cant_sumideros").val();

        //Alert para cambiar el codigo generado por uno personalizado (opcional)
        swal({
                title: "Código de Inspección",
                text: "Código generado: " + dataToSendInspection.codigo + ", escribe otro código aquí: ",
                icon: "warning",
                content: {
                    element: "input",
                    attributes: {
                        placeholder: "Ingresa el código personalizado para el formulario de inspeccion",
                        type: "text"
                    },
                },
                buttons: {
                    cancel: true,
                    confirm: {
                        text: 'Aceptar',
                        visible: true,
                        closeModal: false, //Muestra el Loader
                    }
                },
                dangerMode: false,
            })
            .then(isConfirm => {
                if (isConfirm) { //Valida si el input de codigo está diligenciado
                    dataToSendInspection.codigo = isConfirm;
                    if ($("input[name=option-client]:checked", '#client-options').val() == "create") {
                        guardarCliente()
                            .then(res => {
                                dataToSendInspection.cliente_id = res.id_cliente;
                                dataToSendInspection.sede_id = res.id_sede;
                                guardarInspeccion(dataToSendInspection);
                            })
                            .catch(err => {
                                console.log(err)
                            })
                    } else {
                        dataToSendInspection.cliente_id = $("#id_cliente").val();
                        dataToSendInspection.sede_id = $("#select_sedes").val();
                        guardarInspeccion(dataToSendInspection);
                    }
                } else if (isConfirm == '') {
                    if ($("input[name=option-client]:checked", '#client-options').val() == "create") {
                        guardarCliente()
                            .then(res => {
                                dataToSendInspection.cliente_id = res.id_cliente;
                                dataToSendInspection.sede_id = res.id_sede;
                                guardarInspeccion(dataToSendInspection);
                            })
                            .catch(err => {
                                console.log(err)
                            })
                    } else {
                        dataToSendInspection.cliente_id = $("#id_cliente").val();
                        dataToSendInspection.sede_id = $("#select_sedes").val();
                        guardarInspeccion(dataToSendInspection);
                    }

                } else {
                    return
                }
            })
    })
</script>
@endsection

@endsection