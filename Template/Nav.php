<?php

include "../conexion/conexion.php";

$connection = new Conexion();

/* session_start() */

 $iduser = $_SESSION['usuario'];

        $sql = "SELECT * FROM usuario WHERE usuario_id = '$iduser'";
        $resultado = mysqli_query($connection->connect(), $sql);
        $row = $resultado->fetch_assoc(); 
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <!-- LINK DE JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body>
    <!-- NAV -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid ">
            <h3 class="fw-bold"><img src="../img/logo-de-SENA-png-Negro.png">&nbsp;Proyecto - Almacen CDTI </h3>
            <a class="linkdeldas" href="../Dashboard/Dashboard.php"><img src="../img/casa.png" class="casa">&nbsp;Inicio</a>
        </div>
    </nav>
    <!-- FIN NAV -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>