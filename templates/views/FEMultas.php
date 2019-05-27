<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>Folio Multa
  <input name="id" type="text" id="id" />
  </label>
  <p>
    <label>
    <input type="submit" name="Submit" value="Eliminar" class="sub2 btnAnimation"/>
    </label>
  </p>
</form>
</div>

<?php
  include('functions/rcon.php');
	if(isset($_POST['id'])){
		$AUX = $_POST['id'];
		$Con = Conectar();
		$SQL = "DELETE FROM multas WHERE Folio = '$AUX';";
    EjecutarConsulta($Con, $SQL);
		Desconectar($Con);
	}
?>