<?php
require_once('assets/php/conexion.php');

$query = "SELECT id, cedula_cliente, CONCAT(nombre, ' ', apellido) AS cliente, direccion, cantidad_bote, fecha_llenado
          FROM pedidos
          INNER JOIN cliente c ON cedula_cliente = cedula";


if (isset($_GET['buscar_cedula'])) {
    $cedula = $_GET['cedula'];
    $query .= " WHERE c.cedula LIKE '%$cedula%'";
}

$result = $conec->query($query);

$conec->close();

if (isset($_GET['generar_pdf'])) {
    require('fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);


    $pdf->Image('img\Icon.png', 185, 5, 20); 
    $pdf->SetFont('Arial', 'B', 19); 
    $pdf->Cell(45); 
    $pdf->SetTextColor(0, 0, 0); 
 
      $pdf->Cell(110, 15, utf8_decode('Embotelladora Thomsom'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $pdf->Ln(3); 
      $pdf->SetTextColor(103);


      $pdf->Cell(110);  
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(96, 10, utf8_decode("Ubicación : URBE "), 0, 0, '', 0);
      $pdf->Ln(5);


      $pdf->Cell(110); 
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(59, 10, utf8_decode("Teléfono : 0412-555-5555 "), 0, 0, '', 0);
      $pdf->Ln(5);


      $pdf->Cell(110); 
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(85, 10, utf8_decode("Correo : EmbotelladoraThomsom@gmailcom"), 0, 0, '', 0);
      $pdf->Ln(5);

      $pdf->Ln(10);



      $pdf->SetTextColor(0, 0, 0);
      $pdf->Cell(50);
      $pdf->SetFont('Arial', 'B', 15);
      $pdf->Cell(100, 10, utf8_decode("Reporte de Pedidos "), 0, 1, 'C', 0);
      $pdf->Ln(7);




    $pdf->Cell(20, 10, utf8_decode('ID'), 1);
    $pdf->Cell(40, 10, utf8_decode('Cedula Cliente'), 1);
    $pdf->Cell(60, 10, utf8_decode('Cantidad de botellas'), 1);
    $pdf->Cell(60, 10, utf8_decode('Fecha del llenado'), 1);
    $pdf->Ln();



    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(20, 10, utf8_decode($row['id']), 1);
        $pdf->Cell(40, 10, utf8_decode($row['cedula_cliente']), 1);
        $pdf->Cell(60, 10, utf8_decode($row['cantidad_bote']), 1);
        $pdf->Cell(60, 10, utf8_decode($row['fecha_llenado']), 1);
        $pdf->Ln();

    }


    $pdf->Output();

}

?>

<!DOCTYPE html>
<html>
<head>
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
<br>
    <div class="container">
        <div class="container margin-top-50">
        <h4 class="center">Registro de Compras</h4>
        <form method="GET" action="pedidos.php" class="" style="margin-bottom: 20px;">
            <div class="input-field">
                <input type="text" name="cedula" placeholder="Buscar por cédula">
                </div>
            <div class="center">
                <button type="submit" name="buscar_cedula" class="blue lighten-4 black-text btn">Buscar</button>
            </div>
            <br>
            <div class="center-align" >
                <a class="blue lighten-4 black-text btn" href="registroP.php">Registrar Nuevo Pedido</a>
            </div>

            <div class="right">
            <a href="pedidos.php?generar_pdf=true" target="_blank"><i class="material-icons left">picture_as_pdf</i>PDF</a>
        </div>
        </form>
<br>
    </div>
    

        <table class="striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cédula del Cliente</th>
                    <th>Cliente</th>
                    <th>Zona/País</th>
                    <th>Cantidad de Botes</th>
                    <th>Fecha de Llenado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['cedula_cliente'] . "</td>";
                    echo "<td>" . $row['cliente'] . "</td>";
                    echo "<td>" . $row['zona_pais'] . "</td>"; // Agregar la zona/país
                    echo "<td>" . $row['cantidad_bote'] . "</td>";
                    echo "<td>" . $row['fecha_llenado'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<br>
    <footer class="page-footer deep-orange lighten-2">
        <div class="footer-copyright">
            <div class="container">
                <p>Copyright © 2023</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
