<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ICA | Turismo Net</title>
    <link rel="stylesheet" href="CSS/index.css">
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
        <img src="IMG/logo.png">
        <li><a href="#">Nosotros</a></li>
      </div>
      <h2>Descubre con Nosotros</h2>
      <h3>Descubre las Lugares, Sabor, Tradición de la Región de Ica</h3>
    </div>

    <div class="contenedor-lugares">
      <!--PHP PARA LISTAR-->
      <?php
      require_once("../DAO/Lugar_turistico.php");
      $list = new TuristicoDAO();
      $resl = array();
      $resl = $list->List_LugarPri();
       ?>
      <?php
      foreach ($resl as $value) {
        ?>
        <div class="sub-contenedor">
          <div class="contenedor-1">
            <h3><?php echo $value->__GET('titulo'); ?></h3>
            <img src="<?php echo $value->__GET('imgLugar'); ?>">
          </div>
          <div class="contenedor-2">
            <h4><?php echo $value->__GET('descripcion'); ?></h4>
            <input type="button" name="" value="Mostrar mas">
          </div>
        </div>
        <?php
      }
       ?>
    </div>
  </body>
</html>
