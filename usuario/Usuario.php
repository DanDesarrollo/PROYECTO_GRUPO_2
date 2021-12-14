<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro de cambiar el estado?");

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php

include('../Menu/Menu.php');

include('../Template/Nav.php');

/* // Incluir conexion                                
include('../conexion/conexion.php');

//Instancia de objeto de la clase Conexion
$connection = new Conexion(); */

// Conexión a la base de datos
$usuario = mysqli_query($connection->connect(), "SELECT * FROM usuario u, estado e WHERE e.est_id = u.estado_est_id");

// Incluir menu
/* include('../Menu/Menu.php'); */

// Incluir Nav
/* include('../Template/Nav.php'); */

?>



<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center border border-white">
                <h4>Listado de Usuarios</h4>
            </div>
        </div>
        <br>
        <div class="card p-4 border border-4 rounded-3">
            <table class="table align-middle border border-3 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <th>Nombre</th>
                            <th>Clave</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </div>
                    </div>
                </div>

                <?php

                while ($registros = mysqli_fetch_array($usuario)) {

                ?>
                    <tr>


                        <td><?php echo $registros['usu_nombre']; ?></td>
                        <td><?php echo $registros['usu_clave']; ?></td>
                        <td><?php echo $registros['est_descripcion']; ?></td>




                        <td>

                            <a href='usuariodetalles.php?id=<?php echo $registros['usuario_id']; ?>'><button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button></a>

                            <a href='FormActualizar.php?id=<?php echo $registros['usuario_id']; ?>'><button type="button" class="btn btn-warning"><i class="bi bi-pen text-light"></i></button></a>

                            <a href='anularUsuario.php?id=<?php echo $registros['usuario_id']; ?>&est=<?php echo $registros['estado_est_id']; ?>'><button type="button" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="bi bi-trash text-light"></i></a>
                        </td>
                    <tr>
                    <?php
                }

                    ?>

            </table>
            <div class="d-flex justify-content-end">
                <a href="./registrousuario.php" type="image"><img src="../img/registry.png"></a>
            </div>

        </div>

    </div>
</div>
</div>






<!--crud de aqui para arriba-->
</body>

</html>