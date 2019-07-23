@extends('header')
@extends('footer')

@section('header')
    @parent    
    <h1 class="center">Contacto</h1>

    <div class="container">
    <table>
		<tr>
			<th>Nombre</th>
			<th>Teléfono</th>
			<th>Correo</th>
			<th>Opciones</th>
		</tr>
		<tr>
			<td>Saul Pérez</td>
			<td>992387461</td>
			<td>sperez@gmail.com</td>
			<td><a class="waves-effect waves-light btn red">Eliminar</a></td>
		</tr>
		<tr>
			<td>Steve rogers</td>
			<td>9301928436</td>
			<td>srogers@gmail.com</td>
			<td><a class="waves-effect waves-light btn red">Eliminar</a></td>
		</tr>
		<tr>
			<td>Bruce Banner</td>
			<td>6643789201</td>
			<td>bbanner@gmail.com</td>
			<td><a class="waves-effect waves-light btn red">Eliminar</a></td>
		</tr>
		</tr>
    </table>
    
    <!-- Modal Trigger -->
    <div class="input-field">
    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Agregar nuevo contacto</a>
    </div>
    

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class=container>
            <h4 class="black-text">Agregar contacto</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input id="nombre" type="text" class="validate">
                    <label for="nombre">Nombre del contacto</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col s6">
                    <input id="telefono" type="number" class="validate">
                    <label for="telefono">Teléfono</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input id="correo" type="text" class="validate">
                    <label for="correo">Correo</label>
                </div>
            </div>

        </div>
            </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agregar Contacto</a>
        </div>
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