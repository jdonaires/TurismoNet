<?php
require_once('../DAL/DBAccess.php');
require_once('../BOL/Sesion.php');

/**
 *
 */
class SesionDAO
{
  private $pdo;

  public function __CONSTRUCT()
  {
    $dba = new DBAccess();
    $this->pdo = $dba->get_connection();
  }

  public function Validar_usuario(SesionesBOL $sesiones)
  {
    try
    {
      $resultd = array();

      $statement = $this->pdo->prepare("CALL validarSesion(?,?)");
      $statement->bindParam(1,$sesiones->__GET('usuarioCorreo'));
      $statement->bindParam(2,$sesiones->__GET('contraseña'));
      $statement->execute();

      // OBTENEMOS LOS DATOS
      foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
      {
        $iniciar = new SesionesBOL();

        $iniciar->__SET('nombreEmpresa',  $r->nombreEmpresa);
        $iniciar->__SET('razonSocial',    $r->razonSocial);
        $iniciar->__SET('ruc',            $r->ruc);
        $iniciar->__SET('tipo',           $r->tipo);

        $resultd[] = $iniciar;

        header("Location: plantilla.php");
        $infoUsuario = $statement->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['usuario_tipo'] = $infoUsuario['tipo'];
        echo "<script>
                alert(.'$infoUsuario'.);
                window.location= 'url.php'
              </script>";
      }
      return $resultd;
    }
    catch (Exception $e)
    {
      die($e->getMessage());
    }
  }

  // OBTENER DATOS DEL USUARIO
  // public function obtener_datos(SesionesBOL $sesiones)
  // {
  //   try
  //   {
  //     $reslt = array();
  //
  //     $statement = $this->pdo->prepare("CALL obtenedorDatos(?)");
  //     $statement->bindParam(1,$sesiones->__GET('usuarioCorreo'));
  //     $statement->execute();
  //
  //     foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
  //     {
  //       $obtener = new SesionesBOL();
  //
  //       $obtener->__SET('nombreEmpresa',  $r->nombreEmpresa);
  //       $obtener->__SET('razonSocial',    $r->razonSocial);
  //       $obtener->__SET('ruc',            $r->ruc);
  //
  //       $reslt[] = $obtener;
  //     }
  //   }
  //   catch (Exception $e)
  //   {
  //     die($e->getMessage());
  //   }
  //
  // }
}

 ?>
