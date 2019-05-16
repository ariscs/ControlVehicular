<div class="form">
<form id="form1" name="form1" method="post" action="#">
  <label>VERIFICACIONES<br />
  <br />
  Criterio
  <input name="criterio" type="text" id="idVehiculo" required/>
  </label>
  <p>
    <label>Atributo
    <select name="atributo" id="atributo">
      <option value="Folio" selected="selected">Folio</option>
      <option value="Vehiculo">Vehiculo</option>
      <option value="Fecha">Fecha</option>
      <option value="Periodo">Periodo</option>
      <option value="Dictamen">Dictamen</option>
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
		$SQL = "SELECT * FROM verificaciones WHERE ".$a." = '".$c."' OR ".$a." LIKE '".$c."';";
		$Query = ejecutarConsulta($Con, $SQL);
?>
<table border="1px">
	<tr>
		<th>ID</th>
		<th>Vehiculo</th>
		<th>Fecha</th>
		<th>Periodo</th>
		<th>Dictamen</th>
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