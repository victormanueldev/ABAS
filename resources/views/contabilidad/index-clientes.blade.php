@extends('layouts.app')
@section('custom-css')
<!-- FooTable -->
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<script>
    document.getElementById('m-listado-clientes').setAttribute("class", "active");
    document.getElementById('a-listado-clientes').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Listado de Clientes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li>
                <a>Clientes</a>
            </li>
            <li class="active">
                <strong>Ver Clientes</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de clientes cerrados en el mes</h5>

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
                
                    <div class="table-responsive">
                        <table id="tabla_clientes_cont" class="table table-hover dataTables-example" data-filter=#filter>
                            <thead>
                            <tr>
                            
                                <th>NIT/Cédula</th>
                                <th>Tipo</th>
                                <th>Nombre/Razon Social</th>
                                <th>Contacto</th>
                                <th>Celular</th>
                                <th>No. Cotizacion</th>
                                <th>Valor acordado</th>
                                <th>Fecha de aprovación</th>
                                <th>Estado del cliente</th>

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
@endsection
@section('ini-scripts')
<!-- FooTable -->
{{-- <script src="{{asset('js/plugins/footable/footable.js')}}"></script> --}}
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<!-- Scripts de inicializacion -->
<script>
    $(document).ready(function(){
        var table = $("#tabla_clientes_cont").DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'excel', title: 'ListadoNovedadesSanicontrolSAS'},
                {extend: 'pdf', title: 'ListadoNovedadesSanicontrolSAS'}
            ],
            columns: [
                { 
                    data: 'cliente' ,
                    render: (cliente) => {
                        return cliente.nit_cedula
                    }
                },
                {
                    data: 'cliente' ,
                    render: (cliente) => {
                        return cliente.tipo_cliente
                    }
                },
                {
                    data: 'cliente' ,
                    render: (cliente) => {
                        return cliente.nombre_cliente
                    }
                },
                {
                    data: 'cliente' ,
                    render: (cliente) => {
                        return cliente.nombre_contacto_inicial
                    }
                },
                {
                    data: 'cliente' ,
                    render: (cliente) => {
                        return cliente.celular_contacto_inicial
                    }
                },
                { data: 'codigo' },
                { data: 'valor' },
                { 
                    data: 'updated_at',
                    render: (updatedAt) => {
                        return moment(updatedAt, "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD")
                    }
                },
                {
                    data: 'cliente',
                    render: (cliente) => {
                        return cliente.estado_negociacion == 'Prospecto' ? `<label class="label label-default">${cliente.estado_negociacion}</label>` : `<label class="label label-primary">${cliente.estado_negociacion}</label>`
                    }
                }
            ]
        });

        $.get('/cotizaciones/all')
            .then((res) => {
                console.log(res)
                table.rows.add(res).draw();
               // console.log(res)
            })
            .catch((err) => {
                console.log(err)
            })
    });

</script>
@endsection