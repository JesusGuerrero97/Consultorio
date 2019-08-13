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
              <th>Tratamiento</th>
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
                    <td><a class="waves-effect waves-light btn modal-trigger" data-target="modal1" ng-click="comprobar({{$paciente->id}})">Tratamiento</a></td>
	                <td><li class="waves-effect"><a href="{{route('editPac', $paciente->id)}}"><i class="small material-icons">edit</i></a></li></td>
	                
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
        <!-- Empieza el modal -->
        <div id="modal1" class="modal">
            <div class="modal-content">
            <h4 class="brand-logo teal-text">Tratamiento</h4>
            <div class="row">
                <form class="col s12">
                <div class="input-field col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <select id="tipo">
                            <option value="0" disabled selected>Tipo de tratamiento</option>
                            <option value="Ortodoncia">Ortodoncia</option>
                            <option value="Endodoncia">Endodoncia</option>
                            <option value="Selladores">Selladores</option>
                            </select>
                            <label>Tipo</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="$" id="Pago" type="text" class="validate" ng-model="tratamiento.pagoini">
                        <label for="Pago">Pago Inicial</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="$" id="presupuesto" type="text" class="validate"  ng-model="tratamiento.presu">
                        <label for="presu">Presupuesto Total</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="$" id="citas" type="text" class="validate"  ng-model="tratamiento.citas">
                        <label for="citas">Citas Subsecuentes</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="#" id="meses" type="text" class="validate"  ng-model="tratamiento.total">
                        <label for="meses">Total de meses</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <td><a class="waves-effect waves-light btn" ng-click="historial(tratamiento.id)">Historial Medico</a></td>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat" ng-click="guardar()" ng-if="tratamiento.id==null">Guardar</a>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
            </div>
        </div>
    </div>
         
        @section('footer')
            @parent
            <script>
                var app=angular.module('app',[]);
            	app.controller('ctrl',function($scope,$http){
                    $scope.tratamiento = {};
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
                        $scope.historial=function(id){
							$scope.id = id;
							console.log("Entra a la funcion");
							console.log($scope.id);
							$http.post('/historial',$scope.id).then(
								function(response){
									console.log(response.data);
									//window.location.href = 'http://127.0.0.1:8000/historial1';
									
								},
								function(erroResponse){
									
								}
							);
						}
                        $scope.guardar=function(){
                            //$scope.tratamiento.id_paciente = id;
                            console.log($scope.tratamiento.id_paciente);
							console.log($scope.tratamiento);
							$scope.tratamiento.tipo= $("#tipo").val();
							$http.post('/guardarTrata',$scope.tratamiento).then(
							function(response){
								console.log(response);
								if(response.data == 0){
											alert("hubo un error");
								}
								if(response.data == 1){
										alert("agregado con exito");
										//window.location = "pacientes";
									}
								},
								function(erroResponse){
								}	
							);
						}
                        $scope.comprobar=function(id){
							$scope.id = id;
							console.log($scope.id);
							$http.post('/solicitarTrata',$scope.id).then(
								function(response){
									console.log(response.data);
                                    if(response.data == 0){
                                        $scope.tratamiento = {};
                                        $scope.tratamiento.id_paciente = $scope.id;
                                        console.log($scope.tratamiento.id_paciente);
                                        console.log("entra a funcion");
                                    }
                                    else{
                                        $scope.tratamiento = response.data;
                                        $("#tipo").val($scope.tratamiento.tipo);
                                        console.log($("#tipo").val());
                                    }
									
								},
								function(erroResponse){
									
								}
							);
						}
            
                }); 
                $(document).ready(function(){
                $('.modal').modal();
                });
                $(document).ready(function(){
                $('select').formSelect();
                });
            </script>
        @endsection
    @endsection  
               













