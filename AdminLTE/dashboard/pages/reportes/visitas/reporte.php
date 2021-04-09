<?php

    include 'plantilla.php';
    require 'conexion.php';
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