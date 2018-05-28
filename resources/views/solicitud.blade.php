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
    {!! Form::open(array('url'=>('solicitud-create'), 'method'=>'GET', 'autocomplete'=>'on')) !!}
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
                                        <h1>AM-CM-01</h1>
                                        <button type="button" class="btn btn-w-m btn-primary"><span class="glyphicon glyphicon-refresh" aria-hidden="true" style="margin-right: 8px;"></span> Generar Código</button>
                                        <br>
                                        <br>                                                   
                                    </div>

								    <div class="form-group col-lg-4" id="data_1">
                                        <label>Fecha *</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="fecha" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Frecuencia del Servicio</label>
                                        
                                        <select class="form-control" id="frecu-1">
                                            <option>Nunca</option>
                                            <option>Ocasionalmente</option>
                                            <option>Frecuentemente</option>
                                            <option>Siempre</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Frecuencia del Servicio</label>
                                        
                                        <select class="form-control" id="frecu_mes">
                                            <option>Enero</option>
                                            <option>Febrero</option>
                                            <option>Marzo</option>
                                            <option>Abril</option>
                                            <option>Mayo</option>
                                            <option>Junio</option>
                                            <option>Julio</option>
                                            <option>Agosto</option>
                                            <option>Septiembre</option>
                                            <option>Octubre</option>
                                            <option>Noviembre</option>
                                            <option>Diciembre</option>
                                        </select>

                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <h3>Facturar a nombre de:</h3>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Razón Social/Nombre *</label>
                                        
                                        <select class="form-control " id="select_clientes">

                                            @foreach($clientes as $clien)
                                                <option value="{{$clien->id}}">{{$clien->nombre_cliente}}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                        <input type="text" name="nit_cedula_c" id="nit_cedula_c" placeholder="Nit ó Cedula" class="form-control">
                                                    
                                    </div>


                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text" name="direccion_c" id="direccion_c" placeholder="Dirección de cliente" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text" name="municipio_c" id="municipio_c" placeholder="Ciudad del cliente" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" name="barrio_c"  id="barrio_c" placeholder="Barrio del cliente" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Zona *</label>
                                        <input type="text" name="zona_c"  id="zona_c" placeholder="Zona del cliente" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" name="nombre_contacto_c" id="nombre_contacto_c"  placeholder="Nombre de contacto del servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" name="telefono_c"  id="telefono_c" placeholder="Teléfono del contacto a facturar" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" name="celular_c"  id="celular_c" placeholder="Celular del contacto a facturar" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email"  name="email_c"  id="email_p" placeholder="Email del contacto a facturar" class="form-control">
                                        
                                    </div>
                                    
                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Realizar servicio en:</h3>
                                        <br>
                                    </div>
												

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Razón Social/Nombre *</label>
                                        
                                        <select class="form-control " id="select_sedes">

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                        <input type="text" name="nit_cedula_s" id="nit_cedula_s" placeholder="Nit ó Cedula" class="form-control">
                                                    
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text" name="direccion_s" id="direccion_s" placeholder="Dirección de donde se realizará el servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text" name="municipio_s" id="municipio_s" placeholder="Ciudad donde se realizará el servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" name="barrio_s" id="barrio_s" placeholder="Barrio donde se realizará el servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Zona *</label>
                                        <input type="text" name="zona_s" id="zona_s" placeholder="Zona donde se realizará el servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" name="nombre_contacto_s" id="nombre_contacto_s" placeholder="Nombre de contacto del lugar" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" name="telefono_s" id="telefono_s" placeholder="Teléfono del contacto del servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" name="celular_s" id="celular_s" placeholder="Celular del contacto del lugar" class="form-control">
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email"  name="email_s" id="email_s" placeholder="Email del contacto del servicio" class="form-control">
                                        
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto Factura *</label>
                                        <input type="text" name="cargo_contacto_tecnico" id="cargo_contacto_tecnico" placeholder="Nombre del contacto a facturar" class="form-control" style="display: block;">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" name="telefono" id="telefono" placeholder="Teléfono del contacto a facturar" class="form-control">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" name="celular" id="celular" placeholder="Celular del contacto a facturar" class="form-control">
                                    </div>

					                <div class="form-group col-lg-12">
					                    <label>Instrucciones y Observaciones</label>
					                    <textarea class="form-control" id="observaciones_tecnico" placeholder="Escriba aquí las observaciones para el técnico." rows="3"></textarea>
					                </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Calidad y servicio al cliente: Realizar los siguientes Procesos</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6 col-xs-12 checkbox">
                                        <label style="display: block;"><input type="checkbox" id="calidad_servicio_clie" value="">Diagnostico Inicial</label>
                                        <label style="display: block;"><input type="checkbox" id="calidad_servicio_clie" value="">Cronograma de Servicios</label>
                                        <label style="display: block;"><input type="checkbox" id="calidad_servicio_clie" value="">Visitas de Calidad</label>
                                    </div> 

                                     <div class="form-group col-lg-6">
                                      <label>Frecuencia</label>
                                      <select class="form-control" id="frecu_2">
                                        <option>Nunca</option>
                                        <option>Ocasionalmente</option>
                                        <option>Frecuentemente</option>
                                        <option>Siempre</option>
                                      </select>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Diligenciar cuando requiera plan de saneamiento</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-4"
                                    ><label class="control-label">Frecuencia de Visitas *</label>
                                        <input type="text" name="" id="frecu_visitas" placeholder="Ej: Cada 10 días" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 1</label>
                                        <input type="text" name="" id="vis_1" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 2</label>
                                        <input type="text" name="" id="vis_2" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 3</label>
                                        <input type="text" name="" id="vis_3" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 4</label>
                                        <input type="text" name="" id="vis_4" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Total Horas</label>
                                        <input type="text" name="" id="total_h" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor Hora</label>
                                        <input type="text" name="" id="valor_h" placeholder="Ej: 60.000" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor Facturar</label>
                                        <input type="text" name="" id="valor_fact" placeholder="Ej: 127.600" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Control integrado de plagas y roedores</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="control-label">Servicios Contratados</label>
                                        <input type="text" name="" id="servi_contra" placeholder="Servicios requeridos por el cliente" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Frecuencia del Servicio</label>
                                        <select class="form-control" id="frecu_3">
                                            <option>Nunca</option>
                                            <option>Ocasionalmente</option>
                                            <option>Frecuentemente</option>
                                            <option>Siempre</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Tipo Cliente</label>
                                        <select class="form-control" id="tipo_clie">
                                            <option>Servicio</option>
                                            <option>Visita</option>
                                            <option>Ejemplo</option>
                                            <option>Ejemplo</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Tapa de Alcantarilla</label>
                                        <select class="form-control" id="tapa_alca">
                                            <option>Si</option>
                                            <option>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Número de Tapas</label>
                                        <input type="text" name="" id="num_tapa" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Número de Residencias</label>
                                        <input type="text" name="" id="num_resi" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Detalle de horas cotizadas por frecuencia</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Semanales</label>
                                        <input type="text" name="" id="horas_semanales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Mensuales</label>
                                        <input type="text" name="" id="horas_mensuales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Trimestrales</label>
                                        <input type="text" name="" id="horas_trimestrales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Semestrales</label>
                                        <input type="text" name="" id="horas_semestrales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Quincenales</label>
                                        <input type="text" name="" id="horas_quincenales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Bimensuales</label>
                                        <input type="text" name="" id="horas_bimensuales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Cada 4 Meses</label>
                                        <input type="text" name="" id="horas_cada_4" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Anuales</label>
                                        <input type="text" name="" id="horas_anuales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Detalle y valor del servicio</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Total de Horas Cotizadas</label>
                                        <input type="text" name="" id="total_h_cot" placeholder="Total de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor Hora Antes IVA</label>
                                        <input type="text" name="" id="valor_h_antes" placeholder="Valor" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor Inicial Antes IVA</label>
                                        <input type="text" name="" id="valor_ini_antes" placeholder="Valor" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Forma de Pago</label>
                                        <input type="text" name="" id="forma_pago" placeholder="Ej: Contado, 3 Meses, etc." class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Facturación</label>
                                        <input type="text" name="" id="facturacion" placeholder="Ej: SC" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">¿Tiene Contrato?</label>
                                        <select class="form-control" id="contrato">
                                            <option>Si</option>
                                            <option>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Número de Contrato</label>
                                        <input type="text" name="" id="num_contra" placeholder="#" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Actividad Económica</label>
                                        <input type="text" name="" id="actividad_econo" placeholder="Actividad Económica" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        {{-- <h3>Detalle y valor del servicio</h3> --}}
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Medio por el cual se entero de nuestro servicio</label>
                                        <select class="form-control" id="se_entero_servicio">
                                            <option>Un amigo</option>
                                            <option>Internet</option>
                                            <option>Contacto Asesor Directamente</option>
                                            <option>Llamada Telefónica</option>
                                            <option>Directorio Telefónico</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Otro ¿Cúal?</label>
                                        <input type="text" name="" id="otro" placeholder="Otros medios" class="form-control">
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Diligenciado por:</label>
                                        <input type="text" name="" id="diligenciado" placeholder="" class="form-control"> 
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Revisado por:</label>
                                        <input type="text" name="" placeholder="" class="form-control"> {{-- viejo victor, aca se firma manualmente. --}}
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="ibox-footer">
                                            <button type="submit" class="btn btn-primary">Imprimir</button>
                                            {{-- <button type="submit" class="btn btn-w-m btn-danger">Exportar a PDF</button> --}}
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
@endsection
@section('ini-scripts')
<script type="text/javascript">
/*    $("#select_clientes").change(event => {
        $.get(`/solicitud/${event.target.value}`, function(res, sede){
            $("#select_sedes").empty()
            res.forEach(element => {
                $("#select_sedes").append(`<option value=${res.id}> ${res.nombre} <option>`)
            })
        })
    })*/

    
</script>
@endsection