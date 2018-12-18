<?php
require_once('../DAL/DBAccess.php');
require_once('../DAO/Sesiones.php');
require_once('CerrarSesion.php');

$nameUser=$_SESSION['usuario_nombre'];
$nameRS=$_SESSION['usuario_razonSocial'];
$nameRuc=$_SESSION['usuario_ruc'];
$tipoUsuario=$_SESSION['usuario_tipo'];

if (!isset($nameUser)&&!isset($tipoUsuario))
{
  header('Location: index.php');
}
 ?>


<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
    <title>Bienvenido: <?php echo $nameUser ?></title>
    <link rel="stylesheet" href="CSS/plantilla.css">
    <link rel="stylesheet" href="CSS/style.css">

    <!-- TIEMPO EN MILISEGUNDOS PARA QUE LA PÁG SE RECARGUE TRAS INACTIVIDAD-->
    <script>setTimeout('document.location.reload()',300000); </script>
  </head>
  <body>
    <div class="cabecera">
      <div class="cabecera-1">
        <li><a href="#"><span class="icono izquierda icon-home"></span>Inicio</a></li>
      </div>
      <div class="cabecera-2">
        <?php
        // foreach ($resultdo as $value)
        // {
          ?>
          <div class="cabecera-contenido">
            <h3><?php echo $nameUser ?>  <?php echo $nameRS ?></h3>
            <h3><?php echo $nameRuc ?></h3>
          </div>
          <div class="cabecera-salir">
            <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <input type="submit" name="salir" value="Cerrar Sesión">
            </form>
          </div>
          <?php
        // }
         ?>
      </div>
    </div>
    <div class="contenido-1">
      <div class="sub-contenido-1">
        <div class="menu">
          <header>
            <nav>
              <ul>
                <?php if ($tipoUsuario=="Empresa")
                {
                  ?>
                  <li><a class="empleado" href="#"><span class="icono izquierda  icon-man"></span>Empleado<span class="icono derecha icon-chevron-down"></span></a>
                    <ul>
                      <li><a href="#">Bandera de Entrada</a></li>
                      <li><a href="#" id="reg_servicio" >Registrar Servicio</a></li>
                      <li><a href="#" id="desactivar_servicio">Eliminar Servicio</a></li>
                      <li><a href="#" id="MDServicio">Modificar Servicio</a></li>
                      <li><a href="#">Listar Servicios</a></li>
                    </ul>
                  </li>
                  <?php
                } elseif ($tipoUsuario=="Admin") {?>
                  <li><a class="admin" href="#"><span class="icono izquierda  icon-users"></span>Administrador<span class="icono derecha icon-chevron-down"></span></a>
                    <ul>
                      <li><a href="#" id="regTuristico">Registrar Lugar Turistico</a></li>
                      <li><a href="#" id="regProvincia">Registrar Provincia</a></li>
                      <li><a href="#">Modificar Lugar Turistico</a></li>
                    </ul>
                  </li>
                  <?php
                }?>
              </ul>
            </nav>
          </header>
        </div>
      </div>
      <div class="sub-contenido-2" id="iframe">
        <?php include "frm_bienvenido.php"; ?>
      </div>
    </div>


    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="JS/plantilla.js"></script>
  </body>
</html>
