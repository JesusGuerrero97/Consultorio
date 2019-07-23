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
                    <div class="input-field col m6">
                        <i class="material-icons prefix">search</i>
                        <input id="busMedicamento" type="text" class="validate">
                        <label for="busMedicamento">Medicamento</label> 
                    </div>
                    <div class="input-field col m6">
                        <button class="waves-effect waves-light btn modal-trigger" data-target="agMedicamento">Agregar medicamentos</button>
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
                    <div class="col m12">
                        <table class="striped">
                            <thead>
                            <tr>
                                <th>Nombre medicamento</th>
                                <th>Descripcion</th>
                                <th>Dosis</th>
                                <th>Editar</th>
                                <th>Deshabilitar</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Paracetamol</td>
                                <td>Pastillas para el dolor</td>
                                <td>1 cada 6 hrs</td>
                                <td><button class="waves-effect amber accent-3 btn modal-trigger"  href="#modalEditarMaterial"><i class="material-icons">edit</i></button></td>
                                <td><div class="switch">    <label>            <input type="checkbox">      <span class="lever"></span>          </label>  </div></td>
                            </tr>
                            <tr>
                                <td>Genoprazol</td>
                                <td>Para la gastritis</td>
                                <td>1 cada 8 hrs</td>
                                <td><button class="waves-effect amber accent-3 btn modal-trigger"  href="#modalEditarMaterial"><i class="material-icons">edit</i></button></td>
                                <td><div class="switch">    <label>            <input type="checkbox">      <span class="lever"></span>          </label>  </div></td>
                            </tr>
                            <tr>
                                <td>Prueba</td>
                                <td>Prueba</td>
                                <td>Prueba</td>
                                <td><button class="waves-effect amber accent-3 btn modal-trigger"  href="#modalEditarMaterial"><i class="material-icons">edit</i></button></td>
                                <td><div class="switch">    <label>            <input type="checkbox">      <span class="lever"></span>          </label>  </div></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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