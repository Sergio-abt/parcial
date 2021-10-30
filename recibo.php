<?php include("include/header.php") ?>
<html lang="es">
<body>
    <div>
        <form action="recibo.php" method="post">
            <input type="text" name="buscar" id="">
            <input type="submit" value="GENERAR RECIBO PARA :">

        </form>
    </div>
    <div class="col-md-9">
        <table class="table table-bordered table-dark">
        <thead>
            <tr>

                <td>idPago</td>
                <td>idBahia</td>
                <td>idVehiculo</td>
                <td>Tiempo</td>
                <td>Costo</td>
                <td>Fecha</td>
                <td>Marca</td>
                <td>placa</td>
                <td>tipo_carro</td>
                <td>idPersona</td>
                <td>idTipo</td>
               
            </tr>
        </thead>
        <tbody>
            <?php
                $buscar = $_POST['buscar'];
                $cnx = mysqli_connect("localhost", "root", "", "parqueadero");
                $sql = "SELECT *  FROM  pago JOIN vehiculo on vehiculo.idVehiculo =persona.idVehiculo WHERE idPago like '$buscar' '%' order by idVehiculo desc  ";
                $rta = mysqli_query($cnx, $sql);
                while ($mostrar = mysqli_fetch_row($rta)) {
                    ?>
                    <tr>
                        <td><?php echo $mostrar[0] ?></td>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[3] ?></td>
                        <td><?php echo $mostrar[4] ?></td>
                        <td><?php echo $mostrar[5] ?></td>
                        <td><?php echo $mostrar[6] ?></td>
                        <td><?php echo $mostrar[7] ?></td>
                        <td><?php echo $mostrar[8] ?></td>
                        <td><?php echo $mostrar[9] ?></td>
                        <td><?php echo $mostrar[10] ?></td>


                    </tr>
                <?php
                }
                ?>
                
        </tbody>
        </table>
    </div>
    <center><br><a class="btn btn-secondary" href="indexc.php" role="button">Volver</a></center>
</body>
</html>
<?php include("include/footer.php") ?>