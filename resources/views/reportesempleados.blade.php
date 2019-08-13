<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Reporte Generado</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    <style>
      table {  border-collapse: collapse; }
      footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: transparent !important; height: 50px; color:black !important;}
      td,th{border: 1px  solid black !important;}
      tr{height:50px !important;}
    </style>
</head>
<body>

    <p class="right-align">Mazatlan Sinaloa 13 de Octubre del 2019.</p>
    <br>
    <br>
    <h3 class="center-align">Reporte de Medicamentos</h3>
    <br>
    <br>
    <div class="container">
    
    <table class="striped">
        <thead class="blue-grey">
          <tr>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>NSS</th>
              <th>Estatus</th>
          </tr>
        </thead>

        <tbody>
        @foreach($data as $datos)
          <tr>
            <td>{!! $datos->nombre!!}</td>
            <td>{!! $datos->apellido !!}</td>          
            <td>{!! $datos->direccion !!}</td>
            <td>{!! $datos->telefono !!}</td>
            <td>{!! $datos->numero_seguro_social !!}</td>
            <td>@if($datos->status == 1)
                {{'Habilitado'}}
                @elseif($datos->status == 0)
                {{'Deshabilitado'}}
                @endif
            </td>
          </tr>
				@endforeach
        </tbody>
      </table>
      <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container center-align">
            © 2019 Ortodoncia Zamora. Todos los derechos reservados.
            </div>
          </div>
        </footer> 
    </div>
    
</body>
</html>