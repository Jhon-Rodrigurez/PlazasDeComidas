<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="icon" type="image/x-icon" href="public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/style/estiloDashBoardPropietario.css">
</head>
<body>

<div class="jumbotron py-4 text-center mt-5 mb-5"></div>
<a href="index.php?controller=Usuario&action=lista">Volver</a>

<?php 
    $i = 0;
    if(is_array($dataToView['data']) && count($dataToView["data"]) > 0){?>

        <div class="container">
            <div class="accordion" id="accordionExample">

			<?php foreach($dataToView["data"] as $restaurante){?>

                <?php $i++?>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $i?>">
                    <button class="accordion-button <?php if($i > 1) echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i?>" aria-expanded="<?php echo $i > 1 ? 'false' : 'true'; ?>" aria-controls="collapse<?php echo $i?>">
                        
                        <h5 class="card-title"><?php echo $restaurante['NombreRestaurante']; ?></h5>
                        <p class="card-text px-3"><?php echo $restaurante['NIT']; ?></p>

                    </button>
                    </h2>
                    <div id="collapse<?php echo $i?>" class="accordion-collapse collapse <?php if($i == 1) echo 'show'; ?>" aria-labelledby="heading<?php echo $i?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        
                        <?php require_once 'models/PlatoMd.php';
                            $platoMdObj = new PlatoMd();
                            $platos = $platoMdObj->obtenerPlatos($restaurante['id']);

                            foreach($platos as $plato){?>

                                <h5 class="col-6 col-sm-3"><?php echo $plato['NombrePlato']; ?></h5>
                                <p class="col-6 col-sm-3"><?php echo $plato['Precio']; ?></p>
                                <a class="col-6 col-sm-3 btn btn-danger px-4" href="index.php?controller=Plato&action=editar&id=<?php echo $plato['id']; ?>">editar plato</a>

                        <?php }?>

                        </div>
                    </div>
                </div>

	    <?php }?>

        </div>
    </div>

<?php }else{?>
			<p>Actualmente no existen restaurantes.</p>
<?php }?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>