
<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro de realizar el registro?");

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php

// Incluir conexion                                
/*  include('../conexion/conexion.php');
  */
//Instancia de objeto de la clase Conexion
/* $connection = new Conexion(); */

// Incluir menu
include('../Menu/Menu.php');

// Incluir Nav
include('../Template/Nav.php');

// Conexión a la base de datos
$responsable = mysqli_query($connection->connect(), "SELECT * FROM usuario");

// Llamamos la tabla tipo_documento
$tipo_documento = mysqli_query($connection->connect(), "SELECT * FROM tipo_documento;");

//Tipo de rol
$tipo_rol = mysqli_query($connection->connect(), "SELECT * FROM rol;");

//Tipo de estado
 $tipo_estado = mysqli_query($connection->connect(), "SELECT * FROM estado;");


?>

<body>
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="card">
                <p class="card-header fs-3 bold fw-bold text-center">Registrar usuario</p>
                <div class="card-body">
                    <form action="insertarusuario.php" id="formulario" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Nombre</label>
                                    <input type="text" id="nombre" class="form-control" name="usu_nombre" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Apellido</label>
                                    <input type="text" id="apellido" class="form-control" name="usu_primer_apellido" value="">
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
                                    <input type="number" id="numerodoc" class="form-control" name="usu_num_documento" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Tipo de rol</label>
                                    <select class="form-select" name="id_rol" id="rol">
                                        <option value="0" selected>Seleccionar</option>
                                        <?php while ($tr = mysqli_fetch_array($tipo_rol)) { ?>
                                            <option value="<?php echo $tr['id_rol'] ?>"><?php echo $tr['rol_descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Tipo de estado</label>
                                    <select class="form-select" name="estado_est_id" id="estado">
                                        <option value="0" selected>Seleccionar</option>
                                        <?php while ($td = mysqli_fetch_array($tipo_estado)) { ?>
                                            <option value="<?php echo $td['est_id'] ?>"><?php echo $td['est_descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Correo</label>
                                    <input type="email" id="correo" class="form-control" name="usu_correo" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Telefono</label>
                                    <input type="number" id="telefono" class="form-control" name="usu_telefono" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Clave</label>
                                    <input type="number" id="clave" class="form-control" name="usu_clave" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Imagen</label>
                                    <input type="file" class="form-control" name="usu_imagen" value="" accept=".jpg , .png">
                                </div>
                            </div>
                        </div>
                        <!--Boton-->
                        <div class="card-row  text-justify text-danger">
                            <ul class="error" id="error"></ul>
                            <div class="d-grid mb-3">
                                <input type="submit"  class="btn btn-success" onclick="return ConfirmDelete()" value="Registrar"></input>
                            </div>
                        </div>
                    </form>
                    <div class="card-row text-justify text-danger">
                        <form action="../usuario/Usuario.php">
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-danger" value="Cancelar"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bundle Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/validarusuario.js"></script>
</body>
<!-- <div class="mt-3 d-grid"><button type="submit" class="btn btn-success">Registrar</button></div> -->

</html>