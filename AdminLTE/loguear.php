<?php  
require 'conexion.php';
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['contrasena'];

$q = "SELECT COUNT(*) FROM usuario where email = '$usuario' and password = '$clave'";
$consulta = mysqli_query($conexion,$q);
$array = mysqli_fetch_array($consulta);

if($array['contar'>0]){
	$_SESSION['username'] = $usuario;
	header("location: dashboard");
}else{
	echo "DATOS INCORRECTOS";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<br>
	<a href="index.php">Volver</a>
</body>
</html>