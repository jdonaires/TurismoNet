<?php
require_once('../DAO/Sesiones.php');
require_once('../BOL/Servicio.php');
require_once('../DAO/Registro_Servicio.php');
require_once('../DAO/Registro_Provincia.php');
require_once('../DAO/Lugar_turistico.php');

session_start();
$nameUser=$_SESSION['usuario_nombre'];
$nameRS=$_SESSION['usuario_razonSocial'];
$nameRuc=$_SESSION['usuario_ruc'];

$servicioBOL = new ServicioBOL();
$servicioDAO = new ServicioDAO();

if (isset($_POST['agregar_servicio']))
{
  // CARGAR Y CONVERTIR LA IMAGEN A BINARIO
  $cargarImagen = $_FILES['imgServicio']['tmp_name'];
	$ConvertirImg = fopen($cargarImagen, 'rb');

  $servicioBOL->__SET('nombreEmpresa',          $_POST['nombreEmpresa']);
  $servicioBOL->__SET('razonSocial',            $_POST['razonSocial']);
  $servicioBOL->__SET('ruc',                    $_POST['ruc']);
  $servicioBOL->__SET('nombreServicio',         $_POST['nombreServicio']);
  $servicioBOL->__SET('horarioAtención',        $_POST['horarioAtención']);
  $servicioBOL->__SET('descripcionServicio',    $_POST['descripcionServicio']);
  $servicioBOL->__SET('imgServicio',            $ConvertirImg);
  $servicioBOL->__SET('Provincia',              $_POST['idUbicacion']);
  $servicioBOL->__SET('titulo',                 $_POST['idLugar']);
  $servicioDAO->Registrar_Servicio($servicioBOL);
}

// LISTAR LAS UBICACION O PROVINCIA YA REGISTRADA
$lista = new ProvinciaDao();
$reslList = array();
$reslList = $lista->ListUbicacion();

// LISTAR LOS TITULOS DE LOS LUGARES TURISTICOS
$list = new TuristicoDAO();
$resl = array();
$resl = $list->List_LugarTitulo();
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/from_servicio.css">
  </head>
  <body>
    <div class="servicio-contenido">
      <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
        <h3>Agregar Servicio</h3>
        <input type="hidden" name="nombreEmpresa" value="<?php echo $nameUser ?>">
        <input type="hidden" name="razonSocial" value="<?php echo $nameRS ?>">
        <input type="hidden" name="ruc" value="<?php echo $nameRuc ?>">
        <input type="text" name="nombreServicio" value="" placeholder="Agregar el Nombre del Servicio" required maxlength="50">
        <input type="text" name="horarioAtención" value="" placeholder="Ingrese su Horario de Atención" required maxlength="30">
        <div class="contenido-descripcion">
          <textarea name="descripcionServicio" rows="8" cols="80" placeholder="Agregar una pequeña descripción del Servicio a Brinda" required></textarea>
          <div class="img-file">
            <img src="">
            <div class="div-file">
              <p>Cargar Imagen</p>
              <input id="file-input" name="imgServicio" type="file" value="" accept="image/jpg">
            </div>
          </div>
        </div>
        <select class="idUbicacion" name="idUbicacion">
          <?php
          foreach ($reslList as $value) { ?>
            <option value="<?php echo $value->__GET('Provincia'); ?>"<?php echo "Selected"; ?>><?php echo $value->__GET('Provincia'); ?></option>
            <?php
          }
           ?>
        </select>
        <select class="idLugar" name="idLugar">
          <?php
          foreach ($resl as $value) { ?>
            <option value="<?php echo $value->__GET('titulo'); ?>"<?php echo "Selected"; ?>><?php echo $value->__GET('titulo'); ?></option>
            <?php
          }
           ?>
        </select>

        <input type="submit" id="update_Servicio" name="agregar_servicio" value="Registrar Servicio">
      </form>
    </div>
  </body>
</html>
