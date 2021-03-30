<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Usuarios</title>
  </head>
  <body>
    <?php
    include 'conexion.php';
    $sql="SELECT * FROM usuario INNER JOIN niveles ON usuario.idnivel = niveles.idnivel ORDER BY idusuario ASC;";
    $resultado=mysqli_query($con,$sql);  
    ?>
    <div class="container my-5">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Nuevo
      </button>

      <!-- Nuevo Usuaario -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="agregarusuario.php" method="POST">
              <div class="modal-body">
                <div class="mb-3 form-check">
                  <label for="exampleInputNombre1" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nnombre" id="exampleInputNombre1">
                </div>
                <div class="mb-3 form-check">
                  <label for="exampleInputApellidos1" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" name="napellidos" id="exampleInputApellidos1">
                </div>
                <div class="mb-3 form-check">
                  <label for="exampleInputNivel1" class="form-label">Nivel</label>
                  <select class="form-select" name="nnivel" id="exampleInputNivel1">
                    <?php 
                        $query=mysqli_query($con,"SELECT * FROM niveles");
                        while($nivel = mysqli_fetch_array($query))
                        {
                    ?>
                            <option value="<?php echo $nivel['idnivel']?>"> <?php echo $nivel['nivel']?> </option>
                    <?php
                        }
                    ?> 
                  </select>
                </div>
                <div class="mb-3 form-check">
                  <label for="exampleInputEmail1" class="form-label">Correo</label>
                  <input type="email" class="form-control" name="ncorreo" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 form-check">
                  <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="ncontrasena" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <label for="exampleInputLogin1" class="form-label">Tipo Login</label>
                  <select class="form-select" name="nlogin" id="exampleInputLogin1">
                    <option value="0"> Usuario </option>
                    <option value="1"> Administrador </option>
                  </select>
                </div>
                <div class="mb-3 form-check">
                  <label for="exampleInputEstado1" class="form-label">Estado</label>
                  <select class="form-select" name="nestado" id="exampleInputEstado1">
                    <option value="0"> Deshabilitado </option>
                    <option value="1"> Habilitado </option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <input type="submit" name="nuevo" class="btn btn-success" value="Agregar">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container my-5">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">NIVEL</th>
            <th scope="col">CORREO</th>
            <th scope="col">LOGIN</th>
            <th scope="col">ESTADO</th>
            <th scope="col">ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($filas=mysqli_fetch_assoc($resultado)) {
          ?>
          <tr>
            <th scope="row"><?php echo $filas['idusuario']; ?></th>
            <td><?php echo $filas['nombre']; ?></td>
            <td><?php echo $filas['apellidos']; ?></td>
            <td><?php echo $filas['nivel']; ?></td>
            <td><?php echo $filas['email']; ?></td>
            <td><?php $es=$filas['login'];
                if ($es==true){
                echo "Administrador";
                }else{
                echo "Usuario";
                } ?>
            </td>
            <td><?php $es=$filas['estado'];
                if ($es!=true){
                echo "Habilitado";
                }else{
                echo "Deshabilitado";
                } ?>
            </td>
            <td>
              <a href="modificarusuario.php?id=<?php echo $filas['idusuario']; ?>" class="btn btn-warning">
                Editar
              </a>
              <a href="eliminarusuario.php?id=<?php echo $filas['idusuario']; ?>" class="btn btn-danger">
                Eliminar
              </a>
            </td>  
          </tr>
          <?php } ?>
        </tbody>
    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>