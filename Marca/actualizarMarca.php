<?php

include "../conexion/conexion.php";
    
//Instancia de objeto de la clase Conexion
$connection = new Conexion();



    $id=$_POST['id'];
    $mar_descripcion=$_POST['marca'];

    //verificar que el dato no exista en la base de datos
    $verificar_marca = mysqli_query($connection->connect(), "SELECT * FROM marca WHERE mar_descripcion='$mar_descripcion'");
        
    if(mysqli_num_rows($verificar_marca) > 0){
        echo'
            <script>alert("Esta marca ya esta registrada, intenta con otro diferente"); window.location = "./Marca.php";
            </script>
        ';
        exit();
    }

    $update = "UPDATE marca SET mar_descripcion='$mar_descripcion' WHERE mar_id='$id'";

    $resultado = mysqli_query($connection->connect(), $update);

        if($resultado){
            echo "<script>alert('Se han actualizado los datos correctamente');
            window.location='Marca.php';</script>";
        }
?>