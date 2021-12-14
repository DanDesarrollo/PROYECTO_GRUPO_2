<?php

function conectar(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "almacen_cdti";

    $acceso= mysqli_connect($host, $user, $pass);

    mysqli_select_db($acceso, $bd);

    return $acceso;

}

?>