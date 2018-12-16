<?php
require_once('../BOL/Turistico.php');
require_once('../DAO/Sesiones.php');
require_once('../DAO/Lugar_turistico.php');
require_once('../DAO/Registro_Provincia.php');
require_once('CerrarSesion.php');

$nameUser=$_SESSION['usuario_nombre'];
$tipoUsuario=$_SESSION['usuario_tipo'];

if (!isset($nameUser)&&!isset($tipoUsuario))
{
  header('Location: index.php');
}


$per = new turistico();
$perDAO = new TuristicoDAO();

if(isset($_POST['guardar']))
{

	$time = strtotime($_POST['fecha']);
	if ($time) {
	  $new_date = date('Y-m-d', $time);
	}
	// CARGAR Y CONVERTIR LA IMAGEN A BINARIO
	$cargarImagen = $_FILES['imgLugar']['tmp_name'];
	$ConvertirImg = fopen($cargarImagen, 'rb');

	$per->__SET('titulo',          $_POST['titulo']);
	$per->__SET('descripcion',        $_POST['descripcion']);
	$per->__SET('imgLugar',        $ConvertirImg);
  $per->__SET('Provincia',             $_POST['Provincia']);
	$per->__SET('fecha',                    $new_date);
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
		<link rel="stylesheet" href="CSS/frm_turistico.css">
        <!-- <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css"> -->
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" style="margin-bottom:30px;">


                    <table  border="0">
												<tr>
													<th class="titulo" colspan="2">Agregar lugar Turistico</th>
												</tr>
                        <tr>
                            <th>Titulo:</th>
                            <td><input type="text" name="titulo" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th>Descripcion:</th>
                            <td><textarea name="descripcion" rows="8" cols="80"></textarea></td>
                        </tr>
                        <tr>
                            <th>Imagen del Lugar:</th>
														<td>
															<div class="sub-contenedor-img">
								                <div class="div-file">
								                  <p>Cargar Imagen</p>
								                  <input id="file-input" name="imgLugar" type="file" value="" accept="image/jpg">
								                </div>
								              </div>
														</td>
                            <!-- <td><input type="file" name="imgLugar" value="" accept="image/jpeg,image/png" style="width:150|%;" /></td> -->

                        </tr>
                        <tr>
                            <th>Ubicacion:</th>
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
                            <th>Fecha:</th>
                            <td><input type="date" name="fecha" value="" /></td>
                        </tr>
                        <tr>
													<th colspan="2"><input type="submit" value="Registrar Lugar" name="guardar"></th>
                        </tr>
                    </table>
                </form>


            </div>
        </div>

    </body>
</html>
