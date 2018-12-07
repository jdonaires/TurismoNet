<?php
class Provincia
{
	private $idProvincia;
	private $Provincia;
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
