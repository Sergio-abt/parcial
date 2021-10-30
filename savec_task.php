<?php

include("db.php");

if (isset($_POST['savec_task'])) {
    $marca = $_POST['marca'];
    $placa = $_POST['placa'];
    $idPersona = $_POST['idPersona'];
    $idTipo = $_POST['idTipo'];


    $query = "INSERT INTO vehiculo( Marca, placa, tipo_carro, idPersona, idTipo)  VALUES ( '$marca','$placa','$idPersona','$idTipo')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed.....");
    }

    $_SESSION['message'] = "Datos guardados correctamente";
    $_SESSION['message_type'] = 'success';

    header("Location: indexc.php");
}

?>