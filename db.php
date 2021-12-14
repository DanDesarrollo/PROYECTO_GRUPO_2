<?php

class Database{
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;

    public function __construct(){
        $this->dbhost = "localhost";
        $this->dbuser = "root";
        $this->dbpass = "";
        $this->dbname = "almacen_cdti";
    }

    public function connect(){
        $conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        return $conn;
    }
}

?>