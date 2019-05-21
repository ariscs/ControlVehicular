<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>CURP
  <input name="CURP" type="text" id="CURP" maxlength="18" minlength="18"/>
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
if(isset($_POST['CURP'])){
  $CURP = $_POST['CURP'];
  $Con = Conectar();
  //SELECT
  $SQL = "SELECT * FROM conductores WHERE CURP = '$CURP';";

  $resultado=EjecutarConsulta($Con, $SQL);

  $row = mysqli_fetch_array($resultado);

  $CURP = $row[0];
  $Nombre = $row[1];
  $Domicilio = $row[2];
  $location2 = $row[3];
  $Donante = $row[4];
  $GrupoS = $row[5];
  $Restricciones = $row[6];
  $TelE = $row[7];  
  $FechaN = $row[8];
  //XML
  if(!$conductores = new SimpleXMLElement('temp/XML/ConductoresBaja.xml', null, true)){
  }else{
    $nuevo = $conductores->addChild('conductor');
    $nuevo->addChild('CURP',$CURP);
    $nuevo->addChild('nombre',$Nombre);
    $nuevo->addChild('domicilio',$Domicilio);
    $nuevo->addChild('firma',$location2);
    $nuevo->addChild('donador',$Donante);
    $nuevo->addChild('gpoSanguineo',$GrupoS);
    $nuevo->addChild('restriccion',$Restricciones);
    $nuevo->addChild('telEmergencia',$TelE);
    $nuevo->addChild('fechaNacimiento',$FechaN);
  
    $conductores->asXML('temp/XML/ConductoresBaja.xml');
  }
  //DELETE DE LA BD
  $SQL = "DELETE FROM conductores WHERE CURP = '$CURP';";
  EjecutarConsulta($Con, $SQL);
  Desconectar($Con);
}

?>
