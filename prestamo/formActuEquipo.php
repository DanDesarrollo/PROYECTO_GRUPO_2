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
        var respuesta = confirm("¿Estas seguro de actualizar el prestamo?");

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
$ids = $_GET["id"];

$observacion = mysqli_query($connection->connect(), "SELECT DISTINCT mov_observacion FROM movimiento WHERE mov_id = $ids") ;

$comnsultaa = "SELECT d_m.det_mov_id, d_m.responsable_res_id, m.mov_id from detalle_movimiento d_m, movimiento m, responsable r, elemento e where d_m.movimiento_mov_id=m.mov_id and d_m.elemento_ele_id=e.ele_id and d_m.responsable_res_id=r.res_id and m.mov_id='$ids' ";

$consulta_Equipo = mysqli_query($connection->connect(), "SELECT * FROM elemento WHERE tipo_elemento_tip_ele_id = 2");

$responsable = mysqli_query($connection->connect(), "SELECT * FROM responsable;");

$consult =  mysqli_query($connection->connect(), "SELECT ele_nombre, mov_id, ele_id FROM movimiento, detalle_movimiento, elemento, tipo_elemento WHERE tipo_elemento.tip_ele_id = movimiento.tip_ele_id AND movimiento.mov_id = detalle_movimiento.movimiento_mov_id AND detalle_movimiento.elemento_ele_id = elemento.ele_id AND movimiento.tip_ele_id = 2 AND mov_id = $ids"); 

$query = mysqli_query($connection->connect(), "SELECT DISTINCT res_nombre, res_apellido, mov_fecha, mov_hora, mov_hora_devolucion, mov_destino, mov_observacion, mov_id, res_id FROM movimiento, detalle_movimiento, responsable, tipo_elemento WHERE tipo_elemento.tip_ele_id = movimiento.tip_ele_id AND movimiento.mov_id = detalle_movimiento.movimiento_mov_id AND responsable.res_id = detalle_movimiento.responsable_res_id AND movimiento.tip_ele_id = 2 AND mov_id = $ids");

//ALMACENISTA LOGUEADO --------------------
$iduser = $_SESSION['usuario'];

$sql = "SELECT * FROM usuario WHERE usuario_id = '$iduser'";
$resultado = mysqli_query($connection->connect(),$sql);
$row = $resultado->fetch_assoc();

?>

<?php
while ($registros = mysqli_fetch_array($query)) {
?>

<body>
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="card">
                <p class="card-header fs-3 bold fw-bold text-center">Prestar Herramienta</p>
                <div class="card-body">
                    <form action="./editarEquipo.php" id="formulario" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <!-- Input del id del usuario -->
                                    <input class="form-control" type="hidden" name="usuario_usu_id" id="almacenista" value="<?php echo utf8_decode($row['usuario_id']);?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Responsable</label>
                                    <!-- <input type="txt" id="nombreH" class="form-control" name="" value=""> -->
                                    <select class="form-select" name="res_nombre" id="nombreH">
                                        <option value="<?php echo $registros['res_id']?>"><?php echo $registros['res_nombre']?> <?php echo $registros['res_apellido']?></option>
                                        <?php while ($td = mysqli_fetch_array($responsable)) { ?>
                                            <option value="<?php echo $td['res_id'] ?>"><?php echo $td['res_nombre']?> <?php echo $td['res_apellido']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label class="mb-3">Destino(Aula-Taller)</label>
                                <input type="txt" id="numeroD" class="form-control" name="mov_destino" value="<?php echo $registros['mov_destino'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">fecha</label>
                                    <input type="date" id="fecharegistro" class="form-control" name="mov_fecha" value="<?php echo $registros['mov_fecha'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Hora</label>
                                    <p type="time" id="" class="form-control" name="mov_hora"><?php echo $registros['mov_hora'] ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Hora Devolución</label>
                                    <p type="time" id="" class="form-control" name="mov_hora_devolucion"><?php echo $registros['mov_hora_devolucion'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($consult as $dms){ ?>
                        <!-- este es el div que se repite -->
                        <div class="row p-3 mt-1 mb-3" id="contenido">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleDataList" class="form-label">Equipo</label>
                                            <input class="form-control" name="element_nombre[]" list="datalistOptions" id="exampleDataList" placeholder="Seleccione Equipo" value="<?php echo $dms['ele_id']?>">
                                            <datalist id="datalistOptions">
                                                <?php while ($equipo = mysqli_fetch_array($consulta_Equipo)) { ?>
                                                    <option value="<?php echo $equipo['ele_id']; ?>"><?php echo $equipo['ele_nombre']; ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-1 mt-1  " id="btnQuitarPrestamo">
                                <div class="col text-end me-3 " >
                                    <input type="button" class="btn btn-danger btn-font eliminar" value="Quitar prestamo" id="quitar" required>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    <?php while ($observa = mysqli_fetch_array($observacion)) { ?>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="mb-3">Observacion</label>
                                <textarea type="text" id="observacion" class="form-control" name="mov_observacion"><?php echo $observa['mov_observacion']?></textarea>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="nuevoPrestamo">

                    </div>
                    <div class="card-row text-justify text-danger">
                        <div class="col">
                            <input type="button" class="btn btn-primary text-light btn-font agregarPrestamo" value="Agregar un elemento" id="adicional" name="adicional">
                        </div>
                    </div>
                    <div class="card-row text-justify text-danger">
                        <div class="col">
                            <ul class="error" id="error"></ul>
                            <div class="d-grid mb-3">
                                <input type="submit" class="btn btn-success" onclick="return ConfirmDelete()" value="Actualizar" ></input>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <?php $result = mysqli_query($connection->connect(), $comnsultaa);
                    while ($registro = mysqli_fetch_array($result)){
                    ?>
                    <input type="hidden" name="mov_id" value="<?php echo $ids?>">
                    <input type="hidden" name="det_mov_id" value="<?php echo $registro['det_mov_id']?>">
                    <?php
                    }
                    ?>
                    </form>
                    <div class="card-row text-justify text-danger">
                        <form action="../prestamo/listarEquipo.php">
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

    <script>
    // <!-- Scripts para poder añadir o eliminar un equipo antes de cargarlo a la base de datos -->

    //Función para eliminar un formulario de agregar equipo
    $(document).on('click', '.eliminar', function() {
        $(this).closest('#contenido').remove();
    });

    //Función para añadir varios formularios de prestamos
    $(document).ready(function() {
        $(document).on('click', '.agregarPrestamo', function() {
            $(".nuevoPrestamo").append('<div class="row p-3 mt-1 mb-3" id="contenido">\
                <div class="col">\
                    <div class="row">\
                        <div class="col">\
                            <div class="mb-3">\
                                <label for="exampleDataList" class="form-label">Herramienta</label>\
                                <input class="form-control" name="element_nombre[]" list="datalistOptions" id="exampleDataList" placeholder="Seleccione Equipo">\
                                <datalist id="datalistOptions">\
                                    <?php while ($equipo = mysqli_fetch_array($consulta_equipo)) { ?>\
                                        <option value="<?php echo $equipo['ele_id']; ?>"><?php echo $equipo['ele_nombre']; ?></option>\
                                    <?php } ?>\
                                </datalist>\
                            </div>\
                        </div>\
                    <div class="row p-1 mt-1  " id="btnQuitarPrestamo">\
                        <div class="col text-end me-3 " >\
                            <input type="button" class="btn btn-danger btn-font eliminar" value="Quitar prestamo" id="quitar" required>\
                        </div>\
                    </div>\
                </div>\
            </div>');
        });
    });
</script>

</body>

</html>