@extends('layouts.app')
@section('custom-css')
<!-- FooTable -->
<link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel='stylesheet'>
@endsection
@section('content')
<script>
    document.getElementById('m-reporte-documentos').setAttribute("class", "active");
    document.getElementById('a-reporte-documentos').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Reporte de Documentoss</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Inicio</a>
            </li>
            <li class="active">
                <strong>Reporte de documentos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" id="clientes">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de clientes y documentos</h5>

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
                        <hr>
                        <div class="table-responsive">
                            <table id="tabla_docs_clientes" class="table table-hover dataTables-example" data-filter=#filter
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="width: 157px">Cliente</th>
                                        <th style="width: 122px">Sede</th>
                                        <th>S.</th>
                                        <th>Ctf.</th>
                                        <th>R. S.</th>
                                        <th>R. L.</th>
                                        <th>R. R. I.</th>
                                        <th>R. R E.</th>
                                        <th>RUT</th>
                                        <th>Doc. ID</th>
                                        <th>C. & C.</th>
                                    </tr>
                                </thead>
                                <tbody style="cursor: pointer">
                                </tbody>
                            </table>
                            {{Form::token()}}
                        </div>
                    </div>
                </div>
                <div class="ibox-footer">
                    <h5>Convenciones:</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <b>S.:</b><p style="display: inline">Solicitud a programación.</p><br>
                            <b>Ctf.:</b><p style="display: inline">Certificado de servicios.</p><br>
                            <i class="fa fa-check-circle" style="color: #5CAE27"></i> : <p style="display: inline">Documento existente en el sistema.</p><br>       
                        </div>
                        <div class="col-md-3">
                            <b>R.S.:</b><p style="display: inline">Ruta de saneamiento.</p><br>
                            <b>R.L.:</b><p style="display: inline">Ruta de Lámparas.</p><br>
                            <i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i> : <p style="display: inline">Documento inexistente en el sistema.</p>
                        </div>
                        <div class="col-md-3">
                            <b>R.R.I.:</b><p style="display: inline">Ruta de Roedores Interna.</p><br>
                            <b>R.R.E.:</b><p style="display: inline">Ruta de Roedores Externa.</p><br>
                        </div>
                        <div class="col-md-3">
                            <b>Doc. ID.:</b><p style="display: inline">Documento de identificación.</p><br>
                            <b>C & C.:</b><p style="display: inline">Certificado de Cámara y Comercio.</p><br>
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
<script>
    $(document).ready(function(){
        var arrayClientes = [];
        var table;
         //Inicializacion de la tabla
        table = $("#tabla_docs_clientes").DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'excel', title: 'ListadoNovedadesSanicontrolSAS' },
                    { extend: 'pdf', title: 'ListadoNovedadesSanicontrolSAS' }
                ],
                columns: [
                    {data: 'cliente.id'},
                    {data: 'cliente.nombre_cliente'},
                    {
                        data: 'sede',
                        render: (sede) => {
                            if(sede == ''){
                                return "Sede Única";
                            }else{
                                return sede.nombre;
                            }
                        }
                    },
                    {
                        data: 'solicitud',
                        render: (solicitud) => {
                            if(solicitud == ''){
                                return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                            }else{
                                return `<i class="fa fa-check-circle" style="color: #5CAE27"></i>`
                            }
                        }    
                    },
                    {
                        data: 'solicitud',
                        render: (solicitud) => {
                            if(solicitud != ''){
                                if(solicitud.certificados.length > 0){
                                    return `<i class="fa fa-check-circle" style="color: #5CAE27"></i>`
                                }else{
                                    return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                                }
                            }else{
                                return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                            }
                        }
                    },
                    {
                        data: 'solicitud',
                        render: (solicitud) => {
                            if(solicitud != ''){
                                if(solicitud.rutas.length > 0){
                                    let cont = 0;
                                    solicitud.rutas.forEach(ruta => {
                                        if(ruta.tipo == 'RUTA DE SANEAMIENTO'){
                                            cont++;
                                        }
                                    });
                                    if(cont > 0){
                                        return `<i class="fa fa-check-circle" style="color: #5CAE27"></i>`
                                    }else{
                                        return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;    
                                    }
                                }else{
                                    return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                                }
                            }else{
                                return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                            }
                        }
                    },
                    {
                        data: 'solicitud',
                        render: (solicitud) => {
                            if(solicitud != ''){
                                if(solicitud.rutas.length > 0){
                                    let cont = 0;
                                    solicitud.rutas.forEach(ruta => {
                                        if(ruta.tipo == 'RUTA DE LAMPARAS'){
                                            cont++;
                                        }
                                    });
                                    if(cont > 0){
                                        return `<i class="fa fa-check-circle" style="color: #5CAE27"></i>`
                                    }else{
                                        return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;    
                                    }
                                }else{
                                    return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                                }
                            }else{
                                return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                            }
                        }
                    },
                    {
                        data: 'solicitud',
                        render: (solicitud) => {
                            if(solicitud != ''){
                                if(solicitud.rutas.length > 0){
                                    let cont = 0;
                                    solicitud.rutas.forEach(ruta => {
                                        if(ruta.tipo == 'RUTA DE ROEDORES INTERNA'){
                                            cont++;
                                        }
                                    });
                                    if(cont > 0){
                                        return `<i class="fa fa-check-circle" style="color: #5CAE27"></i>`
                                    }else{
                                        return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;    
                                    }
                                }else{
                                    return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                                }
                            }else{
                                return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                            }
                        }
                    },
                    {
                        data: 'solicitud',
                        render: (solicitud) => {
                            if(solicitud != ''){
                                if(solicitud.rutas.length > 0){
                                    let cont = 0;
                                    solicitud.rutas.forEach(ruta => {
                                        if(ruta.tipo == 'RUTA DE ROEDORES EXTERNA'){
                                            cont++;
                                        }
                                    });
                                    if(cont > 0){
                                        return `<i class="fa fa-check-circle" style="color: #5CAE27"></i>`
                                    }else{
                                        return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;    
                                    }
                                }else{
                                    return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                                }
                            }else{
                                return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                            }
                        }
                    },
                    {
                        data: 'cliente.doc_rut',
                        render: (rut) => {
                            if(rut == 0){
                                return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                            }else{
                                return `<i class="fa fa-check-circle" style="color: #5CAE27"></i>`;
                            }
                        }
                    },
                    {
                        data: 'cliente.doc_identidad',
                        render: (identidad) => {
                            if( identidad == 0){
                                return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                            }else{
                                return `<i class="fa fa-check-circle" style="color: #5CAE27"></i>`;
                            }
                        }
                    },
                    {
                        data: 'cliente.doc_camara_comercio',
                        render: (camara_comercio) => {
                            if(camara_comercio == 0){
                                return `<i class="fa fa-warning" style="color: rgb(219, 165, 37)"></i>`;       
                            }else{
                                return `<i class="fa fa-check-circle" style="color: #5CAE27"></i>`;
                            }
                        }
                    }
                ]
            });


        $.get('/documentos/cliente')
        .then(res => {
            var i = 0;
            var j = 0;
            var arrayClientes2 = [];
            //Crea un array de clientes con su respectiva sede
            res.clientes.forEach((cliente,index) => {
                if(cliente.sedes.length > 0){   //Valida que el cliente tenga sedes
                    cliente.sedes.forEach((sede, ind) => {
                        arrayClientes[i] = {
                            cliente: cliente,
                            sede: sede,
                            solicitud: ''
                        } 
                        i++
                    })
                }else{
                    arrayClientes2[j] = {cliente: cliente, sede: '', solicitud: ''}
                    j++
                }
               
            });
            
            //Añade los clientes que no tienen sede al array
            arrayClientes2.forEach(value => {
                arrayClientes.push(value)
            })
            
            //Recorre las solicitudes para unirlas con su respectivo cliente-sede
            res.solicitudes.forEach((solicitud, index) => {
                arrayClientes.forEach((cliente, ind) => {
                    if(solicitud.cliente_id == cliente.cliente.id && solicitud.sede_id == cliente.sede.id){    //Busca su respectivo cliente-sede
                        arrayClientes[ind].solicitud = solicitud;
                    }else if(solicitud.cliente_id == cliente.cliente.id && solicitud.sede_id == 0){
                        arrayClientes[ind].solicitud = solicitud;
                    }
                })
            })
            console.log(arrayClientes)
            table.rows.add(arrayClientes).draw();
        })
        .catch(err => {
            console.log(err)
        })

        
    })
</script>
@endsection