<?php
/**
 *
 */
class User_Empresa
{
  private $correoEmpresa;
  private $contraseñaEmpresa;
  private $nombreEmpresa;
  private $razonSocial;
  private $ruc;
  private $dirrecion;
  private $descripcion;
  private $celular;
  private $fijo;

  public function __GET($x)
  {
    return  $this->$x;
  }
  public function __SET($x, $y)
  {
    return $this->$x = $y;
  }
}

 ?>
