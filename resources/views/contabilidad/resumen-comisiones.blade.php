@extends('layouts.app')
@section('custom-css')
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection
@section('content')
<script>
    document.getElementById('m-asignar-metas').setAttribute("class", "active");
    document.getElementById('a-asignar-metas').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Comisiones</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Comisiones Pendientes</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Comisiones de área comercial</h5>

                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tabla_comisiones" class="table table-hover dataTables-example"
                                        data-filter=#filter>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Código</th>
                                                <th>Fecha de inicio</th>
                                                <th>Fecha de fin</th>
                                                <th>Total pagado</th>
                                                <th>Total pendiente</th>
                                                <th>Fecha de pago</th>
                                                <th>Inspector</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
@section('ini-scripts')
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert/sweet-alert.js')}}"></script>
<script>

    var crsfToken = document.getElementsByName("_token")[0].value
    $(document).ready(function () {

        //Creacion del loader como un NodeElement
        var loader = document.createElement("div")
        loader.innerHTML = `
                <div class="sk-spinner sk-spinner-double-bounce">
                    <div class="sk-double-bounce1"></div>
                    <div class="sk-double-bounce2"></div>
                </div>`

        //Alert de confirmacion
        swal({
            title: "Recolectando información...",
            content: loader,
            buttons: false
        })

        //Inicializacion de DataTable
        var table = $("#tabla_comisiones").DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'excel', title: 'ComisionesSanicontrolSAS' },
                { extend: 'pdf', title: 'ComisionesSanicontrolSAS' }
            ],
            columns: [
                { data: 'id'},
                { data: 'codigo' },
                { data: 'fecha_inicio_comision' },
                { data: 'fecha_fin_comision'},
                { 
                    data: 'valor_pagado',
                    render: (valorPagado) => {
                        return `$ ${valorPagado.toLocaleString('de-DE')}`
                    }    
                },
                { 
                    data: 'valor_pendiente',
                    render: (valorPendiente) => {
                        return `$ ${valorPendiente.toLocaleString('de-DE')}`
                    } 
                },
                {
                    data: 'created_at',
                    render: (fechaCreacion) => {
                        return moment(fechaCreacion, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD')
                    }
                },
                { 
                    data: 'user', 
                    render: (user) => {
                        return `${user.nombres} ${user.apellidos}`
                    }
                }
            ]
        });

        //Obtiener las comisiones
        $.get('/comisiones')
            .then(res => {
                table.rows.add(res).draw()
                swal.close()
            })
    })
</script>
@endsection