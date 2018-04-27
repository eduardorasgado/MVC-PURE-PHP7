<?php 

if (!$_SESSION["validar"])
{
	header("location:index.php?action=ingresar");
	//salir del script despeues de ejecutar lo que necesitamos ejecutar
	exit();
}

 ?>

<h1>USUARIOS</h1>

<table border="1">
	<thead>
		<tr>
			<th>Usuario</th>
			<th>Contraseña</th>
			<th>Email</th>
			<th>Editado</th>
			<th>Borrado</th>
		</tr>
	</thead>
	<tbody>
		<?php 

		$ingreso = new MvcController();
		$ingreso->vistaUsuariosController();

		 ?>

	</tbody>
</table>

