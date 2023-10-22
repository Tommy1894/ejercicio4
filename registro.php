<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embotelladora Thomsom</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
    <nav id="bloc" class="nav-wrapper deep-orange lighten-2">
        <div class="container">
            <div>
                <a class="brand-logo center">Embotelladora Thomsom</a>
            </div>
        </div>
    </nav>
    <h4 class="card-panel teal lighten-5 black-text center">Directorio de Carpetas</h4><br>
    <form class="col s12"> 
        <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="Cedula" name="txtCedula"><br>
                    <label for="Cedula">Cedula</label><br>
                    
                </div>
                <div class="input-field col s6">
                    <input type="text" id="Cant" name="txtCant"><br>
                    <label for="Cant">Cantidad de Botellas</label><br>
                    
                </div>
        </div>
        <div class='row'>
            <div class="input-field col s12">
                <label for="Dir">Direccion</label><br>
                <select name="txtDir" id="Dir">
                    <option value="Maracaibo">Maracaibo</option>
                    <option value="San Francisco">San Francisco</option>
                    <option value="Ciudad Ojeda">Ciudad Ojeda</option>
                    <option value="Cabimas">Cabimas</option>
                </select><br>
            </div>
        </div>
        <button type="button" id='btn-reg-bot' class="btn waves-effect waves-light" onclick="registrar_reg()">Registrar</button>
    </form>
    <a href="index.php"><button class="btn waves-effect waves-light">Cerrar Sesion</button></a>
    <div id="resultado"></div>
</body>
<footer class="page-footer deep-orange lighten-2">
        <div class="footer-copyright">
            <div class="container">
                <p>Copyright © 2023</p>
            </div>
        </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>
</html>