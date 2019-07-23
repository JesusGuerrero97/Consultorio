@extends('footer')
@extends('header')

    @section('header')
        @parent
         <div class="container">
            <h1>Pacientes</h1>
            <div class="row">
                <div class="input-field col s8">
                <i class="material-icons prefix">
                    search
                </i>   
                <input id="icon_prefix" placeholder="Buscar" type="text"> 
                </div>
                <div class="input-field col s4">
                    <a class="waves-effect waves-light btn" href="{{route('agregar')}}">Agregar</a>
                </div>
            </div>
            <table class="striped">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Fecha Nacimiento</th>
              <th>Sexo</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Editar</th>
              <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>Ayer</td>
            <td>Masculino</td>
            <td>Avenida siempre viva</td>
            <td>6695765</td>
            <th><button class="waves-effect yellow accent-4 btn modal-trigger" href="#modal1">
                <i class="material-icons">
								edit
			</i></th>
            <th><button class="waves-effect red accent-4 btn modal-trigger">
                <i class="material-icons">
								delete
								</i></th>
          </tr>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>Ayer</td>
            <td>Masculino</td>
            <td>Avenida siempre viva</td>
            <td>6695765</td>
            <th><button class="waves-effect yellow accent-4 btn modal-trigger">
                <i class="material-icons">
								edit
			</i></th>
            <th><button class="waves-effect red accent-4 btn modal-trigger">
                <i class="material-icons">
								delete
								</i></th>
          </tr>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>Ayer</td>
            <td>Masculino</td>
            <td>Avenida siempre viva</td>
            <td>6695765</td>
            <th><button class="waves-effect yellow accent-4 btn modal-trigger">
                <i class="material-icons">
								edit
			</i></th>
            <th><button class="waves-effect red accent-4 btn modal-trigger">
                <i class="material-icons">
								delete
								</i></th>
          </tr>
        </tbody>
      </table>
        </div>
        <!-- Empieza el modal -->
        <div id="modal1" class="modal">
            <div class="modal-content">
            <h4 class="brand-logo teal-text">Editar</h4>
            <div class="row">
            <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                <input id="Nombre" type="text" class="validate">
                <label for="Nombre">Nombre</label>
                </div>
                <div class="input-field col s6">
                <input id="Apellido" type="text" class="validate">
                <label for="Apellido">Apellido</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input id="Fecha" type="text" class="validate">
                <label for="Fecha">Fecha Nacimiento</label>
                </div>
                <div class="input-field col s6">
                <input id="Sexo" type="text" class="validate">
                <label for="Sexo">Sexo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input id="Direccion" type="text" class="validate">
                <label for="direccion">Direccion</label>
                </div>
                <div class="input-field col s6">
                <input id="telefono" type="text" class="validate">
                <label for="telefono">Telefono</label>
                </div>
            </div>

            </div>

            <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
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
               













