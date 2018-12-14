<?php
require_once('../BOL/Servicio.php');
require_once('../DAO/Registro_Servicio.php');
require_once('../DAO/Registro_Provincia.php');
require_once('../DAO/Lugar_turistico.php');

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
  $servicioBOL->__SET('Provincia',            $_POST['idUbicacion']);
  $servicioBOL->__SET('titulo',                $_POST['idLugar']);
  $servicioDAO->Registrar_Servicio($servicioBOL);
  header("Location: from_servicio.php");

}

// LISTAR LAS UBICACION O PROVINCIA YA REGISTRADA
$lista = new ProvinciaDao();
$resl = array();
$resl = $lista->ListUbicacion();

// LISTAR LOS TITULOS DE LOS LUGARES TURISTICOS
$list = new TuristicoDAO();
$resl = array();
$resl = $list->List_LugarTitulo();
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="servicio-contenido">
      <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
        <h3>Agregar Servicio</h3>
        <input type="text" name="nombreServicio" value="" placeholder="Agregar el Nombre del Servicio" required>
        <input type="text" name="horarioAtención" value="" placeholder="Ingrese su Horario de Atención" required>
        <div class="contenido-descripcion">
          <textarea name="descripcionServicio" rows="8" cols="80" placeholder="Agregar una pequeña descripción del Servicio a Brinda" required></textarea>
          <div class="img-file">
            <img src="">
            <input type="file" name="imgServicio" value="">
          </div>
        </div>
        <select class="idUbicacion" name="">
          <?php
          foreach ($resl as $value) { ?>
            <option value="<?php echo $value->__GET('Provincia'); ?>"<?php echo "Selected"; ?>><?php echo $value->__GET('Provincia'); ?></option>
            <?php
          }
           ?>
        </select>
        <select class="idLugar" name="">
          <?php
          foreach ($resl as $value) { ?>
            <option value="<?php echo $value->__GET('titulo'); ?>"<?php echo "Selected"; ?>><?php echo $value->__GET('titulo'); ?></option>
            <?php
          }
           ?>
        </select>

        <input type="submit" name="agregar_servicio" value="Registrar Servicio">
      </form>
    </div>
  </body>
</html>
