@extends('footer')
@extends('header')

    @section('header')
        @parent
        <div style="height: 80px">
         	<h2 style="text-align: center;">Usuarios</h2>
         </div>
		 <div class="container">
		 <div class="input-field col s9"><i class="material-icons left">search
          <input placeholder="Buscar" id="buscar" type="text" class="validate">
          </i>
        </div>
        <div class="input-field col s3">
			<a href="#idModal" style="text-align: right;" class="btn modal-trigger green"><i class="material-icons left">add</i>Agregar</a>
        </div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <div class="container">
        	<div class="row">
	        <table>
					<thead>
						<tr>
				      		<th scope="col">Usuario</th>
							<th scope="col">Contraseña</th>
							<th scope="col">Estatus</th>
							<th scope="col">Fecha</th>
							<th>Opciones</th>
				    	</tr>
				  	</thead>
				  	<tbody>
			    	    <tr id="[[$index]]" ng-repeat="persona in DatosDePersona | filter:buscarPersona as resultPersona">
				    	    <td scope="col">Viz98</td>
				    	    <td scope="col">********</td>
							<td scope="col">Activo</td>
							<td scope="col">28/06/2019</td>
							<td><i class="small material-icons">delete</i></td>
							<td><li class="waves-effect"><a href="#idModal" class="modal-trigger"><i class="small material-icons">add</i></a></li></td>
			      		</tr>
			      		<tr id="[[$index]]" ng-repeat="persona in DatosDePersona | filter:buscarPersona as resultPersona">
				    	    <td scope="col">Viz98</td>
				    	    <td scope="col">********</td>
							<td scope="col">Activo</td>
							<td scope="col">28/06/2019</td>
							<td><i class="small material-icons">delete</i></td>
							<td><li class="waves-effect"><a href="#idModal" class="modal-trigger"><i class="small material-icons">add</i></a></li></td>
			      		</tr>
			      		<tr id="[[$index]]" ng-repeat="persona in DatosDePersona | filter:buscarPersona as resultPersona">
				    	    <td scope="col">Viz98</td>
				    	    <td scope="col">********</td>
							<td scope="col">Activo</td>
							<td scope="col">28/06/2019</td>
							<td><i class="small material-icons">delete</i></td>
							<td><li class="waves-effect"><a href="#idModal" class="modal-trigger"><i class="small material-icons">add</i></a></li></td>
			      		</tr>
				     </tbody>
				</table>
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