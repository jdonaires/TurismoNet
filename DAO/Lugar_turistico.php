<?php
require_once("../DAL/DBAccess.php");
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
			$statement->bindParam(3,$persona->__GET('imgLugar'),PDO::PARAM_LOB);
  		$statement->bindParam(4,$persona->__GET('Provincia'));
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
				$per = new Turistico();

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


	// LISTAR LUGARES EN INDEX
	public function List_LugarPri()
	{
		try {
			$result = array();

			$statement = $this->pdo->prepare("call listar_lugarTuristico");
			$statement->execute();

			foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$lisLugar = new Turistico();

				$lisLugar->__SET('idLugar',			$r->idLugar);
				$lisLugar->__SET('titulo',			$r->titulo);
				$lisLugar->__SET('Provincia', 	$r->Provincia);
				$lisLugar->__SET('imgLugar', 		$r->imgLugar);
				$lisLugar->__SET('descripcion', $r->descripcion);

				$result[] = $lisLugar;
			}
			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	// LISTAR SOLO LOS TITULOS
	public function List_LugarTitulo()
	{
		try {
			$result = array();

			$statement = $this->pdo->prepare("call listLugarTuristico");
			$statement->execute();

			foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$lisLugar = new Turistico();

				$lisLugar->__SET('titulo',	$r->titulo);

				$result[] = $lisLugar;
			}
			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	// MOSTRAR LUGARES
	public function MostrarInfoServicio(Turistico $persona)
	{
		try
		{
			$reslt = array();

			$statement = $this->pdo->prepare("CALL mostrarServicio_Lugar(?)");
			$statement->bindValue(1,$persona->__GET('idLugar'));
			$statement->execute();

			foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$mostrar = new Turistico();

				$mostrar->__SET('nombreServicio',				$r->nombreServicio);
				$mostrar->__SET('Provincia',						$r->Provincia);
				$mostrar->__SET('horarioAtención',			$r->horarioAtención);
				$mostrar->__SET('descripcionServicio',	$r->descripcionServicio);
				$mostrar->__SET('imgServicio',					$r->imgServicio);

				$reslt[] = $mostrar;
			}
			return $reslt;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}

?>
