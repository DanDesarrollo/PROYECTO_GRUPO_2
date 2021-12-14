<?php

// Incluir conexion
include('../conexion/conexion.php');

//Instancia de objeto de la clase Conexion
$connection = new Conexion();

$tipoDocumento = $_POST['tipo_documento'];

$verificar_tipoDoc = mysqli_query($connection->connect(), "SELECT * FROM tipo_documento WHERE tip_doc_descripcion='$tipoDocumento'");
        
    if(mysqli_num_rows($verificar_tipoDoc) > 0){
        echo'
            <script>alert("Este tipo de documento ya esta registrado, intenta con otro diferente"); window.location = "./tipoDocumento.php";
            </script>
        ';
        exit();
    }


$sql = "INSERT INTO tipo_documento(tip_doc_descripcion) VALUES ('".$tipoDocumento."')";

$query =mysqli_query($connection->connect(), $sql);
/* echo $query;die(); */
echo $sql;

if($query){
    echo "<script>alert('Se ha registrado correctamente');
    window.location='tipoDocumento.php';
    </script>";
}else{
 echo "Error de conexion";
}

?>