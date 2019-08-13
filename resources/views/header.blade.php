@section('header')
<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultorio</title>
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        div.prueba{
            height:90.4vh;
        }
        body{
            overflow: hidden;
        }
        .imgen
        {
            display:block;
            margin:auto;
            margin-top: 2vh;
            margin-bottom:2vh;
        }
        #sidenav-1
        {
            /*margin-top:4.6%;*/
            width:35vh;
        }
        .prli
        {
            border-top:solid 1px #bdbdbd;
        }
        li.active{
            background-color: #9e9e9e !important;
        }
    </style>
</head>
<body class="grey lighten-3">
   <div class="navbar-fixed">
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#">Ver Perfíl</a></li>
        <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>

    </ul>
    <nav class="cyan darken-3">
            <div class="nav-wrapper">
                <div class="container">
                    <ul class="right hide-on-med-and-down">
                        <li>Usuario: </li>
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="left material-icons">account_circle</i>Administrador<i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
   </div>
    
    <div class="row">
        <div class="col m2 grey prueba">
        <ul id="sidenav-1" class="sidenav sidenav-fixed white">
            <li><img class="imgen" src="{{asset('img/logo.jpg')}}" alt="" width="180" height="140"></li>
            <hr>
            <li class="{{(request () -> is ('almacen'))? 'active': ''}}"><a href="{{url('almacen')}}"><i class="material-icons">list_alt</i>Almacén</a></li>
            <li><a href="{{url('home')}}"><i class="material-icons">calendar_today</i>Citas</a></li>
            <li class="{{(request () -> is ('crm'))? 'active': ''}}"><a href="{{url('crm')}}"><i class="material-icons">folder_shared</i>CRM</a></li>
            <li class="{{(request () -> is ('RH_Empleados'))? 'active': ''}}"><a href="{{url('RH_Empleados')}}"><i class="material-icons">supervisor_account</i>Empleados</a></li>
            <li class="{{(request () -> is ('medicamentos'))? 'active': ''}}"><a href="{{url('medicamentos')}}"><i class="material-icons">local_hospital</i>Medicamentos</a></li>
            <li class="{{(request () -> is ('pacientes'))? 'active': ''}}"><a href="{{url('pacientes')}}"><i class="material-icons">accessibility</i>Pacientes</a></li>
            <li class="{{(request () -> is ('tablaProveedor'))? 'active': ''}}"><a href="{{url('tablaProveedor')}}"><i class="material-icons">local_shipping</i>Proveedores</a></li>
            <li class="{{(request () -> is ('usuarios'))? 'active': ''}}"><a href="{{url('usuarios')}}"><i class="material-icons">account_circle</i>Usuarios</a></li>
            <li class="{{(request () -> is ('reportes'))? 'active': ''}}"><a href="{{url('reportes')}}"><i class="material-icons">insert_chart</i>Reportes</a></li>
            <!--<li>
                <form method="POST" action="{{ route('logout') }}">
                    {{csrf_field()}}
                    <button  class="btn red darken-3 waves-effect waves-light"><i class="material-icons left">report</i>Cerrar Sesión</button>
                </form>
                
            </li>-->
            <!--<li><a href="{{url('home')}}"><i class="material-icons">build</i>Configuración</a></li>-->
        </ul>
        <!--<ul id="sidenav-1" class="sidenav sidenav-fixed">
                <li><a href="https://github.com/dogfalo/materialize/" target="_blank">Github</a></li>
                <li><a href="https://twitter.com/MaterializeCSS" target="_blank">Twitter</a></li>
                <li><a href="http://next.materializecss.com/getting-started.html" target="_blank">Docs</a></li>
        </ul>-->
        </div>
        <div class="col m10">
            
@show