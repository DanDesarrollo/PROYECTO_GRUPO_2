<?php
// Incluir menu
include('../Menu/Menu.php');

// Incluir Nav
include('../Template/Nav.php');
?>

<div class="row justify-content-center text-center m-5">
    <div class="col">
        <div class="row">
            <a href="../usuario/Usuario.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                <th scope="col"><img src="../img/usuarios.jpeg"> Usuarios</th>
            </a>
            <a href="../rol/Rol.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                <th scope="col"><img src="../img/los-usuarios-del-grupo.png"> Roles</th>
            </a>
            <a href="../categoria/categoria.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                <th scope="col"><img src="../img/lineas.jpeg"> Categoria</th>
            </a>
        </div>
        <div class="row">
            <a href="../cargo/cargo.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                <th scope="col"><img src="../img/carga.png"> Cargo</th>
            </a>
            <a href="../estados/consultaEstados.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                <th scope="col"><img src="../img/herramientas.png"> Estado</th>
            </a>
            <a href="../responsable/responsable.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                <th scope="col"><img src="../img/responsable.png"> Responsable </th>
            </a>
        </div>
        <div class="row">
            <a href="../Marca/Marca.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                <th scope="col"><img src="../img/marca.png"> Marca</th>
            </a>
            <a href="../tipoDocumento/tipoDocumento.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                <th scope="col"><img src="../img/tipo documento.png"> Documento</th>
            </a>
            <a href="../elemento/elemento.php" style="text-decoration: none; color: black;" type="image" class="col p-5 m-3 shadow round border">
                <th scope="col"><img src="../img/elementos.png">Elemento</th>
            </a>
        </div>
    </div>
</div>

</body>

</html>