<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icons/favicon.ico" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->  
   <!--  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
    <title>Registrarte</title>
  </head>
  <body>
    <div class="container-login100" style="background-image: url('images/bg-01.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
      <form id="registrar" action="" method="post" class="login100-form validate-form">
        <div class="flex-c p-b-5">
          <img src="images/icons/favicon.ico" alt="">
        </div>
        <span class="login100-form-title p-b-37">
          Registrarse
        </span>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese nombre">
          <input class="input100" type="text" name="nombre" placeholder="Nombres">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese apellidos">
          <input class="input100" type="text" name="username" placeholder="Apellidos">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese su correo electrónico">
          <input class="input100" type="email" name="correo" placeholder="Correo Electrónico">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-25" data-validate = "Ingrese Contraseña">
          <input class="input100" type="password" name="password" placeholder="Contraseña">
          <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn">
            Registrarse
          </button>
        </div>
      </form>
      <?php
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "basesistema";
        
            $conexion = new mysqli($servidor, $nombreusuario, $password, $db);
        
            if($conexion->connect_error){
                die("Conexión fallida: " . $conexion->connect_error);
            }

            if(isset($_POST['nombre']) and isset($_POST['username']) and isset($_POST['correo']) and isset($_POST['password'])){
                $nombrec = $_POST['nombre'];
                $username = $_POST['username'];
                $correo = $_POST['correo'];
                $contraseña = $_POST['password'];
                
                $sqlregistrar = "INSERT INTO usuario(nombre, apellidos, email, password)
                                    VALUES('$nombrec','$username','$correo','$contraseña')";
                
                if ($conexion->query($sqlregistrar) === true) {
                  echo '<div class="alert alert-success" role="alert">¡Te Registraste Correctamente!</div>';
                }else{
                  die('<div class="alert alert-danger">"Error al insertar datos."</div>');
                }                
                $conexion->close();
            }

        ?>
       <div class="text-center">
          <a href="index.php" class="txt2 hov1">
            Iniciar Sesión
          </a>
        </div>
      
    </div>
  </div>
  
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
  <script type="text/javascript" src="js/app.js"></script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>