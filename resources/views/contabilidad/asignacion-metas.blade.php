@extends('layouts.app')
@section('content')
<script>
    document.getElementById('m-metas-comerciales').setAttribute("class", "active");
    document.getElementById('a-metas-comerciales').removeAttribute("style");
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
                                                <label>Mes de vigencia:</label> 
                                                <select id="month-validity" class="form-control">
                                                </select>
                                            </div>
                                        <div class="form-group col-md-6">
                                            <label>Clientes Nuevos (M):</label>
                                                <input type="number" id="new-clients-m" class="form-control" placeholder="Ingresa el nuevo monto">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Recompras (M):</label>
                                                <input type="number" id="repurchase-m" class="form-control" placeholder="Ingresa el nuevo monto">
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
                                    <button id="btn-save-goal" type="button" class="btn btn-primary">Asignar</button>
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
<script>

    /**
    Declaracion de variables globales
    -----------------------------------------------------------------*/
    var userSelected = {
        id: '',
        role: '',
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
        now.month = moment().month();
        now.year = moment().year();
        months.forEach((value, index) =>{
            if(now.month <= index){
                $("#month-validity").append(`
                    <option value="${index}">${value}</option>
                `);
            }
        })

    })

    /**
    * Abre el modal para asignacion de metas y setea algunos valores a inputs
    **/
    function assignGoal(idUser, nameUser, idRole, role) {
        //Set global variable
        userSelected.id = idUser;
        userSelected.role = idRole;
        $("#name-user").val(nameUser);
        $("#role-user").val(role);
        //Valida que el rol sea Director Comercial
        if(idRole != 4){
            $("#new-clients-team-m").attr('disabled', 'disabled')
            $("#repurchase-team-m").attr('disabled', 'disabled')
            $("#adviser-y").attr('disabled', 'disabled')
            $("#team-y").attr('disabled', 'disabled')
        }else{
            $("#new-clients-team-m").prop('disabled', false);
            $("#repurchase-team-m").prop('disabled', false);
            $("#adviser-y").prop('disabled', false);
            $("#team-y").prop('disabled', false);
        }
        $("#btn-modal").click();
    }

    //Guardar Meta
    $("#btn-save-goal").click((event) => {
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
            role: userSelected.rol
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
            },
            error: (err) => {
                console.log(err);
            }
        });
    });
</script>
@endsection