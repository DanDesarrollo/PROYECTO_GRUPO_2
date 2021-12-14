<?php

// Incluir conexion                                
include('../conexion/conexion.php');

//Instancia de objeto de la clase Conexion
$connection = new Conexion();

$desc = $_POST['descripcionestado'];

$verificar_estado = mysqli_query($connection->connect(), "SELECT * FROM estado WHERE est_descripcion='$desc'");
        
    if(mysqli_num_rows($verificar_estado) > 0){
        echo'
            <script>alert("Este estado ya esta registrado, intenta con otro diferente"); window.location = "./consultaEstados.php";
            </script>
        ';
        exit();
    }

$sql = "INSERT INTO estado(est_descripcion) VALUES ('".$desc."')";

$query =mysqli_query($connection->connect(), $sql);
/* echo $query;die(); */
/* echo $sql; */

if($query){
    echo "<script>alert('Se ha registrado correctamente');
    window.location='consultaEstados.php';
    </script>";
}else{
 echo "Error de conexion";
}

?>