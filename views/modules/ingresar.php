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

if(isset($_GET["action"]))
{
	if ($_GET["action"] == "captcha") {
		echo "Oops! Has excedido la cantidad de itentos posible, actualiza e intenta en 5 min :)";
	}
}


 ?>

<h1>INGRESAR</h1>

<form method="POST" onsubmit="return validarIngreso()">
	<div class="form-group">
		<label for="usuarioIngreso">Nombre de Usuario</label>
		<input id="usuarioIngreso" type="text" name="usuarioIngreso" placeholder="Mínimo 4 caracteres" placeholder="Máximo 20 caracteres" minlength="4" maxlength="20" required>
	</div>
	<div class="form-group">
		<label for="passwordIngreso">Contraseña</label>
		<input id="passwordIngreso" type="password" name="passwordIngreso" placeholder="Mínimo 6 caracteres" minlength="6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Es mejor usar mínimo una mayúscula, una minúscula y un número" required>
	</div>

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