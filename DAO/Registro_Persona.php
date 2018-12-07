<?php
require_once('../DAL/DBAccess.php');
require_once('../BOL/Persona.php');
require_once('../BOL/Empresa.php');

class PersonaDao
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
			$statement->bindParam(2,$persona->__GET('contraseña'));
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

	// FUNCION PARA REGISTRAR A LA EMPRESA COMO USUARIO
	public function Reg_Empresa_User(User_Empresa $user_empresa)
	{
		try
		{
			$statement = $this->pdo->prepare("CALL regEmpresa (?,?,?,?,?,?,?,?,?)");
			$statement->bindParam(1,$user_empresa->__GET('correoEmpresa'));
			$statement->bindParam(2,$user_empresa->__GET('contraseñaEmpresa'));
			$statement->bindParam(3,$user_empresa->__GET('nombreEmpresa'));
			$statement->bindParam(4,$user_empresa->__GET('razonSocial'));
			$statement->bindParam(5,$user_empresa->__GET('ruc'));
			$statement->bindParam(6,$user_empresa->__GET('dirrecion'));
			$statement->bindParam(7,$user_empresa->__GET('descripcion'));
			$statement->bindParam(8,$user_empresa->__GET('celular'));
			$statement->bindParam(9,$user_empresa->__GET('fijo'));
			$statement -> execute();

		} catch (Exception $e) {
			die($e->getMessage());
		}

	}

}

?>
