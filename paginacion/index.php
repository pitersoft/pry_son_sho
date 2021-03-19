<?php  

  include_once "conexion.php";

  //llamar a todos los articulos
  $sql = 'SELECT * FROM usuario';
  $sentencia = $pdo->prepare($sql);
  $sentencia->execute();


  $resultado = $sentencia->fetchAll();

  // var_dump($resultado);

  $articulos_x_pagina = 3;

  //contar articulos de nuestra base de datos
  $total_articulos_db = $sentencia->rowCount();
  // echo $total_articulos_db;
  $paginas = $total_articulos_db/3;
  $paginas = ceil($paginas);
  // echo $paginas;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Paginación</title>
  </head>
  <body>
    <div class="container my-5">
      <h1 class="mb-5">Usuarios</h1>
      <?php 
        if (!$_GET) {
          header('Location:index.php?pagina=1');
        }
        if ($_GET['pagina']>$paginas || $_GET['pagina']<0) {
          header('Location:index.php?pagina=1');      
        }


        $iniciar=($_GET['pagina']-1)*$articulos_x_pagina;
        // echo $iniciar;

        $sql_articulos = 'SELECT idusuario, nombre, apellidos FROM usuario LIMIT :iniciar,:narticulos';
        $sentencia_articulos=$pdo->prepare($sql_articulos);
        $sentencia_articulos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
        $sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
        $sentencia_articulos->execute();

        $resultado_articulos = $sentencia_articulos->fetchAll();


      ?>
      <?php
        foreach ($resultado_articulos as $articulo):
      ?>
      <div class="alert alert-primary" role="alert">
        <?php
          echo $articulo['idusuario'].".- ".$articulo['nombre']." ".$articulo['apellidos'];;
        ?>
      </div>
      <?php
        endforeach
      ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled':'' ?>">
            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a>
          </li>

          <?php 
            for ($i=0; $i < $paginas ; $i++):
          ?>
          <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : ''?>"><a class="page-link" href="index.php?pagina=<?php echo $i + 1; ?>">
            <?php echo $i + 1; ?>
          </a></li>
          <?php endfor ?>

          <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
        </ul>
      </nav>
    </div>

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