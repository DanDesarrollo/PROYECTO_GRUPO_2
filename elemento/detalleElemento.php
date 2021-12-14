<?php

// Incluir menu
include('../Menu/Menu.php');

// Incluir Nav
include('../Template/Nav.php');

/* include "../conexion/conexion.php"; */

// Instancia de la conexion
/* $connection = new Conexion(); */

$ele_id = $_GET['id'];

$detalle = mysqli_query($connection->connect(), "SELECT * FROM elemento e, marca m, estado es, usuario u, tipo_elemento t WHERE m.mar_id  = e.marca_mar_id AND es.est_id = e.estado_est_id AND u.usuario_id = e.usuario_usu_id AND t.tip_ele_id = e.tipo_elemento_tip_ele_id AND ele_id  = '$ele_id';");

// Llamamos la tabla tipo_documento
$tipo_elemento = mysqli_query($connection->connect(), "SELECT * FROM tipo_elemento");

// Llamamos la tabla marca
$marca = mysqli_query($connection->connect(), "SELECT * FROM marca");

?>

<?php

while ($registros = mysqli_fetch_array($detalle)) {

?>

    <body>


    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="card">
                <p class="card-header fs-3 bold fw-bold text-center">Detalle elemento</p>
                <div class="card-body">
                    <form action="editarelemento.php" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Nombre elemento</label>
                                    <input type="txt" id="ele_nombre" class="form-control" name="ele_nombre" value="<?php echo $registros['ele_nombre']; ?>"disabled>
                                </div>
                            </div>  
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Imagen</label><br>
                                    <img src="<?php echo $registros['ele_imagen']; ?>" accept=".jpg , .png">
                                    <!-- <input type="text" value="<?php //echo $registros['ele_imagen']; ?>" disabled> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">cantidad</label>
                                    <input type="" id="ele_cantidad" class="form-control" name="ele_cantidad" value="<?php echo $registros['ele_cantidad']; ?>"disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Serial</label>
                                    <input type="txt" id="ele_serial" class="form-control" name="ele_serial" value="<?php echo $registros['ele_serial']; ?>"disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">fecha</label>
                                    <input type="date" id="ele_fecha_registro" class="form-control" name="ele_fecha_registro" value="<?php echo $registros['ele_fecha_registro']; ?>"disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Observacion</label>
                                    <input type="txt" id="ele_observacion" class="form-control" name="ele_observacion" value="<?php echo $registros['ele_observacion']; ?>"disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Descripcion</label>
                                    <input type="text" id="descripcion" class="form-control" name="ele_descripcion" value="<?php echo $registros['ele_descripcion']; ?>"disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Modelo</label>
                                    <input type="text" id="modelo" class="form-control" name="ele_modelo" value="<?php echo $registros['ele_modelo']; ?>"disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                <label class="mb-3">Tipo de elemento</label>
                                    <select class="form-select" name="tipo_elemento_tip_ele_id" id="tipo_elemento_tip_ele_id" disabled>
                                        <option value="<?php echo $registros['tip_ele_id'] ?>" selected><?php echo $registros['tip_ele_descripcion'] ?></option>
                                        <?php while ($td = mysqli_fetch_array($tipo_elemento)) { ?>
                                            <option value="<?php echo $td['tip_ele_id'] ?>"><?php echo $td['tip_ele_descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                <label class="mb-3">Marca</label>
                                    <select class="form-select" name="marca_mar_id" id="marca_mar_id" disabled>
                                        <option value="<?php echo $registros['mar_id'] ?>" selected><?php echo $registros['mar_descripcion'] ?></option>
                                        <?php while ($td = mysqli_fetch_array($marca)) { ?>
                                            <option value="<?php echo $td['mar_id'] ?>"><?php echo $td['mar_descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
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

