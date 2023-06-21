<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver platos</title>
    <link rel="icon" type="image/x-icon" href="public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/style/estiloDashBoardPropietario.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>
</head>

<body>

    <a href="index.php?controller=Usuario&action=lista">Volver</a>
	<div class="jumbotron py-5 text-center mt-5 mb-5"></div>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
					<div>
					<?php
						if(is_array($dataToView['data']) && count($dataToView["data"]) > 0){
							foreach($dataToView["data"] as $plato){
					?>
					</div>

                	<?php 
						if($plato['Activo'] == 1) {
					?>

					<h5 class="card-title text-center fs-3"><?php echo $plato['NombrePlato']; ?></h5>
					<p class="card-text text-center"><?php echo $plato['Precio']; ?></p>
					<p class="card-text text-center"><?php echo $plato['Descripcion']; ?></p>
					<div class="text-center">
						<button id="botonPedir" type="button" class="btn btn-danger" onclick="showConfirmation()">
							Ordenar plato
						</button>
								<script>
									function showConfirmation() {
									  Swal.fire({
										title: 'Confirmación',
										text: '¿Estás seguro de que deseas continuar?',
										icon: 'question',
										showCancelButton: true,
										confirmButtonText: 'Sí',
										cancelButtonText: 'Cancelar'
									  }).then((result) => {
										if (result.isConfirmed) {
										  Swal.fire('¡Enviado!', 'Acabaste de enviar el pedido. No puedes realizar otro hasta que este esté listo.', 'success');
											alert("Pendiente...");
										} else if (result.dismiss === Swal.DismissReason.cancel) {
										  Swal.fire('Cancelado', 'Has cancelado el pedido.', 'error');
										}
									  });
									}
								  </script>
								</div>
							</div>
							</div>
						</div>
					</div>

                <?php }?>

				<?php
						}
					}else{
				?>
						<p>Actualmente no existen platos.</p>
				<?php
					}
				?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>