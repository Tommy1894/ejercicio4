<?php
require_once('assets/php/conexion.php');

$query = "SELECT cedula, nombre, apellido, direccion, sexo FROM cliente";
$result = $conn->query($query);

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

      $pdf->Cell(110, 15, utf8_decode('Embotelladora Thomsom'), 1, 1, 'C', 0); 
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
      $pdf->Cell(100, 10, utf8_decode("Reporte de Clientes "), 0, 1, 'C', 0);
      $pdf->Ln(7);


    $pdf->Cell(20, 10, utf8_decode('#'), 1);
    $pdf->Cell(40, 10, utf8_decode('Cédula'), 1);
    $pdf->Cell(40, 10, utf8_decode('Nombre'), 1);
    $pdf->Cell(40, 10, utf8_decode('Apellido'), 1);
    $pdf->Cell(40, 10, utf8_decode('Zona/País'), 1);
    $pdf->Ln();

    $N_contador = 1;
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(20, 10, $N_contador, 1);
        $pdf->Cell(40, 10, utf8_decode($row['cedula']), 1);
        $pdf->Cell(40, 10, utf8_decode($row['nombre']), 1);
        $pdf->Cell(40, 10, utf8_decode($row['apellido']), 1);
        $pdf->Cell(40, 10, utf8_decode($row['zona_pais']), 1);
        $pdf->Ln();
        $N_contador++;
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

    <div class="container ">
    <div class="container margin-top-50">
    <h4 class="center">Clientes Registrados</h4>
        <form method="get" action="clientes.php">
            <div class="input-field">
                <input type="text" name="cedula" id="cedula" value="<?php echo $cedula; ?>">
                <label for="cedula">Buscar por Cédula</label>
            </div>
            <div class="center">
                <button class="waves-effect waves-light blue lighten-4 black-text btn" type="submit" name="buscar_cedula">
                    Buscar
                </button>
            </div>

<br>
        <div class="center">
            <a href="registroC.php" class="waves-effect blue lighten-4 black-text btn">Registrar Nuevo Cliente</a>
        </div>

        <div class="right">
            <a href="clientes.php?generar_pdf=true" target="_blank"><i class="material-icons left">picture_as_pdf</i>PDF</a>
        </div>

        </form>
        </div>
        </div>

    <div class="container margin-top-50">
        <table class="striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
            <?php

            $N_contador = 1;

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $N_contador . "</td>";
                echo "<td>" . $row['cedula'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellido'] . "</td>";
                echo "<td>" . $row['direccion'] . "</td>";
                echo "</tr>";

                $N_contador++;
            }
            ?>
        </tbody>
        </table>
        </div>
<br><br>
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
