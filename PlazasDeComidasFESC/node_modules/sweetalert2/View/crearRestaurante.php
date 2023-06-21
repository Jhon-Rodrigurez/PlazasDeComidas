<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear restaurante</title>
    <link rel="icon" type="image/x-icon" href="public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/style/estiloDashBoardAdministrador.css">
</head>

<body id="cuerpoCrearRestaurante">

<?php
$id = $nombre = $nit = $direccion = $telefono = $url = '';

if(isset($dataToView['data']['id'])) $id = $dataToView['data']['id'];
if(isset($dataToView['data']['Nombre'])) $nombre = $dataToView['data']['NombreRestaurnate'];
if(isset($dataToView['data']['NIT'])) $nit = $dataToView['data']['NIT'];
if(isset($dataToView['data']['Direccion'])) $direccion = $dataToView['data']['Direccion'];
if(isset($dataToView['data']['Telefono'])) $telefono = $dataToView['data']['Telefono'];
if(isset($dataToView['data']['UrlLogo'])) $url = $dataToView['data']['UrlLogo'];

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
       <div class="borde-titulo jumbotron text-center py-3 mb-3 mt-5">
       <div class="text-center fs-3 fw-bold text-white">Crear restaurante</div>
      </div>

        <form action="index.php?controller=Restaurante&action=crear" method="POST">
		<input type="text" hidden name='id' value=<?php echo $id ?>>

          <div class="mb-2">
			<label for="nombre" class="fw-bold fs-4"></label>
			<input class="form-control py-2 border-info" type="text" name="nombre" value='<?php echo $nombre?>' placeholder="Nombre del restaurante" pattern="[A-Z a-z]+" required>
          </div>

          <div class="mb-2">
            <label for="nit" class="fw-bold fs-4"></label>
		    <input class="form-control py-2 border-info" type="number" name="nit" value='<?php echo $nit?>' placeholder="NIT" pattern="[0-9]+" required>
          </div>

          <div class="mb-2">
            <label for="direccion" class="fw-bold fs-4"></label>
            <input class="form-control py-2 border-info" type="text" name="direccion" value='<?php echo $direccion?>' placeholder="Dirección del local" required>
          </div>

          <div class="mb-2">
            <label for="telefono" class="fw-bold fs-4"></label>
            <input class="form-control py-2 border-info" type="number" name="telefono" value='<?php echo $telefono?>' placeholder="Teléfono" pattern="[0-9]+" required>
          </div>

          <div class="mb-2">
            <label for="urlLogo" class="fw-bold fs-4"></label>
            <input class="form-control py-2 border-info" type="text" name="urlLogo" value='<?php echo $url?>' placeholder="URL Logo" required>
          </div>

		  <div class="mb-2">
		  	<label for="propietario"></label>
			<select class="form-select py-2 border-info" name="idPropietario" <?php echo $id != '' ? 'disable': '';?>>
				<option value="">Seleccione un propietario</option>
				<?php
				if(is_array($dataToView['data']['propietarios']) && count($dataToView["data"]['propietarios']) > 0){
					foreach($dataToView["data"]['propietarios'] as $propietario){
				?>
						<option value=<?php echo $propietario["id"] ?> ><?php echo $propietario["nombre"] ?> <?php echo $propietario["apellido"] ?> </option>
				<?php
					}
				}
				?>
			</select>
		  </div>

            <div class="text-center">
                <input type="submit" class="btn btn-danger fw-bold fs-5 m-4 py-2" value="Crear restaurante"></input>
            </div>
		</form>
    	</div>
	</div>
</div>