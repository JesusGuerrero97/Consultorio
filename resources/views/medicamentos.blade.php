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
            .modal { width: 40% !important;  overflow-y: hidden;}
        </style>
       
        <div ng-controller="crtl">
            <div class="row">
                <div class="col m12">
                    <ul class="tabs">
                        <li class="tab col m6"><a class="active" href="#test1">Medicamentos</a></li>
                        <li class="tab col m6"><a  href="#test2">Dosis</a></li>
                    </ul>
                </div>
                <div id="test1" class="col m12">
                    <div class="card">
                        <div class="row mrg2">
                            <div class="col m8">
                                <div class="input-field col m12">
                                    <i class="material-icons prefix">search</i>
                                    <input id="busMedicamento" name="buscarMedicamento" type="text" ng-pagination-search="medicamentos">
                                    <label for="busMedicamento">Medicamento</label> 
                                </div>
                            </div>
                            <div class="col m4">
                                <div class="input-field col m12">
                                    <button class="waves-effect waves-light btn modal-trigger" data-target="agMedicamento" ng-click="limpiar()"> + Medicamentos</button>
                                    <!-- Modal Structure -->
                                    <form name="frmMedicamento" id="frmMedicamento">
                                        <div id="agMedicamento" class="modal modal-fixed-footer">
                                            <div class="modal-content">
                                                <h4 class="black-text center">Medicamento</h4>
                                                <div class="row">
                                                    <div class="input-field col m12">
                                                        <input id="nomMedicamento" name="nombre" type="text" class="validate" ng-model="medicamento.nombre" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                                        <label for="nomMedicamento">Nombre del medicamento</label>
                                                        <span ng-show="frmMedicamento.nombre.$error.pattern && frmMedicamento.nombre.$dirty">*Solo letras*</span>
                                                    </div>
                                                    <div class="input-field col m12">
                                                        <input id="descMedicamento" name="descripcion" type="text" class="validate" ng-model="medicamento.descripcion" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                                        <label for="descMedicamento">Descripción del medicamento</label>
                                                        <span ng-show="frmMedicamento.descripcion.$error.pattern && frmMedicamento.descripcion.$dirty">*Solo letras*</span>
                                                    </div>
                                                    <div class="input-field col m12">
                                                        <input id="cantidad" name="cantidad" type="text" class="validate" ng-model="medicamento.cantidad">
                                                        <label for="cantidad">Cantidad por unidad</label>
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
                    </div>
                    <div class="card">
                        <div class="row mrg">
                            <div class="col m12">
                                <table class="striped">
                                    <thead>
                                    <tr>
                                        <th>Nombre medicamento</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad por unidad</th>
                                        <th>Editar</th>
                                        <th>Deshabilitar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-pagination="medicamento in medicamentos" ng-pagination-size="5">
                                            <td scope="col">@{{medicamento.nombre}}</td>
                                            <td scope="col">@{{medicamento.descripcion}}</td>
                                            <td scope="col">@{{medicamento.cantidad}}</td>
                                            <td><li class="waves-effect"><a href="#editMedicamento" ng-click="selectEditar(medicamento.id)" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
                                            <td><div class="switch">    <label>            <input type="checkbox">      <span class="lever"></span>          </label>  </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <ng-pagination-control pagination-id="medicamentos"></ng-pagination-control>
                        </div>
                        <!-- MODAL PARA EDITAR-->
                        <!-- Modal Structure -->
                        <form name="frmMedicamento" id="frmMedicamento">
                            <div id="editMedicamento" class="modal">
                                <div class="modal-content">
                                    <h4 class="black-text center">Medicamento</h4>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="nomMedicamento" name="nombre" type="text" class="validate" ng-model="medicamento.nombre" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                            <label for="nomMedicamento">Nombre del medicamento</label>
                                            <span ng-show="frmMedicamento.nombre.$error.pattern && frmMedicamento.nombre.$dirty">*Solo letras*</span>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="descMedicamento" name="descripcion" type="text" class="validate" ng-model="medicamento.descripcion" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                            <label for="descMedicamento">Descripción del medicamento</label>
                                            <span ng-show="frmMedicamento.descripcion.$error.pattern && frmMedicamento.descripcion.$dirty">*Solo letras*</span>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="cantidad" name="cantidad" type="text" class="validate" ng-model="medicamento.cantidad">
                                            <label for="cantidad">Cantidad por unidad</label>
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
                <div id="test2" class="col m12">
                    <div class="card">
                        <div class="row mrg2">
                            <div class="col m8">
                                <div class="input-field col m12">
                                    <i class="material-icons prefix">search</i>
                                    <input id="busMedicamento" name="buscarMedicamento" type="text" ng-pagination-search="dosisall">
                                    <label for="busMedicamento">Medicamento</label> 
                                </div>
                            </div>
                            <div class="col m4">
                                <div class="input-field col m12">
                                    <button class="waves-effect waves-light btn modal-trigger" data-target="agDosis" ng-click="limpiar()"> + Dosis medicamento</button>
                                    <!-- Modal Structure -->
                                    <form name="frmDosis" id="frmDosis">
                                        <div id="agDosis" class="modal modal-fixed-footer">
                                            <div class="modal-content">
                                                <h4 class="black-text center">Dosis</h4>
                                                <div class="row">
                                                    <div class="input-field col m12">
                                                        <select id="materialize-select" name="medica" ng-model="medicamentos.nombre" ng-init="limpiar()">
                                                            <option value="" disabled selected>Selecciona un medicamento</option>
                                                            <option ng-repeat="medicament in medicamentos" value="@{{medicament.id}}">@{{medicament.nombre}}</option>
                                                        </select>
                                                        <label>Medicamento</label>
                                                    </div>
                                                    <div class="input-field col m12">
                                                        <input id="descDosis" name="descripcion" type="text" ng-model="dosis.descripcion">
                                                        <label for="descDosis">Descripción de la dosis</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn modal-close red" data-tarjet="#idModal">Cancelar</button>
                                                <button type="submit" class="btn modal-close" ng-click="guardarDosis()" ng-if="editar==0">Guardar</button>
                                                <button type="submit" class="btn modal-close" ng-click="editarDosis()" ng-if="editar==1">Editar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="card">
                        <div class="row mrg">
                            <div class="col m12">
                                <table class="striped">
                                    <thead>
                                    <tr>              
                                        <th>Medicamento</th>
                                        <th>Dosis</th>
                                        <th>Editar</th>
                                        <th>Deshabilitar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-pagination="dosis in dosisall" ng-pagination-size="5">
                                            <td scope="col">@{{dosis.nombre}}</td>
                                            <td scope="col">@{{dosis.descripcion}}</td>
                                            <!--<td><button class="waves-effect amber accent-3 btn modal-trigger" data-target="agDosis" ng-click="selectDosis(dosis.id)"><i class="material-icons">edit</i></button></td>-->
                                            <td><li class="waves-effect"><a href="#agDosis" ng-click="selectDosis(dosis.id)" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
                                            <td><div class="switch">    <label>            <input type="checkbox">      <span class="lever"></span>          </label>  </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <ng-pagination-control pagination-id="dosisall"></ng-pagination-control>
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
                    $('select').formSelect();
                });
            </script>
            <script type="text/javascript">
            	var app=angular.module('app',['ngPagination']).config(function ($interpolateProvider) {
                    
		        });
				app.controller('crtl',function($scope, $http, $filter)
				{
                    var id = 0;
                    $scope.medicamentos={};
                    $scope.medicamento={};

                    $scope.dosisall={}
                    $scope.dosis={}
                    $scope.medicamentosCombos=[];
                    //Extrayendo la consulta a un arreglo
                    $scope.dosisall=(<?php echo $dosis;?>);
					// Exrayendo la consulta a un arreglo
					$scope.medicamentos= (<?php echo $medicamentos;?>);
                   
					console.log("Medicamentos: " , $scope.medicamentos);
                    
                    $scope.editarDosis = function()
                    {
                        $scope.dosis.id_medicamento = $('#materialize-select').val();
                        console.log($scope.dosis);
                        if($scope.dosis.id_medicamento == null || $scope.dosis.descripcion == null)
                        {
                           swal ( "Ocurrio un error" ,  "Faltan algunos datos" ,  "error" );
                        }
                        else 
                        {
                            $http.post('/editDosis', $scope.dosis).then
                            (
                                function(response)
                                {	
                                    
                                    swal({
                                        title: "Editado con Exito!",
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
                    }
                    $scope.guardarDosis = function()
                    {
                        $scope.dosis.id_medicamento = $('#materialize-select').val();
                        console.log($scope.dosis);
                        if($scope.dosis.id_medicamento == null || $scope.dosis.descripcion == null)
                        {
                           swal ( "Ocurrio un error" ,  "Faltan algunos datos" ,  "error" );
                        }
                        else 
                        {
                            $http.post('/saveDosis', $scope.dosis).then
                            (
                                function(response)
                                {	
                                    
                                    swal({
                                        title: "Guardado Exitosamente",
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
                        
                    }
                    $scope.limpiar=function()
                    {
                        $scope.editar=0;
                        $scope.medicamento = {};
                        $(function(){
                            M.updateTextFields();
                        });
                        $scope.dosis = {};
                        $('#materialize-select').find('option[value=""]').prop('selected', true);
                        $('select').formSelect();
                    }
                    $scope.selectDosis = function(id)
                    {
                        
                       $scope.editar=1;
                        for(var i = 0; i<=$scope.dosisall.length;i++)
                        {
                            if($scope.dosisall[i].id==id)
                            {
                                console.log('lo encontro123');
                                id==0;
                                $scope.dosis = $scope.dosisall[i];
                                console.log('datos dosis',$scope.dosis);
                                $('select').val($scope.dosis.id_medicamento);
                                $('select').formSelect();
                                $(function() {
                                    M.updateTextFields();
                                });   
                            }
                        }   
                        
                        
                    }
                    $scope.selectEditar=function(id)
                    { 
                        $scope.editId=id;
                        console.log('id: ', $scope.editId);

                        for(var i = 0; i<=$scope.medicamentos.length;i++)
                        {
                            if($scope.medicamentos[i].id==$scope.editId)
                            {
                                $scope.editId==0;
                                $scope.medicamento = $scope.medicamentos[i];
                                console.log($scope.medicamento);
                                $(function(){
                                    M.updateTextFields();
                                });
                            }
                        }
                    }
                    $scope.editar=function()
                    {
                        $http.post('/editMedicamento', $scope.medicamento).then
						(
                            function(response)
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
                            }
						);
                    }
                    $scope.guardar=function()
					{
						$scope.medicamento.estatus=1;

						//Que ningun input esté vacio 
						if($scope.medicamento.nombre==null || $scope.medicamento.descripcion==null || $scope.medicamento.cantidad == null)
						{
							swal ( "Ocurrio un error" ,  "Faltan algunos datos" ,  "error" );
						}
						else
						{
							$http.post('/saveMedicamento', $scope.medicamento).then
							(
								function(response)
								{	
									console.log($scope.medicamento);
									$scope.medicamento={};
									//swal("Guardado Existosamente", "", "success");
                                    swal({
                                        title: "Guardado Exitosamente",
                                        text: "Clic boton ok para continuar.",
                                        icon: "success",
                                    }).then((value) => {
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
				});
				
            </script>
        @endsection
    @endsection   