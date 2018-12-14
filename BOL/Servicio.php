<?php
// EL SERVCIO
/**
 *
 */
class ServicioBOL
{
  private $nombreEmpresa;
  private $razonSocial;
  private $ruc;
  private $nombreServicio;
  private $horarioAtención;
  private $descripcionServicio;
  private $imgServicio;
  private $idUbicacion;
  private $idLugar;

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
