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
            .tabs .tab a{
                color:#00ACC1;
            }
            .tabs .tab a:hover,.tabs .tab a.active {
                background-color:transparent !important;
                color:#008B9B;
            }
            .tabs .tab.disabled a,.tabs .tab.disabled a:hover {
                color:rgba(102,147,153,0.7);    
            }
            .tabs .indicator {
                background-color:#009BAD;
            }
            /*Estilos tabs de las tablas*/
            .tabs2 .tab2 a{
                color:#78909c;
            }
            .tabs2 .tab2 a:hover,.tabs2 .tab2 a.active {
                background-color:#cfd8dc !important;
                color:#546e7a;
            }
            .tabs2 .tab2.disabled a,.tabs2 .tab2.disabled a:hover {
                color:#78909c;  
            }
            .tabs2 .indicator {
                background-color:#546e7a ;
            }

            .swal-button--cancel {
                background-color: #efefef !important;
            }

        </style>
<div class="">
    <div ng-controller="crtl">
        <div class="card">
            <div class="row mrg2">
                <div class="input-field col m9" ng-show="habilitados">
                    <i class="material-icons prefix">search</i>
                    <input id="busMedicamento" type="text" class="validate" ng-pagination-search="usuarioson">
                    <label for="busMedicamento">Usuarios</label> 
                </div>
                <div class="input-field col m9" ng-show="deshabilitados">
                    <i class="material-icons prefix">search</i>
                    <input id="busMedicamento" type="text" class="validate" ng-pagination-search="usuariosoff">
                    <label for="busMedicamento">Usuarios</label> 
                </div>
                <div class="input-field col m3">
                    <button class="waves-effect waves-light btn modal-trigger" data-target="modalAgregar">Agregar Usuarios</button>
                    <!-- Modal Structure -->
                    <form name="usuarios">
                        <div id="modalAgregar" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <div class="card-header">
                                <h4 class="black-text center">Agregar</h4>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="large material-icons prefix">accessibility</i>
                                        <select ng-model="usuario.idEmpleado">
                                            <option value="" disabled selected>Seleccione al empleado</option>
                                            <option value="[[empleados.id]]" ng-repeat="empleados in empleados2">[[empleados.nombre]]</option>
                                        </select>
                                        <label>Empleado</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="icon_prefix" placeholder="Nombre" type="text" class="validate" ng-model="usuario.name">
                                        <label for="icon_prefix">Nombre</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input id="icon_prefix" placeholder="Email" type="email" class="validate" ng-model="usuario.email">
                                        <label for="icon_prefix">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="icon_prefix" placeholder="Contraseña" type="password" class="validate" ng-model="contra.contrasena" >
                                        <label for="icon_prefix">Contraseña</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="icon_prefix" placeholder="Confirmar contraseña" type="password" class="validate" ng-model="usuario.password">
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
            <ul class="tabs">
                    <li class="tab tab2 col m6"><a href="#test1" class="active" ng-click="habilitar()">Habilitados</a></li>
                    <li class="tab tab2 col m6"><a href="#test2" ng-click="desabilitar()">Inhabilitados</a></li>
                </ul>
    		<div class="row mrg" ng-show="habilitados">
		        <table>
					<thead>
						<tr>
				      		<th scope="col">Usuario</th>
							<th scope="col">Email</th>
							<th scope="col">Tipo</th>
                            <th scope="col">Editar</th>
							<th scope="col">Deshabilitar</th>
				    	</tr>
				  	</thead>
				  	<tbody>
			    	    <tr ng-pagination="usuario in usuarioson " ng-pagination-size="4" ng-click="cargarDatos([[usuario.id]])">
				    	   <td scope="col">[[usuario.name]]</td>
                            <td scope="col">[[usuario.email]]</td>
                            <td scope="col">[[usuario.tipo]]</td>
							<td><li class="waves-effect"><a href="#idModalModificar" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
							<td><div class="switch"><label><input type="checkbox" ng-click="desactivar()"><span class="lever"></span></label> </div></td>
			      		</tr>
				     </tbody>
				</table>
			</div>
            <div class="row mrg" ng-show="deshabilitados">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Habilitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-pagination="usuario in usuariosoff " ng-pagination-size="4" ng-click="cargarDatos([[usuario.id]])">
                           <td scope="col">[[usuario.name]]</td>
                            <td scope="col">[[usuario.email]]</td>
                            <td scope="col">[[usuario.tipo]]</td>
                            
                           <td><div class="switch"><label><input type="checkbox" ng-click="activar()"><span class="lever"></span></label> </div></td>
                        </tr>
                     </tbody>
                </table>
            </div>
		</div>
        <div ng-show="habilitados">
            <ng-pagination-control pagination-id="usuarioson" ></ng-pagination-control>
        </div>
        <div ng-show="deshabilitados">
            <ng-pagination-control pagination-id="usuariosoff" ></ng-pagination-control>
        </div>        
		<div id="idModalModificar" class="modal">
			<div class="modal-content">
                <div class="card-header">
                <h4 class="black-text center">Modificar</h4>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" placeholder="Nombre" type="text" class="validate" ng-model="usuariomodificar.name">
                        <label for="icon_prefix">Nombre</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input id="icon_prefix" placeholder="Email" type="email" class="validate" ng-model="usuariomodificar.email">
                        <label for="icon_prefix">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">adjust</i>
                        <select ng-model="usuariomodificar.tipo"> 
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
                <button type="submit" class="btn modal-close" ng-click="modificar()">Guardar</button>
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
                    $scope.usuarioson=[];
                    $scope.usuariosoff=[];

                    $scope.usuarios2= (<?php echo $usuarios;?>);
                    $scope.empleados2= (<?php echo $empleados;?>);

                    console.log($scope.usuarios2);
                    console.log($scope.empleados2);
                    console.log($scope.usuariosActivos2);
                    console.log($scope.usuariosDesactivos2);


                    $scope.habilitados=true;
                    $scope.deshabilitados=false;

                    $scope.habilitar=function()
                    {
                        $scope.habilitados=true;
                        $scope.deshabilitados=false;
                    }

                    $scope.desabilitar=function()
                    {
                        $scope.habilitados=false;
                        $scope.deshabilitados=true;
                    }

                    // Usuarios habilitados
                    $scope.i=0;
                    $scope.estatus=1;
                    for ($scope.i ; $scope.i < $scope.usuarios2.length; $scope.i ++) 
                    {
                        if($scope.usuarios2[$scope.i].status==$scope.estatus)
                        {
                            //Pasar los datos a los inputs
                            $scope.usuarioson.push($scope.usuarios2[$scope.i]);
                        }
                    }
                    console.log("On: " , $scope.usuarioson);

                    // Usuarios inhabilitados
                    $scope.i=0;
                    $scope.estatus2=0;
                    for ($scope.i ; $scope.i < $scope.usuarios2.length; $scope.i ++) 
                    {
                        if($scope.usuarios2[$scope.i].status==$scope.estatus2)
                        {
                            //Pasar los datos a los inputs
                            $scope.usuariosoff.push($scope.usuarios2[$scope.i]);
                        }
                    }
                    console.log("Off: " , $scope.usuariosoff);

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
                                $scope.usuariomodificar.name=$scope.usuarioscargar[$scope.i].name;
                                $scope.usuariomodificar.email=$scope.usuarioscargar[$scope.i].email;
                                $scope.usuariomodificar.tipo=$scope.usuarioscargar[$scope.i].tipo;
                                ;
                                $scope.id=id;
                                console.log("id: " + id);
                                console.log("modificar: " , $scope.usuariomodificar);

                            }
                        }
                    }

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
                                            window.location.reload();
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

                    $scope.modificar=function()
                    {
                        if($scope.usuariomodificar.name!=null || $scope.usuariomodificar.email!=null || $scope.usuariomodificar.tipo!=null)
                        {
                                $scope.usuario.status=1;
                                $http.post('/modificarUsuarios/'+$scope.id, $scope.usuariomodificar).then
                                (
                                    function(response)
                                    {
                                        console.log($scope.usuariomodificar);
                                        $scope.usuariomodificar={};
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
                                        swal("Error", "", "error");
                                    }
                                );
                        }
                        else
                        {
                            swal({
                              title: "Todos los campos deben rellenarse",
                              text: "Click boton Ok para continuar.",
                              icon: "error",                                    
                            }).then((value) =>{
                            });
                        }
                    }

                    $scope.desactivar=function()
                    {
                        console.log("desactivar");
                        $scope.usuario.status=0;
                        $http.post('/desactivar2/'+$scope.id, $scope.usuario).then
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
                        $scope.usuario.status=1;
                        $http.post('/activar2/'+$scope.id, $scope.usuario).then
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
            	document.addEventListener('DOMContentLoaded', function() 
            	{
			    	var elems = document.querySelectorAll('.modal');
			    	var instances = M.Modal.init(elems);
			  	});
                $(document).ready(function(){
                $('select').formSelect();
              });
                $(document).ready(function(){
                $('.tabs').tabs();
              });
            </script>
        @endsection
    @endsection   