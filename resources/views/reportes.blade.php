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
          /*Estilos tabs de las tablas*/
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
        
        </style>
        <div ng-controller="crtl">
          <div class="row">
            <div class="col m12">
              <ul class="tabs">
                <li class="tab col m3"><a  class="active" href="#test1">Medicamentos</a></li>
                <li class="tab col m3"><a href="#test2">Empleados</a></li>
                <li class="tab col m3"><a href="#test3">Pacientes</a></li>
                <li class="tab col m3"><a href="#test4">Proveedores</a></li>
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
                                <a class="waves-effect waves-light btn red darken-3" href="{{route('reportesmedicamentos')}}"  target="_blank"><i class="material-icons left">cloud_download</i> Descargar</a>
                          </div>
                      </div>
                  </div>
              </div>
    
              <div class="card">
                <div class="row mrg">
                  <table class="striped">
                      <thead>
                      <tr>
                          <th>Nombre medicamento</th>
                          <th>Descripcion</th>
                          <th>Cantidad por unidad</th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr ng-pagination="medicamento in medicamentos" ng-pagination-size="5">
                              <td scope="col">@{{medicamento.nombre}}</td>
                              <td scope="col">@{{medicamento.descripcion}}</td>
                              <td >@{{medicamento.cantidad}}</td>
                          </tr>
                      </tbody>
                  </table>
                  <br>
                  <ng-pagination-control pagination-id="medicamentos"></ng-pagination-control>
                </div>
              </div>
              
            </div>
            
            <div id="test2" class="col m12">
              <div class="card">
                  <div class="row mrg2">
                      <div class="col m8">
                          <div class="input-field col m12">
                              <i class="material-icons prefix">search</i>
                              <input id="busEmpleado" name="buscarEmpleado" type="text" ng-pagination-search="empleados">
                              <label for="busEmpleado">Medicamento</label> 
                          </div>
                      </div>
                      <div class="col m4">
                          <div class="input-field col m12">
                                <a class="waves-effect waves-light btn red darken-3" href="{{route('reportesempleados')}}"  target="_blank"><i class="material-icons left">cloud_download</i> Descargar</a>
                          </div>
                      </div>
                  </div>
              </div>
    
              <div class="card">
                <div class="row mrg">
                  <table class="striped">
                      <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>NSS</th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr ng-pagination="empleado in empleados" ng-pagination-size="5">
                              <td>@{{empleado.nombre}}</td>
                              <td>@{{empleado.apellido}}</td>
                              <td >@{{empleado.direccion}}</td>
                              <td >@{{empleado.telefono}}</td>
                              <td >@{{empleado.numero_seguro_social}}</td>
                          </tr>
                      </tbody>
                  </table>
                  <br>
                  <ng-pagination-control pagination-id="empleados"></ng-pagination-control>
                </div>
              </div>

            </div>

            <div id="test3" class="col m12">
              <div class="card">
                  <div class="row mrg2">
                      <div class="col m8">
                          <div class="input-field col m12">
                              <i class="material-icons prefix">search</i>
                              <input id="busPaciente" name="buscarPaciente" type="text" ng-pagination-search="pacientes">
                              <label for="busPaciente">Pacientes</label> 
                          </div>
                      </div>
                      <div class="col m4">
                          <div class="input-field col m12">
                                <a class="waves-effect waves-light btn red darken-3" href="{{route('reportespacientes')}}"  target="_blank"><i class="material-icons left">cloud_download</i> Descargar</a>
                          </div>
                      </div>
                  </div>
              </div>
    
              <div class="card">
                <div class="row mrg">
                  <table class="striped">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Fecha Nacimiento</th>
                          <th>Sexo</th>
                          <th>Dirección</th>
                          <th>Telefono</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr ng-pagination="paciente in pacientes" ng-pagination-size="5">
                              <td>@{{paciente.nombre}}</td>
                              <td>@{{paciente.fecha_nac}}</td>
                              <td >@{{paciente.sexo}}</td>
                              <td >@{{paciente.direccion}}</td>
                              <td >@{{paciente.telefono}}</td>
                          </tr>
                      </tbody>
                  </table>
                  <br>
                  <ng-pagination-control pagination-id="paciente"></ng-pagination-control>
                </div>
              </div>

            </div>
            <div id="test4" class="col m12">Test 4</div>
          </div>
        </div>
        @section('footer')
          @parent
          <script>
                $(document).ready(function(){
                    $('.tabs').tabs();
                });
          </script>
          <script type="text/javascript">
            var app=angular.module('app',['ngPagination']).config(function ($interpolateProvider) {
                    
            });
            app.controller('crtl',function($scope, $http, $filter)
            {
                $scope.medicamentos={};
                $scope.medicamentos= (<?php echo $medicamentos;?>);

                $scope.empleados = {};
                $scope.empleados = (<?php echo $empleados;?>);

                $scope.pacientes = {};
                $scope.pacientes = (<? echo $pacientes;?>);

            });
      
          </script>
  @endsection 
    @endsection