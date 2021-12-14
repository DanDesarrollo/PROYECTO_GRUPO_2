<?php
  //$conexion = mysqli_connect("localhost", "root", "", "almacen_cdti"); 

  class Conexion
  {

    // Atributos
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;

    // Método para inicializar las variables
    public function __construct()
    {
      $this->dbhost = "localhost";
      $this->dbuser = "root";
      $this->dbpass = "";
      $this->dbname = "almacen_cdti";
    }

    // Función para conectar
    public function connect()
    {

      try {
        // Conectar a la base de datos
        $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
      } catch (Exception $e) {
        die($e->getMessage());
      }

      return $connection;
    }
  }

?>
