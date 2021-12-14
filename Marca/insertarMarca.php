<?php
    include "../conexion/conexion.php";
    
    // Instancia de la conexion
    $connection = new Conexion();

    $mar_descripcion = $_POST['mar_descripcion'];

    //verificar que el dato no exista en la base de datos
    $verificar_marca = mysqli_query($connection->connect(), "SELECT * FROM marca WHERE mar_descripcion='$mar_descripcion'");
        
    if(mysqli_num_rows($verificar_marca) > 0){
        echo'
            <script>alert("Esta marca ya esta registrado, intenta con otro diferente"); window.location = "./Marca.php";
            </script>
        ';
        exit();
    }

    $insert = "INSERT INTO marca VALUES(NULL,'$mar_descripcion')";

    $resultado = mysqli_query($connection->connect(), $insert);

    echo $insert;

    if($resultado){
        echo "<script>alert('Se ha registrado correctamente');
        window.location='Marca.php';
        </script>";
    }else{
     echo "Error de conexion";
    }
    
    ?>