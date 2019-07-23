@extends('header')
@extends('footer')

@section('header')
    @parent
        <div class="container">
        <h1>Reportes</h1>
        <h1>"EN DESARROLLO"</h1>
        <a class="waves-effect waves-light btn">Reporte 1</a>
        <a class="waves-effect waves-light btn">Reporte 2</a>
        <a class="waves-effect waves-light btn">Reporte 3</a>
        <a class="waves-effect waves-light btn">Reporte 4</a>
        </div>
        @section('footer')
    @parent
  @endsection 
    @endsection