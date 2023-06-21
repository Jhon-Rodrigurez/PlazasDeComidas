<?php

    class RestauranteMd {

        private $tabla = 'restaurante';
        private $conexion;

        public function __construct() {
            $dbObj = new Db();
            $this->conexion = $dbObj->conexion;
        }

        public function crear($restaurante) {

            $id = '';

            $exist = false;

            if(!empty($restaurante['id'])) {

                $restauranteActual = $this->obtenerRestaurante($restaurante['id']);
                if(isset($restauranteActual['id'])) $exist = true;
            }

            if($exist) {

                $sql = 'UPDATE '. $this->tabla .' SET nombreRestaurante = ?, telefono = ?, urlLogo = ?, idPropietario = ? WHERE id = ?';
                $stmt = $this->conexion->prepare($sql);
                $res = $stmt->execute([$restaurante['nombre'], $restaurante['telefono'], $restaurante['urlLogo'], $restaurante['idPropietario'], $restauranteActual['id']]);

            } else {

                $sql = 'INSERT INTO '. $this->tabla .' (nombreRestaurante, nit, Direccion, telefono, urlLogo, idPropietario) VALUES (?, ?, ?, ?, ?, ?)';
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute([$restaurante['nombre'], $restaurante['nit'], $restaurante['direccion'], $restaurante['telefono'], $restaurante['urlLogo'], $restaurante['idPropietario']]);
                $id = $this->conexion->lastInsertId();

            }

            return $id;
        }

        public function obtenerRestaurantesPropietario($id) {

            $sql = 'SELECT id, NombreRestaurante, NIT FROM '. $this->tabla .' WHERE idPropietario = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetchAll();
        }

        public function obtenerRestaurantes() {

            $sql = 'SELECT * FROM '. $this->tabla;
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function obtenerRestaurante($id) {

            if(is_null($id)) return false;
            $sql = 'SELECT * FROM '.$this->tabla. ' WHERE id = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetch();
        }
    }
?>