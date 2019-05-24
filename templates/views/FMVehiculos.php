<div class="form">
    <form id="form1" name="form1" method="post" action="#">
        <p>VEHICULOS</p>

        <label>Folio</label>
        <input name="folio" type="text" id="criterio" />

        <input type="submit" name="Submit" value="Consultar" />
    </form>
</div>

    <?php

    include('functions/rcon.php'); 
    if(isset($_POST['folio'])){
        $idVehiculo = $_POST['folio'];
        $Con = Conectar();
        $SQL = "SELECT * FROM vehiculos WHERE idVehiculo = '".$idVehiculo."'";
        $Query = ejecutarConsulta($Con, $SQL);
        if(mysqli_num_rows($Query) > 0){
            $campos = mysqli_fetch_assoc($Query);
    ?>

            <form id="form2" name="form2" method="post" action="">
                <div class="form__group">
                    <input type="number" name="idv" class="form__input" value="<?php echo($campos['IdVehiculo']); ?>" disabled>
                    <label for="idv" class="form__label">Folio</label>
                </div>

                <div class="form__group">
                    <input type="text" name="propietario" class="form__input" value="<?php echo($campos['Propietario']); ?>">
                    <label for="propietario" class="form__label">Propietario</label>
                </div>

                <div class="form__group">
                    <input type="text" name="placa" class="form__input" value="<?php echo($campos['Placa']); ?>">
                    <label for="placa" class="form__label">Placa</label>
                </div>

                <label for="">Tipo</label>
                <input type="text" name="tipo">
                <label for="">Uso</label>
                <label for="">Anio</label>
                <label for="">Color</label>
                <label for="">Puertas</label>
                <label for="">Modelo</label>
                <label for="">Marca</label>
                <label for="">Transmisión</label>
                <label for="">Capacidad de carga</label>
                <label for="">Serie</label>
                <label for="">Número de motor</label>
                <label for="">Linea</label>
                <label for="">Sublinea</label>
                <label for="">Cilindraje</label>
                <label for="">Combustible</label>
                <label for="">Origen</label>
                <input type="submit" value="Actualizar">
            </form>
    <?php
            if(isset($_POST['idv'])){
                $placa = $_POST['placa'];
                $SQL = "UPDATE vehiculos SET Placa = '$placa' WHERE IdVehiculo = '$IdVehiculo'";
                $Query = ejecutarConsulta($Con, $SQL);
            }
        }else{
            //No encontro nada
        }
        Desconectar($Con);
    }

    ?>