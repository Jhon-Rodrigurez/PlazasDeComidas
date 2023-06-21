<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/style/estiloDashBoardLogin.css">
</head>

<body id="page-top">

<?php 
	if(isset($_GET['res']) && $_GET['res'] == true && !empty($_GET['vista'])) echo '<p>registro realizado correctamente</p>';
	if(isset($_GET['res']) && $_GET['res'] == false && !empty($_GET['vista'])) echo '<p>error al registrarse</p>';
	if(isset($_GET['res']) && $_GET['res'] == false  && empty($_GET['vista'])) echo '<p>error al loguearse</p>';
?>

<div class="jumbotron py-4 text-center mt-5 mb-5"></div>
    <div class="jumbotron py-2 text-center mt-5 mb-5"></div>

    <div class="container justify-content-center align-items-center vh-100">                                                  
        <div class="row justify-content-center mb-5" style="width: 100%;">
          <div class="col-sm-4 text-center">                                                        
          <div class="bg-white p-5 rounded-5 text-secondary">
        <div class="text-center fs-3 fw-bold">INICIAR SESIÓN</div>

        <form action="index.php?controller=Usuario&action=login" method="POST">
        <div class="input-group mt-4">
            <label for="correo" class="fw-bold fs-2" style="width: 100%;">
                <input type="email" class="form-control bg-light" id="correo" name="correo" placeholder="Correo electrónico">
            </label>	
        </div>
        <div class="input-group mt-4">
            <label for="clave" class="fw-bold fs-2" style="width: 100%;">
                <input type="password" class="form-control bg-light" id="clave" name="clave" placeholder="Contraseña">
            </label>		
        </div>
        <div class="input-group mt-4">
			<label for="rol" class="fw-bold fs-2" style="width: 100%;">
                <select id="rol" class="form-select bg-light" aria-label="Default select example" name="rol">
                        <option value="0">Seleccione el nivel</option>
                        <option value="usuario">Usuario</option>
                        <option value="empleado">Empleado</option>
                        <option value="propietario">Propietario</option>
                        <option value="administrador">Administrador</option>
				</select>
            </label>
		</div>
        <div class="mt-3">
            <input type="submit" class="btn btn-danger text-white w-100 mt-4 fw-semibold shadow-sm" value="Iniciar sesión"></input>
        </div>
        </form>
        <div class="mt-3">
          <p class="text-center fs-4">O</p>
        </div>
        <div>

		<button type="button" class="btn btn-danger text-white w-100 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Crea una cuenta</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-2 text-center fw-bold" id="exampleModalLabel">Crear una cuenta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

						<form action="index.php?controller=Usuario&action=crear&vista=login&titulo=login" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label fs-4 fw-semibold">Nombres:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese sus nombres" pattern="[A-Z a-z]+" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="col-form-label fs-4 fw-semibold">Apellidos:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese sus apellidos" pattern="[A-Z a-z]+" required>
                        </div>
                        <div class="mb-3">
                            <label for="documento" class="col-form-label fs-4 fw-semibold">Documento de Identidad:</label>
                            <input type="text" class="form-control" id="documento" name="documento" placeholder="Número de documento de identidad" pattern="[0-9]+" required>
                        </div>
                        <div class="mb-3">
                            <label for="celular" class="col-form-label fs-4 fw-semibold">Celular:</label>
                            <input type="text" class="form-control" id="celular" name="celular" placeholder="Número de celular" pattern="[0-9]+" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="col-form-label fs-4 fw-semibold">Correo:</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo eletctrónico" required>
                        </div>
                        <div class="mb-3">
                            <label for="clave" class="col-form-label fs-4 fw-semibold">Contraseña:</label>
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" minlength="8" required>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-danger" value="Registrarse">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        
                        <input type="text" hidden id="rolCrear" name="rolCrear" value="usuario">

                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>                                  
       </div>                                                                                      
      </div>
    </div>

	<section class="page-section bg-danger py-5" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-5">Quienes Somos</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white fw-semibold mb-4">Somos estudiantes de quinto semestre de la universidad Fesc, hemos
                        desarrollado
                        este software para la plaza de comidas de la FESC.
                    </p>
    
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>