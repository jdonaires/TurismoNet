<?php
require_once('../BOL/Sesion.php');
require_once('../DAO/Sesiones.php');

$sesiBOL = new SesionesBOL();
$sesiDAO = new SesionDAO();
$resultdo = array();

if (isset($_POST['Ingresar']))
{
  $sesiBOL->__SET('usuarioCorreo',     $_POST['usuarioCorreo']);
  $sesiBOL->__SET('contraseña', $_POST['contraseña']);
  $resultdo = $sesiDAO->Validar_usuario($sesiBOL);

  // if (!empty($resultdo)) {
  //   foreach ($resultdo as $value) {
  //     $_SESSION['usuario_tipo'] = $valie->__GET('tipo');
  //   }
  // }
}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>
    <div class="contenedor-fondo-login">
      <div class="contenedor-fomulario-1">
        <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
          <h4>INICIAR SESIÓN</h4>
          <!-- <a href="#">Registrarse</a> -->
          <div class="contenedor-usuario-contraseña">
            <li><span class="icono icon-user"></span></li>
            <input type="text" name="usuarioCorreo" value="" placeholder="Ingrese su Usuario" required>
          </div>
          <div class="contenedor-usuario-contraseña">
            <li><span class="icono icon-key"></span></li>
            <input type="password" name="contraseña" value="" placeholder="Ingresu Contraseña" required>
          </div>
          <div class="contenedor-botones">
            <input type="submit" name="Ingresar" value="Ingresar">
            <input type="submit" name="Cancelar" value="Cancelar" href="index.php">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
