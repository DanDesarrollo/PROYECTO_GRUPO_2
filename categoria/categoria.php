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
    <title>Categorias</title>
</head>
<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro de eliminar la categoria?");

        if (respuesta == true) {
            return true;
        } else {
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

    // Conexión a la base de datos
    $categoria = mysqli_query($connection->connect(), "SELECT tipo_elemento.tip_ele_id, tipo_elemento.tip_ele_descripcion FROM tipo_elemento");

    ?>


    <div class="container-sm nt-5 position-relative position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card">
                    <div class="Listado  card-header text-center border border-white">
                        <h4>Listado de categorias</h4>

                        <!--<button><a style="text-decoration: none; color: black;" href="regCategoria.php">Nueva Categoria</a></button> -->
                    </div>
                </div>
                <br>
                <div class="card p-4 border border-4 rounded-3">
                    <table class="table align-middle border border-3 text-center ">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <!-- <th>ID</th> -->
                                    <th>Descripción</th>
                                    <th colspan="2">Acciones</th>
                                </div>
                            </div>
                        </div>

                        <?php

                        while ($registros = mysqli_fetch_array($categoria)) {

                        ?>
                            <tr>


                                <td><?php echo $registros['tip_ele_descripcion']; ?></td>

                                <td>

                                    <a class="me-2" href='editCategoria.php?id=<?php echo $registros['tip_ele_id']; ?>'><button type="button" class="btn btn-warning"><i class="bi bi-pen text-light"></i></button></a>

                                    <a href='eliminarCategoria.php?id=<?php echo $registros['tip_ele_id']; ?>'><button type="button" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="bi bi-trash"></i></button></a>
                                </td>

                            <tr>
                            <?php
                        }
                            ?>

                    </table>
                    <div class="d-flex justify-content-end">
                        <a href="regCategoria.php" type="image"><img src="../img/registry.png"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>




    <!--crud de aqui para arriba-->
    <!-- JavaScript Bundle with Popper -->
</body>

</html>