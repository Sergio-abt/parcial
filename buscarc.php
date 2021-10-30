<?php include("include/header.php") ?>
<html lang="es">
<body>
    <div class="col-md-4">
        <br><h5>Buscar registro</h5>
        <div class="form-group mb-2">
            <form action="buscarc.php" method="POST">
                <input class="form" type="text" name="buscar" id="" placeholder="">
                <input class="btn btn-primary" type="submit" value="Buscar">
            </form>
        </div>
    </div><br>
</div>
<center>
    <h5></h5>
<div class="col-md-11">
    
        <table  class="table table-bordered table-dark">
            <thead >
                <tr>
                    <h5>REGITROS DEL AUTOMOVIL</h5><br>
                    <td>Id Vehiculo</td>
                    <td>Marca</td>
                    <td>Placa</td>
                    <td>Tipo Carro</td>
                    <td>Id Tipo</td>
                    <td>Id Persona</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Telefono</td>
                    <td>Documento</td>
                    <td>Direccion</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $buscar = $_POST['buscar'];
                $cnx = mysqli_connect("localhost", "root", "", "parqueadero");
                $sql = "SELECT *  FROM  vehiculo JOIN persona on vehiculo.idPersona =persona.idPersona WHERE idVehiculo like '$buscar' '%' order by idVehiculo desc  " ;
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
</center>
<center><br><a class="btn btn-secondary" href="indexc.php" role="button">Volver</a></center>
</body>
</html>
<?php include("include/footer.php") ?>