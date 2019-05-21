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
  // $SQL = "SELECT * FROM conductores WHERE CURP = '$CURP';";

  // $resultado=EjecutarConsulta($Con, $SQL);

  // print_r($row = mysqli_fetch_array($resultado));

  // print("<br>CURP = ". $row[0]);
  //XML
  
  //DELETE DE LA BD
  $SQL = "DELETE FROM conductores WHERE CURP = '$CURP';";
  EjecutarConsulta($Con, $SQL);
  Desconectar($Con);
}

?>
