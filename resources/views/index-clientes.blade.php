@extends('layouts.app')
@section('custom-css')
<!-- FooTable -->
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<script>
    document.getElementById('m-clientes').setAttribute("class", "active");
    document.getElementById('a-clientes').removeAttribute("style");
    document.getElementById('ml2-clientes').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-verClientes').setAttribute("class", "active");
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
                    <h5>Listado de todas las novedades</h5>

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
                    {{-- <div class="row">
                        <div class="col-sm-9">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                    placeholder="Buscar en todas las novedades">
                        </div>
                        <div class="col-sm-3">
                            <select id="entries" class="form-control input-sm m-b-xs">
                                <option selected class="text-muted">Cantidad de entradas</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div> --}}
                    
                    <div class="table-responsive">
                        <table id="tabla_clientes" class="table table-striped table-hover dataTables-example" data-filter=#filter>
                            <thead>
                            <tr>
                                
                                <th>NIT/Cédula</th>
                                <th>Tipo</th>
                                <th>Nombre/Razon Social</th>
                                <th>Municipio</th>
                                <th>Dirección</th>
                                <th>Contacto</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr class="gradeX">
                                    <td>{{$cliente->nit_cedula}}</td>
                                    <td>{{$cliente->tipo_cliente}}</td>
                                    <td>{{$cliente->nombre_cliente}}</td>
                                    <td>{{$cliente->municipio}}</td>
                                    <td>{{$cliente->direccion}}</td>
                                    <td>{{$cliente->nombre_contacto}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->celular}}</td>
                                    <td class="text-center"> <a class="btn btn-white" href="{{route('clientes.show', $cliente->id)}}"><i class="fa fa-edit text-navy"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <ver-clientes></ver-clientes> --}}
</div>
@endsection
@section('ini-scripts')
<!-- FooTable -->
{{-- <script src="{{asset('js/plugins/footable/footable.js')}}"></script> --}}
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<!-- Scripts de inicializacion -->
<script>
    $(document).ready(function(){
        $("#tabla_clientes").DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'excel', title: 'ListadoNovedadesSanicontrolSAS'},
                {extend: 'pdf', title: 'ListadoNovedadesSanicontrolSAS'}
            ]
        });

    });

</script>
@endsection