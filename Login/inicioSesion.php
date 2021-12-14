<?php


    
?>

 <!-- include '../conexion/conexion.php';

    class InicioSesion {
     
        // Función Login
        public function login($usu_nombre,$usu_clave) {

            //Instancia de la base de datos
            $connection = new Conexion();  

            // Consultar los datos para el login de usuario
            $query = mysqli_query($connection->connect(),"SELECT * FROM usuario WHERE usu_nombre='".$usu_nombre."' and usu_clave='".$usu_clave."'");
            $nr = mysqli_num_rows($query);

            if(!isset($_SESSION['usu_nombre'])) {

                if($nr == 1) {
                    $_SESSION['usuario']=$usu_nombre;
                    header("location:../Dashboard/Dashboard.php");
                }
                elseif($nr == 0) {
                    echo "<script>alert('Usuario no existe');window.location= 'registro.php' </script>";
                }
            }
        }
    }  -->