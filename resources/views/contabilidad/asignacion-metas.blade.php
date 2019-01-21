@extends('layouts.app')
@section('custom-css')
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection
@section('content')
<script>
    document.getElementById('m-asignar-metas').setAttribute("class", "active");
    document.getElementById('a-asignar-metas').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Metas Comerciales</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li class="active">
                <strong>Asignación metas</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Lisato de empleados </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#assign-goal"
                    id="btn-modal">
                    Launch modal
                </button>
                <button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#assign-goal-inspect"
                    id="btn-modal-inspect">
                    Launch modal
                </button>
                <div class="ibox-content">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No. Identificación</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cargo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td style="padding: 15px;">{{$user->cedula}}</td>
                                <td style="padding: 15px;">{{$user->nombres}}</td>
                                <td style="padding: 15px;">{{$user->apellidos}}</td>
                                <td style="padding: 15px;">{{$user->cargo->descripcion}}</td>
                                <td class="text-primary"> <button class="btn btn-primary" onclick="assignGoal({{$user->id}},'{{$user->nombres}}',{{$user->cargo->id}},'{{$user->cargo->descripcion}}')"><i
                                class="fa fa-edit"></i> Asignar meta</button></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!--===================================================
                /* Modal de Asignacion de metas
                ====================================================-->
                <div class="modal inmodal fade" id="assign-goal-inspect" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            {!! Form::open(['id' =>'form-assignmet-goal']) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h2 class="modal-title" style="font-size: 23px;">Asignacion de Metas</h2>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Nombre:</label>
                                            <input type="text" id="name-user-inspect" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Cargo:</label>
                                            <input type="text" id="role-user-inspect" class="form-control" disabled>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    @for ($i = 0; $i < 12; $i++)                                      
                                        <div class="form-group col-md-4">
                                            <label>Mes de vigencia:</label> 
                                        <input id="month-validity-{{$i}}" class="form-control"/>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Clientes Nuevos:</label>
                                            <input type="number" id="new-clients-{{$i}}" class="form-control" placeholder="$">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Recompras:</label>
                                                <input type="number" id="repurchase-m-{{$i}}" class="form-control" placeholder="$">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button id="btn-save-goal-{{$i}}" type="button" class="btn btn-primary" style="margin-top: 24px;" onclick="saveGoal({{$i}})">Asignar</button>
                                        </div>
                                    @endfor 
                                        
                                        
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>


                <!--===================================================
                /* Modal de Asignacion de metas director comercial
                ====================================================-->
                <div class="modal inmodal fade" id="assign-goal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                {!! Form::open(['id' =>'form-assignmet-goal']) !!}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h2 class="modal-title" style="font-size: 23px;">Asignacion de Metas</h2>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre:</label>
                                                <input type="text" id="name-user" class="form-control" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Cargo:</label>
                                                <input type="text" id="role-user" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Metas mensuales:</label> 
                                                <input id="month-validity" type="button" class="form-control btn btn-primary" value="Editar metas"/>
                                            </div>
                                        <div class="form-group col-md-6">
                                            <label>Meta equipo clientes nuevos (M):</label>
                                                <input type="number" id="new-clients-team-m" class="form-control" placeholder="Ingresa el nuevo monto">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Meta equipo recompras (M):</label>
                                                <input type="number" id="repurchase-team-m" class="form-control" placeholder="Ingresa el nuevo monto">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Meta por inspector (A):</label>
                                                <input type="number" id="adviser-y" class="form-control" placeholder="Ingresa el nuevo monto">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Meta total equipo  (A):</label>
                                                <input type="number" id="team-y" class="form-control" placeholder="Ingresa el nuevo monto">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                    <button id="btn-save-goal-dir" type="button" class="btn btn-primary">Asignar</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<!-- Sweet Alert -->
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script>

    /**
    Declaracion de variables globales
    -----------------------------------------------------------------*/
    var userSelected = {
        id: '',
        role: '',
        name: '',
        idRole: 0

    }
    var now = {
        month: 0,
        year: 0
    };

    var crsfToken = document.getElementsByName("_token")[0].value;

    $(document).ready(function() {
        /** 
        Calculo de los meses posteriores al actual
        -------------------------------------------------------------*/
        let months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]
        months.forEach((value,index) => {
            $(`#month-validity-${index}`).val(value);
        })
        now.month = moment().month();
        now.year = moment().year();
        months.forEach((value, index) =>{
            if(now.month <= index && now.month < 11){
                $("#month-validity").append(`
                    <option value="${index}">${value}</option>
                `);
            }else if(now.month == 11){
                $("#month-validity").append(`
                    <option value="${index}">${value}</option>
                `);
            }
        })

    })

    /**
    * Abre el modal para asignacion de metas y asigna algunos valores a inputs
    **/
    function assignGoal(idUser, nameUser, idRole, role) {
        //Limpiar los inputs
        for (let index = 0; index < 12; index++) {
            $(`#new-clients-${index}`).val("");
            $(`#repurchase-m-${index}`).val("");
            $(`#btn-save-goal-${index}`).prop("disabled", false);
        }

        //Set global variable
        userSelected.id = idUser;
        userSelected.idRole = idRole;
        userSelected.name = nameUser;
        userSelected.role = role;

        //Valida que el rol sea Director Comercial
        if(idRole != 4){
            $("#name-user-inspect").val(nameUser);
            $("#role-user-inspect").val(role);
            $("#new-clients-team-m").attr('disabled', 'disabled');
            $("#repurchase-team-m").attr('disabled', 'disabled');
            $("#adviser-y").attr('disabled', 'disabled');
            $("#team-y").attr('disabled', 'disabled');
            $.get('/metas/comerciales/create')
            .then(res => {
                res.forEach(value => {
                    if(value.id == idUser && value.metas.length > 0){
                        value.metas.forEach((meta,index) => {
                           if(meta.anio_vigencia == moment().year()){
                            $(`#new-clients-${meta.mes_vigencia}`).val(meta.meta_clientes_nuevos);
                            $(`#repurchase-m-${meta.mes_vigencia}`).val(meta.meta_recompras);
                            $(`#btn-save-goal-${meta.mes_vigencia}`).attr('disabled','disabled');
                           }
                        })
                    }
                })
            })
            .catch(err => {
                console.log(err)
            })
            if($('#assign-goal').hasClass('in')){   //Valida si el modal esta activo
                $('#assign-goal')
                .modal('hide')                          //Oculta el modal abierto
                .on('hidden.bs.modal', function (e) {   //Evento de ocultar el modal abiert
                    $('#assign-goal-inspect').modal('show');    //Muestra el nuevo modal

                    $(this).off('hidden.bs.modal');     // Quita el evento del objeto actual
                });
            }else{
                $("#btn-modal-inspect").click();
            }
        }else{
            $("#name-user").val(nameUser);
            $("#role-user").val(role);
            $("#new-clients-team-m").prop('disabled', false);
            $("#repurchase-team-m").prop('disabled', false);
            $("#adviser-y").prop('disabled', false);
            $("#team-y").prop('disabled', false);
            $("#btn-modal").click();
        }
    }

    function saveGoal(idMonthGoal) {
        let goal = {
            clientesNuevos:$(`#new-clients-${idMonthGoal}`).val(),
            recompras:$(`#repurchase-m-${idMonthGoal}`).val(),
            mesVigencia:idMonthGoal,
            anioVigencia:now.year,
            idUser: userSelected.id,
            role: userSelected.idRole
        }

        $.ajax({
            url: '/metas/comerciales',
            data: goal,
            type: 'POST',
            headers: {
                "X-CSRF-TOKEN": crsfToken   //Token de seguridad
            },
            success: (res) => {
                swal('¡Excelente!', 'La Meta ha sido asignada con éxito', 'success')

                console.log(res);
            },
            error: (err) => {
                swal('Error!', 'Ha ocurrido un error al intentar guardar la meta', 'error')
                console.log(err);
            }
        });
    }

    $("#month-validity").click(e => {
        assignGoal(userSelected.id, userSelected.name, 1, userSelected.role);
    })

    //Guardar Meta
    $("#btn-save-goal-dir").click((event) => {
        event.preventDefault();
        let goal = {
            clientesNuevos:$("#new-clients-m").val(),
            recompras:$("#repurchase-m").val(),
            mesVigencia:now.month,
            metaEquipoClentesNuevos:$("#new-clients-team-m").val(),
            metaEquipoRecompras:$("#repurchase-team-m").val(),
            metaAnualEquipo:$("#team-y").val(),
            metaAnualPorInspector:$("#adviser-y").val(),
            anioVigencia:now.year,
            idUser: userSelected.id,
            role: userSelected.idRole
        }

        $.ajax({
            url: '/metas/comerciales',
            data: goal,
            type: 'POST',
            headers: {
                "X-CSRF-TOKEN": crsfToken   //Token de seguridad
            },
            success: (res) => {
                console.log(res);
                swal('¡Excelente!', 'La Meta ha sido asignada con éxito', 'success')
            },
            error: (err) => {
                console.log(err);
                swal('Error!', 'Ha ocurrido un error al intentar guardar la meta', 'error')
            }
        });
    });
</script>
@endsection