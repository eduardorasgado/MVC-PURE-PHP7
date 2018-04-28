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

<form method="POST" onsubmit="return validarRegistro()">
	<div class="form-group">
		<label for="usuarioRegistro">Nombre</label>
		<input id="usuarioRegistro" type="text" name="usuarioRegistro" placeholder="Máximo 15 caracteres" required>
	</div>

	<div class="form-group">
		<label for="emailRegistro">Correo Electrónico</label>
		<input id="emailRegistro" type="email" name="emailRegistro" placeholder="ejemplo@gmail.com" required>
	</div>
	<div class="form-group">
		<label for="passwordRegistro">Contraseña</label>
		<input id="passwordRegistro" type="password" name="passwordRegistro" placeholder="Mínimo 6 caracteres" required>
	</div>
	<p>Por favor, no te confíes de contraseñas simples. Selecciona mayúsculas y minúsculas, caracteres numéricos y alfanunméricos.</p>

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