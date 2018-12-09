<?php
require_once('../BOL/Turistico.php');
require_once('../DAO/Lugar_turistico.php');
require_once('../DAO/Registro_Provincia.php');


$per = new turistico();
$perDAO = new TuristicoDAO();

if(isset($_POST['guardar']))
{
	// CARGAR Y CONVERTIR LA IMAGEN A BINARIO
	$cargarImagen = $_FILES['imgLugar']['tmp_name'];
	$ConvertirImg = fopen($cargarImagen, 'rb');

	$per->__SET('titulo',          $_POST['titulo']);
	$per->__SET('descripcion',        $_POST['descripcion']);
	$per->__SET('imgLugar',        $ConvertirImg);
  $per->__SET('Provincia',             $_POST['Provincia']);
	$per->__SET('fecha',                    $_POST['fecha']);
	$perDAO->Registrar_Turistico($per);
	header('Location: frm_turistico.php');
}


$lista = new ProvinciaDao();
$resl = array();
$resl = $lista->ListUbicacion();

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>s</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" style="margin-bottom:30px;">

                    <table style="width:500px;" border="0">
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
                            <td><input type="file" name="imgLugar" value="" accept="image/jpeg,image/png" style="width:150|%;" /></td>

                        </tr>
                        <tr>
                            <th style="text-align:left;">Ubicacion</th>
                            <td>
															<select class="" name="Provincia" style="width:100%;">
																<?php foreach ($resl as $value) { ?>
																	<option value="<?php echo $value->__GET('Provincia'); ?>"<?php echo "Selected"; ?>><?php echo $value->__GET('Provincia'); ?></option>
																	<?php
																} ?>
															</select>
														</td>
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

    </body>
</html>
