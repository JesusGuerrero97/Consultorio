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
			<div class="card">
            <div class="row mrg2">
                <div class="input-field col m9">
                    <i class="material-icons prefix">search</i>
                    <input id="busMedicamento" type="text" class="validate">
                    <label for="busMedicamento">Empleado</label> 
                </div>
                <div class="input-field col m3">
                    <button class="waves-effect waves-light btn modal-trigger" data-target="agMedicamento">Agregar empleados</button>
                    <!-- Modal Structure -->
                    <form action="">
                        <div id="agMedicamento" class="modal">
                            <div class="modal-content">
                                <h4 class="black-text center">Medicamento</h4>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="nomMedicamento" type="text" class="validate">
                                        <label for="nomMedicamento">Nombre del medicamento</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="descMedicamento" type="text" class="validate">
                                        <label for="descMedicamento">Descripción del medicamento</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="dosis" type="text" class="validate">
                                        <label for="dosis">Dosis del medicamento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agregar</a>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
            </div>
	        <div class="card">
	        	<div class="row mrg">
			        <div class="col m12">
				        <table class="striped">
							<thead>
								<tr>
						      		<th scope="col">Nombre</th>
									<th scope="col">Apellidos</th>
									<th scope="col">Número seguro social</th>
									<th scope="col">Fecha nacimiento</th>
									<th scope="col">Domicilio</th>
									<th scope="col">Telefono</th>
									<th scope="col">Fecha Ingresado</th>
									<th scope="col">Editar</th>
									<th scope="col">Desabilitar</th>
						    	</tr>
						  	</thead>
						  	<tbody>
					    	    <tr id="[[$index]]" ng-repeat="persona in DatosDePersona | filter:buscarPersona as resultPersona">
						    	    <td scope="col">Jose Alfredo</td>
						    	    <td scope="col">vizcarra valdes</td>
									<td scope="col">VIVA90298HSLZLL01</td>
									<td scope="col">09/02/1998</td>
									<td scope="col">Vicente Guerrero</td>
									<td scope="col">6692753148</td>
									<td scope="col">29/06/2019</td>
									<td><li class="waves-effect"><a href="#idModal" class="modal-trigger"><i class="small material-icons">edit</i></a></li></td>
									<td><div class="switch">    <label>            <input type="checkbox">      <span class="lever"></span>          </label>  </div></td>
					      		</tr>
						     </tbody>
						</table>
					</div>
				</div>
			</div>
			<div id="idModal" class="modal">
				<div class="modal-content">
					<div class="row">
					    <form class="col s12">
					      <div class="row">
					        <div class="input-field col s6">
					          <input placeholder="Nombre" id="first_name" type="text" class="validate">
					          <label for="Nombre">Nombre</label>
					        </div>
					        <div class="input-field col s6">
					          <input placeholder="Apellidos" id="first_name" type="text" class="validate">
					          <label for="Nombre">Apellidos</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s6">
					          <input placeholder="Direccion" id="first_name" type="text" class="validate">
					          <label for="first_name">Direccion</label>
					        </div>
					        <div class="input-field col s6">
					          <input placeholder="Telefono" id="first_name" type="text" class="validate">
					          <label for="Nombre">Telefono</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s6">
					          <input placeholder="Numero de seguro social" id="first_name" type="text" class="validate">
					          <label for="first_name">Numero de seguro social</label>
					        </div>
					        <div class="input-field col s6">
					          <input placeholder="Fecha de nacimiento" id="first_name" type="text" class="validate">
					          <label for="first_name">Fecha de nacimiento</label>
					        </div>
					      </div>
					    </form>
				  	</div>
				</div>
				<div class="modal-footer">
					<button class="btn modal-close red" data-tarjet="#idModal">Cancelar</button>
					<button class="btn modal-close blue" data-tarjet="#idModal">Guardar</button>
				</div>
			</div>
		</div>
        @section('footer')
            @parent
            <script type="text/javascript">
            	document.addEventListener('DOMContentLoaded', function() 
            	{
			    	var elems = document.querySelectorAll('.modal');
			    	var instances = M.Modal.init(elems);
			  	});
            </script>
        @endsection
    @endsection   