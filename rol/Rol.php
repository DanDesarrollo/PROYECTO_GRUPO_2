<?php

  // Incluir menu
  include('../Menu/Menu.php');

  // Incluir Nav
  include('../Template/Nav.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="../css/menu.css">
    <!-- icono -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Rol</title>
</head>
<script type="text/javascript">
        function ConfirmDelete(){
            var respuesta = confirm("¿Estas seguro de eliminar el rol?");

            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }   

</script>
<body>
    <?php

    // Incluir conexion                                
    /* include('../conexion/conexion.php'); */

    //Instancia de objeto de la clase Conexion
    /* $connection = new Conexion(); */

    // Conexión a la base de datos
    $rol = mysqli_query($connection->connect(), "SELECT * FROM rol");

    ?>

    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center border border-white">
                    <p class="fs-3">Roles</p>
                </div>
            </div>
            <br>
            <div class="card p-4 border border-4 rounded-3">
                <table class="table align-middle border border-3 text-center">

                    <div class="row">
                        <div class="col">
                            <th>Rol</th>
                            <th colspan="2">Acciones</th>
                        </div>
                    </div>

                    <?php

                    while ($registros = mysqli_fetch_array($rol)) {

                    ?>
                        <tr>

                            <td><?php echo $registros['rol_descripcion']; ?></td>

                            <td>
                            <a class="me-2" href='editarRol.php?id=<?php echo $registros['id_rol']; ?>'><button type="button" class="btn btn-warning"><i class="bi bi-pen text-light"></i></button></a>

                            <a href='eliminarRol.php?id=<?php echo $registros['id_rol']; ?>'><button type="button" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="bi bi-trash"></i></button></a>
                            </td>
                            
                            
                        <tr>
                        <?php
                    }
                        ?>
                </table>
                <div class="d-flex justify-content-end">
                    <a href="registrarRol.php" type="image"><img src="../img/registry.png"></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
