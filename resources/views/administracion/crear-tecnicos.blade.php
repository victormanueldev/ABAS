@extends('layouts.app')

@section('custom-css')
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<script>
    document.getElementById('m-crear-tecnicos').setAttribute("class", "active");
    document.getElementById('a-crear-tecnicos').removeAttribute("style");
</script>
<script src="{{asset('js/plugins/jscolor/jscolor.js')}}"></script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Registro de Técnicos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Crear técnicos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                {!! Form::open(['route' => ['tecnicos.store'], 'method' => 'POST', 'id' => 'crear-tecnicos']) !!}
                {!! Form::token() !!}

                <div class="ibox-title">
                    <h4>Formulario para creación de técnicos</h4>
                </div>

                <div class="ibox-content">
                    <p>Indique los datos del técnico para realizar el registro.</p>
                    <button type="button" style="margin-top: -35px;" class="btn btn-primary pull-right" id="btn-add-tecnico"><i
                            class="fa fa-plus"></i> Agregar Técnico</button>
                    <div class="row" id="tecnicos">
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Nombre Completo *</label>
                            <input style="text-transform: uppercase" type="text" name="nombre_tecnico-0" id="nombre_tecnico-0"
                                class="form-control" required placeholder="Escriba el nombre del tecnico">
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Color (Se mostrará en calendario) *</label>
                            <input type="text" name="color_tecnico-0" id="color_tecnico-0" class="form-control jscolor"
                                onchange="update(this.jscolor, 0)" required>
                        </div>
                        <div class="form-group col-lg-4" style="margin-top: 15px;">
                            <label class="control-label">Estado </label>
                            <select style="text-transform: uppercase" name="estado_tecnico-0" id="estado_tecnico-0"
                                class="form-control">
                                <option value="0" selected>Seleccione una opción</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
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

        <!-- <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="table-responsive">
                    <table id="tabla_tecnicos" class="table table-striped table-bordered table-hover dataTables-example"
                        data-filter=#filter>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Color</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection

@section('ini-scripts')
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<!-- <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script> -->
<script>
    var rgbStringColor = [];

    /**
    * Obtiene el valor RGB del color seleccionado en el input
    * @param picker {String} HTML Element
    * @param index {number} Indice del ID del input
    */
    function update(picker, index) {
        rgbStringColor[index] = picker.toRGBString();
    }

    $(document).ready(function () {
        var colorInputs = 1;
        var picker = '';
        
        //Evento click del boton añadir tecnico
        $("#btn-add-tecnico").click(() => {
            $("#tecnicos").append(`
                <div class="form-group col-lg-4" style="margin-top: 15px;">
                    <label class="control-label">Nombre Completo*</label>
                    <input  style="text-transform: uppercase" type="text" name="nombre_tecnico-${colorInputs}" id="nombre_tecnico-${colorInputs}" class="form-control" required placeholder="Escriba el nombre del tecnico">
                </div>
                <div class="form-group col-lg-4" style="margin-top: 15px;">
                    <label class="control-label">Color (Se mostrará en calendario)*</label>
                    <input type="text" name="color_tecnico-${colorInputs}" id="color_tecnico-${colorInputs}" class="form-control" required>
                </div>
                <div class="form-group col-lg-4" style="margin-top: 15px;">
                    <label class="control-label">Estado </label>
                    <select style="text-transform: uppercase"  name="estado_tecnico-${colorInputs}" id="estado_tecnico-${colorInputs}" class="form-control">
                        <option value="0" selected>Seleccione una opción</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
            `)

            //Crea una instancia de JSColor
            picker = new jscolor(document.getElementById(`color_tecnico-${colorInputs}`))
            //Evento Change del input
            $(`#color_tecnico-${colorInputs}`).on('change', function () {
                update(picker, colorInputs - 1)
            })
            colorInputs++;
        })

        //Inicializacion de la tabla
        // table = $("#tabla_tecnicos").DataTable({
        //     pageLength: 25,
        //     responsive: true,
        //     dom: '<"html5buttons"B>lTfgitp',
        //     buttons: [
        //         { extend: 'excel', title: 'ListadoNovedadesSanicontrolSAS' },
        //         { extend: 'pdf', title: 'ListadoNovedadesSanicontrolSAS' }
        //     ],
        //     columns: [
        //         {data: 'nombre'},
        //         {data: 'color'},
        //         {data: 'estado'},
        //         {
        //             data: 'id',
        //             render: (idTecnico) => {
        //                 //etiquetas HTML con botones y acciones
        //             }
        //         }
        //     ]
        // });

        //Peticion POST para guardar los tecnicos
        function crearTecnicos(arrTecnicos) {
            $.ajax({
                url: '/tecnicos',
                data: {
                    tecnicos: arrTecnicos
                },
                type: 'POST',
                headers: {
                    "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value
                }
            })
                .then(res => {
                    swal('¡Tecnicos creados!', 'La información fue guardada correctamente.', 'success')
                        .then(okPressed => {
                            if (okPressed) {
                                //Llenar la tabla
                            }
                        })
                })
                .catch(err => {
                    swal('¡Error!', err.statusText, 'error')
                })

        }

        $("#crear-tecnicos").submit(e => {
            var tecnicos = [];
            e.preventDefault()

            //Recorre los inputs y crea el array con los datos de cada tecnico
            for (let index = 0; index < colorInputs; index++) {
                tecnicos[index] = {
                    nombre: $(`#nombre_tecnico-${index}`).val(),
                    color: rgbStringColor[index],
                    estado: $(`#estado_tecnico-${index}`).val()
                }
            }

            swal({
                title: "¡Advertencia!",
                text: "¿Estás seguro de guardar esta información?",
                icon: "warning",
                buttons: {
                    cancel: true,
                    confirm: {
                        text: 'Aceptar',
                        visible: true,
                        value: true,
                        closeModal: false, //Muestra el Loader
                    }
                }
            })
                .then(isConfirm => {
                    if (isConfirm) {
                        crearTecnicos(tecnicos)
                    }
                })

        })
    })
</script>
@endsection