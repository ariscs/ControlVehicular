<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>CURP
  <input name="CURP" type="text" id="CURP" />
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
        $SQL = "DELETE FROM conductores WHERE CURP = '$CURP';";
        EjecutarConsulta($Con, $SQL);
        Desconectar($Con);
    }
?>
