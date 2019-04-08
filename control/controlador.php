<?php
    require_once "../model/model.php";
    
    $accion = $_REQUEST['accion'];

    if($accion == "registrarMensaje") {
        $user = $_POST['user'];
        $message = $_POST['message'];
        $time = date('H:i d/m/Y');        

        $conexion = new Conexion();
        $conexion->registradorMensajes($user, $message, $time);
        $conexion->cerrarConexion();
    }else if($accion == "recargaMensajes") {
        $conexion = new Conexion();
        $resultado = $conexion->mostrarMensajes();

        foreach($resultado as $fila) {
            echo "<p>" 
                . "<span><strong> ". $fila["usuario"] . ": </strong></span>" 
                .  $fila["mensaje"] . "<br>" 
                . "<span class='text-secondary'><small> " . $fila['hora'] . "</small></span>"
            . "</p>";
        }
        $conexion->cerrarConexion();
    }