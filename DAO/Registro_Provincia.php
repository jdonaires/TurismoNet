<?php
require_once('../DAL/DBAccess.php');
require_once('../BOL/Provincia.php');
require_once('../BOL/Empresa.php');

class ProvinciaDao
{
	private $pdo;

	public function __CONSTRUCT()
	{
			$dba = new DBAccess();
			$this->pdo = $dba->get_connection();
	}

	public function Registrar_Provincia(Provincia $provincia)
	{
		try
		{
			$statement = $this->pdo->prepare("CALL regProvincia(?)");
	    $statement->bindParam(1,$provincia->__GET('Provincia'));

	    $statement -> execute();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	// FUNCION PARA REGISTRAR A LA EMPRESA COMO USUARIO


}

?>
