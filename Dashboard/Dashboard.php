<?php
/* session_start();
if(isset($_POST['cerrar'])){
    unset($_SESSION['usuario']);
    header("Location: ../Login/registro.php");
} */
?>

<?php 
    /* if(isset($_SESSION['usuario'])){ 
      include('../Menu/Menu.php'); 
    }else{
        header('Location: ../Login/registro.php');
    } */
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menu.css">
    <title>DashBoard</title>
</head>
<body>
 
  <?php
    // Incluir menu
    include('../Menu/Menu.php');

    // Incluir Nav
    include('../Template/Nav.php');
  ?>

<!--crud de aqui para abajo-->
<h1><div class="text-center">Bienvenid@&nbsp;<?php echo utf8_decode($row['usu_nombre']." ".$row['usu_primer_apellido']);?></div></h1>
<!--crud de aqui para arriba-->
<!-- JavaScript Bundle with Popper -->
<!-- <form action="" method="post"><input type="submit" value="cerrar-sesion" name="cerrar"></form> -->
</body>
</html>
