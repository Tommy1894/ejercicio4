<?php

  include('conexion.php');
  date_default_timezone_set('America/Caracas');
  $query = "SELECT embotella_registro.id, embotella_cliente.cedula, embotella_cliente.nombre, embotella_cliente.apellido, embotella_registro.cantidad,embotella_registro.direccion, embotella_registro.fechastamp FROM embotella_registro INNER JOIN embotella_cliente ON embotella_registro.cedula = embotella_cliente.cedula";
  $result = mysqli_query($conec, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $fecha=date('d-m-Y H:i:s',$row['fechastamp']);
    $json[] = array(
      'id' => $row['id'],
      'cedula' => $row['cedula'],
      'nombre' => $row['nombre'],
      'apellido' => $row['apellido'],
      'cantidad' => $row['cantidad'],
      'direccion' => $row['direccion'],
      'fecha' => $fecha
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>