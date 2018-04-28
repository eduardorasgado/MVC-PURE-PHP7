
<?php 
if (!$_SESSION["validar"])
{
	header("location:index.php?action=ingresar");
	//salir del script despeues de ejecutar lo que necesitamos ejecutar
	exit();
}

$editado =new MvcController();
$userToEdit = $editado->editarUsuarioController();

 ?>

<h1>EDITAR USUARIO</h1>

<form method="POST" onsubmit="return validarCambio()">

	<input type="hidden" <?php echo 'value="'.$userToEdit[0].'"' ?> name="idEditar">

	<input type="text" name="usuarioEditar" <?php echo 'value="'.$userToEdit[1].'"' ?> minlength="4" maxlength="20" required>

	<input type="text" name="passwordEditar" <?php echo 'value="'.$userToEdit[2].'"' ?> minlength="6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Es mejor usar mínimo una mayúscula, una minúscula y un número" required>

	<input type="email" name="emailEditar" <?php echo 'value="'.$userToEdit[3].'"' ?> minlength="6" maxlength="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Por favor procura registrar un correo válido." required>

	<input type="submit" name="" value="Actualizar">
</form>

<?php 

$editado = new MvcController();
$editado->actualizarUsuarioController();

 ?>