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
    <option value="Direccion">Dirección</option>
    <option value="TipoSangre">Tipo de sangre</option>
    <option value="Restricciones">Restricciones</option>
    <option value="TelefonoEmergencias">Telefono de emergencias</option>
    <option value="FechaNacimiento">Fecha de nacimientos</option>
    <option value="Donador">Donador</option>
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
		$SQL = "SELECT * FROM conductores WHERE ".$a." = '".$c."' OR ".$a." LIKE '".$c."';";
		$Query = ejecutarConsulta($Con, $SQL);
?>
<table border="1px">
	<tr>
		<th>CURP</th>
		<th>Nombre</th>
		<th>Dirección</th>
		<th>Firma</th>
		<th>Tipo de Sangre</th>
		<th>Restricciones</th>
		<th>Telefono de Emergencia</th>
		<th>Fecha de nacimiento</th>
		<th>Donador</th>
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