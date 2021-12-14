<?php

    include "../conexion/conexion.php";

    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();


    $id= $_POST['id'];
    $estado = $_POST['estado'];

    $verificar_estado = mysqli_query($connection->connect(), "SELECT * FROM estado WHERE est_descripcion='$estado'");
        
    if(mysqli_num_rows($verificar_estado) > 0){
        echo'
            <script>alert("Este estado ya esta registrado, intenta con otro diferente"); window.location = "./consultaEstados.php";
            </script>
        ';
        exit();
    }


    $actualizar = "UPDATE estado SET  est_descripcion='$estado' WHERE est_id= '$id' ";

    $resultado = mysqli_query($connection->connect(),$actualizar);   

    if ($resultado) {
    echo "<script>alert('Se han actualizado los datos correctamente');
    window.location='consultaEstados.php';
    </script>";
    }   
    else{
    echo "<script>alert('No se pudieron actualizar los datos');
    windows.location='consultaEstados.php';
    </script>";
    }
?>