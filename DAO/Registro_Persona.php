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
			$statement = $this->pdo->prepare("CALL regEmpresa (?,?,?,?,?,?,?,?,?,?,?)");
			$statement->bindParam(1,$user_empresa->__GET('correoEmpresa'));
			$statement->bindParam(2,$user_empresa->__GET('contraseñaEmpresa'));
			$statement->bindParam(3,$user_empresa->__GET('nombreEmpresa'));
			$statement->bindParam(4,$user_empresa->__GET('razonSocial'));
			$statement->bindParam(5,$user_empresa->__GET('ruc'));
			$statement->bindParam(6,$user_empresa->__GET('dirrecion'));
			$statement->bindParam(7,$user_empresa->__GET('descripcion'));
			$statement->bindParam(8,$user_empresa->__GET('celular'));
			$statement->bindParam(9,$user_empresa->__GET('fijo'));
			$statement->bindParam(10,$user_empresa->__GET('tipo'));
			$statement->bindParam(11,$user_empresa->__GET('EmpresaImage'),PDO::PARAM_LOB);
			$statement -> execute();

		} catch (Exception $e) {
			die($e->getMessage());
		}

	}

	public function list_Empresas()
	{
		try
		{
			$result = array();
			$statement = $this->pdo->prepare("CALL lisEmpresas");
			$statement->execute();
			foreach ($statement->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$lisEmpresa = new User_Empresa();
				
				$lisEmpresa->__SET('EmpresaImage', 	$r->EmpresaImage);
				$lisEmpresa->__SET('nombreEmpresa', $r->nombreEmpresa);
				$lisEmpresa->__SET('razonSocial', 	$r->razonSocial);
				$lisEmpresa->__SET('ruc', 					$r->ruc);
				$lisEmpresa->__SET('celular', 			$r->celular);
				$lisEmpresa->__SET('fijo', 					$r->fijo);
				$lisEmpresa->__SET('dirrecion', 		$r->dirrecion);
				$lisEmpresa->__SET('descripcion', 	$r->descripcion);

				$result[] = $lisEmpresa;
			}
			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}

}

?>
