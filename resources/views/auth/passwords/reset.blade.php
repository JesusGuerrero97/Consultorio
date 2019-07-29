<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restablecimiento de contraseña</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
  

    <style>
        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .blanco{
            width: 100%;
        }
        .imgen
        {
            display:block;
            margin:auto;
            margin-top:10%;
            margin-bottom:5%;
        }

        .form-signin {
        width: 100%;
        max-width: 450px;
        padding: 15px;
        margin: auto;
        }
        
        .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
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
        <form class="form-signin" method="POST" action="{{ route('password.update') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
                <div class="row">
                    <div class="col m12">
                        <div class="card">
                            <div class="card-content black-text"> 
                                <span class="card-title">Restablecimiento de contraseña</span>
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
                                        <input class="{{ $errors->has('password') ? 'invalid' : '' }}" id="contraseña" type="password" name="password">
                                        <label for="contraseña">Contraseña</label>
                                        <span class="red-text alert"> {{ $errors->first('password', ':message') }} </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m12">
                                        <i class="material-icons prefix">https</i>
                                        <input id="password-confirm" type="password" name="password_confirmation">
                                        <label for="password-confirm">Contraseña</label>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col m12">
                                        <button class="waves-effect waves-light btn blanco" type="submit">Confirmar Restablecimiento</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
    </div>
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/materialize.min.js')}}"></script>
    
</body>
</html>