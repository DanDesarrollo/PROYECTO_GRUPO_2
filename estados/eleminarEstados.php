<?php

// Incluir conexion                                
include('../conexion/conexion.php');

//Instancia de objeto de la clase Conexion
$connection = new Conexion();

$id = $_GET['id'];

if($connection->connect()){

    $borrar= mysqli_query($connection->connect(), "DELETE FROM estado WHERE est_id = ".$id);
    

    echo "<script>alert('Se han eliminado los datos correctamente');
    window.location='consultaEstados.php';
    </script>";
}

else{
    echo "<script>alert('No se pudieron eliminar los datos los datos');
    windows.location='consultaEstados.php';
    </script>";
}

?>