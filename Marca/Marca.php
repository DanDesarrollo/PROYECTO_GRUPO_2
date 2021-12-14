<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro de eliminar la marca?");

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

/* // Incluir conexion
include('../conexion/conexion.php');

//Instancia de objeto de la clase Conexion
$connection = new Conexion(); */


// Consulta para seleccionar todos los datos de la tabla marca
$marca = mysqli_query($connection->connect(), "SELECT * FROM marca");

?>


<div class="row justify-content-center mt-5 ">
    <div class="col-md-6">
        <div class="card ">
            <div class="Listado card-header text-center border border-white  ">
                <h4>Listado de marcas</h4>
            </div>

        </div>


        <br>
        <div class="card p-4 border border-4 rounded-3">
            <table class="table align-middle border border-3 text-center ">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <th>ID</th>
                            <th>Marca</th>
                            <th colspan="2">Acciones</th>
                        </div>
                    </div>
                </div>

                <?php

                while ($registros = mysqli_fetch_array($marca)) {

                ?>
                    <tr>

                        <td><?php echo $registros['mar_id']; ?></td>
                        <td><?php echo $registros['mar_descripcion']; ?></td>

                        <td>
                            
                            <a href='editarMarca.php?id=<?php echo $registros['mar_id']; ?>'> <button type="button" class="btn btn-warning"><i class="bi bi-pen text-light"></i></button></a>
                            <a href='eliminarMarca.php?id=<?php echo $registros['mar_id']; ?>'><button type="button" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="bi bi-trash"></i></button></a>
                        </td>

                    <tr>
                    <?php
                }

                    ?>

            </table>
            <div class="d-flex justify-content-end">
                <a href="./registrarMarca.php" type="image"><img src="../img/registry.png"></a>
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