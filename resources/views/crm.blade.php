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
                <div class="input-field col m9" ng-show="todos">
                    <i class="material-icons prefix">search</i>
                    <input id="busMedicamento" type="text" class="validate" ng-pagination-search="tratamiento">
                    <label for="busMedicamento">Paciente</label> 
                </div>
                <div class="input-field col m9" ng-show="asistir">
                    <i class="material-icons prefix">search</i>
                    <input id="busMedicamento" type="text" class="validate" ng-pagination-search="asistira">
                    <label for="busMedicamento">Paciente</label> 
                </div>
                <div class="input-field col m9" ng-show="noasistir">
                    <i class="material-icons prefix">search</i>
                    <input id="busMedicamento" type="text" class="validate" ng-pagination-search="noAsistira">
                    <label for="busMedicamento">Paciente</label> 
                </div>
                <div class="input-field col m9" ng-show="pendientee">
                    <i class="material-icons prefix">search</i>
                    <input id="busMedicamento" type="text" class="validate" ng-pagination-search="pendiente">
                    <label for="busMedicamento">Paciente</label> 
                </div>
            </div>
        </div>
        <div class="card">
            <ul class="tabs">
                    <li class="tab col s3"><a href="#test1" class="active" ng-click="todos2()">Todos</a></li>
                    <li class="tab col s3"><a href="#test1" ng-click="asistir2()">Asistirán</a></li>
                    <li class="tab col s3"><a href="#test2" ng-click="noasistir2()">No asistirán</a></li>
                    <li class="tab col s3"><a href="#test2" ng-click="pendiente2()">Pendientes</a></li>
                </ul>
            <div class="row mrg" ng-show="todos">
                <div class="col m12">
                    <table class="centered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Teléfono</th>
                                <th>Meses restantes</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-pagination="trata in tratamiento " ng-pagination-size="5" >
                                <td>[[trata.nombre]]</td>
                                <td>[[trata.tipo]]</td>
                                <td>[[trata.telefono]]</td>
                                <td>[[trata.total]]</td>
                                <td ng-click="obtenerId([trata.id])">
                                    <select ng-model="detalleTratamiento.Estado">
                                      <option value="" disabled selected>Selecciona</option>
                                      <option value="Asistira">Asistirá</option>
                                      <option value="No asistira">No asistirá</option>
                                      <option value="Pendiente">Pendiente</option>
                                    </select>
                                </td>
                                <td><li class="waves-effect"  ng-click="guardar()"><i class="small material-icons">beenhere</i></li></td>
                            </tr>
                         </tbody>
                    </table>
                </div>
            </div>
            <div class="row mrg" ng-show="asistir">
                <div class="col m12">
                    <table class="centered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Teléfono</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-pagination="trata in asistira " ng-pagination-size="5" >
                                <td>[[trata.nombre]]</td>
                                <td>[[trata.tipo]]</td>
                                <td>[[trata.telefono]]</td>
                                <td>[[trata.created_at]]</td>
                                <td>
                                    
                                      [[trata.Estado]]
        
                                </td>
                            </tr>
                         </tbody>
                    </table>
                </div>
            </div>
            <div class="row mrg" ng-show="noasistir">
                <div class="col m12">
                    <table class="centered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Teléfono</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-pagination="trata in noAsistira " ng-pagination-size="5" >
                                <td>[[trata.nombre]]</td>
                                <td>[[trata.tipo]]</td>
                                <td>[[trata.telefono]]</td>
                                <td>[[trata.created_at]]</td>
                                <td>
                                    [[trata.Estado]]
                                    
                                </td>
                            </tr>
                         </tbody>
                    </table>
                </div>
            </div>
            <div class="row mrg" ng-show="pendientee">
                <div class="col m12">
                    <table class="centered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Teléfono</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr ng-pagination="trata in pendiente " ng-pagination-size="5" ng-click="obtenerId3([trata.total])">
                                <td>[[trata.nombre]]</td>
                                <td>[[trata.tipo]]</td>
                                <td>[[trata.telefono]]</td>
                                <td>[[trata.created_at]]</td>
                                <td ng-click="obtenerId2([trata.id_tratamiento])" >
                                    <select ng-model="detalleTratamiento.Estado"  >
                                      <option value="" disabled selected >[[trata.Estado]]</option>
                                      <option value="Asistira">Asistirá</option>
                                      <option value="No asistira">No asistirá</option>
                                    </select>
                                </td>
                                <td ng-click="obtenerId4(trata.id)"></td>
                                <td><li class="waves-effect"  ng-click="modificar()"><i class="small material-icons">beenhere</i></li></td>
                            </tr>
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div ng-show="todos">
            <ng-pagination-control pagination-id="tratamiento" ></ng-pagination-control> 
        </div>
        <div ng-show="asistir">
            <ng-pagination-control pagination-id="asistira" ></ng-pagination-control> 
        </div>
        <div ng-show="noasistir">
            <ng-pagination-control pagination-id="noAsistira" ></ng-pagination-control> 
        </div>
        <div ng-show="pendientee">
            <ng-pagination-control pagination-id="pendiente" ></ng-pagination-control> 
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
                    $scope.detalleTratamiento={};
                    $scope.asistira=[];
                    $scope.noAsistira=[];
                    $scope.pendiente=[];
                    $scope.citas;
                    $scope.citas2;

                    $scope.tratamiento = (<?php echo $tratamiento;?>);
                    console.log($scope.tratamiento);

                    $scope.tratamiento2 = (<?php echo $tratamiento2;?>);
                    console.log($scope.tratamiento2);

                    // Empleados Asistiran
                    $scope.i=0;
                    var tipo = 'Asistira';
                    for ($scope.i ; $scope.i < $scope.tratamiento2.length; $scope.i ++)
                    { 
                        if($scope.tratamiento2[$scope.i].Estado==tipo)
                        {
                            //Pasar los datos a los inputs
                            $scope.asistira.push($scope.tratamiento2[$scope.i]);
                        }
                    }
                    console.log("Asistira: " , $scope.asistira);

                    // Empleados Asistiran
                    $scope.i=0;
                    var tipo = 'No asistira';
                    for ($scope.i ; $scope.i < $scope.tratamiento2.length; $scope.i ++)
                    { 
                        if($scope.tratamiento2[$scope.i].Estado==tipo)
                        {
                            //Pasar los datos a los inputs
                            $scope.noAsistira.push($scope.tratamiento2[$scope.i]);
                        }
                    }
                    console.log("No asistira: " , $scope.noAsistira);

                    // Empleados Asistiran
                    $scope.i=0;
                    var tipo = 'Pendiente';
                    for ($scope.i ; $scope.i < $scope.tratamiento2.length; $scope.i ++)
                    { 
                        if($scope.tratamiento2[$scope.i].Estado==tipo)
                        {
                            //Pasar los datos a los inputs
                            $scope.pendiente.push($scope.tratamiento2[$scope.i]);
                        }
                    }
                    console.log("Pendiente: " , $scope.pendiente);

                    $scope.todos=true;
                    $scope.asistir=false;
                    $scope.noasistir=false;
                    $scope.pendientee=false;

                    $scope.todos2=function()
                    {
                        $scope.todos=true;
                        $scope.asistir=false;
                        $scope.noasistir=false;
                        $scope.pendientee=false;
                    }

                    $scope.asistir2=function()
                    {
                        $scope.todos=false;
                        $scope.asistir=true;                      
                        $scope.noasistir=false;
                        $scope.pendientee=false;
                    }

                    $scope.noasistir2=function()
                    {
                        $scope.todos=false;
                        $scope.asistir=false;                      
                        $scope.noasistir=true;
                        $scope.pendientee=false;
                    }

                    $scope.pendiente2=function()
                    {
                        $scope.todos=false;
                        $scope.asistir=false;                      
                        $scope.noasistir=false;
                        $scope.pendientee=true;
                    }

                    $scope.obtenerId=function(id)
                    {
                        console.log("holis: " + id);
                        $scope.i=0;
                        for ($scope.i ; $scope.i < $scope.tratamiento.length; $scope.i ++) 
                        {
                            if($scope.tratamiento[$scope.i].id==id)
                            //Pasar los datos a los inputs
                            $scope.citas=$scope.tratamiento[$scope.i].total;
                        }
                        $scope.id=id;
                        console.log($scope.citas);
                    }


                    $scope.obtenerId2=function(id)
                    {
                        console.log("id_tratamiento: " + id);
                        $scope.id2=id;
                    }

                    $scope.obtenerId3=function(total)
                    {
                        console.log("total: " + total);
                        $scope.citas2=total;
                        console.log($scope.citas2);
                    }

                    $scope.obtenerId4=function(id)
                    {
                        console.log("id detalleTratamiento: " + id);
                        $scope.id=id;
                    }

                    $scope.guardar=function()
                    {
                        $http.post('/guardar/' + $scope.id, $scope.detalleTratamiento).then
                        (
                            function(response)
                            {
                                console.log($scope.detalleTratamiento);
                                swal({
                                  title: "Guardado Exitosamente",
                                  text: "Click boton Ok para continuar.",
                                  icon: "success",                                    
                                }).then((value) =>{
                                    window.location.reload();
                                });
                                $scope.id2=$scope.id;
                            },
                            function(errorResponse)
                            {
                                console.log($scope.detalleTratamiento);
                                swal("Error", "", "error");
                            }
                        );
                        if($scope.detalleTratamiento.Estado=="Asistira")
                        {
                            $scope.citas=$scope.citas -1;
                            console.log($scope.citas);
                            $scope.detalleTratamiento.total=$scope.citas;
                            console.log("probar: ", $scope.detalleTratamiento.total);

                            $http.post('/restar/'+$scope.id, $scope.detalleTratamiento).then
                            (
                                function(response)
                                {

                                },
                                function(errorResponse)
                                {

                                }
                            );
                        }
                    }
                        
                    $scope.modificar=function()
                    {
                        console.log("modificar: ", $scope.detalleTratamiento);
                        $http.put('/modificar3/'+$scope.id, $scope.detalleTratamiento).then
                        (
                            function(response)
                            {
                                console.log($scope.detalleTratamiento);
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
                                console.log($scope.detalleTratamiento);
                                swal("Error", "", "error");
                            }
                        );
                        if($scope.detalleTratamiento.Estado=="Asistira")
                        {
                            $scope.citas2=$scope.citas2 -1;
                            console.log("restado",$scope.citas2);
                            $scope.detalleTratamiento.total=$scope.citas2;
                            console.log("probar: ", $scope.detalleTratamiento.total);

                            $http.post('/restar2/'+$scope.id2, $scope.detalleTratamiento).then
                            (
                                function(response)
                                {

                                },
                                function(errorResponse)
                                {

                                }
                            );
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
                $(document).ready(function(){
                $('.tabs').tabs();
              });
            </script>
            </script>
        @endsection
    @endsection   