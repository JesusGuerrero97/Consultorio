@extends('footer')
@extends('header')

    @section('header')
        @parent
        <style>
            .crd{
                height:88vh;
            }
            .mrg{
                padding: 2%;   
            }
            .mrg2{
                padding: 1%;   
            }
        </style>
         <div ng-controller = "ctrl">
        <div class="card">
        <div class="row mrg">
            <table class="striped">
        <thead>
          <tr>
              <th>ID</th>
              <th>Tratamiento</th>
              <th>Pago</th>
              <th>Id Cita</th>
              <th>Id Tratamiento</th>
              <th>Id Empleado</th>
          </tr>
        </thead>
        <tbody>
            <?php 
                //die($consultas[0]);
            ?>
            @foreach($consultas as $consulta)
	            <tr>
	                <td>{!! $consulta->id !!}</td>
	                <td>{!! $consulta->tratamiento !!}</td>
                    <td>{!! $consulta->pago !!}</td>
	                <td>{!! $consulta->id_cita !!}</td>
	                <td>{!! $consulta->id_tratamiento !!}</td>
					<td>{!! $consulta->id_empleado !!}</td>
                     @endforeach
        </tbody>
        </table>
        </div>
        </div>
    </div>
         
        @section('footer')
            @parent
            <script>
                var app=angular.module('app',[]);
            	app.controller('ctrl',function($scope,$http){

            
                }); 
            </script>
        @endsection
    @endsection