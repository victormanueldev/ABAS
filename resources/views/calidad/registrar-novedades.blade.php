@extends('layouts.app')
@section('content')
<script>
    document.getElementById('m-listado-servicios').setAttribute("class", "active");
    document.getElementById('a-listado-servicios').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Registro de Novedades</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Registro de novedades</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
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