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
         <div ng-controller="ctrl">
            <div class="card">
                    <div class="row mrg2">
                        <div class="input-field col m9">
                            <i class="material-icons prefix">search</i>
                            <input id="busMedicamento" type="text" class="validate">
                            <label for="busMedicamento">Material</label> 
                        </div>
                        <div class="input-field col m3">
						
                            <a href="#modal1" class="waves-effect waves-light btn modal-trigger">Agregar Material</a>
                        </div>
                    </div>
					<!-- Modal Agregar -->
					<div>
					<div id="modal1" class="modal">
						<div class="modal-content">
						<h4 class="brand-logo teal-text">Material</h4>
						<div class="row">
							<form class="col s12">
							<div class="row">
								<div class="input-field col s12">
								<input placeholder="Descripción" type="text" class="validate" ng-model="almacen.descripcion">
								<label >Descripción</label>
								</div>
							</div>
							<div class="row">
							<label>Proveedor</label>
							<select id="proveedor">
							<option value="0" disabled selected>Proveedor</option>
									@foreach($proveedores as $proveedor)
									<option value="{!! $proveedor->id !!}">
										{!! $proveedor->empresa !!}
									</option>
									@endforeach
								</select>
							</div>
							<div class="row">
								<div class="input-field col s12">
								<input placeholder="Stock" type="text" class="validate" ng-model="almacen.stock">
								<label >Stock</label>
								</div>
							</div>
							</form>
						</div>
						</div>
						<div class="modal-footer">
						
                		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" ng-click="editar()" ng-if="almacen.id!=null">Editar</a>
						<a href="#!" class="modal-close waves-effect waves-green btn-flat" ng-click="enviar()" ng-if="almacen.id==null">Guardar</a>
						<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
						</div>
					</div>
					</div>
            </div>
	
        <div class="card">
        <div class="row mrg">
            <table class="striped">
        <thead>
          <tr>
              
              <th>Descripcin</th>
              <th>Stock</th>
              <th>Proveedor</th>
              <th>Editar</th>
              <th>Deshabilitar</th>
          </tr>
        </thead>
        <tbody>
            @foreach($almacenes as $almacen)
	            <tr>
	                <td>{!! $almacen->descripcion !!}</td>
                    <td>{!! $almacen->stock !!}</td>
	                <td>{!! $almacen->proveedor !!}</td>
	                <td>
					<!---<td><li class="waves-effect"><a ng-click="mandar({{$almacen->id}})"  data-target="modal1"><i class="small material-icons">edit</i></a></li></td>-->
	                <a class="waves-effect  blue lighten-1 btn modal-trigger" data-target="modal1" ng-click="mandar({{$almacen->id}})"><i class="material-icons">
								edit
								</i></a>
							</td>
					<?php if(($almacen->status >0)): ?>
                    <td><div class="switch"><label><input type="checkbox" id="estatus" ng-click="estatus({{$almacen->id}})" checked="checked" ><span class="lever"></span></label></div></td>
					<?php else: ?>
						<td><div class="switch"><label><input type="checkbox" id="estatus" ng-click="estatus({{$almacen->id}})"><span class="lever"></span></label></div></td>
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
					$scope.almacen = {};
						$scope.enviar=function(){
							console.log($scope.almacen);
							$scope.almacen.proveedor= $("#proveedor").val();
							$http.post('/almacenar',$scope.almacen).then(
							function(response){
								console.log(response);
								if(response.data == 0){
											alert("hubo un error");
								}
								if(response.data == 1){
										alert("agregado con exito");
										window.location = "almacen";
									}
								},
								function(erroResponse){
								}	
							);
						}
						$scope.editar=function(){
							console.log($scope.almacen);
							$scope.almacen.proveedor= $("#proveedor").val();
							$http.post('/editar',$scope.almacen).then(
							function(response){
								console.log(response);
								if(response.data == 0){
											alert("hubo un error");
								}
								if(response.data == 1){
										alert("editado con exito con exito");
										window.location = "almacen";
									}
								},
								function(erroResponse){
								}	
							);
						}
						$scope.estatus=function(id){
							$scope.id = id;
							console.log("Entra a la funcion");
							console.log($scope.id);
							$http.post('/cambiar',$scope.id).then(
								function(response){
									console.log(response.data);
									window.location = "almacen";
									
								},
								function(erroResponse){
									
								}
							);
						}
						$(document).ready(function() {
							$("input").change(function() {
								if($(this).is(":checked")) {
									$scope.hola = $('#estatus:checked').val();
									console.log($scope.hola);
								}
								else {
								console.log("Is Not checked");
								}
							})
						});
						$scope.mandar=function(id){
							$scope.id = id;
							console.log($scope.id);
							$http.post('/solicitar',$scope.id).then(
								function(response){
									console.log(response.data);
									$scope.almacen = response.data;
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
               

    

