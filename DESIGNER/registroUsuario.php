<?php
require_once('../BOL/Persona.php');
require_once('../DAO/Registro_Persona.php');

$per = new Persona();
$perDAO = new PersonaDao();

if (isset($_POST['guardar']))
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
	header('Location: registroUsuario.php');
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
    <div class="contenedor-menu">
      <div class="contenedor-opciones">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="#">Empresas</a></li>
        <li><a href="login.php">Ingresar</a></li>
      </div>
      <div class="contenedor-redes">
      </div>
    </div>


    <!--SECCION DE TABS-->
    <div class="wrap">
  		<ul class="tabs">
  			<li><a href="#tab1"></span><span class="tab-text">Usuario</span></a></li>
  			<li><a href="#tab2"></span><span class="tab-text">Empresa</span></a></li>
  		</ul>

  		<div class="secciones">
  			<article id="tab1">
  				<h1>Inicio</h1>

          <div class="contenedor-usuario">
            <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <input type="text" name="correo" value="" placeholder="Ejemplo: turismonet@gmail.com" required>
              <input type="password" name="contraseña" value="" placeholder="Ingrese una contrasseña" required>
              <input type="text" name="nombres" value="" placeholder="Ingrese sus Nombres Completos" required>
              <input type="text" name="apPaterno" value="" placeholder="Su Primer Apellido">
              <input type="text" name="apMaterno" value="" placeholder="Su Segundo Apellido">
              <input  class="numeros" type="text" name="dni" value="" placeholder="Ejemplo: 71233465" title="Ingrese su numero de DNI" maxlength="8">
              <input class="numeros" type="text" name="celular" value="" placeholder="9XX - XXX - XXX" title="Ingrese un Numero de Celular obmitir los espacios y el '-'" maxlength="9">
              <select class="" name="sexo">
                <option value="M" <?php if($per=="M"){echo "Selected";}?> >Masculino</option>
                <option value="F" <?php if($per=="F"){echo "Selected";}?> >Femenino</option>
              </select>
              <input type="submit" value="REGISTRAR" name="guardar">
            </form>
          </div>

  			</article>
  			<article id="tab2">
  				<h1>Nosotros</h1>
  				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel voluptates unde, consequuntur aliquid architecto rem numquam expedita minima dolorem pariatur recusandae, eius quod quia aspernatur id impedit, tenetur! Aspernatur incidunt molestiae dolores animi ea praesentium ipsam tenetur voluptas cupiditate perspiciatis eum nihil, natus exercitationem libero earum fuga dignissimos impedit numquam, quasi, placeat officiis voluptates, ad reprehenderit fugiat? Fugiat aperiam et magni, molestiae, numquam consectetur vitae sapiente cupiditate totam laboriosam voluptate obcaecati, aliquam placeat? Suscipit dolores fuga laudantium sed, qui magni iusto dolore quia. Quis fugit exercitationem porro. Rerum nihil omnis recusandae ratione fuga alias eligendi, earum sunt veritatis praesentium eum perspiciatis. Molestias deserunt, iure neque animi quod! Impedit reprehenderit cumque, numquam velit quae cum eius quidem similique laudantium hic deleniti!</p>
  			</article>
  		</div>
  	</div>


    <!--llAMAMOS A JAVASCRIP-->
    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="JS/registroUsuario.js"></script>
  </body>
</html>
