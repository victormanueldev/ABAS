<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ABAS | Opciones de Impresion</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="white-bg">
    @foreach ($data["ctf"] as $certificado)
    <div class="wrapper wrapper-content p-xl">
        <div class="ibox-content p-xl">
            <div class="row">
                <div class="col-sm-6">
                    <h5>2018/11/17 Cali, Valle del Cauca</h5>
                    <h4>Admin BD Sanicontrol</h4>
                    <address>
                        <strong>Sanicontrol S.A.S.</strong><br>
                        NIT 9999999999-7<br>
                        Cali, Valle<br>
                        <abbr title="Phone">T:</abbr> 645 7854
                    </address>

                    <h3>Cliente</h3>

                    <b>NIT/No. de cédula: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->cliente->nit_cedula}}</p>

                    <b>Nombre/Razón Social: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->cliente->nombre_cliente}}</p>

                    <b>Dirección: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->cliente->direccion}}</p>

                    <b>Contacto: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->cliente->nombre_contacto}}</p>

                </div>

                <div class="col-sm-6 text-right">
                    <h5>Certificado No.</h5>
                    <h4 class="text-navy">CTF-000087-02</h4>
                    <span>{{$data["ods"][$loop->index]->frecuencia}} Dias</span>
                    <address>
                        <strong>{{$data["ods"][$loop->index]->fecha_inicio}}</strong><br>
                        {{$data["ods"][$loop->index]->hora_inicio}}<br>
                        <abbr title="Phone"></abbr> ({{$data["ods"][$loop->index]->duracion}}) Minutos
                    </address>

                    <h3>Sede</h3>
                    @if(empty($data["ods"][$loop->index]->solicitud->sede))
                    <b>NIT/No. de cédula: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->cliente->nit_cedula}}</p>

                    <b>Nombre/Razón Social: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->cliente->nombre}}</p>

                    <b>Dirección: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->cliente->direccion}}</p>

                    <b>Contacto: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->cliente->nombre_contacto}}</p>
                    @else
                    <b>NIT/No. de cédula: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->cliente->nit_cedula}}</p>

                    <b>Nombre/Razón Social: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->sede->nombre}}</p>

                    <b>Dirección: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->sede->direccion}}</p>

                    <b>Contacto: </b>
                    <p>{{$data["ods"][$loop->index]->solicitud->sede->nombre_contacto}}</p>
                    @endif
                </div>
            </div>

            <div class="table-responsive m-t">
                    <table class="table invoice-table">
                        <thead>
                            <tr>
                                <th>Tratamientos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificado->tratamientos as $tratamiento)
                                <tr>
                                    <td>{{$tratamiento}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /table-responsive -->

            <div class="table-responsive m-t">
                <table class="table invoice-table">
                    <thead>
                        <tr>
                            <th>Productos Utilizados</th>
                            <th>Nombre Comercial</th>
                            <th>Toxicidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificado->productos as $producto)
                            <tr>
                                <td>{{$producto["producto"]}}</td>
                                <td>{{$producto["nombreComercial"]}}</td>
                                <td>{{$producto["toxicidad"]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /table-responsive -->

            <div class="well m-t text-center"><strong>CONCEPTO SANITARIO UES VALLE ACTA P-00173-11 2006</strong></div>


            <div class="row">
                <div class="col-md-6">
                    <div>
                        <p>Asitente Tecnico: </p><strong>Guillermo Pardo Botero</strong>
                        <p>Profesion: </p><strong>Ingeniero Agronomo</strong>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <p>Tecnico Aplicador: </p><strong>{{$data["ods"][$loop->index]->tecnicos[0]->nombre}}</strong>
                        <p>Carnet: </p><strong>145687656</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</body>

</html>