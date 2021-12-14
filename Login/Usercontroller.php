<?php

if (isset($_POST['submit'])) {
    $email = $_POST['usu_correo'];
    $pass = $_POST['usu_clave'];

    if(empty($email) || empty($pass)){
        echo "<div class='alert alert-danger'>Nombre de usuario o contraseña vacio</div>";
    }else{
        $user = new User;

        if($user->getUser($email, $pass)){
            session_start();
            header('Location: ../Dashboard/Dashboard.php');
        }else{
            echo "<div class='alert alert-danger'>Usuario no existe</div>";
        }
    }
    
}

?>
