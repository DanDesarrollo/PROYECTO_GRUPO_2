<?php

include('../conexion/conexion.php');  

//Instancia de objeto de la clase Conexion
$connection = new Conexion();

    if($connection->connect()) {

        $id =$_POST['id'];
        $categoria = $_POST['categoria'];
        
        //verificar que el dato no exista en la base de datos
        $verificar_categoria = mysqli_query($connection->connect(), "SELECT * FROM tipo_elemento WHERE tip_ele_descripcion ='$categoria'");
        
        if(mysqli_num_rows($verificar_categoria) > 0){
            echo'
                <script>alert("Esta categoria ya esta registrada, intenta con otra diferente"); window.location = "./categoria.php";
                </script>
            ';
            exit();
        }
       
        
        $actualizar = "UPDATE tipo_elemento SET  tip_ele_descripcion='$categoria' WHERE tip_ele_id= '$id' ";

        $resultado = mysqli_query($connection->connect(), $actualizar);
        
        
        if ($resultado) {
            echo "<script>alert('Se han actualizado los datos correctamente');
            window.location='categoria.php';
            </script>";
            }   
            else{
            echo "<script>alert('No se pudieron actualizar los datos');
            windows.location='categoria.php';
            </script>";
            }
    }