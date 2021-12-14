<?php
    class User extends Database{
        public function getUser($email, $pass){
            $sql = "SELECT * FROM usuario WHERE usu_correo = '".$email."' and usu_clave = '".$pass."'";

            $result = $this->connect()->query($sql);

            $numRows = $result->num_rows;
            if($numRows == 1){
                $row = $result->fetch_assoc();
                $_SESSION['usuario'] = $row['usuario_id'];
                return true;
            }

            return false;
        }
    }
?>