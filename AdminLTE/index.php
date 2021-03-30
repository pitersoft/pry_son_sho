<?php  

session_start();
$usuario = $_SESSION['username'];

if(!isset($usuario)){
	header("location: login.php");
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css" media="screen">
      *{
        font-family: SourceSansPro-Regular;
      }
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Home</title>
  </head>
  <body>
  	<div class="container-login100" style="z-index: 100; top: 0;width: 100%;height: 100%;">
      <nav style="position: fixed;z-index: 100; width: 100%;" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand me-4" href="#">
            <img src="img/favicon.ico" alt="" style="border-radius: 100%;" width="70" height="70">
          </a>
          <!-- <a class="navbar-brand" href="#">Bienvenido <?php echo strtoupper($usuario); ?></a> -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mr-5 mb-2 mb-lg-0">
              <li class="nav-item m-auto">
                <a class="nav-link disabled h1" href="#" tabindex="" aria-disabled="true">Bienvenido <!-- <?php echo strtoupper($usuario); ?> --></a>
              </li>
              <li class="nav-item m-auto">
                <a style="user-select: none;color: transparent;" class="nav-link disabled" href="#" tabindex="" aria-disabled="true">HOLA</a>
              </li>
              <li class="nav-item m-auto">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
              </li>
              <li class="nav-item m-auto">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown m-auto">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li> -->
            </ul>
            <form class="m-auto d-flex">
              <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            <a class="btn btn-danger mt-3 m-auto me-4" href='salir.php'>Salir</a>
          </div>
        </div>
      </nav>
		  <!-- <nav class="navbar navbar-light bg-light" style="background-color: rgba(255,255,255,1);">
        <div class="container-fluid" col-11>
           <a class="navbar-brand" href="#">
             <img src="images/logo.ico" alt="" style="border-radius: 100%;" width="70" height="70">
           </a>
          <div class=" h1 col-7">Bienvenido <?php echo strtoupper($usuario); ?></div>
            <form class="d-flex col-3 mt-3">
              <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            <a class="btn btn-danger col-1" href='salir.php'>Salir</a>
          </div>
      </nav> -->
      <div class="h1" style="padding-top: 120px; width: 100%; text-align: center;"><?php echo strtoupper($usuario); ?></div>
      <div style="width: 100%; height: 630px;background-image: url(images/fondo2.PNG);background-repeat: no-repeat;background-size: cover;background-position: center;">
        Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Porro, voluptates quasi iste fugit consequatur vitae inventore magni esse ipsum ratione sapiente sint fugiat laboriosam dolorum, cumque asperiores aperiam laudantium accusamus.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore eius cupiditate voluptates neque molestiae, necessitatibus magnam temporibus est pariatur alias totam laborum cumque impedit quidem dolore unde facilis reprehenderit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus debitis quos quas illum quis ea hic deleniti sequi corrupti placeat quod aspernatur et, aliquam nesciunt. Voluptas dolorum, debitis est!
        Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Porro, voluptates quasi iste fugit consequatur vitae inventore magni esse ipsum ratione sapiente sint fugiat laboriosam dolorum, cumque asperiores aperiam laudantium accusamus.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore eius cupiditate voluptates neque molestiae, necessitatibus magnam temporibus est pariatur alias totam laborum cumque impedit quidem dolore unde facilis reprehenderit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus debitis quos quas illum quis ea hic deleniti sequi corrupti placeat quod aspernatur et, aliquam nesciunt. Voluptas dolorum, debitis est!
        Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Porro, voluptates quasi iste fugit consequatur vitae inventore magni esse ipsum ratione sapiente sint fugiat laboriosam dolorum, cumque asperiores aperiam laudantium accusamus.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore eius cupiditate voluptates neque molestiae, necessitatibus magnam temporibus est pariatur alias totam laborum cumque impedit quidem dolore unde facilis reprehenderit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus debitis quos quas illum quis ea hic deleniti sequi corrupti placeat quod aspernatur et, aliquam nesciunt. Voluptas dolorum, debitis est!
        Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Porro, voluptates quasi iste fugit consequatur vitae inventore magni esse ipsum ratione sapiente sint fugiat laboriosam dolorum, cumque asperiores aperiam laudantium accusamus.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore eius cupiditate voluptates neque molestiae, necessitatibus magnam temporibus est pariatur alias totam laborum cumque impedit quidem dolore unde facilis reprehenderit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus debitis quos quas illum quis ea hic deleniti sequi corrupti placeat quod aspernatur et, aliquam nesciunt. Voluptas dolorum, debitis est!
        Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Porro, voluptates quasi iste fugit consequatur vitae inventore magni esse ipsum ratione sapiente sint fugiat laboriosam dolorum, cumque asperiores aperiam laudantium accusamus.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore eius cupiditate voluptates neque molestiae, necessitatibus magnam temporibus est pariatur alias totam laborum cumque impedit quidem dolore unde facilis reprehenderit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus debitis quos quas illum quis ea hic deleniti sequi corrupti placeat quod aspernatur et, aliquam nesciunt. Voluptas dolorum, debitis est!
        Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Porro, voluptates quasi iste fugit consequatur vitae inventore magni esse ipsum ratione sapiente sint fugiat laboriosam dolorum, cumque asperiores aperiam laudantium accusamus.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore eius cupiditate voluptates neque molestiae, necessitatibus magnam temporibus est pariatur alias totam laborum cumque impedit quidem dolore unde facilis reprehenderit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus debitis quos quas illum quis ea hic deleniti sequi corrupti placeat quod aspernatur et, aliquam nesciunt. Voluptas dolorum, debitis est!
        Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Porro, voluptates quasi iste fugit consequatur vitae inventore magni esse ipsum ratione sapiente sint fugiat laboriosam dolorum, cumque asperiores aperiam laudantium accusamus.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore eius cupiditate voluptates neque molestiae, necessitatibus magnam temporibus est pariatur alias totam laborum cumque impedit quidem dolore unde facilis reprehenderit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus debitis quos quas illum quis ea hic deleniti sequi corrupti placeat quod aspernatur et, aliquam nesciunt. Voluptas dolorum, debitis est!
        Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Porro, voluptates quasi iste fugit consequatur vitae inventore magni esse ipsum ratione sapiente sint fugiat laboriosam dolorum, cumque asperiores aperiam laudantium accusamus.
      </div>
      <iframe style="width: 100%;height: 201px; border-style: none" src="vistas/footer.php"></iframe>
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