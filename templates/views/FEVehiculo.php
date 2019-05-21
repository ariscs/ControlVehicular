<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>ID Vehiculo
  <input name="id" type="text" id="id" />
  </label>
  <p>
    <label>
    <input type="submit" name="Submit" value="Eliminar" />
    </label>
  </p>
</form>
</div>

<?php
  include('functions/rcon.php');
	if(isset($_POST['id'])){
		$AUX = $_POST['id'];
		$Con = Conectar();

    if(!$vehiculos = new SimpleXMLElement('temp/XML/Vehiculos/Alta.xml', null, true)){
    }else{
      $nuevo = $vehiculos->addChild('vehiculo');
      $nuevo->addChild('Propietario',$Propietario);
      $nuevo->addChild('Placa',$Placa);
      $nuevo->addChild('Tipo',$Tipo);
      $nuevo->addChild('Modelo',$Modelo);
      $nuevo->addChild('Anio',$Anio);
      $nuevo->addChild('Uso',$Uso);
      $nuevo->addChild('Color',$Color);
      $nuevo->addChild('NumPuertas',$numPuertas);
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
      $vehiculos->asXML('temp/XML/Vehiculos/Alta.xml');
    }
    
		$SQL = "DELETE FROM vehiculos WHERE IdVehiculo = '$AUX';";
    EjecutarConsulta($Con, $SQL);
		Desconectar($Con);
	}
?>