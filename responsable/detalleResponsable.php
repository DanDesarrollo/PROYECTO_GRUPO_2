    <?php

    // Incluir menu
    include('../Menu/Menu.php');

    // Incluir Nav
    include('../Template/Nav.php');

    /* include "../conexion/conexion.php"; */

    // Instancia de la conexion
    /* $connection = new Conexion(); */

    $res_id = $_GET['id'];

    /* $detalle = mysqli_query($connection->connect(), "SELECT * FROM responsable r, tipo_documento t, estado e WHERE t.tip_doc_id = r.tipo_documento_tip_doc_id AND e.est_id = r.estado_est_id AND res_id = '$res_id';"); */
    
    // Conexión a la base de datos y query
    $responsable = mysqli_query($connection->connect(), "SELECT * FROM responsable r, cargo c, tipo_documento td WHERE c.car_id = r.cargo_car_id AND td.tip_doc_id = r.tipo_documento_tip_doc_id AND r.res_id = '$res_id'");
    
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
                <p class="card-header fs-3 bold fw-bold text-center">Detalle responsable</p>
                <div class="card-body">
                    <form action="editarResponsable.php" id="formulario" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Nombre</label>
                                    <input type="text" id="nombre" class="form-control" name="res_nombre" value="<?php echo $registros['res_nombre']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Apellido</label>
                                    <input type="text" id="apellido" class="form-control" name="res_apellido" value="<?php echo $registros['res_apellido']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="mb-3">Tipo de documento</label>
                                <select class="form-select" name="tipo_documento_tip_doc_id" id="tipodoc" disabled>
                                    <option value="<?php echo $registros['tip_doc_id'] ?>" selected><?php echo $registros['tip_doc_descripcion'] ?></option>
                                    <?php while ($td = mysqli_fetch_array($tipo_documento)) { ?>
                                        <option value="<?php echo $td['tip_doc_id'] ?>"><?php echo $td['tip_doc_descripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Numero de documento</label>
                                    <input type="number" id="numerodoc" class="form-control" name="res_num_documento" value="<?php echo $registros['res_num_documento']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Correo</label>
                                    <input type="email" id="correo" class="form-control" name="res_correo" value="<?php echo $registros['res_correo']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Telefono</label>
                                    <input type="number" id="telefono" class="form-control" name="res_telefono" value="<?php echo $registros['res_telefono']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Cargo</label>
                                    <select class="form-select" name="cargo_car_id" id="cargo" disabled>
                                        <option value="<?php echo $registros['car_id'] ?>" selected><?php echo $registros['car_descripcion'] ?></option>
                                        <?php while ($car = mysqli_fetch_array($cargo)) { ?>
                                            <option value="<?php echo $car['car_id'] ?>"><?php echo $car['car_descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Imagen</label><br>
                                    <img src="<?php echo $registros['res_imagen']; ?>" accept=".jpg , .png">
                                </div>
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
</body>

</html>

   