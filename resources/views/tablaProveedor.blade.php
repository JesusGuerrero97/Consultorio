@extends('header')
@extends('footer')

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
            .modal { width: 40% !important;  overflow-y: hidden;}
            .customodal{
                height: 55% !important; 
                overflow-y: hidden;
                overflow-x:hidden;
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

	<div ng-controller="ctrl">
        <div class="row">
            <div class="col m12">
                <ul class="tabs">
                    <li class="tab col m6"><a class="active" href="#test1">Proveedores</a></li>
                    <li class="tab col m6"><a  href="#test2">Contacto-Proveedor</a></li>
                </ul>
            </div>
            <div id="test1" class="col m12">
                <div class="card">
                    <div class="row">
                        <div class="col m8">
                            <div class="input-field col m12" ng-show="habilitar">
                	            <i class="material-icons prefix">search</i>
                	            <input id="busEmpresa" name="buscarEmpresa" type="text" ng-pagination-search="proveedoreson">
                	            <label for="busEmpresa">Empresa</label>
                            </div>

                            <div class="input-field col m12" ng-show="deshabilitar">
                                <i class="material-icons prefix">search</i>
                                <input id="busEmpresa2" name="buscarEmpresa" type="text" ng-pagination-search="proveedoresoff">
                                <label for="busEmpresa2">Empresa</label>
                            </div>
                        </div>
                    <div class="input-field col m3">
                        <button class="waves-effect waves-light btn modal-trigger" data-target="agProveedor"> + proveedor</button>
                        <!-- Modal Structure -->
                        <form name="FrmProveedores">
                            <div id="agProveedor" class="modal">
                                <div class="modal-content">
                                    <h4 class="black-text center">PROVEEDOR</h4>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">business</i>
                                            <input id="nomEmpresa" type="text" class="validate" ng-model="nuevoProveedor.empresa" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                            <label for="nomEmpresa">Nombre de la empresa</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">place</i>
                                            <input id="dirEmpresa" type="text" class="validate" ng-model="nuevoProveedor.direccion">
                                            <label for="dirEmpresa">Dirección de la empresa</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">phone_in_talk</i>
                                            <input id="telefono" type="number" class="validate" ng-model="nuevoProveedor.telefono">
                                            <label for="telefono">Teléfono</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn modal-close red" data-tarjet="#idModal">Cancelar</button>
                                    <button type="submit" class="btn modal-close" ng-click="GuardarPro()">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                <div class="card">
                    <div class="row">
                        <div class="">
                            <div class="col m12">
                                <ul class="tabs tabs2">
                                    <li class="tab tab2 col m6"><a href="#habilitados" ng-click="habilitados()">Habilitados</a></li>
                                    <li class="tab tab2 col m6"><a href="#deshabilitados" ng-click="deshabilitados()">Deshabilitados</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="habilitados" class="col m12">
                            <div class="row mrg">
                        		<table>
                            		<tr>
                            			<th>Empresa</th>
                            			<th>Dirección</th>
                            			<th>Telefono</th>
                            			<th>Editar</th>
                            			<th>Deshabilitar</th>
                            		</tr>
                            		@foreach ($proveedores as $proveedor)
                                       <tr>
                                            <td><?= $proveedor->empresa ?></td>
                                            <td><?= $proveedor->direccion ?></td>
                                            <td><?= $proveedor->telefono ?></td>
                                            <td><li class="waves-effect"><a href="#editProveedor" ng-click="selectEditar(<?= $proveedor->id ?>)" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
                                            <td><div class="switch" ng-click="changeStatusOF(proveedor.id)"><label><input type="checkbox"><span class="lever"></span></label></div></td>
                                       </tr>
                                    @endforeach()
                            	</table>
                            </div>
                        </div>

                        <div id="deshabilitados" class="col m12">
                            <div class="row mrg">
                                <table>
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        <th>Editar</th>
                                        <th>Deshabilitar</th>
                                    </tr>
                                    @foreach ($proveedores as $proveedor)
                                       <tr ng-pagination="proveedor in proveedoresoff" ng-pagination-size="5">
                                            <td><?= $proveedor->empresa ?></td>
                                            <td><?= $proveedor->direccion ?></td>
                                            <td><?= $proveedor->telefono ?></td>
                                            <td><li class="waves-effect"><a href="#editProveedor" ng-click="selectEditar(proveedores.id)" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
                                            <td><div class="switch" ng-click="changeStatusON(proveedores.id)"><label><input type="checkbox"><span class="lever"></span></label></div></td>
                                       </tr>
                                    @endforeach()
                                </table>
                            </div>
                        </div>
                        <!-- Modal Editar -->
                        <form name="FrmProveedores" id="FrmProveedores">
                            <div id="editProveedor" class="modal">
                                <div class="modal-content">
                                    <h4 class="black-text center">Proveedor</h4>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">business</i>
                                            <input id="nomEmpresa" type="text" class="validate" ng-model="proveedor.empresa">
                                            <label for="nomEmpresa">Nombre de la empresa</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">place</i>
                                            <input id="dirEmpresa" type="text" class="validate" ng-model="proveedor.direccion">
                                            <label for="dirEmpresa">Dirección de la empresa</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">phone_in_talk</i>
                                            <input id="telefono" type="number" class="validate" ng-model="proveedor.telefono">
                                            <label for="telefono">Teléfono</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn modal-close red" data-tarjet="#idModal">Cancelar</button>
                                    <button type="submit" class="btn modal-close" ng-click="EditarPro()">Editar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="test2" class="col m12">
                <div class="card">
                    <div class="row">
                        <div class="col m8">
                            <div class="input-field col m12" ng-show="habilitar">
                                <i class="material-icons prefix">search</i>
                                <input id="busContacto" name="buscarContacto" type="text" ng-pagination-search="proveedoreson">
                                <label for="busContacto">Contacto</label>
                            </div>

                            <div class="input-field col m12" ng-show="deshabilitar">
                                <i class="material-icons prefix">search</i>
                                <input id="busContacto2" name="buscarContacto" type="text" ng-pagination-search="proveedoresoff">
                                <label for="busContacto2">Empresa</label>
                            </div>
                        </div>
                    <div class="input-field col m3">
                        <button class="waves-effect waves-light btn modal-trigger" data-target="agContacto"> + contacto</button>
                        <!-- Modal Structure -->
                        <form name="FrmContactos">
                            <div id="agContacto" class="modal">
                                <div class="modal-content">
                                    <h4 class="black-text center">Contacto</h4>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">business</i>
                                            <input id="nomEmpresa" type="text" class="validate" ng-model="proveedores.empresa" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                            <label for="nomEmpresa">Nombre de la empresa</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">place</i>
                                            <input id="dirEmpresa" type="text" class="validate" ng-model="proveedores.direccion">
                                            <label for="dirEmpresa">Dirección de la empresa</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">phone_in_talk</i>
                                            <input id="telefono" type="number" class="validate" ng-model="proveedores.telefono">
                                            <label for="telefono">Teléfono</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn modal-close red" data-tarjet="#idModal">Cancelar</button>
                                    <button type="submit" class="btn modal-close" ng-click="GuardarPro()">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                <div class="card">
                    <div class="row">
                        <div id="habilitados" class="col m12">
                            <div class="row mrg">
                                <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    @foreach ($proveedores as $proveedor)
                                       <tr>
                                            <td><?= $proveedor->empresa ?></td>
                                            <td><?= $proveedor->direccion ?></td>
                                            <td><?= $proveedor->telefono ?></td>
                                            <td><li class="waves-effect"><a href="#editProveedor" ng-click="selectEditar(contacto.id)" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
                                            <td><li class="waves-effect center-align"><a><i class="red-text small material-icons">delete_forever</i></a></li></td>
                                       </tr>
                                    @endforeach()
                                </table>
                            </div>
                        </div>

                        <!-- Modal Editar -->
                        <form name="FrmProveedores" id="FrmProveedores">
                            <div id="editProveedor" class="modal">
                                <div class="modal-content">
                                    <h4 class="black-text center">Proveedor</h4>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">business</i>
                                            <input id="nomEmpresa" type="text" class="validate" ng-model="proveedores.empresa">
                                            <label for="nomEmpresa">Nombre de la empresa</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">place</i>
                                            <input id="dirEmpresa" type="text" class="validate" ng-model="proveedores.direccion">
                                            <label for="dirEmpresa">Dirección de la empresa</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="prefix material-icons">phone_in_talk</i>
                                            <input id="telefono" type="number" class="validate" ng-model="proveedores.telefono">
                                            <label for="telefono">Teléfono</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn modal-close red" data-tarjet="#idModal">Cancelar</button>
                                    <button type="submit" class="btn modal-close" ng-click="editar()">Editar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>

    @section('footer')
	@parent
	<script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.tabs').tabs();
            $('.switchon').prop('checked', true);
            $('.switchoff').prop('checked', false);
        });
    </script>

    <script>
    	
    	var app=angular.module('app',['ngPagination']).config(function ($interpolateProvider) {});
    	app.controller('ctrl', function($scope, $http){
            
            var id = 0;
            $scope.proveedores = {};
            $scope.proveedor = {};
            $scope.proveedoreson=[];
            $scope.proveedoresoff=[];
            $scope.nuevoProveedor = {};

            $scope.habilitar=true;
            $scope.deshabilitar=false;

            $scope.proveedores=(<?php echo $proveedores;?>);
            console.log('Todos los proveedores',$scope.proveedores);

            for (var i=0 ; i < $scope.proveedores.length; i ++) 
                    {
                        console.log($scope.proveedores[i].status);
                        if($scope.proveedores[i].status==1)
                        {
                            $scope.proveedoreson.push($scope.proveedores[i]);
                        }
                        else if($scope.proveedores[i].status == 0)
                        {
                            $scope.proveedoresoff.push($scope.proveedores[i]);
                        }
                    }

            console.log("Proveedores ON: " , $scope.proveedoreson);
            console.log("proveedores OFF: ", $scope.proveedoresoff);
            
            $scope.GuardarPro=function(){
            
            $http.post('/GuardarPro',$scope.nuevoProveedor).then(
                function(response){
                    alert('GUARDADO');
                },
                function(erroResponse){
                    console.log(erroResponse);
                }
                );
            	location.reload();
            }

            $scope.selectEditar=function(id)
                    { 
                        $scope.editId=id;
                        console.log('id: ', $scope.editId);

                        for(var i = 0; i<$scope.proveedores.length;i++)
                        {
                            if($scope.proveedores[i].id==$scope.editId)
                            {
                                $scope.editId==0;
                                $scope.proveedor = $scope.proveedores[i];
                                console.log($scope.proveedor);
                                $(function(){
                                    M.updateTextFields();
                                });
                            }
                        }
                    }

            $scope.EditarPro=function()
                    {
                        $http.post('/editProveedor', $scope.proveedor).then
                        (
                            /*function(response)
                            {   
                                
                                swal({
                                    title: "Editado Exitosamente",
                                    text: "Clic boton Ok para continuar.",
                                    icon: "success",
                                }).then((value) => {
                                    window.location.reload();
                                });
            
                            },
                            function(errorResponse)
                            {
                                swal ( "Ocurrio un error" ,  "Faltan algunos datos" ,  "error" );
                            }*/
                            function(response) {
                                if(response.data == 1) {
                                    location.reload();
                                }
                            }
                        );
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

                    $scope.changeStatusON = function(id_proveedor)
                    {
                        swal({
                            title: "¿Estás seguro de deshabilitar este registro?",
                            text: "¡Puedes cambiarlo más tarde si asi lo prefieres!",
                            icon: "warning",
                            buttons: ["Cancelar", "Si"],
                            dangerMode: true,
                        })
                        .then((willDelete) =>
                        {
                            if (willDelete) 
                            {
                                $http.post('/HabilitarPro', id_proveedor).then
                                (
                                    function(response)
                                    {   
                                        swal({
                                            title: "¡Registro habilitado con Exito!",
                                            text: "Clic boton Ok para continuar.",
                                            icon: "success",
                                        }).then((value) => {
                                            window.location.reload();
                                        });
                    
                                    },
                                    function(errorResponse)
                                    {
                                        swal ( "Ocurrio un error" ,  "" ,  "error" );
                                    }
                                );
                            } 
                        });
                        
                    }

                    $scope.changeStatusOF = function(id_proveedor)
                    {
                        $scope.aidi = id_proveedor;
                        console.log($scope.aidi);
                        swal({
                            title: "¿Estás seguro de habilitar este registro?",
                            text: "¡Puedes modificar este cambio si asi lo deseas!",
                            icon: "warning",
                            buttons: ["Cancelar", "Si"],
                            dangerMode: true,
                        })
                        .then((willDelete) =>
                        {
                            if (willDelete) 
                            {
                                $http.post('/DeshabilitarPro', id_proveedor).then
                                (
                                    function(response)
                                    {   
                                        swal({
                                            title: "¡Registro deshabilitado con Exito!",
                                            text: "Clic boton Ok para continuar.",
                                            icon: "success",
                                        }).then((value) => {
                                            window.location.reload();
                                        });
                    
                                    },
                                    function(errorResponse)
                                    {
                                        swal ( "Ocurrio un error" ,  "" ,  "error" );
                                    }
                                );
                            } 
                        });
                    }
        });
    </script>
  @endsection 
    @endsection