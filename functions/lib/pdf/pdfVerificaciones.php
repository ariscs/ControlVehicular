<?php 
	$Folio=$_POST['Folio'];

	require('fpdf.php');
	include('../../rcon2.php');

	$Con = Conectar();

	$SQL = "SELECT * FROM Verificaciones WHERE Folio = '$Folio';";

	$Query=Ejecutarconsulta($Con,$SQL);
	$Fila =	mysqli_fetch_row($Query);

	$Folio = $Fila[0];
	$idVehiculo = $Fila[1];
	$Fecha = $Fila[2];
	$Periodo = $Fila[3];
	$Dictamen = $Fila[4];

	$SQL = "SELECT * FROM Vehiculos WHERE IdVehiculo = '$idVehiculo';";

	$Query=Ejecutarconsulta($Con,$SQL);
	$Fila =	mysqli_fetch_row($Query);

	$Propietario = $Fila[1];
	$Placa = $Fila[2];
	$Tipo = $Fila[3];
	$Uso = $Fila[4];
	$Anio = $Fila[5];
	$Color = $Fila[6];
	$Puertas = $Fila[7];
	$Modelo = $Fila[8];
	$Marca = $Fila[9];
	$Transmision = $Fila[10];
	$CapCarga = $Fila[11];
	$Serie = $Fila[12];
	$NumMotor = $Fila[13];
	$Linea = $Fila[14];
	$Sublinea = $Fila[15];
	$Cilindraje = $Fila[16];
	$Combustible = $Fila[17];
	$Origen = $Fila[18];

	Desconectar($Con);
	//BarCode
	// include('../BarCode/php-barcode-master/barcode.php');
	// barcode("barra.png", $Folio, 25, "horizontal", "code128", false, 1);
	//BarCode

	$pdf = new FPDF();
	$pdf->AddPage('L', [150,350]);
	$pdf->SetMargins(0,0,0);
	$pdf->SetFont('Arial', 'B', 15);

	$pdf->Cell(75, 30,$pdf->Image('secretariaDS.png'), 1, 0);
	$pdf->Cell(45, 45,$pdf->Image('VVQ.png'), 1, 0);
	$pdf->Cell(14, 0,'',0, 0)	;
	$pdf->Cell(22.5, 8,'MULTA', 0, 0);
	
	// $pdf->SetFont('Arial', 'B', 8);
	// $pdf->Cell(20, 8, 'Folio: ', 0, 0);
	// $pdf->Cell(20, 8, $Folio, 0, 1);
	// $pdf->Cell(20, 8, 'Licencia: ', 0, 0);
	// $pdf->Cell(20, 8, $Licencia, 0, 1);
	// $pdf->Cell(20, 8, 'Vehiculo: ', 0, 0);
	// $pdf->Cell(20, 8, $Vehiculo, 0, 1);
	// $pdf->Cell(20, 8, 'Id Oficial: ', 0, 0);
	// $pdf->Cell(20, 8, $IdOficial, 0, 1);
	// $pdf->Cell(20, 8, 'Monto:', 0, 0);
	// $pdf->Cell(20, 8, '$'.$Monto, 0, 1);
	// $pdf->Cell(20, 4, 'Lugar: ', 0, 0);
	// $pdf->MultiCell(45, 4, $Lugar, 0, 1);
	// $pdf->Cell(20, 8, 'Hora: ', 0, 0);
	// $pdf->Cell(20, 8, $Hora, 0, 1);
	// $pdf->Cell(20, 8, 'Fecha: ', 0, 0);
	// $pdf->Cell(20, 8, $Fecha, 0, 1);
	// $pdf->Cell(20, 8, 'Motivo: ', 0, 0);
	// $pdf->Cell(20, 8, $Motivo, 0, 1);

	$pdf->Output('i','te hakie.pdf');
	$temp = "../../../temp/PDF/Verificaciones/".$Folio.".pdf";
	$pdf->Output('f',$temp);
?>