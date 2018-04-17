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
    <form class="" method="POST" >
    <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h3>Información Básica</h3>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                    <p>Guarda la información de un prospecto.</p>
        
                                    <div class="form-group col-lg-12"><label class="control-label">Nombre/Empresa *</label>
                                        <input type="text" placeholder="Nombre de la Empresa" class="form-control">
                                        
                                    </div>
                                    
                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" placeholder="Nombre del contacto" class="form-control">
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Cargo *</label>
                                        <input type="text" placeholder="Cargo del contacto" class="form-control">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email" placeholder="Email del contacto" class="form-control">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text" placeholder="Direcció del contacto o cliente" class="form-control">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                        <input type="text" placeholder="Teléfono del contacto o cliente" class="form-control">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" placeholder="Celular del contacto o cliente" class="form-control">
                                    </div>
        
                                    {{--  <div class="form-group col-lg-12">
                                            <button type="button" class="btn btn-primary btn-md" >Guardar</button>
                                    </div>  --}}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h3>Sede</h3>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <p>Registre la información de la sede de la empresa</p>
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
                            </div>
                        </div>
                    </div>
                    <div class="ibox-footer">
                        <strong>Nota: </strong>Diligencia el formulario de Sede si la empresa tiene mas sedes además de la principal, en caso contrario deja en blanco todos los espacios
                    </div>
                </div>
            </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Observaciones</h3>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <p>Indique las observaciones, recordatorios o seguimientos del nuevo cliente</p>
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="form-group col-lg-6">
                                <label>Tipo</label>
                                <select class="form-control" name="account">
                                    <option>LLamada</option>
                                    <option>Cotización</option>
                                    <option>Visita</option>
                                </select>
                            </div>
            
                            <div class="form-group col-lg-6"><label class="control-label">Tema *</label>
                                <input type="text" placeholder="Escriba el asunto o tema" class="form-control">
                            </div>
            
                            <div class="form-group col-lg-6" id="data_1">
                                <label>Fecha *</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
        
                            <div class="form-group col-lg-6">
                                <label>Hora *</label>
                                <div class="input-group clockpicker" data-autoclose="true">
                                    <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>
                                    <input type="text" class="form-control" placeholder="09:30" >
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                    <label>Observaciones</label>
                                    <textarea class="form-control" placeholder="Escriba aquí las observaciones" rows="3"></textarea>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-footer">
                    <button type="submit" class="btn btn-w-m btn-primary">Guardar</button>
                    <button type="button" class="btn btn-w-m btn-default">Cancelar</button>
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
    </form>
</div>
@endsection