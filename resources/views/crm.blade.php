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
                    <input id="busMedicamento" type="text" class="validate" ng-pagination-search="tratamiento">
                    <label for="busMedicamento">Paciente</label> 
                </div>
            </div>
        </div>
        <div class="card">
            <ul class="tabs">
                    <li class="tab col s3"><a href="#test1" class="active" ng-click="todos2()">Todos</a></li>
                    <li class="tab col s3"><a href="#test1" ng-click="asistir2()">Asistiran</a></li>
                    <li class="tab col s3"><a href="#test2" ng-click="noasistir2()">No asistirán</a></li>
                    <li class="tab col s3"><a href="#test2" ng-click="pendiente2()">Pendientes</a></li>
                </ul>
            <div class="row mrg" ng-show="todos">
                <div class="col m12">
                    <table class="centered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Observaciones</th>
                                <th>Telefono</th>
                                <th>Enviar correo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-pagination="trata in tratamiento " ng-pagination-size="5" >
                                <td>[[trata.nombre]]</td>
                                <td>[[trata.apellidos]]</td>
                                <td>[[trata.Observaciones]]</td>
                                <td>[[trata.telefono]]</td>
                                <td><button class="waves-effect blue accent-3 btn modal-trigger"  href=""><i class="material-icons">send</i></button></td>
                                <td ng-click="obtenerId([trata.id])" ng-model="detalleTratamiento.id">
                                    <select ng-model="detalleTratamiento.Estado">
                                      <option value="" disabled selected>Selecciona</option>
                                      <option value="Asistira">Asistira</option>
                                      <option value="No asistira">No asistira</option>
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
                                <th>Apellidos</th>
                                <th>Observaciones</th>
                                <th>Telefono</th>
                                <th>Enviar correo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-pagination="trata in asistira " ng-pagination-size="5" >
                                <td>[[trata.nombre]]</td>
                                <td>[[trata.apellidos]]</td>
                                <td>[[trata.Observaciones]]</td>
                                <td>[[trata.telefono]]</td>
                                <td><button class="waves-effect blue accent-3 btn modal-trigger"  href=""><i class="material-icons">send</i></button></td>
                                <td ng-click="obtenerId([trata.id])" ng-model="detalleTratamiento.id">
                                    <select ng-model="detalleTratamiento.Estado">
                                      <option value="" disabled selected>Selecciona</option>
                                      <option value="Asistira">Asistira</option>
                                      <option value="No asistira">No asistira</option>
                                      <option value="Pendiente">Pendiente</option>
                                    </select>
                                </td>
                                <td><li class="waves-effect"  ng-click="guardar()"><i class="small material-icons">beenhere</i></li></td>
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
                                <th>Apellidos</th>
                                <th>Observaciones</th>
                                <th>Telefono</th>
                                <th>Enviar correo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-pagination="trata in noAsistira " ng-pagination-size="5" >
                                <td>[[trata.nombre]]</td>
                                <td>[[trata.apellidos]]</td>
                                <td>[[trata.Observaciones]]</td>
                                <td>[[trata.telefono]]</td>
                                <td><button class="waves-effect blue accent-3 btn modal-trigger"  href=""><i class="material-icons">send</i></button></td>
                                <td ng-click="obtenerId([trata.id])" ng-model="detalleTratamiento.id">
                                    <select ng-model="detalleTratamiento.Estado">
                                      <option value="" disabled selected>Selecciona</option>
                                      <option value="Asistira">Asistira</option>
                                      <option value="No asistira">No asistira</option>
                                      <option value="Pendiente">Pendiente</option>
                                    </select>
                                </td>
                                <td><li class="waves-effect"  ng-click="guardar()"><i class="small material-icons">beenhere</i></li></td>
                            </tr>
                         </tbody>
                    </table>
                </div>
            </div>
            <div class="row mrg" ng-show="pendiente">
                <div class="col m12">
                    <table class="centered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Observaciones</th>
                                <th>Telefono</th>
                                <th>Enviar correo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-pagination="trata in pendiente " ng-pagination-size="5" >
                                <td>[[trata.nombre]]</td>
                                <td>[[trata.apellidos]]</td>
                                <td>[[trata.Observaciones]]</td>
                                <td>[[trata.telefono]]</td>
                                <td><button class="waves-effect blue accent-3 btn modal-trigger"  href=""><i class="material-icons">send</i></button></td>
                                <td ng-click="obtenerId([trata.id])" ng-model="detalleTratamiento.id">
                                    <select ng-model="detalleTratamiento.Estado">
                                      <option value="" disabled selected>Selecciona</option>
                                      <option value="Asistira">Asistira</option>
                                      <option value="No asistira">No asistira</option>
                                      <option value="Pendiente">Pendiente</option>
                                    </select>
                                </td>
                                <td><li class="waves-effect"  ng-click="guardar()"><i class="small material-icons">beenhere</i></li></td>
                            </tr>
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
        <ng-pagination-control pagination-id="tratamiento" ></ng-pagination-control> 
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

                    $scope.tratamiento = (<?php echo $tratamiento;?>);
                    console.log($scope.tratamiento);

                    $scope.asistira = (<?php echo $asistira;?>);
                    console.log($scope.asistira);

                    $scope.noAsistira = (<?php echo $noAsistira;?>);
                    console.log($scope.noAsistira);

                    $scope.pendiente = (<?php echo $pendiente;?>);
                    console.log($scope.pendiente);

                    $scope.todos=true;
                    $scope.asistir=false;
                    $scope.noasistir=false;
                    $scope.pendiente=false;

                    $scope.todos2=function()
                    {
                        $scope.todos=true;
                        $scope.asistir=false;
                        $scope.noasistir=false;
                        $scope.pendiente=false;
                    }

                    $scope.asistir2=function()
                    {
                        $scope.todos=false;
                        $scope.asistir=true;                      
                        $scope.noasistir=false;
                        $scope.pendiente=false;
                    }

                    $scope.noasistir2=function()
                    {
                        $scope.todos=false;
                        $scope.asistir=false;                      
                        $scope.noasistir=true;
                        $scope.pendiente=false;
                    }

                    $scope.pendiente2=function()
                    {
                        $scope.todos=false;
                        $scope.asistir=false;                      
                        $scope.noasistir=false;
                        $scope.pendiente=true;
                    }

                    $scope.obtenerId=function(id)
                    {
                        console.log("holis: " + id);
                        $scope.id=id;
                    }

                    $scope.guardar=function()
                    {
                        $http.post('/guardar/' + $scope.id, $scope.detalleTratamiento).then
                        (
                            function(response)
                            {
                                console.log($scope.detalleTratamiento);
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
                                console.log($scope.detalleTratamiento);
                                swal("Error", "", "error");
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
            </script>
        @endsection
    @endsection   