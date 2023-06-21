<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Propietario</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/style/estiloDashBoardAdministrador.css">
</head>

<body id="cuerpoCrearPropietario">

<?php
$id = $nombre = $apellido = $documento = $celular = $correo = '';

if(isset($dataToView['data']['id'])) $id = $dataToView['data']['id'];
if(isset($dataToView['data']['Nombre'])) $nombre = $dataToView['data']['Nombre'];
if(isset($dataToView['data']['Apellido'])) $apellido = $dataToView['data']['Apellido'];
if(isset($dataToView['data']['DocumentoDeIdentidad'])) $documento = $dataToView['data']['DocumentoDeIdentidad'];
if(isset($dataToView['data']['Celular'])) $celular = $dataToView['data']['Celular'];
if(isset($dataToView['data']['Correo'])) $correo = $dataToView['data']['Correo'];

?>

<?php
	if(isset($_GET["res"]) && $_GET["res"] === true){
	?>
		<div>
			Operación realizada correctamente. <a href="index.php?controller=Usuario&action=lista">Volver al listado</a>
		</div>
	<?php
	}
	?>

<div class="jumbotron py-4 text-center mt-5 mb-5"></div>
<div class="contenedorFormulario container mt-5 mb-5 border border-3 rounded rounded-5 col-md-3 bg-light">
    <div class="row justify-content-center mx-2 ms-2">
      <div class="col-md-12">
       <div class="borde-titulo jumbotron text-center py-3 mb-5 mt-5">
         <div class="text-center fs-3 fw-bold text-white">Crear propietario</div>
      </div>

         <form action="index.php?controller=Usuario&action=crear&vista=crearPropietario&titulo=crear propietario" method="POST">
         <input type="text" hidden name='id' value='<?php echo $id ?>'>

          <div class="mb-3">
           <label for="nombre"></label>
           <input type="text" class="form-control py-2 border-info" id="nombre" name="nombre" value='<?php echo $nombre?>' placeholder="Nombres" pattern="[A-Z a-z]+" required>
          </div>
          <div class="mb-3">
           <label for="apellido" class="fw-bold fs-4"></label>
           <input type="text" class="form-control py-2 border-info" id="apellido" name="apellido" value='<?php echo $apellido?>' placeholder="Apellidos" pattern="[A-Z a-z]+" required>
          </div>
          <div class="mb-3">
           <label for="documento" class="fw-bold fs-4"></label>
           <input type="number" class="form-control py-2 border-info" id="documento" name="documento" value='<?php echo $documento?>' placeholder="Número de documento" pattern="[0-9]+" required>
          </div>
          <div class="mb-3">
           <label for="celular" class="fw-bold fs-4"></label>
           <input type="number" class="form-control py-2 border-info" id="celular" name="celular" value='<?php echo $celular?>' placeholder="Número de celular" pattern="[0-9]+" required>
          </div>
          <div>
           <label for="correo" class="fw-bold fs-4"></label>
           <input type="email" class="form-control py-2 border-info" id="correo" name="correo" value='<?php echo $correo?>' placeholder="Correo electrónico" required>
          </div>
            <input type="text" hidden id="rolCrear" name="rolCrear" value="propietario"> 
          <div class="text-center mt-5">
             <input type="submit" class="btn btn-danger fw-bold fs-5 mb-5 py-2" value="Crear propietario"></input>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>