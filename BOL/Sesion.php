<?php
/**
 * LA CLASE DE SESSION
 */
class SesionesBOL
{
  private $nombreEmpresa;
  private $razonSocial;
  private $ruc;
  private $usuarioCorreo;
  private $contraseña;
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
