<?php

    class UsuarioMd {

        private $tabla = 'usuario';
        private $conexion;

        public function __construct() {
            $dbObj = new Db();
            $this->conexion = $dbObj->conexion;
        }

        public function crear($usuario) {

            $id = '';

            $exist = false;

            if(!empty($usuario['id'])) {

                $usuarioActual = $this->obtenerUsuario($usuario['id']);
                if(isset($usuarioActual['id'])) $exist = true;
            }

            if($exist) {

                $sql = 'UPDATE '. $this->tabla .' SET nombre = ?, apellido = ?, celular = ? WHERE id = ?';
                $stmt = $this->conexion->prepare($sql);
                $res = $stmt->execute([$usuario['nombre'], $usuario['apellido'], $usuario['celular'], $usuarioActual['id']]);

            } else {

                $sql = 'INSERT INTO '. $this->tabla .' (nombre, apellido, DocumentoDeIdentidad, celular, correo, clave, rol) VALUES (?, ?, ?, ?, ?, ?, ?)';
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute([$usuario['nombre'], $usuario['apellido'], $usuario['documento'], $usuario['celular'], $usuario['correo'], $usuario['calveEncriptada'], $usuario['rol']]);
                $id = $this->conexion->lastInsertId();

            }

            return $id;
        }

        public function login($login) {

            $sql = 'SELECT * FROM '. $this->tabla .' WHERE correo = ? AND rol = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$login['correo'], $login['rol']]);

            return $stmt->fetch();
        }

        public function obtenerUsuarios($rol) {

            $sql = 'SELECT id, nombre, apellido FROM '. $this->tabla .' WHERE rol = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$rol]);

            return $stmt->fetchAll();
        }

        public function obtenerUsuario($id) {

            if(is_null($id)) return false;
            $sql = 'SELECT * FROM '.$this->tabla. ' WHERE id = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetch();
        }

        public function obtenerUsuarioPorCorreo($correo) {

            if(is_null($correo)) return false;
            $sql = 'SELECT * FROM '.$this->tabla. ' WHERE correo = ?';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$correo]);

            return $stmt->fetch();
        }
    }
?>