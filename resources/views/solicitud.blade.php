@extends('layouts.app')
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
    {!! Form::open(array('url'=>('solicitud'), 'method'=>'POST', 'autocomplete'=>'on')) !!}
    {{Form::token()}}

   	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">

					     	<div class="row">
					            <div class="col-lg-12">

								    <div class="form-group col-lg-6" id="data_1">
                                        <label>Fecha *</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <h3>Facturar a nombre de:</h3>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Razón Social/Nombre *</label>
                                        
                                        <select class="form-control " id="select_clientes">
                                            <option value="" selected disabled>Selecciona un cliente</option>
                                            @foreach($clientes as $cliente)
                                                <option value="{{$cliente->id}}">{{$cliente->nombre_cliente}}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                        <input type="text"  id="input-nit"name="nit_cedula " placeholder="Nit ó Cedula" class="form-control">
                                                    
                                    </div>


                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text"  id="input-direccion"name="direccion" placeholder="Dirección de cliente" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text"  id="input-ciudad"name="municipio" placeholder="Ciudad del cliente" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" id="input-barrio" name="barrio" placeholder="Barrio del cliente" class="form-control">

                                    </div>

                                    
                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" id="input-contacto" name="nombre_contacto " placeholder="Nombre de contacto del servicio" class="form-control">
                                        
                                    </div>
                                    
                                    <div class="form-group col-lg-6"><label class="control-label">Cargo *</label>
                                        <input type="text" id="input-cargo" name="barrio" placeholder="Zona del cliente" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" id="input-telefono" name="telefono" placeholder="Teléfono del contacto a facturar" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" id="input-celular" name="celular" placeholder="Celular del contacto a facturar" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email"  id="input-email" name="email" placeholder="Email del contacto a facturar" class="form-control">
                                        
                                    </div>
                                    
                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Realizar servicio en:</h3>
                                        <br>
                                    </div>
												

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Razón Social/Nombre *</label>
                                        
                                        <select class="form-control " id="select_sedes">
                                            <option value="">Selecciona una sede</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                        <input type="text" id="input-sede-nit" name="nit_cedula " placeholder="Nit ó Cedula" class="form-control">
                                                    
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text"  id="input-sede-direccion"name="direccion" placeholder="Dirección de donde se realizará el servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text" id="input-sede-ciudad" name="municipio" placeholder="Ciudad donde se realizará el servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" id="input-sede-barrio" name="barrio" placeholder="Barrio donde se realizará el servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Zona *</label>
                                        <input type="text" id="input-sede-zona" name="barrio" placeholder="Zona donde se realizará el servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" id="input-sede-contacto" name="nombre_contacto " placeholder="Nombre de contacto del lugar" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" id="input-sede-telefono" name="telefono" placeholder="Teléfono del contacto del servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" id="input-sede-celular" name="celular" placeholder="Celular del contacto del lugar" class="form-control">
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email" id="input-sede-email"  name="email" placeholder="Email del contacto del servicio" class="form-control">
                                        
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto Factura *</label>
                                        <input type="text" name="cargo_contacto_tecnico" placeholder="Nombre del contacto a facturar" class="form-control" style="display: block;">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                        <input type="text" name="telefono" placeholder="Teléfono del contacto a facturar" class="form-control">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" name="celular" placeholder="Celular del contacto a facturar" class="form-control">
                                    </div>

					                <div class="form-group col-lg-12">
					                    <label>Instrucciones y Observaciones</label>
					                    <textarea class="form-control" placeholder="Escriba aquí las observaciones para el técnico." rows="3"></textarea>
					                </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Calidad y servicio al cliente: Realizar los siguientes Procesos</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6 col-xs-12 checkbox">
                                        <label style="display: block;"><input type="checkbox" value="">Diagnostico Inicial</label>
                                        <label style="display: block;"><input type="checkbox" value="">Cronograma de Servicios</label>
                                        <label style="display: block;"><input type="checkbox" value="">Visitas de Calidad</label>
                                    </div> 

                                     <div class="form-group col-lg-6">
                                      <label>Frecuencia</label>
                                      <select class="form-control" id="">
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
                                        <input type="text" name="" placeholder="Ej: Cada 10 días" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 1</label>
                                        <input type="text" name="" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 2</label>
                                        <input type="text" name="" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 3</label>
                                        <input type="text" name="" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 4</label>
                                        <input type="text" name="" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Total Horas</label>
                                        <input type="text" name="" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor Hora</label>
                                        <input type="text" name="" placeholder="Ej: 60.000" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor Facturar</label>
                                        <input type="text" name="" placeholder="Ej: 127.600" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Control integrado de plagas y roedores</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="control-label">Servicios Contratados</label>
                                        <input type="text" name="" placeholder="Servicios requeridos por el cliente" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Frecuencia del Servicio</label>
                                        <select class="form-control" id="">
                                            <option>Nunca</option>
                                            <option>Ocasionalmente</option>
                                            <option>Frecuentemente</option>
                                            <option>Siempre</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Tipo Cliente</label>
                                        <select class="form-control" id="">
                                            <option>Servicio</option>
                                            <option>Visita</option>
                                            <option>Ejemplo</option>
                                            <option>Ejemplo</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Tapa de Alcantarilla</label>
                                        <select class="form-control" id="">
                                            <option>Si</option>
                                            <option>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Número de Tapas</label>
                                        <input type="text" name="" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Número de Residencias</label>
                                        <input type="text" name="" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Detalle de horas cotizadas por frecuencia</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Semanales</label>
                                        <input type="text" name="" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Mensuales</label>
                                        <input type="text" name="" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Trimestrales</label>
                                        <input type="text" name="" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Semestrales</label>
                                        <input type="text" name="" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Quincenales</label>
                                        <input type="text" name="" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Bimensuales</label>
                                        <input type="text" name="" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Cada 4 Meses</label>
                                        <input type="text" name="" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Anuales</label>
                                        <input type="text" name="" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Detalle y valor del servicio</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Total de Horas Cotizadas</label>
                                        <input type="text" name="" placeholder="Total de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor Hora Antes IVA</label>
                                        <input type="text" name="" placeholder="Valor" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor Inicial Antes IVA</label>
                                        <input type="text" name="" placeholder="Valor" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Forma de Pago</label>
                                        <input type="text" name="" placeholder="Ej: Contado, 3 Meses, etc." class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Facturación</label>
                                        <input type="text" name="" placeholder="Ej: SC" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">¿Tiene Contrato?</label>
                                        <select class="form-control">
                                            <option>Si</option>
                                            <option>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Número de Contrato</label>
                                        <input type="text" name="" placeholder="#" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Actividad Económica</label>
                                        <input type="text" name="" placeholder="Actividad Económica" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        {{-- <h3>Detalle y valor del servicio</h3> --}}
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Medio por el cual se entero de nuestro servicio</label>
                                        <select class="form-control">
                                            <option>Un amigo</option>
                                            <option>Internet</option>
                                            <option>Contacto Asesor Directamente</option>
                                            <option>Llamada Telefónica</option>
                                            <option>Directorio Telefónico</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Otro ¿Cúal?</label>
                                        <input type="text" name="" placeholder="Otros medios" class="form-control">
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Diligenciado por:</label>
                                        <input type="text" name="" placeholder="" class="form-control">
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Revisado por:</label>
                                        <input type="text" name="" placeholder="" class="form-control">
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="ibox-footer">
                                            <button type="submit" class="btn btn-w-m btn-primary">Imprimir</button>
                                            <button type="submit" class="btn btn-w-m btn-danger">Exportar a PDF</button>
                                            <button type="reset" class="btn btn-w-m btn-default">Cancelar</button>
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

    <script>
        //Evento change del select de clientes
        $("#select_clientes").change(event => {
            //Peticion GET al servidor a la ruta /clientes/{id} (Cliente con id = $id)
            $.get(`/clientes/${event.target.value}`, function (res) {
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
                $("#select_sedes").append(`<option value='' disabled selected> Selecciona una sede </option>`);
                if(res == ''){//Valida que el cliente tenga sedes
                    console.log('entra');
                }else{
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
    </script>

@endsection
@endsection