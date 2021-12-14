<?php
/* include POO */
session_start();
if(isset($_SESSION['usuario'])){
    header("Location: ../Dashboard/Dashboard.php");
}

include "../db.php";
include "./Usermodel.php";

?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <title>Login</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="../css/register.css" >
</head>
<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 seccion-menu">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="./img/logo sena2.png" >
                </div>
                <form id="login" class="datos col-12 " method="POST">
                    <div class="form-group" id="user-group">
                        <input type="text" class="user" placeholder="Ingrese Correo"  name="usu_correo">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="user" placeholder="Ingresar contraseña" value="iniciar sesion" name="usu_clave">
                    </div>
                    <!-- INVOCACION PARA INICIAR SESION -->
                    <button type="submit" class="btn btn-primary " name="submit"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                    <div class="inicio">
                        <?php include 'Usercontroller.php';?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>