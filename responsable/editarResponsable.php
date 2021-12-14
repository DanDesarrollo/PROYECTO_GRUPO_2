<?php

    include "../conexion/conexion.php";
    
    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();

    $res_id = $_POST['res_id'];
    $res_nombre = $_POST['res_nombre'];
    $res_apellido = $_POST['res_apellido'];
    $res_num_documento = $_POST['res_num_documento'];
    $res_correo = $_POST['res_correo'];
    $res_telefono = $_POST['res_telefono'];
    $cargo_car_id = $_POST['cargo_car_id'];
    $res_imagen = $_FILES['res_imagen']['name'];

    //Asignarle la ruta a la imagen
    $ruta = 'imgResponsable/'.$res_imagen;
    $ruta_res_imagen = $ruta;
    // verificar dato existente en la base de datos
    $verificar_responsable = mysqli_query($connection->connect(), "SELECT * FROM responsable WHERE res_num_documento='$res_num_documento'");
        
    // if(mysqli_num_rows($verificar_responsable) > 0){
    //     echo'
    //         <script>alert("El Documento del responsable ya esta registrado, intenta con otro diferente"); window.location = "./responsable.php";
    //         </script>
    //     ';
    //     exit();
    // }
    
    $sql = "UPDATE responsable SET res_nombre = '".$res_nombre."', res_apellido = '".$res_apellido."', res_num_documento = '$res_num_documento', res_correo = '".$res_correo."', res_telefono = '$res_telefono', cargo_car_id = '$cargo_car_id', res_imagen = '".$ruta_res_imagen."' WHERE res_id= '$res_id' ";

    if($sql){
        // Mover archivo
        move_uploaded_file($_FILES['res_imagen']['tmp_name'], $ruta_res_imagen);
    }

    $resultado = mysqli_query($connection->connect(), $sql);   

    if($resultado){
        echo "<script>alert('Se ha editado el responable correctamente');
        window.location='responsable.php';
        </script>";
    }else{
        echo "<script>alert('No se pudo editar el responsable correctamente');
        windows.location='responsable.php';
        </script>";
    }
?>