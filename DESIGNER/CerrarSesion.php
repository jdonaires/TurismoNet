<?php
require_once('../DAL/DBAccess.php');
session_start();
$nameUser=$_SESSION['usuario_nombre'];
$nameRS=$_SESSION['usuario_razonSocial'];
$nameRuc=$_SESSION['usuario_ruc'];
$tipoUsuario=$_SESSION['usuario_tipo'];

if (isset($_SESSION['tiempo']))
{
  $inactivo = 20;

  $vida_session = time() - $_SESSION['tiempo'];
  if ($vida_session > $inactivo)
  {
    session_unset();
    session_destroy();
    header("Location: index.php");

    exit();
  }
} else {
  $_SESSION['tiempo'] = time();
}
 ?>
