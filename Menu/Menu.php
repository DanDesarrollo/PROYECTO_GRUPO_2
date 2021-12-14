<?php
session_start();
if(isset($_POST['cerrar'])){
    unset($_SESSION['usuario']);
    header("Location: ../Login/registro.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>

<body>
  <!-- MENU  -->
  <div class="menu">
    <div class="title">MENU</div>
    <ul class="nav">
      <li class="inicio"><button type="submit" value="#" class="btn btn-outline-secondary"><a href="../Dashboard/Dashboard.php" name="inicio"><img src="../img/boton-de-inicio.png" class="inicioicon"></a></li></button>
      <li class="dropdown">
        <a class="posicion-usu" class="nav dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown"></a>
        
      </li>
      <!--<li><a href="../Configure/categoria.php">Categories class="inicioicon"</a></li>-->

      <li  class="configuracionbtn" type="submit" value="#" class="btn btn-outline-secondary"><button class="btn btn-outline-secondary"><a href="../configuracion/configuracion.php" name="inicio"><img src="../img/configuraciones.png" class="configuracion"></a></li></button>
      
      <li  class="prestamobtn" type="submit" value="#" class="btn btn-outline-secondary"><button class="btn btn-outline-secondary"><a href="../prestamo/configPrestamo.php" name="prestamo"><img src="../img/web.png" class="prestamo"></a></li></button>
      <!--<li><a href="#">se modifica mas adelante</a></li>-->
      <li class="posicion-final"><form action="" method="post"><button type="submit" value="iniciar sesion" name="cerrar" class="btn btn-outline-secondary"><img src="../img/apagar.png" class="salir"></li></button></form>
    </ul>
  </div>
  <!-- FIN MENU -->

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>