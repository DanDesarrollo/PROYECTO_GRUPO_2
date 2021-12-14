<?php

include "../conexion/conexion.php";
    
//Instancia de objeto de la clase Conexion
$connection = new Conexion();



    $id=$_POST['id'];
    $tipoDocumento=$_POST['tipo_documento'];

    //verificar que el dato no exista en la base de datos
    $verificar_tipoDoc = mysqli_query($connection->connect(), "SELECT * FROM tipo_documento WHERE tip_doc_descripcion='$tipoDocumento'");
        
    if(mysqli_num_rows($verificar_tipoDoc) > 0){
        echo'
            <script>alert("Este tipo de documento ya esta registrado, intenta con otro diferente"); window.location = "./tipoDocumento.php";
            </script>
        ';
        exit();
    }

    $update = "UPDATE tipo_documento SET tip_doc_descripcion='$tipoDocumento' WHERE tip_doc_id='$id'";

    $resultado = mysqli_query($connection->connect(), $update);

        if($resultado){
            echo "<script>alert('Se han actualizado los datos correctamente');
            window.location='tipoDocumento.php';</script>";
        }
        else{
            echo "<script>alert('No se pudieron actualizar los datos');
            windows.location='categoria.php';
            </script>";
            }
    
?>