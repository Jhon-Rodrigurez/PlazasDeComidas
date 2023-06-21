<?php

    require_once 'models/UsuarioMd.php';
    require_once 'models/RestauranteMd.php';

    class UsuarioCt {

        public $tituloPagina;
		public $vista;

		public function __construct() {

            $this->vista = 'index';
            $this->tituloPagina = '';
			$this->usuarioMdObj = new UsuarioMd();
            $this->restauranteMdObj = new RestauranteMd();
		}

        public function lista(){
            $this->tituloPagina = 'inicio';
            return $this->restauranteMdObj->obtenerRestaurantes();
        }

        public function obtenerRolClave() {

            if($_GET['vista'] == 'crearEmpleado' || $_GET['vista'] == 'crearPropietario') {

                $_POST['clave'] = $_POST['documento'];

                if($_GET['vista'] == 'crearPropietario') $_POST['rol'] = 'propietario';
                if($_GET['vista'] == 'crearEmpleado') $_POST['rol'] = 'empleado';
            }
            
            if($_GET['vista'] == 'login') $_POST['rol'] = 'usuario';

            $_POST['calveEncriptada'] = password_hash($_POST['clave'], PASSWORD_DEFAULT);
        }

        public function crear() {

			$this->vista = $_GET['vista'];
			$this->tituloPagina = $_GET['titulo'];

            UsuarioCt::validarUsuario($this->vista);

            $this->obtenerRolClave();

            $userEncontrado = $this->usuarioMdObj->obtenerUsuarioPorCorreo($_POST['correo']);
            if(!empty($userEncontrado['id'])) {
                $_GET['res'] = false;
                return;
            }

			$id = $this->usuarioMdObj->crear($_POST);

            if(empty($id)) return false;

			$res = $this->usuarioMdObj->obtenerUsuario($id);
			$res['id'] = null;
			$_GET['res'] = true;

			return $res;
		}

		public function editar($id = null) {

			$this->vista = $_GET['vista'];
			$this->tituloPagina = $_GET['titulo'];

            UsuarioCt::validarUsuario($this->vista);

			if(isset($_GET["id"])) $id = $_GET["id"];
			return $this->usuarioMdObj->obtenerUsuario($id);
		}

        public function log() {
            $this->vista = 'login';
			$this->tituloPagina = 'login';
        }

        public function obtenerMisRestaurantes() {

            $this->vista = 'verMisPlatos';
			$this->tituloPagina = 'ver mis platos';

            UsuarioCt::validarUsuario($this->vista);

			return $this->restauranteMdObj->obtenerRestaurantesPropietario($_SESSION['usuario_id']);
        }

        public function login() {

            $usuario = $this->usuarioMdObj->login($_POST);

            if ($usuario && password_verify($_POST['clave'], $usuario['Clave'])) {

                session_start();
        
                $_SESSION["usuario_id"] = $usuario["id"];
                $_SESSION["usuario_nombre"] = $usuario["Nombre"];
                $_SESSION["usuario_rol"] = $usuario["Rol"];
        
                header('Location: index.php?controller=Usuario&action=lista');
                exit();
        
            } else {
                $_GET['res'] = false;
                $this->log();
            }
        }

        public function logout() {
            
            session_start();

            session_unset();
            session_destroy();

            header('Location: index.php?controller=Usuario&action=lista');
            exit();
        }

        public static function validarUsuario($vista) {

            $rol = '';

            if($vista == 'login' || $vista == 'verPlatos') return;
            if($vista == 'crearPlato' || $vista == 'verMisPlatos'|| $vista == 'crearEmpleado') $rol = 'propietario';
            if($vista == 'crearPropietario' || $vista == 'crearRestaurante') $rol = 'administrador';

            session_start();

            if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== $rol) {
                header('location: index.php?controller=Usuario&action=lista');
                exit();
            }
        }
    }
?>
