<?php

    require_once 'models/RestauranteMd.php';
	require_once 'models/PlatoMd.php';
	require_once 'models/UsuarioMd.php';
	require_once 'UsuarioCt.php';

    class RestauranteCt {

        public $tituloPagina;
		public $vista;

		public function __construct() {

			$this->restauranteMdObj = new RestauranteMd();
			$this->platoMdObj = new PlatoMd();
			$this->usuarioMdObj = new UsuarioMd();
		}

		public function crear() {

			$this->vista = 'crearRestaurante';
			$this->tituloPagina = 'crear restaurante';

			UsuarioCt::validarUsuario($this->vista);

			$id = $this->restauranteMdObj->crear($_POST);
			
			$res = $this->restauranteMdObj->obtenerRestaurante($id);
			$res['propietarios'] = $this->usuarioMdObj->obtenerUsuarios('propietario');
			$res['id'] = null;

			$_GET['res'] = true;

			return $res;
		}

		public function editar($id = null) {

			$this->vista = 'crearRestaurante';
			$this->tituloPagina = 'editar restaurante';

			UsuarioCt::validarUsuario($this->vista);

			if(isset($_GET["id"])) $id = $_GET["id"];
			$res = $this->restauranteMdObj->obtenerRestaurante($id);
			$res['propietarios'] = $this->usuarioMdObj->obtenerUsuarios('propietario');

			return $res;
		}

		public function lista($id = null) {

			$this->vista = 'verPlatos';
			$this->tituloPagina = 'ver platos';

			if(isset($_GET["id"])) $id = $_GET["id"];
			return $this->platoMdObj->obtenerPlatos($id);
		}

        public function obtenerRestaurantesPropietario($id) {

            return $this->restauranteMdObj->obtenerRestaurantesPropietario($id);
        }
    }
?>
