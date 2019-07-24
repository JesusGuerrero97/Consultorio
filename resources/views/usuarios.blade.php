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
                        <label for="busMedicamento">Usuarios</label> 
                    </div>
                    <div class="input-field col m3">
                        <button class="waves-effect waves-light btn modal-trigger" data-target="agMedicamento">Agregar Usuarios</button>
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
			        <table>
						<thead>
							<tr>
					      		<th scope="col">Usuario</th>
								<th scope="col">Contraseña</th>
								<th scope="col">Estatus</th>
								<th scope="col">Fecha</th>
								<th scope="col">Editar</th>
								<th scope="col">Desabilitar</th>
					    	</tr>
					  	</thead>
					  	<tbody>
				    	    <tr id="[[$index]]" ng-repeat="persona in DatosDePersona | filter:buscarPersona as resultPersona">
					    	    <td scope="col">Viz98</td>
					    	    <td scope="col">********</td>
								<td scope="col">Activo</td>
								<td scope="col">28/06/2019</td>
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
					          <input placeholder="Usuario" id="first_name" type="text" class="validate">
					          <label for="first_name">Usuario</label>
					        </div>
					        <div class="input-field col s6">
					          <input placeholder="Contraseña" id="first_name" type="text" class="validate">
					          <label for="first_name">Contraseña</label>
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