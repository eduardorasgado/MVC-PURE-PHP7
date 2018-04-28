<?php 

if (isset($_SESSION["validar"]))
{
	//Si estamos logueados redireccionar a inicio
	header("location:index.php?action=logged");
	//salir del script despeues de ejecutar lo que necesitamos ejecutar
	exit();
}

 ?>

<h1>REGISTRO DE USUARIO</h1>

<form method="POST">
	<input type="text" name="usuarioRegistro" placeholder="Usuario" required>

	<input type="email" name="emailRegistro" placeholder="Correo Electrónico" required>

	<input type="password" name="passwordRegistro" placeholder="Contraseña" required>

	<input type="submit" name="" value="Enviar">
</form>

<?php 

$registro = new mvcController();
$registro->registroUsuarioController();

if(isset($_GET["action"]))
{
	if ($_GET["action"] == "ok") {
		echo "Registro exitoso";
	}
}

 ?>