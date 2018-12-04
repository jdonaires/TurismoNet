<?php
require_once('DAO/Lugar_turistico.php');

$list = new Lugar_turistico();
$resul = array();
$resul = $list->List_LugarPri();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ICA | Turismo Net</title>
    <link rel="stylesheet" href="DESIGNER/CSS/index.css">
  </head>
  <body>
    <div class="contenedor-fondo">
      <!-- <img src="DESIGNER/IMG/fondo_index.jpg"> -->
      <div class="contenedor-menu">
        <div class="contenedor-opciones">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Login</a></li>
        </div>
        <div class="contenedor-redes">
        </div>
      </div>
      <div class="contenedor-logo">
        <img src="DESIGNER/IMG/logo.png">
        <li><a href="#">Nosotros</a></li>
      </div>
      <h2>Descubre con Nosotros</h2>
      <h3>Descubre las Lugares, Sabor, Tradición de la Región de Ica</h3>
    </div>

    <div class="contenedor-lugares">
      <!--PHP PARA LISTAR-->
      <?php
      foreach ($resul as $value) {
        ?>
        <h3><?php echo $value->__GET('titutlo'); ?></h3>
        <img src="<?php echo $value->__GET('imgLugar'); ?>" alt="">
        <h3><?php echo $value->__GET('descripcion'); ?></h3>
        <?php
      }
       ?>
    </div>
  </body>
</html>
