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
    }
    catch (Exception $e)
    {
      die($e->getMessage());
    }

  }
}

 ?>
