
    <?php
    
    // Incluir conexion                                
   /*  include('../conexion/conexion.php');
    
    //Instancia de objeto de la clase Conexion
    $connection = new Conexion();
 */
    // Incluir menu
    include('../Menu/Menu.php');

    // Incluir Nav
    include('../Template/Nav.php');
    ?>

<body>

<div class="row">
    <div class="col-md-4 mt-5 mx-auto">
        <div class="card">
            <p class="card-header fs-3 bold fw-bold text-center">Registrar Marca</p>
            <div class="card-body">
                <form action="insertarMarca.php" method="POST">
                    <div class="mb-3">
                        <label class="mb-3">Descripcion de la Marca</label>
                        <input type="text" id="nombre" class="form-control" name="mar_descripcion" value="">
                    </div>
                    <div class="d-grid mb-3">
                        <input type="submit" onclick="return enviarFormulario();" class="btn btn-success" value="Registrar"></input>
                    </div>
                </form>
                <div class="card-row text-justify text-danger">
                        <form action="../Marca/Marca.php">
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-danger" value="Cancelar"></input>
                            </div>
                        </form>
                </div>
                <div id="error" class="text-center"></div> <!-- Validacion -->
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script src="../js/validacion.js"></script>
</body>

</html>

   