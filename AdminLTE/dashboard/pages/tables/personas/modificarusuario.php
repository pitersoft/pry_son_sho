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
    <div class="container-login100" style="background-image: url('img/fondo.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;width: 360px;margin-left: 30%;">
    <div class="wrap-login100 p-l-20 p-r-30 p-t-10 p-b-30">
       <?php
      include 'conexion.php';
      $id=$_GET['id'];
      $sql="SELECT * FROM personas WHERE idpersona='".$id."'";
      $resultado=mysqli_query($con,$sql);
        while ($fila=mysqli_fetch_assoc($resultado)) {
      ?>
      <form action="" method="POST">
        <div class="h5 bg-success" style="text-align: center;color: #fff;padding: 20px 0px;border-radius: 20px;">Editar Persona</div>
        <div class="mb-3 form-check">
          <input type="hidden" class="form-control" name="mid"  value="<?php echo $fila['idpersona']; ?>" id="exampleInputNombre2">
        </div>


        <div class="mb-3 form-check">
          <label for="exampleInputNombres" class="form-label">Nombres</label>
          <input type="text" class="form-control" name="mnombres" id="exampleInputNombres" value="<?php echo $fila['nombres']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputApellidom" class="form-label">Apellido Paterno</label>
          <input type="text" class="form-control" name="mapellidop" id="exampleInputApellidom" value="<?php echo $fila['apellido_pat']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputApellidop" class="form-label">Apellido Materno</label>
          <input type="text" class="form-control" name="mapellidom" id="exampleInputApellidop" value="<?php echo $fila['apellido_mat']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputDni" class="form-label">DNI</label>
          <input type="text" class="form-control" name="mdni" id="exampleInputDni" value="<?php echo $fila['dni']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputFechanac" class="form-label">Fecha Nacimiento</label>
          <input type="date" class="form-control" name="mfechanac" id="exampleInputFechanac" value="<?php echo $fila['fecha_nacimiento']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputTelefono" class="form-label">Teléfono</label>
          <input type="number" class="form-control" name="mtelefono" id="exampleInputTelefono" value="<?php echo $fila['telefono']; ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputDireccion" class="form-label">Dirección</label>
          <input type="text" class="form-control" name="mdireccion" id="exampleInputDireccion" value="<?php echo $fila['direccion']; ?>">
        </div>

        <div class="modal-footer">
          <a href="index.php" class="btn btn-secondary">Cancelar</a>
          <input type="submit" class="btn btn-primary" name="editar" value="Guardar">
        </div>
        <?php
          $idmu=$_GET['id'];
          if (isset($_POST['mnombres']) && isset($_POST['mapellidop']) && isset($_POST['mapellidom']) && isset($_POST['mdni']) && isset($_POST['mfechanac']) && isset($_POST['mtelefono']) && isset($_POST['mdireccion'])) {
            $mnombres = $_POST['mnombres'];
            $mapellidop = $_POST['mapellidop'];
            $mapellidom = $_POST['mapellidom'];
            $mdni=(int)$_POST['mdni'];
            $mfechanac = $_POST['mfechanac'];
            $mtelefono = (int)$_POST['mtelefono'];
            $mdireccion=$_POST['mdireccion'];
            if (isset($_POST['editar'])) {
              $editar="UPDATE personas SET idpersona= '$idmu',nombres='$mnombres',apellido_pat='$mapellidop',apellido_mat='$mapellidom',dni='$mdni',fecha_nacimiento='$mfechanac',telefono='$mtelefono',direccion='$mdireccion' WHERE idpersona='$idmu'";
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