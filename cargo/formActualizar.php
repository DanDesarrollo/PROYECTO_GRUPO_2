<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro de actualizar el cargo?");

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

// Captura de ID por GET
$id = $_GET["id"];

// Conexión a la base de datos y query
$cargo = mysqli_query($connection->connect(), "SELECT * FROM cargo WHERE car_id = '$id'");

while ($registros = mysqli_fetch_array($cargo)) {

?>
        <div class="row">
            <div class="col-md-4 mt-5 mx-auto">
                <div class="card">
                    <p class="card-header fs-3 bold fw-bold text-center">Editar cargo</p>
                    <div class="card-body">
                        <form action="actualizaCargo.php" method="POST">
                            <div class="mb-3">
                                <label class="mb-3">Descripcion del cargo</label>
                                <input type="text" id="nombre" class="form-control" name="cargo" value="<?php echo $registros['car_descripcion']; ?>">
                            </div>
                            <div class="d-grid mb-3">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $registros['car_id'] ?>">
                                <input type="submit" onclick="/* return enviarFormulario(); */return ConfirmDelete()" class="btn btn-success" value="Editar"></input>
                            </div>
                        </form>
                        <div id="error" class="text-center"></div> <!-- Validacion -->
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>
    <!-- Bundle Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/validacion.js"></script>
</body>

</html>