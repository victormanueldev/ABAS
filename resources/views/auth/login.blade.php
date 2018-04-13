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
<body class="gray-bg" style="background-color: #5CAE27;">

    <div class="loginColumns animated fadeInDown" style="padding-top: 150px;" >
        <div class="row">
            @if(count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
        </div>
        <div class="row">

            <div class="col-md-6" style="padding-left: 0;padding-right: 0;">
                <div class="ibox-content" style="border-radius: 5px 0 0 5px;">
                    <img class="img img-responsive" src="img/logo-1.jpg" style="width: 305px;margin-left: 20px;"/>
                </div>
            </div>
            <div class="col-md-6" style="padding-left: 0;padding-right: 0;">
                <div class="ibox-content" style="border-radius: 0 5px 5px 0; background-color: #f2f6f8;">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
						<div class="form-group text-center">
                            <button class="btn btn-info btn-circle btn-lg" type="button" style="width: 60px;height: 60px;border-radius: 100%;padding-right: 16px;background-color: #6AC331;border-color: #6AC331;"><i><img src="img/abas_logo.png" style="width: 29px;"/></i></button>
                        </div>
						
                        <h5 style="text-align: center;font-size: 18px;font-weight: normal;margin-bottom: 30px;">Bienvenido a ABAS</h5>
						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" placeholder="Email" required="" value="{{ old('email') }}" name="email">

                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b" style="background-color: #6AC331;border-color: #6AC331;">Iniciar Sesión</button>
						
						<div class="form-group text-center">
                           <a href="{{ route('password.request') }}" >
                                <small>¿Olvidó su contraseña?</small>
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

</body>

<html>