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
        <div ng-controller= "ctrl" <?php if (isset($id)) {
      echo 'ng-init="mandar('.$id.')"';
    }?>>
        <div class="crd card white mrg">
            <div class="row">
            <form class="col m12">
                    <div class="row">
                        <div class="input-field col m6">
                        <input id="Nombre" type="text" class="validate" placeholder="Nombre" ng-model="paciente.nombre">
                        <label for="Nombre">Nombre</label>
                        </div>
                        <div class="input-field col m6">
                        <input id="Apellido" type="text" class="validate" placeholder="Apellidos" ng-model="paciente.apellido">
                        <label for="Apellido">Apellido</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                        <input id="Fecha" type="date" class="validate" placeholder="Fecha de nacimiento" ng-model="paciente.fechaNac" ng-change="fin()">
                        <label for="Fecha">Fecha Nacimiento</label>
                        </div>
                        <div class="input-field col m6">
                        <input type="text" class="validate" placeholder="Sexo" ng-model="paciente.sexo">
                        <label for="Sexo">Sexo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                        <input id="Direccion" type="text" class="validate" placeholder="Direccion" ng-model="paciente.direccion">
                        <label for="direccion">Direccion</label>
                        </div>
                        <div class="input-field col m6">
                        <input id="telefono" type="text" class="validate" placeholder="Telefono" ng-model="paciente.telefono">
                        <label for="telefono">Telefono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col 12">
                        <a href="#!" class="waves-effect waves-light btn" ng-click="editar()" ng-if="paciente.id!=null">Editar</a>
                        <a class="waves-effect waves-light btn" ng-click="enviar()" ng-if="paciente.id==null">Guardar</a>
                        <a class="waves-effect waves-light btn red" href="{{route('pacientes')}}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
            
        </div>
        </div>
        @section('footer')
            @parent
            <script>
            var app=angular.module('app',[]);
            app.controller('ctrl',function($scope,$http){
                var date = new Date();
                $scope.fin=function(){
                    var dia= date.getDate();
                    var mes= date.getMonth() + 1;
                    var year= date.getFullYear();
                    var fecha_actual= String(year+"-"+mes+"-"+dia);
                    console.log(fecha_actual);
                    var dia2 = $scope.paciente.fechaNac.getDate();
                    var mes2 = $scope.paciente.fechaNac.getMonth() + 1;
                    var year2 = $scope.paciente.fechaNac.getFullYear();
                    var fecha_paciente=String(year2+"-"+mes2+"-"+dia2);
                    $scope.paciente.fechaNac = fecha_paciente;
					var actual = new Date(fecha_actual).getTime();
					var fechaFin    = new Date($scope.paciente.fechaNac).getTime();
					var diff = actual - fechaFin;
					var dias = diff/(1000*60*60*24) ;
					console.log(dias);
	            }
            $scope.paciente={};
            $scope.enviar=function(){
                if($scope.paciente.nombre != "" && $scope.paciente.apellido != ""
                && $scope.paciente.fechaNac != "" && $scope.paciente.sexo != null
                && $scope.paciente.direccion != null && $scope.paciente.telefono != null)
                {
                console.log($scope.paciente);
                $http.post('/guardarPac',$scope.paciente).then(
                    function(response){
                        console.log(response);
                        if(response.data == 0){
                                    alert("Cantidad debe ser mas que disponibilidad");
                        }
                        if(response.data == 1){
                                alert("agregado con exito");
                                window.location = "pacientes";
                        }
                    },
                    function(erroResponse){
                    }	
                );
            }
            else{
                alert("complete los campos");
            }
                //window.location = "autos";
                //$scope.auto={};
            }
            $scope.mandar=function(id){
                        $scope.id = id;
                        console.log($scope.id);
                        $http.post('/mandarPac',$scope.id).then(
                            function(response){
                                console.log(response.data);
                                $scope.paciente = response.data;
                                console.log($scope.paciente);
                                reverseFormat($scope.paciente.fechaNac);
                            },
                            function(erroResponse){
                                
                            }
                        );
                    }
                    function reverseFormat(date) {
                    var d = new Date(date),
                        month = '' + (d.getMonth()+1),
                        day = '' + (d.getDate()+1),
                        year = d.getFullYear();
                    
                    if (month.length < 2) month = '0' + month;
                    if (day.length < 2) day = '0' + day;
                    var fecha = year+"-"+day+"-"+month;
                    var newdate = fecha.split("-").reverse().join("-");
                    console.log(newdate);
                    $scope.paciente.fechaNac = new Date(newdate);
                }
                $scope.editar=function(){
							console.log($scope.paciente);
                            var dia= date.getDate();
                            var mes= date.getMonth() + 1;
                            var year= date.getFullYear();
                            var fecha_actual= String(year+"-"+mes+"-"+dia);
                            console.log(fecha_actual);
                            var dia2 = $scope.paciente.fechaNac.getDate();
                            var mes2 = $scope.paciente.fechaNac.getMonth() + 1;
                            var year2 = $scope.paciente.fechaNac.getFullYear();
                            var fecha_paciente=String(year2+"-"+mes2+"-"+dia2);
                            $scope.paciente.fechaNac = fecha_paciente;
                            var actual = new Date(fecha_actual).getTime();
                            var fechaFin    = new Date($scope.paciente.fechaNac).getTime();
                            var diff = actual - fechaFin;
                            var dias = diff/(1000*60*60*24) ;
                            console.log(dias);
							$http.post('/editarPac',$scope.paciente).then(
							function(response){
								console.log(response);
								if(response.data == 0){
											alert("hubo un error");
								}
								if(response.data == 1){
										alert("editado con exito con exito");
										window.location.href = 'http://127.0.0.1:8000/pacientes';
									}
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
               