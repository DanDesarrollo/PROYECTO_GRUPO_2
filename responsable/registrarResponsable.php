<?php

// Incluir menu
include('../Menu/Menu.php');

// Incluir Nav
include('../Template/Nav.php');

// Incluir conexion                                
/* include('../conexion/conexion.php'); */

//Instancia de objeto de la clase Conexion
/* $connection = new Conexion(); */

// Conexión a la base de datos y seleccionar datos de la tabla cargo
$cargo = mysqli_query($connection->connect(), "SELECT * FROM cargo;");

// Llamamos la tabla tipo_documento
$tipo_documento = mysqli_query($connection->connect(), "SELECT * FROM tipo_documento;");

?>

<div class="row">
    <div class="col-md-6 mt-5 mx-auto">
        <div class="card">
            <p class="card-header fs-3 bold fw-bold text-center">Registrar responsable</p>
            <div class="card-body">
                <form action="insertarResponsable.php" id="formulario" method="POST" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Nombre</label>
                                <input type="text" id="nombre" class="form-control" name="res_nombre" value="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Apellido</label>
                                <input type="text" id="apellido" class="form-control" name="res_apellido" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Tipo de documento</label>
                                <select class="form-select" name="tipo_documento_tip_doc_id" id="tipodoc">
                                    <option value="0" selected>Seleccionar</option>
                                    <?php while ($td = mysqli_fetch_array($tipo_documento)) { ?>
                                        <option value="<?php echo $td['tip_doc_id'] ?>"><?php echo $td['tip_doc_descripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Numero de documento</label>
                                <input type="number" id="numerodoc" class="form-control" name="res_num_documento" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Correo</label>
                                <input type="email" id="correo" class="form-control" name="res_correo" value="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Telefono</label>
                                <input type="number" id="telefono" class="form-control" name="res_telefono" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Cargo</label>
                                <select class="form-select" name="cargo_car_id" id="cargo">
                                    <option value="0" selected>Seleccionar</option>
                                    <?php while ($car = mysqli_fetch_array($cargo)) { ?>
                                        <option value="<?php echo $car['car_id'] ?>"><?php echo $car['car_descripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Imagen</label>
                                <input type="file" class="form-control" name="res_imagen" value="" accept=".jpg , .png">
                            </div>
                        </div>
                    </div>
                    <div class="card-row  text-justify text-danger">
                        <ul class="error" id="error"></ul>
                        <div class="d-grid mb-3">
                            <input type="submit" class="btn btn-success" value="Registrar"></input>
                        </div>
                    </div>
                </form>
                <div class="card-row text-justify text-danger">
                        <form action="../responsable/responsable.php">
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-danger" value="Cancelar"></input>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script src="../js/validacionResponsable2.js"></script>
</body>

</html>