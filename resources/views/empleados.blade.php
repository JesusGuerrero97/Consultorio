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
            .nav-wrapper2
            {
            	background-color: white !important;
            	width: 15%;
            }
            .tabs .tab a
            {
              color:#00ACC1;
          	}
          	.tabs .tab a:hover,.tabs .tab a.active 
          	{
              background-color:transparent !important;
              color:#008B9B;
          	}
          	.tabs .tab.disabled a,.tabs .tab.disabled a:hover 
          	{
              color:rgba(102,147,153,0.7);	
          	}
          	.tabs .indicator 
          	{
              background-color:#009BAD;
          	}
        </style>
		<div class="">
		<div ng-controller="crtl">
			<div class="card">
            <div class="row mrg2">
            	<!-- Buscar empleados -->
                <div class="input-field col m9" ng-show="habilitar">
                    <i class="material-icons prefix">search</i>
                    <input name="buscarEmpleado" type="text" ng-pagination-search="empleadoson" >
                    <label for="busMedicamento">Empleado</label> 
                </div>
                <div class="input-field col m9" ng-show="deshabilitar">
                    <i class="material-icons prefix">search</i>
                    <input name="buscarEmpleado" type="text" ng-pagination-search="empleadosoff" >
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
                                <button class="btn modal-close red" data-tarjet="#idModal">Cancelar</button>
								<button type="submit" class="btn modal-close" ng-click="guardar()">Guardar</button>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
            </div>
	        <div class="card">
		     	<ul class="tabs">
		        	<li class="tab col s3"><a href="#test1" class="active" ng-click="habilitados()">Habilitados</a></li>
		        	<li class="tab col s3"><a href="#test2" ng-click="deshabilitados()">Inhabilitados</a></li>
		      	</ul>
        			<div class="row mrg" ng-show="habilitar">
				        <div class="col m12">
					        <table class="table table-striped table-hover">
								<thead>
									<tr>
							      		<th scope="col">Nombreee</th>
										<th scope="col">Apellidos</th>
										<th scope="col">Domicilio</th>
										<th scope="col">Telefono</th>
										<th scope="col">Número seguro social</th>
										<th scope="col">Editar</th>
										<th scope="col">Desabilitar</th>
							    	</tr>
							  	</thead>
							  	<tbody>
						    	    <tr ng-pagination="empleado in empleadoson" ng-pagination-size="5" ng-click="cargarDatos([[empleado.id]])">
							    	    <td scope="col">[[empleado.nombre]]</td>
							    	    <td scope="col">[[empleado.apellido]]</td>
										<td scope="col">[[empleado.direccion]]</td>
										<td scope="col">[[empleado.telefono]]</td>
										<td scope="col">[[empleado.numero_seguro_social]]</td>
										<td><li class="waves-effect"><a href="#idModalModificar" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
										<td><div class="switch"><label><input type="checkbox" ng-click="desactivar()"><span class="lever"></span></label> </div></td>
						      		</tr>
							     </tbody>  
							</table>
						</div>
					</div>
					<div class="row mrg" ng-show="deshabilitar">
				        <div class="col m12">
					        <table class="table table-striped table-hover">
								<thead>
									<tr>
							      		<th scope="col">Nombre</th>
										<th scope="col">Apellidos</th>
										<th scope="col">Domicilio</th>
										<th scope="col">Telefono</th>
										<th scope="col">Número seguro social</th>
										<th scope="col">Habilitar</th>
							    	</tr>
							  	</thead>
							  	<tbody>
						    	    <tr ng-pagination="empleado in empleadosoff" ng-pagination-size="5" ng-click="cargarDatos([[empleado.id]])">
							    	    <td scope="col">[[empleado.nombre]]</td>
							    	    <td scope="col">[[empleado.apellido]]</td>
										<td scope="col">[[empleado.direccion]]</td>
										<td scope="col">[[empleado.telefono]]</td>
										<td scope="col">[[empleado.numero_seguro_social]]</td>
										
										<td><div class="switch"><label><input type="checkbox" ng-click="activar()"><span class="lever"></span></label> </div></td>
						      		</tr>
						      		
							     </tbody>  
							</table>
						</div>
					</div>
			</div>
			<div ng-if="habilitar">
				<ng-pagination-control pagination-id="empleadoson" ></ng-pagination-control>
			</div>
			<div ng-if="deshabilitar">
				<ng-pagination-control pagination-id="empleadosoff" ></ng-pagination-control>
			</div>
			<div id="idModalModificar" class="modal" tabindex="-1" role="content">
				<div class="modal-content modal-sm center-align" role="document">
					<h3 class="">Modificar</h3>
			<div id="idModalModificar" class="modal">
				<div class="modal-content">
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
					$scope.empleadosInhabilitados={};
					$scope.empleadosoff=[];
					$scope.empleadoson=[];
					$scope.empleados={};

					//Mostrar las tablas por habilitados e inhabilitados
					$scope.habilitar=true;
					$scope.deshabilitar=false;

					$scope.habilitados=function()
					{
						$scope.habilitar=true;
						$scope.deshabilitar=false;
					}

					$scope.deshabilitados=function()
					{
						$scope.deshabilitar=true;
						$scope.habilitar=false;
					}

				
					// // Empleados habilitados
					// $scope.j=0;
					// $scope.estatus2=1;
					// $http.get('/traer').then
					// (
					// 	function(response)
					// 		{	
					// 			$scope.empleados=response.data;
					// 			console.log("empleados: " , $scope.empleados);
					// 			for ($scope.j ; $scope.j < $scope.empleados.length; $scope.j ++) 
					// 			{
					// 				if($scope.empleados[$scope.j].status==$scope.estatus2)
					// 				{
					// 					//Pasar los datos a los inputs
					// 					console.log("imprimir: ", $scope.empleados[$scope.j]);
					// 					$scope.empleadoson[$scope.j]==$scope.empleados[$scope.j];
					// 				}
					// 			}
					// 			console.log("On: " , $scope.empleadoson);
					// 		},
					// 		function(errorResponse)
					// 		{
					// 			swal ( "Ocurrio un error" ,  "Faltan algunos datos" ,  "error" );
					// 		}
					// );

					// Empleados habilitados
					$scope.i=0;
					$scope.estatus2=1;
					$scope.empleados= (<?php echo $empleados;?>);
					for ($scope.i ; $scope.i < $scope.empleados.length; $scope.i ++) 
					{
						if($scope.empleados[$scope.i].status==$scope.estatus2)
						{
							//Pasar los datos a los inputs
							$scope.empleadoson.push($scope.empleados[$scope.i]);
						}
					}
					console.log("On: " , $scope.empleadoson);

					// Empleados inhabilitados
					$scope.i=0;
					$scope.estatus=0;
					$scope.empleados= (<?php echo $empleados;?>);
					for ($scope.i ; $scope.i < $scope.empleados.length; $scope.i ++) 
					{
						if($scope.empleados[$scope.i].status==$scope.estatus)
						{
							//Pasar los datos a los inputs
							$scope.empleadosoff.push($scope.empleados[$scope.i]);
						}
					}
					console.log("Off: " , $scope.empleadosoff);

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
									swal({
									  title: "Agregado Exitosamente",
									  text: "Click boton Ok para continuar.",
									  icon: "success",									  
									}).then((value) =>{
										window.location.reload();
									});
								},
								function(errorResponse)
								{
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
									swal({
									  title: "Modificado Exitosamente",
									  text: "Click boton Ok para continuar.",
									  icon: "success",									  
									}).then((value) =>{
										window.location.reload();
									});
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
								swal({
									  title: "Desactivado Exitosamente",
									  text: "Click boton Ok para continuar.",
									  icon: "success",									  
									}).then((value) =>{
										window.location.reload();
									});
							},
							function(errorResponse)
							{
								swal("Ocurrio un error", "error");
							}
						);
					}

					$scope.activar=function()
					{
						$scope.empleado.estatus=1;
						$http.post('/activar/'+$scope.id, $scope.empleado).then
						(
							function(response)
							{
								console.log("Se activo");
								swal({
									  title: "Activado Exitosamente",
									  text: "Click boton Ok para continuar.",
									  icon: "success",									  
									}).then((value) =>{
										window.location.reload();
									});
							},
							function(errorResponse)
							{
								swal("Ocurrio un error", "error");
							}
						);
					}
				});
				// Iniciar el modal
        	 	$(document).ready(function(){
			    $('.modal').modal({
			    	dismissible: false
			    });
			  });
			  	$(document).ready(function(){
			    $('.tabs').tabs();
			  });
            </script>
        @endsection
    @endsection   