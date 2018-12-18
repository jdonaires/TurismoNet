<?php
require_once('../DAO/Sesiones.php');
require_once('../BOL/Provincia.php');
require_once('../DAO/Registro_Provincia.php');

// VALIDAR SI LA SESSION ESTA ACTIVA
session_start();
$nameUser=$_SESSION['usuario_nombre'];
$nameRS=$_SESSION['usuario_razonSocial'];
$nameRuc=$_SESSION['usuario_ruc'];

if (!isset($nameUser)&&!isset($nameRS))
{
  header('Location: index.php');
}



$per = new Provincia();
$perDAO = new ProvinciaDao();

if(isset($_POST['guardar']))
{
	$per->__SET('Provincia',          $_POST['Provincia']);
	$perDAO->Registrar_Provincia($per);
	header('Location: frm_provincia.php');
}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="stylesheet" href="CSS/frm_provincia.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" style="margin-bottom:30px;">

                    <table border="0">
                        <tr>
                            <th >Provincia: </th>
                            <td><input type="text" name="Provincia" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
																<input type="submit" value="GUARDAR" name="guardar">
                            </td>
                        </tr>
                    </table>
                </form>


            </div>
        </div>

    </body>
</html>
