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

// Incluir menu
include('../Menu/Menu.php');

// Incluir Nav
include('../Template/Nav.php');

// Incluir conexion                                
/* include('../conexion/conexion.php'); */

//Instancia de objeto de la clase Conexion
/* $connection = new Conexion(); */

// Conexión a la base de datos
$query = mysqli_query($connection->connect(), "SELECT * FROM responsable r, cargo c, estado e WHERE c.car_id = r.cargo_car_id AND e.est_id = r.estado_est_id");

?>

<div class="row justify-content-center mt-5">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header text-center border border-white">
                <p class="fs-3">Responsable</p>
            </div>
        </div>
        <br>
        <div class="card p-4 border border-4 rounded-3">
            <table class="table align-middle border border-3 text-center ">

                <div class="row">
                    <div class="col">
                        <!--  <th>ID</th> -->
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Documento</th>
                        <th>Cargo</th>
                        <th>Estado</th>
                        <th colspan="3">Acciones</th>
                    </div>
                </div>

                <?php

                while ($registros = mysqli_fetch_array($query)) {

                ?>
                    <tr>

                        <!-- <td><//?php echo $registros['res_id']; ?></td> -->
                        <td><?php echo $registros['res_nombre']; ?></td>
                        <td><?php echo $registros['res_apellido']; ?></td>
                        <td><?php echo $registros['res_num_documento']; ?></td>
                        <td><?php echo $registros['car_descripcion']; ?></td>
                        <td><?php echo $registros['est_descripcion']; ?></td>

                        <td>
                            <a href='detalleResponsable.php?id=<?php echo $registros['res_id']; ?>'><button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button></a>

                            <a href='formEditar.php?id=<?php echo $registros['res_id']; ?>'><button type="button" class="btn btn-warning"><i class="bi bi-pen text-light"></i></button></a>

                            <a href='anularResponsable.php?id=<?php echo $registros['res_id']; ?>&est=<?php echo $registros['estado_est_id']; ?>'><button type="button" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="bi bi-trash text-light"></i></a>

                        </td>

                    <tr>
                    <?php
                }
                    ?>
            </table>
            <div class="d-flex justify-content-end">
                <a href="registrarResponsable.php" type="image"><img src="../img/registry.png"></a>
            </div>
        </div>
    </div>
</div>

</body>

</html>