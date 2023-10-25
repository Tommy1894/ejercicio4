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
    if (cedula === "" || cantidad === "" || direccion === ""){
        alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{

        $.ajax({
        url: "assets/php/agregarregistro.php",
        type: "post",
        data: datos,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
        $("#resultado").html("Se registro la compra correctamente");
        listarregistro();
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
    }
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
    if (cedula === "" || nombre === "" || apellido === "" || sexo === ""){
        alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{
        $.ajax({
        url: "assets/php/agregarcliente.php",
        type: "post",
        data: datos,
        // beforeSend: function() {
            // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            console.log(response);
            if(response=="listo"){
                $("#resultado").html("Se registro el cliente correctamente");
                listarcliente();
            }
            else{
                $("#resultado").html("El cliente ya existe");
            }
    },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            $("#resultado").html("Error al realizar el cálculo");
        }
    });

    }
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

function listarregistro(){
    $.ajax({
        url: 'assets/php/listaregistro.php',
        type: 'GET',
        success: function(response) {
          const registros = JSON.parse(response);
          let template = '';
          registros.forEach(registro => {
            template += `
                    <tr>
                    <td>${registro.id}</td>
                    <td>${registro.cedula}</td>
                    <td>${registro.nombre}</td>
                    <td>${registro.apellido}</td>
                    <td>${registro.cantidad}</td>
                    <td>${registro.direccion}</td>
                    <td>${registro.fecha}</td>
                    </tr>
                    `
                });
                $('#tablaregistro').html(template);
            }
      });
}
function listarcliente(){
    $.ajax({
        url: 'assets/php/listacliente.php',
        type: 'GET',
        success: function(response) {
          const registros = JSON.parse(response);
          let template = '';
          registros.forEach(registro => {
            template += `
                    <tr>
                    <td>${registro.cedula}</td>
                    <td>${registro.nombre}</td>
                    <td>${registro.apellido}</td>
                    <td>${registro.sexo}</td>
                    </tr>
                    `
                });
                $('#tablaregistro').html(template);
            }
      });
}