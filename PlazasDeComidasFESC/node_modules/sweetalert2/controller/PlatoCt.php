<?php

	require_once 'models/PlatoMd.php';
	require_once 'models/RestauranteMd.php';
	require_once 'UsuarioCt.php';

	class PlatoCt {

		public $tituloPagina;
		public $vista;

		public function __construct() {

			$this->platoMdObj = new PlatoMd();
			$this->restauranteMdObj = new RestauranteMd();
		}

		public function crear() {

			$this->vista = 'crearPlato';
			$this->tituloPagina = 'crear plato';

			UsuarioCt::validarUsuario($this->vista);

			$_POST['activo'] = !isset($_POST['estado']) ? 0 : 1;

			$id = $this->platoMdObj->crear($_POST);
			$res = $this->platoMdObj->obtenerPlato($id);
			$res['restaurantes'] = $this->restauranteMdObj->obtenerRestaurantesPropietario($_SESSION['usuario_id']);
			$res['id'] = null;
			$_GET['res'] = true;

			return $res;
		}

		public function editar($id = null) {

			$this->vista = 'crearPlato';
			$this->tituloPagina = 'editar plato';

			UsuarioCt::validarUsuario($this->vista);

			if(isset($_GET["id"])) $id = $_GET["id"];
			$res = $this->platoMdObj->obtenerPlato($id);
			$res['restaurantes'] = $this->restauranteMdObj->obtenerRestaurantesPropietario($_SESSION['usuario_id']);
			return $res;
		}
	}
?>
