<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>PROPIETARIOS<br />
  <br />
  Criterio
  <input name="criterio" type="text" id="idVehiculo" />
  </label>
  <p>
    <label>Atributo
    <select name="atributo" id="atributo">
      <option value="RFC" selected="selected">RFC</option>
      <option value="CURP">CURP</option>
      <option value="Nombre">Nombre</option>
      <option value="Direccion">Direcci&oacute;n</option>
    </select>
    </label>
  </p>
  <p>
    <label>
    <input type="submit" name="Submit" value="Consultar" />
    </label>
  </p>
</form>

<?php
	include('functions/rcon.php');
	if(isset($_POST['criterio'])){
		$c = $_POST['criterio'];
		$a = $_POST['atributo'];
		$Con = Conectar();
		$SQL = "SELECT * FROM propietarios WHERE ".$a." = '".$c."' OR ".$a." LIKE '".$c."';";
		$Query = ejecutarConsulta($Con, $SQL);
?>
<table border="1px">
	<tr>
		<th>RFC</th>
		<th>CURP</th>
		<th>Nombre</th>
		<th>Direcci�n</th>
	</tr>
<?php		
		for($F=0;$F<mysqli_num_rows($Query);$F++){
			$Fila = mysqli_fetch_row($Query);?>
			<tr>
			<?php
			foreach($Fila as $i){
				echo("<th>".$i."</th>");
			}
			?>
			</tr>
			<?php
		}
		Desconectar($Con);
	}
?>
</table>
</div>