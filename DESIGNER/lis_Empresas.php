<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/lis_Empresas.css">
    <link rel="stylesheet" href="CSS/estrellas.css">
  </head>
  <body>
    <?php
    require_once("../DAO/Registro_Persona.php");
    $lit = new PersonaDao();
    $relt = array();
    $relt = $lit->list_Empresas();
     ?>
    <div class="contenedor-empresas">
      <div class="sub-contenedor-empresas">
        <?php
        foreach ($relt as $value) {
          ?>
            <div class="sub-contenedor-empresas-1">
              <div class="img-1">
                <img src="data:image/jpg;base64,<?php echo base64_encode($value->__GET('EmpresaImage')) ?>" alt="">
              </div>
              <div class="contenido-2">
                <h3><?php echo $value->__GET('nombreEmpresa'); ?>  <span><?php echo $value->__GET('razonSocial'); ?></span></h3> <!--NOMBRE DE LA EMPRESA-->
                <!-- <h4><fieldset class="stars-fieldset"><legend>Calificación:</legend><span class="stars stars-40"></span></fieldset></h4> CALIFICACION -->
                <h4>Calificación: <span class="stars stars-40"></span></h4>
                <h5>Ruc: <?php echo $value->__GET('ruc'); ?></h5> <!--NUMERO DE RUC-->
                <h5>Telefonos: <span><?php echo $value->__GET('celular'); ?></span> / <span><?php echo $value->__GET('fijo'); ?></span></h5>
                <p><b>Ubicacion: </b><?php echo $value->__GET('dirrecion'); ?></p> <!--DIREECION-->
                <h5>Descripcion</h5>
                <p><?php echo $value->__GET('descripcion');; ?></p> <!--DESCRIPCION-->
              </div>
            </div>
          <?php
        }
         ?>
      </div>
    </div>
  </body>
</html>
