<?php

    /* include "../conexion/conexion.php";

    // Instancia de la conexion
    $connection = new Conexion();
 */
    // Incluir menu
    include('../Menu/Menu.php');

    // Incluir Nav
    include('../Template/Nav.php');

    $usuario_id  = $_GET['id'];

    /* $detalle = mysqli_query($connection->connect(), "SELECT * FROM usuario us, tipo_documento t, estado e, rol r WHERE t.tip_doc_id = us.tipo_documento_tip_doc_id AND e.est_id = us.estado_est_id AND usuario_id  = '$usuario_id';"); */
    $usuario= mysqli_query($connection->connect(), "SELECT * FROM usuario us, estado es, rol ro,tipo_documento td WHERE es.est_id  = us.estado_est_id AND ro.id_rol  = us.id_rol AND td.tip_doc_id = us.tipo_documento_tip_doc_id AND us.usuario_id  = '$usuario_id'");
    
    // Llamamos la tabla tipo_documento
    $tipo_documento = mysqli_query($connection->connect(), "SELECT * FROM tipo_documento;");

    //Tipo de rol
    $tipo_rol = mysqli_query($connection->connect(), "SELECT * FROM rol;");

    //Tipo de estado
    $tipo_estado = mysqli_query($connection->connect(), "SELECT * FROM estado;");
    
    ?>

<?php

while($registros = mysqli_fetch_array($usuario)){
    
?>
<body>
<div class="row">
    <div class="col-md-6 mt-5 mx-auto">
        <div class="card">
            <p class="card-header fs-3 bold fw-bold text-center">Detalle Usuario</p>
            <div class="card-body">
                <form action="actualizarUsuario.php" id="formulario" method="POST" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Nombre</label>
                                <input type="text" id="Nombre" class="form-control" name="usu_nombre" value="<?php echo $registros['usu_nombre']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Apellido</label>
                                <input type="text" id="apellido" class="form-control" name="usu_primer_apellido" value="<?php echo $registros['usu_primer_apellido']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Tipo de documento</label>
                                <select class="form-select" name="tipo_documento_tip_doc_id" id="tipodoc" disabled>
                                    <option value="<?php echo $registros['tip_doc_id'] ?>" selected><?php echo $registros['tip_doc_descripcion'] ?></option>
                                    <?php while ($td = mysqli_fetch_array($tipo_documento)) { ?>
                                        <option value="<?php echo $td['tip_doc_id'] ?>"><?php echo $td['tip_doc_descripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Numero de documento</label>
                                <input type="number" id="numerodoc" class="form-control" name="usu_num_documento" value="<?php echo $registros['usu_num_documento']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Tipo de rol</label>
                                <select class="form-select" name="id_rol" id="rol" disabled>
                                    <option value="<?php echo $registros['id_rol'] ?>" selected><?php echo $registros['rol_descripcion'] ?></option>
                                    <?php while ($tr = mysqli_fetch_array($tipo_rol)) { ?>
                                        <option value="<?php echo $tr['id_rol '] ?>"><?php echo $tr['rol_descripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Tipo de estado</label>
                                <select class="form-select" name="estado_est_id" id="estado" disabled>
                                    <option value="<?php echo $registros['est_id'] ?>" selected><?php echo $registros['est_descripcion'] ?></option>
                                    <?php while ($td = mysqli_fetch_array($tipo_estado)) { ?>
                                        <option value="<?php echo $td['est_id '] ?>"><?php echo $td['est_descripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Correo</label>
                                <input type="email" id="Correo" class="form-control" name="usu_correo" value="<?php echo $registros['usu_correo']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Telefono</label>
                                <input type="number" id="Telefono" class="form-control" name="usu_telefono" value="<?php echo $registros['usu_telefono']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Clave</label>
                                <input type="number" id="Clave" class="form-control" name="usu_clave" value="<?php echo $registros['usu_clave']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Imagen</label><br>
                                <img src="<?php echo $registros['usu_imagen']; ?>" accept=".jpg , .png">
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

   