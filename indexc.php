<?php include("db.php") ?>
<?php include("include/header.php") ?>

<div class="container p-3">
    <h5>Datos del Vehiculo</h5>
    <div class="row">
        <div class="col-md-3" style="background-color:#D1F2EB">
           <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?  $_SESSION['message']?>
                     <strong>Solicitud ejecutada correctamente</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body" style="background-color:#A3E4D7">
                <form action="savec_task.php" method="POST">
                    <div class="form-group">
                        <h6>Marca</h6>
                        <input type="text" name="marca" class="form-control" placeholder="" required
                        minlength="2" autofocus>
                    </div>
                    <div class="form-group">
                        <h6>Placa</h6>
                        <input type="text" name="placa" class="form-control" placeholder="" required
                        minlength="6" maxlength="6" autofocus>
                    </div>
                    <h6>Codigo de cliente</h6>
                    <div class="form-group">
                        <input type="number" name="idPersona" class="form-control" placeholder="" required
                        minlength="1" maxlength="3" autofocus>
                    </div>
                    <h6>Codigo tipo de auto</h6>
                    <div class="form-group">
                        <input type="number" name="idTipo" class="form-control" placeholder="" required
                        minlength="1" maxlength="3" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="savec_task" value="Enviar">
                </form>
            </div>
            <center><br><a class="btn btn-secondary" href="" role="button">Continuar</a></center>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th>Id Vehiculo</th>
                        <th>Marca</th>
                        <th>Placa</th>
                        <th>Id Persona </th>
                        <th>Id Tipo</th>
                        <th>Accion</th>
                    </tr>
                </thead >
                <tbody>
                    <?php
                    $query = "SELECT * FROM vehiculo";
                    $result_tasks = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['idVehiculo'] ?></td>
                            <td><?php echo $row['Marca'] ?></td>
                            <td><?php echo $row['placa'] ?></td>
                            <td><?php echo $row['idPersona'] ?></td>
                            <td><?php echo $row['idTipo'] ?></td>
                            <td>
                                <a href="editc.php?idVehiculo=<?php echo $row['idVehiculo']?>" class ="btn btn-primary">
                                    Edit
                                </a>
                                <a href="deletec_task.php?idVehiculo=<?php echo $row['idVehiculo']?>" class ="btn btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <center><br><a class="btn btn-secondary" href="index.php" role="button">Volver</a>
            <a class="btn btn-secondary" href="buscarc.php" role="button">consultar</a>
            <a class="btn btn-secondary" href="indexr.php" role="button">Generar Recibo</a>
        </center>
        </div>
    </div>
    
</div>

<?php include("include/footer.php") ?>