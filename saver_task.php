<?php

include("db.php");

if (isset($_POST['saver_task'])) {
	$idBahia = $_POST['idBahia'];
	$idVehiculo = $_POST['idVehiculo'];
	$Tiempo = $_POST['Tiempo'];
	$Costo = $_POST['Costo'];
	$Fecha = $_POST['Fecha'];


	$query = "INSERT INTO pago (idBahia,idVehiculo,Tiempo, Costo, (dateposted)) VALUES ('$idBahia','$idVehiculo','$Tiempo','$Costo','$Fecha')";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("Query failed");
	}

	$_SESSION['message'] = "Datos guardados correctamente";
	$_SESSION['message_type'] = 'success';

	header("Location: indexr.php");
}

?>