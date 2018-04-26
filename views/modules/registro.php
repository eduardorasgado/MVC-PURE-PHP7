<h1>REGISTRO DE USUARIO</h1>

<form method="POST">
	<input type="text" name="usuario" placeholder="Usuario" required>

	<input type="email" name="email" placeholder="Correo Electrónico" required>

	<input type="password" name="password" placeholder="Contraseña" required>

	<input type="submit" name="" value="Enviar">
</form>

<?php 

$registro = new mvcController();
$registro->registroUsuarioController();

 ?>