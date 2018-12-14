<?php
// require_once('../DAL/DBAccess.php');
require_once('../DAO/Sesiones.php');
require_once('../BOL/Servicio.php');
require_once('../DAO/Registro_Servicio.php');

session_start();
$nameUser=$_SESSION['usuario_nombre'];
$nameRS=$_SESSION['usuario_razonSocial'];
$nameRuc=$_SESSION['usuario_ruc'];

$lisServiBOL = new ServicioBOL();
$lisServiDAO = new ServicioDAO();
$lisServiContenedor = array();

$lisServiBOL->__SET('nombreEmpresa',$nameUser);
$lisServiBOL->__SET('razonSocial',  $nameRS);
$lisServiBOL->__SET('ruc',          $nameRuc);
$lisServiContenedor=$lisServiDAO->Listar_servicios($lisServiBOL);

// MODIFICAR EL ESTADO DEL SERVICIO
$modificarBOL = new ServicioBOL();
$modificarDAO = NEW ServicioDAO();

if (isset($_POST['activado_desactivado']))
{
  $modificarBOL->__SET('idservicioEmpresa', $_POST['idservicioEmpresa']);
  $modificarBOL->__SET('estadoServicio',    $_POST['estadoServicio']);
  $modificarDAO->Modificar_Servicio($modificarBOL);
}

 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/frm_DestvServicio.css">
  </head>
  <body>
    <div class="sub-contenedor-list-producto">
      <table>
        <thead>
          <tr>
            <th>Id Servicio</th>
            <th>Id Empresa</th>
            <th>Nombre del Servicio</th>
            <th>Provincia</th>
            <th>Estado de Servicio</th>
          </tr>
        </thead>
        <?php foreach ($lisServiContenedor as $value) { ?>
          <tr>
            <td><?php echo $value->__GET('idservicioEmpresa'); ?></td>
            <td><?php echo $value->__GET('idEmpresa'); ?></td>
            <td><?php echo $value->__GET('nombreServicio'); ?></td>
            <td><?php echo $value->__GET('Provincia'); ?></td>
            <td>
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="hidden" name="idservicioEmpresa" value="<?php echo $value->__GET('idservicioEmpresa'); ?>">
                <input type="hidden" name="estadoServicio" value="<?php echo $value->__GET('estadoServicio'); ?>">
                <?php
                $estado = $value->__GET('estadoServicio');
                if ($estado=="1") { ?>
                  <input class="activado" type="submit" name="activado_desactivado" value="Activado">
                <?php
                }
                elseif ($estado=="0") { ?>
                  <input class="desactivado" type="submit" name="activado_desactivado" value="Desactivado">
                <?php
                }
                 ?>
              </form>
            </td>
          </tr>
          <?php
        } ?>
      </table>
    </div>
  </body>
</html>
