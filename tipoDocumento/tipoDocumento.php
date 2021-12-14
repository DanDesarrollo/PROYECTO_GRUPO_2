
    <?php

    // Incluir menu
    include('../Menu/Menu.php');

    // Incluir Nav
    include('../Template/Nav.php');

    // Incluir conexion                                
    /* include('../conexion/conexion.php'); */

    //Instancia de objeto de la clase Conexion
    /* $connection = new Conexion(); */

    // Conexión a la base de datos
    $tipoDocumento = mysqli_query($connection->connect(), "SELECT * FROM tipo_documento");

    ?>


<div class="container-sm nt-5 position-relative position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card ">
                    <div class="Listado card-header text-center border border-white  ">
                    <h4>Tipo de documento</h4>
                </div>  
            
            </div>
            <br>
            <div class="card p-4 border border-4 rounded-3">
                <table class="table align-middle border border-3 text-center">

                    <div class="row">
                        <div class="col">
                            <th>Tipo de documento</th>
                            <th colspan="2">Acciones</th>
                        </div>
                    </div>

                    <?php

                    while ($registros = mysqli_fetch_array($tipoDocumento)) {

                    ?>
                        <tr>

                            <td><?php echo $registros['tip_doc_descripcion']; ?></td>

                            <td>
                            <a class="me-2" href='editarTipo_documento.php?id=<?php echo $registros['tip_doc_id']; ?>'><button type="button" class="btn btn-warning"><i class="bi bi-pen text-light"></i></button></a>

                        <tr>
                        <?php
                    }
                        ?>
                </table>
                <div class="d-flex justify-content-end">
                    <a href="registrarTipo_documento.php" type="image"><img src="../img/registry.png"></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
