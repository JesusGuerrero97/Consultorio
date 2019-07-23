@extends('header')
@extends('footer')

@section('header')
	@parent
	<div class="container">
	<h1>Proveedores</h1>
    <table>
		<tr>
			<th>Empresa</th>
			<th>Dirección</th>
			<th>Telefono</th>
			<th>Opciones</th>
		</tr>
		<tr>
			<td>Farmacia Moderna</td>
			<td>Guadalajara</td>
			<td>9182734</td>
			<td><a class="waves-effect waves-light btn">Eliminar</a></td>
		</tr>
		<tr>
			<td>Farmacia Guadalajara</td>
			<td>Durango</td>
			<td>4873950</td>
			<td><a class="waves-effect waves-light btn">Eliminar</a></td>
		</tr>
		<tr>
			<td>Farmacias del ahorro</td>
			<td>Monterrey</td>
			<td>7654391</td>
			<td><a class="waves-effect waves-light btn">Eliminar</a></td>
		</tr>
		</tr>
	</table>
	<!-- Modal Trigger -->
	<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Agregar un Proveedor</a>
	</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
        <div class="modal-content">
            <div class=container>
            <h4>Agregar contacto</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input id="empresa" type="text" class="validate">
                    <label for="empresa">Nombre de la empresa</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col s12">
                    <input id="direccion" type="number" class="validate">
                    <label for="direccion">Dirección</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input id="telefono" type="number" class="validate">
                    <label for="telefono">Telefono</label>
                </div>
            </div>

        </div>
            </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agregar Contacto</a>
        </div>
    </div>
    @section('footer')
	@parent

  @endsection 
    @endsection