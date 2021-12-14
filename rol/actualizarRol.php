<?php

    include "../conexion/conexion.php";
    
    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();

    $id = $_POST['id'];
    $rol = $_POST['rol'];

    $verificar_rol = mysqli_query($connection->connect(), "SELECT * FROM rol WHERE rol_descripcion='$rol'");
        
    if(mysqli_num_rows($verificar_rol) > 0){
        echo'
            <script>alert("Este rol ya esta registrado, intenta con otro diferente"); window.location = "./Rol.php";
            </script>
        ';
        exit();
    }
    
    $actualizar = "UPDATE rol SET  rol_descripcion='$rol' WHERE id_rol= '$id' ";

    $resultado = mysqli_query($connection->connect(),$actualizar);   

    if ($resultado) {
    echo "<script>alert('Se han actualizado los datos correctamente');
    window.location='Rol.php';
    </script>";
    }   
    else{
    echo "<script>alert('No se pudieron actualizar los datos');
    windows.location='Rol.php';
    </script>";
    }
?>