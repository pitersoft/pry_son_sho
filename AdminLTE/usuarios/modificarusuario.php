<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title></title>
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
  <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
  <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
  </head>
  <body>
    <?php
    if (isset($_POST['editar'])) {
        header("location: index.php");
      }
        
    ?>
    <div class="container-login100" style="background-image: url('img/fondo.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <div class="wrap-login100 p-l-20 p-r-30 p-t-10 p-b-30">
       <?php
      include 'conexion.php';
      $id=$_GET['id'];
      $sql="SELECT * FROM usuario WHERE idusuario='".$id."'";
      $resultado=mysqli_query($con,$sql);
        while ($fila=mysqli_fetch_assoc($resultado)) {
      ?>
      <form action="" method="POST">
        <div class="h5 bg-success" style="text-align: center;color: #fff;padding: 20px 0px;border-radius: 20px;">Editar Usuario</div>
        <div class="mb-3 form-check">
          <input type="hidden" class="form-control" name="mid"  value="<?php echo $fila['idusuario']; ?>" id="exampleInputNombre2">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputNombre2" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="mnombre" id="exampleInputNombre2"  value="<?php echo $fila['nombre']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputApellidos2" class="form-label">Apellidos</label>
          <input type="text" class="form-control" name="mapellidos" id="exampleInputApellidos2"  value="<?php echo $fila['apellidos']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputNivel2" class="form-label">Nivel</label>
          <select class="form-select" name="mnivel" id="exampleInputNivel1">
            <option value="1" <?php echo $fila['idnivel'] == 1 ? 'selected' : ''; ?>> Cliente </option>
            <option value="2" <?php echo $fila['idnivel'] == 2 ? 'selected' : ''; ?>> Vendedor </option>
            <option value="3" <?php echo $fila['idnivel'] == 3 ? 'selected' : ''; ?>> Proovedor </option>
          </select>
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputEmail2" class="form-label">Correo</label>
          <input type="email" class="form-control" name="mcorreo" id="exampleInputEmail2" aria-describedby="emailHelp"  value="<?php echo $fila['email']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputPassword2" class="form-label">Contraseña</label>
          <input type="password" class="form-control" name="mcontrasena" id="exampleInputPassword2"  value="<?php echo $fila['password']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputLogin2" class="form-label">Tipo Login</label>
          <select class="form-select" name="mlogin" id="exampleInputLogin1">
            <option value="0" <?php echo $fila['login'] == 0 ? 'selected' : ''; ?>> Usuario </option>
            <option value="1" <?php echo $fila['login'] == 1 ? 'selected' : ''; ?>> Administrador </option>
          </select>
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputEstado2" class="form-label">Estado</label>
          <select class="form-select" name="mestado" id="exampleInputEstado1">
            <option value="0" <?php echo $fila['estado'] == 0 ? 'selected' : ''; ?>> Deshabilitado </option>
            <option value="1" <?php echo $fila['estado'] == 1 ? 'selected' : ''; ?>> Habilitado </option>
          </select>
        </div>
        <div class="modal-footer">
          <a href="index.php" class="btn btn-secondary">Cancelar</a>
          <input type="submit" class="btn btn-primary" name="editar" value="Guardar">
        </div>
        <?php
          $idmu=$_GET['id'];
          if (isset($_POST['mnombre']) && isset($_POST['mapellidos']) && isset($_POST['mnivel']) && isset($_POST['mcorreo']) && isset($_POST['mcontrasena']) && isset($_POST['mlogin']) && isset($_POST['mestado'])) {
            $mnombre = $_POST['mnombre'];
            $mapellidos = $_POST['mapellidos'];
            if(isset($_POST['mnivel']))
            {
              $mnivel=(int)$_POST['mnivel'];
            }
            $mcorreo = $_POST['mcorreo'];
            $mcontrasena = $_POST['mcontrasena'];
            if(isset($_POST['mlogin']))
            {
              $mlogin=(int)$_POST['mlogin'];
            }
            if(isset($_POST['mestado']))
            {
              $mestado=(int)$_POST['mestado'];
            }
            if (isset($_POST['editar'])) {
              $editar="UPDATE usuario SET idusuario= '$idmu',idnivel='$mnivel',nombre='$mnombre',apellidos='$mapellidos',email='$mcorreo',password='$mcontrasena',login='$mlogin',estado='$mestado' WHERE idusuario='$idmu'";
              $resultadonuevo=mysqli_query($con,$editar);
              $respuestanuevo="Se ha modificadoado usuario.";
              echo $respuestanuevo;
            } else {
              $respuestanuevo="No se ha podido modificar nuevo usuario.";
              echo $respuestanuevo;
            }  
          }
        ?>
      </form>
      <?php
      }
      ?>
    </div>
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