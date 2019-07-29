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
		<div class="">
		<div ng-controller="crtl">
			<div class="card">
            <div class="row mrg2">
            	<!-- Buscar empleados -->
                <div class="input-field col m9">
                    <i class="material-icons prefix">search</i>
                    <input name="buscarEmpleado" type="text" ng-pagination-search="empleados">
                    <label for="busMedicamento">Empleado</label> 
                </div>
                <div class="input-field col m3">
                    <button class="waves-effect waves-light btn modal-trigger" data-target="idModal">Agregar empleados</button>
                    <!-- Modal para agregar empleados -->
                    <form name="frmUsuario" id="frmUsuario">
                        <div id="idModal" class="modal">
                            <div class="modal-content">
			                    <div class="row">
								    <form class="col s12">
								      <div class="row">
								        <div class="input-field col s6">
								          <input placeholder="nombre" name="nombre" type="text" ng-model="empleado.nombre" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
								          <label for="Nombre">Nombre</label>
								          <span ng-show="frmUsuario.nombre.$error.pattern && frmUsuario.nombre.$dirty">*Solo letras*</span>
								        </div>
								        <div class="input-field col s6">
								          <input placeholder="Apellidos" name="apellido" type="text" ng-model="empleado.apellido" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
								          <label for="Nombre">Apellidos</label>
								          <span ng-show="frmUsuario.apellido.$error.pattern && frmUsuario.apellido.$dirty">*Solo letras*</span>
								        </div>
								      </div>
								      <div class="row">
								        <div class="input-field col s6">
								          <input placeholder="Direccion" name="direccion" type="text" ng-model="empleado.direccion" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
								          <label for="first_name">Direccion</label>
								          <span ng-show="frmUsuario.direccion.$error.pattern && frmUsuario.direccion.$dirty">*Solo letras*</span>
								        </div>
								        <div class="input-field col s6">
								          <input placeholder="Telefono" name="telefono" type="number" ng-model="empleado.telefono">
								          <label for="Nombre">Telefono</label>
								        </div>
								      </div>
								      <div class="row">
								        <div class="input-field col s6">
								          <input placeholder="Numero de seguro social" id="first_name" type="text" ng-model="empleado.numero_seguro_social">
								          <label for="first_name">Numero de seguro social</label>
								        </div>
								      </div>
								    </form>
							  	</div>
                            </div>
                            <div class="modal-footer">
                                <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agregar</a> -->
                                <button class="btn modal-close red" data-tarjet="#idModal">Cancelar</button>
								<button type="submit" class="btn modal-close" ng-click="guardar()">Guardar</button>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
            </div>
	        <div class="card">
	        	<div class="row mrg">
			        <div class="col m12">
				        <table class="table table-striped table-hover">
							<thead>
								<tr>
						      		<th scope="col">Nombre</th>
									<th scope="col">Apellidos</th>
									<th scope="col">Domicilio</th>
									<th scope="col">Telefono</th>
									<th scope="col">Número seguro social</th>
									<th scope="col">Editar</th>
									<th scope="col">Desabilitar</th>
						    	</tr>
						  	</thead>
						  	<tbody>
					    	    <tr ng-pagination="empleado in empleados" ng-pagination-size="5" ng-click="cargarDatos([[empleado.id]])">
						    	    <td scope="col">[[empleado.nombre]]</td>
						    	    <td scope="col">[[empleado.apellido]]</td>
									<td scope="col">[[empleado.direccion]]</td>
									<td scope="col">[[empleado.telefono]]</td>
									<td scope="col">[[empleado.numero_seguro_social]]</td>
									<td value="[[empleado.id]]" ng-model="id.id"><li class="waves-effect"><a href="#idModalModificar" ng-click="editar(id.id)" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
									<td><div class="switch"><label><input type="checkbox" ng-click="desactivar()"><span class="lever"></span></label> </div></td>
					      		</tr>
					      		
						     </tbody>  
						</table>
					</div>
				</div>
			</div>
			<ng-pagination-control pagination-id="empleados"></ng-pagination-control>
			<div id="idModalModificar" class="modal" tabindex="-1" role="content">
				<div class="modal-content modal-sm" role="document">
					<div class="row">
					    <form class="col s12">
					      <div class="row">
					        <div class="input-field col s6">
					        	<i class="material-icons prefix">account_circle</i>
						        <input id="icon_prefix" placeholder="Nombre" type="text" ng-model="empleadomodificar.nombre">
						        <label for="icon_prefix">Nombre</label>
					        </div>
					        <div class="input-field col s6">
					          <i class="material-icons prefix">assignment_ind</i>
					          <input id="icon_prefix" placeholder="Apellidos" type="text" ng-model="empleadomodificar.apellido">
					          <label for="icon_prefix">Apellidos</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s6">
					        	<i class="material-icons prefix">home</i>
					          <input id="icon_prefix" placeholder="Direccion" type="text" ng-model="empleadomodificar.direccion">
					          <label for="icon_prefix">Direccion</label>
					        </div>
					        <div class="input-field col s6">
					        	<i class="material-icons prefix">phone</i>
					          <input id="icon_prefix" placeholder="Telefono" type="text" ng-model="empleadomodificar.telefono">
					          <label for="icon_prefix">Telefono</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s6">
					        	<i class="material-icons prefix">enhanced_encryption</i>
					          <input id="icon_prefix" placeholder="Numero de seguro social" type="text" ng-model="empleadomodificar.numero_seguro_social">
					          <label for="icon_prefix">Numero de seguro social</label>
					        </div>
					      </div>
					    </form>
				  	</div>
				</div>
				<div class="modal-footer">
					<button class="btn modal-close red" data-tarjet="#idModal">Cancelar</button>
					<button type="submit" ng-click="modificar()" class="btn modal-close blue" data-tarjet="#idModal">Guardar</button>
				</div>
			</div>
	</div>
	</div>
        @section('footer')
            @parent
            <script type="text/javascript">
            	var app=angular.module('app',['ngPagination']).config(function ($interpolateProvider) {
		        $interpolateProvider.startSymbol('[[');
		        $interpolateProvider.endSymbol(']]');
		        });
				app.controller('crtl',function($scope, $http, $filter)
				{
					$scope.empleado={};
					$scope.empleadomodificar={};

					// Exrayendo la consulta a un arreglo
					$scope.empleados= (<?php echo $empleados;?>);
					console.log("Empleados: " , $scope.empleados);

					$scope.probar=function()
					{
						
					}

					// Funcion para cargar los datos a los inputs de modificar
					$scope.cargarDatos=function(id)
					{
						console.log("holis: " + id);

						$scope.empleados2= (<?php echo $empleados;?>);

						$scope.i=0;
						// Recorrer el arreglo para saber cual id de la tabla se selecciono
						for ($scope.i ; $scope.i < $scope.empleados2.length; $scope.i ++) 
						{
							if($scope.empleados2[$scope.i].id==id)
							{
								console.log("lo encontro");
								//Pasar los datos a los inputs
								$scope.empleadomodificar.nombre=$scope.empleados2[$scope.i].nombre;
								$scope.empleadomodificar.apellido=$scope.empleados2[$scope.i].apellido;
								$scope.empleadomodificar.direccion=$scope.empleados2[$scope.i].direccion;
								$scope.empleadomodificar.telefono=$scope.empleados2[$scope.i].telefono;
								$scope.empleadomodificar.numero_seguro_social=$scope.empleados2[$scope.i].numero_seguro_social;
								$scope.id=id;
								console.log("id: " + id);
							}
						}
					}
					// Funcion para guardar empleados
					$scope.guardar=function()
					{
						$scope.empleado.estatus=1;

						//Que ningun input esté vacio 
						if($scope.empleado.nombre==null || $scope.empleado.apellido==null || $scope.empleado.direccion==null || $scope.empleado.telefono==null || $scope.empleado.numero_seguro_social==null)
						{
							swal ( "Ocurrio un error" ,  "Faltan algunos datos" ,  "error" );
						}
						else
						{
							$http.post('/save', $scope.empleado).then
							(
								function(response)
								{	
									console.log($scope.empleado);
									$scope.empleado={};
									swal("Guardado Existosamente", "", "success");
									// location.reload(100000);
								},
								function(errorResponse)
								{
									swal ( "Ocurrio un error" ,  "Faltan algunos datos" ,  "error" );
								}
							);
						}
					}
					$scope.modificar=function()
					{
						$scope.empleadomodificar.estatus=1;
						// Validar que ningun input esté vacio
						if($scope.empleadomodificar.nombre==null || $scope.empleadomodificar.apellido==null || $scope.empleadomodificar.direccion==null || $scope.empleadomodificar.telefono==null || $scope.empleadomodificar.numero_seguro_social==null)
						{
							swal ( "Ocurrio un error" ,  "Faltan algunos datos" ,  "error" );
						}
						else
						{
							$http.post('/modificar/'+$scope.id, $scope.empleadomodificar).then
							(
								function(response)
								{
									console.log($scope.empleadomodificar);
									$scope.empleadomodificar={};
									swal("Modificado Existosamente", "", "success");
								},
								function(errorResponse)
								{
									swal ( "Ocurrio un error" ,  "Faltan algunos datos" ,  "error" );
								}
							);
						}
					}
					$scope.desactivar=function()
					{
						$scope.empleado.estatus=0;
						$http.post('/desactivar/'+$scope.id, $scope.empleado).then
						(
							function(response)
							{
								console.log("Se desactivo");
							},
							function(errorResponse)
							{
								swal("Ocurrio un error", "error");
							}
						);
					}
				});
				// Iniciar el modal
            	document.addEventListener('DOMContentLoaded', function() 
            	{
			    	var elems = document.querySelectorAll('.modal');
			    	var instances = M.Modal.init(elems);
			  	});
            </script>
        @endsection
    @endsection   