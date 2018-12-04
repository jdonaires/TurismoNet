<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/login.css">
  </head>
  <body>
    <div class="contenedor-fondo">
      <div class="contenedor-fomulario">
        <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
          <h4>INICIAR SESIÓN</h4>
          <div class="contenedor-usuario-contraseña">
            <li></li>
            <input type="text" name="" value="" placeholder="Ingrese su Usuario" required>
          </div>
          <div class="contenedor-usuario-contraseña">
            <li></li>
            <input type="password" name="" value="" placeholder="Ingresu Contraseña" required>
          </div>
          <div class="contenedor-botones">
            <input type="button" name="" value="Ingresar">
            <input type="button" name="" value="Cancelar">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>