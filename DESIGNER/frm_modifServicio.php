<?php
// require_once('../DAL/DBAccess.php');
require_once('../DAO/Sesiones.php');
require_once('../BOL/Servicio.php');
require_once('../DAO/Registro_Servicio.php');

session_start();
$nameUser=$_SESSION['usuario_nombre'];
$nameRS=$_SESSION['usuario_razonSocial'];
$nameRuc=$_SESSION['usuario_ruc'];


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
  header("Refresh:20; url=plantilla.php");
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
        <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
          <h3>Actualizar Datos</h3>
          <div class="buscar">
            <input type="text" name="idservicioEmpresa" value="" placeholder="Ingrese el ID">
            <input type="submit" name="Buscar" value="Buscar Servicio">
          </div>
          <?php foreach ($listArray as $k): ?>
            <div class="datos">
              <div class="datos-1">
                <input type="text" name="nombreServicio" value="<?php echo $k->__GET('nombreServicio'); ?>">
                <input type="text" name="horarioAtención" value="<?php echo $k->__GET('horarioAtención'); ?>">
                <input type="text" name="descripcionServicio" value="<?php echo $k->__GET('descripcionServicio'); ?>">
              </div>
              <div class="datos-2">
                <img src="data:image/jpg;base64,<?php echo base64_encode($k->__GET('imgServicio')) ?>">
              </div>
            </div>
          <?php endforeach; ?>
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
</html>
