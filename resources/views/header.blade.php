@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
    </style>
</head>
<body>
   <div class="navbar-fixed">
    <nav class="cyan lighten-1">
            <div class="nav-wrapper">
                <div class="container">
                    <a href="#" class="brand-logo">Logo</a>
                    <ul id="" class="right hide-on-med-and-down">
                        <li><a href="sass.html">Sass</a></li>
                        <li><a href="badges.html">Components</a></li>
                        <li><a href="collapsible.html">JavaScript</a></li>
                    </ul>
                </div>
            </div>
        </nav>
   </div>
    

    <div class="row">
        <div class="col m3 grey prueba">
        
        </div>
        <div class="col m9">
            
@show