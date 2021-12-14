<?php

include "../conexion/conexion.php";
$connection = new Conexion();

$id = $_GET['detalle'];

?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="staticBackdropLabel"><strong>Detalle</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <label><b>Herramientas</b></label><br>
            <?php
                $consult =  mysqli_query($connection->connect(), "SELECT ele_nombre, mov_id FROM movimiento, detalle_movimiento, elemento, tipo_elemento WHERE tipo_elemento.tip_ele_id = movimiento.tip_ele_id AND movimiento.mov_id = detalle_movimiento.movimiento_mov_id AND detalle_movimiento.elemento_ele_id = elemento.ele_id AND movimiento.tip_ele_id = 1 AND mov_id = $id"); 

                while ($registros = mysqli_fetch_array($consult)) {
                
                 echo $registros['ele_nombre']."&nbsp "."&nbsp"; 
                } 
            ?>
        </div>
           <?php
           $query = mysqli_query($connection->connect(), "SELECT DISTINCT res_nombre, res_apellido, mov_fecha,mov_hora, mov_hora_devolucion, mov_destino, usu_nombre, usu_primer_apellido, mov_observacion, mov_id FROM movimiento, detalle_movimiento, usuario, responsable, tipo_elemento WHERE tipo_elemento.tip_ele_id = movimiento.tip_ele_id AND movimiento.mov_id = detalle_movimiento.movimiento_mov_id AND usuario.usuario_id = movimiento.usuario_usu_id AND responsable.res_id = detalle_movimiento.responsable_res_id AND movimiento.tip_ele_id = 1 AND mov_id = $id");
           ?>
           <div class="container"><br>
              <div class="row align-items-start">
                <div class="col">
                  <label><b>Responsable</b></label>
                </div>
                <div class="col">
                  <label><b>Fecha</b></label>
                </div>
                <div class="col">
                  <label><b>Hora</b></label>
                </div>
                <div class="col">
                  <label><b>Hora Devolucion</b></label>
                </div>
              </div>
              <div class="row align-items-start">
                <div class="col">
                <?php
                  while ($registros = mysqli_fetch_array($query)) {

                  echo $registros['res_nombre']."&nbsp";
                  echo $registros['res_apellido'];
                ?>
                </div>
                <div class="col">
                  <?php
                    echo $registros['mov_fecha'];
                  ?>
                </div>
                <div class="col">
                  <?php
                    echo $registros['mov_hora'];
                  ?>
                </div>
                <div class="col">
                  <?php
                    echo $registros['mov_hora_devolucion'];
                  ?>
                </div>  
              </div>
           </div>
           <div class="container"><br>
              <div class="row align-items-start">
                <div class="col-3">
                  <label><b>Destino</b></label>
                </div>
                <div class="col-3">
                  <label><b>Usuario que realizo el Prestamo:</b></label>
                </div>
                <div class="col-3">
                  <label><b>Observacion</b></label>
                </div>
                <!-- <div class="col">
                  <label><b></b></label>
                </div> -->
              </div>
              <div class="row align-items-start">
                <div class="col-3">
                  <?php
                    echo $registros['mov_destino'];
                  ?>
                </div>
                <div class="col-3">
                  <?php
                    echo $registros['usu_nombre']."&nbsp";
                    echo $registros['usu_primer_apellido'];
                  ?>
                </div>
                <div class="col-3">
                  <?php
                    echo $registros['mov_observacion'];
                  ?>
                </div>
                <!-- <div class="col">
                  
                </div> -->
              </div>
            </div>
           <?php
              }
            ?>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Aceptar</button> -->
      </div>
    </div>
  </div>
</div>