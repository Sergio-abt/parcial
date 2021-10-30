<?php

include("db.php");

if (isset($_GET['idVehiculo'])) {
    $idVehiculo = $_GET['idVehiculo'];
    $query = "DELETE  FROM vehiculo WHERE idVehiculo = $idVehiculo";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed");
    }

    $_SESSION['message'] = "Datos guardados correctamente";
    $_SESSION['message_type'] = 'danger';


    header("Location: indexc.php");
}

?>