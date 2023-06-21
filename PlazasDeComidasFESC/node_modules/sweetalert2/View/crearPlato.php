<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear plato</title>
	<link rel="icon" type="image/x-icon" href="public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	<link rel="stylesheet" href="public/style/estiloDashBoardPropietario.css">
</head>
<body id="cuerpoDashBoardCrearPlato">

<?php
$id = $nombre = $precio = $descripcion = $url = $categoria = $activo = '';

if(isset($dataToView['data']['id'])) $id = $dataToView['data']['id'];
if(isset($dataToView['data']['NombrePlato'])) $nombre = $dataToView['data']['NombrePlato'];
if(isset($dataToView['data']['Precio'])) $precio = $dataToView['data']['Precio'];
if(isset($dataToView['data']['Descripcion'])) $descripcion = $dataToView['data']['Descripcion'];
if(isset($dataToView['data']['UrlImagen'])) $url = $dataToView['data']['UrlImagen'];
if(isset($dataToView['data']['Categoria'])) $categoria = $dataToView['data']['Categoria'];
if(isset($dataToView['data']['Activo'])) $activo = $dataToView['data']['Activo'];

$res = $id != '' ? 'disabled': '';

?>

	<?php
	if(isset($_GET["res"]) && $_GET["res"] === true){
	?>
		<div>
			Operación realizada correctamente. <a href="index.php?controller=Usuario&action=obtenerRestaurantes">Volver al listado</a>
		</div>
	<?php
	}
	?>

<div class="jumbotron py-4 text-center mt-5 mb-5"></div>
<div class="contenedor-formulario container col-md-6 border border-3 rounded rounded-5 col-md-4 mt-5 bg-light p-3 mb-5">
		<div class="borde-titulo jumbotron text-center py-3 mb-5 mt-5">
			<div class="text-center fs-3 fw-bold text-white">Crear plato</div>
		</div>

		<form method="POST" action="index.php?controller=Plato&action=crear">
		<input type="hidden" name='id' value='<?php echo $id ?>'>

            <div class="row">
                <div class="col-md-4 mb-3 mt-1">
					<label for="nombre"></label>
					<input type="text" class="form-control py-2 border-info" id="nombre" name="nombre" value='<?php echo $nombre?>' <?php echo $res ?> placeholder="Nombre del plato" pattern="[A-Z a-z]+" required>
                </div>

                <div class="col-md-4 mb-3 mt-1">
					<label for="precio"></label>
					<input type="number" class="form-control py-2 border-info" id="precio" name="precio" value='<?php echo $precio ?>' placeholder="Precio" pattern="[0-9]+" required>
                </div>

                <div class="col-md-4 mb-1">
					<label for="descripcion"></label>
					<textarea id="descripcion" class="form-control py-2 border-info" name="descripcion" placeholder="Descripción del plato" required><?php echo $descripcion ?></textarea>
                </div>

                <div class="col-md-4 mb-4">
					<label for="urlImagen"></label>
					<input type="text" class="form-control py-2 border-info" id="urlImagen" name="urlImagen" value='<?php echo $url?>' <?php echo $res ?> placeholder="URL de la imagen" required>
                </div>

                <div class="col-md-4 mb-5">
					<label for="categoria"></label>
					<input type="text" class="form-control py-2 border-info" id="categoria" name="categoria" value='<?php echo $categoria?>' <?php echo $res ?> placeholder="Categoría" pattern="[A-Z a-z]+" required>
                </div>
				<div class="col-md-4 mb-5 mt-3">
					<label for="estado" class="fw-bold fs-5 mt-3">Estado:</label>
					<input type="checkbox" class="form-check-input mt-4 ms-2 border-info" id="estado" name="estado" <?php if($activo == '' || $activo == 1) echo 'checked'; ?>>
				</div>
				<div class="col-md-4 mb-5">
				<label for="idRestaurante">Restaurante:</label>
				<select id="idRestaurante" class="form-select py-2 border-info" name="idRestaurante" <?php echo $res ?>>
					<option value="">Seleccione un restaurnate</option>
					<?php
					if(is_array($dataToView['data']['restaurantes']) && count($dataToView["data"]['restaurantes']) > 0){
						foreach($dataToView["data"]['restaurantes'] as $restaurante){
					?>
							<option value=<?php echo $restaurante["id"] ?> ><?php echo $restaurante["NombreRestaurante"] ?> <?php echo $restaurante["NIT"] ?> </option>
					<?php
						}
					}
					?>
				</select>
				</div>
				<div class="text-center">
                	<input type="submit" class="btn btn-danger fw-bold fs-4 m-4 py-3 px-3" value="Crear plato"></input>
            	</div>
            </div>
        </form>
    </div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>