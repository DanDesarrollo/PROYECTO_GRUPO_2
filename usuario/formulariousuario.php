<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Mini Proyecto</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
  </head>
  <body>
      
    <?php

        // Incluir conexion                                
        include('../conexion/conexion.php');
    
        //Instancia de objeto de la clase Conexion
        $connection = new Conexion();

        // Conexión a la base de datos
        //$usuario=mysqli_query($connection->connect(), "SELECT * FROM usuario");

        // Incluir menu
        include('../Menu/Menu.php');

        // Incluir Nav
        include('../Template/Nav.php');

        $consulta3 = mysqli_query($connection->connect(), "SELECT * FROM rol");

    ?>
     
     
      <form action="insertar datos.php" method="POST">
       <div class="form position-absolute top-50 start-50 translate-middle  ">
            <div class="container border border-3">
                <div class="row">
                    <h1 class="tex-centern ">Registre Sus Datos</h1>

                    <div class="col-md-4">
                            <div class="grupo">
                            <label >Documento</label><br>
                                <input type="number" name="documento" placeholder="Digite su Documento"  required><span class="barra"></span>
                                <label for=""></label>
                            </div>
                            
                    </div>
                    
                    <div class="col-md-4">
                            <div class="grupo">
                            <label >Nombre</label><br>
                                <input type="text" name="nombre"  placeholder="Digite su Nombre" required><span class="barra"></span>
                                <label for=""></label>
                            </div>
                    </div>

                    <div class="col-md-4">
                        <div class="grupo">
                            <label >Apellido</label><br>
                            <input type="text" name="apellido"  placeholder="Digite su Apellido" required><span class="barra"></span>
                            <label for=""></label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="grupo">
                            <label >Direccion</label><br>
                            <input type="text" name="direccion"  placeholder="Digite su Direccion" required><span class="barra"></span>
                            <label for=""></label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        
                        <div class="grupo">
                            <label >Telefono</label><br>
                            <input type="number" name="telefono"  placeholder="Digite su Telefono" required><span class="barra"></span>
                            <label for=""></label>
                        </div>
                        
                    </div>

                    <div class="col-md-4">
                        
                        <div class="grupo">
                            <label >Correo</label><br>  
                            <input type="email" name="correo"  placeholder="Digite su Correo" required><span class="barra"></span>
                            <label for=""></label>
                        </div>
                        
                    </div>

                    <div class="col-md-4 ">
                        <label >Municipio</label> <br> 
                        <select id="municipiocli" name="municipio" class="from-control from-control-sm" >
                            <option> seleccione municipio </option>
                            <?php

                                while($Municipio = mysqli_fetch_array($consulta1)){
                                    echo "<option value=".$Municipio['Municipio_id'].">".$Municipio['nombre_mun']. "</option>";
                                }

                            ?>
                        </select>
                        
                    </div>
                    <div class="col-md-4 ">


                    <div class="col-md-4">

                        <input type="submit" name="register"  >

                    </div>

                    

                </div>
            </div>
       </div>
   </form>
       <?php
       include("insertar datos.php");
       ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>