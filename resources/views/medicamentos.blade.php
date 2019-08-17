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
                                <div class="input-field col m12" ng-show="habilitar">
                                    <i class="material-icons prefix">search</i>
                                    <input id="busMedicamento" name="buscarMedicamento" type="text" ng-pagination-search="medicamentoson">
                                    <label for="busMedicamento">Medicamento</label> 
                                </div>
                                <div class="input-field col m12" ng-show="deshabilitar">
                                    <i class="material-icons prefix">search</i>
                                    <input id="busMedicamento2" name="buscarMedicamento" type="text" ng-pagination-search="medicamentosoff">
                                    <label for="busMedicamento2">Medicamento</label> 
                                </div>
                            </div>
                            <div class="col m4">
                                <div class="input-field col m12">
                                    <button class="waves-effect waves-light btn modal-trigger" data-target="agMedicamento" ng-click="limpiar()">AGREGAR MEDICAMENTOS</button>
                                    <!-- Modal Structure -->
                                    <form name="frmMedicamento" id="frmMedicamento">
                                        <div id="agMedicamento" class="modal modal-fixed-footer">
                                            <div class="modal-content">
                                                <h4 class="black-text center">Medicamento</h4>
                                                <div class="row">
                                                    <div class="input-field col m12">
                                                        <i class="prefix material-icons">local_hospital</i>
                                                        <input id="nomMedicamento" name="nombre" type="text" class="validate" ng-model="medicamento.nombre" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                                        <label for="nomMedicamento">Nombre del medicamento</label>
                                                        <span ng-show="frmMedicamento.nombre.$error.pattern && frmMedicamento.nombre.$dirty">*Solo letras*</span>
                                                    </div>
                                                    <div class="input-field col m12">
                                                        <i class="prefix material-icons">description</i>
                                                        <input id="descMedicamento" name="descripcion" type="text" class="validate" ng-model="medicamento.descripcion" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                                        <label for="descMedicamento">Descripción del medicamento</label>
                                                        <span ng-show="frmMedicamento.descripcion.$error.pattern && frmMedicamento.descripcion.$dirty">*Solo letras*</span>
                                                    </div>
                                                    <div class="input-field col m12">
                                                        <i class="prefix material-icons">notes</i>
                                                        <input id="cantidad" name="cantidad" type="text" class="validate" ng-model="medicamento.cantidad">
                                                        <label for="cantidad">Cantidad por unidad (ejemplo: 500mg)</label>
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
                                <table class="striped">
                                    <thead>
                                    <tr>
                                        <th>Nombre medicamento</th>
                                        <th>Descripción</th>
                                        <th>Cantidad por unidad</th>
                                        <th>Editar</th>
                                        <th>Deshabilitar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-pagination="medicamento in medicamentoson" ng-pagination-size="5">
                                            <td scope="col">@{{medicamento.nombre}}</td>
                                            <td scope="col">@{{medicamento.descripcion}}</td>
                                            <td scope="col">@{{medicamento.cantidad}}</td>
                                            <td><li class="waves-effect"><a href="#editMedicamento" ng-click="selectEditar(medicamento.id)" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
                                            <td><div class="switch">    <label>            <input class="switchon" type="checkbox" ng-click="changeStatusOF(medicamento.id)">      <span class="lever"></span>          </label>  </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ng-pagination-control pagination-id="medicamentoson"></ng-pagination-control>
                            </div>
                        </div>
                        <div id="deshabilitados" class="col m12">
                            <div class="row mrg">
                                <table class="striped">
                                    <thead>
                                    <tr>
                                        <th>Nombre medicamento</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad por unidad</th>    
                                        <th>Habilitar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-pagination="medicamento in medicamentosoff" ng-pagination-size="5">
                                            <td scope="col">@{{medicamento.nombre}}</td>
                                            <td scope="col">@{{medicamento.descripcion}}</td>
                                            <td scope="col">@{{medicamento.cantidad}}</td>
                                            <td><div class="switch">    <label>            <input ng-click="changeStatusON(medicamento.id)" class="switchoff" type="checkbox">      <span class="lever"></span>          </label>  </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ng-pagination-control pagination-id="medicamentosoff"></ng-pagination-control>
                            </div>
                        </div>
                        
                        <!-- MODAL PARA EDITAR-->
                        <form name="frmMedicamento" id="frmMedicamento">
                            <div id="editMedicamento" class="modal">
                                <div class="modal-content">
                                    <h4 class="black-text center">Medicamento</h4>
                                    <div class="row">
                                        <div class="input-field col m12">
                                            <i class="prefix material-icons">local_hospital</i>
                                            <input id="nomMedicamento" name="nombre" type="text" class="validate" ng-model="medicamento.nombre" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                            <label for="nomMedicamento">Nombre del medicamento</label>
                                            <span ng-show="frmMedicamento.nombre.$error.pattern && frmMedicamento.nombre.$dirty">*Solo letras*</span>
                                        </div>
                                        <div class="input-field col m12">
                                            <i class="prefix material-icons">description</i>
                                            <input id="descMedicamento" name="descripcion" type="text" class="validate" ng-model="medicamento.descripcion" ng-pattern="/^[a-zA-Z\s ñáéíóú]*$/">
                                            <label for="descMedicamento">Descripción del medicamento</label>
                                            <span ng-show="frmMedicamento.descripcion.$error.pattern && frmMedicamento.descripcion.$dirty">*Solo letras*</span>
                                        </div>
                                        <div class="input-field col m12">
                                        <i class="prefix material-icons">notes</i>
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
                                    <button class="waves-effect waves-light btn modal-trigger" data-target="agDosis" ng-click="limpiar()">AGREGAR DOSIS MEDICAMENTOS</button>
                                    <!-- Modal Structure -->
                                    <form name="frmDosis" id="frmDosis">
                                        <div id="agDosis" class="modal modal-fixed-footer customodal">
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
                                                        <i class="prefix material-icons">description</i>
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
                                        <th>Eliminar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-pagination="dosis in dosisall" ng-pagination-size="5">
                                            <td scope="col">@{{dosis.nombre}}</td>
                                            <td scope="col">@{{dosis.descripcion}}</td>
                                            <!--<td><button class="waves-effect amber accent-3 btn modal-trigger" data-target="agDosis" ng-click="selectDosis(dosis.id)"><i class="material-icons">edit</i></button></td>-->
                                            <td><li class="waves-effect"><a href="#agDosis" ng-click="selectDosis(dosis.id)" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
                                            <td><li class="waves-effect center-align"><a  ng-click="deleteDosis(dosis.id)"><i class="red-text small material-icons">delete_forever</i></a></li></td>
                                            <!--<td><button class="waves-effect white btn" ><i class="red-text material-icons">delete_forever</i></button></td>-->
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
                    $('.switchon').prop('checked', true);
                    $('.switchoff').prop('checked', false);
                });
            </script>
            <script type="text/javascript">
            	var app=angular.module('app',['ngPagination']).config(function ($interpolateProvider) {
                    
		        });
				app.controller('crtl',function($scope, $http, $filter)
				{
                    var id = 0;
                    $scope.medicamentos={};
                    $scope.medicamentoson=[];
                    $scope.medicamentosoff=[];
                    $scope.medicamento={};

                    $scope.dosisall={}
                    $scope.dosis={}
                    $scope.medicamentosCombos=[];

                    $scope.habilitar=true;
				    $scope.deshabilitar=false;
                    //Extrayendo la consulta a un arreglo
                    $scope.dosisall=(<?php echo $dosis;?>);
					// Exrayendo la consulta a un arreglo
					$scope.medicamentos= (<?php echo $medicamentos;?>);
                    console.log('Todos los medicamentos',$scope.medicamentos);
                   //AGREGAR LOS MEDICAMENTOS CON LOS STATUS 1 = HABILITADOS , 0 = DESHABILITADOS
                    for (var i=0 ; i < $scope.medicamentos.length; i ++) 
					{
                        console.log($scope.medicamentos[i].status);
						if($scope.medicamentos[i].status==1)
						{
							$scope.medicamentoson.push($scope.medicamentos[i]);
						}
                        else if($scope.medicamentos[i].status == 0)
						{
							$scope.medicamentosoff.push($scope.medicamentos[i]);
						}
					}

					console.log("Medicamentos ON: " , $scope.medicamentoson);
                    console.log("Medicamentos OFF: ", $scope.medicamentosoff);

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

                    $scope.changeStatusON = function(id_medicamento)
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
                                $http.post('/habilitar', id_medicamento).then
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
                    $scope.changeStatusOF = function(id_medicamento)
                    {
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
                                $http.post('/deshabilitar', id_medicamento).then
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

                    $scope.deleteDosis = function(idEliminar)
                    {
                        swal({
                            title: "¿Estás seguro de eliminar este registro?",
                            text: "Una vez eliminado,¡No podras recuperar este registro!",
                            icon: "warning",
                            buttons: ["Cancelar", "Si"],
                            dangerMode: true,
                        })
                        .then((willDelete) =>
                        {
                            if (willDelete) 
                            {
                                $http.post('/deleteDosis', idEliminar).then
                                (
                                    function(response)
                                    {	
                                        swal({
                                            title: "Eliminado con Exito!",
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