<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro de actualizar el responsable?");

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
$responsable = mysqli_query($connection->connect(), "SELECT * FROM responsable r, cargo c, tipo_documento td WHERE c.car_id = r.cargo_car_id AND td.tip_doc_id = r.tipo_documento_tip_doc_id AND r.res_id = '$id'");

//Llamamos la tabla cargo
$cargo = mysqli_query($connection->connect(), "SELECT * FROM cargo");

//Llamamos la tabla cargo
$tipo_documento = mysqli_query($connection->connect(), "SELECT * FROM tipo_documento");

?>

<?php

while ($registros = mysqli_fetch_array($responsable)) {

?>
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="card">
                <p class="card-header fs-3 bold fw-bold text-center">Editar responsable</p>
                <div class="card-body">
                    <form action="editarResponsable.php" id="formulario" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Nombre</label>
                                    <input type="text" id="nombre" class="form-control" name="res_nombre" value="<?php echo $registros['res_nombre']; ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Apellido</label>
                                    <input type="text" id="apellido" class="form-control" name="res_apellido" value="<?php echo $registros['res_apellido']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="mb-3">Tipo de documento</label>
                                <select class="form-select" name="tipo_documento_tip_doc_id" id="tipodoc">
                                    <option value="<?php echo $registros['tip_doc_id'] ?>" selected><?php echo $registros['tip_doc_descripcion'] ?></option>
                                    <?php while ($td = mysqli_fetch_array($tipo_documento)) { ?>
                                        <option value="<?php echo $td['tip_doc_id'] ?>"><?php echo $td['tip_doc_descripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Numero de documento</label>
                                    <input type="number" id="numerodoc" class="form-control" name="res_num_documento" value="<?php echo $registros['res_num_documento']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Correo</label>
                                    <input type="email" id="correo" class="form-control" name="res_correo" value="<?php echo $registros['res_correo']; ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Telefono</label>
                                    <input type="number" id="telefono" class="form-control" name="res_telefono" value="<?php echo $registros['res_telefono']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Cargo</label>
                                    <select class="form-select" name="cargo_car_id" id="cargo">
                                        <option value="<?php echo $registros['car_id'] ?>" selected><?php echo $registros['car_descripcion'] ?></option>
                                        <?php while ($car = mysqli_fetch_array($cargo)) { ?>
                                            <option value="<?php echo $car['car_id'] ?>"><?php echo $car['car_descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Imagen</label>
                                    <input type="file" class="form-control" name="res_imagen" value="" accept=".jpg , .png , .gif , .pdf">
                                </div>
                            </div>
                        </div>
                        <div class="card-row  text-justify  btn-danger">
                                <ul id="error"></ul>
                            <div class="d-grid mb-3">
                                <input type="hidden" class="form-control" name="res_id" value="<?php echo $registros['res_id'] ?>">
                                <input type="submit" class="btn btn-success" onclick="return ConfirmDelete()" value="Editar"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>
<!-- Bundle Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="../js/validacionResponsable2.js"></script>
</body>

</html>