<?php
require_once('../DAL/DBAccess.php');
require_once('../BOL/Persona.php');

class TuristicoDAO
{
	private $pdo;

	public function __CONSTRUCT()
	{
			$dba = new DBAccess();
			$this->pdo = $dba->get_connection();
	}

	public function Registrar_Persona(Persona $persona)
	{
		try
		{
		$statement = $this->pdo->prepare("CALL regPersona(?,?,?,?,?,?,?,?)");
    $statement->bindParam(1,$persona->__GET('correo'));
		$statement->bindParam(2,$persona->__GET('contrasena'));
		$statement->bindParam(3,$persona->__GET('nombres'));
  	$statement->bindParam(4,$persona->__GET('apPaterno'));
		$statement->bindParam(5,$persona->__GET('apMaterno'));
    $statement->bindParam(6,$persona->__GET('dni'));
    $statement->bindParam(7,$persona->__GET('celular'));
    $statement->bindParam(8,$persona->__GET('sexo'));
    $statement -> execute();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


}

?>
