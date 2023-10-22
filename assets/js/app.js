function registrar_reg(){
    console.log('holi');
    var cedula = document.getElementById('Cedula').value;
    var cantidad = document.getElementById('Cant').value;
    var direccion = document.getElementById('Dir').value;
    var datos = {
    "cedula": cedula,
    "cantidad": cantidad,
    "direccion": direccion
    };
    $.ajax({
    url: "assets/php/agregarregistro.php",
    type: "post",
    data: datos,
    // beforeSend: function() {
    // $("#resultado").html("Procesando, espere por favor...");
    // },
    success: function(response) {
    $("#resultado").html("El área del triángulo es: " +
    response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#resultado").html("Error al realizar el cálculo");
    }
    });
}

function registrar_clie(){
    console.log('holi');
    var cedula = document.getElementById('Cedula').value;
    var nombre = document.getElementById('Nombre').value;
    var apellido = document.getElementById('Apellido').value;
    var sexo = document.getElementById('Sexo').value;
    var datos = {
    "cedula": cedula,
    "nombre": nombre,
    "apellido": apellido,
    "sexo": sexo
    };
    $.ajax({
    url: "assets/php/agregarcliente.php",
    type: "post",
    data: datos,
    // beforeSend: function() {
    // $("#resultado").html("Procesando, espere por favor...");
    // },
    success: function(response) {
    $("#resultado").html("El área del triángulo es: " +
    response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#resultado").html("Error al realizar el cálculo");
    }
    });
}

function inicio(){
    console.log('holi');
    var usuario = document.getElementById('usuario').value;
    var contrasena = document.getElementById('contrasena').value;

    var datos = {
    "usuario": usuario,
    "contrasena": contrasena
    };
    $.ajax({
    url: "assets/php/iniciosesion.php",
    type: "post",
    data: datos,
    // beforeSend: function() {
    // $("#resultado").html("Procesando, espere por favor...");
    // },
    success: function(response) {
        console.log(response);
        if(response=='listo'){
            location.replace("inicio.php");
        }
        else{
            $("#resultado").html("Error, intente de nuevo");
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#resultado").html("Error al realizar el cálculo");
    }
    });
}