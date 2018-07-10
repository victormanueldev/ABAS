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
                                        <h1>AM-CM-01</h1>
                                        <button type="button" class="btn btn-w-m btn-primary"><span class="glyphicon glyphicon-refresh" aria-hidden="true" style="margin-right: 8px;"></span> Generar Código</button>
                                        <br>
                                        <br>                                                   
                                    </div>
    
                                        <div class="form-group col-lg-6" id="data_1">
                                            <label>Fecha *</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="fecha_creacion" class="form-control" placeholder="" name="fecha_creacion" required>
                                            </div>
                                        </div>
    
                                        <div class="form-group col-lg-6">
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
                                        <h3>Facturar a nombre de:</h3>
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
                                        <input type="text"  id="input-nit"  placeholder="Nit ó Cedula" class="form-control">
                                                    
                                    </div>


                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text"  id="input-direccion"  placeholder="Dirección de cliente" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text"  id="input-ciudad"  placeholder="Ciudad del cliente" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" id="input-barrio"  placeholder="Barrio del cliente" class="form-control">

                                    </div>

                                    
                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" id="input-contacto"  placeholder="Nombre de contacto del servicio" class="form-control">
                                        
                                    </div>
                                    
                                    <div class="form-group col-lg-6"><label class="control-label">Cargo *</label>
                                        <input type="text" id="input-cargo"  placeholder="Zona del cliente" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" id="input-telefono"  placeholder="Teléfono del contacto a facturar" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" id="input-celular"  placeholder="Celular del contacto a facturar" class="form-control">

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email"  id="input-email"  placeholder="Email del contacto a facturar" class="form-control">
                                        
                                    </div>
                                    
                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Realizar servicio en:</h3>
                                        <br>
                                    </div>
												

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Razón Social/Nombre *</label>
                                        
                                        <select class="form-control" id="select_sedes" name="id_sede" required>
                                            <option value="">Selecciona una sede</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Nit/Cedula *</label>
                                        <input type="text" id="input-sede-nit"  placeholder="Nit ó Cedula" class="form-control">
                                                    
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Dirección *</label>
                                        <input type="text"  id="input-sede-direccion" placeholder="Dirección de donde se realizará el servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Ciudad *</label>
                                        <input type="text" id="input-sede-ciudad"  placeholder="Ciudad donde se realizará el servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Barrio *</label>
                                        <input type="text" id="input-sede-barrio"  placeholder="Barrio donde se realizará el servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Zona *</label>
                                        <input type="text" id="input-sede-zona"  placeholder="Zona donde se realizará el servicio" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto *</label>
                                        <input type="text" id="input-sede-contacto"  placeholder="Nombre de contacto del lugar" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono *</label>
                                        <input type="text" id="input-sede-telefono"  placeholder="Teléfono del contacto del servicio" class="form-control">
                                        
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text" id="input-sede-celular"  placeholder="Celular del contacto del lugar" class="form-control">
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Email *</label>
                                        <input type="email" id="input-sede-email"   placeholder="Email del contacto del servicio" class="form-control">
                                        
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6"><label class="control-label">Contacto Factura *</label>
                                        <input type="text"  placeholder="Nombre del contacto a facturar" class="form-control" style="display: block;">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Teléfono </label>
                                        <input type="text"  placeholder="Teléfono del contacto a facturar" class="form-control">
                                        
                                    </div>
        
                                    <div class="form-group col-lg-6"><label class="control-label">Celular *</label>
                                        <input type="text"  placeholder="Celular del contacto a facturar" class="form-control">
                                    </div>

					                <div class="form-group col-lg-12">
					                    <label>Instrucciones y Observaciones</label>
					                    <textarea class="form-control" placeholder="Escriba aquí las observaciones para el técnico." rows="3" name="instrucciones" id="observaciones_tecnico" required></textarea>
					                </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Calidad y servicio al cliente: Realizar los siguientes Procesos</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6 col-xs-12 checkbox">
                                        <label style="display: block;"><input type="checkbox" name="diagnostico_inicial" value="1">Diagnostico Inicial</label>
                                        <label style="display: block;"><input type="checkbox" name="cronograma_servicios" value="2">Cronograma de Servicios</label>
                                        <label style="display: block;"><input type="checkbox" name="visita calidad" value="3">Visitas de Calidad</label>
                                    </div> 

                                    <div class="form-group col-lg-6">
                                        <label>Frecuencia</label>
                                        <select class="form-control" id="" name="frecuencia_calidad">
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

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Diligenciar cuando requiera plan de saneamiento</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-4"
                                    ><label class="control-label">Frecuencia de Visitas *</label>
                                        <input type="text" name="frecuencia_visitas" placeholder="Ej: Cada 10 días" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 1</label>
                                        <input type="text" name="visita_1" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 2</label>
                                        <input type="text" name="visita_2" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 3</label>
                                        <input type="text" name="visita_3" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Visita 4</label>
                                        <input type="text" name="visita_4" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Total Horas</label>
                                        <input type="text" name="total_horas_visita" placeholder="Ej: 1,77" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor Hora</label>
                                        <input type="text" name="valor_hora" placeholder="Ej: 60.000" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Valor Facturar</label>
                                        <input type="text" name="valor_facturar" placeholder="Ej: 127.600" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Observaciones</label>
                                        <textarea class="form-control" placeholder="Escriba aquí las observaciones que desee." rows="3" name="instrucciones"></textarea>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="control-label">Servicios Contratados</label>
                                        <input type="text" name="servicios_contratados" placeholder="Servicios requeridos por el cliente" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Frecuencia del Servicio</label>
                                        <select class="form-control" id="" name="frecuencia_plagas">
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

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Tipo Cliente</label>
                                        <select class="form-control" id="" name="tipo_cliente">
                                            <option>Servicio</option>
                                            <option>Visita</option>
                                            <option>Ejemplo</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Tapa de Alcantarilla</label>
                                        <select class="form-control" id="" name="tapa_alcantarilla">
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Número de Tapas</label>
                                        <input type="text" name="numero_tapas" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label class="control-label">Número de Residencias</label>
                                        <input type="text" name="numero_residencias" placeholder="Cantidad" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Detalle de horas cotizadas por frecuencia</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Semanales</label>
                                        <input type="text" name="horas_semanales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Mensuales</label>
                                        <input type="text" name="horas_mensuales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Trimestrales</label>
                                        <input type="text" name="horas_trimestrales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Semestrales</label>
                                        <input type="text" name="horas_semestrales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Quincenales</label>
                                        <input type="text" name="horas_quincenales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Bimensuales</label>
                                        <input type="text" name="horas_bimensuales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Cada 4 Meses</label>
                                        <input type="text" name="horas_4meses" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Horas Anuales</label>
                                        <input type="text" name="horas_anuales" placeholder="Número de horas" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        <br>
                                        <h3>Detalle y valor del servicio</h3>
                                        <hr>
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Total de Horas Cotizadas</label>
                                        <input type="text" name="total_horas_cotizadas" placeholder="Total de horas" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor Hora Antes IVA</label>
                                        <input type="text" name="valor_hora_antes" placeholder="Valor" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Valor Inicial Antes IVA</label>
                                        <input type="text" name="valor_inicia_antes" placeholder="Valor" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Forma de Pago</label>
                                        <input type="text" name="forma_pago" placeholder="Ej: Contado, 3 Meses, etc." class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Facturación</label>
                                        <input type="text" name="facturacion" placeholder="Ej: SC" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">¿Tiene Contrato?</label>
                                        <select class="form-control" name="contrato">
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Número de Contrato</label>
                                        <input type="text" name="numero_contrato" placeholder="#" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="control-label">Actividad Económica</label>
                                        <input type="text" name="actividad_economica" placeholder="Actividad Económica" class="form-control">
                                    </div>

                                    <div class="ibox-title col-lg-12">
                                        {{-- <h3>Detalle y valor del servicio</h3> --}}
                                        <br>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Medio por el cual se entero de nuestro servicio</label>
                                        <select class="form-control" name="medio_contacto">
                                            <option value="amigo">Un amigo</option>
                                            <option value="internet">Internet</option>
                                            <option value="contacto_asesor">Contacto Asesor Directamente</option>
                                            <option value="llamada_telefonica">Llamada Telefónica</option>
                                            <option value="directorio">Directorio Telefónico</option>
                                            <option value="directorio">Otro</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label class="control-label">Otro ¿Cúal?</label>
                                        <input type="text" name="otro" placeholder="Otros medios" class="form-control">
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
                                                <button type="submit" class="btn btn-primary" id="btn-submit">Imprimir</button>
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
@section('ini-scripts')
    <script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
    <script>

        //Validación de campo fecha
        function validacion(){
        //         var c_fecha = document.getElementById('fecha'), 
        //             boton = document.getElementById('btn');
        // }

            var valor = document.getElementById("fecha").value;

                if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                    
                    alert('¡Campo Fecha Vacio!');
                    return false;
            }
            
        }

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
        
        //Realiza la peticion POST al servidor (AJAX)
        function guardarSolicitud(codigo, fecha, frecuencia, id_cliente, id_sede, observaciones, crsfToken) {
            $.ajax({
                url: '/solicitud',
                data: {
                    'codigo_solicitud': codigo,
                    'fecha_creacion': fecha,
                    'frecuencia_servicio': frecuencia,
                    'id_cliente': id_cliente,
                    'id_sede': id_sede,
                    'observaciones': observaciones 
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
            var fecha = $("#fecha_creacion").val();
            var frecuencia_servicio = $("#frecuencia_servicio").val();
            var id_cliente = $("#select_clientes").val();
            var id_sede = $("#select_sedes").val();
            var observaciones = $("#observaciones_tecnico").val();
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
                    guardarSolicitud(codigo_solicitud, fecha, frecuencia_servicio, id_cliente, id_sede, observaciones, crsfToken);
                    //Alert de guardado con éxito
                    swal("¡Formato de solicitud guardado con éxito!", {
                        icon: "success",
                    });
                    
                }else if(res == null){ //Valida que el usuario presione el boton cancelar
                    return
                }else{
                    //Cambio de atributos
                    guardarSolicitud(res, fecha, frecuencia_servicio, id_cliente, id_sede, observaciones, crsfToken);
                    swal("¡Formato de solicitud guardado con éxito!", {
                        icon: "success",
                    }); 
                }
            });
        })
    </script>
@endsection

@endsection