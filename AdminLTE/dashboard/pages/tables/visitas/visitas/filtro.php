<?php
	
	// $fhing = $_POST['filtroing']." 00:00:00";
	// $fhsal = $_POST['filtrosal']." 23:59:59";
	// if(isset($_POST['exportf'])){
	// 	echo "Inicio: ".$fhing." - Fin : ".$fhsal
	// }  
?>
<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
  	<a href="../index.php">Volver</a>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
  </html> -->
  <?php

    include 'plantilla.php';
    require 'conect.php';
    $query = "SELECT * FROM visitas INNER JOIN personas ON visitas.idpersona = personas.idpersona";
    $resultado = $mysqli->query($query);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20, 6, 'ID', 1, 0, 'C',1);
    $pdf->Cell(70, 6, 'NOMBRES', 1, 0, 'C',1);
    $pdf->Cell(50, 6, 'FECHA INGRESO', 1, 0, 'C',1);
    $pdf->Cell(50, 6, 'FECHA SALIDA', 1, 1, 'C',1);
    $pdf->SetFont('Arial','',10);
    while ($row=$resultado->fetch_assoc()) {
        $pdf->Cell(20, 6,$row['codigo_visita'], 1, 0, 'C');
        $pdf->Cell(70, 6,utf8_decode($row['nombres']." ".$row['apellido_pat']." ".$row['apellido_mat']), 1, 0, 'C');
        $pdf->Cell(50, 6,$row['fh_ingreso'], 1, 0, 'C');
        $pdf->Cell(50, 6,$row['fh_salida'], 1, 1, 'C');
    }
    $pdf->Output();

?>