<?php
require_once('../DAO/Sesiones.php')
require_once('../BOL/Servicio.php');
require_once('../DAO/Registro_Servicio.php');

$listMOBOL = new ServicioBOL();
$listMODAO = new ServicioDAO();
$listArray = array();

if (isset($_POST['Buscar']))
{
  $listMOBOL->__SET('idservicioEmpresa',  $_POST['idservicioEmpresa']);
  $listMOBOL->__SET('nombreEmpresa',      $nameUser);
  $listMOBOL->__SET('ruc',                $nameRuc);
  $listArray=$listMODAO->lis_ServicioM($listMOBOL);
}
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div class="contenido-actualizar">
      <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
        <h3>Actualizar Datos</h3>
        <div class="buscar">
          <input type="text" name="idservicioEmpresa" value="" placeholder="Ingrese el ID">
          <input type="submit" name="Buscar" value="Buscar Servicio">
        </div>
        <div class="datos">
          <div class="datos-1">
            <input type="text" name="" value="">
            <input type="text" name="" value="">
            <input type="text" name="" value="">
          </div>
          <div class="datos-2">
            <img src="" alt="">
          </div>
        </div>
        <input type="submit" name="" value="Actualizar Datos">
      </form>
    </div>
    <div class="cotenido-tabla">

    </div>
  </body>
</html>
