<?php 

if (!isset($_SESSION["validar"]))
{
	//Si estamos logueados redireccionar a inicio
	header("location:index.php?action=notlogged");
	//salir del script despeues de ejecutar lo que necesitamos ejecutar
	exit();
}
 ?>

<h1>Adios<?php if (isset($_SESSION["validar"])){ echo " ".$_SESSION["user"];} ?>! Vuelve pronto! :)</h1>

<?php 

session_destroy();

 ?>