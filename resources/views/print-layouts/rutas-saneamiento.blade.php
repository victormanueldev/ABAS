<!DOCTYPE html>
<html>

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
        @foreach ($data["rs"] as $rutaSaneamiento)
        <div class="wrapper wrapper-content p-xl">
          <div class="ibox-content p-xl">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <h4 class="text-center">RUTA DE SANEAMIENTO</h4>
                @if(empty($data["ods"][$loop->index]->solicitud->sede))
                <h5 class="text-center">{{$data["ods"][$loop->index]->solicitud->cliente->nombre_cliente}}</h5>
                @else
                <h5 class="text-center">{{$data["ods"][$loop->index]->solicitud->sede->nombre}}</h5>
                @endif
              </div>
            </div>
      
            <div class="table-responsive m-t">
              <table class="table invoice-table">
                <thead>
                  <tr>
                    <th>Fecha del Servicio</th>
                    <th>Hora de inicio</th>
                    <th>Hora de Fin</th>
                    <th>Tecnicos</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      {{$data["ods"][$loop->index]->fecha_inicio }}
                    </td>
                    <td>
                      {{$data["ods"][$loop->index]->hora_inicio }}
                    </td>
                    <td>
                      {{$data["ods"][$loop->index]->hora_fin }}
                    </td>
                    <td>
                      @foreach ($data["ods"][$loop->index]->tecnicos as $tecnico)
                      {{$tecnico->nombre}} <br>
                      @endforeach
                    </td>
                  </tr>
      
                </tbody>
              </table>
            </div><!-- /table-responsive -->
      
            <div class="table-responsive m-t">
              <table class="table invoice-table">
                <thead>
                  <tr>
                    <th>Areas</th>
                    <th>Frecuencia</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rutaSaneamiento->contenido as $area)
                  <tr>
                    <td>{{$area["area"]}}</td>
                    <td>{{$area["frecuencia"]}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- /table-responsive -->
      
            <div class="well m-t"><strong>Comments</strong>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking
              at its layout. The point of using Lorem Ipsum is that it has a more-or-less
            </div>
          </div>
        </div>
        @endforeach

</body>

</html>