<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver pedidos</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/iconoFesc.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>
</head>
<body>
    
    <div class="jumbotron py-4 text-center mt-5 mb-5"></div>
    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center">Nombre del plato</h5>
                <p class="card-text text-center">Nombre del cliente</p>
                <div class="text-center">

                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Aceptar pedido
                  </button>

                  <button type="button" class="btn btn-danger" onclick="showConfirmation2()">
                    Preparado
                  </button>

                  <script>
                    function showConfirmation2() {
                      Swal.fire({
                      title: 'Confirmación',
                      text: '¿Estás seguro de que deseas continuar?',
                      icon: 'question',
                      showCancelButton: true,
                      confirmButtonText: 'Sí',
                      cancelButtonText: 'Cancelar'
                      }).then((result) => {
                      if (result.isConfirmed) {
                        Swal.fire('¡Terminado!', 'Acabaste de terminar el pedido.', 'success');
                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire('Rechazado', 'No has terminado de hacer el pedido.', 'error');
                      }
                      });
                    }
                    </script>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Nombre del plato</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Nombre de la persona, precio
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" onclick="showConfirmation()">Preparar plato</button>

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
                                Swal.fire('¡Confirmado!', 'Acabaste de aceptar el pedido. Cuando lo termines de preparar, vuelve y cambia el estado del plato.', 'success');
                                alert("Preparando...");
                              } else if (result.dismiss === Swal.DismissReason.cancel) {
                                Swal.fire('Cancelado', 'Has cancelado la orden.', 'error');
                              }
                              });
                            }
                            </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center">Nombre del plato</h5>
                <p class="card-text text-center">Nombre del cliente</p>
                <div class="text-center">

                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Aceptar pedido
                  </button>

                  <button type="button" class="btn btn-danger" onclick="showConfirmation2()">
                    Preparado
                  </button>

                  <script>
                    function showConfirmation2() {
                      Swal.fire({
                      title: 'Confirmación',
                      text: '¿Estás seguro de que deseas continuar?',
                      icon: 'question',
                      showCancelButton: true,
                      confirmButtonText: 'Sí',
                      cancelButtonText: 'Cancelar'
                      }).then((result) => {
                      if (result.isConfirmed) {
                        Swal.fire('¡Terminado!', 'Acabaste de terminar el pedido.', 'success');
                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire('Rechazado', 'No has terminado de hacer el pedido.', 'error');
                      }
                      });
                    }
                    </script>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Nombre del plato</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Nombre de la persona, precio
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" onclick="showConfirmation()">Preparar plato</button>

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
                                Swal.fire('¡Confirmado!', 'Acabaste de aceptar el pedido. Cuando lo termines de preparar, vuelve y cambia el estado del plato.', 'success');
                                alert("Preparando...");
                              } else if (result.dismiss === Swal.DismissReason.cancel) {
                                Swal.fire('Cancelado', 'Has cancelado la orden.', 'error');
                              }
                              });
                            }
                            </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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