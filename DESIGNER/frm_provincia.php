<?php
require_once('../BOL/Provincia.php');
require_once('../DAO/Registro_Provincia.php');

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
		<title>s</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" style="margin-bottom:30px;">

                    <table style="width:500px;" border="0">
                        <tr>
                            <th style="text-align:left;">Provincia</th>
                            <td><input type="text" name="Provincia" value="" style="width:100%;" /></td>
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
