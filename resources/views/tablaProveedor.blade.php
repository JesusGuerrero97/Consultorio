@extends('header')
@extends('footer')

@section('header')
	@parent
	<div ng-controller="ctrl">
		<div class="card">
		<div class="row mrg2">
			<div class="input-field col m9">
	            <i class="material-icons prefix">search</i>
	            <input id="busMEmpresa" type="text" class="validate">
	            <label for="busEmpresa">Empresa</label>
            </div>
            <div class="input-field col m3">
            <button class="waves-effect waves-light btn modal-trigger" data-target="agProveedor">Agregar proveedor</button>
            <!-- Modal Structure -->
            <form name="FrmProveedores">
                <div id="agProveedor" class="modal">
                    <div class="modal-content">
                        <h4 class="black-text center">PROVEEDOR</h4>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nomEmpresa" type="text" class="validate" ng-model="proveedores.empresa">
                                <label for="nomEmpresa">Nombre de la empresa</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="dirEmpresa" type="text" class="validate" ng-model="proveedores.direccion">
                                <label for="dirEmpresa">Dirección de la empresa</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="telefono" type="number" class="validate" ng-model="proveedores.telefono">
                                <label for="telefono">Teléfono</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" name="btnGuardar" class="modal-close waves-effect waves-green btn-flat" ng-click="GuardarPro()">Agregar</a>
                    </div>
                </div>
            </form>
    	</div>
		</div>
	</div>

	<div class="card">
		<table>
		<tr>
			<th>Empresa</th>
			<th>Dirección</th>
			<th>Telefono</th>
			<th>Editar</th>
			<th>Deshabilitar</th>
		</tr>
		@foreach ($proveedores as $proveedor)
           <tr ng-click="seleccionar($index)">
                <td><?= $proveedor->empresa ?></td>
                <td><?= $proveedor->direccion ?></td>
                <td><?= $proveedor->telefono ?></td>
                <td><button class="waves-effect amber accent-3 btn modal-trigger"  href="#modalEditarMaterial"><i class="material-icons">edit</i></button></td>
            	<td><div class="switch">    <label>            <input type="checkbox">      <span class="lever"></span>          </label>  </div></td>
           </tr>
        @endforeach()
		</table>
	</div>

	<div class="card">
		<div class="row mrg2">
			<div class="input-field col m9">
	            <i class="material-icons prefix">search</i>
	            <input id="busMContacto" type="text" class="validate">
	            <label for="busContacto">Contactos</label>
            </div>
            <div class="input-field col m3">
            <button class="waves-effect waves-light btn modal-trigger" data-target="agContacto">Agregar Contacto</button>
            <!-- Modal Structure -->
            <form name="FrmContactos">
                <div id="agContacto" class="modal">
                    <div class="modal-content">
                        <h4 class="black-text center">CONTACTO CON PROVEEDORES</h4>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nomEmpresa" type="text" class="validate" ng-model="contactos.nombre">
                                <label for="nomEmpresa">Nombre deL contacto</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="dirEmpresa" type="text" class="validate" ng-model="contactos.telefono">
                                <label for="dirEmpresa">Teléfono del contacto</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="telefono" type="number" class="validate" ng-model="contactos.correo">
                                <label for="telefono">Correo del contacto</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" name="btnGuardar" class="modal-close waves-effect waves-green btn-flat" ng-click="GuardarCon()">Agregar</a>
                    </div>
                </div>
            </form>
    	</div>
		</div>
	</div>

	<div class="card">
		<table>
		<tr>
			<th>Nombre</th>
			<th>Telefono</th>
			<th>Correo</th>
			<th>Editar</th>
			<th>Deshabilitar</th>
		</tr>
		@foreach ($proveedores as $proveedor)
           <tr ng-click="seleccionar($index)">
                <td><?= $proveedor->empresa ?></td>
                <td><?= $proveedor->direccion ?></td>
                <td><?= $proveedor->telefono ?></td>
                <td><button class="waves-effect amber accent-3 btn modal-trigger"  href="#modalEditarMaterial"><i class="material-icons">edit</i></button></td>
            	<td><div class="switch">    <label>            <input type="checkbox">      <span class="lever"></span>          </label>  </div></td>
           </tr>
        @endforeach()
		</table>
	</div>
	</div>
	

    @section('footer')
	@parent
	<script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>

    <script>
    	
    	var app = angular.module('app',[]);
    	app.controller('ctrl', function($scope, $http){
            $scope.proveedores = {};

            $scope.contactos = {};

                $scope.GuardarPro=function(){
                
                $http.post('/GuardarPro',$scope.proveedores).then(
                    function(response){
                        alert('GUARDADO');
                    },
                    function(erroResponse){
                        console.log(erroResponse);
                    }
                    );
                	location.reload();
                }

            $scope.modificar = function(index){
                $scope.provedoores = $scope.proveedores[index];
            }

			$scope.GuardarCon=function(){
                
                $http.post('/GuardarCon',$scope.contactos).then(
                    function(response){
                        alert('GUARDADO');
                    },
                    function(erroResponse){
                        console.log(erroResponse);
                    }
                    );
                	location.reload();
                }            


        });
    </script>
  @endsection 
    @endsection