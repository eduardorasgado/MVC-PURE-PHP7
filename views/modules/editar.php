
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

<form method="POST">

	<input type="hidden" <?php echo 'value="'.$userToEdit[0].'"' ?> name="idEditar">

	<input type="text" name="usuarioEditar" <?php echo 'value="'.$userToEdit[1].'"' ?> required>

	<input type="text" name="passwordEditar" <?php echo 'value="'.$userToEdit[2].'"' ?> required>

	<input type="email" name="emailEditar" <?php echo 'value="'.$userToEdit[3].'"' ?> required>

	<input type="submit" name="" value="Actualizar">
</form>

<?php 

$editado = new MvcController();
$editado->actualizarUsuarioController();

 ?>