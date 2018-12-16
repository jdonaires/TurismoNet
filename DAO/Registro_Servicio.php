<?php
require_once('../DAL/DBAccess.php');
require_once('../BOL/Servicio.php');


/**
 * FUNCIONES DE LOS SERVICIOS A USAR
 */
class ServicioDAO
{

  private $pdo;

  public function __CONSTRUCT()
  {
    $dba = new DBAccess();
    $this->pdo = $dba->get_connection();
  }

  // REGISTRAR SERVICIO
  public function Registrar_Servicio(ServicioBOL $servicio)
  {
    try
    {
      $statement = $this->pdo->prepare("CALL regServicio(?,?,?,?,?,?,?,?,?)");
      $statement->bindParam(1,$servicio->__GET('nombreEmpresa'));
      $statement->bindParam(2,$servicio->__GET('razonSocial'));
      $statement->bindParam(3,$servicio->__GET('ruc'));
      $statement->bindParam(4,$servicio->__GET('nombreServicio'));
      $statement->bindParam(5,$servicio->__GET('horarioAtención'));
      $statement->bindParam(6,$servicio->__GET('descripcionServicio'));
      $statement->bindParam(7,$servicio->__GET('imgServicio'),PDO::PARAM_LOB);
      $statement->bindParam(8,$servicio->__GET('Provincia'));
      $statement->bindParam(9,$servicio->__GET('titulo'));

      $statement->execute();

      //
      header("Location: plantilla.php");
      session_start();
    }
    catch (Exception $e)
    {
      die($e->getMessage());
    }

  }

  // LISTAR SERVICIOS SEGUN EL USUARIO
  public function Listar_servicios(ServicioBOL $servicio)
  {
    try
    {
      $resultadoList = array();

      $statement = $this->pdo->prepare("CALL listServicioUsuario (?,?,?)");
      $statement->bindParam(1,$servicio->__GET('nombreEmpresa'),PDO::PARAM_STR);
      $statement->bindParam(2,$servicio->__GET('razonSocial'),PDO::PARAM_STR);
      $statement->bindParam(3,$servicio->__GET('ruc'),PDO::PARAM_STR);
      $statement->execute();

      foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
      {
        $listServicio = new ServicioBOL();

        $listServicio->__SET('idservicioEmpresa', $r->idservicioEmpresa);
        $listServicio->__SET('idEmpresa',         $r->idEmpresa);
        $listServicio->__SET('nombreServicio',    $r->nombreServicio);
        $listServicio->__SET('Provincia',         $r->Provincia);
        $listServicio->__SET('estadoServicio',    $r->estadoServicio);

        $resultadoList[] = $listServicio;
        // session_start();
      }
      return $resultadoList;
    }
    catch (Exception $e)
    {
      die($e->getMessage());
    }

  }

  // MODIFICAR EL SERVICIO PARA CAMBIAR EL Estado
  public function Modificar_Servicio(ServicioBOL $servicio)
  {
    try
    {
      $statement = $this->pdo->prepare("CALL Modificar_Servicio(?,?)");
      $statement->bindParam(1,$servicio->__GET('idservicioEmpresa'));
      $statement->bindParam(2,$servicio->__GET('estadoServicio'));

      $statement->execute();
      header("Location: plantilla.php");
      // session_start();
    }
    catch (Exception $e)
    {
      die($e->getMessage());
    }

  }

  // LISTAR CAMPO DE LOS SERVICI
  public function lis_ServicioM(ServicioBOL $servicio)
  {
    try
    {
      $modifilistar = array();
      $statement = $this->pdo->prepare("CALL lis_ServicioM(?,?,?)");
      $statement->bindParam(1,$servicio->__GET('idservicioEmpresa'));
      $statement->bindParam(2,$servicio->__GET('nombreEmpresa'));
      $statement->bindParam(3,$servicio->__GET('ruc'));
      $statement->execute();

      foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
      {
        $ModiList = new ServicioBOL();

        $ModiList->__SET('nombreServicio'     ,$r->nombreServicio);
        $ModiList->__SET('horarioAtención'    ,$r->horarioAtención);
        $ModiList->__SET('descripcionServicio',$r->descripcionServicio);
        $ModiList->__SET('imgServicio'        ,$r->imgServicio);

        $modifilistar[]=$ModiList;
        header("Location: frm_modifServicio.php");
        // session_start();
      }
      return $modifilistar;
    }
    catch (Exception $e)
    {
      die($e->getMessage());
    }

  }
}

 ?>
