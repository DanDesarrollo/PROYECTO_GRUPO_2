<?php

    include "../conexion/conexion.php";

    // Instancia de la conexion
    $connection = new Conexion();

    $ele_id = $_GET['id'];
    $estado_est_id = $_GET['est'];

    if ($estado_est_id == 6) {
        $actualizar = "UPDATE elemento SET  estado_est_id = '7' WHERE ele_id = '$ele_id' ";
    }else {
        $actualizar = "UPDATE elemento SET  estado_est_id = '6' WHERE ele_id = '$ele_id' ";
    }

    $resultado = mysqli_query($connection->connect(), $actualizar);

    if($resultado){
        echo "<script>alert('Se ha cambiado el estado correctamente');
        window.location='elemento.php';
        </script>";
    }else{
        echo "<script>alert('No se pudieron eliminar los datos los datos');
        windows.location='elemento.php';
        </script>";
    }

?>