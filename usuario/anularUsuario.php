<?php

    include "../conexion/conexion.php";

    // Instancia de la conexion
    $connection = new Conexion();

    $usuario_id = $_GET['id'];
    $estado_est_id = $_GET['est'];

    if ($estado_est_id == 1) {
        $actualizar = "UPDATE usuario SET  estado_est_id = '2' WHERE usuario_id = '$usuario_id' ";
    }else {
        $actualizar = "UPDATE usuario SET  estado_est_id = '1' WHERE usuario_id = '$usuario_id' ";
    }

    $resultado = mysqli_query($connection->connect(), $actualizar);

    if($resultado){
        echo "<script>alert('Se ha cambiado el estado correctamente');
        window.location='usuario.php';
        </script>";
    }else{
        echo "<script>alert('No se pudieron eliminar los datos los datos');
        windows.location='usuario.php';
        </script>";
    }

?>