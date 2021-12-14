<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>actualizar Estados</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
</head>
<body>

<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro de actualizar el estado?");

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>


<?php

 // Incluir conexion                                
 /* include('../conexion/conexion.php'); */

 //Instancia de objeto de la clase Conexion
/*  $connection = new Conexion(); */
 // Incluir menu
 include('../Menu/Menu.php');

 // Incluir Nav
 include('../Template/Nav.php');

$id = $_GET["id"];

$estado = mysqli_query($connection->connect(), "SELECT*FROM estado WHERE est_id = '$id' ");

while($registros = mysqli_fetch_array($estado)){

?>
    <div class="row">
            <div class="col-md-4 mt-5 mx-auto">
                    <div class="card">
                        <p class="card-header fs-3 bold fw-bold text-center">Editar cargo</p>
                        <div class="card-body">
                        <form action="actualizarEstado.php" method="POST">

                            <table class="table align-middle">

                                <div class="mb-3">
                                    <div class="row justify-content-start">
                                        <div class="col">
                                            <label class="mb-3">Estado</label>
                                            <input type="text" id="nombre" class="form-control" name="estado" value=<?php echo $registros['est_descripcion'] ?>>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="d-grid">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $registros['est_id'] ?>">
                                        <input type="submit" onclick="/* return enviarFormulario(); */return ConfirmDelete()" class="btn btn-success" value="Actualizar">
                                </div>

                            </table>

                        </form>
                        <div id="error" class="text-center"></div> <!-- Validacion -->
                    </div>
                </div>
            </div>
    </div>
<?php
}
?>
<!-- Bundle Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="../js/validacion.js"></script>
</body>
</html>

