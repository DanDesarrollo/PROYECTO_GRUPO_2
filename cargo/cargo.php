<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro de eliminar el cargo?");

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
/* include('../conexion/conexion.php');
 */
//Instancia de objeto de la clase Conexion
/* $connection = new Conexion(); */

// Conexión a la base de datos
$cargo = mysqli_query($connection->connect(), "SELECT * FROM cargo");

?>


<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header text-center border border-white">
                <p class="fs-3">Cargos</p>
            </div>
        </div>
        <br>
        <div class="card p-4 border border-4 rounded-3">
            <table class="table align-middle border border-3 text-center">

                <div class="row">
                    <div class="col">
                        <th>Cargo</th>
                        <th colspan="2">Acciones</th>
                    </div>
                </div>

                <?php

                while ($registros = mysqli_fetch_array($cargo)) {

                ?>
                    <tr>

                        <td><?php echo $registros['car_descripcion']; ?></td>

                        <td>
                            <a class="me-2" href='formActualizar.php?id=<?php echo $registros['car_id']; ?>'><button type="button" class="btn btn-warning"><i class="bi bi-pen text-light"></i></button></a>
                            <a href='eliminarCargo.php?id=<?php echo $registros['car_id']; ?>'><button type="button" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="bi bi-trash"></i></button></a>
                        </td>


                    <tr>
                    <?php
                }
                    ?>
            </table>
            <div class="d-flex justify-content-end">
                <a href="registrarCargo.php" type="image"><img src="../img/registry.png"></a>
            </div>
        </div>
    </div>
</div>
</body>

</html>