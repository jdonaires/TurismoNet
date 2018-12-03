<?php
require_once('../DAL/DBAcces.php');
require_once('../BOL/Turistico.php');

class TuristicoDAO
{
	private $pdo;

	public function __CONSTRUCT()
	{
			$dba = new DBAccess();
			$this->pdo = $dba->get_connection();
	}

	public function Registrar_Turistico(Turistico $persona)
	{
		try
		{
		$statement = $this->pdo->prepare("CALL regLugarTuristico(?,?,?,?,?)");
    $statement->bindParam(1,$persona->__GET('titulo'));
		$statement->bindParam(2,$persona->__GET('descripcion'));
		$statement->bindParam(3,$persona->__GET('imgLugar'));
  	$statement->bindParam(4,$persona->__GET('idUbicacion'));
		$statement->bindParam(5,$persona->__GET('fecha'));
    $statement -> execute();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Listar_Turistico(Turistico $persona)
	{
		try
		{
			$result = array();

			$statement = $this->pdo->prepare("call sp_buscar_lugarturistico(?)");
			$statement->bindParam(1,$persona->__GET('idLugar'));
			$statement->execute();

			foreach($statement->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$per = new turistico();

				$per->__SET('idLugar', $r->idLugar);
				$per->__SET('titulo', $r->titulo);
				$per->__SET('descripcion', $r->descripcion);
				$per->__SET('imgLugar', $r->imgLugar);
				$per->__SET('idUbicacion', $r->idUbicacion);
				$per->__SET('fecha', $r->fecha);

				$result[] = $per;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

}

?>
