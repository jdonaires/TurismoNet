<?php
require_once('../BOL/Turistico.php');
require_once('../DAO/Lugar_turistico.php');

$per = new turistico();
$perDAO = new TuristicoDAO();

if(isset($_POST['guardar']))
{
	$per->__SET('titulo',          $_POST['titulo']);
	$per->__SET('descripcion',        $_POST['descripcion']);
	$per->__SET('imgLugar',               $_POST['imgLugar']);
  $per->__SET('idUbicacion',             $_POST['idUbicacion']);
	$per->__SET('fecha',                    $_POST['fecha']);
	$perDAO->Registrar_Turistico($per);
	header('Location: frm_turistico.php');
}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>CRUD</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">

                    <table style="width:500px;" border="0">
                      <tr>
                          <th style="text-align:left;">idLugar</th>
                          <td><input type="text" name="idLugar" value="" style="width:100%;" /></td>
                      </tr>
                        <tr>
                            <th style="text-align:left;">Titulo</th>
                            <td><input type="text" name="titulo" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Descripcion</th>
                            <td><input type="text" name="descripcion" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Imagen del Lugar</th>
                            <td><input type="file" name="imgLugar" value="" style="width:150|%;" /></td>

                        </tr>
                        <tr>
                            <th style="text-align:left;">Ubicacion</th>
                            <td><input type="text" name="idUbicacion" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Fecha</th>
                            <td><input type="text" name="fecha" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
																<input type="submit" value="GUARDAR" name="guardar"class="pure-button pure-button-primary">

                            </td>
                        </tr>
                    </table>
                </form>


            </div>
        </div>

				<!--ESTA CONDICION SIRVE PARA REALIZAR BUSQUEDA POR DNI-->
    </body>
</html>
