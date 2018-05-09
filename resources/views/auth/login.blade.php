<!--
*
*  ABAS Sanicontol
*  version 1.0
*
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ABAS | Sanicontrol S.A.S</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>
<body class="gray-bg" style="background-image: url({{asset('img/bg1.jpg')}}); background-position: center;background-size: 100% 100%; background-attachment: fixed;">

    <div class="loginColumns animated fadeInDown" style="padding-top: 70px;" >
        <div class="row">
            @if(count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <strong>¡Error!</strong> {{$error}}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">

            {{-- <div class="col-md-6" style="padding-left: 0;padding-right: 0;">
                <div class="ibox-content" style="border-radius: 5px 0 0 5px;">
                    <img class="img img-responsive" src="img/logo-1.jpg" style="width: 305px;margin-left: 20px;"/>
                </div>
            </div> --}}
            <div class="col-md-12" style="padding-left: 0;padding-right: 0;">
                <div class="ibox-content" style="border-radius: 30px; border: none; background-color: #0009; padding: 50px 120px 50px 120px;"> {{-- #f2f6f8 --}}
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
						<div class="form-group text-center">
                            {{-- <div class="ibox-content" style="border-radius: 5px 0 0 5px;"> --}}
                                {{-- <img class="img img-responsive" src="img/logo-1.jpg" style="width: 120px;margin-left: 50;"/> --}}
                            {{-- </div> --}}
                            <button class="btn btn-info btn-circle btn-lg" type="button" style="width: 160px;height: 160px;border-radius: 100%;padding-right: 16px;background-color: #fff;border-color: #6AC331;"><i><img class="img img-responsive" src="img/logo-1.jpg" style="width: 200px;margin-left: auto;border-radius: 40px;"/></i>
                            </button>
                        </div>
						
                        <h5 style="text-align: center;font-size: 18px;font-weight: normal;margin-bottom: 30px;color: white;">Bienvenido a ABAS</h5>
						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" placeholder="Email" required="" value="{{ old('email') }}" name="email">

                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b" style="background-color: #6AC331;border-color: #6AC331;">Iniciar Sesión</button>
						
						<div class="form-group text-center">
                           <a href="{{ route('password.request') }}" >
                                <small style="color: #6ac331;">¿Olvidó su contraseña?</small>
                            </a>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-md-6 text-white">
                Copyright Sanicontrol S.A.S.
            </div>
            <div class="col-md-6 text-right text-white">
               <small>© 2018</small>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>

<html>