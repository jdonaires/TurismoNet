<?php
require_once('../BOL/Turistico.php');
require_once('../DAO/Lugar_turistico.php');

// PARA LISTAR CON PHP
$list = new TuristicoDAO();
$resl = array();
$resl = $list->List_LugarPri();


// LISTAR SERVICIOS ACTIVOS SEGUN EL LUGAR
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
            <?php $idLu = $value->__GET('idLugar'); ?>
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
                <div class="contenido-servicios">
                  <div class="contenido-imagen"> <img src=""></div>
                  <div class="contenido_descServicio">
                    <h4>Titúlo: </h4>
                    <h4>Dirreción: </h4>
                    <p>Horario: </p>
                    <p>Descripción: </p>
                    <input type="submit" name="" value="Adquirir Servicio">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
      }
       ?>

    </div>
    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="JS/modal.js"></script>
  </body>
</html>
