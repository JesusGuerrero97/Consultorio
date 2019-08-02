@extends('header')
@extends('footer')

@section('header')
	@parent
	<div class="card">
		<div class="row mrg2">
			<div class="input-field col m9">
	            <i class="material-icons prefix">search</i>
	            <input id="busMEmpresa" type="text" class="validate">
	            <label for="busEmpresa">Empresa</label>
            </div>
            <div class="input-field col m3">
            <button class="waves-effect waves-light btn modal-trigger" data-target="agProveedor">Agregar medicamentos</button>
            <!-- Modal Structure -->
            <form action="">
                <div id="agProveedor" class="modal">
                    <div class="modal-content">
                        <h4 class="black-text center">PROVEEDOR</h4>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nomMedicamento" type="text" class="validate">
                                <label for="nomMedicamento">Nombre de la empresa</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="dirEmpresa" type="text" class="validate">
                                <label for="dirEmpresa">Dirección de la empresa</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="telefono" type="number" class="validate">
                                <label for="telefono">Teléfono</label>
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
		<table>
		<tr>
			<th>Empresa</th>
			<th>Dirección</th>
			<th>Telefono</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
		@foreach ($proveedores as $proveedor)
               <tr ng-click="seleccionar($index)">
                    <td><?= $proveedor->empresa ?></td>
                    <td><?= $proveedor->direccion ?></td>
                    <td><?= $proveedor->telefono ?></td>
                    <td><button class="waves-effect amber accent-3 btn modal-trigger"  href="#modalEditarMaterial"><i class="material-icons">edit</i></button></td>
	            	<td><button class="waves-effect red accent-4 btn modal-trigger">
	                <i class="material-icons">delete</i></td>
               </tr>
            @endforeach()
	</table>
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