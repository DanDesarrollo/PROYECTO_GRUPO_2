<?php

    // Incluir conexion
    include '../conexion/conexion.php';

    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();

    // Captura por POST de los names del formulario
    $res_nombre = $_POST['res_nombre'];
    $res_apellido = $_POST['res_apellido'];
    $res_num_documento = $_POST['res_num_documento'];
    $res_correo = $_POST['res_correo'];
    $res_telefono = $_POST['res_telefono'];
    $res_imagen = $_FILES['res_imagen']['name'];
    $cargo_car_id = $_POST['cargo_car_id'];
    $tipo_documento_tip_doc_id = $_POST['tipo_documento_tip_doc_id'];
    $estado_est_id = 1;
    $usuario_usu_id = 3; // SE PUEDE MEJORAR CON SESIONES

    //Asignarle la ruta a la imagen
    $ruta = 'imgResponsable/'.$res_imagen;
    $ruta_res_imagen = $ruta;
    // verificar dato existente en la base de datos
    $verificar_responsable = mysqli_query($connection->connect(), "SELECT * FROM responsable WHERE res_num_documento='$res_num_documento'");
        
    if(mysqli_num_rows($verificar_responsable) > 0){
        echo'
            <script>alert("El Documento del responsable ya esta registrado, intenta con otro diferente"); window.location = "./responsable.php";
            </script>
        ';
        exit();
    }
    // Insertar responsable
    $sql = "INSERT INTO responsable(cargo_car_id, estado_est_id, usuario_usu_id, tipo_documento_tip_doc_id, res_nombre, res_apellido, res_num_documento, res_correo, res_telefono, res_imagen) VALUES ('$cargo_car_id','$estado_est_id','$usuario_usu_id','$tipo_documento_tip_doc_id','" . $res_nombre . "','" . $res_apellido . "','$res_num_documento','" . $res_correo . "','$res_telefono','" . $ruta_res_imagen . "')";

    $resultado = mysqli_query($connection->connect(), $sql);
    /* echo $query;die(); */
    // echo $sql;

    if($resultado){
        // Mover archivo
        move_uploaded_file($_FILES['res_imagen']['tmp_name'], $ruta_res_imagen);
    }

    if ($resultado) {
        echo "<script>alert('Se ha registrado el responsable correctamente');
            window.location='responsable.php';
            </script>";
    } else {
        echo "Error de conexion";
    }

?>