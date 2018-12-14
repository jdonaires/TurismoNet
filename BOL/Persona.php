<?php
class Persona
{
	private $correo;
	private $contraseña;
	private $nombres;
	private $apPaterno;
	private $apMaterno;
	private $dni;
  private $celular;
	private $sexo;
	private $tipo;

	public function __GET($x)
	{
		return $this->$x;
	}
	public function __SET($x, $y)
	{
		return $this->$x = $y;
	}
}
?>
