<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo $controller->tituloPagina; ?></title>
  <link rel="icon" type="image/x-icon" href="../public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../public/style/estiloDashBoardAdministrador.css">
	<link rel="stylesheet" href="../public/style/estiloDashBoardPropietario.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand m-1" href="index.php">
			<figure>
				<img src="public/assets/navbarLogoFesc.jpg" alt="navbarLogoFesc.jpg">
			</figure>
		  </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-4" id="navbarNav">
		  <?php
			session_start();
			$sesion = (empty($_SESSION["usuario_id"]) || empty($_SESSION["usuario_nombre"]) || empty($_SESSION["usuario_rol"]));
				
			if ($sesion) {
				if($_GET['action'] == 'log') { 

					require_once 'navDashBoardLogin.php';

				} else {

					require_once 'navDashBoardInicio.php';
				}
			} else {

				if($_SESSION["usuario_rol"] == 'usuario') require_once 'navDashBoardCliente.php';
				if($_SESSION["usuario_rol"] == 'propietario') require_once 'navDashBoardPropietario.php';
				if($_SESSION["usuario_rol"] == 'administrador') require_once 'navDashBoardAdmin.php';
				if($_SESSION["usuario_rol"] == 'administrador') require_once 'navDashBoardEmpleado.php';
			}
			?>
          </div>
        </div>
</nav>