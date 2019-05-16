<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>LICENCIAS<br />
  <br />
  Criterio
  <input name="criterio" type="text" id="idVehiculo" />
  </label>
  <p>
    <label>Atributo
    <select name="atributo" id="atributo">
      <option value="IdLicencia" selected="selected">Folio</option>
      <option value="Conductor">Conductor</option>
      <option value="FechaExp">Fecha de expedición</option>
      <option value="Tipo">Tipo</option>
      <option value="FechaVen">Fecha de vencimiento</option>
      <option value="Lugar">Lugar</option>
      <option value="Expide">Expide</option>
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
		$SQL = "SELECT * FROM licencias WHERE ".$a." = '".$c."' OR ".$a." LIKE '".$c."';";
		$Query = ejecutarConsulta($Con, $SQL);
?>
<table border="1px">
	<tr>
		<th>ID</th>
		<th>Conductor</th>
		<th>Fecha de expedición</th>
		<th>Tipo</th>
		<th>Fecha de vencimiento</th>
		<th>Lugar</th>
		<th>Expide</th>
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