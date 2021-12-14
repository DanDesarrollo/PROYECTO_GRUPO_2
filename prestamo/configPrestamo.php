<?php
// Incluir menu
include('../Menu/Menu.php');

// Incluir Nav
include('../Template/Nav.php');
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header text-center border border-white">
                <p class="fs-3">Prestamo</p>
            </div>
        </div>
        <br>
        <div class="card p-4 border border-4 rounded-3">
                <div class="row justify-content-center text-center m-5">
                    <div class="col">
                        <div class="row">
                            <a href="listarEquipo.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                                <th scope="col"><img src="../img/computadora-portatil.png"><br> Equipos</th>
                            </a>
                            <a href="../prestamo/listarHerramienta.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                                <th scope="col"><img src="../img/caja-de-herramientas.png"><br> Herramientas</th>
                            </a>
                            <a href="../prestamo/listarDevolucion.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                                <th scope="col"><img src="../img/caja-de-devolucion.png"><br> Devolucion</th>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

