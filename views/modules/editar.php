<h1>EDITAR USUARIO</h1>

<form method="POST">
	<input type="text" name="usuarioEditar" value="" required>

	<input type="text" name="passwordEditar" value="" required>

	<input type="email" name="emailEditar" value="" required>

	<input type="submit" name="" value="Actualizar">
</form>

<?php 

$editado =new MvcController();
$editado->editarUsuarioController();

 ?>