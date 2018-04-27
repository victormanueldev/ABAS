@extends('layouts.app')
@section('content')
<script>
    document.getElementById('m-ver-clientes').setAttribute("class", "active");
    document.getElementById('a-ver-clientes').removeAttribute("style");
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
    <ver-clientes></ver-clientes>
</div>
@endsection