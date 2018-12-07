<?php
require_once('../BOL/Persona.php');
require_once('../BOL/Empresa.php');
require_once('../DAO/Registro_Persona.php');

$per = new Persona();
$pers = new User_Empresa();
$perDAO = new PersonaDao();

// REGISTRO DE USUARIO
if (isset($_POST['guardar-1']))
{
  $per->__SET('correo',     $_POST['correo']);
  $per->__SET('contraseña', $_POST['contraseña']);
  $per->__SET('nombres',    $_POST['nombres']);
  $per->__SET('apPaterno',  $_POST['apPaterno']);
  $per->__SET('apMaterno',  $_POST['apMaterno']);
  $per->__SET('dni',        $_POST['dni']);
  $per->__SET('celular',    $_POST['celular']);
  $per->__SET('sexo',       $_POST['sexo']);

  $perDAO->Registrar_Persona($per);
	header('Location: index.php');
}


// REGISTRO DE USUARIO COMO EMPRESA
if (isset($_POST['guardar-2']))
{
  $pers->__SET('correoEmpresa',     $_POST['correoEmpresa']);
  $pers->__SET('contraseñaEmpresa', $_POST['contraseñaEmpresa']);
  $pers->__SET('nombreEmpresa',     $_POST['nombreEmpresa']);
  $pers->__SET('razonSocial',       $_POST['razonSocial']);
  $pers->__SET('ruc',               $_POST['ruc']);
  $pers->__SET('dirrecion',         $_POST['dirrecion']);
  $pers->__SET('descripcion',       $_POST['descripcion']);
  $pers->__SET('celular',           $_POST['celular']);
  $pers->__SET('fijo',              $_POST['fijo']);

  $perDAO->Reg_Empresa_User($pers);
  header('Location: index.php');
}
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/registroUsuario.css">
  </head>
  <body>


    <!--SECCION DE TABS-->
    <div class="wrap">
  		<ul class="tabs">
  			<li><a href="#tab1"></span><span class="tab-text">Usuario</span></a></li>
  			<li><a href="#tab2"></span><span class="tab-text">Empresa</span></a></li>
  		</ul>

  		<div class="secciones">
  			<article id="tab1">
  				<h1>REGISTRO</h1>
          <div class="contenedor-usuario">
            <form class="form-usuario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <h4>Ingrese un Correo / Usuario</h4>
              <input type="text" name="correo" value="" placeholder="Ejemplo: turismonet@gmail.com" required>
              <h4>Ingrese una Contrasseña / Password</h4>
              <input type="password" name="contraseña" value="" placeholder="Ingrese una contrasseña" required>
              <h4 class="datos-personales">Datos Personales</h4>
              <input type="text" name="nombres" value="" placeholder="Ingrese sus Nombres Completos" required>
              <input type="text" name="apPaterno" value="" placeholder="Su Primer Apellido">
              <input type="text" name="apMaterno" value="" placeholder="Su Segundo Apellido">
              <input  class="numeros" type="text" name="dni" value="" placeholder="Ejemplo: 71233465" title="Ingrese su numero de DNI" maxlength="8">
              <input class="numeros" type="text" name="celular" value="" placeholder="9XX - XXX - XXX" title="Ingrese un Numero de Celular obmitir los espacios y el '-'" maxlength="9">
              <select class="select-sexo" name="sexo">
                <option value="M" <?php if($per=="M"){echo "Selected";}?> >Masculino</option>
                <option value="F" <?php if($per=="F"){echo "Selected";}?> >Femenino</option>
              </select>
              <input type="submit" value="REGISTRAR" name="guardar-1">
            </form>
          </div>

  			</article>
  			<article id="tab2">
  				<h1>REGISTRO</h1>
          <div class="contenedor-empresa">
            <form class="form-empresa" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <h4>Ingrese un Correo / Usuario</h4>
              <input type="text" name="correoEmpresa" value="" placeholder="Ejemplo: turismonet@gmail.com" required maxlength="20">
              <h4>Ingrese una Contrasseña / Password</h4>
              <input type="password" name="contraseñaEmpresa" value="" placeholder="Ingrese una contrasseña" required maxlength="20">
              <h4 class="datos-personales">Datos de la Empresa</h4>
              <input type="text" name="nombreEmpresa" value="" placeholder="Ingrese: Nombre de la Empresa" required maxlength="20">
              <select class="select-social" name="razonSocial">
                <option value="S.A."  <?php if($per=="S.A."){echo "Selected";}?> >Sociedad Ananima</option>
                <option value="S.A.C."  <?php if($per=="S.A.C."){echo "Selected";}?> >Sociedad Ananima Cerrada</option>
                <option value="S.A.A." <?php if($per=="S.A.A."){echo "Selected";}?> >Sociedad Ananima Abierta</option>
              </select>
              <input  class="numeros" type="text" name="ruc" value="" placeholder="Ingrese su RUC" maxlength="11" required>
              <input type="text" name="dirrecion" value="" placeholder="Ingrese su Ubicación" required>
              <textarea name="descripcion" rows="8" cols="80" placeholder="Ingrese una Pequeña descripcion de su Empresa" maxlength="30"></textarea>
              <input class="numeros" type="text" name="celular" value="" placeholder="9XX - XXX - XXX" title="Ingrese un Numero de Celular obmitir los espacios y el '-'" maxlength="9">
              <input class="numeros" type="text" name="fijo" value="" placeholder="056 - XXXXXX" title="Ingrese un Numero de Fijo obmitir los espacios y el '-'" maxlength="9">
              <input type="submit" value="REGISTRAR" name="guardar-2">
            </form>
          </div>
  			</article>
  		</div>
  	</div>


    <!--llAMAMOS A JAVASCRIP-->
    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="JS/registroUsuario.js"></script>
  </body>
</html>
