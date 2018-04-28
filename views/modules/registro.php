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
		<input id="usuarioRegistro" type="text" name="usuarioRegistro" placeholder="Máximo 15 caracteres" minlength="4" maxlength="15" required>
	</div>

	<div class="form-group">
		<label for="emailRegistro">Correo Electrónico</label>
		<input id="emailRegistro" type="email" name="emailRegistro" placeholder="ejemplo@gmail.com" minlength="6" maxlength="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Por favor procura registrar un correo válido." required>
	</div>
	<div class="form-group">
		<label for="passwordRegistro">Contraseña</label>
		<input id="passwordRegistro" type="password" name="passwordRegistro" placeholder="Mínimo 6 caracteres" minlength="6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Es mejor usar mínimo una mayúscula, una minúscula y un número" required>
	</div>
	<p>Por favor, no te confíes de contraseñas simples. Selecciona mayúsculas y minúsculas, y caracteres numéricos.</p>

	<div class="terms-c">
		<label for="terms"><input id="terms" type="checkbox" name="terms" required>Acepto los <a href="#">términos y condiciones</a></label>
	</div>

	<input class="submit-button" type="submit" name="" value="Enviar">
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