@extends('layouts.app')
@section('custom-css')
<!-- FooTable -->
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<script>
    document.getElementById('m-listado-servicios').setAttribute("class", "active");
    document.getElementById('a-listado-servicios').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Listado de Servicios</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Clientes</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de todos los servicios</h5>

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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center">
                                    <h4>Filtrar por fechas</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="data_5">
                                        <div class="input-daterange input-group" id="datepicker" style="width: 100%;">
                                            <input type="text" id="date-start" class="form-control-sm form-control"
                                                name="start" value="01/14/2018" />
                                            <span class="input-group-addon">hasta</span>
                                            <input type="text" id="date-end" class="form-control-sm form-control" name="end"
                                                value="01/22/2018" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-outline btn-primary" id="filter-dates">Aplicar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <div class="table-responsive">
                                <table id="tabla_clientes_cont" class="table table-hover dataTables-example"
                                    data-filter=#filter>
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Fecha de Inicio</th>
                                            <th>Fecha de Fin.</th>
                                            <th>Duración</th>
                                            <th>Tecnico</th>
                                            <th>Cliente</th>
                                            <th>Sede</th>
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
@endsection
@section('ini-scripts')
<!-- FooTable -->
{{--
<script src="{{asset('js/plugins/footable/footable.js')}}"></script> --}}
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment-timezone.js')}}"></script>
<!-- Scripts de inicializacion -->
<script>
    $(document).ready(function () {
        /** Asignacion de fechas por default a dateRange **/
        $("#date-start").val(moment().tz("America/Bogota").format("MM/DD/YYYY"));
        $("#date-end").val(moment().tz("America/Bogota").add(13, "days").format("MM/DD/YYYY"));

        /** Inicializacion del Date Range **/
        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var table = $("#tabla_clientes_cont").DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'excel', title: 'ListadoNovedadesSanicontrolSAS' },
                { extend: 'pdf', title: 'ListadoNovedadesSanicontrolSAS' }
            ],
            columns: [
                {
                    data: 'tipo',
                    render: (tipo) => {
                        var label;
                        switch (tipo) {
                            case 'Normal':
                                label = '<label class="label label-primary" style="padding: 2px 16px;">Normal</label>';
                                break;
                            case 'Refuerzo':
                                label = '<label class="label label-warning" style="padding: 2px 12px;">Refuerzo</label>';
                                break;
                            case 'Mensajeria':
                                label = '<label class="label label-info">Mensajeria</label>';
                                break;
                            case 'Neutro':
                                label = '<label class="label label-danger" style="padding: 2px 17px;">Neutro</label>';
                                break;
                            default:
                                label = '<label class="label label-info">Normal</label>';
                                break;
                        }
                        return label;
                    }
                },
                {
                    data: 'fecha_inicio',
                    render: (fechaInicio) => {
                        var dt = moment(fechaInicio, 'YYYY-MM-DD HH:mm:ss').format("YYYY-MM-DD hh:mm a");
                        return dt;
                    }
                },
                {
                    data: 'fecha_fin',
                    render: (fechaFin) => {
                        if(fechaFin == ''){
                            return '';
                        }
                        var dt = moment(fechaFin, 'YYYY-MM-DD HH:mm:ss').format("YYYY-MM-DD hh:mm a");
                        return dt;
                    }
                },
                {
                    data: 'duracion',
                    render: (duracion) => {
                        var hours = Math.floor((duracion) / 60);
                        var minutes = (duracion % 60);
                        return hours + " hr(s) " + minutes + " min(s)";
                    }
                },
                {
                    data: 'tecnicos',
                    render: (tecnicos) => {
                        return tecnicos.map(tecnico => {
                            return tecnico.nombre;
                        })
                    }
                },
                {
                    data: 'solicitud.cliente',
                    render: (cliente) => {
                        return cliente.nombre_cliente;
                    }
                },
                {
                    data: 'solicitud.sede',
                    render: (sede) => {
                        return sede.nombre;
                    }
                }
            ]
        });
        
        $("#filter-dates").click(e => {
            table.clear().draw();
            $.ajax({
                url: '/list/services',
                data: {
                    dateIni: moment($("#date-start").val(), 'MM/DD/YYYY').format("YYYY-MM-DD"),
                    dateEnd: moment($("#date-end").val(), 'MM/DD/YYYY').format("YYYY-MM-DD")
                },
                type: 'GET',
            })
                .then((res) => {
                    var data = res.map(services => {
                        if(!services.solicitud.sede){
                            services.solicitud.sede = {nombre: "Sede Unica"};
                            if(services.tipo === 'Mensajeria' || services.tipo === 'Neutro'){
                                //services.fecha_inicio = services.fecha_inicio+" 00:00:00";
                                services.fecha_fin = "";
                                return services;                            
                            }else {
                                return services;
                            }
                        }else{
                            if(services.tipo === 'Mensajeria' || services.tipo === 'Neutro'){
                                //services.fecha_inicio = services.fecha_inicio+" 00:00:00";
                                services.fecha_fin = "";
                                return services;                            
                            }else {
                                return services;
                            }
                            return services;
                        }
                        
                    })
                    console.log(data);
                    table.rows.add(data).draw();
                    // console.log(res)
                })
                .catch((err) => {
                    console.log(err)
                })
        })
    });

</script>
@endsection