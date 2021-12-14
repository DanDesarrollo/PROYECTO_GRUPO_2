<?php

    include "../conexion/conexion.php";

    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();

    $mov_id = $_POST['mov_id'];
    $detalle_id = $_POST['det_mov_id'];
    $usuario_usu_id = $_POST['usuario_usu_id'];
    $res_id = $_POST['res_nombre'];
    $mov_destino = $_POST['mov_destino'];
    $mov_observacion = $_POST['mov_observacion'];

    $sql = "UPDATE movimiento SET usuario_usu_id = '$usuario_usu_id', mov_destino = '".$mov_destino."', mov_observacion = '".$mov_observacion."' WHERE mov_id = '".$mov_id."' ";

    /* echo $sql; die(); */

     $update = mysqli_query($connection->connect(), $sql);

    $valor = mysqli_query($connection->connect(),"SELECT MAX(mov_id) AS id FROM movimiento");

    if ($row = mysqli_fetch_row($valor)) {
        
        $id = trim($row[0]);
    }  
    
    foreach($_POST['elemen_nombre'] AS $idHerramienta){

    $consulta = mysqli_query($connection->connect(), "DELETE FROM detalle_movimiento WHERE movimiento_mov_id = ".$id);
    
    }

    foreach($_POST['elemen_nombre'] AS $idHerramienta){

        $consultas = "INSERT INTO detalle_movimiento(responsable_res_id, elemento_ele_id, movimiento_mov_id) VALUES ('$res_id','$idHerramienta','$id');";
        
         mysqli_query($connection->connect(), $consultas); 
        
       
    }  

    if ($consulta) {
        echo "<script>alert('Se ha actualizado el prestamo correctamente');
            window.location='listarHerramienta.php';
            </script>";
    } else {
        echo "Error de conexion";
    }




?>