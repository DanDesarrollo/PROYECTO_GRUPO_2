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
$query = mysqli_query($connection->connect(), "SELECT * FROM elemento e, marca m, tipo_elemento t, estado s WHERE m.mar_id  = e.marca_mar_id AND t.tip_ele_id = e.tipo_elemento_tip_ele_id AND s.est_id = e.estado_est_id");

?>

<div class="row justify-content-center mt-5">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header text-center border border-white">
                <p class="fs-3">Elementos</p>
            </div>
        </div>
        <br>
        <div class="card p-4 border border-4 rounded-3">
            <table class="table align-middle border border-3 text-center ">

                <div class="row">
                    <div class="col">
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Nombre </th>
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th colspan="3">Acciones</th>
                    </div>
                </div>

                <?php

                while ($registros = mysqli_fetch_array($query)) {

                ?>
                    <tr>

                        <td><?php echo $registros['tip_ele_descripcion']; ?></td>
                        <td><?php echo $registros['mar_descripcion']; ?></td>
                        <td><?php echo $registros['ele_nombre']; ?></td>
                        <td><?php echo $registros['ele_cantidad']; ?></td>
                        <td><img src="<?php echo $registros['ele_imagen']; ?>"></td>
                        <td><?php echo $registros['est_descripcion']; ?></td>

                        <td>
                            <a href='detalleElemento.php?id=<?php echo $registros['ele_id']; ?>'><button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button></a>

                            <a href='formeditarelemento.php?id=<?php echo $registros['ele_id']; ?>'><button type="button" class="btn btn-warning"><i class="bi bi-pen text-light"></i></button></a>

                            <a href='anularElemento.php?id=<?php echo $registros['ele_id']; ?>&est=<?php echo $registros['estado_est_id']; ?>'><button type="button" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="bi bi-trash text-light"></i></a>

                        </td>

                    <tr>
                    <?php
                }
                    ?>
            </table>
            <div class="d-flex justify-content-end">
                <a href="registrarElemento.php" type="image"><img src="../img/registry.png"></a>
            </div>
        </div>
    </div>
</div>

</body>

</html>