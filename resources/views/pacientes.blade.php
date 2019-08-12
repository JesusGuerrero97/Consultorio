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
                    <div class="row mrg2">
                        <div class="input-field col m9">
                            <i class="material-icons prefix">search</i>
                            <input id="busMedicamento" type="text" class="validate">
                            <label for="busMedicamento">Paciente</label> 
                        </div>
                        <div class="input-field col m3">
                            <a class="waves-effect waves-light btn" href="{{route('agregar')}}">Agregar Paciente</a>
                        </div>
                    </div>
            </div>
        <div class="card">
        <div class="row mrg">
            <table class="striped">
        <thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Fecha Nacimiento</th>
              <th>Sexo</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Editar</th>
              <th>Deshabilitar</th>
          </tr>
        </thead>

        <tbody>
            @foreach($pacientes as $paciente)
	            <tr>
	                <td>{!! $paciente->id !!}</td>
	                <td>{!! $paciente->nombre !!}</td>
                    <td>{!! $paciente->apellido !!}</td>
	                <td>{!! $paciente->fechaNac !!}</td>
	                <td>{!! $paciente->sexo !!}</td>
					<td>{!! $paciente->direccion !!}</td>
                    <td>{!! $paciente->telefono!!}</td>
	                <td>
	                <a class="waves-effect blue accent-3 btn " href="{{route('editPac', $paciente->id)}}" ><i class="material-icons">
								edit
								</i></a>
							</td>
                    <?php if(($paciente->status >0)): ?>
                        <td><div class="switch"><label><input type="checkbox" id="estatus" ng-click="estatus({{$paciente->id}})" checked="checked" ><span class="lever"></span></label></div></td>
					<?php else: ?>
						<td><div class="switch"><label><input type="checkbox" id="estatus" ng-click="estatus({{$paciente->id}})"><span class="lever"></span></label></div></td>
					<?php endif; ?>
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
                    $scope.estatus=function(id){
							$scope.id = id;
							console.log("Entra a la funcion");
							console.log($scope.id);
							$http.post('/cambiarPac',$scope.id).then(
								function(response){
									console.log(response.data);
									window.location = "pacientes";
									
								},
								function(erroResponse){
									
								}
							);
						}
            
                }); 

                $(document).ready(function(){
                $('.modal').modal();
                });
            </script>
        @endsection
    @endsection  
               













