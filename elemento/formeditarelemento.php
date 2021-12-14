<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>actualizar</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
</head>
<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro de actualizar el elemento?");

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
/* $connection = new Conexion();
 */
// Captura de ID por GET
$id = $_GET["id"];

// Conexión a la base de datos y query
$elemento = mysqli_query($connection->connect(), "SELECT * FROM elemento el, marca m, tipo_elemento t WHERE m.mar_id  = el.marca_mar_id AND t.tip_ele_id = el.tipo_elemento_tip_ele_id AND el.ele_id  = '$id'");

// Llamamos la tabla tipo_documento
$tipo_elemento = mysqli_query($connection->connect(), "SELECT * FROM tipo_elemento");

// Llamamos la tabla marca
$marca = mysqli_query($connection->connect(), "SELECT * FROM marca");

?>

<?php

while ($registros = mysqli_fetch_array($elemento)) {

?>

    <body>


    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="card">
                <p class="card-header fs-3 bold fw-bold text-center">Editar elemento</p>
                <div class="card-body">
                    <form action="editarelemento.php" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Nombre elemento</label>
                                    <input type="txt" id="ele_nombre" class="form-control" name="ele_nombre" value="<?php echo $registros['ele_nombre']; ?>">
                                </div>
                            </div>  
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Imagen</label>
                                    <input type="file" class="form-control" name="ele_imagen" value="<?php echo $registros['ele_imagen']; ?>" accept=".jpg , .png">
                                    <!-- <input type="text" value="<?php //echo $registros['ele_imagen']; ?>" disabled> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">cantidad</label>
                                    <input type="" id="ele_cantidad" class="form-control" name="ele_cantidad" value="<?php echo $registros['ele_cantidad']; ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Serial</label>
                                    <input type="txt" id="ele_serial" class="form-control" name="ele_serial" value="<?php echo $registros['ele_serial']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">fecha</label>
                                    <input type="date" id="ele_fecha_registro" class="form-control" name="ele_fecha_registro" value="<?php echo $registros['ele_fecha_registro']; ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Observacion</label>
                                    <input type="txt" id="ele_observacion" class="form-control" name="ele_observacion" value="<?php echo $registros['ele_observacion']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Descripcion</label>
                                    <input type="text" id="descripcion" class="form-control" name="ele_descripcion" value="<?php echo $registros['ele_descripcion']; ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Modelo</label>
                                    <input type="text" id="modelo" class="form-control" name="ele_modelo" value="<?php echo $registros['ele_modelo']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                <label class="mb-3">Tipo de elemento</label>
                                    <select class="form-select" name="tipo_elemento_tip_ele_id" id="tipo_elemento_tip_ele_id">
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
                                    <select class="form-select" name="marca_mar_id" id="marca_mar_id">
                                        <option value="<?php echo $registros['mar_id'] ?>" selected><?php echo $registros['mar_descripcion'] ?></option>
                                        <?php while ($td = mysqli_fetch_array($marca)) { ?>
                                            <option value="<?php echo $td['mar_id'] ?>"><?php echo $td['mar_descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="d-grid mb-3">
                                    <input type="hidden" class="form-control" name="ele_id" value="<?php echo $id ?>">
                                    <input type="submit" class="btn btn-success" onclick="return ConfirmDelete()" value="Editar"></input>
                                </div>
                            </div>
                    </form>
                    <div id="Error" class="text-center"></div> <!-- Validacion -->
                </div>
            </div>
        </div>
    </div>

    <?php
}
    ?>
    <!-- Bundle Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/validacionResponsable.js"></script>    
</body>

</html>