<?php

// Incluir conexion                                
/* include('../conexion/conexion.php'); */

//Instancia de objeto de la clase Conexion
/* $connection = new Conexion(); */

// Incluir menu
include('../Menu/Menu.php');

// Incluir Nav
include('../Template/Nav.php');
?>
<link rel="stylesheet" href="../css/style.css">
<body>

    <div class="row">
        <div class="col-md-4 mt-5 mx-auto">
            <div class="card">
                <p class="card-header fs-3 bold fw-bold text-center">Registrar rol</p>
                <div class="card-body">
                    <form action="#" method="#" id="formRol">
                        <div class="mb-3">
                            <label class="mb-3">Descripcion del rol</label>
                            <input type="text" id="nombre_rol" class="form-control" name="descripcionrol" value="">
                        </div>
                        <div class="d-grid mb-3">
                            <a type="" onClick="registrarRol();" class="btn btn-success">Registrar</a>
                        </div>
                    </form>
                    <div class="card-row text-justify text-danger">
                        <form action="../rol/Rol.php">
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-danger" value="Cancelar"></input>
                            </div>
                        </form>
                    </div>
                    <div id="error" class="text-center"></div> <!-- Validacion -->
                    <div id="divmensaje" class="text-center text-success"></div>
                    <div id="validacion" class="text-center text-danger"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="../js/validacion.js"></script>
    <script src="../js/marcaAjax.js"></script>
</body>
</html>