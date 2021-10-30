<?php include("db.php") ?>
<?php include("include/header.php") ?>

<div class="container p-2">
	<h5>Recibo De Pago</h5>
	<div class="row">
		<div class="col-md-3" style="background-color:#D1F2EB">
			<?php if (isset($_SESSION['message'])) { ?>
				<div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
					<? $_SESSION['message']?>
					 <strong>Solicitud ejecutada correctamente</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php session_unset(); } ?>

			<div class="card card-body" style="background-color:#A3E4D7">
				<form action="saver_task.php" method="POST">
					<div class="form-group">
						<h6>Id Bahia</h6>
						<input type="text" name="idBahia" class="form-control" placeholder="" required
						minlength="1" autofocus>
					</div>
					<div class="form-group">
						<h6>Id Vehiculo</h6>
						<input type="text" name="idVehiculo" class="form-control" placeholder="" required
						minlength="1" maxlength="10" autofocus>
					</div>
					<h6>Tiempo</h6>
					<div class="form-group">
						<input type="time" name="Tiempo" class="form-control" placeholder="" required
						minlength="" maxlength="" autofocus>
					</div>

					<h6>Costo</h6>
					<div class="form-group">
					<input type="num" name="Costo" class="form-control" placeholder="" required
						minlength="" maxlength="" autofocus>	
					</div>
					
					<h6>Fecha</h6>
					<div class="form-group">
					<input type="date" name="Fecha" class="form-control" placeholder="" required
						minlength="" maxlength="" autofocus>	
					</div>
					<input type="submit" class="btn btn-success btn-block" name="saver_task" value="Enviar">
				</form>
			</div>
			
		</div>
		<div class="col-md-7">
			<table class="table table-bordered table-dark">
				<thead>
					<tr>
						
						<th>Id Pago</th>
                		<th>Id Bahia</th>
                		<th>Id Vehiculo</th>
                		<th>Tiempo</th>
                		<th>Costo</th>
                		<th>Fecha</th>
				
					</tr>
				</thead >
				<tbody>
					<?php
					$query = "SELECT * FROM pago";
					$result_tasks = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_array($result_tasks)) { ?>
						<tr>
							<td><?php echo $row['idPago'] ?></td>
							<td><?php echo $row['idBahia'] ?></td>
							<td><?php echo $row['idVehiculo'] ?></td>
							<td><?php echo $row['Tiempo'] ?></td>
							<td><?php echo $row['Costo'] ?></td>
							<td><?php echo $row['Fecha'] ?></td>
							
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<center><br><a class="btn btn-secondary" href="index.php" role="button">Volver</a></center>
		</div>
	</div>
	
</div>

<?php include("include/footer.php") ?>



