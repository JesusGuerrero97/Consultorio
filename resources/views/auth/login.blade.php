<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <style>
        .blanco{
            width: 100%;
        }
        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .imgen
      {
        display:block;
        margin:auto;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>
</head>
<body class="text-center">
<div class="container">
      <form class="bc form-signin" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <img class="imgen" src="{{asset('img/logo.jpg')}}" alt="" width="180" height="140">
            <div class="row">
              <div class="input-field col m12">
                <i class="  material-icons prefix">email</i>
                <input  class="{{ $errors->has('email') ? 'invalid' : '' }}" id="email" autocomplete="off" type="email" name="email" value="{{ old('email') }}">
                <label for="email">Correo</label>
              </div>
              <span class="red-text alert"> {{ $errors->first('email', ':message') }}</span>
            </div>
            <div class="row">
              <div class="input-field col m12">
                <i class="material-icons prefix">https</i>
                <input class="{{ $errors->has('password') ? 'invalid' : '' }}" id="contraseña" type="password" name="password" ng-model="password">
                <label for="contraseña">Contraseña</label>
                <span class="red-text alert"> {{ $errors->first('password', ':message') }} </span>
              </div>
              
            </div>
            <div class="row">
              <div class="col m12">
                <button class="waves-effect waves-light btn blanco" type="submit">Iniciar Sesion</button>
              </div>
            </div>
            
            <div class="center-align">
                <a class="light-blue-text" href="{{ route('password.request') }}">
                <u>¿Olvidaste tu contraseña?</u></a>
            </div>
            
          </form>
    </div>

    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/materialize.min.js')}}"></script>
</body>
</html>