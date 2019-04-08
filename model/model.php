<?php

    class Conexion {
        private $conexion;

        function __construct() {
            $bd = "chat";
            $server = "localhost";
            $user = "root";
            $pwd = "";

            $this->conexion = mysqli_connect($server, $user, $pwd, $bd);
            if(!$this->conexion) {
                die("Error de conexion" . mysqli_connect_error());
            }
        }

        function registradorMensajes($user, $message, $time) {
            $stmt = $this->conexion->stmt_init();
            $stmt->prepare("INSERT INTO conversacion (usuario, mensaje, hora)
                VALUES(?, ?, ?)");
            $stmt->bind_param("sss", $user, $message, $time);
            $resultado = $stmt->execute();

            if($resultado) {
                echo "Mensaje registrado.";
            }
        }

        function mostrarMensajes() {
            $stmt = $this->conexion->stmt_init();
            $stmt->prepare("SELECT usuario, mensaje, hora FROM conversacion 
                ORDER BY idmensaje ASC");
            $stmt->execute();
            $resultado = $stmt->get_result();
            $arrayContenedor = [];

            // https://getbootstrap.com/docs/4.3/content/typography/ 

            while($fila = mysqli_fetch_assoc($resultado)) {
                $arrayTemporal = [
                    "usuario" => $fila["usuario"],
                    "mensaje" => $fila["mensaje"], 
                    "hora" => $fila['hora']
                ];
                array_push($arrayContenedor, $arrayTemporal);
            }
            return $arrayContenedor;
        }

        function cerrarConexion() {
            $this->conexion->close();
        }
    }