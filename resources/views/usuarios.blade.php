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
                <div class="input-field col m9">
                    <i class="material-icons prefix">search</i>
                    <input id="busMedicamento" type="text" class="validate" ng-pagination-search="usuarios2">
                    <label for="busMedicamento">Usuarios</label> 
                </div>
                <div class="input-field col m3">
                    <button class="waves-effect waves-light btn modal-trigger" data-target="modalAgregar">Agregar Usuarios</button>
                    <!-- Modal Structure -->
                    <form name="usuarios">
                        <div id="modalAgregar" class="modal">
                            <div class="modal-content">
                                <div class="card-header">
                                <h4 class="black-text center">Agregar</h4>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="large material-icons prefix">account_circle</i>
                                        <input id="icon_prefix" type="text" class="validate" ng-model="usuario.name">
                                        <label for="icon_prefix">Nombre</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input id="descMedicamento" type="text" class="validate" ng-model="usuario.email">
                                        <label for="descMedicamento">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="icon_prefix" type="text" class="validate" ng-model="contra.contrasena" >
                                        <label for="icon_prefix">Contraseña</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="icon_prefix" type="text" class="validate" ng-model="usuario.password">
                                        <label for="icon_prefix">Confirmar contraseña</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">adjust</i>
                                        <select ng-model="usuario.tipo"> 
                                          <option value="" disabled selected>Seleccione</option>
                                          <option value="Administrador">Administrador</option>
                                          <option value="Empleado">Empleado</option>
                                        </select>
                                        <label>Tipo de usuario</label>
                                    </div>
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
    		<div class="row mrg">
		        <table>
					<thead>
						<tr>
				      		<th scope="col">Usuario</th>
							<th scope="col">Email</th>
							<th scope="col">Tipo</th>
                            <th scope="col">Editar</th>
							<th scope="col">Desabilitar</th>
				    	</tr>
				  	</thead>
				  	<tbody>
			    	    <tr ng-pagination="usuario in usuarios2 " ng-pagination-size="5" ng-click="cargarDatos([[usuario.id]])">
				    	   <td scope="col">[[usuario.name]]</td>
                            <td scope="col">[[usuario.email]]</td>
                            <td scope="col">[[usuario.tipo]]</td>
							<td><li class="waves-effect"><a href="#idModalModificar" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
							<td><div class="switch">    <label>            <input type="checkbox">      <span class="lever"></span>          </label>  </div></td>
			      		</tr>
				     </tbody>
				</table>
			</div>
		</div>
        <ng-pagination-control pagination-id="usuarios2" ></ng-pagination-control>
        
		<div id="idModalModificar" class="modal">
			<div class="modal-content">
				<div class="row">
				    <form class="col s12">
				      <div class="row">
				        <div class="input-field col s6">
				          <input placeholder="Email" id="first_name" type="text" class="validate" ng-model="usuariomodificar.email">
				          <label for="first_name">Email</label>
				        </div>
				        <div class="input-field col s6">
				          <input placeholder="Tipo" id="first_name" type="text" class="validate" ng-model="usuariomodificar.tipo">
				          <label for="first_name">Tipo</label>
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
                    $scope.usuario={};
                    $scope.contra={};
                    $scope.usuariomodificar={};

                    $scope.usuarios2= (<?php echo $usuarios;?>);

                    console.log($scope.usuarios2);

                    $scope.guardar=function()
                    {
                        if($scope.usuario.name!=null | $scope.usuario.email!=null | $scope.usuario.password!=null | $scope.contra.contrasena!=null)
                        {
                            console.log("contraseña: ", $scope.contra.contrasena);
                            console.log("Confirmar contraseña: " , $scope.usuario.password);
                            if ($scope.contra.contraseña=$scope.usuario.password) 
                            {
                                console.log("tipo: " , $scope.usuario.tipo);
                                $scope.usuario.status=1;
                                $http.post('/guardar', $scope.usuario).then
                                (
                                    function(response)
                                    {
                                        console.log($scope.usuario);
                                        $scope.usuario={};
                                        swal({
                                          title: "Guardado Exitosamente",
                                          text: "Click boton Ok para continuar.",
                                          icon: "success",                                    
                                        }).then((value) =>{
                                        });
                                    },
                                    function(errorResponse)
                                    {
                                        swal("Error", "", "error");
                                    }
                                );
                            }
                            else
                            {
                                swal({
                                  title: "La contraseña no es la misma",
                                  text: "Click boton Ok para continuar.",
                                  icon: "error",                                    
                                }).then((value) =>{
                                });
                            }
                        }
                        else
                        {
                            console.log("nombre: " , $scope.usuario.name);
                            console.log("email: " , $scope.usuario.email);
                            console.log("password: " , $scope.usuario.password);
                            console.log("contraseña: " , $scope.contra.contrasena);
                            swal({
                              title: "Todos los campos deben rellenarse",
                              text: "Click boton Ok para continuar.",
                              icon: "error",                                    
                            }).then((value) =>{
                            });
                        }
                    }
                                console.log("modificar: " , $scope.usuariomodificar);

                    $scope.cargarDatos=function(id)
                    {
                        console.log("holis: " + id);

                        $scope.usuarioscargar= (<?php echo $usuarios;?>);

                        $scope.i=0;
                        // Recorrer el arreglo para saber cual id de la tabla se selecciono
                        for ($scope.i ; $scope.i < $scope.usuarioscargar.length; $scope.i ++) 
                        {
                            if($scope.usuarioscargar[$scope.i].id==id)
                            {
                                console.log("lo encontro");
                                //Pasar los datos a los inputs
                                console.log("cargar: " , $scope.usuarioscargar);
                                $scope.usuariomodificar.email=$scope.usuarioscargar[$scope.i].email;
                                $scope.usuariomodificar.tipo=$scope.usuarioscargar[$scope.i].tipo;
                                ;
                                $scope.id=id;
                                console.log("id: " + id);
                                console.log("modificar: " , $scope.usuariomodificar);

                            }
                        }
                    }
                });
            	document.addEventListener('DOMContentLoaded', function() 
            	{
			    	var elems = document.querySelectorAll('.modal');
			    	var instances = M.Modal.init(elems);
			  	});
                $(document).ready(function(){
                $('select').formSelect();
              });
            </script>
        @endsection
    @endsection   