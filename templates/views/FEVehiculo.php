<div class="form">
  <form id="form1" name="form1" method="post" action="#">
    <div class="form__group">
      <input name="id" type="number" id="id" class="form__input" placeholder="ID Vehículo"/>  
      <label for="id" class="form__label">ID Vehículo</label>
    </div>
  
    <input type="submit" name="Submit" value="Eliminar" />
  </form>
</div>

<?php
include('functions/rcon.php');
if(isset($_POST['id'])){
  $AUX = $_POST['id'];
  $Con = Conectar();
    //SELECT
  $SQL = "SELECT * FROM vehiculos WHERE IdVehiculo = '$AUX';";
  $resultado=EjecutarConsulta($Con, $SQL);
  $row = mysqli_fetch_array($resultado);

  $IdVehiculo = $row[0];
  $Propietario = $row[1];
  $Placa = $row[2];
  $Tipo = $row[3];
  $Uso = $row[4];
  $Anio = $row[5];
  $Color = $row[6];
  $Puertas = $row[7];  
  $Modelo = $row[8];
  $Marca = $row[9];
  $Transmision = $row[10];
  $capCarga = $row[11];
  $Serie = $row[12];
  $numMotor = $row[13];
  $Linea = $row[14];
  $Sublinea = $row[15];
  $Cilindraje = $row[16];
  $Combustible = $row[17];
  $Origen = $row[18];

  //XML
  if(!$vehiculos = new SimpleXMLElement('temp/XML/Vehiculos/Baja.xml', null, true)){
  }else{
    $nuevo = $vehiculos->addChild('vehiculo');
    $nuevo->addChild('Propietario',$Propietario);
    $nuevo->addChild('Placa',$Placa);
    $nuevo->addChild('Tipo',$Tipo);
    $nuevo->addChild('Modelo',$Modelo);
    $nuevo->addChild('Marca',$Marca);
    $nuevo->addChild('Anio',$Anio);
    $nuevo->addChild('Uso',$Uso);
    $nuevo->addChild('Color',$Color);
    $nuevo->addChild('NumPuertas',$Puertas);
    $nuevo->addChild('Marca',$Marca);
    $nuevo->addChild('Transmision',$Transmision);
    $nuevo->addChild('CapacidadDeCarga',$capCarga);
    $nuevo->addChild('Serie',$Serie);
    $nuevo->addChild('NumMotor',$numMotor);
    $nuevo->addChild('Linea',$Linea);
    $nuevo->addChild('SubLinea',$Sublinea);
    $nuevo->addChild('Cilindraje',$Cilindraje);
    $nuevo->addChild('Combustible',$Combustible);
    $nuevo->addChild('Origen',$Origen); 
    $vehiculos->asXML('temp/XML/Vehiculos/Baja.xml');
  }
    //DELETE DE LA BD
  $SQL = "DELETE FROM vehiculos WHERE IdVehiculo = '$AUX';";
  EjecutarConsulta($Con, $SQL);

  $affected = mysqli_affected_rows($Con);
	if($affected > 0){
		$msg = "Vehículo eliminado de forma exitosa";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}elseif($affected == 0){
		$msg = "No fue posible eliminar el vehículo, verifique que este vehículo exista";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}else{
		$msg = "Verifique que este vehículo exista";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}

  Desconectar($Con);
}
?>