@extends('footer')
@extends('header')

    @section('header')
        @parent
        <div class="container">
         <h3>Agregar Paciente</h3>
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
            <div class="row">

                <div class="input-field col s6">
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ttratamiento</a>
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Historial Medico</a>
                </div>
            </div>
            <div class="row">
                <div class="input-field col 12">
                <a class="waves-effect waves-light btn" href="{{route('agregar')}}">Guardar</a>
                <a class="waves-effect waves-light btn" href="{{route('agregar')}}">Cancelar</a>
            </div>
        </div>
        <!-- Empieza el modal -->
        <div id="modal1" class="modal">
            <div class="modal-content">
            <h4 class="brand-logo teal-text">Tratamiento</h4>
            <div class="row">
                <form class="col s12">
                <div class="input-field col s12">
                    <div class="row">
                        <div class="input-field col s6">
                        <select>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">Tipo 1</option>
                        <option value="2">Tipo 2</option>
                        <option value="3">Tipo 3</option>
                        </select>
                        <label>Tipo</label>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                    <input placeholder="$" id="Pago" type="text" class="validate">
                    <label for="Pago">Pago Inicial</label>
                    </div>
                    <div class="input-field col s6">
                    <input placeholder="$" id="presupuesto" type="text" class="validate">
                    <label for="presu">Presupuesto Total</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                    <input placeholder="$" id="citas" type="text" class="validate">
                    <label for="citas">Citas Subsecuentes</label>
                    </div>
                    <div class="input-field col s6">
                    <input placeholder="#" id="meses" type="text" class="validate">
                    <label for="meses">Total de meses</label>
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
                $(document).ready(function(){
                $('select').formSelect();
  });
            </script>
        @endsection
    @endsection   
               