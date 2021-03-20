<?php
  include_once "conex_usuario.php";
  //llamar a todos los articulos
  $sql = 'SELECT * FROM usuario INNER JOIN niveles ON usuario.idnivel = niveles.idnivel ORDER BY idusuario ASC;';
  $sentencia = $pdo->prepare($sql);
  $sentencia->execute();
  $resultado = $sentencia->fetchAll();
  //var_dump($resultado);
  $articulos_x_pagina = 9;
  //contar articulos de nuestra base de datos
  $total_articulos_db = $sentencia->rowCount();
  // echo $total_articulos_db;
  $paginas = $total_articulos_db/$articulos_x_pagina;
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

    <title>Lista de usuarios</title>
  </head>
  <body>
    <div class="container my-5 m-auto row">
      <nav class="navbar navbar-light bg-light col-10">
        <div class="container-fluid">
          <form method="post" class="d-flex col-9">
            <input class="form-control me-2" name="buscar" type="search" placeholder="Busca un Usuario" aria-label="Search">
            <button class="btn btn-outline-success" name="enviar" type="submit">Buscar</button>
          </form>
          <?php  

            if (isset($_POST['enviar'])) {
              $busqueda = trim($_POST['buscar']);
              $sql = "SELECT usuario.nombre, usuario.apellidos, usuario.email, niveles.nivel, acceso.fecha_hora_acceso FROM usuario INNER JOIN acceso ON usuario.idusuario = acceso.idusuario INNER JOIN niveles ON usuario.idnivel = niveles.idnivel WHERE nombre LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%'";
              foreach ($pdo->query($sql) as $row) {
                 echo $row['nombre'] . " " . $row['apellidos'] . "<br />";
                 echo "E-Mail: " . $row['email'] . "<br />";
                 echo "Nivel: " . $row['nivel'] . "<br />";
                 echo "Fecha de Acceso: " . $row['fecha_hora_acceso'] . "<br /><br />";
              }
            }

          ?>
        </div>
      </nav>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar Usuario
      </button>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Nuevo Usuario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="accionfor.php" method="post" enctype="multipart/form-data">
                 <div class="mb-3">
                    <label for="exampleInputNombre" class="form-label">Nombres</label>
                    <input type="text" class="form-control" required="" name="n nombre" id="exampleInputNombre" aria-describedby="nombreHelp">
                    <div id="nombreHelp" class="form-text">Ingrese sus nombres completos.</div>
                </div>
                 <div class="mb-3">
                    <label for="exampleInputApellido" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" required="" name="napellido" id="exampleInputApellido" aria-describedby="apellidoHelp">
                    <div id="apellidoHelp" class="form-text">Ingrese su apellido paterno y mateno.</div>
                </div>
                <div class="mb-3">
                  <div class="col-md-4">
                      <label for="inputState" class="form-label">Niveles</label>
                      <select id="inputState" required="" name="nnivel" class="form-select">
                        <?php
                          $sql_n = 'SELECT * FROM niveles';
                          $sentencia_n = $pdo->prepare($sql_n);
                          $sentencia_n->execute();
                          $resultado_n = $sentencia_n->fetchAll();
                          foreach ($resultado_n as $nivel):
                        ?>
                        <option>
                          <?php
                            echo $nivel['nivel'];
                          ?>
                        </option>
                        <?php endforeach ?>
                      </select>
                    </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" required="" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
                </div>
                <div class="mb-3">
                  <label for="inputPassword5" class="form-label">Password</label>
                  <input type="password" id="inputPassword5" class="form-control" required="" aria-describedby="passwordHelpBlock">
                  <div id="passwordHelpBlock" class="form-text">
                    Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emoji.
                  </div>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Activo</label>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
          </div>
        </div>-
      </div>
    </div>
    <div class="container my-5">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Nivel</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (!$_GET) {
              header('Location:index.php?pagina=1');
            }
            if ($_GET['pagina']>$paginas || $_GET['pagina']<0) {
              header('Location:index.php?pagina=1');      
            }
            $iniciar=($_GET['pagina']-1)*$articulos_x_pagina;
            // echo $iniciar;
            $sql_articulos = 'SELECT * FROM usuario INNER JOIN niveles ON usuario.idnivel = niveles.idnivel ORDER BY idusuario ASC LIMIT :iniciar,:narticulos';
            $sentencia_articulos=$pdo->prepare($sql_articulos);
            $sentencia_articulos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
            $sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
            $sentencia_articulos->execute();
            $resultado_articulos = $sentencia_articulos->fetchAll();
          ?>
          <?php
            foreach ($resultado_articulos as $articulo):
          ?>
          <tr>
            <td scope="row">
              <?php
                echo $articulo['idusuario'];
              ?>
            </td>
            <td>
              <?php
                echo $articulo['nombre'];
              ?>
            </td>
            <td>
              <?php
                echo $articulo['apellidos'];
              ?>
            </td>
            <td>
              <?php
                echo $articulo['nivel'];
              ?>
            </td>
            <td>
              <?php
                echo $articulo['email'];
              ?>
            </td>
            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Modificar
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post" enctype="multipart/form-data">
                         <div class="mb-3">
                            <label for="exampleInputNombre" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="exampleInputNombre" aria-describedby="nombreHelp">
                            <div id="nombreHelp" class="form-text">Ingrese sus nombres completos.</div>
                        </div>
                         <div class="mb-3">
                            <label for="exampleInputApellido" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="exampleInputApellido" aria-describedby="apellidoHelp">
                            <div id="apellidoHelp" class="form-text">Ingrese su apellido paterno y mateno.</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-md-4">
                              <label for="inputState" class="form-label">Niveles</label>
                              <select id="inputState" required="" name="nnivel" class="form-select">
                                <?php
                                  foreach ($resultado_n as $nivel):
                                ?>
                                <option>
                                  <?php
                                    echo $nivel['nivel'];
                                  ?>
                                </option>
                                <?php endforeach ?>
                              </select>
                            </div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
                        </div>
                        </div>
                        <div class="mb-3 ms-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Activo</label>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer" style="background-color: #fff;">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-warning">Modificar</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalEliminar">
                Eliminar
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de eliminar a este usuario?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button name="eliminar" type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <?php
            endforeach
          ?>
        </tbody>
      </table>
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