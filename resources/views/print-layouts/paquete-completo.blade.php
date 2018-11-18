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
  @foreach ($data["ods"] as $ods)
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
          <p>{{$ods->solicitud->cliente->nit_cedula}}</p>

          <b>Nombre/Razón Social: </b>
          <p>{{$ods->solicitud->cliente->nombre_cliente}}</p>

          <b>Dirección: </b>
          <p>{{$ods->solicitud->cliente->direccion}}</p>

          <b>Contacto: </b>
          <p>{{$ods->solicitud->cliente->nombre_contacto}}</p>

        </div>

        <div class="col-sm-6 text-right">
          <h5>Orden de Servicios No.</h5>
          <h4 class="text-navy">ODS-0000A7-01</h4>
          <span>{{$ods->frecuencia}} Dias</span>
          <address>
            <strong>{{$ods->fecha_inicio}}</strong><br>
            {{$ods->hora_inicio}}<br>
            <abbr title="Phone"></abbr> ({{$ods->duracion}}) Minutos
          </address>

          <h3>Sede</h3>
          @if(empty($ods->solicitud->sede))
          <b>NIT/No. de cédula: </b>
          <p>{{$ods->solicitud->cliente->nit_cedula}}</p>

          <b>Nombre/Razón Social: </b>
          <p>{{$ods->solicitud->cliente->nombre}}</p>

          <b>Dirección: </b>
          <p>{{$ods->solicitud->cliente->direccion}}</p>

          <b>Contacto: </b>
          <p>{{$ods->solicitud->cliente->nombre_contacto}}</p>
          @else
          <b>NIT/No. de cédula: </b>
          <p>{{$ods->solicitud->cliente->nit_cedula}}</p>

          <b>Nombre/Razón Social: </b>
          <p>{{$ods->solicitud->sede->nombre}}</p>

          <b>Dirección: </b>
          <p>{{$ods->solicitud->sede->direccion}}</p>

          <b>Contacto: </b>
          <p>{{$ods->solicitud->sede->nombre_contacto}}</p>
          @endif
        </div>
      </div>

      <div class="table-responsive m-t">
        <table class="table invoice-table">
          <thead>
            <tr>
              <th>Servicios</th>
              <th>Tecnicos</th>
              <th>Observaciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                @foreach ($ods->tipos as $tiposServicio)
                {{$tiposServicio->nombre }}<br>
                @endforeach
              </td>
              <td>
                @foreach ($ods->tecnicos as $tecnico)
                {{$tecnico->nombre}} <br>
                @endforeach
              </td>
              <td>{{$ods->solicitud->observaciones}}</td>
            </tr>

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

  @foreach ($data["rl"] as $rutaLamparas)
  <div class="wrapper wrapper-content p-xl">
    <div class="ibox-content p-xl">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <h4 class="text-center">RUTA DE LAMPARAS</h4>
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
            @foreach ($rutaLamparas->contenido as $area)
            <tr>
              <td>{{$area["area"]}}</td>
              <td>{{$area["tipoLampara"]}}</td>
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

  @foreach ($data["rri"] as $rutaRoedoresInterna)
  <div class="wrapper wrapper-content p-xl">
    <div class="ibox-content p-xl">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <h4 class="text-center">RUTA DE ROEDORES INTERNA</h4>
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
              <th>Tipo de Trampa</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rutaRoedoresInterna->contenido as $area)
            <tr>
              <td>{{$area["area"]}}</td>
              <td>{{$area["tipoTrampa"]}}</td>
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

  @foreach ($data["rre"] as $rutaRoedoresExterna)
  <div class="wrapper wrapper-content p-xl">
    <div class="ibox-content p-xl">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <h4 class="text-center">RUTA DE ROEDORES EXTERNA</h4>
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
              <th>Tipo de trampa</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rutaRoedoresExterna->contenido as $area)
            <tr>
              <td>{{$area["area"]}}</td>
              <td>{{$area["tipoTrampa"]}}</td>
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