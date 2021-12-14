<?php

    // Incluir conexion
    include '../conexion/conexion.php';

    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();

    // Captura por POST de los names del formulario
    $ele_nombre = $_POST['ele_nombre'];
    $ele_imagen = $_FILES['ele_imagen']['name'];
    $ele_cantidad = $_POST['ele_cantidad'];
    $ele_serial = $_POST['ele_serial'];
    $ele_fecha_registro = $_POST['ele_fecha_registro'];
    $ele_observacion = $_POST['ele_observacion'];
    $ele_descripcion = $_POST['ele_descripcion'];
    $ele_modelo =  $_POST['ele_modelo'];
    $tipo_elemento_tip_ele_id = $_POST['tipo_elemento'];
    $marca_mar_id = $_POST['marca_mar_id']; 
    $estado_est_id = 6;
    $usuario_usu_id = 4; 


    //Asignarle la ruta a la imagen
    $ruta = 'elementoimg/'.$ele_imagen;
    $ruta_elemento_imagen = $ruta;


    // Insertar responsable
    $sql = "INSERT INTO elemento(estado_est_id, usuario_usu_id, tipo_elemento_tip_ele_id, marca_mar_id, ele_nombre, ele_descripcion, ele_cantidad , ele_modelo, ele_serial, ele_imagen, ele_observacion, ele_fecha_registro) VALUES ('$estado_est_id','$usuario_usu_id','$tipo_elemento_tip_ele_id','$marca_mar_id','" . $ele_nombre . "','" . $ele_descripcion . "','$ele_cantidad','".$ele_modelo."','$ele_serial','" .$ruta_elemento_imagen. "','".$ele_observacion."','$ele_fecha_registro')";
   /*  echo $sql; die(); */

    $resultado = mysqli_query($connection->connect(), $sql);
     /* echo $query;die();  */
    // echo $sql;

    if($resultado){
        // Mover archivo
        move_uploaded_file($_FILES['ele_imagen']['tmp_name'], $ruta_elemento_imagen);
    }

    if ($resultado) {
        echo "<script>alert('Se ha registrado el responsable correctamente');
            window.location='elemento.php';
            </script>";
    } else {
        echo "Error de conexion";
    }

?>