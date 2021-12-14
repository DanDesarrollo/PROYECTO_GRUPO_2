<?php

    // Incluir conexion
    include '../conexion/conexion.php';

    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();

    // Captura por POST de los names del formulario
    $usu_nombre = $_POST['usu_nombre'];
    $usu_apellido = $_POST['usu_primer_apellido'];
    $usu_num_documento = $_POST['usu_num_documento'];
    $rol = $_POST['id_rol'];
    $usu_correo = $_POST['usu_correo'];
    $usu_telefono = $_POST['usu_telefono'];
    $usu_imagen = $_FILES['usu_imagen']['name'];
    $clave=$_POST['usu_clave'];
    $tipo_documento_tip_doc_id = $_POST['tipo_documento_tip_doc_id'];
    $estado_est_id = 1; 
    
    //Asignarle la ruta a la imagen
    $ruta = 'imgusuario/'.$usu_imagen;
    $ruta_usu_imagen = $ruta;

    

    // Insertar responsable

    $sql="INSERT INTO  usuario (estado_est_id, id_rol, tipo_documento_tip_doc_id, usu_nombre, usu_primer_apellido, usu_telefono, usu_num_documento, usu_clave, usu_imagen, usu_correo) VALUES ('$estado_est_id','$rol','$tipo_documento_tip_doc_id','" . $usu_nombre . "','" . $usu_apellido . "','$usu_telefono','$usu_num_documento', '" . $clave . "', '" . $ruta_usu_imagen . "','" . $usu_correo . "')";

    $resultado = mysqli_query($connection->connect(), $sql);
      /* echo $sql; die();  */ 
   // echo $sql;

   if($resultado){
       // Mover archivo
       move_uploaded_file($_FILES['usu_imagen']['tmp_name'], $ruta_usu_imagen);
   }

   if ($resultado) {
       echo "<script>alert('Se ha registrado el responsable correctamente');
           window.location='Usuario.php';
           </script>";
   } else {
       echo "Error de conexion";
   }

?>