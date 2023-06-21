<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear empleado</title>
    <link rel="icon" type="image/x-icon" href="public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/style/estiloDashBoardPropietario.css">
</head>
<body id="cuerpoDashBoardCrearEmpleado">

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

<div class="jumbotron py-5 text-center mt-5 mb-5"></div>
<div class="contenedor-formulario container mt-5 border border-3 rounded rounded-5 col-md-3 bg-light mb-4">
    <div class="row justify-content-center mx-0 ms-0">
      <div class="col-md-11">
       <div class="borde-titulo jumbotron text-center py-3 mb-5 mt-5">
         <div class="text-center fs-3 fw-bold text-white">Crear empleado</div>
      </div>

        <form action="index.php?controller=Usuario&action=crear&vista=crearEmpleado&titulo=crear empleado" method="POST">
        <input type="text" hidden name='id' value=<?php echo $id ?>>

          <div class="mb-3">
            <label for="nombre"></label>
            <input type="text" class="form-control py-2 border-info" id="nombre" name="nombre" value='<?php echo $nombre?>' placeholder="Nombres" pattern="[A-Z a-z]+" required>
          </div>
          <div class="mb-3">
            <label for="apellido"></label>
            <input type="text" class="form-control py-2 border-info" id="apellido" name="apellido" value='<?php echo $apellido?>' placeholder="Apellidos" pattern="[A-Z a-z]+" required>
          </div>
          <div class="mb-3">
            <label for="documento"></label>
            <input type="text" class="form-control py-2 border-info" id="documento" name="documento" value='<?php echo $documento?>' placeholder="Documento de identidad" pattern="[0-9]+" required>
          </div>
          <div class="mb-3">
            <label for="celular"></label>
            <input type="text" class="form-control py-2 border-info" id="celular" name="celular" value='<?php echo $celular?>' placeholder="Número de celular" pattern="[0-9]+" required>
          </div>
          <div>
            <label for="correo"></label>
            <input type="email" class="form-control py-2 border-info" id="correo" name="correo" value='<?php echo $correo?>' placeholder="Correo electrónico" required>
          </div>
            <input type="text" hidden id="rolCrear" name="rolCrear" value="empleado"> 
          <div class="text-center">
            <input type="submit" class="btn btn-danger fw-bold fs-4 m-4 py-2 px-3 mt-5" value="Crear empleado"></input>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>