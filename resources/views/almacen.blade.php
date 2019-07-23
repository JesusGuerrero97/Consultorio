@extends('footer')
@extends('header')

    @section('header')
        @parent
        <div class="container">
        			<h3>Almacén</h3>
	         	
	         <div class="row">
	         		<div class="input-field col s8">
	         			<i class="material-icons prefix">search</i>
	         			<input placeholder="Buscar material" id="icon_prefix">
	         		</div>
	         		<div class="input-field col s4">
	         			<a class="waves-effect waves-light btn-small modal-trigger" href="#modalAgregarMaterial"><i class="material-icons right">add</i>Agregar</a>
	         		</div>
	         </div>
	         		
	      
	         	 <table>
			        <thead>
			          	<tr>
			            	<th>Id_material</th>
			              	<th>Descripción</th>
			              	<th>Stock</th>
			              	<th>Proveedor</th>
			              	<th>Editar</th>
			              	<th>Eliminar</th>
			          	</tr>
			        </thead>

			        <tbody>
			          	<tr>
			            	<td>20015</td>
			              	<td>Pasta</td>
			              	<td>20</td>
			              	<td>C.Gutierrez</td>
			              	<td><button class="waves-effect amber accent-3 btn modal-trigger"  href="#modalEditarMaterial"><i class="material-icons">edit</i></button></td>
			              	<td><button class="waves-effect red darken-4 btn modal-trigger" href="#modalEliminarMaterial"><i class="material-icons">delete</i></button></td>
			          	</tr>
			          	<tr>
			            	<td>30128</td>
			              	<td>Polvo</td>
			              	<td>25</td>
			              	<td>C.Gutierrez</td>
			              	<td><button class="waves-effect amber accent-3 btn modal-trigger"><i class="material-icons">edit</i></button></td>
			              	<td><button class="waves-effect red darken-4 btn modal-trigger"><i class="material-icons">delete</i></button></td>
			          	</tr>
			          	<tr>
			            	<td>21111</td>
			              	<td>Ligas</td>
			              	<td>6</td>
			              	<td>H.Lopez</td>
			              	<td><button class="waves-effect amber accent-3 btn modal-trigger"><i class="material-icons">edit</i></button></td>
			              	<td><button class="waves-effect red darken-4 btn modal-trigger"><i class="material-icons">delete</i></button></td>
			          	</tr>
			        </tbody>
			    </table>    
	    </div>

	    <!-- Modal Agregar -->
	    <div id="modalAgregarMaterial" class="modal">
		    <div class="modal-content">
		      <h4 class="brand-logo teal-text">Agregar material</h4>
		      <div class="row">
			    <form class="col s12">
			      <div class="row">
			        <div class="input-field col s12">
			          <input placeholder="Descripción" type="text">
			          <label >Descripción</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input placeholder="Nombre del proveedor" type="text">
			          <label >Nombre del proveedor</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input placeholder="Stock" type="text">
			          <label >Stock</label>
			        </div>
			      </div>
			    </form>
			  </div>
		    </div>
		    <div class="modal-footer">
		      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
		      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
		    </div>
	  	</div>

	  	<!-- Modal Editar -->
	    <div id="modalEditarMaterial" class="modal">
		    <div class="modal-content">
		      <h4 class="brand-logo teal-text">Editar material</h4>
		      <div class="row">
			    <form class="col s12">
			      <div class="row">
			        <div class="input-field col s12">
			          <input placeholder="Descripción" type="text">
			          <label >Descripción</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input placeholder="Nombre del proveedor" type="text">
			          <label >Nombre del proveedor</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input placeholder="Stock" type="text">
			          <label >Stock</label>
			        </div>
			      </div>
			    </form>
			  </div>
		    </div>
		    <div class="modal-footer">
		      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
		      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
		    </div>
	  	</div>

	  	<!-- Modal Eliminar -->
	    <div id="modalEliminarMaterial" class="modal">
		    <div class="modal-content">
		      <p class="brand-logo">¿Está seguro que desea eliminar este registro?</p>
		      
		    </div>
		    <div class="modal-footer">
		      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sí</a>
		      <a href="#!" class="modal-close waves-effect waves-green btn-flat">No</a>
		    </div>
	  	</div>
        @section('footer')
            @parent
            <script>
            	$(document).ready(function(){
    				$('.modal').modal();
  				});
            </script>

            
        @endsection
    @endsection   
               

    

