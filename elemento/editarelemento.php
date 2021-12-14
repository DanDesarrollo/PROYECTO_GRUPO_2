<?php

    include "../conexion/conexion.php";
    
    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();

    $ele_id = $_POST['ele_id'];
    $ele_nombre = $_POST['ele_nombre'];
    $ele_cantidad = $_POST['ele_cantidad'];
    $ele_serial = $_POST['ele_serial'];
    $ele_fecha_registro = $_POST['ele_fecha_registro'];
    $ele_observacion = $_POST['ele_observacion'];
    $ele_descripcion = $_POST['ele_descripcion'];
    $ele_modelo =  $_POST['ele_modelo'];
    /* $tipo_elemento_tip_ele_id = $_POST['tipo_elemento_tip_ele_id']; */
    $marca_mar_id = $_POST['marca_mar_id'];
    $ele_imagen = $_FILES['ele_imagen']['name'];

    //Asignarle la ruta a la imagen
    $ruta = 'elementoimg/'.$ele_imagen;
    $ruta_elemento_imagen = $ruta;

    
    $sql  = "UPDATE elemento SET ele_nombre = '".$ele_nombre."', ele_imagen = '".$ruta_elemento_imagen."', ele_cantidad = '".$ele_cantidad."', ele_serial = '".$ele_serial."', ele_fecha_registro = '$ele_fecha_registro', ele_observacion = '".$ele_observacion."', ele_descripcion = '$ele_descripcion', ele_modelo = '$ele_modelo', marca_mar_id = '$marca_mar_id' WHERE ele_id= '".$ele_id."' ";
     
    /* echo $sql; die();   */
    
    if($sql){
        // Mover archivo
        move_uploaded_file($_FILES['ele_imagen']['tmp_name'], $ruta_elemento_imagen);
    }

    $resultado = mysqli_query($connection->connect(), $sql);   

    

    if($resultado){
        echo "<script>alert('Se ha editado los elementos correctamente');
        window.location='elemento.php';
        </script>";
    }else{
        echo "<script>alert('No se pudo editar los elementos correctamente');
        windows.location='elemento.php';
        </script>";
    }
?>