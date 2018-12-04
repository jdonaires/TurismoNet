<?php
class DBAccess
{
  private $conn;
  private $host = "localhost";
  private $dbname = "turismonet";
  private $user = "admin";
  private $pass = "admin";

  public function __CONSTRUCT()
  {
    try {
      //$this->conn = new PDO('mysql:host=localhost;dbname=db_res', 'root', '');
      $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
      $this->conn->exec("SET NAMES 'utf8'");
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e ) {
      echo "error:" .$e->getMessage();
    }
 }

  public function get_connection()
  {
    return $this->conn;
  }
}
 ?>
