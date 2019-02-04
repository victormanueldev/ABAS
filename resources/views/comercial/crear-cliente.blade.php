@extends('layouts.app')
@section('content')
<script>
    document.getElementById('m-clientes').setAttribute("class", "active");
    document.getElementById('a-clientes').removeAttribute("style");
    document.getElementById('ml2-clientes').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-crearEmpresa').setAttribute("class", "active");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Creación de Clientes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Inicio</a>
            </li>
            <li>
                <a>Clientes</a>
            </li>
            <li class="active">
                <strong>Crear Cliente</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">

                                <div role="tabpanel">

                                    <ul class="nav nav-tabs" role="tablist">

                                        <li role="presentation" class="active"><a href="#prospecto" aria-controls="prospecto" data-toggle="tab" role="tab">Prospecto</a></li>
                                        <li role="presentation"><a href="#cliente" aria-controls="cliente" data-toggle="tab" role="tab">Cliente</a></li>
                                            
                                    </ul>

                                    <div class="tab-content" style="padding-top: 25px">                               

                                        
                                        <div role="tabpanel" class="tab-pane active" id="prospecto">

                                            {!! Form::open(array('route'=> ['clientes.store'], 'method'=>'POST', 'autocomplete'=>'off')) !!}
                                            {{Form::token()}}

                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="col-lg-6" style="margin-bottom: 15px">
                                                        <div class="radio radio-primary" >
                                                            <input id="checkbox-a" type="radio"   name="tipo_cliente" value="Persona Natural">
                                                            <label for="checkbox-a" style="font-weight: bold;padding-top: 0px;">Persona Natural</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-6" style="margin-bottom: 15px">
                                                        <div class="radio radio-primary" >
                                                            <input id="checkbox-d" type="radio"  name="tipo_cliente" value="Persona Juridica">
                                                            <label for="checkbox-d" style="font-weight: bold;padding-top: 0px;">Persona Jurídica</label>
                                                        </div>
                                                    </div>
                
                                                    <div class="form-group col-lg-6"><label class="control-label">Razón Social/Nombre *</label><input type="text" name="nombre_cliente" placeholder="Nombre de la Empresa" style="text-transform: uppercase" class="form-control" required></div>
                                                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                                        <input style="text-transform: uppercase" type="text" name="nombre_contacto" placeholder="Nombre de contacto" class="form-control" required>
                                                        
                                                    </div>
                        
                                                    <div class="form-group col-lg-6"><label class="control-label">Cargo </label>
                                                        <input  style="text-transform: uppercase" type="text" name="cargo_contacto" placeholder="Cargo de contacto" class="form-control">
                                                        
                                                    </div>
                        
                                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                                        <input  style="text-transform: uppercase" type="email" name="email" placeholder="Email del contacto" class="form-control" required>
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                                        <input  style="text-transform: uppercase" type="text" name="direccion" placeholder="Dirección del contacto o cliente" class="form-control" required>
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                                        <input  style="text-transform: uppercase" type="text" name="celular" placeholder="Celular del contacto o cliente" class="form-control">
                                                        
                                                    </div>

                                                    <input type="hidden" value="prospecto" name="estado_registro">

                                                    <div class="form-group col-lg-6">
                                                        <label class="control-label">Medio por el cual se entero de nuestro servicio</label>
                                                        <select  style="text-transform: uppercase" class="form-control" name="medio_contacto">
                                                            <option value="AMIGO">UN AMIGO</option>
                                                            <option value="REFERIDO">REFERIDO</option>
                                                            <option value="INTERNET">INTERNET</option>
                                                            <option value="CONTACTO_ASESOR">CONTACTO ASESOR DIRECTAMENTE </option>
                                                            <option value="LLAMADA_TELEFONICA">LLAMADA TELEFONICA</option>
                                                            <option value="DIRECTORIO">DIRECTORIO TELEFONICO</option>
                                                            <option value="PUBLICIDAD">PUBLICIDAD</option>
                                                            <option value="REDES_SOCIALES">REDES_SOCIALES</option>
                                                            <option value="OTRO">OTRO</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-lg-6">
                                                        <label class="control-label">Otro ¿Cúal?</label>
                                                        <input  style="text-transform: uppercase" type="text" name="otro" placeholder="Otros medios" class="form-control">
                                                        <br>
                                                    </div>

                                                    <div class="col-lg-6 columna_clonada2" id="columna_clonada2">
                                                            
                                                        <label class="control-label">Teléfono *</label>
                                                        
                                                        <div class="input-group">
                                                            <span class="input-group-btn" >
                                                                <button id="btn-add2" class="btn btn-default" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                                            </span>
                                                                
                                                            <input  style="text-transform: uppercase" type="text" class="form-control" style="text-transform: uppercase" placeholder="Teléfono del contacto o cliente" name="telefono[0]" required>
                                                            
                                                        </div>                                                        
                                                    </div>
                        

                                                    <div class="row">
                                                        <div class="col-lg-12" id="columna_principal2">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="ibox-title col-lg-12">
                                                <br>
                                                <h3>Sedes</h3>
                                                <hr>
                                                <br>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Nombre *</label>
                                                        <input  style="text-transform: uppercase" type="text" id="nombre_sedes" placeholder="Ej: Norte, C.C. Unicentro, Salomia..." class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                                        <input  style="text-transform: uppercase" type="text" id="direccion_sedes" placeholder="Escriba la dirección" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                                        <input  style="text-transform: uppercase" type="text" id="ciudad_sedes" placeholder="Escriba la ciudad" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                                        <input  style="text-transform: uppercase" type="text" id="barrio_sedes" placeholder="Escriba el Barrio" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Zona/Ruta *</label>
                                                        <input  style="text-transform: uppercase" type="text" id="ruta_sedes" placeholder="Zona Ruta" class="form-control">
                                                    </div>
                                
                                                    <div class="form-group col-lg-6"><label class="control-label">Nombre de Contacto *</label>
                                                        <input  style="text-transform: uppercase" type="text" id="nombre_contacto" placeholder="Nombre del contacto o cliente" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                                        <input  style="text-transform: uppercase" type="text" id="telefono_sedes" placeholder="Celular del contacto" class="form-control">
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                                        <input  style="text-transform: uppercase" type="email" id="celular_sedes" placeholder="Email de contacto" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                                        <input  style="text-transform: uppercase" type="text" id="email_sedes" placeholder="Teléfono del contacto o cliente" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <br>
                                                        <strong>Nota: </strong>Diligencia el formulario de Sede si la empresa tiene mas sedes además de la principal, en caso contrario deja en blanco todos los espacios.
                                                    </div>
                                                    
                                                </div>
                                            </div>


                                            <div class="ibox-title col-lg-12">
                                                <br>
                                                <h3>Observaciones</h3>
                                                <hr>
                                                <br>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    
                                                    <div class="form-group col-lg-12">
                                                        <label>Tipo</label>
                                                        <select class="form-control" name="tipo_evento">
                                                            <option value="Llamada">LLAMADA</option>
                                                            <option value="Cotización">COTIAZCION</option>
                                                            <option value="Visita">VISITA</option>
                                                        </select>
                                                    </div>
                                    
                                                    <div class="form-group col-lg-6" id="data_1">
                                                        <label>Fecha *</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" class="form-control" placeholder="" name="fecha_inicio">
                                                        </div>
                                                    </div>
                                
                                                    <div class="form-group col-lg-6">
                                                        <label>Hora *</label>
                                                        <div class="input-group clockpicker" data-autoclose="true">
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-clock-o"></span>
                                                            </span>
                                                            <input type="text" class="form-control" placeholder="09:30" name="hora_inicio">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <label>Observaciones</label>
                                                        <textarea  style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones" rows="3" name="asunto"></textarea>
                                                    </div>

                                                </div>                                     
                                            </div>

                                            <div class="ibox-footer">
                                                <button type="submit" id="createSedes" class="btn btn-w-m btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-w-m btn-default">Cancelar</button>
                                            </div>

                                            {{Form::close()}}                        
                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="cliente">

                                            {!! Form::open(array('route'=> ['clientes.store'], 'method'=>'POST', 'autocomplete'=>'off')) !!}
                                            {{Form::token()}}

                                            <div class="row">
                                                <div class="col-lg-12">
                                                        <div class="col-lg-6" style="margin-bottom: 15px">
                                                            <div class="radio radio-primary" >
                                                                <input id="checkbox-c" type="radio"   name="tipo_cliente" value="PERSONA NATURAL">
                                                                <label for="checkbox-c" style="font-weight: bold;padding-top: 0px;">Persona Natural</label>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-6" style="margin-bottom: 15px">
                                                                <div class="radio radio-primary" >
                                                                    <input id="checkbox-b" type="radio"  name="tipo_cliente" value="PERSONA JURIDICA">
                                                                    <label for="checkbox-b" style="font-weight: bold;padding-top: 0px;">Persona Jurídica</label>
                                                                </div>
                                                            </div>

                                                        {{-- <div class="form-group col-lg-6">
                                                            <label class="control-label" style="text-align: center;">
                                                                <strong>Persona Juridica*</strong>
                                                                <input type="radio" name="tipo_cliente" class="form-control" value="PERSONA JURIDICA" style="text-align: center;">
                                                            </label>
                                                        </div> --}}

                                                    <input type="hidden" value="cliente_nuevo" name="estado_registro">

                                                    <div class="form-group col-lg-6"><label class="control-label">Razón Social/Nombre *</label>
                                                        <input style="text-transform: uppercase" type="text" name="nombre_cliente" placeholder="Nombre de la Empresa" class="form-control" required>
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-5">
                                                    <label class="control-label">Nit/Cedula *</label>
                                                        <input type="text" name="nit_cedula" id="nit_cedula" placeholder="Nit o Cedula" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-lg-1">
                                                        <label class="control-label">D.V.</label>
                                                        <input type="text" name="nit_number" id="nit_number" class="form-control">
                                                    </div>

                                                     <div class="form-group col-lg-6"><label class="control-label">Sector Economico *</label>
                                                        <select class="form-control">
                                                            <option value="RESIDENCIAL">RESIDENCIAL</option>
                                                            <option value="COMERCIAL">COMERCIAL</option>
                                                            <option value="SERVICIO">SERVICIO</option>
                                                            <option value="INDUSTRIAL">INDUSTRIAL</option>
                                                        </select>
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Municipio *</label>
                                                        <input style="text-transform: uppercase" type="text" name="municipio" placeholder="Municipio" class="form-control" required>
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                                        <input style="text-transform: uppercase" type="text" name="direccion" placeholder="Direcció del contacto o cliente" class="form-control" required>
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                                        <input style="text-transform: uppercase" type="text" name="barrio" placeholder="Barrio" class="form-control" required>

                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Zona *</label>
                                                        <input style="text-transform: uppercase" type="text" name="zona" placeholder="Zona" class="form-control">

                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                                        <input style="text-transform: uppercase" type="text" name="nombre_contacto" placeholder="Nombre de contacto" class="form-control" required>
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Cargo *</label>
                                                        <input style="text-transform: uppercase" type="text" name="cargo_contacto" placeholder="Cargo de contacto" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Contacto Técnico *</label>
                                                        <input style="text-transform: uppercase" type="text" name="contacto_tecnico" placeholder="Nombre de contacto técnico" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Cargo Técnico *</label>
                                                        <input style="text-transform: uppercase" type="text" name="cargo_contacto_tecnico" placeholder="Cargo del técnico" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                                        <input style="text-transform: uppercase" type="email" name="email" placeholder="Email del contacto" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                                        <input style="text-transform: uppercase" type="text" name="celular" placeholder="Celular del contacto o cliente" class="form-control">
                                                        
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-12" >

                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-12"><label class="control-label">Empresa de fumigación actualmente *</label>
                                                        <input style="text-transform: uppercase" type="text" name="empresa_actual" placeholder="Empresa que le presta los servicios de fumigación" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <label>Razón del cambio</label>
                                                        <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las razones por la cual escogio el cliente a Sanicontrol como su empresa para prestar los servicios de fumigación." rows="1" name="razon_cambio" ></textarea>
                                                    </div>

                                                    <div class="form-group col-lg-6">
                                                        <label class="control-label">Medio por el cual se entero de nuestro servicio</label>
                                                        <select class="form-control" name="medio_contacto">
                                                                <option value="AMIGO">UN AMIGO</option>
                                                                <option value="REFERIDO">REFERIDO</option>
                                                                <option value="INTERNET">INTERNET</option>
                                                                <option value="CONTACTO_ASESOR">CONTACTO ASESOR DIRECTAMENTE </option>
                                                                <option value="LLAMADA_TELEFONICA">LLAMADA TELEFONICA</option>
                                                                <option value="DIRECTORIO">DIRECTORIO TELEFONICO</option>
                                                                <option value="PUBLICIDAD">PUBLICIDAD</option>
                                                                <option value="REDES_SOCIALES">REDES_SOCIALES</option>
                                                                <option value="OTRO">OTRO</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-lg-6">
                                                        <label class="control-label">Otro ¿Cúal?</label>
                                                        <input style="text-transform: uppercase" type="text" name="otro" placeholder="Otros medios" class="form-control">
                                                        <br>
                                                    </div>

                                                    <div class="col-lg-6" id="columna_principal3">
                                                        <label class="control-label">Teléfono *</label>
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button id="btn-add3" class="btn btn-default" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                                            </span>
                                                            <input type="text" class="form-control" style="text-transform: uppercase" placeholder="Teléfono del contacto o cliente" name="telefono[0]" required>
                                                        </div>                                                        
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="ibox-title col-lg-12">
                                                <br>
                                                <h3>Sede</h3>
                                                <hr>
                                                <br>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Nombre *</label>
                                                        <input style="text-transform: uppercase" type="text" id="nombre_sedes" placeholder="Ej: Norte, C.C. Unicentro, Salomia..." class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                                        <input style="text-transform: uppercase" type="text" id="direccion_sedes" placeholder="Escriba la dirección" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                                        <input style="text-transform: uppercase" type="text" id="ciudad_sedes" placeholder="Escriba la ciudad" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                                        <input style="text-transform: uppercase" type="text" id="barrio_sedes" placeholder="Escriba el Barrio" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Zona/Ruta *</label>
                                                        <input style="text-transform: uppercase" type="text" id="ruta_sedes" placeholder="Zona Ruta" class="form-control">
                                                    </div>
                                
                                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                                        <input style="text-transform: uppercase" type="text" id="telefono_sedes" placeholder="Teléfono del contacto o cliente" class="form-control">
                                                        
                                                    </div>
                        
                                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                                        <input style="text-transform: uppercase" type="text" id="celular_sedes" placeholder="Celular del contacto" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                                        <input style="text-transform: uppercase" type="email" id="email_sedes" placeholder="Email de contacto" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <br>
                                                        <strong>Nota: </strong>Diligencia el formulario de Sede si la empresa tiene mas sedes además de la principal, en caso contrario deja en blanco todos los espacios.
                                                    </div>
                                                    
                                                </div>
                                            </div>


                                            <div class="ibox-title col-lg-12">
                                                <br>
                                                <h3>Observaciones</h3>
                                                <hr>
                                                <br>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    
                                                    <div class="form-group col-lg-12">
                                                        <label>Tipo</label>
                                                        <select class="form-control" name="tipo_evento">
                                                                <option value="Llamada">LLAMADA</option>
                                                                <option value="visita">VISITA</option>
                                                                <option value="seguimiento">SEGUIMIENTO</option>
                                                        </select>
                                                    </div>
                                    
                                                    <div class="form-group col-lg-6" id="data_1">
                                                        <label>Fecha *</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" class="form-control" placeholder="" name="fecha_inicio">
                                                        </div>
                                                    </div>
                                
                                                    <div class="form-group col-lg-6">
                                                        <label>Hora *</label>
                                                        <div class="input-group clockpicker" data-autoclose="true">
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-clock-o"></span>
                                                            </span>
                                                            <input type="text" class="form-control" placeholder="09:30" name="hora_inicio">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <label>Observaciones</label>
                                                        <textarea style="text-transform: uppercase" class="form-control" placeholder="Escriba aquí las observaciones" rows="3" name="asunto"></textarea>
                                                    </div>

                                                </div>                                     
                                            </div>

                                            <div class="ibox-footer">
                                                <button type="submit" id="createSedes" class="btn btn-w-m btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-w-m btn-default">Cancelar</button>
                                            </div>   

                                            {{Form::close()}}                               
                                                {{-- <button type="submit" id="clientes" class="btn btn-w-m btn-primary">Pruebas</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        ¿Está seguro que quiere guardar esta información?
                        <button type="submit" class="btn btn-default">No</button>
                        <button type="submit" class="btn btn-primary">Si</button>
                    </div>
                </div>
        </div> --}}
    </div>
</div>
@section('ini-scripts')
<script>
    //Inicializacion de Contadores
    var cont = 1;
    var cont2 = 1;
    var cont3 = 1;
    //Evento click del btn con ID
    $("#btn-add").click(event => {
        cont++;
        //Añade una serie de nodos dentro del componente con ID columna_principal
        $("#columna_clonada2").append(`<div class=" form-group col-lg-6"><label class="control-label">Teléfono  ${cont }*</label><input type="text" name="telefono[${cont -1 }]" placeholder="Teléfono del contacto o cliente" class="form-control"></div>`);
    });
    //Evento click del btn con ID 2
    $("#btn-add2").click(event => {
        cont2 = cont2 + 1;
        $("#columna_principal2").append(`<div class=" form-group col-lg-6"><label class="control-label">Teléfono  ${cont2 }*</label><input type="text" name="telefono[${cont2 -1}]" placeholder="Teléfono del contacto o cliente" class="form-control"></div>`);
    });
    //Evento click del btn con ID 3
    $("#btn-add3").click(event => {
        cont3 = cont3 + 1;
        $("#columna_principal3").append(`<div class=" form-group col-lg-6"><label class="control-label">Teléfono  ${cont3 }*</label><input type="text" name="telefono[${cont3 -1}]" placeholder="Teléfono del contacto o cliente" class="form-control"></div>`);
    });

    $("#clientes").click(event => {
        var nit = $("#nit_number").val();
        console.log(nit);
    });

    $("#createSedes").click(event => {
        // let dataSedes = {
        //     nombre_sedes: $("#nombre_sedes").val().strtoupper(),
        //     direccion_sedes: $("#direccion_sedes").val().strtoupper(),
        //     ciudad_sedes: $("#ciudad_sedes").val().strtoupper(),
        //     barrio_sedes: $("#barrio_sedes").val().strtoupper(),
        //     ruta_sedes: $("#ruta_sedes").val().strtoupper(),
        //     nombre_contacto: $("#nombre_contacto").val().strtoupper(),
        //     telefono_sedes: $("#telefono_sedes").val().strtoupper(),
        //     celular_sedes: $("#celular_sedes").val().strtoupper(),
        //     email_sedes: $("#email_sedes").val().strtoupper(),
        // };
        console.log('Si funciona');
        let crsfToken = document.getElementsByName("_token")[0].value;
        $.ajax({
            url: '/sedes',
            data: dataSedes,
            type: 'POST',
            headers: {
                "X-CSRF-TOKEN": crsfToken
            }
        });
    });

</script>
@endsection
@endsection