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


      header("Location: plantilla.php");
      session_start();
    }
    catch (Exception $e)
    {
      die($e->getMessage());
    }

  }

  // LISTAR SERVICIOS SEGUN EL USUARIO
  public function Listar_servicios(ServicioBOL $serviciolist)
  {
    try
    {
      $resultadoList = array();

      $statement = $this->pdo->prepare("CALL listServicioUsuario (?,?,?)");
      $statement->bindParam(1,$serviciolist->__GET('nombreEmpresa'));
      $statement->bindParam(2,$serviciolist->__GET('razonSocial'));
      $statement->bindParam(3,$serviciolist->__GET('ruc'));
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
      }
      return $resultadoList;
    }
    catch (Exception $e)
    {
      die($e->getMessage());
    }

  }

  // MODIFICAR EL SERVICIO PARA CAMBIAR EL Estado
  public function Modificar_Servicio(ServicioBOL $modificar)
  {
    try
    {
      $statement = $this->pdo->prepare("CALL Modificar_Servicio(?,?)");
      $statement->bindParam(1,$modificar->__GET('idservicioEmpresa'));
      $statement->bindParam(2,$modificar->__GET('estadoServicio'));

      $statement->execute();
      header("Location: plantilla.php");

    }
    catch (Exception $e)
    {
      die($e->getMessage());
    }

  }

  // LISTAR CAMPO DE LOS SERVICI
  public function lis_ServicioM(ServicioBOL $lisModificar)
  {
    try
    {
      $statement = $this->pdo->prepare("CALL lis_ServicioM(?,?,?)");
      $statement->bindParam(1,$lisModificar->__GET('idservicioEmpresa'));
      $statement->bindParam(2,$lisModificar->__GET('nombreEmpresa'));
      $statement->bindParam(3,$lisModificar->__GET('ruc'));
      $statement->execute();

      foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
      {
        $ModiList = new ServicioBOL();

        $ModiList->__SET('nombreServicio');
        $ModiList->__SET('horarioAtención');
        $ModiList->__SET('descripcionServicio');
        $ModiList->__SET('imgServicio');

      }
    }
    catch (Exception $e)
    {

    }

  }
}

 ?>
