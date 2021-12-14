<?php

include('../conexion/conexion.php');  
// Instancia de la conexion
$connection = new Conexion();

    if($connection->connect()) {

        $desc = $_POST['descri'];
        
        //verificar que el dato no exista en la base de datos
        $verificar_categoria = mysqli_query($connection->connect(), "SELECT * FROM tipo_elemento WHERE tip_ele_descripcion ='$desc'");

        if(mysqli_num_rows($verificar_categoria) > 0){
            echo'
                <script>alert("Esta categoria ya esta registrada, intenta con otra diferente"); window.location = "./categoria.php";
                </script>
            ';
            exit();
        }
        
        $insertarCat = "INSERT INTO tipo_elemento(tip_ele_descripcion)
        VALUES('".$desc."')";


        $resultado = mysqli_query($connection->connect(), $insertarCat);
        
        

        if($resultado){
            
            echo "<script>alert('Se ha registrado correctamente');
            window.location='categoria.php';
            </script>";
        }else{
            echo 'error';
            //header('Location: form.php');
        }
    } else {
        echo "NO SE PUDO CONECTAR.";
    }
    //die(); // se usa para que todo lo que este despues del die No se ejecute.
