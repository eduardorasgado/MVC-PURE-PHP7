
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

