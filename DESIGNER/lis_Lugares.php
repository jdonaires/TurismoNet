<?php
require_once('../BOL/Turistico.php');
require_once('../DAO/Lugar_turistico.php');

// PARA LISTAR CON PHP
$list = new TuristicoDAO();
$resl = array();
$resl = $list->List_LugarPri();


// LISTAR SERVICIOS ACTIVOS SEGUN EL LUGAR
// $serviBOL = new Turistico();
// $serviDAO = new TuristicoDAO();
// $serviRel = array();
// $serviBOL->__SET('idLugar', $dato);
// $serviRel=$serviDAO->MostrarInfoServicio($serviBOL);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/modal.css">
  </head>
  <body>
    <div class="contenedor-fondo">
      <div class="contenedor-logo">
        <img src="IMG/logo.png">
        <li><a href="#">Nosotros</a></li>
      </div>
      <h2>Descubre con Nosotros</h2>
      <h3>Descubre las Lugares, Sabor, Tradición de la Región de Ica</h3>
    </div>
    <div class="contenedor-lugares">
      <?php
      foreach ($resl as $value) {
        ?>
        <div class="sub-contenedor">
          <div class="contenedor-1">
            <?php $dato = $value->__GET('idLugar'); ?>
            <h3><?php echo $value->__GET('titulo'); ?></h3>
            <img src="data:image/jpg;base64, <?php echo base64_encode($value->__GET('imgLugar'))?>">
          </div>
          <div class="contenedor-2">
            <p class="parrafo"><?php echo $value->__GET('descripcion'); ?></p>
            <?php $i=0;
            $a = $i + 1;?>
            <input  type="button" id="<?php echo "abrir".$a; ?>" name="" value="Mostrar mas">
            <!-- <input  type="submit" id="abrir" onclick="mostrar(abrir)" name="" value="Mostrar mas"> -->
          </div>
        </div>

          <?php
        }
         ?>

        <!-- VENTANA MODAL -->
        <div id="miModal" class="modal">
          <div class="flex" id="flex">
            <div class="contenido-modal">
              <div class="modal-header flex">
                <span class="close" id="close">&times;</span>
              </div>
              <div class="modal-body">
                <div class="contenido-lugar">
                  <h2><?php echo $value->__GET('titulo'); ?></h2>
                  <p>Ubicación: <?php echo $value->__GET('Provincia'); ?></p>
                  <img src="data:image/jpg;base64, <?php echo base64_encode($value->__GET('imgLugar'))?>">
                  <p class="parrafo"><?php echo $value->__GET('descripcion'); ?></p>
                </div>

                <!-- LISTAMOS LOS SERVICIOS ASOCIADOS AL LUGA TURISTICO -->
                <?php
                // LISTAR SERVICIOS ACTIVOS SEGUN EL LUGAR
                $serviBOL = new Turistico();
                $serviDAO = new TuristicoDAO();
                $serviRel = array();
                $serviBOL->__SET('idLugar', $dato);
                $serviRel=$serviDAO->MostrarInfoServicio($serviBOL);
                 ?>

                 <?php foreach ($serviRel as $k)
                 {
                   $titulo= $k->__GET('nombreServicio');
                   $direccion= $k->__GET('Provincia');
                   $horario= $k->__GET('horarioAtención');
                   $descr= $k->__GET('descripcionServicio');
                   $img= $k->__GET('imgServicio');
                 } ?>
                <div class="contenido-servicios">
                  <div class="contenido-imagen"> <img src="data:image/jpg;base64, <?php if (empty($img)){ echo ""; } else { echo base64_encode($img); } ?>"></div>
                  <div class="contenido_descServicio">
                    <h4>Titúlo: <?php if (empty($titulo)){ echo ""; }else { echo $titulo; } ?></h4>
                    <h4>Dirreción: <?php if (empty($direccion)){ echo ""; }else { echo $direccion; } ?></h4>
                    <p>Horario: <?php if (empty($horario)){ echo ""; }else { echo $horario; } ?></p>
                    <p>Descripción: <?php if (empty($descr)){ echo ""; }else { echo $descr; } ?></p>
                    <input type="submit" name="" value="Adquirir Servicio">
                  </div>
                </div>
                <?php // foreach ($serviRel as $rp): ?>
                  <!-- <div class="contenido-servicios">
                    <div class="contenido-imagen"> <img src="data:image/jpg;base64, <?php // echo base64_encode($rp->__GET('imgServicio')); ?>"></div>
                    <div class="contenido_descServicio">
                      <h4>Titúlo: <?php // echo $rp->__GET('nombreServicio'); ?></h4>
                      <h4>Dirreción: <?php // echo $rp->__GET('Provincia'); ?></h4>
                      <p>Horario: <?php // echo $rp->__GET('horarioAtención'); ?></p>
                      <p>Descripción: <?php // echo $rp->__GET('descripcionServicio'); ?></p>
                      <input type="submit" name="" value="Adquirir Servicio">
                    </div>
                  </div> -->
                <?php // endforeach; ?>
              </div>
            </div>
          </div>
        </div>



    </div>
    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="JS/modal.js"></script>
  </body>
</html>
