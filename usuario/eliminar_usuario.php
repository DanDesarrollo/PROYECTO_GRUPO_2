<?php

include "../conexion/conexion.php";

// Instanciar el
$connection = new Conexion();

$id = $_GET['id'];

/* echo "valor: ".$id; */
if($connection->connect()){

    /* captuar por GET */

    $borar= mysqli_query($connection->connect(), "DELETE FROM usuario WHERE usuario_id = ".$id);

    echo "<script>alert('Se han eliminado los datos correctamente');
    window.location='./Usuario.php';
    </script>";
}

else{
    echo "<script>alert('No se pudieron eliminar los datos los datos');
    windows.location='./Usuario.php';
    </script>";
}

?>