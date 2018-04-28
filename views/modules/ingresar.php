<?php 

if (isset($_SESSION["validar"]))
{
	//Si estamos logueados redireccionar a inicio
	header("location:index.php?action=logged");
	//salir del script despeues de ejecutar lo que necesitamos ejecutar
	exit();
}

if(isset($_GET["action"]))
{
	if ($_GET["action"] == "notforyou") {
		echo "Oops! Debes registrarte o identificarte antes de hacer esa acción :)";
	}
}


 ?>

<h1>INGRESAR</h1>

<form method="POST" action="">
	<input type="text" name="usuarioIngreso" placeholder="usuario" required>

	<input type="password" name="passwordIngreso" placeholder="Contraseña" required>

	<input type="submit" name="" value="Enviar">
</form>

<?php 


$ingreso = new MvcController();
$ingreso->ingresoUsuarioController();

if(isset($_GET["action"]))
{
	if ($_GET["action"] == "fallo") {
		echo "Algo salió mal: Cuenta o contraseña incorrecta";
	}
}

 ?>