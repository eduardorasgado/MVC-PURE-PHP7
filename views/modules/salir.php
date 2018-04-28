<?php 

if (!isset($_SESSION["validar"]))
{
	//Si estamos logueados redireccionar a inicio
	header("location:index.php?action=notlogged");
	//salir del script despeues de ejecutar lo que necesitamos ejecutar
	exit();
}

session_destroy();

 ?>

<h1>Adios! Vuelve pronto! :)</h1>