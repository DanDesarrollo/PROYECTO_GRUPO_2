<?php

    // Incluir la conexion a la base de datos
    include "../conexion/conexion.php";
    
    //Instancia de la base de datos
    $connection = new Conexion();

    $id = $_POST['usuario_id'];
    $nombre = $_POST['usu_nombre'];
    $apellido = $_POST['usu_primer_apellido'];
    $tipo_documento = $_POST['tipo_documento_tip_doc_id'];
    $documento = $_POST['usu_num_documento'];
    $rol = $_POST['id_rol'];
    $estado = $_POST['estado_est_id'];
    $correo = $_POST['usu_correo'];
    $telefono = $_POST['usu_telefono'];
    $clave = $_POST['usu_clave'];
    $imagen = $_FILES['usu_imagen']['name'];


    //Asignarle la ruta a la imagen
    $ruta = 'usuarioimg/'.$imagen;
    $ruta_imagen = $ruta;

   

    $actualizar = "UPDATE usuario SET  usu_nombre='".$nombre."' , usu_primer_apellido ='".$apellido."' ,tipo_documento_tip_doc_id = '".$tipo_documento."' ,usu_num_documento = '".$documento."' ,id_rol = '".$rol."' ,estado_est_id = '".$estado."' ,usu_correo = '".$correo."' ,usu_telefono = '".$telefono."' ,usu_clave = '".$clave."' ,usu_imagen = '".$imagen."' WHERE usuario_id = '".$id."' ";

    /* echo $actualizar; die();  */


    if($actualizar){
        // Mover archivo
        move_uploaded_file($_FILES['usu_imagen']['tmp_name'], $ruta_imagen);
    }

    $resultado = mysqli_query($connection->Connect(),$actualizar);   

    if ($resultado) {
    echo "<script>alert('Se han actualizado los datos correctamente');
    window.location='./Usuario.php';
    </script>";
    }   
    else{
    echo "<script>alert('No se pudieron actualizar los datos');
    windows.location='./Usuario.php';
    </script>";
    }
?>