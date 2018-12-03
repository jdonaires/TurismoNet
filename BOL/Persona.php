<?php
class Persona
{
	private $nombres;
	private $apPaterno;
	private $apMaterno;
	private $dni;
	private $correo;
	private $celular;
  private $sexo;

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
