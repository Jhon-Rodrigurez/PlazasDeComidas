<?php

    class PlatoMd {

        private $tabla = 'plato';
        private $conexion;

        public function __construct() {
            $dbObj = new Db();
            $this->conexion = $dbObj->conexion;
        }

        public function crear($plato) {

            $id = '';

            $exist = false;

            if(!empty($plato['id'])) {

                $platoActual = $this->obtenerPlato($plato['id']);
                if(isset($platoActual['id'])) $exist = true;
            }

            if($exist) {

                $sql = 'UPDATE '. $this->tabla .' SET precio = ?, descripcion = ?, activo = ? WHERE id = ?';
                $stmt = $this->conexion->prepare($sql);
                $res = $stmt->execute([$plato['precio'], $plato['descripcion'], $plato['activo'], $platoActual['id']]);

            } else {

                $sql = 'INSERT INTO '. $this->tabla .' (nombrePlato, precio, descripcion, urlImagen, categoria, activo, idRestaurante) VALUES (?, ?, ?, ?, ?, ?, ?)';
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute([$plato['nombre'], $plato['precio'], $plato['descripcion'], $plato['urlImagen'], $plato['categoria'], $plato['activo'], $plato['idRestaurante']]);
                $id = $this->conexion->lastInsertId();

            }

            return $id;
        }

        public function obtenerPlatos($id) {

            $sql = 'SELECT * FROM '. $this->tabla .' WHERE idRestaurante = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetchAll();
        }

        public function obtenerPlato($id) {

            if(is_null($id)) return false;
            $sql = 'SELECT * FROM '.$this->tabla. ' WHERE id = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetch();
        }
    }
?>