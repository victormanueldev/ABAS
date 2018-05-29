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

                                        <li role="presentation" class="active"><a href="#frio" aria-controls="frio" data-toggle="tab" role="tab">Llamada en Frio</a></li>
                                        <li role="presentation"><a href="#prospecto" aria-controls="prospecto" data-toggle="tab" role="tab">Prospecto</a></li>
                                        <li role="presentation"><a href="#cliente" aria-controls="cliente" data-toggle="tab" role="tab">Cliente</a></li>
                                            
                                    </ul>

                                    <div class="tab-content" style="padding-top: 25px">


                                        <div role="tabpanel" class="tab-pane active" id="frio">

                                            {!! Form::open(array('route'=> ['guardarEmpresa'], 'method'=>'POST', 'autocomplete'=>'on')) !!}
                                            {{Form::token()}}

                                            <div class="row">
                                                <div class="col-lg-12" >


                                                    <div class="form-group col-lg-6"><label class="control-label">Razón Social/Nombre *</label>
                                                        <input type="text" name="nombre_cliente" placeholder="Nombre o Razón Social" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                                        <input type="text" placeholder="Escriba la dirección" class="form-control" name="direccion">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                                        <input type="text" placeholder="Celular del contacto o cliente" class="form-control" name="celular">
                                                        
                                                    </div>

                                                    <div class="col-lg-6 columna-clonada">                                                            
                                                        <label class="control-label">Teléfono *</label>                                                        
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button id="btn-add" class="btn btn-default" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                                            </span>                                                               
                                                            <input type="text" class="form-control" placeholder="Teléfono del contacto o cliente" name="telefono[0]">                                                           
                                                        </div>
                                                    </div>


                                                    <div class="row" >
                                                        <div class="col-lg-12" id="columna_principal"> 

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
                                                                    <option value="Llamada">LLamada</option>
                                                                    <option value="Seguimiento">Cotización</option>
                                                                    <option value="Visita">Visita</option>
                                                                </select>
                                                            </div>
                                            
                                                            <div class="form-group col-lg-6" id="data_1">
                                                                <label>Fecha *</label>
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" placeholder="" name="fecha_inicio">
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
                                                                <textarea class="form-control" placeholder="Escriba aquí las observaciones" rows="3" name="asunto"></textarea>
                                                            </div>
        
                                                        </div>                                     
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ibox-footer">
                                                <button type="submit" class="btn btn-w-m btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-w-m btn-default">Cancelar</button>
                                            </div>

                                            {!! Form::close() !!}
                                        </div>                                           

                                        
                                        <div role="tabpanel" class="tab-pane" id="prospecto">

                                            {!! Form::open(array('route'=> ['guardarEmpresa'], 'method'=>'POST', 'autocomplete'=>'on')) !!}
                                            {{Form::token()}}

                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="radio">
                                                        
                                                        <div class="col-lg-3">
                                                            <label class="control-label" style="text-align: center;">
                                                                <strong>Persona Natural*</strong>
                                                                <input type="radio" name="tipo_cliente" class="form-control" value="Persona Natural" style="align-content: center;">
                                                            </label>
                                                        </div>
                                                        
                                                        <div class="form-group col-lg-3">
                                                            <label class="control-label" style="text-align: center;">
                                                                <strong>Persona Juridica*</strong>
                                                                <input type="radio" name="tipo_cliente" class="form-control" value="Persona Juridica" style="text-align: center;">
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Razón Social/Nombre *</label><input type="text" name="nombre_cliente" placeholder="Nombre de la Empresa" class="form-control"></div>
                                                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                                        <input type="text" name="nombre_contacto" placeholder="Nombre de contacto" class="form-control">
                                                        
                                                    </div>
                        
                                                    <div class="form-group col-lg-6"><label class="control-label">Cargo *</label>
                                                        <input type="text" name="cargo_contacto" placeholder="Cargo de contacto" class="form-control">
                                                        
                                                    </div>
                        
                                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                                        <input type="email" name="email" placeholder="Email del contacto" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                                        <input type="text" name="direccion" placeholder="Direcció del contacto o cliente" class="form-control">
                                                        
                                                    </div>

                                                    <div class="col-lg-6 columna_clonada2">
                                                            
                                                        <label class="control-label">Teléfono *</label>
                                                        
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default btn-add" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                                            </span>
                                                                
                                                            <input type="text" class="form-control" placeholder="Teléfono del contacto o cliente" name="telefono">
                                                            
                                                        </div>                                                        
                                                    </div>
                        
                                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                                        <input type="text" name="celular" placeholder="Celular del contacto o cliente" class="form-control">
                                                        
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
                                                        <input type="text" placeholder="Ej: Norte, C.C. Unicentro, Salomia..." class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                                        <input type="text" placeholder="Escriba la dirección" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                                        <input type="text" placeholder="Escriba la ciudad" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                                        <input type="text" placeholder="Escriba el Barrio" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Zona/Ruta *</label>
                                                        <input type="text" placeholder="Zona Ruta" class="form-control">
                                                    </div>
                                
                                                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                                        <input type="text" placeholder="Celular del contacto" class="form-control">
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                                        <input type="email" placeholder="Email de contacto" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                                        <input type="text" placeholder="Teléfono del contacto o cliente" class="form-control">
                                                        
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
                                                            <option value="Llamada">LLamada</option>
                                                            <option value="Visita">Cotización</option>
                                                            <option value="Seguimiento">Visita</option>
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
                                                        <textarea class="form-control" placeholder="Escriba aquí las observaciones" rows="3" name="asunto"></textarea>
                                                    </div>

                                                </div>                                     
                                            </div>

                                            <div class="ibox-footer">
                                                <button type="submit" class="btn btn-w-m btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-w-m btn-default">Cancelar</button>
                                            </div>

                                            {{Form::close()}}                        
                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="cliente">

                                            {!! Form::open(array('route'=> ['guardarEmpresa'], 'method'=>'POST', 'autocomplete'=>'on')) !!}
                                            {{Form::token()}}

                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="radio">
                                                        
                                                        <div class="col-lg-3">
                                                            <label class="control-label" style="text-align: center;">
                                                                <strong>Persona Natural*</strong>
                                                                <input type="radio" name="tipo_cliente" class="form-control" value="Persona Natural" style="align-content: center;">
                                                            </label>
                                                        </div>
                                                        
                                                        <div class="form-group col-lg-3">
                                                            <label class="control-label" style="text-align: center;">
                                                                <strong>Persona Juridica*</strong>
                                                                <input type="radio" name="tipo_cliente" class="form-control" value="Persona Juridica" style="text-align: center;">
                                                            </label>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Razón Social/Nombre *</label>
                                                        <input type="text" name="nombre_cliente" placeholder="Nombre de la Empresa" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                                        <input type="text" name="nit_cedula" placeholder="Nit o Cedula" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Sector Economico *</label>
                                                        <input type="text" name="sector_economico" placeholder="Sector Economico de la empresa" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Municipio *</label>
                                                        <input type="text" name="municipio" placeholder="Municipio" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                                        <input type="text" name="direccion" placeholder="Direcció del contacto o cliente" class="form-control">
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                                        <input type="text" name="barrio" placeholder="Barrio" class="form-control">

                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Zona *</label>
                                                        <input type="text" name="zona" placeholder="Barrio" class="form-control">

                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                                        <input type="text" name="nombre_contacto" placeholder="Nombre de contacto" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Cargo *</label>
                                                        <input type="text" name="cargo_contacto" placeholder="Cargo de contacto" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Contacto Técnico *</label>
                                                        <input type="text" name="contacto_tecnico" placeholder="Nombre de contacto técnico" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Cargo Técnico *</label>
                                                        <input type="text" name="cargo_contacto_tecnico" placeholder="Cargo del técnico" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                                        <input type="email" name="email" placeholder="Email del contacto" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                                        <input type="text" name="celular" placeholder="Celular del contacto o cliente" class="form-control">
                                                        
                                                    </div>

                                                    <div class="col-lg-6">
                                                            
                                                        <label class="control-label">Teléfono *</label>
                                                        
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default btn-add" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                                            </span>
                                                                
                                                            <input type="text" class="form-control" placeholder="Teléfono del contacto o cliente" name="telefono[0]">
                                                            
                                                        </div>                                                        
                                                    </div>

                                                    <div class="form-group col-lg-12"><label class="control-label">Empresa de fumigación actualmente *</label>
                                                        <input type="text" name="empresa_actual" placeholder="Empresa que le presta los servicios de fumigación" class="form-control">
                                                        
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <label>Razón del cambio</label>
                                                        <textarea class="form-control" placeholder="Escriba aquí las razones por la cual escogio el cliente a Sanicontrol como su empresa para prestar los servicios de fumigación." rows="1" name="razon_cambio" ></textarea>
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
                                                        <input type="text" placeholder="Ej: Norte, C.C. Unicentro, Salomia..." class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                                        <input type="text" placeholder="Escriba la dirección" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                                        <input type="text" placeholder="Escriba la ciudad" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                                        <input type="text" placeholder="Escriba el Barrio" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Zona/Ruta *</label>
                                                        <input type="text" placeholder="Zona Ruta" class="form-control">
                                                    </div>
                                
                                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                                        <input type="text" placeholder="Teléfono del contacto o cliente" class="form-control">
                                                        
                                                    </div>
                        
                                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                                        <input type="text" placeholder="Celular del contacto" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                                        <input type="email" placeholder="Email de contacto" class="form-control">
                                                        
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
                                                                <option value="Llamada">LLamada</option>
                                                                <option value="Visita">Cotización</option>
                                                                <option value="Seguimiento">Visita</option>
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
                                                        <textarea class="form-control" placeholder="Escriba aquí las observaciones" rows="3" name="asunto"></textarea>
                                                    </div>

                                                </div>                                     
                                            </div>

                                            <div class="ibox-footer">
                                                <button type="submit" class="btn btn-w-m btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-w-m btn-default">Cancelar</button>
                                            </div>   

                                            {{Form::close()}}                               
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
    $("#btn-add").click(event => {
        var cont = 0;
        var rowsClonadas = $(".columna-clonada").length -2;
        var nuevoNumero  = new Number(rowsClonadas + 1);
        //var row = $("#row").clone().show();
        //var input = $("#input").clone();
        //var div = row.append(input);
        $("#columna_principal").append(`<div class="columna-clonada form-group col-lg-6"><label class="control-label">Teléfono  ${nuevoNumero + 2 }*</label><input type="text" name="telefono[${nuevoNumero + 1}]" placeholder="Teléfono del contacto o cliente" class="form-control"></div>`);
    })

    //     $("#btn-add2").click(event => {
    //     var cont = 0;
    //     var rowsClonadas = $(".columna_clonada2").length -2;
    //     var nuevoNumero  = new Number(rowsClonadas + 1);
    //     //var row = $("#row").clone().show();
    //     //var input = $("#input").clone();
    //     //var div = row.append(input);
    //     $("#columna_principal2").append(`<div class="columna-clonada2 form-group col-lg-6"><label class="control-label">Teléfono  ${nuevoNumero + 2 }*</label><input type="text" name="telefono[${nuevoNumero + 1}]" placeholder="Teléfono del contacto o cliente" class="form-control"></div>`);
    // })
</script>
@endsection
@endsection