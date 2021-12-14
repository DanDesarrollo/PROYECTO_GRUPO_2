<?php

// Incluir conexion
include('../conexion/conexion.php');

//Instancia de objeto de la clase Conexion
$connection = new Conexion();

$descripcion_rol = $_POST['descripcionrol'];

$verificar_rol = mysqli_query($connection->connect(), "SELECT * FROM rol WHERE rol_descripcion='$descripcion_rol'");
        
    if(mysqli_num_rows($verificar_rol) > 0){
        echo'
            <script>alert("Este rol ya esta registrado, intenta con otro diferente"); window.location = "./Rol.php";
            </script>
        ';
        exit();
    }


$sql = "INSERT INTO rol(rol_descripcion) VALUES ('".$descripcion_rol."')";

$query =mysqli_query($connection->connect(), $sql);
/* echo $query;die(); */
echo $sql;

if($query){
    echo "<script>alert('Se ha registrado correctamente');
    window.location='Rol.php';
    </script>";
}else{
 echo "Error de conexion";
}

?>