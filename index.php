<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embotelladora Thomsom</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
<div class="row">
  <div class="col s12 m8 l4 offset-m2 offset-l4">
    <form action="assets/php/iniciosesion.php">

    
    <div class="card">

      <div class="card-action deep-orange lighten-2 white-text">
        <h3 class='center-align'>Inicio Sesion</h3>
      </div>

      <div class="card-content">
        <div class="input-field ">
            <input type="text" id="usuario">
          <label for="usuario">Usuario</label>
        </div><br>

        <div class="input-field">
            <input type="password" id="contrasena">
            <label for="contrasena">Contraseña</label>
        </div><br>

        <div class="input-field">
          <button type='button' onclick="inicio()" class="btn-large deep-orange lighten-2 waves-effect waves-dark" style="width:100%;">Iniciar Sesion</button>
        </div><br>
      </div>
      </form>
    </div>
    <h4 id="resultado"></h4>

  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="assets/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, );
  });</script>

</div>
</body>
</html>