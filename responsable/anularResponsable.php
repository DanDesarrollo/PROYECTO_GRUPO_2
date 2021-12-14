<?php

    include "../conexion/conexion.php";

    // Instancia de la conexion
    $connection = new Conexion();

    $res_id = $_GET['id'];
    $estado_est_id = $_GET['est'];

    if ($estado_est_id == 1) {
        $actualizar = "UPDATE responsable SET  estado_est_id = '2' WHERE res_id = '$res_id' ";
    }else {
        $actualizar = "UPDATE responsable SET  estado_est_id = '1' WHERE res_id = '$res_id' ";
    }

    $resultado = mysqli_query($connection->connect(), $actualizar);

    if($resultado){
        echo "<script>alert('Se ha cambiado el estado correctamente');
        window.location='responsable.php';
        </script>";
    }else{
        echo "<script>alert('No se pudieron eliminar los datos los datos');
        windows.location='responsable.php';
        </script>";
    }

?>