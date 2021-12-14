<?php

    include "../conexion/conexion.php";

    // Instancia de la conexion
    $connection = new Conexion();

    $id = $_GET['id'];

    if($connection->connect()){

        $borrar= mysqli_query($connection->connect(), "DELETE FROM rol WHERE id_rol = ".$id);
        

        echo "<script>alert('Se han eliminado los datos correctamente');
        window.location='Rol.php';
        </script>";
    }

    else{
        echo "<script>alert('No se pudieron eliminar los datos los datos');
        windows.location='Rol.php';
        </script>";
    }

?>