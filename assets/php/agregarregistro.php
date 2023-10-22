<?php
    include_once('conexion.php');
    date_default_timezone_set('America/Caracas');
    $cedula = $_POST['cedula'];
    $cantidad = $_POST['cantidad'];
    $direccion = $_POST['direccion'];
    $fecha = date('Y-m-d H:i:s');
    $fechastamp = strtotime($fecha);
    
    $query = "INSERT INTO embotella_registro(cedula, cantidad, direccion, fecha,fechastamp) VALUES('$cedula', '$cantidad', '$direccion', '$fecha','$fechastamp')";

    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

    if($rs){
        echo 'Registro Agregado';
        
    }else{
        echo 'Error No se agrego el registro';
    }


?>