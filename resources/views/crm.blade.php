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
                <label for="busMedicamento">Paciente</label> 
            </div>
        </div>
    </div>
    <div class="card">
        <div class="row mrg">
            <div class="col m12">
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Observaciones</th>
                            <th>Telefono</th>
                            <th>Enviar correo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="[[$index]]" ng-repeat="persona in DatosDePersona | filter:buscarPersona as resultPersona">
                            <td>Jose Alfredo</td>
                            <td>vizcarra valdes</td>
                            <td>VIVA90298HSLZLL01</td>
                            <td>09/02/1998</td>
                            <td><button class="waves-effect blue accent-3 btn modal-trigger"  href=""><i class="material-icons">send</i></button></td>
                            <td>
                                    <select>
                                      <option value="" disabled selected>Seleccione una opción</option>
                                      <option value="1">Asistira</option>
                                      <option value="2">No asistira</option>
                                      <option value="3">Pendiente</option>
                                    </select>
                            </td>
                        </tr>
                     </tbody>
                </table>
            </div>
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
                document.addEventListener('DOMContentLoaded', function() 
                {
                    var elems = document.querySelectorAll('select');
                    var instances = M.FormSelect.init(elems);
                });
            </script>
        @endsection
    @endsection   