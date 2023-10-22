<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
    
    $query = "INSERT INTO embotella_cliente(cedula, nombre, apellido, sexo) VALUES('$cedula', '$nombre', '$apellido', '$sexo')";

    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

    if($rs){
        echo 'Registro Agregado';
        
    }else{
        echo 'Error No se agrego el registro';
    }


?>