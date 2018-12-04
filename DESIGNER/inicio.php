<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel ="stylesheet" href="CSS/inicio.css">
  </head>
  <body>
    <div class="contenedor-logo">
      <img src="IMG/logo.png">
      <li><a href="../index.php">Inicio</a></li>
    </div>

    <div class="contenedor">


      <div class="sub-contenedor1">

        <div class="menu">

          <header>
            <nav>
              <ul>
                <li><a href="#"><span class="icono izquierda icon-circle-with-plus"></span>Servicios<span class="icono derecha icon-chevron-down"></span></a>
                    <ul>
                      <li><a href="#" id="persona"><span class="icono izquierda icon-add-user"></span>Agregar servicio</a></li>
                      <li><a href="#" id="reg-productos"><span class="icono izquierda icon-squared-plus"></span>Modificar servicio</a></li>
                      <li><a href="#" id=""><span class="icono izquierda icon-squared-plus"></span>Eliminar servicio</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="icono izquierda icon-text-document"></span>Informacion<span class="icono derecha icon-chevron-down"></span></a>
                </li>
              </ul>
            </nav>
          </header>

        </div>

        <div class="iframe" id="contenido">
        </div>
      </div>

    </div>

    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/inicio.js"></script>
  </body>
</html>
