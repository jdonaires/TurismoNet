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

	// FUNCION PARA LISTAR LAS PROVINCIAS REGISTRADAS
	public function ListUbicacion()
	{
		try {
			$result = array();

			$statement = $this->pdo->prepare("call lisProvinciaUbicacion");
			$statement->execute();

			foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$lisUbicacion = new Turistico();

				$lisUbicacion->__SET('Provincia',	$r->Provincia);

				$result[] = $lisUbicacion;
			}
			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}

?>
