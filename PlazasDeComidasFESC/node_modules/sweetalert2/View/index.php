<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio</title>
	<link rel="icon" type="image/x-icon" href="public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	<link rel="stylesheet" href="public/style/estiloDashBoardAdministrador.css">
	<link rel="stylesheet" href="public/style/estiloDashBoardPropietario.css">
	<link rel="stylesheet" href="public/style/estiloDashBoardLogin.css">
	<link rel="stylesheet" href="public/style/estiloDashBoardCliente.css">
</head>
<body>
	

	<?php 
	
	if (!$sesion) { 
		
		if ($_SESSION["usuario_rol"] == "usuario") {?>
	
		<p>Este contenido solo es visible para usuarios.</p>

	<?php } elseif ($_SESSION["usuario_rol"] == "empleado") {?>

		<p>Este contenido solo es visible para empleados.</p>

	<?php } elseif ($_SESSION["usuario_rol"] == "propietario") {?>

		<?php require_once 'pestanaInicioPropietario.php' ?>

	<?php } elseif ($_SESSION["usuario_rol"] == "administrador") {?>

		<?php require_once 'pestanaInicioAdministrador.php' ?>

	<?php } }?>

	<div class="jumbotron py-3 text-center mt-5 mb-5"></div>

	<div class="borde-titulo jumbotron py-5 text-center mt-5 mb-5 border border-2">
		<div class="text-white fs-1 mt-3">
			<h1>Lista de restaurantes</h1>
		</div>
	</div>
	
	<div class="row row-cols-1 row-cols-md-2 g-4 ms-5 mx-5">

	<?php
		if(is_array($dataToView['data']) && count($dataToView["data"]) > 0){
			foreach($dataToView["data"] as $restaurante){?>

				<div class="lista-restaurante col">
					<div class="card">
						<div class="card-title text-center">
							<h5><?php echo $restaurante['NombreRestaurante']; ?></h5>
						</div>
						<div class="card-body text-center">
							<h5 class="card-title text-center"><?php echo $restaurante['Direccion']; ?></h5>
							<h5 class="card-title text-center"><?php echo $restaurante['Telefono']; ?></h5>
							<a class="btn btn-danger mt-3" href="index.php?controller=Restaurante&action=lista&id=<?php echo $restaurante['id']; ?>">Ver platos</a>
						</div>
					</div>
				</div>

	<?php } }else{ ?>

			<p>Actualmente no existen notas.</p>

	<?php } ?>

    </div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>