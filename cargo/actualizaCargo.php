<?php

    include "../conexion/conexion.php";
    
    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();

    $id = $_POST['id'];
    $cargo = $_POST['cargo'];

    $verificar_cargo = mysqli_query($connection->connect(), "SELECT * FROM cargo WHERE car_descripcion='$cargo'");
        
    if(mysqli_num_rows($verificar_cargo) > 0){
        echo'
            <script>alert("Este cargo ya esta registrado, intenta con otro diferente"); window.location = "./cargo.php";
            </script>
        ';
        exit();
    }
    
    $actualizar = "UPDATE cargo SET  car_descripcion='$cargo' WHERE car_id= '$id' ";

    $resultado = mysqli_query($connection->connect(),$actualizar);   

    if ($resultado) {
    echo "<script>alert('Se han actualizado los datos correctamente');
    window.location='cargo.php';
    </script>";
    }   
    else{
    echo "<script>alert('No se pudieron actualizar los datos');
    windows.location='cargo.php';
    </script>";
    }
?>