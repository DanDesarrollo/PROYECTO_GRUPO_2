<?php

// Incluir conexion
include('../conexion/conexion.php');

//Instancia de objeto de la clase Conexion
$connection = new Conexion();

$desc = $_POST['descripcioncargo'];

$verificar_cargo = mysqli_query($connection->connect(), "SELECT * FROM cargo WHERE car_descripcion='$desc'");
        
    if(mysqli_num_rows($verificar_cargo) > 0){
        echo'
            <script>alert("Este cargo ya esta registrado, intenta con otro diferente"); window.location = "./cargo.php";
            </script>
        ';
        exit();
    }


$sql = "INSERT INTO cargo(car_descripcion) VALUES ('".$desc."')";

$query =mysqli_query($connection->connect(), $sql);
/* echo $query;die(); */
echo $sql;

if($query){
    echo "<script>alert('Se ha registrado correctamente');
    window.location='cargo.php';
    </script>";
}else{
 echo "Error de conexion";
}

?>