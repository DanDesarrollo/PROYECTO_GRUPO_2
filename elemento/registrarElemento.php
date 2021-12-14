
<?php

    // Incluir menu
    include('../Menu/Menu.php');

    // Incluir Nav
    include('../Template/Nav.php');

    // Incluir conexion                                
    /* include('../conexion/conexion.php'); */

    //Instancia de objeto de la clase Conexion
    /* $connection = new Conexion(); */


    // Llamamos la tabla tipo_elemento
    $tipo_elemento = mysqli_query($connection->connect(), "SELECT * FROM tipo_elemento;");

    // Llamamos la tabla marca
    $marca = mysqli_query($connection->connect(), "SELECT * FROM marca;");

?>

<body>

    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="card">
                <p class="card-header fs-3 bold fw-bold text-center">Registrar elemento</p>
                <div class="card-body">
                    <form action="insertarElemento.php" id="formulario" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Nombre elemento</label>
                                    <input type="txt" id="nombre" class="form-control" name="ele_nombre" value="">
                                </div>
                            </div>  
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Imagen</label>
                                    <input type="file" class="form-control" name="ele_imagen" value="" accept=".jpg , .png">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">cantidad</label>
                                    <input type="" id="cantidad" class="form-control" name="ele_cantidad" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Serial</label>
                                    <input type="txt" id="serial" class="form-control" name="ele_serial" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">fecha</label>
                                    <input type="date" id="fecharegistro" class="form-control" name="ele_fecha_registro" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Observacion</label>
                                    <textarea type="textarea" id="observacion" class="form-control" name="ele_observacion" value=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Descripcion</label>
                                    <input type="text" id="descripcion" class="form-control" name="ele_descripcion" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Modelo</label>
                                    <input type="text" id="modelo" class="form-control" name="ele_modelo" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                <label class="mb-3">Tipo de elemento</label>
                                <select class="form-select" name="tipo_elemento" id="tipo_elemento">
                                        <option value="0" selected>Seleccionar</option>
                                        <?php while ($te = mysqli_fetch_array($tipo_elemento)) { ?>
                                            <option value="<?php echo $te['tip_ele_id'] ?>"><?php echo $te['tip_ele_descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                <label class="mb-3">Marca</label>
                                    <select class="form-select" name="marca_mar_id" id="marca">
                                        <option value="0" selected>Seleccionar</option>
                                        <?php while ($mar = mysqli_fetch_array($marca)) { ?>
                                            <option value="<?php echo $mar['mar_id'] ?>"><?php echo $mar['mar_descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="card-row text-justify text-danger">
                                <ul class="error" id="error"></ul>
                                <div class="d-grid mb-3">
                                    <input type="submit"   class="btn btn-success" value="Registrar"></input>
                                </div>
                            </div>
                    </form>
                    <div class="card-row text-justify text-danger">
                        <form action="../elemento/elemento.php">
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
    <script src="../js/validacionele.js"></script>
</body>

</html> 