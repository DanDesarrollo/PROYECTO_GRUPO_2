<?php

    // Incluir conexion
    include '../conexion/conexion.php';
    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();
    
    $usuario_usu_id = $_POST['usuario_usu_id'];
    $res_id = $_POST['res_nombre'];
    $res_nombre = $_POST['res_nombre'];
    $mov_destino = $_POST['mov_destino'];
    $mov_fecha = $_POST['mov_fecha'];
    $mov_hora = $_POST['mov_hora'];
    $mov_hora_devolucion = $_POST['mov_hora_devolucion'];
    $mov_observacion = $_POST['mov_observacion'];
    $mov_cantidad = $_POST['cantidad']; 
    $tip_ele_id = 1;
    
    /* foreach($res_nombre as $index => $names)
    echo $names. " . ".$mov_destino[$index]; */
        
    $sql = "INSERT INTO movimiento(usuario_usu_id, mov_fecha, tip_ele_id, mov_destino, mov_hora, mov_hora_devolucion, mov_observacion) VALUES ('$usuario_usu_id','$mov_fecha','$tip_ele_id','" . $mov_destino . "','$mov_hora','$mov_hora_devolucion','" . $mov_observacion . "')";

    $insert = mysqli_query($connection->connect(), $sql);

    $valor = mysqli_query($connection->connect(),"SELECT MAX(mov_id) AS id FROM movimiento");
    
    if ($row = mysqli_fetch_row($valor)) {
        
        $id = trim($row[0]);
    }
    
    foreach($_POST['elemen_nombre'] AS $idHerramienta){

        $consulta = "INSERT INTO detalle_movimiento(responsable_res_id, elemento_ele_id, movimiento_mov_id) VALUES ('$res_id','$idHerramienta','$id');";
        /* echo $consulta; die(); */
        mysqli_query($connection->connect(), $consulta); 
        
       
    }
    
   
    if ($insert) {
        echo "<script>alert('Se ha registrado el responsable correctamente');
            window.location='listarHerramienta.php';
            </script>";
    } else {
        echo "Error de conexion";
    }

    
    

?>