<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registro de usuarios</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">      
    
</head>

<body id="page-top">

        <!-- Topbar -->
        
        <!-- End of Topbar -->

        <div class="container my-5 m-auto row">
        <!--INICIO del cont principal-->
        <div class="container">
            <h1>Contenido principal</h1>
            
            
            
         <?php
        include_once 'bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();

        $consulta = "SELECT idusuario, nombre, apellidos, email FROM usuario";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>


        <div class="container">
                <div class="row">
                    <div class="col-lg-12">            
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" id="btnNuevo" data-bs-target="">Nuevo</button>
                    </div>
                </div>  
        </div>    
            <br>  
        <div class="container">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">        
                                <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>                                
                                        <th>Email</th>  
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                            
                                    foreach($data as $dat) {                                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $dat['idusuario'] ?></td>
                                        <td><?php echo $dat['nombre'] ?></td>
                                        <td><?php echo $dat['apellidos'] ?></td>
                                        <td><?php echo $dat['email'] ?></td>    
                                        <td></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>                                
                                </tbody>        
                               </table>                    
                            </div>
                        </div>
                </div>  
            </div>    
              
        <!--Modal para CRUD-->
        <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <form id="formPersonas">    
                    <div class="modal-body">
                        <div class="form-group">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                        <label for="pais" class="col-form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="pais">
                        </div>                
                        <div class="form-group">
                        <label for="edad" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="edad">
                        </div>            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                    </div>
                </form>    
                </div>
            </div>
        </div>  
              
            
        </div>
        <!--FIN del cont principal-->
        </div>
        <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

 

  
    <!-- datatables JS -->
    <script type="text/javascript" src="vendor/datatables/datatables.min.js"></script>    
    <!-- código propio JS --> 
    <script type="text/javascript" src="main.js"></script>  
    

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