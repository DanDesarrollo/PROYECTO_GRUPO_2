<?php

// Incluir menu
include('../Menu/Menu.php');

// Incluir Nav
include('../Template/Nav.php');

// Incluir conexion                                
/* include('../cone.php');
$acceso=conectar(); */
//Instancia de objeto de la clase Conexion
/* $connection = new Conexion(); */

// Conexión a la base de datos
$query = mysqli_query($connection->connect(), "SELECT DISTINCT tip_ele_descripcion, res_nombre, res_apellido, mov_fecha, mov_hora_devolucion, mov_id FROM estado,movimiento, detalle_movimiento, responsable, tipo_elemento WHERE tipo_elemento.tip_ele_id = movimiento.tip_ele_id AND movimiento.mov_id = detalle_movimiento.movimiento_mov_id AND responsable.res_id = detalle_movimiento.responsable_res_id AND movimiento.tip_ele_id = movimiento.tip_ele_id");

/* $consult =  mysqli_query($connection->connect(), "SELECT ele_nombre FROM movimiento, detalle_movimiento, elemento, tipo_elemento WHERE tipo_elemento.tip_ele_id = movimiento.tip_ele_id AND detalle_movimiento.elemento_ele_id = elemento.ele_id AND movimiento.tip_ele_id = 1"); */

?>

<div class="row justify-content-center mt-5">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header text-center border border-white">
                <p class="fs-3">Devolucion</p>
            </div>
        </div>
        <br>
        <div class="card p-4 border border-4 rounded-3">
            <table class="table align-middle border border-3 text-center ">

                <div class="row">
                    <div class="col">
                        <th>Responsable</th>
                        <!-- <th>Fecha</th>
                        <th>Hora devolucion</th> -->
                        <th>Tipo prestamo</th>
                        <th colspan="3">Acciones</th>
                    </div>
                </div>

                <?php

                while ($registros = mysqli_fetch_array($query)) {

                ?>
                    <tr>

                        <td><?php echo $registros['res_nombre']; ?> <?php echo $registros['res_apellido'] ?></td>
                        <td><?php echo $registros['tip_ele_descripcion']; ?></td>
                        <td>
                            <a type="button" class="btn btn-primary" id="" href="javascript:void(0)" onClick="mostrarDetalle(<?php echo $registros['mov_id']; ?>)">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href='anularElemento.php?id=<?php echo $registros['mov_id']; ?>&est=<?php echo $registros['est_descripcion']; ?>'><button type="button" class="btn btn-danger"><i class="bi bi-trash text-light"></i></a>

                        </td>

                    <tr>
                    <?php
                }
                    ?>
            </table>
            <div class="d-flex justify-content-end">
                <a href="formHerramienta.php" type="image"><img src="../img/registry.png"></a>
            </div>
            
            <?php
            
            /* $consult =  mysqli_query($connection->connect(), "SELECT ele_nombre, mov_id FROM movimiento, detalle_movimiento, elemento, tipo_elemento WHERE tipo_elemento.tip_ele_id = movimiento.tip_ele_id AND movimiento.mov_id = detalle_movimiento.movimiento_mov_id AND detalle_movimiento.elemento_ele_id = elemento.ele_id AND movimiento.tip_ele_id = 1"); */
            
            /* while ($registros = mysqli_fetch_array($consult)) { */

            ?>
                
            </div>
        </div>
    </div>
</div>
<div id="divModal"></div>
</body>

</html>
<script>

function mostrarDetalle(id) {
        var ruta = './minimodal3.php?detalle=' + id;
        $.get(ruta,function(data) {
            $('#divModal').html(data);
            $('#staticBackdrop').modal('show');
        })
    }


</script>