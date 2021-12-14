<?php

// Incluir menu
include('../Menu/Menu.php');

// Incluir Nav
include('../Template/Nav.php');

// Incluir conexion                                
/*  include('../conexion/conexion.php'); */

//Instancia de objeto de la clase Conexion
/* $connection = new Conexion();  */

// Conexión a la base de datos y seleccionar datos de la tabla cargo
/* $responsable = mysqli_query($connection->connect(), "SELECT * FROM car;"); */

$consulta_equipo = mysqli_query($connection->connect(), "SELECT e.ele_nombre, e.ele_id FROM elemento e, estado es, tipo_elemento te WHERE es.est_id = e.estado_est_id AND e.estado_est_id = 6 AND te.tip_ele_id = e.tipo_elemento_tip_ele_id AND e.tipo_elemento_tip_ele_id = 2");

$responsable = mysqli_query($connection->connect(), "SELECT r.res_nombre, r.res_id, r.res_apellido FROM responsable r, estado e WHERE e.est_id = r.estado_est_id AND r.estado_est_id = 1;");

//ALMACENISTA LOGUEADO --------------------
$iduser = $_SESSION['usuario'];

$sql = "SELECT * FROM usuario WHERE usuario_id = '$iduser'";
$resultado = mysqli_query($connection->connect(),$sql);
$row = $resultado->fetch_assoc();
//ALMACENISTA LOGUEADO ---------------------


// Llamamos la tabla tipo_documento
/* $tipo_elemento   = mysqli_query($connection->connect(), "SELECT * FROM tipo_documento;"); */


?>

<body>

    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="card">
                <p class="card-header fs-3 bold fw-bold text-center">Prestar Equipo</p>
                <div class="card-body">
                    <form action="insertarPrestamo.php" id="formulario" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <!-- Input del id del usuario -->
                                    <input class="form-control" type="hidden" name="usuario_usu_id" id="almacenista" value="<?php echo utf8_decode($row['usuario_id']);?>">
                                    
                                    <label class="mb-3">Responsable</label>
                                    <!-- <input type="txt" id="nombreH" class="form-control" name="" value=""> -->
                                    <select class="form-select" name="res_nombre" id="nombreH">
                                        <option value="0" selected>Seleccionar</option>
                                    <?php while ($td = mysqli_fetch_array($responsable)) { ?>
                                        <option value="<?php echo $td['res_id'] ?>"><?php echo $td['res_nombre']?> <?php echo $td['res_apellido']?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Destino(Aula-Taller)</label>
                                    <input type="txt" id="numeroD" class="form-control" name="mov_destino" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Fecha</label>
                                    <input type="date" id="nombreH" class="form-control" name="mov_fecha" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Hora Prestamo</label>
                                    <input type="time" id="fecharegistro" class="form-control" name="mov_hora" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="mb-3">Hora Devolución</label>
                                    <input type="time" id="" class="form-control" name="mov_hora_devolucion" value="">
                                </div>
                            </div>
                        </div>

                        <!-- ESTE ES EL CONTENEDOR QUE SE VA A REPETIR -->
                        <div class="row p-3 mt-1 mb-3" id="contenido">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleDataList" class="form-label">Equipo</label>
                                            <input class="form-control" name="elements_nombre[]" list="datalistOptions" id="exampleDataList" placeholder="Seleccione Equipo">
                                            <datalist id="datalistOptions">
                                                <?php while ($equipo = mysqli_fetch_array($consulta_equipo)) { ?>
                                                    <option value="<?php echo $equipo['ele_id'] ?> "><?php echo $equipo['ele_nombre'] ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="mb-3">Observación</label>
                                            <textarea type="text" id="descripcion" class="form-control" name="mov_observacion" value=""></textarea>
                                        </div>
                                    </div>
                                   <!--  <div class="col">
                                        <div class="mb-3">
                                            <label class="mb-3">cantidad</label>
                                            <input type="" id="cantidad" class="form-control" name="mov_cantidad" value="1" disabled>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="nuevoPrestamo">

                        </div>


                        <div class="card-row text-justify text-danger">
                            <div class="col">
                                <input type="button" class="btn btn-primary text-light btn-font agregarPrestamo" value="Agregar un elemento" id="adicional" name="adicional">
                            </div>
                            <div class="col">
                                <ul class="error" id="error"></ul>
                                <div class="d-grid mb-3">
                                    <input type="submit" class="btn btn-success" value="Registrar"></input>
                                </div>
                            </div>
                        </div>
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
</body>

</html>

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
                                <label for="exampleDataList" class="form-label">Equipo</label>\
                                <input class="form-control" name="elements_nombre[]" list="datalistOptions" id="exampleDataList" placeholder="Seleccione Equipo">\
                                <datalist id="datalistOptions">\
                                    <?php while ($equipo = mysqli_fetch_array($consulta_equipo)) { ?>\
                                        <option value="<?php echo $equipo['ele_id'] ?> "><?php echo $equipo['ele_nombre'] ?></option>\
                                    <?php } ?>\
                                </datalist>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="row">\
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<!-- <script src="../js/validacionResponsable2.js"></script> -->
</body>

</html>