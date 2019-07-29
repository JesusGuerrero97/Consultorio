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
            width:34.7vh;
        }
        .prli
        {
            border-top:solid 1px #bdbdbd;
        }
    </style>
</head>
<body class="grey lighten-3">
   <div class="navbar-fixed">
    <nav class="cyan darken-3">
            <div class="nav-wrapper">
                <div class="container">
                    <ul id="" class="right hide-on-med-and-down">
                        <li><a href="sass.html">Usuario:</a></li>
                        <li><a href="badges.html">Administrador</a></li>
                        <li><a href="collapsible.html">Cerrar Sesión</a></li>
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
            <li><a href="/RH_Empleados"><i class="material-icons">supervisor_account</i>Empleados</a></li>
            <li><a class="" href="{{url('pacientes')}}"><i class="material-icons">accessibility</i>Pacientes</a></li>
            <li><a class="" href="{{url('home')}}"><i class="material-icons">calendar_today</i>Citas</a></li>
            <li><a class="" href="{{url('almacen')}}"><i class="material-icons">list_alt</i>Almacén</a></li>
            <li><a class="" href="{{url('medicamentos')}}"><i class="material-icons">local_hospital</i>Medicamentos</a></li>
            <li><a class="" href="{{url('crm')}}"><i class="material-icons">folder_shared</i>CRM</a></li>
            <li><a class="" href="{{url('tablaProveedor')}}"><i class="material-icons">local_shipping</i>Proveedores</a></li>
            <li><a class="" href="{{url('usuarios')}}"><i class="material-icons">account_circle</i>Usuarios</a></li>
            <li><a class="" href="{{url('reportes')}}"><i class="material-icons">insert_chart</i>Reportes</a></li>
            <li><a class="" href="{{url('home')}}"><i class="material-icons">build</i>Configuración</a></li>
        </ul>
        <!--<ul id="sidenav-1" class="sidenav sidenav-fixed">
                <li><a href="https://github.com/dogfalo/materialize/" target="_blank">Github</a></li>
                <li><a href="https://twitter.com/MaterializeCSS" target="_blank">Twitter</a></li>
                <li><a href="http://next.materializecss.com/getting-started.html" target="_blank">Docs</a></li>
        </ul>-->
        </div>
        <div class="col m10">
            
@show