<div class="form">
<form id="form1" name="form1" method="post" action="">
  <label>CONDUCTORES<br />
  <br />
  Criterio
  <input name="criterio" type="text" id="idVehiculo" />
  <br />
  <br />
  Atributo
  <select name="atributo" id="atributo">
    <option value="CURP">CURP</option>
    <option value="Nombre">Nombre</option>
    <option value="Domicilio">Dirección</option>
    <option value="Donador">Donador</option>
    <option value="GpoSanguineo">GpoSanguineo</option>
    <option value="Restricciones">Restricciones</option>
    <option value="TelEmergencia">TelEemergencia</option>
    <option value="FechaNac">Fecha de nacimiento</option>
  </select>
  <br />
  <br />
  </label>
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
		$SQL = "SELECT * FROM conductores WHERE $a LIKE '$c';";
		$Query = ejecutarConsulta($Con, $SQL);
		// $_POST['Fila'] =mysqli_fetch_row($Query);
?>

<table border="1px">
	<tr>
		<th>CURP</th>
		<th>Nombre</th>
		<th>Domicilio</th>
		<th>Firma</th>
		<th>Donador</th>
		<th>GpoSanguineo</th>
		<th>Restricciones</th>
		<th>TelEmergencia</th>
		<th>FechaNac</th>
	</tr>
<?php		
		for($F=0;$F<mysqli_num_rows($Query);$F++){
			$Fila = mysqli_fetch_row($Query);
			?>

			<tr>
			<?php
			print("
						
					<tr>
						<th>".$Fila[0]."</th>
						<th>".$Fila[1]."</th>
						<th>".$Fila[2]."</th>
						<th>".$Fila[3]."</th>
						<th>".$Fila[4]."</th>
						<th>".$Fila[5]."</th>
						<th>".$Fila[6]."</th>
						<th>".$Fila[7]."</th>
						<th>".$Fila[8]."</th>
					</tr>
				");		
			?>
			</tr>
			<?php
		}
		Desconectar($Con);
	}
?>
</table>
</div>