<?php
require_once('../BOL/Persona.php');
require_once('../DAO/Registro_Persona.php');

$per = new Persona();
$perDAO = new PersonaDao ();

if(isset($_POST['guardar']))
{
	$per->__SET('correo',          $_POST['correo']);
	$per->__SET('contraseña',      $_POST['contraseña']);
	$per->__SET('nombres',         $_POST['nombres']);
  $per->__SET('apPaterno',       $_POST['apPaterno']);
	$per->__SET('apMaterno',       $_POST['apMaterno']);
  $per->__SET('dni',             $_POST['dni']);
  $per->__SET('celular',         $_POST['celular']);
  $per->__SET('sexo',            $_POST['sexo']);
	$perDAO->Registrar_Persona($per);
	header('Location: frm_Persona.php');
}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>persona</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">

                    <table style="width:500px;" border="0">
                      <tr>
                          <th style="text-align:left;">Correo</th>
                          <td><input type="text" name="correo" value="" style="width:100%;" /></td>
                      </tr>
                        <tr>
                            <th style="text-align:left;">Contraseña</th>
                            <td><input type="text" name="contraseña" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Nombres</th>
                            <td><input type="text" name="nombres" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellido Paterno</th>
                            <td><input type="text" name="apPaterno" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellido Materno</th>
                            <td><input type="text" name="apMaterno" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">DNI</th>
                            <td><input type="text" name="dni" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Celular</th>
                            <td><input type="text" name="celular" value="" style="width:100%;" /></td>

                        </tr>
                        <tr>
                            <th style="text-align:left;">Sexo</th>
                            <td><input type="text" name="sexo" value="" style="width:100%;" /></td>
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
