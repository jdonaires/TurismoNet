<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ICA | Turismo Net</title>
    <link rel="stylesheet" href="CSS/index.css">
  </head>
  <body>

    <div class="contenedor-menu">
      <div class="contenedor-opciones">
        <li><a href="#" id="index">Inicio</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="#" id="lisempresas">Empresas</a></li>
        <li><a href="#" id="login">Ingresar</a></li>
        <li><a href="#" id="regUsuario">Registrarse</a></li>
      </div>
      <div class="contenedor-redes">
      </div>
    </div>

    <!--CONTENEDOR-->
    <div class="iframe" id="contenido">
      <?php include "lis_Lugares.php"; ?>
    </div>


    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="JS/index.js"></script>
  </body>
</html>
