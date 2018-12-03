<?php
class Turistico
{
	private $idLugar;
	private $titulo;
	private $descripcion;
	private $imgLugar;
	private $idUbicacion;
	private $fecha;

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
