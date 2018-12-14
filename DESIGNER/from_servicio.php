<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="servicio-contenido">
      <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
        <h3>Agregar Servicio</h3>
        <input type="text" name="nombreServicio" value="" placeholder="Agregar el Nombre del Servicio" required>
        <input type="text" name="horarioAtención" value="" placeholder="Ingrese su Horario de Atención" required>
        <div class="contenido-descripcion">
          <textarea name="descripcionServicio" rows="8" cols="80" placeholder="Agregar una pequeña descripción del Servicio a Brinda" required></textarea>
          <div class="img-file">
            <img src="">
            <input type="file" name="imgServicio" value="">
          </div>
        </div>
        <select class="idUbicacion" name="">
          <option value=""></option>
        </select>
        <select class="idUbicacion" name="">
          <option value=""></option>
        </select>
        <select class="idLugar" name="">
          <option value=""></option>
        </select>

        <input type="submit" name="agregar_servicio" value="Registrar Servicio">
      </form>
    </div>
  </body>
</html>
