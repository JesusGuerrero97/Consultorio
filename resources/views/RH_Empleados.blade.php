@extends('footer')
@extends('header')

    @section('header')
        @parent
        <div style="height: 80px">
         	<h2 style="text-align: center;">Empleados</h2>
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
        <table class="highlight">
				<thead>
					<tr>
			      		<th scope="col">Nombre</th>
						<th scope="col">Apellidos</th>
						<th scope="col">Número seguro social</th>
						<th scope="col">Fecha nacimiento</th>
						<th scope="col">Domicilio</th>
						<th scope="col">Telefono</th>
						<th scope="col">Fecha Ingresado</th>
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
						<td><i class="small material-icons">delete</i></td>
						<td><li class="waves-effect"><a href="#idModal" class="modal-trigger"><i class="small material-icons">add</i></a></li></td>
		      		</tr>
		      		<tr id="[[$index]]" ng-repeat="persona in DatosDePersona | filter:buscarPersona as resultPersona">
			    	    <td scope="col">Jose Alfredo</td>
			    	    <td scope="col">vizcarra valdes</td>
						<td scope="col">VIVA90298HSLZLL01</td>
						<td scope="col">09/02/1998</td>
						<td scope="col">Vicente Guerrero</td>
						<td scope="col">6692753148</td>
						<td scope="col">29/06/2019</td>
						<td><i class="small material-icons">delete</i></td>
						<td><li class="waves-effect"><a href="#idModal" class="modal-trigger"><i class="small material-icons">add</i></a></li></td>
		      		</tr>
		      		<tr id="[[$index]]" ng-repeat="persona in DatosDePersona | filter:buscarPersona as resultPersona">
			    	    <td scope="col">Jose Alfredo</td>
			    	    <td scope="col">vizcarra valdes</td>
						<td scope="col">VIVA90298HSLZLL01</td>
						<td scope="col">09/02/1998</td>
						<td scope="col">Vicente Guerrero</td>
						<td scope="col">6692753148</td>
						<td scope="col">29/06/2019</td>
						<td><i class="small material-icons">delete</i></td>
						<td><li class="waves-effect"><a href="#idModal" class="modal-trigger"><i class="small material-icons">add</i></a></li></td>
		      		</tr>
			     </tbody>
			</table>
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