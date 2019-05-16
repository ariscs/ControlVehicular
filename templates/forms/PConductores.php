<?php

include('functions/rcon.php');
if(isset($_POST['Submit'])){
	$CURP= $_POST['CURP'];
	$Nombre= $_POST['nombre'];
	$Domicilio= $_POST['domicilio'];
	
	$archivo=$_FILES['archivo'];
	print($_FILES['archivo']['error']);
	
	print($_POST['archivo']);

	$_FILES['archivo']['name']=$CURP . ".jpg";
	$name = $_FILES['archivo']['name'];
	$location = "C:/xampp/htdocs/DAAD267778/Archivos/";
	$tmp_name = $_FILES['archivo']['tmp_name'];
	
	move_uploaded_file('C:\Users\aristides\Documents\UAQ\hacking etico\1.iso', 'C:\Users\aristides\Documents\1.iso');
	copy('C:\Users\aristides\Documents\UAQ\hacking etico\1.iso', 'C:\Users\1.iso');
	
	$location2=$location.$CURP;
	copy($tmp_name, $location2.".jpg");
	
	//Archivo

	$Donante= $_POST['donante'];
	$GrupoS= $_POST['grupo'];
	$Restricciones= $_POST['restricciones'];
	$TelE= $_POST['tel'];
	$FechaN= $_POST['fecha'];
	
	print("CURP: ".$CURP. "<br>");
	print("Nombre: ".$Nombre. "<br>");
	print("Domicilio: ".$Domicilio. "<br>");
	print("Firma: ".$location2. "<br>");
	print("Donante: ".$Donante. "<br>");
	print("Grupo sanguineo: ".$GrupoS. "<br>");
	print("Restricciones: ".$Restricciones. "<br>");
	print("Tel de emergencia: ".$TelE. "<br>");
	print("Fecha de nacimiento: ".$FechaN. "<br>");

    $Con = Conectar();
	$SQL = "INSERT INTO conductores VALUES ('$CURP', '$Nombre', '$Domicilio', '$location2', '$GrupoS', '$Restricciones', '$TelE', '$FechaN','$Donante');";
	EjecutarConsulta($Con,$SQL);

	$affected = mysqli_affected_rows($Con);
	if($affected > 0){
		print($affected." Elemento(s) insertado(s)");
	}elseif($affected == 0){
		print("No se insertó ningun elemento");
	}else{
		print("Hubo un error en la consulta");
	}

	Desconectar($Con);
	
	//XML
	if(!$conductores = new SimpleXMLElement('XML/Conductores.xml', null, true)){
		print("No exixte el archivo");
	}else{
		$nuevo = $conductores->addChild('conductor');
		$nuevo->addChild('CURP',$CURP);
		$nuevo->addChild('nombre',$Nombre);
		$nuevo->addChild('domicilio',$Domicilio);
		$nuevo->addChild('firma',$Firma);
		$nuevo->addChild('donador',$Donante);
		$nuevo->addChild('gpoSanguineo',$GrupoS);
		$nuevo->addChild('restriccion',$Restricciones);
		$nuevo->addChild('telEmergencia',$TelE);
		$nuevo->addChild('fechaNacimiento',$FechaN);
	
		$conductores->asXML('XML/Conductores.xml');
	}
}

?>