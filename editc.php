<?php

include("db.php");

if (isset($_GET['idVehiculo'])) {
    $idVehiculo = $_GET['idVehiculo'];
    $query = "SELECT * FROM vehiculo WHERE idVehiculo = $idVehiculo";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $marca = $row['Marca']; 
        $placa = $row['placa']; 
        $tipo_carro = $row['tipo_carro']; 
        $idPersona = $row['idPersona']; 
        $idTipo = $row['idTipo']; 
    }    
}

if (isset($_POST['update'])) {
    $idVehiculo = $_GET['idVehiculo'];
    $marca = $_POST['Marca']; 
    $placa = $_POST['placa']; 
    $tipo_carro = $_POST['tipo_carro']; 
    $idPersona = $_POST['idPersona']; 
    $idTipo = $_POST['idTipo'];

    $query = "UPDATE vehiculo set marca ='$marca', placa ='$placa', Tipo_carro = '$tipo_carro', idPersona = '$idPersona', idTipo = '$idTipo' WHERE idVehiculo = $idVehiculo";

    mysqli_query($conn, $query);

    header("Location: indexc.php");

}

?>

<?php include("include/header.php") ?>

<center><br><h5>Actualizar datos del vehiculo</h5></center>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editc.php?idVehiculo=<?php echo $_GET['idVehiculo']; ?>" method = "POST">
                    <div class="form-group">
                        <input type="text" name="marca" value="<?php echo $marca; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="placa" value="<?php echo $placa; ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" name="persona" value="<?php echo $idPersona; ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" name="tipo" value="<?php echo $idTipo; ?>">
                    </div>
                    <button class="btn btn-success" name="update" >
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include ("include/footer.php") ?>