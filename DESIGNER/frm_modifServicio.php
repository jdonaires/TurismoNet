<?php
// require_once('../DAL/DBAccess.php');
require_once('../DAO/Sesiones.php');
require_once('../BOL/Servicio.php');
require_once('../DAO/Registro_Servicio.php');

session_start();
$nameUser=$_SESSION['usuario_nombre'];
$nameRS=$_SESSION['usuario_razonSocial'];
$nameRuc=$_SESSION['usuario_ruc'];

if (!isset($nameUser)&&!isset($nameRS))
{
  header('Location: index.php');
}


// LISTAMOS LOS SERVICIOS ACTIVOS
$lisServiBOL = new ServicioBOL();
$lisServiDAO = new ServicioDAO();
$lisServiContenedor = array();

$lisServiBOL->__SET('nombreEmpresa',$nameUser);
$lisServiBOL->__SET('razonSocial',  $nameRS);
$lisServiBOL->__SET('ruc',          $nameRuc);
$lisServiContenedor=$lisServiDAO->Listar_servicios($lisServiBOL);


// BUSCAMOS AL SERVICIO
$listMoBOL = new ServicioBOL();
$listArray = array();

if (isset($_POST['Buscar']))
{
  $listMoBOL->__SET('idservicioEmpresa',  $_POST['idservicioEmpresa']);
  $listMoBOL->__SET('nombreEmpresa',      $nameUser);
  $listMoBOL->__SET('ruc',                $nameRuc);
  $listArray=$lisServiDAO->lis_ServicioM($listMoBOL);
}

if (isset($_POST['actualizar']))
{

}
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/from_servicio.css">
  </head>
  <body>
    <div class="dividir-contenido">
      <div class="contenido-actualizar">
        <form class=""  onsubmit=""  method="post" enctype="multipart/form-data">
          <h3>Actualizar Datos</h3>
          <div class="buscar">
            <input id="idservicioEmpresa" type="text" name="idservicioEmpresa" value="" placeholder="Ingrese el ID del Servicio">
            <input id="nombrerUser" type="hidden" name="nombrerUser" value="<?php echo $nameUser; ?>">
            <input id="numeroRuc" type="hidden" name="numeroRuc" value="<?php echo $nameRuc; ?>">
            <input type="submit" name="Buscar" value="Buscar Servicio">
          </div>
          <?php foreach ($listArray as $k): ?>
            <?php
            $name= $k->__GET('nombreServicio');
            $horario= $k->__GET('horarioAtención');
            $desc= $k->__GET('descripcionServicio');
            $img=$k->__GET('imgServicio');
             ?>
          <?php endforeach; ?>
          <div class="datos">
            <div class="datos-1">
              <input type="text" name="nombreServicio" value="<?php if (empty($name)){ echo ""; }else { echo $name; }?>">
              <input type="text" name="horarioAtención" value="<?php if (empty($horario)){ echo ""; }else { echo $horario; }?>">
              <textarea name="descripcionServicio" rows="8" cols="80"><?php if (empty($desc)){ echo ""; }else { echo $desc; } ?></textarea>
            </div>
            <div class="datos-2">
              <img src="data:image/jpg;base64,<?php if (empty($img)){ echo ""; }else { echo base64_encode($img); } ?>">
            </div>
          </div>
        </form>
        <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
          <input type="submit" name="actualizar" value="Actualizar Datos">
        </form>
      </div>
      <div class="contenido-tabla">
        <table>
          <thead>
            <tr>
              <th>Id Servicio</th>
              <th>Id Empresa</th>
              <th>Nombre del Servicio</th>
              <th>Provincia</th>
            </tr>
          </thead>
          <?php foreach ($lisServiContenedor as $value) {
            $estado = $value->__GET('estadoServicio');
            if ($estado=="1")
            { ?>
              <tr>
                <td><?php echo $value->__GET('idservicioEmpresa'); ?></td>
                <td><?php echo $value->__GET('idEmpresa'); ?></td>
                <td><?php echo $value->__GET('nombreServicio'); ?></td>
                <td><?php echo $value->__GET('Provincia'); ?></td>
              </tr>
          <?php  } elseif ($estado=="0")
            { ?>
              <script type="text/javascript">
                alertify.success ("Datos no Encontrados");
              </script>
            <?php
            }?>

            <?php
          } ?>
        </table>
      </div>
    </div>
  </body>
  <!-- <script type="text/javascript" src="JS/jquery-3.3.1.min.js">></script> -->
  <!-- <script type="text/javascript" src="JS/servicio.js"></script> -->
</html>
