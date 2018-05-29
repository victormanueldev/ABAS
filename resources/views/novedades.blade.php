@extends('layouts.app')
@section('custom-css')
<!-- FooTable -->
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Novedades</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li>
                Novedades
            </li>
            <li class="active">
                <strong>Listado</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
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
                            <table id="tabla_novedades" class="table table-striped table-bordered table-hover dataTables-example" data-filter=#filter>
                                <thead>
                                <tr>
                                    
                                    <th>Publicó</th>
                                    <th>Descripción</th>
                                    <th>Fecha de publicación</th>
                                    <th>Resolvió</th>
                                    <th>Fecha de solución</th>
                                    <th>Comentario</th>
                                    <th>Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $novedad)
                                    <tr class="gradeX">
                                        
                                        <td>{{$novedad['nombres_user1']}} {{$novedad['apellidos_user1']}}</td>
                                        <td>{{$novedad['descripcion']}}</td>
                                        <td class="center">{{$novedad['fecha_creacion']}} - {{$novedad['hora_creacion']}}</td>
                                        <td>{{$novedad['nombres_user2']}} {{$novedad['apellidos_user2']}}</td>
                                        <td class="center">{{$novedad['fecha_resuelto']}} - {{$novedad['hora_resuelto']}}</td>
                                        <td class="center">{{$novedad['comentario']}}</td> 
                                         @if($novedad['estado'] == 'publicada')
                                            <td><span class="label label-primary">Publicada</span></td>
                                        @else
                                            <td><span class="label label-warning">Resuelta</span></td>
                                        @endif
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
</div>
@endsection
@section('ini-scripts')
<!-- FooTable -->
{{-- <script src="{{asset('js/plugins/footable/footable.js')}}"></script> --}}
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<!-- Scripts de inicializacion -->
<script>
    $(document).ready(function(){
        $('#tabla_novedades').DataTable({
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