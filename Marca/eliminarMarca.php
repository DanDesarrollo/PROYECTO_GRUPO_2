<?php

    include "../conexion/conexion.php";

    // Instancia de la conexion
    $connection = new Conexion();

    $id = $_GET['id'];

    if($connection->connect()){

        $borrar= mysqli_query($connection->connect(), "DELETE FROM marca WHERE mar_id = ".$id);
        

        echo "<script>alert('Se han eliminado los datos correctamente');
        window.location='Marca.php';
        </script>";
    }

    else{
        echo "<script>alert('No se pudieron eliminar los datos los datos');
        windows.location='Marca.php';
        </script>";
    }

?>