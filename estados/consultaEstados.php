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
    <title>Estados</title>
</head>
<script type="text/javascript">
        function ConfirmDelete(){
            var respuesta = confirm("¿Estas seguro de eliminar el estado?");

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

    // Incluir menu
    include('../Menu/Menu.php');

    // Incluir Nav
    include('../Template/Nav.php');

    // Conexión a la base de datos y query
    $estado=mysqli_query($connection->connect(), "SELECT * FROM estado");
    
?>

    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center border border-white">
                    <p class="fs-3">Estados</p>
                </div>
            </div>
            <br>
            <div class="card p-4 border border-4 rounded-3">
                <table class="table align-middle border border-3 text-center">

                    <div class="row">
                        <div class="col">
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </div>
                    </div>

                    <?php

                    while ($registros = mysqli_fetch_array($estado)) {

                    ?>
                        <tr>

                            <td><?php echo $registros['est_descripcion']; ?></td>
                            <td>
                            <a class="me-2" href='formActualizarEstados.php?id=<?php echo $registros['est_id']; ?>'><button type="button" class="btn btn-warning"><i class="bi bi-pen text-light"></i></button></a>

                            <a href='eleminarEstados.php?id=<?php echo $registros['est_id']; ?>'><button type="button" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="bi bi-trash"></i></button></a>
                            </td>
                            
                            
                        <tr>
                        <?php
                    }
                        ?>
                </table>
                <div class="d-flex justify-content-end">
                    <a href="registrarEstados.php" type="image"><img src="../img/registry.png"></a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
