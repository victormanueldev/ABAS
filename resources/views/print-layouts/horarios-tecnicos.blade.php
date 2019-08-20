<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .body {
            background: #f2f2f2;
            font-family: "Roboto";
            border-top: 30px solid #5CAE27;
            border-bottom: 20px solid #5CAE27;
            margin-bottom: 30px;
        }

        .wrap {
            width: 100%;
            /* max-width: 1200px; */
            padding: 40px;
            /* margin: auto; */
            background: #fff;
            box-shadow: 0px 0px 3px grey;
            text-align: center;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 300;
        }

        h1 {
            font-size: 30px;
        }

        h2 {
            font-size: 24px;
        }

        h3 {
            font-size: 16px;
        }

        h4 {
            font-size: 14px;
        }

        h5 {
            font-size: 12px;
        }

        h6 {
            font-size: 10px;
        }

        h3,
        h4,
        h5 {
            margin-top: 5px;
            font-weight: 600;
        }

        .contenedor-formulario {
            width: 100%;
            color: #303030;
            /* padding: 50px; */
        }

        .contenedor-formulario .formulario {
            width: 100%;
            /* margin: auto; */
        }

        .contenedor-formulario .formulario .input-group {
            position: relative;
            margin-bottom: 32px;
        }

        .contenedor-formulario .formulario .input-group input[type="text"],
        .contenedor-formulario .formulario .input-group input[type="email"],
        .contenedor-formulario .formulario .input-group input[type="password"] {
            font-family: "Helvetica";
            font-size: 16px;
            color: #303F9F;
            width: 100%;
            outline: none;
            padding: 15px;
            background: none;
            border: none;
            border-bottom: 2px solid #BBDEFB;
        }

        /* TABLES */
        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table td,
        .table th {
            background-color: #fff !important;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd !important;
        }

        .table-bordered {
            border: 1px solid #EBEBEB;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>thead>tr>td {
            background-color: #F5F5F6;
            border-bottom-width: 1px;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            border: 1px solid #e7e7e7;
        }

        .table>thead>tr>th {
            border-bottom: 1px solid #DDDDDD;
            vertical-align: bottom;
        }

        .table>thead>tr>th,
        .table>tbody>tr>th,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            border-top: 1px solid #e7eaec;
            line-height: 1.42857;
            padding: 8px;
            vertical-align: top;
        }

        .tecnico {
            width: 30%;
            position: relative;
            text-align: center;
            margin-bottom: 25px;
            display: inline-block;
            margin-top: 20px
        }
    </style>
</head>

<body>
    @foreach ($data['tecnicos'] as $tecnico)
    @if(!$tecnico->servicios->isEmpty() || $tecnico->servicios->count() > 0)
    <div class="body">

        <div class="contenedor-formulario">
            <div class="wrap">
                <div style="position: relative;float: left;">
                  <img src="{{asset('print-files/ods/22905_image002.png')}}" alt="" width="150" height="80">
                </div>
                <h1>Horario de Técnico</h1>
                <div class="tecnico">
                    <h4>Nombre: </h4><span style="text-transform: uppercase"> {{$tecnico->nombre}}</span>
                </div>
                <div class="tecnico">
                    <h4>Fecha Actual: </h4><span> {{$data[0]['now']}}</span>
                </div>
                <form action="" class="formulario" name="formulario_registro" method="get">
                    <div style="width: 100%">
                        <table class="table table-bordered">
                            <thead>
                                <th style="width: 130px;text-align: center">Hora de Inicio</th>
                                <th style="width: 130px;text-align: center">Hora de Fin</th>
                                <th style="width: 270px;">Cliente</th>
                                <th style="width: 270px;">Sede</th>
                                <th>Direccion</th>
                            </thead>
                            <tbody>
                                <!-- 13 SERVICIOS -->
                                @for ($i = 0; $i < 11; $i++)                                    
                                  <tr style="height: 58px;">
                                      <td style="text-align: center">{{ isset($tecnico->servicios[$i]) ?  date('h:i A', strtotime($tecnico->servicios[$i]->hora_inicio)) : ""}}</td>
                                      <td style="text-align: center">{{ isset($tecnico->servicios[$i]) ?  date('h:i A', strtotime($tecnico->servicios[$i]->hora_inicio)) : ""}}</td>
                                      <td style="text-align: center">{{ isset($tecnico->servicios[$i]) ?  $tecnico->servicios[$i]->solicitud->cliente->nombre_cliente : ""}}</td>
                                      <td style="text-align: center">
                                        @php
                                            if(isset($tecnico->servicios[$i])){
                                              if(isset($tecnico->servicios[$i]->solicitud->sede)){
                                                echo $tecnico->servicios[$i]->solicitud->sede->nombre;
                                              }else{
                                                echo "SEDE ÚNICA";
                                              }
                                            }
                                        @endphp
                                      </td>
                                      <td style="text-align: center">
                                          @php
                                            if(isset($tecnico->servicios[$i])){
                                              if(isset($tecnico->servicios[$i]->solicitud->sede)){
                                                echo $tecnico->servicios[$i]->solicitud->sede->direccion;
                                              }else{
                                                echo $tecnico->servicios[$i]->solicitud->cliente->direccion;
                                              }
                                            }
                                        @endphp
                                      </td>
                                  </tr>
                                @endfor
    
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
    @endif

  @endforeach
</body>

</html>