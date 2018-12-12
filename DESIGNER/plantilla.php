<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="CSS/plantilla.css">
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>
    <div class="cabecera">
      <div class="cabecera-1">

      </div>
      <div class="cabecera-2">

      </div>
    </div>
    <div class="contenido-1">
      <div class="sub-contenido-1">
        <div class="menu">
          <header>
            <nav>
              <ul>
                <li><a class="empleado" href="#">Empleado<span class="icono derecha icon-chevron-down"></span></a>
                  <ul>
                    <li><a href="#">Registrar Servicio</a></li>
                    <li><a href="#">Eliminar Servicio</a></li>
                    <li><a href="#">Modificar Servicio</a></li>
                    <li><a href="#">Listar Servicios</a></li>
                  </ul>
                </li>
                <li><a class="admin" href="#">Administrador<span class="icono derecha icon-chevron-down"></span></a>
                  <ul>
                    <li><a href="#">Registrar Lugar Turistico</a></li>
                    <li><a href="#">Registrar Provincia</a></li>
                    <li><a href="#">Modificar Lugar Turistico</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </header>
        </div>
      </div>
      <div class="sub-contenido-2" id="iframe">
        <?php include ""; ?>
      </div>
    </div>


    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="JS/plantilla.js"></script>
  </body>
</html>
