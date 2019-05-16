<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>TENENCIAS<br />
  <br />
  Criterio
  <input name="criterio" type="text" id="idVehiculo" />
  </label>
  <p>
    <label>Atributo
    <select name="atributo" id="atributo">
      <option value="Folio" selected="selected">Folio</option>
      <option value="Vehiculo">Veh&iacute;culo</option>
      <option value="Anio">A&ntilde;o</option>
      <option value="Monto">Monto</option>
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
		$SQL = "SELECT * FROM tenencias WHERE ".$a." = '".$c."' OR ".$a." LIKE '".$c."';";
		$Query = ejecutarConsulta($Con, $SQL);
?>
<table border="1px">
	<tr>
		<th>Folio</th>
		<th>Vehiculo</th>
		<th>Año</th>
		<th>Monto</th>
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