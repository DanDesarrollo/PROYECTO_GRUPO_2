<?php                         
  
    // Incluir menu
    include('../Menu/Menu.php');

    // Incluir Nav
    include('../Template/Nav.php');

    // Conexión a la base de datos y query
    $categoria = mysqli_query($connection->connect(), "SELECT tipo_elemento.tip_ele_descripcion FROM tipo_elemento");
    ?>
 
 <div class="row">
    <div class="col-md-4 mt-5 mx-auto">
        <div class="card">
            <p class="card-header fs-3 bold fw-bold text-center">Registrar estado</p>
            <div class="card-body">
                    <form action="insertarCateg.php" method="POST">
                        <div class="mb-3">
                            
                            <td>
                                <label class="mb-3">Descripción Categoria</label>
                                <input type="text" id="nombre" class="form-control" name="descri"  autofocus>
                            </td>
                           
                        </div>
                        <div class="d-grid mb-3">
                            <input type="submit" onclick="return enviarFormulario();" class="btn btn-success" value="Registrar"></input>
                        </div>
                    </form>
                    <div class="card-row text-justify text-danger">
                        <form action="../categoria/categoria.php">
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


    <script src="../js/validacion.js"></script>
</body>

</html>